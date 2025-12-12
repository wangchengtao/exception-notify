<?php

namespace Hicoopay\ExceptionNotify\Template\DingTalk;

use Hicoopay\ExceptionNotify\Template\Text;

class DingtalkText extends Text
{
    protected $isAtAll = false;

    public function isAtAll(): DingtalkText
    {
        $this->isAtAll = true;
        return $this;
    }

    public function getBody(): array
    {
        return [
            'msgtype' => 'text',
            'text' => [
                'content' => $this->getContent(),
            ],
            'at' => [
                'isAtAll' => $this->isAtAll,
                'atMobiles' => $this->getAt(),
            ],
        ];
    }
}