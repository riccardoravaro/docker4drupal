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
 * Constraint that asserts that the Traversable it is applied to contains
 * a given value.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_TraversableContains extends PHPUnit_Framework_Constraint
{
    /**
     * @var bool
     */
    protected $checkForObjectIdentity;

    /**
     * @var bool
     */
    protected $checkForNonObjectIdentity;

    /**
     * @var mixed
     */
    protected $value;

    /**
<<<<<<< HEAD
     * @param  mixed                       $value
     * @param  bool                        $checkForObjectIdentity
     * @param  bool                        $checkForNonObjectIdentity
=======
     * @param mixed $value
     * @param bool  $checkForObjectIdentity
     * @param bool  $checkForNonObjectIdentity
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        parent::__construct();

        if (!is_bool($checkForObjectIdentity)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'boolean');
        }

        if (!is_bool($checkForNonObjectIdentity)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'boolean');
        }

        $this->checkForObjectIdentity    = $checkForObjectIdentity;
        $this->checkForNonObjectIdentity = $checkForNonObjectIdentity;
        $this->value                     = $value;
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
        if ($other instanceof SplObjectStorage) {
            return $other->contains($this->value);
        }

        if (is_object($this->value)) {
            foreach ($other as $element) {
<<<<<<< HEAD
                if (($this->checkForObjectIdentity &&
                     $element === $this->value) ||
                    (!$this->checkForObjectIdentity &&
                     $element == $this->value)) {
=======
                if ($this->checkForObjectIdentity && $element === $this->value) {
                    return true;
                } elseif (!$this->checkForObjectIdentity && $element == $this->value) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                    return true;
                }
            }
        } else {
            foreach ($other as $element) {
<<<<<<< HEAD
                if (($this->checkForNonObjectIdentity &&
                     $element === $this->value) ||
                    (!$this->checkForNonObjectIdentity &&
                     $element == $this->value)) {
=======
                if ($this->checkForNonObjectIdentity && $element === $this->value) {
                    return true;
                } elseif (!$this->checkForNonObjectIdentity && $element == $this->value) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        if (is_string($this->value) && strpos($this->value, "\n") !== false) {
            return 'contains "' . $this->value . '"';
        } else {
            return 'contains ' . $this->exporter->export($this->value);
        }
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
        return sprintf(
            '%s %s',
            is_array($other) ? 'an array' : 'a traversable',
            $this->toString()
        );
    }
}
