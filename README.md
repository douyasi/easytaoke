### 介绍

Fork 自 [Douyasi/easytaoke](https://github.com/Douyasi/easytaoke)，移除 `Laravel` 相关依赖，使其可以适配任何遵循 `PSR-4` 规范的框架。淘宝联盟、京东联盟、多多进宝等 `SDK` 的封装类库。

### 使用方法


1、安装扩展包

```bash
composer require  "douyasi/easytaoke:dev-master"
```

2、淘宝SDK初始化

```php
<?php

use Douyasi\EasyTaoKe\Factory;
use Douyasi\EasyTaoKe\TaoBao\Request\TbkItemInfoGetRequest;

$taobaoConfig = [
    'app_key' => '25660213',  // app_key
    'app_secret' => 'd3a6a3ea6668e4b8f1e0bc9bd3a1650b',  // app_secret
    'redirect_url' => 'http://local.test/callback',  // 根据实际填写回调 url
    'format' => 'json',  // 格式
];

// 上述 `app_key` 与 `app_secret` 并不能使用，请根据申请的淘宝客账号实际填写
$client = Factory::taobao($taobaoConfig);
$req = new TbkItemInfoGetRequest();
$numIids = '546695379897';  // 商品ID串，用,分割，最大40个
$req->setNumIids($numIids);
return $client->execute($req);
```

3、京东、拼多多等 `SDK` 初始化基本类似，请自行摸索。
