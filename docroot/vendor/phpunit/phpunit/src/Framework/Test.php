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
 * A Test can be run and collect its results.
 *
 * @since      Interface available since Release 2.0.0
 */
interface PHPUnit_Framework_Test extends Countable
{
    /**
     * Runs a test and collects its result in a TestResult instance.
     *
<<<<<<< HEAD
     * @param  PHPUnit_Framework_TestResult $result
=======
     * @param PHPUnit_Framework_TestResult $result
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @return PHPUnit_Framework_TestResult
     */
    public function run(PHPUnit_Framework_TestResult $result = null);
}
