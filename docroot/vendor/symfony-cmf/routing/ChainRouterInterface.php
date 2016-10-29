<?php

/*
 * This file is part of the Symfony CMF package.
 *
<<<<<<< HEAD
 * (c) 2011-2014 Symfony CMF
=======
 * (c) 2011-2015 Symfony CMF
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Cmf\Component\Routing;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Matcher\RequestMatcherInterface;

/**
 * Interface for a router that proxies routing to other routers.
 *
 * @author Daniel Wehner <dawehner@googlemail.com>
 */
interface ChainRouterInterface extends RouterInterface, RequestMatcherInterface
{
    /**
     * Add a Router to the index.
     *
     * @param RouterInterface $router   The router instance. Instead of RouterInterface, may also
     *                                  be RequestMatcherInterface and UrlGeneratorInterface.
<<<<<<< HEAD
     * @param integer         $priority The priority
=======
     * @param int             $priority The priority
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function add($router, $priority = 0);

    /**
     * Sorts the routers and flattens them.
     *
     * @return RouterInterface[] or RequestMatcherInterface and UrlGeneratorInterface.
     */
    public function all();
}
