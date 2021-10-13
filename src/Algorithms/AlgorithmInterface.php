<?php

/**
 * (c) linshaowl <linshaowl@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lswl\Signature\Algorithms;

/**
 * 算法接口
 */
interface AlgorithmInterface
{
    /**
     * 运行
     * @param string $str
     * @return string
     */
    public function run(string $str): string;
}
