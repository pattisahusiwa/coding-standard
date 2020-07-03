<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Strings;

use PHPUnit\Framework\TestSuite;

final class TsString
{

    public function getTestSuite() : TestSuite
    {
        $suite = new TestSuite('PhpCodeConv_string');

        $suite->addTestSuite(ConcatenationSpacingTest::class);
        $suite->addTestSuite(DoubleQuoteUsageTest::class);
        $suite->addTestSuite(EchoedStringsTest::class);

        return $suite;
    }
}
