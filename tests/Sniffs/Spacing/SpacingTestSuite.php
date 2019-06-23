<?php

namespace XynhaCS\Tests\Sniffs\Spacing;

use PHPUnit\Framework\TestSuite;

final class SpacingTestSuite
{

    public function getTestSuite()
    {
        $suite = new TestSuite('XynhaCS_Spacing');

        $suite->addTestSuite(PropertySpacingTest::class);
        $suite->addTestSuite(ClassFunctionSpacingTest::class);

        return $suite;
    }
}
