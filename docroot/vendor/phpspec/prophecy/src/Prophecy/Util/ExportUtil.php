<?php

namespace Prophecy\Util;

use Prophecy\Prophecy\ProphecyInterface;
<<<<<<< HEAD
use SplObjectStorage;
=======
use SebastianBergmann\RecursionContext\Context;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
<<<<<<< HEAD
 * Exporting utility.
 *
 * This class is derived from the PHPUnit testing framework.
 *
 * @author  Sebastiaan Stok <s.stok@rollerscapes.net
 * @author  Sebastian Bergmann <sebastian@phpunit.de>
 * @license http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License>
=======
 * This class is a modification from sebastianbergmann/exporter
 * @see https://github.com/sebastianbergmann/exporter
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 */
class ExportUtil
{
    /**
<<<<<<< HEAD
     * Exports a value into a string.
=======
     * Exports a value as a string
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     *
     * The output of this method is similar to the output of print_r(), but
     * improved in various aspects:
     *
     *  - NULL is rendered as "null" (instead of "")
<<<<<<< HEAD
     *  - true is rendered as "true" (instead of "1")
=======
     *  - TRUE is rendered as "true" (instead of "1")
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     *  - FALSE is rendered as "false" (instead of "")
     *  - Strings are always quoted with single quotes
     *  - Carriage returns and newlines are normalized to \n
     *  - Recursion and repeated rendering is treated properly
     *
<<<<<<< HEAD
     * @param  mixed   $value       The value to export
     * @param  integer $indentation The indentation level of the 2nd+ line
     *
=======
     * @param  mixed  $value
     * @param  int    $indentation The indentation level of the 2nd+ line
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @return string
     */
    public static function export($value, $indentation = 0)
    {
<<<<<<< HEAD
        return static::recursiveExport($value, $indentation);
=======
        return self::recursiveExport($value, $indentation);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    /**
     * Converts an object to an array containing all of its private, protected
     * and public properties.
     *
<<<<<<< HEAD
     * @param  object $object
     *
     * @return array
     */
    public static function toArray($object)
    {
        $array = array();

        foreach ((array) $object as $key => $value) {
            // properties are transformed to keys in the following way:

            // private   $property => "\0Classname\0property"
            // protected $property => "\0*\0property"
            // public    $property => "property"

=======
     * @param  mixed $value
     * @return array
     */
    public static function toArray($value)
    {
        if (!is_object($value)) {
            return (array) $value;
        }

        $array = array();

        foreach ((array) $value as $key => $val) {
            // properties are transformed to keys in the following way:
            // private   $property => "\0Classname\0property"
            // protected $property => "\0*\0property"
            // public    $property => "property"
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            if (preg_match('/^\0.+\0(.+)$/', $key, $matches)) {
                $key = $matches[1];
            }

<<<<<<< HEAD
            $array[$key] = $value;
        }

        // Some internal classes like SplObjectStorage don't work with the
        // above (fast) mechanism nor with reflection
        // Format the output similarly to print_r() in this case
        if ($object instanceof SplObjectStorage) {
            foreach ($object as $key => $value) {
                $array[spl_object_hash($value)] = array(
                    'obj' => $value,
                    'inf' => $object->getInfo(),
=======
            // See https://github.com/php/php-src/commit/5721132
            if ($key === "\0gcdata") {
                continue;
            }

            $array[$key] = $val;
        }

        // Some internal classes like SplObjectStorage don't work with the
        // above (fast) mechanism nor with reflection in Zend.
        // Format the output similarly to print_r() in this case
        if ($value instanceof \SplObjectStorage) {
            // However, the fast method does work in HHVM, and exposes the
            // internal implementation. Hide it again.
            if (property_exists('\SplObjectStorage', '__storage')) {
                unset($array['__storage']);
            } elseif (property_exists('\SplObjectStorage', 'storage')) {
                unset($array['storage']);
            }

            if (property_exists('\SplObjectStorage', '__key')) {
                unset($array['__key']);
            }

            foreach ($value as $key => $val) {
                $array[spl_object_hash($val)] = array(
                    'obj' => $val,
                    'inf' => $value->getInfo(),
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                );
            }
        }

        return $array;
    }

    /**
<<<<<<< HEAD
     * Recursive implementation of export.
     *
     * @param  mixed   $value            The value to export
     * @param  integer $indentation      The indentation level of the 2nd+ line
     * @param  array   $processedObjects Contains all objects that were already
     *                                   rendered
     *
     * @return string
     */
    protected static function recursiveExport($value, $indentation, &$processedObjects = array())
=======
     * Recursive implementation of export
     *
     * @param  mixed                                       $value       The value to export
     * @param  int                                         $indentation The indentation level of the 2nd+ line
     * @param  \SebastianBergmann\RecursionContext\Context $processed   Previously processed objects
     * @return string
     * @see    SebastianBergmann\Exporter\Exporter::export
     */
    protected static function recursiveExport(&$value, $indentation, $processed = null)
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    {
        if ($value === null) {
            return 'null';
        }

        if ($value === true) {
            return 'true';
        }

        if ($value === false) {
            return 'false';
        }

<<<<<<< HEAD
=======
        if (is_float($value) && floatval(intval($value)) === $value) {
            return "$value.0";
        }

        if (is_resource($value)) {
            return sprintf(
                'resource(%d) of type (%s)',
                $value,
                get_resource_type($value)
            );
        }

>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        if (is_string($value)) {
            // Match for most non printable chars somewhat taking multibyte chars into account
            if (preg_match('/[^\x09-\x0d\x20-\xff]/', $value)) {
                return 'Binary String: 0x' . bin2hex($value);
            }

<<<<<<< HEAD
            return "'" . str_replace(array("\r\n", "\n\r", "\r"), array("\n", "\n", "\n"), $value) . "'";
        }

        $origValue = $value;

        if (is_object($value)) {
            if ($value instanceof ProphecyInterface) {
                return sprintf('%s Object (*Prophecy*)', get_class($value));
            } elseif (in_array($value, $processedObjects, true)) {
                return sprintf('%s Object (*RECURSION*)', get_class($value));
            }

            $processedObjects[] = $value;

            // Convert object to array
            $value = self::toArray($value);
        }

        if (is_array($value)) {
            $whitespace = str_repeat('    ', $indentation);

            // There seems to be no other way to check arrays for recursion
            // http://www.php.net/manual/en/language.types.array.php#73936
            preg_match_all('/\n            \[(\w+)\] => Array\s+\*RECURSION\*/', print_r($value, true), $matches);
            $recursiveKeys = array_unique($matches[1]);

            // Convert to valid array keys
            // Numeric integer strings are automatically converted to integers
            // by PHP
            foreach ($recursiveKeys as $key => $recursiveKey) {
                if ((string) (integer) $recursiveKey === $recursiveKey) {
                    $recursiveKeys[$key] = (integer) $recursiveKey;
                }
            }

            $content = '';

            foreach ($value as $key => $val) {
                if (in_array($key, $recursiveKeys, true)) {
                    $val = 'Array (*RECURSION*)';
                } else {
                    $val = self::recursiveExport($val, $indentation + 1, $processedObjects);
                }

                $content .= $whitespace . '    ' . self::export($key) . ' => ' . $val . "\n";
            }

            if (strlen($content) > 0) {
                $content = "\n" . $content . $whitespace;
            }

            return sprintf(
                "%s (%s)",
                is_object($origValue) ? sprintf('%s:%s', get_class($origValue), spl_object_hash($origValue)) . ' Object' : 'Array', $content
            );
        }

        if (is_double($value) && (double)(integer) $value === $value) {
            return $value . '.0';
        }

        return (string) $value;
=======
            return "'" .
            str_replace(array("\r\n", "\n\r", "\r"), array("\n", "\n", "\n"), $value) .
            "'";
        }

        $whitespace = str_repeat(' ', 4 * $indentation);

        if (!$processed) {
            $processed = new Context;
        }

        if (is_array($value)) {
            if (($key = $processed->contains($value)) !== false) {
                return 'Array &' . $key;
            }

            $key    = $processed->add($value);
            $values = '';

            if (count($value) > 0) {
                foreach ($value as $k => $v) {
                    $values .= sprintf(
                        '%s    %s => %s' . "\n",
                        $whitespace,
                        self::recursiveExport($k, $indentation),
                        self::recursiveExport($value[$k], $indentation + 1, $processed)
                    );
                }

                $values = "\n" . $values . $whitespace;
            }

            return sprintf('Array &%s (%s)', $key, $values);
        }

        if (is_object($value)) {
            $class = get_class($value);

            if ($value instanceof ProphecyInterface) {
                return sprintf('%s Object (*Prophecy*)', $class);
            } elseif ($hash = $processed->contains($value)) {
                return sprintf('%s:%s Object', $class, $hash);
            }

            $hash   = $processed->add($value);
            $values = '';
            $array  = self::toArray($value);

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    $values .= sprintf(
                        '%s    %s => %s' . "\n",
                        $whitespace,
                        self::recursiveExport($k, $indentation),
                        self::recursiveExport($v, $indentation + 1, $processed)
                    );
                }

                $values = "\n" . $values . $whitespace;
            }

            return sprintf('%s:%s Object (%s)', $class, $hash, $values);
        }

        return var_export($value, true);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }
}
