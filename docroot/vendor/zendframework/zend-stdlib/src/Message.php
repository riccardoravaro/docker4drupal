<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Zend\Stdlib;

use Traversable;

class Message implements MessageInterface
{
    /**
     * @var array
     */
    protected $metadata = [];

    /**
     * @var string
     */
    protected $content = '';

    /**
     * Set message metadata
     *
     * Non-destructive setting of message metadata; always adds to the metadata, never overwrites
     * the entire metadata container.
     *
     * @param  string|int|array|Traversable $spec
     * @param  mixed $value
     * @throws Exception\InvalidArgumentException
     * @return Message
     */
    public function setMetadata($spec, $value = null)
    {
        if (is_scalar($spec)) {
            $this->metadata[$spec] = $value;
            return $this;
        }
<<<<<<< HEAD
        if (!is_array($spec) && !$spec instanceof Traversable) {
=======
        if (! is_array($spec) && ! $spec instanceof Traversable) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            throw new Exception\InvalidArgumentException(sprintf(
                'Expected a string, array, or Traversable argument in first position; received "%s"',
                (is_object($spec) ? get_class($spec) : gettype($spec))
            ));
        }
        foreach ($spec as $key => $value) {
            $this->metadata[$key] = $value;
        }
        return $this;
    }

    /**
     * Retrieve all metadata or a single metadatum as specified by key
     *
     * @param  null|string|int $key
     * @param  null|mixed $default
     * @throws Exception\InvalidArgumentException
     * @return mixed
     */
    public function getMetadata($key = null, $default = null)
    {
        if (null === $key) {
            return $this->metadata;
        }

<<<<<<< HEAD
        if (!is_scalar($key)) {
=======
        if (! is_scalar($key)) {
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            throw new Exception\InvalidArgumentException('Non-scalar argument provided for key');
        }

        if (array_key_exists($key, $this->metadata)) {
            return $this->metadata[$key];
        }

        return $default;
    }

    /**
     * Set message content
     *
     * @param  mixed $value
     * @return Message
     */
    public function setContent($value)
    {
        $this->content = $value;
        return $this;
    }

    /**
     * Get message content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $request = '';
        foreach ($this->getMetadata() as $key => $value) {
            $request .= sprintf(
                "%s: %s\r\n",
                (string) $key,
                (string) $value
            );
        }
        $request .= "\r\n" . $this->getContent();
        return $request;
    }
}
