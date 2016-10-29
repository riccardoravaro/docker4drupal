<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Exception;

/**
 * Represents an incorrect command name typed in the console.
 *
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */
class CommandNotFoundException extends \InvalidArgumentException implements ExceptionInterface
{
    private $alternatives;

    /**
<<<<<<< HEAD
     * @param string    $message      Exception message to throw.
     * @param array     $alternatives List of similar defined names.
     * @param int       $code         Exception code.
     * @param Exception $previous     previous exception used for the exception chaining.
=======
     * @param string    $message      Exception message to throw
     * @param array     $alternatives List of similar defined names
     * @param int       $code         Exception code
     * @param Exception $previous     previous exception used for the exception chaining
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function __construct($message, array $alternatives = array(), $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->alternatives = $alternatives;
    }

    /**
<<<<<<< HEAD
     * @return array A list of similar defined names.
=======
     * @return array A list of similar defined names
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     */
    public function getAlternatives()
    {
        return $this->alternatives;
    }
}
