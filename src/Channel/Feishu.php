<?php

namespace Summer\ExceptionNotify\Channel;

use Summer\ExceptionNotify\Exception\NotifyException;
use Summer\ExceptionNotify\Message\AbstractMessage;
use Psr\Http\Message\ResponseInterface;

class Feishu extends AbstractChannel
{
    protected $baseUrl = 'https://open.feishu.cn/open-apis/bot/v2/hook/';

    public function handleResponse(ResponseInterface $response): void
    {
        $res = json_decode($response->getBody(), true);

        if ($res['StatusCode'] !== 0) {
            throw new NotifyException($res['msg']);
        }
    }

    public function notify(AbstractMessage $message): ResponseInterface
    {
        return $this->getClient()->post($this->baseUrl . $this->config['access_token'], [
            'json' => $this->getBody() + $message->getBody(),
        ]);
    }

    protected function getBody()
    {
        $timestamp = time();

        $str = hash_hmac('sha256', '', $timestamp ."\n". $this->config['secret'], true);
        $sign = base64_encode($str);

        return [
            'timestamp' => $timestamp,
            'sign' => $sign,
        ];
    }
}