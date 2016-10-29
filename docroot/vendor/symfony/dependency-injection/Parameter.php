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
 * Parameter represents a parameter reference.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Parameter
{
    private $id;

    /**
<<<<<<< HEAD
     * Constructor.
     *
=======
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @param string $id The parameter key
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
<<<<<<< HEAD
     * __toString.
     *
=======
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @return string The parameter key
     */
    public function __toString()
    {
        return (string) $this->id;
    }
}
