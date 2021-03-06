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

namespace Symfony\Cmf\Component\Routing\Candidates;

use Symfony\Component\HttpFoundation\Request;

/**
 * Candidates is a subsystem useful for the route provider. It separates the
 * logic for determining possible static prefixes from the route provider.
 *
 * @author David Buchmann <mail@davidbu.ch>
 */
interface CandidatesInterface
{
    /**
     * @param Request $request
     *
     * @return array a list of paths
     */
    public function getCandidates(Request $request);

    /**
     * Determine if $name is a valid candidate, e.g. in getRouteByName.
     *
     * @param string $name
     *
<<<<<<< HEAD
     * @return boolean
=======
     * @return bool
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function isCandidate($name);

    /**
     * Provide a best effort query restriction to limit a query to only find
     * routes that are supported.
     *
     * @param object $queryBuilder A query builder suited for the storage backend.
     */
    public function restrictQuery($queryBuilder);
}
