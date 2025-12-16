<?php

namespace Summer\ExceptionNotify\Message\Dingtalk;

use Summer\ExceptionNotify\Message\Markdown;

class DingtalkMarkdown extends Markdown
{
    public function getBody(): array
    {
        return [
            'msgtype' => 'markdown',
            'markdown' => [
                'text' => $this->getContent(),
                'title' => $this->getTitle(),
            ],
            'at' => [
                'isAtAll' => $this->isAtAll(),
                'atMobiles' => $this->getAt(),
            ],
        ];
    }
}