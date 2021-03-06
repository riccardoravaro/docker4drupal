<?php

<<<<<<< HEAD
=======
/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
/**
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2014 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======
/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2015 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

namespace Symfony\Cmf\Component\Routing;

/**
 * Interface for a provider which allows to retrieve a limited amount of routes.
 */
interface PagedRouteProviderInterface extends RouteProviderInterface
{
    /**
     * Find an amount of routes with an offset and possible a limit.
     *
     * In case you want to iterate over all routes, you want to avoid to load
     * all routes at once.
     *
     * @param int $offset
<<<<<<< HEAD
     *   The sequence will start with that offset in the list of all routes.
     * @param int $length [optional]
     *   The sequence will have that many routes in it. If no length is
     *   specified all routes are returned.
     *
     * @return \Symfony\Component\Routing\Route[]
     *   Routes keyed by the route name.
=======
     *                    The sequence will start with that offset in the list of all routes.
     * @param int $length [optional]
     *                    The sequence will have that many routes in it. If no length is
     *                    specified all routes are returned.
     *
     * @return \Symfony\Component\Routing\Route[]
     *                                            Routes keyed by the route name.
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function getRoutesPaged($offset, $length = null);

    /**
     * Determines the total amount of routes.
     *
     * @return int
     */
    public function getRoutesCount();
}
