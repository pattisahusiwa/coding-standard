<?php

namespace PhpCodeConv\Tests\Sniffs\Strings;

use PHPUnit\Framework\TestSuite;

final class TsString
{

    public function getTestSuite()
    {
        $suite = new TestSuite('PhpCodeConv_string');

        $suite->addTestSuite(ConcatenationSpacingTest::class);
        $suite->addTestSuite(DoubleQuoteUsageTest::class);
        $suite->addTestSuite(EchoedStringsTest::class);

        return $suite;
    }
}
