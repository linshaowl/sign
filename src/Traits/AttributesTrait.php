<?php

/**
 * (c) linshaowl <linshaowl@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lswl\Signature\Traits;

use Lswl\Signature\Algorithms\AlgorithmInterface;
use Lswl\Signature\Algorithms\Hash;

/**
 * 属性Trait
 */
trait AttributesTrait
{
    /**
     * 加密数据
     * @var array
     */
    protected $data;

    /**
     * 密钥
     * @var string
     */
    protected $key;

    /**
     * 步骤数据
     * @var array
     */
    protected $step;

    /**
     * 签名算法
     * @var AlgorithmInterface
     */
    protected $algorithm;

    /**
     * 获取加密数据
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * 设置加密数据
     * @param array $data
     * @return self
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * 获取密钥
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * 设置密钥
     * @param string $key
     * @return self
     */
    public function setKey(string $key): self
    {
        $this->key = $key;
        return $this;
    }

    /**
     * 重置步骤
     * @return self
     */
    protected function resetStep(): self
    {
        $this->step = [];
        return $this;
    }

    /**
     * 添加步骤
     * @param string $key
     * @param string $step
     * @return self
     */
    protected function addStep(string $key, string $step): self
    {
        $this->step[$key] = $step;
        return $this;
    }

    /**
     * 获取步骤数据
     * @return array
     */
    public function getStep(): array
    {
        return $this->step;
    }

    /**
     * 获取步骤文本数据
     * @return string
     */
    public function getStepAsString(): string
    {
        $str = '';
        foreach ($this->step as $key => $value) {
            $str .= sprintf('%s: %s%s', str_replace('_', ' ', $key), $value, "\n");
        }
        return $str;
    }

    /**
     * 获取签名算法
     * @return AlgorithmInterface
     */
    public function getAlgorithm(): AlgorithmInterface
    {
        // 设置默认签名算法
        if (empty($this->algorithm)) {
            $this->algorithm = new Hash();
        }

        return $this->algorithm;
    }

    /**
     * 设置签名算法
     * @param AlgorithmInterface $algorithm
     * @return self
     */
    public function setAlgorithm(AlgorithmInterface $algorithm): self
    {
        $this->algorithm = $algorithm;
        return $this;
    }
}
