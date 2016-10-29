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
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Guesses constructor arguments of services definitions and try to instantiate services if necessary.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
class AutowirePass implements CompilerPassInterface
{
    private $container;
    private $reflectionClasses = array();
    private $definedTypes = array();
    private $types;
    private $notGuessableTypes = array();

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
<<<<<<< HEAD
        $this->container = $container;
        foreach ($container->getDefinitions() as $id => $definition) {
            if ($definition->isAutowired()) {
                $this->completeDefinition($id, $definition);
            }
        }

=======
        $throwingAutoloader = function ($class) { throw new \ReflectionException(sprintf('Class %s does not exist', $class)); };
        spl_autoload_register($throwingAutoloader);

        try {
            $this->container = $container;
            foreach ($container->getDefinitions() as $id => $definition) {
                if ($definition->isAutowired()) {
                    $this->completeDefinition($id, $definition);
                }
            }
        } catch (\Exception $e) {
        } catch (\Throwable $e) {
        }

        spl_autoload_unregister($throwingAutoloader);

>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        // Free memory and remove circular reference to container
        $this->container = null;
        $this->reflectionClasses = array();
        $this->definedTypes = array();
        $this->types = null;
        $this->notGuessableTypes = array();
<<<<<<< HEAD
=======

        if (isset($e)) {
            throw $e;
        }
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    /**
     * Wires the given definition.
     *
     * @param string     $id
     * @param Definition $definition
     *
     * @throws RuntimeException
     */
    private function completeDefinition($id, Definition $definition)
    {
        if (!$reflectionClass = $this->getReflectionClass($id, $definition)) {
            return;
        }

        $this->container->addClassResource($reflectionClass);

        if (!$constructor = $reflectionClass->getConstructor()) {
            return;
        }

        $arguments = $definition->getArguments();
        foreach ($constructor->getParameters() as $index => $parameter) {
            if (array_key_exists($index, $arguments) && '' !== $arguments[$index]) {
                continue;
            }

            try {
                if (!$typeHint = $parameter->getClass()) {
                    // no default value? Then fail
                    if (!$parameter->isOptional()) {
                        throw new RuntimeException(sprintf('Unable to autowire argument index %d ($%s) for the service "%s". If this is an object, give it a type-hint. Otherwise, specify this argument\'s value explicitly.', $index, $parameter->name, $id));
                    }

                    // specifically pass the default value
                    $arguments[$index] = $parameter->getDefaultValue();

                    continue;
                }

                if (null === $this->types) {
                    $this->populateAvailableTypes();
                }

<<<<<<< HEAD
                if (isset($this->types[$typeHint->name])) {
=======
                if (isset($this->types[$typeHint->name]) && !isset($this->notGuessableTypes[$typeHint->name])) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                    $value = new Reference($this->types[$typeHint->name]);
                } else {
                    try {
                        $value = $this->createAutowiredDefinition($typeHint, $id);
                    } catch (RuntimeException $e) {
                        if ($parameter->allowsNull()) {
                            $value = null;
                        } elseif ($parameter->isDefaultValueAvailable()) {
                            $value = $parameter->getDefaultValue();
                        } else {
                            throw $e;
                        }
                    }
                }
<<<<<<< HEAD
            } catch (\ReflectionException $reflectionException) {
                // Typehint against a non-existing class

                if (!$parameter->isDefaultValueAvailable()) {
                    throw new RuntimeException(sprintf('Cannot autowire argument %s for %s because the type-hinted class does not exist (%s).', $index + 1, $definition->getClass(), $reflectionException->getMessage()), 0, $reflectionException);
=======
            } catch (\ReflectionException $e) {
                // Typehint against a non-existing class

                if (!$parameter->isDefaultValueAvailable()) {
                    throw new RuntimeException(sprintf('Cannot autowire argument %s for %s because the type-hinted class does not exist (%s).', $index + 1, $definition->getClass(), $e->getMessage()), 0, $e);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                }

                $value = $parameter->getDefaultValue();
            }

            $arguments[$index] = $value;
        }

        // it's possible index 1 was set, then index 0, then 2, etc
        // make sure that we re-order so they're injected as expected
        ksort($arguments);
        $definition->setArguments($arguments);
    }

    /**
     * Populates the list of available types.
     */
    private function populateAvailableTypes()
    {
        $this->types = array();

        foreach ($this->container->getDefinitions() as $id => $definition) {
            $this->populateAvailableType($id, $definition);
        }
    }

    /**
     * Populates the list of available types for a given definition.
     *
     * @param string     $id
     * @param Definition $definition
     */
    private function populateAvailableType($id, Definition $definition)
    {
        // Never use abstract services
        if ($definition->isAbstract()) {
            return;
        }

        foreach ($definition->getAutowiringTypes() as $type) {
            $this->definedTypes[$type] = true;
            $this->types[$type] = $id;
        }

        if (!$reflectionClass = $this->getReflectionClass($id, $definition)) {
            return;
        }

        foreach ($reflectionClass->getInterfaces() as $reflectionInterface) {
            $this->set($reflectionInterface->name, $id);
        }

        do {
            $this->set($reflectionClass->name, $id);
        } while ($reflectionClass = $reflectionClass->getParentClass());
    }

    /**
     * Associates a type and a service id if applicable.
     *
     * @param string $type
     * @param string $id
     */
    private function set($type, $id)
    {
<<<<<<< HEAD
        if (isset($this->definedTypes[$type]) || isset($this->notGuessableTypes[$type])) {
            return;
        }

        if (isset($this->types[$type])) {
            if ($this->types[$type] === $id) {
                return;
            }

            unset($this->types[$type]);
            $this->notGuessableTypes[$type] = true;

            return;
        }

        $this->types[$type] = $id;
=======
        if (isset($this->definedTypes[$type])) {
            return;
        }

        if (!isset($this->types[$type])) {
            $this->types[$type] = $id;

            return;
        }

        if ($this->types[$type] === $id) {
            return;
        }

        if (!isset($this->notGuessableTypes[$type])) {
            $this->notGuessableTypes[$type] = true;
            $this->types[$type] = (array) $this->types[$type];
        }

        $this->types[$type][] = $id;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    /**
     * Registers a definition for the type if possible or throws an exception.
     *
     * @param \ReflectionClass $typeHint
     * @param string           $id
     *
     * @return Reference A reference to the registered definition
     *
     * @throws RuntimeException
     */
    private function createAutowiredDefinition(\ReflectionClass $typeHint, $id)
    {
<<<<<<< HEAD
        if (isset($this->notGuessableTypes[$typeHint->name]) || !$typeHint->isInstantiable()) {
            throw new RuntimeException(sprintf('Unable to autowire argument of type "%s" for the service "%s".', $typeHint->name, $id));
=======
        if (isset($this->notGuessableTypes[$typeHint->name])) {
            $classOrInterface = $typeHint->isInterface() ? 'interface' : 'class';
            $matchingServices = implode(', ', $this->types[$typeHint->name]);

            throw new RuntimeException(sprintf('Unable to autowire argument of type "%s" for the service "%s". Multiple services exist for this %s (%s).', $typeHint->name, $id, $classOrInterface, $matchingServices));
        }

        if (!$typeHint->isInstantiable()) {
            $classOrInterface = $typeHint->isInterface() ? 'interface' : 'class';
            throw new RuntimeException(sprintf('Unable to autowire argument of type "%s" for the service "%s". No services were found matching this %s and it cannot be auto-registered.', $typeHint->name, $id, $classOrInterface));
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }

        $argumentId = sprintf('autowired.%s', $typeHint->name);

        $argumentDefinition = $this->container->register($argumentId, $typeHint->name);
        $argumentDefinition->setPublic(false);

        $this->populateAvailableType($argumentId, $argumentDefinition);
<<<<<<< HEAD
        $this->completeDefinition($argumentId, $argumentDefinition);
=======

        try {
            $this->completeDefinition($argumentId, $argumentDefinition);
        } catch (RuntimeException $e) {
            $classOrInterface = $typeHint->isInterface() ? 'interface' : 'class';
            $message = sprintf('Unable to autowire argument of type "%s" for the service "%s". No services were found matching this %s and it cannot be auto-registered.', $typeHint->name, $id, $classOrInterface);
            throw new RuntimeException($message, 0, $e);
        }
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

        return new Reference($argumentId);
    }

    /**
     * Retrieves the reflection class associated with the given service.
     *
     * @param string     $id
     * @param Definition $definition
     *
<<<<<<< HEAD
     * @return \ReflectionClass|null
=======
     * @return \ReflectionClass|false
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    private function getReflectionClass($id, Definition $definition)
    {
        if (isset($this->reflectionClasses[$id])) {
            return $this->reflectionClasses[$id];
        }

        // Cannot use reflection if the class isn't set
        if (!$class = $definition->getClass()) {
<<<<<<< HEAD
            return;
=======
            return false;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }

        $class = $this->container->getParameterBag()->resolveValue($class);

        try {
<<<<<<< HEAD
            return $this->reflectionClasses[$id] = new \ReflectionClass($class);
        } catch (\ReflectionException $reflectionException) {
            // return null
        }
=======
            $reflector = new \ReflectionClass($class);
        } catch (\ReflectionException $e) {
            $reflector = false;
        }

        return $this->reflectionClasses[$id] = $reflector;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }
}
