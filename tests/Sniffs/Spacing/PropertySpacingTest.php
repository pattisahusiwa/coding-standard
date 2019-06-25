<?php

namespace XynhaCS\Tests\Sniffs\Spacing;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class PropertySpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.MemberVarSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Spacing' . DIRECTORY_SEPARATOR . 'PropertySpacing';
    }

    public function testSpacing()
    {
        $this->spaceBeforeFirstProperty();
        $this->spaceBetweenProperties();
    }

    private function spaceBeforeFirstProperty()
    {
        $sniff = $this->sniff . '.FirstIncorrect';
        $message = 'Expected 1 blank line(s) before first member var; 0 found';
        $this->sniffError(5, $sniff, $message);
    }

    private function spaceBetweenProperties()
    {
        $sniff = $this->sniff . '.Incorrect';
        $message = 'Expected 1 blank line(s) before member var; 0 found';
        $this->sniffError(6, $sniff, $message);

        $message = 'Expected 1 blank line(s) before member var; 2 found';
        $this->sniffError(9, $sniff, $message);
    }
}
