<?php

namespace Summer\ExceptionNotify\Message;

use Summer\ExceptionNotify\Message\Text;

class FeishuText extends Text
{
    public function getBody(): array
    {
        return [
            'msg_type' => 'text',
            'content' => [
                'text' => $this->getContent() . $this->getFeiShuAt(),
            ],
        ];
    }

    protected function getFeiShuAt(): string
    {
        if ($this->isAtAll()) {
            return '<at user_id="all">所有人</at>';
        }

        $at = $this->getAt();
        $result = '';

        foreach ($at as $item) {
            if (false === strpos($item, '@')) {
                $result .= '<at phone="' . $item . '">' . $item . '</at>';
            } else {
                $result .= '<at email="' . $item . '">' . $item . '</at>';
            }
        }
        return $result;
    }
}