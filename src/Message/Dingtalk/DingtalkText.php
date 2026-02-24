<?php

namespace Summer\MessageNotify\Message\Dingtalk;

use Summer\MessageNotify\Message\Text;

class DingtalkText extends Text
{
    public function getBody(): array
    {
        return [
            'msgtype' => 'text',
            'text' => [
                'content' => $this->getContent(),
            ],
            'at' => [
                'isAtAll' => $this->isAtAll(),
                'atMobiles' => $this->getAt(),
            ],
        ];
    }
}