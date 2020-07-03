<?php declare(strict_types=1);

namespace PhpCodeConv\Tests;

final class CSTestEntity
{

    private $line;

    private $column;

    /** @var string */
    private $source;

    /** @var string */
    private $message;

    /** @param string[] $error */
    public function __construct(int $line, int $column, array $error)
    {
        $this->line = $line;
        $this->column = $column;
        $this->source = $error['source'];
        $this->message = $error['message'];
    }

    public function getLine() : int
    {
        return $this->line;
    }

    public function getColumn() : int
    {
        return $this->column;
    }

    public function getSource() : string
    {
        return $this->source;
    }

    public function getMessage() : string
    {
        return $this->message;
    }
}
