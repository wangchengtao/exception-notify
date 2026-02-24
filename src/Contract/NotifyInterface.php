<?php
namespace Summer\MessageNotify\Contract;

use Summer\MessageNotify\Message\AbstractMessage;
use Psr\Http\Message\ResponseInterface;

interface NotifyInterface
{
    public function notify(AbstractMessage $message): ResponseInterface;
}