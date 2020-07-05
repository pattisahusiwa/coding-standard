<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs;

use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{

    /** @var Validator */
    private static $validator;

    abstract protected function getFilename() : string;

    /** @phpstan-ignore-next-line */
    final public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /** @return string[] */
    protected function getExcludeSniff() : array
    {
        return [];
    }

    /** @return void */
    final public static function setUpBeforeClass()
    {
        self::$validator = new Validator();

        $filepath = dirname(__DIR__) . '/Inc/' . (new static)->getFilename();

        self::$validator->setFile($filepath, (new static)->getExcludeSniff());
    }

    /** @return void */
    final public static function tearDownAfterClass()
    {
        if (self::$validator->errorCount() > 0) {
            printf("\n\n");
            self::$validator->printError();
        }

        self::assertEquals(0, self::$validator->errorCount());
    }

    /** @return void */
    final protected function checkSniff(int $line, int $column, string $sniff, string $message)
    {
        $key = SniffEntity::createKey($line, $column, $sniff);

        $this->assertTrue(self::$validator->hasKey($key));
        $this->assertSame($message, self::$validator->getMessage($key));

        self::$validator->removeItem($key);
    }
}
