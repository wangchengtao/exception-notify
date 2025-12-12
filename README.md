## 消息通知组件

## 功能
* 监控异常
* 支持多种通道(钉钉群机器人 飞书群机器人 企业微信群机器人)
* 支持扩展自定义通道

## 环境要求
* php: >= 7.2

## 安装
```bash
composer require hicoopay/exception-notify
```

## 使用
```php
$channel = new Dingtalk([
    'access_token' => 'xxxxxxxxxxxxx',
]);

$client = new Client($channel);

$text = new DingtalkText();
$text->setTitle('测试');
$text->setContent('异常测试');
$text->setAt([
    '187*****897',
]);

$client->send($text);
```