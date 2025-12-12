<?php
namespace Hicoopay\ExceptionNotify\Channel;

use GuzzleHttp\Client;
use Hicoopay\ExceptionNotify\Contract\NotifyInterface;
use Hicoopay\ExceptionNotify\Exception\NotifyException;
use Psr\Http\Message\ResponseInterface;

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

    /**
     * @throws NotifyException
     */
    abstract public function handleResponse(ResponseInterface $response): void;
}