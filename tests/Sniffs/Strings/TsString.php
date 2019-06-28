<?php

namespace XynhaCS\Tests\Sniffs\Strings;

use PHPUnit\Framework\TestSuite;

final class TsString
{

    public function getTestSuite()
    {
        $suite = new TestSuite('XynhaCS_string');

        $suite->addTestSuite(ConcatenationSpacingTest::class);

        return $suite;
    }
}
