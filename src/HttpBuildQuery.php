<?php

/**
 * (c) linshaowl <linshaowl@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lswl\Signature;

/**
 * http_build_query 方式签名
 */
class HttpBuildQuery extends AbstractSignature
{
    /**
     * @inheritDoc
     */
    protected function buildSignStr(array $data): string
    {
        return http_build_query($data, '', '&', PHP_QUERY_RFC3986);
    }
}
