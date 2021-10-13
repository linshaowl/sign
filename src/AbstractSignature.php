<?php

/**
 * (c) linshaowl <linshaowl@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lswl\Signature;

use Lswl\Signature\Traits\AttributesTrait;

/**
 * 抽象签名类
 */
abstract class AbstractSignature
{
    use AttributesTrait;

    public function __construct(array $data = [], string $key = '')
    {
        $this->data = $data;
        $this->key = $key;
    }

    /**
     * 构造签名字符串
     * @param array $data
     * @return string
     */
    abstract protected function buildSignStr(array $data): string;

    /**
     * 签名
     * @return string
     */
    public function sign(): string
    {
        // 重置步骤数据
        $this->resetStep();

        // 源数据
        $data = $this->getData();
        $this->addStep('origin', json_encode($data) ?: '');

        // 排序数据
        ksort($data);
        $this->addStep('sort', json_encode($data) ?: '');

        // 构造签名字符串
        $build = $this->buildSignStr($data);
        $this->addStep('build', $build);

        // 待签名字符串
        $str = sprintf('%s%s%s', $this->getKey(), $build, $this->getKey());
        $this->addStep('wait_sign_str', $str);

        // 签名字符串
        $sign = $this->getAlgorithm()->run($str);
        $this->addStep('sign', $sign);

        return $sign;
    }
}
