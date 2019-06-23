<?php

namespace XynhaCS\Tests;

use PHPUnit\Framework\TestSuite;

use XynhaCS\Tests\Sniffs\Identation\IdentationTestSuite;
use XynhaCS\Tests\Sniffs\Spacing\SpacingTestSuite;

final class AllTests
{
    public static function suite()
    {
        $suite = new TestSuite('XynhaCS');

        $identation = new IdentationTestSuite();
        $suite->addTest($identation->getTestSuite());

        $spacing = new SpacingTestSuite();
        $suite->addTest($spacing->getTestSuite());

        return $suite;
    }
}
