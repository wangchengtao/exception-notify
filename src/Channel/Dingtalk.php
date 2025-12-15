<?php

namespace Hicoopay\ExceptionNotify\Channel;

use Hicoopay\ExceptionNotify\Exception\NotifyException;
use Hicoopay\ExceptionNotify\Message\AbstractMessage;
use Psr\Http\Message\ResponseInterface;

class Dingtalk extends AbstractChannel
{
    /**
     * @var string
     */
    protected $baseUrl = 'https://oapi.dingtalk.com/robot/send';

    public function send(AbstractMessage $message): ResponseInterface
    {
        if (!$this->config['keyword']) {
            return $this->getClient()->post($this->baseUrl, [
                'query' => [
                    'access_token' => $this->config['access_token'],
                ],
                'json' => $message->getBody(),
            ]);
        }

        if ($this->config['auth_type'] == 'sign') {
            return $this->getClient()->post($this->baseUrl, [
                'query' => $this->getQuery(),
                'json' => $message->getBody(),
            ]);
        }

        throw new NotifyException('安全设置仅支持 keyword, sign');
    }


    public function handleResponse(ResponseInterface $response): void
    {
        $res = json_decode($response->getBody(), true);

        if ($res['errcode'] !== 0) {
            throw new NotifyException($res['errmsg']);
        }
    }

    protected function getQuery(): array
    {
        $timestamp = time() * 1000;

        $str = hash_hmac('sha256', $timestamp ."\n". $this->config['secret'], $this->config['secret'], true);
        $sign = urlencode(base64_encode($str));

        return [
            'access_token' => $this->config['access_token'],
            'timestamp' => $timestamp,
            'sign' => $sign,
        ];
    }
}