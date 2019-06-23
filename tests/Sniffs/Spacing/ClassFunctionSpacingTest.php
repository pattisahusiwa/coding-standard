<?php

namespace XynhaCS\Tests\Sniffs\Spacing;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class ClassFunctionSpacingTest extends CSAbstractSniffUnitTest
{

    protected function getTestFile()
    {
        return 'Spacing' . DIRECTORY_SEPARATOR . 'ClassFunctionSpacing';
    }

    public function testFunctionSpacingBefore()
    {
        $this->sniffError(6, 'Squiz.WhiteSpace.FunctionSpacing.Before');
    }

    public function testFunctionSpacingAfter()
    {
        $this->sniffError(9, 'Squiz.WhiteSpace.FunctionSpacing.After');
        $this->sniffError(13, 'Squiz.WhiteSpace.FunctionSpacing.After');
    }
}
