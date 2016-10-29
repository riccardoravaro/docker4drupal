<?php

namespace Psr\Log;

/**
<<<<<<< HEAD
 * This Logger can be used to avoid conditional log calls
=======
 * This Logger can be used to avoid conditional log calls.
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 *
 * Logging should always be optional, and if no logger is provided to your
 * library creating a NullLogger instance to have something to throw logs at
 * is a good way to avoid littering your code with `if ($this->logger) { }`
 * blocks.
 */
class NullLogger extends AbstractLogger
{
    /**
     * Logs with an arbitrary level.
     *
<<<<<<< HEAD
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
=======
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function log($level, $message, array $context = array())
    {
        // noop
    }
}
