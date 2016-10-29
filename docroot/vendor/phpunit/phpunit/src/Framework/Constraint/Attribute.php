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
 * @since Class available since Release 3.1.0
 */
class PHPUnit_Framework_Constraint_Attribute extends PHPUnit_Framework_Constraint_Composite
{
    /**
     * @var string
     */
    protected $attributeName;

    /**
     * @param PHPUnit_Framework_Constraint $constraint
     * @param string                       $attributeName
     */
    public function __construct(PHPUnit_Framework_Constraint $constraint, $attributeName)
    {
        parent::__construct($constraint);

        $this->attributeName = $attributeName;
    }

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
        return parent::evaluate(
            PHPUnit_Framework_Assert::readAttribute(
                $other,
                $this->attributeName
            ),
            $description,
            $returnResult
        );
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'attribute "' . $this->attributeName . '" ' .
               $this->innerConstraint->toString();
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
<<<<<<< HEAD
     * @param  mixed  $other Evaluated value or object.
=======
     * @param mixed $other Evaluated value or object.
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @return string
     */
    protected function failureDescription($other)
    {
        return $this->toString();
    }
}
