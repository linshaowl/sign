<?php

/**
 * (c) linshaowl <linshaowl@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lswl\Signature\Algorithms;

/**
 * 算法Trait
 */
trait AlgorithmTrait
{
    /**
     * 算法
     * @var string
     */
    protected $algorithm;

    /**
     * 获取算法
     * @return string
     */
    public function getAlgorithm(): string
    {
        return $this->algorithm;
    }

    /**
     * 设置算法
     * @param string $algorithm
     * @return self
     */
    public function setAlgorithm(string $algorithm): self
    {
        $this->algorithm = $algorithm;
        return $this;
    }
}
