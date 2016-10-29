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

/**
 * Argument node.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class ArgumentNode
{
    private $name;
    private $typeHint;
    private $default;
    private $optional    = false;
    private $byReference = false;
<<<<<<< HEAD
=======
    private $isVariadic  = false;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTypeHint()
    {
        return $this->typeHint;
    }

    public function setTypeHint($typeHint = null)
    {
        $this->typeHint = $typeHint;
    }

<<<<<<< HEAD
=======
    public function hasDefault()
    {
        return $this->isOptional() && !$this->isVariadic();
    }

>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    public function getDefault()
    {
        return $this->default;
    }

    public function setDefault($default = null)
    {
        $this->optional = true;
        $this->default  = $default;
    }

    public function isOptional()
    {
        return $this->optional;
    }

    public function setAsPassedByReference($byReference = true)
    {
        $this->byReference = $byReference;
    }

    public function isPassedByReference()
    {
        return $this->byReference;
    }
<<<<<<< HEAD
=======

    public function setAsVariadic($isVariadic = true)
    {
        $this->isVariadic = $isVariadic;
    }

    public function isVariadic()
    {
        return $this->isVariadic;
    }
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
}
