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
 * Constraint that evaluates against a specified closure.
 */
class PHPUnit_Framework_Constraint_Callback extends PHPUnit_Framework_Constraint
{
    private $callback;

    /**
<<<<<<< HEAD
     * @param  callable                    $callback
=======
     * @param callable $callback
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($callback)
    {
        if (!is_callable($callback)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'callable'
            );
        }

        parent::__construct();

        $this->callback = $callback;
    }

    /**
     * Evaluates the constraint for parameter $value. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param  mixed $other Value or object to evaluate.
=======
     * @param mixed $other Value or object to evaluate.
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @return bool
     */
    protected function matches($other)
    {
        return call_user_func($this->callback, $other);
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is accepted by specified callback';
    }
}
