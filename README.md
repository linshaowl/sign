## 介绍

> 使用多种方式生成计算签名，并记录签名步骤。

## 安装

使用以下命令安装：
```
composer require lswl/sign
```

## 使用

### 简易使用方式：

```php
use Lswl\Signature\HttpBuildQuery;
use Lswl\Signature\Json;

// 数据
$data = [
    'key' => 'value',
];
// 密钥
$key = 'key';

// 使用 http_build_query 方式签名
$sign = (new HttpBuildQuery($data, $key))->sign();

// 使用 json 方式签名
$sign = (new Json($data, $key))->sign();
```

### 完整使用方式：

```php
use Lswl\Signature\HttpBuildQuery;
use Lswl\Signature\Algorithms\Hash;

// 签名实例
$sign = new HttpBuildQuery();

// 算法(默认md5)
$algorithm = new Hash();
// 使用 sha256 算法
$algorithm->setAlgorithm('sha256');

// 设置签名数据、密钥、算法
$sign->setData(['key' => 'value'])
    ->setKey('key')
    ->setAlgorithm($algorithm);

// 签名结果字符串
$signStr = $sign->sign();

// 签名步骤数据
$stepArr = $sign->getStep();
// 签名步骤数据字符串
$stepStr = $sign->getStepAsString();
```

## 扩展

### 添加新的签名方式

> 继承 `\Lswl\Signature\AbstractSignature` 并实现方法 `buildSignStr`

```php
use Lswl\Signature\AbstractSignature;

class Serialize extends AbstractSignature
{
    /**
     * @inheritDoc
     */
    protected function buildSignStr(array $data): string
    {
        return serialize($data);
    }
}

// 数据
$data = [
    'key' => 'value',
];
// 密钥
$key = 'key';
// 使用 serialize 方式签名
$sign = (new Serialize($data, $key))->sign();
```

### 添加新的算法

> 继承 `\Lswl\Signature\Algorithms\AbstractAlgorithm` 并实现方法 `run`

```php
use Lswl\Signature\Algorithms\AbstractAlgorithm;
use Lswl\Signature\Json;

class Md5 extends AbstractAlgorithm
{
    /**
     * @inheritDoc
     */
    public function run(string $str): string
    {
        return md5($str);
    }
}

// 数据
$data = [
    'key' => 'value',
];
// 密钥
$key = 'key';
// 使用 json 方式签名, 并设置 Md5 算法
$sign = (new Json($data, $key))
    ->setAlgorithm(new Md5())
    ->sign();
```
