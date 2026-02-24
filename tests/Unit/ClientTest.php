<?php

namespace Summer\MessageNotify\Tests\Unit;

use Summer\MessageNotify\Channel\Dingtalk;
use Summer\MessageNotify\Client;
use Summer\MessageNotify\Message\Dingtalk\DingtalkMarkdown;
use Summer\MessageNotify\Message\Dingtalk\DingtalkText;
use Summer\MessageNotify\Tests\TestCase;

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