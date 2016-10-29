<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Suite for .phpt test cases.
 *
 * @since Class available since Release 3.1.4
 */
class PHPUnit_Extensions_PhptTestSuite extends PHPUnit_Framework_TestSuite
{
    /**
     * Constructs a new TestSuite for .phpt test cases.
     *
<<<<<<< HEAD
     * @param  string                      $directory
=======
     * @param string $directory
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($directory)
    {
        if (is_string($directory) && is_dir($directory)) {
            $this->setName($directory);

            $facade = new File_Iterator_Facade;
            $files  = $facade->getFilesAsArray($directory, '.phpt');

            foreach ($files as $file) {
                $this->addTestFile($file);
            }
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'directory name');
        }
    }
}
