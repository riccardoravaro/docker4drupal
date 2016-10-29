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
 * Constraint that asserts that the value it is evaluated for is less than
 * a given value.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_LessThan extends PHPUnit_Framework_Constraint
{
    /**
     * @var numeric
     */
    protected $value;

    /**
     * @param numeric $value
     */
    public function __construct($value)
    {
        parent::__construct();
        $this->value = $value;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
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
        return $this->value > $other;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is less than ' . $this->exporter->export($this->value);
    }
}
