<?php
namespace Summer\ExceptionNotify\Contract;

use Summer\ExceptionNotify\Message\AbstractMessage;
use Psr\Http\Message\ResponseInterface;

interface NotifyInterface
{
    public function send(AbstractMessage $message): ResponseInterface;
}