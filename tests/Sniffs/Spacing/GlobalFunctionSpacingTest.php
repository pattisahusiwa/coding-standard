<?php

namespace XynhaCS\Tests\Sniffs\Spacing;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class GlobalFunctionSpacingTest extends CSAbstractSniffUnitTest
{

    protected function getTestFile()
    {
        return 'Spacing' . DIRECTORY_SEPARATOR . 'GlobalFunctionSpacing';
    }

    public function testFunctionSpacingBefore()
    {
        $this->sniffError(2, 'Squiz.WhiteSpace.FunctionSpacing.Before');
    }

    public function testFunctionSpacingAfter()
    {
        $this->sniffError(3, 'Squiz.WhiteSpace.FunctionSpacing.After');
        $this->sniffError(5, 'Squiz.WhiteSpace.FunctionSpacing.After');
    }
}
