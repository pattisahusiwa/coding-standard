<?php

namespace XynhaCS\Tests\Sniffs\WhiteSpace;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class LogicalOperatorSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.LogicalOperatorSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'WhiteSpace' . DIRECTORY_SEPARATOR . 'LogicalOperatorSpacing';
    }

    public function testLogicalOperatorSpacing()
    {
        $this->noSpaceBefore();
        $this->noSpaceAfter();
        $this->tooMuchSpaceBefore();
        $this->tooMuchSpaceAfter();
    }

    private function noSpaceBefore()
    {
        $sniff = $this->sniff . '.NoSpaceBefore';
        $message = 'Expected 1 space before logical operator; 0 found';
        $this->sniffError(3, $sniff, $message);
    }

    private function noSpaceAfter()
    {
        $sniff = $this->sniff . '.NoSpaceAfter';
        $message = 'Expected 1 space after logical operator; 0 found';
        $this->sniffError(4, $sniff, $message);
    }

    private function tooMuchSpaceBefore()
    {
        $sniff = $this->sniff . '.TooMuchSpaceBefore';
        $message = 'Expected 1 space before logical operator; 3 found';
        $this->sniffError(5, $sniff, $message);
    }

    private function tooMuchSpaceAfter()
    {
        $sniff = $this->sniff . '.TooMuchSpaceAfter';
        $message = 'Expected 1 space after logical operator; 3 found';
        $this->sniffError(6, $sniff, $message);
    }
}
