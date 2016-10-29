<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Mapping;

use Symfony\Component\Validator\Exception\ValidatorException;

/**
 * Stores all metadata needed for validating a class property.
 *
 * The value of the property is obtained by directly accessing the property.
 * The property will be accessed by reflection, so the access of private and
 * protected properties is supported.
 *
 * This class supports serialization and cloning.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @see PropertyMetadataInterface
 */
class PropertyMetadata extends MemberMetadata
{
    /**
     * Constructor.
     *
     * @param string $class The class this property is defined on
     * @param string $name  The name of this property
     *
     * @throws ValidatorException
     */
    public function __construct($class, $name)
    {
        if (!property_exists($class, $name)) {
<<<<<<< HEAD
            throw new ValidatorException(sprintf('Property %s does not exist in class %s', $name, $class));
=======
            throw new ValidatorException(sprintf('Property "%s" does not exist in class "%s"', $name, $class));
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        }

        parent::__construct($class, $name, $name);
    }

    /**
     * {@inheritdoc}
     */
    public function getPropertyValue($object)
    {
        return $this->getReflectionMember($object)->getValue($object);
    }

    /**
     * {@inheritdoc}
     */
    protected function newReflectionMember($objectOrClassName)
    {
        while (!property_exists($objectOrClassName, $this->getName())) {
            $objectOrClassName = get_parent_class($objectOrClassName);
        }

        $member = new \ReflectionProperty($objectOrClassName, $this->getName());
        $member->setAccessible(true);

        return $member;
    }
}
