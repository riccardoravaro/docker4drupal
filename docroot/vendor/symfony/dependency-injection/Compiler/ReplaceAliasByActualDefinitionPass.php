<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Replaces aliases with actual service definitions, effectively removing these
 * aliases.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class ReplaceAliasByActualDefinitionPass implements CompilerPassInterface
{
    private $compiler;
    private $formatter;
<<<<<<< HEAD
    private $sourceId;
=======
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

    /**
     * Process the Container to replace aliases with service definitions.
     *
     * @param ContainerBuilder $container
     *
     * @throws InvalidArgumentException if the service definition does not exist
     */
    public function process(ContainerBuilder $container)
    {
<<<<<<< HEAD
        $this->compiler = $container->getCompiler();
        $this->formatter = $this->compiler->getLoggingFormatter();

        foreach ($container->getAliases() as $id => $alias) {
            $aliasId = (string) $alias;

            try {
                $definition = $container->getDefinition($aliasId);
            } catch (InvalidArgumentException $e) {
                throw new InvalidArgumentException(sprintf('Unable to replace alias "%s" with actual definition "%s".', $id, $alias), null, $e);
            }

            if ($definition->isPublic()) {
                continue;
            }

            $definition->setPublic(true);
            $container->setDefinition($id, $definition);
            $container->removeDefinition($aliasId);

            $this->updateReferences($container, $aliasId, $id);

            // we have to restart the process due to concurrent modification of
            // the container
            $this->process($container);

            break;
        }
    }

    /**
     * Updates references to remove aliases.
     *
     * @param ContainerBuilder $container The container
     * @param string           $currentId The alias identifier being replaced
     * @param string           $newId     The id of the service the alias points to
     */
    private function updateReferences($container, $currentId, $newId)
    {
        foreach ($container->getAliases() as $id => $alias) {
            if ($currentId === (string) $alias) {
                $container->setAlias($id, $newId);
            }
        }

        foreach ($container->getDefinitions() as $id => $definition) {
            $this->sourceId = $id;

            $definition->setArguments(
                $this->updateArgumentReferences($definition->getArguments(), $currentId, $newId)
            );

            $definition->setMethodCalls(
                $this->updateArgumentReferences($definition->getMethodCalls(), $currentId, $newId)
            );

            $definition->setProperties(
                $this->updateArgumentReferences($definition->getProperties(), $currentId, $newId)
            );

            $definition->setFactoryService($this->updateFactoryServiceReference($definition->getFactoryService(false), $currentId, $newId), false);
            $definition->setFactory($this->updateFactoryReference($definition->getFactory(), $currentId, $newId));
=======
        // Setup
        $this->compiler = $container->getCompiler();
        $this->formatter = $this->compiler->getLoggingFormatter();
        // First collect all alias targets that need to be replaced
        $seenAliasTargets = array();
        $replacements = array();
        foreach ($container->getAliases() as $definitionId => $target) {
            $targetId = (string) $target;
            // Special case: leave this target alone
            if ('service_container' === $targetId) {
                continue;
            }
            // Check if target needs to be replaces
            if (isset($replacements[$targetId])) {
                $container->setAlias($definitionId, $replacements[$targetId]);
            }
            // No neeed to process the same target twice
            if (isset($seenAliasTargets[$targetId])) {
                continue;
            }
            // Process new target
            $seenAliasTargets[$targetId] = true;
            try {
                $definition = $container->getDefinition($targetId);
            } catch (InvalidArgumentException $e) {
                throw new InvalidArgumentException(sprintf('Unable to replace alias "%s" with actual definition "%s".', $definitionId, $targetId), null, $e);
            }
            if ($definition->isPublic()) {
                continue;
            }
            // Remove private definition and schedule for replacement
            $definition->setPublic(true);
            $container->setDefinition($definitionId, $definition);
            $container->removeDefinition($targetId);
            $replacements[$targetId] = $definitionId;
        }

        // Now replace target instances in all definitions
        foreach ($container->getDefinitions() as $definitionId => $definition) {
            $definition->setArguments($this->updateArgumentReferences($replacements, $definitionId, $definition->getArguments()));
            $definition->setMethodCalls($this->updateArgumentReferences($replacements, $definitionId, $definition->getMethodCalls()));
            $definition->setProperties($this->updateArgumentReferences($replacements, $definitionId, $definition->getProperties()));
            $definition->setFactoryService($this->updateFactoryReferenceId($replacements, $definition->getFactoryService(false)), false);
            $definition->setFactory($this->updateFactoryReference($replacements, $definition->getFactory()));
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }
    }

    /**
<<<<<<< HEAD
     * Updates argument references.
     *
     * @param array  $arguments An array of Arguments
     * @param string $currentId The alias identifier
     * @param string $newId     The identifier the alias points to
     *
     * @return array
     */
    private function updateArgumentReferences(array $arguments, $currentId, $newId)
    {
        foreach ($arguments as $k => $argument) {
            if (is_array($argument)) {
                $arguments[$k] = $this->updateArgumentReferences($argument, $currentId, $newId);
            } elseif ($argument instanceof Reference) {
                if ($currentId === (string) $argument) {
                    $arguments[$k] = new Reference($newId, $argument->getInvalidBehavior());
                    $this->compiler->addLogMessage($this->formatter->formatUpdateReference($this, $this->sourceId, $currentId, $newId));
                }
            }
=======
     * Recursively updates references in an array.
     *
     * @param array  $replacements Table of aliases to replace
     * @param string $definitionId Identifier of this definition
     * @param array  $arguments    Where to replace the aliases
     *
     * @return array
     */
    private function updateArgumentReferences(array $replacements, $definitionId, array $arguments)
    {
        foreach ($arguments as $k => $argument) {
            // Handle recursion step
            if (is_array($argument)) {
                $arguments[$k] = $this->updateArgumentReferences($replacements, $definitionId, $argument);
                continue;
            }
            // Skip arguments that don't need replacement
            if (!$argument instanceof Reference) {
                continue;
            }
            $referenceId = (string) $argument;
            if (!isset($replacements[$referenceId])) {
                continue;
            }
            // Perform the replacement
            $newId = $replacements[$referenceId];
            $arguments[$k] = new Reference($newId, $argument->getInvalidBehavior());
            $this->compiler->addLogMessage($this->formatter->formatUpdateReference($this, $definitionId, $referenceId, $newId));
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }

        return $arguments;
    }

<<<<<<< HEAD
    private function updateFactoryServiceReference($factoryService, $currentId, $newId)
    {
        if (null === $factoryService) {
            return;
        }

        return $currentId === $factoryService ? $newId : $factoryService;
    }

    private function updateFactoryReference($factory, $currentId, $newId)
    {
        if (null === $factory || !is_array($factory) || !$factory[0] instanceof Reference) {
            return $factory;
        }

        if ($currentId === (string) $factory[0]) {
            $factory[0] = new Reference($newId, $factory[0]->getInvalidBehavior());
=======
    /**
     * Returns the updated reference for the factory service.
     *
     * @param array       $replacements Table of aliases to replace
     * @param string|null $referenceId  Factory service reference identifier
     *
     * @return string|null
     */
    private function updateFactoryReferenceId(array $replacements, $referenceId)
    {
        if (null === $referenceId) {
            return;
        }

        return isset($replacements[$referenceId]) ? $replacements[$referenceId] : $referenceId;
    }

    private function updateFactoryReference(array $replacements, $factory)
    {
        if (is_array($factory) && $factory[0] instanceof Reference && isset($replacements[$referenceId = (string) $factory[0]])) {
            $factory[0] = new Reference($replacements[$referenceId], $factory[0]->getInvalidBehavior());
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }

        return $factory;
    }
}
