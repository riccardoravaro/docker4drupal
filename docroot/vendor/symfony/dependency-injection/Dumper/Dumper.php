<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\DependencyInjection\Dumper;

use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Dumper is the abstract class for all built-in dumpers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class Dumper implements DumperInterface
{
    protected $container;

    /**
<<<<<<< HEAD
     * Constructor.
     *
=======
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @param ContainerBuilder $container The service container to dump
     */
    public function __construct(ContainerBuilder $container)
    {
        $this->container = $container;
    }
}
