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
 * A Decorator that runs a test repeatedly.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Extensions_RepeatedTest extends PHPUnit_Extensions_TestDecorator
{
    /**
     * @var bool
     */
    protected $processIsolation = false;

    /**
     * @var int
     */
    protected $timesRepeat = 1;

    /**
<<<<<<< HEAD
     * @param  PHPUnit_Framework_Test      $test
     * @param  int                         $timesRepeat
     * @param  bool                        $processIsolation
=======
     * @param PHPUnit_Framework_Test $test
     * @param int                    $timesRepeat
     * @param bool                   $processIsolation
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct(PHPUnit_Framework_Test $test, $timesRepeat = 1, $processIsolation = false)
    {
        parent::__construct($test);

        if (is_integer($timesRepeat) &&
            $timesRepeat >= 0) {
            $this->timesRepeat = $timesRepeat;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'positive integer'
            );
        }

        $this->processIsolation = $processIsolation;
    }

    /**
     * Counts the number of test cases that
     * will be run by this test.
     *
     * @return int
     */
    public function count()
    {
        return $this->timesRepeat * count($this->test);
    }

    /**
     * Runs the decorated test and collects the
     * result in a TestResult.
     *
<<<<<<< HEAD
     * @param  PHPUnit_Framework_TestResult $result
     * @return PHPUnit_Framework_TestResult
=======
     * @param PHPUnit_Framework_TestResult $result
     *
     * @return PHPUnit_Framework_TestResult
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @throws PHPUnit_Framework_Exception
     */
    public function run(PHPUnit_Framework_TestResult $result = null)
    {
        if ($result === null) {
            $result = $this->createResult();
        }

        //@codingStandardsIgnoreStart
        for ($i = 0; $i < $this->timesRepeat && !$result->shouldStop(); $i++) {
            //@codingStandardsIgnoreEnd
            if ($this->test instanceof PHPUnit_Framework_TestSuite) {
                $this->test->setRunTestInSeparateProcess($this->processIsolation);
            }
            $this->test->run($result);
        }

        return $result;
    }
}
