<?php

namespace Summer\ExceptionNotify\Message\Dingtalk;

use Summer\ExceptionNotify\Message\Text;

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