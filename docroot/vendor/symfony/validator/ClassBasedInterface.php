<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator;

/**
 * An object backed by a PHP class.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @deprecated since version 2.5, to be removed in 3.0.
 *             Use {@link Mapping\ClassMetadataInterface} instead.
 */
interface ClassBasedInterface
{
    /**
     * Returns the name of the backing PHP class.
     *
<<<<<<< HEAD
     * @return string The name of the backing class.
=======
     * @return string The name of the backing class
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function getClassName();
}
