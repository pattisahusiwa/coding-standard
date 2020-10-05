<?php declare(strict_types=1);

namespace Ptscs\Tests;

abstract class AbstractUnfixable extends AbstractTestCase
{

    /** @return array<string,mixed[]> */
    abstract public function dataProvider(): array;

    protected function setUp()
    {
        parent::setUp();

        $parts = explode('\\', static::class);

        //@phpstan-ignore-next-line
        $dirname        = strtolower(str_replace('Test', '', array_pop($parts)));
        $this->dataPath = __DIR__ . '/Unfixable/_data/' . $dirname . '/';
    }

    /**
     * @dataProvider dataProvider
     *
     * @return void
     */
    public function testSniff(string $file, int $error, int $warning)
    {
        $phpcsFile = $this->doAssertion($file);

        if ($phpcsFile->getErrorCount() <= 0 && $phpcsFile->getWarningCount() <= 0) {
            $this->fail('Test data should have any errors or warnings');
        }

        if ($phpcsFile->getErrorCount() !== $error) {
            $msg = sprintf('Errors count should be %d, found %d', $error, $phpcsFile->getErrorCount());
            $this->fail($msg);
        }

        if ($phpcsFile->getWarningCount() !== $warning) {
            $msg = sprintf('Warnings count should be %d, found %d', $error, $phpcsFile->getWarningCount());
            $this->fail($msg);
        }
    }
}
