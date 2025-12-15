<?php

namespace Summer\ExceptionNotify\Message;

use Summer\ExceptionNotify\Message\Markdown;

class FeishuMarkdown extends Markdown
{
    public function getBody(): array
    {
        return [
            'msg_type' => 'post',
            'content' => [
                'post' => [
                    'zh_cn' => [
                        'title' => $this->getTitle(),
                        'content' => [
                            $this->getContent(),
                        ]
                    ]
                ]
            ]
        ];
    }

    protected function getPostContent(): array
    {
        $content = is_array($this->getContent()) ? $this->getContent() : json_decode($this->getContent(), true) ?? [
            [
                'tag' => 'text',
                'text' => $this->getContent(),
            ],
        ];

        $at = $this->getFeiShuAt();

        return array_merge($content, $at);
    }

    protected function getFeiShuAt(): array
    {
        $result = [];
        if ($this->isAtAll()) {
            $result[] = [
                'tag' => 'at',
                'user_id' => 'all',
            ];

            return $result;
        }

        $at = $this->getAt();
        foreach ($at as $item) {
            // TODO 需要加入邮箱与收集@人
            if (strchr($item, '@') === false) {
                $result[] = [
                    'tag' => 'at',
                    'email' => $item,
                ];
            } else {
                $result[] = [
                    'tag' => 'at',
                    'user_id' => $item,
                ];
            }
        }

        return $result;
    }
}