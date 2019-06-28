<?php

namespace XynhaCS\Tests\Sniffs\WhiteSpace;

use PHPUnit\Framework\TestSuite;

final class TsWhiteSpace
{

    public function getTestSuite()
    {
        $suite = new TestSuite('XynhaCS_Spacing');

        $suite->addTestSuite(ScopeIndentTest::class);
        $suite->addTestSuite(MemberVarSpacingTest::class);
        $suite->addTestSuite(FunctionSpacingTest::class);
        $suite->addTestSuite(OperatorSpacingTest::class);
        $suite->addTestSuite(FunctionOpeningBraceSpaceTest::class);
        $suite->addTestSuite(CastSpacingTest::class);

        return $suite;
    }
}
