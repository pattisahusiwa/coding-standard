<?php

namespace XynhaCS\Tests\Sniffs\Spacing;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class GlobalFunctionSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.FunctionSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Spacing' . DIRECTORY_SEPARATOR . 'GlobalFunctionSpacing';
    }

    public function testGlobalFunctionSpacing()
    {
        $this->spacingBefore();
        $this->spacingAfter();
    }

    private function spacingBefore()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Expected 1 blank line before function; 0 found';
        $this->sniffError(2, $sniff, $message);
    }

    private function spacingAfter()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Expected 1 blank line after function; 0 found';
        $this->sniffError(3, $sniff, $message);

        // $this->sniffError(3, 'Squiz.WhiteSpace.FunctionSpacing.After');
        // $this->sniffError(5, 'Squiz.WhiteSpace.FunctionSpacing.After');
    }
}
