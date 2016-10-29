<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DependencyInjection;

/**
 * Represents a variable.
 *
 *     $var = new Variable('a');
 *
 * will be dumped as
 *
 *     $a
 *
 * by the PHP dumper.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class Variable
{
    private $name;

    /**
<<<<<<< HEAD
     * Constructor.
     *
=======
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Converts the object to a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
