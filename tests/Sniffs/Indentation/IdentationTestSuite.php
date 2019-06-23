<?php

namespace XynhaCS\Tests\Sniffs\Identation;

use PHPUnit\Framework\TestSuite;

final class IdentationTestSuite
{
    public function getTestSuite()
    {
        $suite = new TestSuite('XynhaCS_Identation');

        $suite->addTestSuite(ScopeIndentTest::class);

        return $suite;
    }
}
