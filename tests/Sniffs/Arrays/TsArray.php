<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Arrays;

use PHPUnit\Framework\TestSuite;

final class TsArray
{

    public function getTestSuite() : TestSuite
    {
        $suite = new TestSuite('PhpCodeConv_array');

        $suite->addTestSuite(ArrayDeclarationTest::class);
        $suite->addTestSuite(ArrayBracketSpacingTest::class);

        return $suite;
    }
}
