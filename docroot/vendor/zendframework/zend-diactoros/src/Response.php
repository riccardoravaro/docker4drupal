<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @see       http://github.com/zendframework/zend-diactoros for the canonical source repository
<<<<<<< HEAD
 * @copyright Copyright (c) 2015 Zend Technologies USA Inc. (http://www.zend.com)
=======
 * @copyright Copyright (c) 2015-2016 Zend Technologies USA Inc. (http://www.zend.com)
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 * @license   https://github.com/zendframework/zend-diactoros/blob/master/LICENSE.md New BSD License
 */

namespace Zend\Diactoros;

use InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * HTTP response encapsulation.
 *
 * Responses are considered immutable; all methods that might change state are
 * implemented such that they retain the internal state of the current
 * message and return a new instance that contains the changed state.
 */
class Response implements ResponseInterface
{
    use MessageTrait;

    /**
     * Map of standard HTTP status code/reason phrases
     *
     * @var array
     */
    private $phrases = [
        // INFORMATIONAL CODES
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        // SUCCESS CODES
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
<<<<<<< HEAD
=======
        226 => 'IM used',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        // REDIRECTION CODES
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
<<<<<<< HEAD
        306 => 'Switch Proxy', // Deprecated
        307 => 'Temporary Redirect',
=======
        306 => 'Switch Proxy', // Deprecated to 306 => '(Unused)'
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        // CLIENT ERROR
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Large',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
<<<<<<< HEAD
=======
        421 => 'Misdirected Request',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
<<<<<<< HEAD
        // SERVER ERROR
=======
        444 => 'Connection Closed Without Response',
        451 => 'Unavailable For Legal Reasons',
        // SERVER ERROR
        499 => 'Client Closed Request',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
<<<<<<< HEAD
        511 => 'Network Authentication Required',
=======
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
        599 => 'Network Connect Timeout Error',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    ];

    /**
     * @var string
     */
    private $reasonPhrase = '';

    /**
     * @var int
     */
<<<<<<< HEAD
    private $statusCode = 200;

    /**
     * @param string|resource|StreamInterface $stream Stream identifier and/or actual stream resource
=======
    private $statusCode;

    /**
     * @param string|resource|StreamInterface $body Stream identifier and/or actual stream resource
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @param int $status Status code for the response, if any.
     * @param array $headers Headers for the response, if any.
     * @throws InvalidArgumentException on any invalid element.
     */
    public function __construct($body = 'php://memory', $status = 200, array $headers = [])
    {
<<<<<<< HEAD
        if (! is_string($body) && ! is_resource($body) && ! $body instanceof StreamInterface) {
            throw new InvalidArgumentException(
                'Stream must be a string stream resource identifier, '
                . 'an actual stream resource, '
                . 'or a Psr\Http\Message\StreamInterface implementation'
            );
        }

        if (null !== $status) {
            $this->validateStatus($status);
        }

        $this->stream     = ($body instanceof StreamInterface) ? $body : new Stream($body, 'wb+');
        $this->statusCode = $status ? (int) $status : 200;

=======
        $this->setStatusCode($status);
        $this->stream = $this->getStream($body, 'wb+');
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        list($this->headerNames, $headers) = $this->filterHeaders($headers);
        $this->assertHeaders($headers);
        $this->headers = $headers;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getReasonPhrase()
    {
        if (! $this->reasonPhrase
            && isset($this->phrases[$this->statusCode])
        ) {
            $this->reasonPhrase = $this->phrases[$this->statusCode];
        }

        return $this->reasonPhrase;
    }

    /**
     * {@inheritdoc}
     */
    public function withStatus($code, $reasonPhrase = '')
    {
<<<<<<< HEAD
        $this->validateStatus($code);
        $new = clone $this;
        $new->statusCode   = (int) $code;
=======
        $new = clone $this;
        $new->setStatusCode($code);
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        $new->reasonPhrase = $reasonPhrase;
        return $new;
    }

    /**
     * Validate a status code.
     *
     * @param int|string $code
     * @throws InvalidArgumentException on an invalid status code.
     */
<<<<<<< HEAD
    private function validateStatus($code)
=======
    private function setStatusCode($code)
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    {
        if (! is_numeric($code)
            || is_float($code)
            || $code < 100
            || $code >= 600
        ) {
            throw new InvalidArgumentException(sprintf(
                'Invalid status code "%s"; must be an integer between 100 and 599, inclusive',
                (is_scalar($code) ? $code : gettype($code))
            ));
        }
<<<<<<< HEAD
=======
        $this->statusCode = $code;
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    /**
     * Ensure header names and values are valid.
     *
     * @param array $headers
     * @throws InvalidArgumentException
     */
    private function assertHeaders(array $headers)
    {
        foreach ($headers as $name => $headerValues) {
            HeaderSecurity::assertValidName($name);
            array_walk($headerValues, __NAMESPACE__ . '\HeaderSecurity::assertValid');
        }
    }
}
