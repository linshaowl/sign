<?php

/**
 * (c) linshaowl <linshaowl@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lswl\Signature\Algorithms;

/**
 * Hash算法
 */
class Hash extends AbstractAlgorithm
{
    /**
     * 算法
     * @var string
     */
    protected $algorithm = 'md5';

    /**
     * @inheritDoc
     */
    public function run(string $str): string
    {
        return hash($this->algorithm, $str);
    }
}
