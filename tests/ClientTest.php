<?php

namespace Summer\ExceptionNotify\Tests;

use Summer\ExceptionNotify\Channel\Dingtalk;
use Summer\ExceptionNotify\Client;
use Summer\ExceptionNotify\Message\Dingtalk\DingtalkMarkdown;
use Summer\ExceptionNotify\Message\Dingtalk\DingtalkText;

class ClientTest extends TestCase
{
    public function test_dingtalk_text()
    {
        $channel = new Dingtalk([
            'access_token' => '*******************',
            'auth_type' => 'sign',
            'secret' => 'xxxxxxxxxxxxxxxxxxxx',
            'at' => [],
        ]);

        $client = new Client($channel);

        $text = new DingtalkText();
        $text->setTitle('测试');
        $text->setContent('异常测试');
        $text->setAt([
            '******',
        ]);

        $client->send($text);
    }

    public function test_dingtalk_markdown()
    {
        $channel = new Dingtalk([
            'access_token' => '*******************',
            'auth_type' => 'sign',
            'secret' => 'xxxxxxxxxxxxxxxxxxxx',
            'at' => [],
        ]);

        $client = new Client($channel);

        $markdown = new DingtalkMarkdown();
        $markdown->setTitle('Markdown消息标题');
        $markdown->setContent("#### 这是Markdown消息内容 \n ![图片](https://example.com/image.png)");
        $markdown->atAll();

        $client->send($markdown);
    }
}