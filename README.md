### 介绍

Fork 自 [cstopery/easytaoke](https://github.com/cstopery/easytaoke)，移除 `Laravel` 相关依赖，使其可以适配任何遵循 `PSR-4` 规范的框架。淘宝联盟、京东联盟、多多进宝等 `SDK` 的封装类库。

### 使用方法


1、安装扩展包

```bash
composer require  "douyasi/easytaoke:dev-master"
```

2、淘宝SDK初始化

```php
<?php

use Cstopery\EasyTaoKe\Factory;
use Cstopery\EasyTaoKe\TaoBao\Request\TbkItemInfoGetRequest;

$taobaoConfig = [
    'app_key' => '25660213',
    'app_secret' => 'd3a6a3ea6668e4b8f1e0bc9bd3a1650b',
    'redirect_url' => 'http://local.test/callback',  // 根据实际填写回调 url
    'format' => 'json',
];
$client = Factory::taobao($taobaoConfig);
$req = new TbkItemInfoGetRequest();
$numIds = '556633720749';  // 商品ID串，用,分割，最大40个
$req->setNumIids($numIids);
return $client->execute($req);
```

3、京东、拼多多等 `SDK` 初始化基本类似，请自行摸索。
