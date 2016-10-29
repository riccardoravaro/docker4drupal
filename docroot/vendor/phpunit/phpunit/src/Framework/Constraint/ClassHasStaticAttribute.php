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
 * Constraint that asserts that the class it is evaluated for has a given
 * static attribute.
 *
 * The attribute name is passed in the constructor.
 *
 * @since Class available since Release 3.1.0
 */
class PHPUnit_Framework_Constraint_ClassHasStaticAttribute extends PHPUnit_Framework_Constraint_ClassHasAttribute
{
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
        $class = new ReflectionClass($other);

        if ($class->hasProperty($this->attributeName)) {
            $attribute = $class->getProperty($this->attributeName);

            return $attribute->isStatic();
        } else {
            return false;
        }
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
<<<<<<< HEAD
=======
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @since  Method available since Release 3.3.0
     */
    public function toString()
    {
        return sprintf(
            'has static attribute "%s"',
            $this->attributeName
        );
    }
}
