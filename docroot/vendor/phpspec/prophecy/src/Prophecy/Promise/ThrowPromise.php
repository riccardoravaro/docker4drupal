<?php

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Prophecy\Promise;

use Doctrine\Instantiator\Instantiator;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Exception\InvalidArgumentException;
use ReflectionClass;

/**
 * Throw promise.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class ThrowPromise implements PromiseInterface
{
    private $exception;

    /**
     * @var \Doctrine\Instantiator\Instantiator
     */
    private $instantiator;

    /**
     * Initializes promise.
     *
     * @param string|\Exception $exception Exception class name or instance
     *
     * @throws \Prophecy\Exception\InvalidArgumentException
     */
    public function __construct($exception)
    {
        if (is_string($exception)) {
            if (!class_exists($exception)
             && 'Exception' !== $exception
             && !is_subclass_of($exception, 'Exception')) {
                throw new InvalidArgumentException(sprintf(
                    'Exception class or instance expected as argument to ThrowPromise, but got %s.',
<<<<<<< HEAD
                    gettype($exception)
=======
                    $exception
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
                ));
            }
        } elseif (!$exception instanceof \Exception) {
            throw new InvalidArgumentException(sprintf(
                'Exception class or instance expected as argument to ThrowPromise, but got %s.',
<<<<<<< HEAD
                gettype($exception)
=======
                is_object($exception) ? get_class($exception) : gettype($exception)
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            ));
        }

        $this->exception = $exception;
    }

    /**
     * Throws predefined exception.
     *
     * @param array          $args
     * @param ObjectProphecy $object
     * @param MethodProphecy $method
     *
     * @throws object
     */
    public function execute(array $args, ObjectProphecy $object, MethodProphecy $method)
    {
        if (is_string($this->exception)) {
            $classname   = $this->exception;
            $reflection  = new ReflectionClass($classname);
            $constructor = $reflection->getConstructor();

            if ($constructor->isPublic() && 0 == $constructor->getNumberOfRequiredParameters()) {
                throw $reflection->newInstance();
            }

            if (!$this->instantiator) {
                $this->instantiator = new Instantiator();
            }

            throw $this->instantiator->instantiate($classname);
        }

        throw $this->exception;
    }
}
