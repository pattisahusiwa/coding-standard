<?php declare(strict_types=1);

namespace Ptscs\Tests;

abstract class AbstractFixable extends AbstractTestCase
{

    /** @return array<string,string[]> */
    abstract public function dataProvider(): array;

    protected function setUp()
    {
        parent::setUp();

        $parts = explode('\\', static::class);

        //@phpstan-ignore-next-line
        $dirname        = strtolower(str_replace('Test', '', array_pop($parts)));
        $this->dataPath = __DIR__ . '/Fixable/_data/' . $dirname . '/';
    }

    /**
     * @dataProvider dataProvider
     *
     * @return void
     */
    public function testSniff(string $expected, string $actual)
    {
        $expectedFile = $this->dataPath . $expected;

        $phpcsFile = $this->doAssertion($actual);

        $this->assertGreaterThan(
            0,
            $phpcsFile->getFixableCount(),
            sprintf("File %s doesn't have fixable violations", $actual)
        );

        // Attempt to fix the errors.
        $this->assertTrue($phpcsFile->fixer->fixFile());

        if ($phpcsFile->getFixableCount() > 0) {
            $fixable = $phpcsFile->getFixableCount();
            $this->fail(sprintf('Failed to fix %d fixable violations in %s', $fixable, $actual));
        }

        // Compare with fixed file
        $diff = $phpcsFile->fixer->generateDiff($expectedFile);
        if ($diff !== '') {
            $msg = sprintf(
                "Fixed version of %s does not match expected version in %s; the diff is\n%s",
                $actual,
                $expected,
                $diff
            );
            $this->fail($msg);
        }

        if ($phpcsFile->getErrorCount() > 0) {
            $msg = sprintf('There are %d errors in the test data', $phpcsFile->getErrorCount());
            $this->fail($msg);
        }

        if ($phpcsFile->getWarningCount() > 0) {
            $msg = sprintf('There are %d warnings in the test data', $phpcsFile->getWarningCount());
            $this->fail($msg);
        }
    }
}
