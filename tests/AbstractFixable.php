<?php declare(strict_types=1);

namespace Ptscs\Tests;

abstract class AbstractFixable extends AbstractTestCase
{

    /** @return array<string,string[]> */
    abstract public function dataProvider(): array;

    /**
     * @dataProvider dataProvider
     *
     * @return void
     */
    public function testSniff(string $expected, string $actual)
    {
        $expectedFile = $this->dataPath . $expected;

        $phpcsFile = $this->doAssertion($actual);

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
