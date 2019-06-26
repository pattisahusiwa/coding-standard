<?php

namespace XynhaCS\Tests\Sniffs\Arrays;

use PHPUnit\Framework\TestSuite;

final class TsArray
{

    public function getTestSuite()
    {
        $suite = new TestSuite('XynhaCS_array');

        $suite->addTestSuite(ArrayDeclarationTest::class);

        return $suite;
    }
}
