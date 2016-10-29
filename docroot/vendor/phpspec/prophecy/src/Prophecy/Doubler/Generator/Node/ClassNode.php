<?php

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prophecy\Doubler\Generator\Node;

<<<<<<< HEAD
=======
use Prophecy\Exception\Doubler\MethodNotExtendableException;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
use Prophecy\Exception\InvalidArgumentException;

/**
 * Class node.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class ClassNode
{
    private $parentClass = 'stdClass';
    private $interfaces  = array();
    private $properties  = array();
<<<<<<< HEAD
=======
    private $unextendableMethods = array();
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

    /**
     * @var MethodNode[]
     */
    private $methods     = array();

    public function getParentClass()
    {
        return $this->parentClass;
    }

    /**
     * @param string $class
     */
    public function setParentClass($class)
    {
        $this->parentClass = $class ?: 'stdClass';
    }

    /**
     * @return string[]
     */
    public function getInterfaces()
    {
        return $this->interfaces;
    }

    /**
     * @param string $interface
     */
    public function addInterface($interface)
    {
        if ($this->hasInterface($interface)) {
            return;
        }

        array_unshift($this->interfaces, $interface);
    }

    /**
     * @param string $interface
     *
     * @return bool
     */
    public function hasInterface($interface)
    {
        return in_array($interface, $this->interfaces);
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function addProperty($name, $visibility = 'public')
    {
        $visibility = strtolower($visibility);

        if (!in_array($visibility, array('public', 'private', 'protected'))) {
            throw new InvalidArgumentException(sprintf(
                '`%s` property visibility is not supported.', $visibility
            ));
        }

        $this->properties[$name] = $visibility;
    }

    /**
     * @return MethodNode[]
     */
    public function getMethods()
    {
        return $this->methods;
    }

    public function addMethod(MethodNode $method)
    {
<<<<<<< HEAD
=======
        if (!$this->isExtendable($method->getName())){
            $message = sprintf(
                'Method `%s` is not extendable, so can not be added.', $method->getName()
            );
            throw new MethodNotExtendableException($message, $this->getParentClass(), $method->getName());
        }
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        $this->methods[$method->getName()] = $method;
    }

    public function removeMethod($name)
    {
        unset($this->methods[$name]);
    }

    /**
     * @param string $name
     *
     * @return MethodNode|null
     */
    public function getMethod($name)
    {
        return $this->hasMethod($name) ? $this->methods[$name] : null;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasMethod($name)
    {
        return isset($this->methods[$name]);
    }
<<<<<<< HEAD
=======

    /**
     * @return string[]
     */
    public function getUnextendableMethods()
    {
        return $this->unextendableMethods;
    }

    /**
     * @param string $unextendableMethod
     */
    public function addUnextendableMethod($unextendableMethod)
    {
        if (!$this->isExtendable($unextendableMethod)){
            return;
        }
        $this->unextendableMethods[] = $unextendableMethod;
    }

    /**
     * @param string $method
     * @return bool
     */
    public function isExtendable($method)
    {
        return !in_array($method, $this->unextendableMethods);
    }
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
}
