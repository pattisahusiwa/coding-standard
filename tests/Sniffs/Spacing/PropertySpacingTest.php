<?php

namespace XynhaCS\Tests\Sniffs\Spacing;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class PropertySpacingTest extends CSAbstractSniffUnitTest
{
    protected function getTestFile()
    {
        return 'Spacing' . DIRECTORY_SEPARATOR . 'PropertySpacing';
    }
    public function testFirstPropertySpacing()
    {
        $this->sniffError(5, 'Squiz.WhiteSpace.MemberVarSpacing.FirstIncorrect');
    }

    public function testSpaceBetweenProperties()
    {
        $this->sniffError(6, 'Squiz.WhiteSpace.MemberVarSpacing.Incorrect');
        $this->sniffError(7, 'Squiz.WhiteSpace.MemberVarSpacing.Incorrect');
    }
}
