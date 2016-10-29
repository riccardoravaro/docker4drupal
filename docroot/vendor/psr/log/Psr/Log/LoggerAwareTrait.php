<?php

namespace Psr\Log;

/**
 * Basic Implementation of LoggerAwareInterface.
 */
trait LoggerAwareTrait
{
<<<<<<< HEAD
    /** @var LoggerInterface */
=======
    /**
     * The logger instance.
     *
     * @var LoggerInterface
     */
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
    protected $logger;

    /**
     * Sets a logger.
<<<<<<< HEAD
     * 
=======
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
