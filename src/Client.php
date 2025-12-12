<?php
namespace Hicoopay\ExceptionNotify;


use Hicoopay\ExceptionNotify\Channel\AbstractChannel;
use Hicoopay\ExceptionNotify\Template\AbstractMessage;

class Client
{
    /**
     * @var \Hicoopay\ExceptionNotify\Channel\AbstractChannel
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
     * @throws \Hicoopay\ExceptionNotify\Exception\NotifyException
     */
    public function send(AbstractMessage $message): void
    {
        $res = $this->channel->send($message);
        $this->channel->handleResponse($res);
    }
}