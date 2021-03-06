<?php

namespace Psr\Log\Test;

<<<<<<< HEAD
use Psr\Log\LogLevel;

/**
 * Provides a base test class for ensuring compliance with the LoggerInterface
 *
 * Implementors can extend the class and implement abstract methods to run this as part of their test suite
=======
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Provides a base test class for ensuring compliance with the LoggerInterface.
 *
 * Implementors can extend the class and implement abstract methods to run this
 * as part of their test suite.
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 */
abstract class LoggerInterfaceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return LoggerInterface
     */
<<<<<<< HEAD
    abstract function getLogger();

    /**
     * This must return the log messages in order with a simple formatting: "<LOG LEVEL> <MESSAGE>"
     *
     * Example ->error('Foo') would yield "error Foo"
     *
     * @return string[]
     */
    abstract function getLogs();
=======
    abstract public function getLogger();

    /**
     * This must return the log messages in order.
     *
     * The simple formatting of the messages is: "<LOG LEVEL> <MESSAGE>".
     *
     * Example ->error('Foo') would yield "error Foo".
     *
     * @return string[]
     */
    abstract public function getLogs();
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9

    public function testImplements()
    {
        $this->assertInstanceOf('Psr\Log\LoggerInterface', $this->getLogger());
    }

    /**
     * @dataProvider provideLevelsAndMessages
     */
    public function testLogsAtAllLevels($level, $message)
    {
        $logger = $this->getLogger();
        $logger->{$level}($message, array('user' => 'Bob'));
        $logger->log($level, $message, array('user' => 'Bob'));

        $expected = array(
            $level.' message of level '.$level.' with context: Bob',
            $level.' message of level '.$level.' with context: Bob',
        );
        $this->assertEquals($expected, $this->getLogs());
    }

    public function provideLevelsAndMessages()
    {
        return array(
            LogLevel::EMERGENCY => array(LogLevel::EMERGENCY, 'message of level emergency with context: {user}'),
            LogLevel::ALERT => array(LogLevel::ALERT, 'message of level alert with context: {user}'),
            LogLevel::CRITICAL => array(LogLevel::CRITICAL, 'message of level critical with context: {user}'),
            LogLevel::ERROR => array(LogLevel::ERROR, 'message of level error with context: {user}'),
            LogLevel::WARNING => array(LogLevel::WARNING, 'message of level warning with context: {user}'),
            LogLevel::NOTICE => array(LogLevel::NOTICE, 'message of level notice with context: {user}'),
            LogLevel::INFO => array(LogLevel::INFO, 'message of level info with context: {user}'),
            LogLevel::DEBUG => array(LogLevel::DEBUG, 'message of level debug with context: {user}'),
        );
    }

    /**
<<<<<<< HEAD
     * @expectedException Psr\Log\InvalidArgumentException
=======
     * @expectedException \Psr\Log\InvalidArgumentException
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function testThrowsOnInvalidLevel()
    {
        $logger = $this->getLogger();
        $logger->log('invalid level', 'Foo');
    }

    public function testContextReplacement()
    {
        $logger = $this->getLogger();
        $logger->info('{Message {nothing} {user} {foo.bar} a}', array('user' => 'Bob', 'foo.bar' => 'Bar'));

        $expected = array('info {Message {nothing} Bob Bar a}');
        $this->assertEquals($expected, $this->getLogs());
    }

    public function testObjectCastToString()
    {
<<<<<<< HEAD
        $dummy = $this->getMock('Psr\Log\Test\DummyTest', array('__toString'));
=======
        if (method_exists($this, 'createPartialMock')) {
            $dummy = $this->createPartialMock('Psr\Log\Test\DummyTest', array('__toString'));
        } else {
            $dummy = $this->getMock('Psr\Log\Test\DummyTest', array('__toString'));
        }
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        $dummy->expects($this->once())
            ->method('__toString')
            ->will($this->returnValue('DUMMY'));

        $this->getLogger()->warning($dummy);
<<<<<<< HEAD
=======

        $expected = array('warning DUMMY');
        $this->assertEquals($expected, $this->getLogs());
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    public function testContextCanContainAnything()
    {
        $context = array(
            'bool' => true,
            'null' => null,
            'string' => 'Foo',
            'int' => 0,
            'float' => 0.5,
            'nested' => array('with object' => new DummyTest),
            'object' => new \DateTime,
            'resource' => fopen('php://memory', 'r'),
        );

        $this->getLogger()->warning('Crazy context data', $context);
<<<<<<< HEAD
=======

        $expected = array('warning Crazy context data');
        $this->assertEquals($expected, $this->getLogs());
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }

    public function testContextExceptionKeyCanBeExceptionOrOtherValues()
    {
<<<<<<< HEAD
        $this->getLogger()->warning('Random message', array('exception' => 'oops'));
        $this->getLogger()->critical('Uncaught Exception!', array('exception' => new \LogicException('Fail')));
=======
        $logger = $this->getLogger();
        $logger->warning('Random message', array('exception' => 'oops'));
        $logger->critical('Uncaught Exception!', array('exception' => new \LogicException('Fail')));

        $expected = array(
            'warning Random message',
            'critical Uncaught Exception!'
        );
        $this->assertEquals($expected, $this->getLogs());
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    }
}

class DummyTest
{
<<<<<<< HEAD
}
=======
    public function __toString()
    {
    }
}
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
