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

namespace Symfony\Cmf\Component\Routing\Enhancer;

use Symfony\Component\HttpFoundation\Request;

/**
 * This enhancer can fill one field with the result of a hashmap lookup of
 * another field. If the target field is already set, it does nothing.
 *
 * @author David Buchmann
 */
class FieldMapEnhancer implements RouteEnhancerInterface
{
    /**
     * @var string field for key in hashmap lookup
     */
    protected $source;
    /**
     * @var string field to write hashmap lookup result into
     */
    protected $target;
    /**
     * @var array containing the mapping between the source field value and target field value
     */
    protected $hashmap;

    /**
     * @param string $source  the field to read
     * @param string $target  the field to write the result of the lookup into
     * @param array  $hashmap for looking up value from source and get value for target
     */
    public function __construct($source, $target, array $hashmap)
    {
        $this->source = $source;
        $this->target = $target;
        $this->hashmap = $hashmap;
    }

    /**
<<<<<<< HEAD
     * If the target field is not set but the source field is, map the field
     *
     * {@inheritDoc}
=======
     * If the target field is not set but the source field is, map the field.
     *
     * {@inheritdoc}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function enhance(array $defaults, Request $request)
    {
        if (isset($defaults[$this->target])) {
            return $defaults;
        }
<<<<<<< HEAD
        if (! isset($defaults[$this->source])) {
            return $defaults;
        }
        if (! isset($this->hashmap[$defaults[$this->source]])) {
=======
        if (!isset($defaults[$this->source])) {
            return $defaults;
        }
        if (!isset($this->hashmap[$defaults[$this->source]])) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            return $defaults;
        }

        $defaults[$this->target] = $this->hashmap[$defaults[$this->source]];

        return $defaults;
    }
}
