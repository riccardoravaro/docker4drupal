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
 * A simple implementation of ContainerAwareInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @deprecated since version 2.8, to be removed in 3.0. Use the ContainerAwareTrait instead.
 */
abstract class ContainerAware implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
<<<<<<< HEAD
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
=======
     * {@inheritdoc}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}
