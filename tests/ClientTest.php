<?php

namespace Summer\ExceptionNotify\Tests;

use Summer\ExceptionNotify\Channel\Dingtalk;
use Summer\ExceptionNotify\Client;
use Summer\ExceptionNotify\Message\DingtalkText;
use Summer\ExceptionNotify\Message\Text;

class ClientTest extends TestCase
{
    public function test_dingtalk()
    {
        $channel = new Dingtalk([
            'access_token' => '*******************',
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
}