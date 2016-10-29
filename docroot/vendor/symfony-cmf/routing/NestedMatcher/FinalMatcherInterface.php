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

namespace Symfony\Cmf\Component\Routing\NestedMatcher;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * A FinalMatcher returns only one route from a collection of candidate routes.
 *
 * @author Larry Garfield
 * @author David Buchmann
 */
interface FinalMatcherInterface
{
    /**
<<<<<<< HEAD
    * Matches a request against a route collection and returns exactly one result.
    *
    * @param RouteCollection $collection The collection against which to match.
    * @param Request $request The request to match.
    *
    * @return array An array of parameters
    *
    * @throws ResourceNotFoundException if none of the routes in $collection
    *    matches $request
    */
=======
     * Matches a request against a route collection and returns exactly one result.
     *
     * @param RouteCollection $collection The collection against which to match.
     * @param Request         $request    The request to match.
     *
     * @return array An array of parameters
     *
     * @throws ResourceNotFoundException if none of the routes in $collection
     *                                   matches $request
     */
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    public function finalMatch(RouteCollection $collection, Request $request);
}
