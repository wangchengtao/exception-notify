<?php

namespace Hicoopay\ExceptionNotify\Tests;

use Hicoopay\ExceptionNotify\Channel\Dingtalk;
use Hicoopay\ExceptionNotify\Client;
use Hicoopay\ExceptionNotify\Template\DingTalk\DingtalkText;
use Hicoopay\ExceptionNotify\Template\Text;

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