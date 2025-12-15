<?php
namespace Hicoopay\ExceptionNotify\Contract;

use Hicoopay\ExceptionNotify\Message\AbstractMessage;
use Psr\Http\Message\ResponseInterface;

interface NotifyInterface
{
    public function send(AbstractMessage $message): ResponseInterface;
}