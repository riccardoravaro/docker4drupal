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
 * Defines the interface of normalizers.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
interface NormalizerInterface
{
    /**
     * Normalizes an object into a set of arrays/scalars.
     *
     * @param object $object  object to normalize
     * @param string $format  format the normalization result will be encoded as
     * @param array  $context Context options for the normalizer
     *
<<<<<<< HEAD
     * @return array|string|bool|int|float|null
=======
     * @return array|scalar
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function normalize($object, $format = null, array $context = array());

    /**
     * Checks whether the given class is supported for normalization by this normalizer.
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
    public function supportsNormalization($data, $format = null);
}
