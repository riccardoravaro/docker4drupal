<?php
/*
 * This file is part of the Diff package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Diff\LCS;

/**
 * Interface for implementations of longest common subsequence calculation.
<<<<<<< HEAD
 *
 * @package    Diff
 * @author     Sebastian Bergmann <sebastian@phpunit.de>
 * @author     Kore Nordmann <mail@kore-nordmann.de>
 * @copyright  Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.github.com/sebastianbergmann/diff
=======
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
 */
interface LongestCommonSubsequence
{
    /**
     * Calculates the longest common subsequence of two arrays.
     *
<<<<<<< HEAD
     * @param  array $from
     * @param  array $to
=======
     * @param array $from
     * @param array $to
     *
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
     * @return array
     */
    public function calculate(array $from, array $to);
}
