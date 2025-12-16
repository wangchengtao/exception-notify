<?php
namespace Summer\ExceptionNotify\Channel;

use GuzzleHttp\Client;
use Summer\ExceptionNotify\Contract\NotifyInterface;
use Summer\ExceptionNotify\Exception\NotifyException;
use Psr\Http\Message\ResponseInterface;
use Summer\ExceptionNotify\Message\AbstractMessage;

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