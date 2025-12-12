<?php

namespace Hicoopay\ExceptionNotify\Template\DingTalk;

use Hicoopay\ExceptionNotify\Template\Markdown;

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
                'atMobiles' => $this->getAt(),
            ],
        ];
    }
}