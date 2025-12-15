<?php
namespace Summer\ExceptionNotify;


use Summer\ExceptionNotify\Channel\AbstractChannel;
use Summer\ExceptionNotify\Message\AbstractMessage;

class Client
{
    /**
     * @var \Summer\ExceptionNotify\Channel\AbstractChannel
     */
    protected  $channel;

    public function __construct(AbstractChannel $channel)
    {
        $this->channel = $channel;
    }

    public function setChannel(AbstractChannel $channel): Client
    {
        $this->channel = $channel;
        return $this;
    }

    /**
     * @throws \Summer\ExceptionNotify\Exception\NotifyException
     */
    public function send(AbstractMessage $message): void
    {
        $res = $this->channel->send($message);
        $this->channel->handleResponse($res);
    }
}