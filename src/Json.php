<?php

/**
 * (c) linshaowl <linshaowl@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lswl\Signature;

/**
 * json 方式签名
 */
class Json extends AbstractSignature
{
    /**
     * @inheritDoc
     */
    protected function buildSignStr(array $data): string
    {
        return json_encode($data) ?: '';
    }
}
