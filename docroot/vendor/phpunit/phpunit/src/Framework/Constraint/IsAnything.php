<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Constraint that accepts any input value.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_IsAnything extends PHPUnit_Framework_Constraint
{
    /**
     * Evaluates the constraint for parameter $other
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
<<<<<<< HEAD
     * @param  mixed                                        $other        Value or object to evaluate.
     * @param  string                                       $description  Additional information about the test
     * @param  bool                                         $returnResult Whether to return a result or throw an exception
     * @return mixed
=======
     * @param mixed  $other        Value or object to evaluate.
     * @param string $description  Additional information about the test
     * @param bool   $returnResult Whether to return a result or throw an exception
     *
     * @return mixed
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @throws PHPUnit_Framework_ExpectationFailedException
     */
    public function evaluate($other, $description = '', $returnResult = false)
    {
        return $returnResult ? true : null;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is anything';
    }

    /**
     * Counts the number of constraint elements.
     *
     * @return int
<<<<<<< HEAD
=======
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @since  Method available since Release 3.5.0
     */
    public function count()
    {
        return 0;
    }
}
