<?php

namespace XynhaCS\Tests;

use XynhaCS\Tests\Sniffs\Identation\ScopeIndentTest;
use PHPUnit\Framework\TestSuite;

final class AllTests
{
    public static function suite()
    {
        $suite = new TestSuite('XynhaCS');
        $suite->addTestSuite(ScopeIndentTest::class);

        return $suite;
    }
}
