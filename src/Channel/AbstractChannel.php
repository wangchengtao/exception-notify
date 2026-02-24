<?php
namespace Summer\MessageNotify\Channel;

use GuzzleHttp\Client;
use Summer\MessageNotify\Contract\NotifyInterface;
use Summer\MessageNotify\Exception\NotifyException;
use Psr\Http\Message\ResponseInterface;
use Summer\MessageNotify\Message\AbstractMessage;

abstract class AbstractChannel implements NotifyInterface
{
    /**
     * @var array
     */
    protected $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getClient(): Client
    {
        return new Client();
    }

    public function send(AbstractMessage $message): void
    {
        $res = $this->notify($message);
        $this->handleResponse($res);
    }

    /**
     * @throws NotifyException
     */
    abstract public function handleResponse(ResponseInterface $response): void;
}