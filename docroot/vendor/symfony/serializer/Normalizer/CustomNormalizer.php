<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Serializer\Normalizer;

/**
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class CustomNormalizer extends SerializerAwareNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = array())
    {
        return $object->normalize($this->serializer, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new $class();
        $object->denormalize($this->serializer, $data, $format, $context);

        return $object;
    }

    /**
     * Checks if the given class implements the NormalizableInterface.
     *
<<<<<<< HEAD
     * @param mixed  $data   Data to normalize.
     * @param string $format The format being (de-)serialized from or into.
=======
     * @param mixed  $data   Data to normalize
     * @param string $format The format being (de-)serialized from or into
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     *
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof NormalizableInterface;
    }

    /**
     * Checks if the given class implements the NormalizableInterface.
     *
<<<<<<< HEAD
     * @param mixed  $data   Data to denormalize from.
     * @param string $type   The class to which the data should be denormalized.
     * @param string $format The format being deserialized from.
=======
     * @param mixed  $data   Data to denormalize from
     * @param string $type   The class to which the data should be denormalized
     * @param string $format The format being deserialized from
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     *
     * @return bool
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        if (!class_exists($type)) {
            return false;
        }

        return is_subclass_of($type, 'Symfony\Component\Serializer\Normalizer\DenormalizableInterface');
    }
}
