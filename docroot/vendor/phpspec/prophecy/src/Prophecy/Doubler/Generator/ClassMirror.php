<?php

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prophecy\Doubler\Generator;

use Prophecy\Exception\InvalidArgumentException;
use Prophecy\Exception\Doubler\ClassMirrorException;
use ReflectionClass;
use ReflectionMethod;
use ReflectionParameter;

/**
 * Class mirror.
 * Core doubler class. Mirrors specific class and/or interfaces into class node tree.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class ClassMirror
{
    private static $reflectableMethods = array(
        '__construct',
        '__destruct',
        '__sleep',
        '__wakeup',
        '__toString',
        '__call',
<<<<<<< HEAD
=======
        '__invoke'
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    );

    /**
     * Reflects provided arguments into class node.
     *
     * @param ReflectionClass   $class
     * @param ReflectionClass[] $interfaces
     *
     * @return Node\ClassNode
     *
     * @throws \Prophecy\Exception\InvalidArgumentException
     */
    public function reflect(ReflectionClass $class = null, array $interfaces)
    {
        $node = new Node\ClassNode;

        if (null !== $class) {
            if (true === $class->isInterface()) {
                throw new InvalidArgumentException(sprintf(
                    "Could not reflect %s as a class, because it\n".
                    "is interface - use the second argument instead.",
                    $class->getName()
                ));
            }

            $this->reflectClassToNode($class, $node);
        }

        foreach ($interfaces as $interface) {
            if (!$interface instanceof ReflectionClass) {
                throw new InvalidArgumentException(sprintf(
                    "[ReflectionClass \$interface1 [, ReflectionClass \$interface2]] array expected as\n".
                    "a second argument to `ClassMirror::reflect(...)`, but got %s.",
                    is_object($interface) ? get_class($interface).' class' : gettype($interface)
                ));
            }
            if (false === $interface->isInterface()) {
                throw new InvalidArgumentException(sprintf(
                    "Could not reflect %s as an interface, because it\n".
                    "is class - use the first argument instead.",
                    $interface->getName()
                ));
            }

            $this->reflectInterfaceToNode($interface, $node);
        }

        $node->addInterface('Prophecy\Doubler\Generator\ReflectionInterface');

        return $node;
    }

    private function reflectClassToNode(ReflectionClass $class, Node\ClassNode $node)
    {
        if (true === $class->isFinal()) {
            throw new ClassMirrorException(sprintf(
                'Could not reflect class %s as it is marked final.', $class->getName()
            ), $class);
        }

        $node->setParentClass($class->getName());

        foreach ($class->getMethods(ReflectionMethod::IS_ABSTRACT) as $method) {
            if (false === $method->isProtected()) {
                continue;
            }

            $this->reflectMethodToNode($method, $node);
        }

        foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if (0 === strpos($method->getName(), '_')
                && !in_array($method->getName(), self::$reflectableMethods)) {
                continue;
            }

            if (true === $method->isFinal()) {
<<<<<<< HEAD
=======
                $node->addUnextendableMethod($method->getName());
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                continue;
            }

            $this->reflectMethodToNode($method, $node);
        }
    }

    private function reflectInterfaceToNode(ReflectionClass $interface, Node\ClassNode $node)
    {
        $node->addInterface($interface->getName());

        foreach ($interface->getMethods() as $method) {
            $this->reflectMethodToNode($method, $node);
        }
    }

    private function reflectMethodToNode(ReflectionMethod $method, Node\ClassNode $classNode)
    {
        $node = new Node\MethodNode($method->getName());

        if (true === $method->isProtected()) {
            $node->setVisibility('protected');
        }

        if (true === $method->isStatic()) {
            $node->setStatic();
        }

        if (true === $method->returnsReference()) {
            $node->setReturnsReference();
        }

        if (version_compare(PHP_VERSION, '7.0', '>=') && true === $method->hasReturnType()) {
<<<<<<< HEAD
            $node->setReturnType((string) $method->getReturnType());
=======
            $returnType = (string) $method->getReturnType();
            $returnTypeLower = strtolower($returnType);

            if ('self' === $returnTypeLower) {
                $returnType = $method->getDeclaringClass()->getName();
            }
            if ('parent' === $returnTypeLower) {
                $returnType = $method->getDeclaringClass()->getParentClass()->getName();
            }

            $node->setReturnType($returnType);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }

        if (is_array($params = $method->getParameters()) && count($params)) {
            foreach ($params as $param) {
                $this->reflectArgumentToNode($param, $node);
            }
        }

        $classNode->addMethod($node);
    }

    private function reflectArgumentToNode(ReflectionParameter $parameter, Node\MethodNode $methodNode)
    {
        $name = $parameter->getName() == '...' ? '__dot_dot_dot__' : $parameter->getName();
        $node = new Node\ArgumentNode($name);

<<<<<<< HEAD
        $typeHint = $this->getTypeHint($parameter);
        $node->setTypeHint($typeHint);

        if (true === $parameter->isDefaultValueAvailable()) {
            $node->setDefault($parameter->getDefaultValue());
        } elseif (true === $parameter->isOptional()
              || (true === $parameter->allowsNull() && $typeHint)) {
            $node->setDefault(null);
        }

        if (true === $parameter->isPassedByReference()) {
=======
        $node->setTypeHint($this->getTypeHint($parameter));

        if ($this->isVariadic($parameter)) {
            $node->setAsVariadic();
        }

        if ($this->hasDefaultValue($parameter)) {
            $node->setDefault($this->getDefaultValue($parameter));
        }

        if ($parameter->isPassedByReference()) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            $node->setAsPassedByReference();
        }

        $methodNode->addArgument($node);
    }

<<<<<<< HEAD
=======
    private function hasDefaultValue(ReflectionParameter $parameter)
    {
        if ($this->isVariadic($parameter)) {
            return false;
        }

        if ($parameter->isDefaultValueAvailable()) {
            return true;
        }

        return $parameter->isOptional() || $this->isNullable($parameter);
    }

    private function getDefaultValue(ReflectionParameter $parameter)
    {
        if (!$parameter->isDefaultValueAvailable()) {
            return null;
        }

        return $parameter->getDefaultValue();
    }

>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    private function getTypeHint(ReflectionParameter $parameter)
    {
        if (null !== $className = $this->getParameterClassName($parameter)) {
            return $className;
        }

        if (true === $parameter->isArray()) {
            return 'array';
        }

        if (version_compare(PHP_VERSION, '5.4', '>=') && true === $parameter->isCallable()) {
            return 'callable';
        }

        if (version_compare(PHP_VERSION, '7.0', '>=') && true === $parameter->hasType()) {
            return (string) $parameter->getType();
        }

        return null;
    }

<<<<<<< HEAD
=======
    private function isVariadic(ReflectionParameter $parameter)
    {
        return PHP_VERSION_ID >= 50600 && $parameter->isVariadic();
    }

    private function isNullable(ReflectionParameter $parameter)
    {
        return $parameter->allowsNull() && null !== $this->getTypeHint($parameter);
    }

>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    private function getParameterClassName(ReflectionParameter $parameter)
    {
        try {
            return $parameter->getClass() ? $parameter->getClass()->getName() : null;
        } catch (\ReflectionException $e) {
            preg_match('/\[\s\<\w+?>\s([\w,\\\]+)/s', $parameter, $matches);

            return isset($matches[1]) ? $matches[1] : null;
        }
    }
}
