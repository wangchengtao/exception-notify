<?php

namespace Hicoopay\ExceptionNotify\Template;

abstract class AbstractMessage
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $content;

    /**
     * @var array
     */
    protected $at;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): AbstractMessage
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): AbstractMessage
    {
        $this->content = $content;
        return $this;
    }

    public function getAt(): array
    {
        return $this->at;
    }

    public function setAt(array $at): AbstractMessage
    {
        $this->at = $at;
        return $this;
    }


    abstract public function getBody(): array;
}