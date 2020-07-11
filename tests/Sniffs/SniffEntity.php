<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs;

final class SniffEntity
{

    private $key;

    private $line;

    private $column;

    private $source;

    private $message;

    public static function createKey(int $line, int $column, string $source) : string
    {
        return sprintf('%d:%d:%s', $line, $column, $source);
    }

    public function __construct(int $line, int $column, string $source, string $message)
    {
        $this->line = $line;
        $this->column = $column;
        $this->source = $source;
        $this->message = $message;

        $this->key = self::createKey($line, $column, $source);
    }

    public function getKey() : string
    {
        return $this->key;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function toString() : string
    {
        return sprintf(
            "%s (Line %d:%d)\n%s\n\n",
            $this->source,
            $this->line,
            $this->column,
            $this->message
        );
    }
}
