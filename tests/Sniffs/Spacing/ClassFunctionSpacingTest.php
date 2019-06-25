<?php

namespace XynhaCS\Tests\Sniffs\Spacing;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class ClassFunctionSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.FunctionSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Spacing' . DIRECTORY_SEPARATOR . 'ClassFunctionSpacing';
    }

    public function testClassFunctionSpacing()
    {
        $this->spacingBefore();
        $this->spacingAfter();
        $this->spacingBeforeLast();
    }

    private function spacingBefore()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Expected 1 blank line before function; 0 found';
        $this->sniffError(6, $sniff, $message);
    }

    private function spacingAfter()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Expected 1 blank line after function; 2 found';
        $this->sniffError(8, $sniff, $message);
    }

    private function spacingBeforeLast()
    {
        $sniff = $this->sniff . '.AfterLast';
        $message = 'Expected 0 blank lines after function; 3 found';
        $this->sniffError(13, $sniff, $message);
    }
}
