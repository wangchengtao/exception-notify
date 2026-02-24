<?php
namespace Summer\MessageNotify;


use Summer\MessageNotify\Channel\AbstractChannel;
use Summer\MessageNotify\Message\AbstractMessage;

class Client
{
    /**
     * @var \Summer\MessageNotify\Channel\AbstractChannel
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
     * @throws \Summer\MessageNotify\Exception\NotifyException
     */
    public function send(AbstractMessage $message): void
    {
        $this->channel->send($message);
    }
}