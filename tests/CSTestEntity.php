<?php

namespace PhpCodeConv\Tests;

final class CSTestEntity
{

    private $line;

    private $column;

    private $source;

    private $message;

    public function __construct($line, $column, array $error)
    {
        $this->line = $line;
        $this->column = $column;
        $this->source = $error['source'];
        $this->message = $error['message'];
    }

    public function getLine()
    {
        return $this->line;
    }

    public function getColumn()
    {
        return $this->column;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
