<?php

namespace XynhaCS\Tests\Sniffs\WhiteSpace;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class OperatorSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.OperatorSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'WhiteSpace' . DIRECTORY_SEPARATOR . 'OperatorSpacing';
    }

    public function testOperatorSpacing()
    {
        $this->noSpaceBefore();
        $this->noSpaceAfter();
        $this->multiSpacingBefore();
        $this->multiSpacingAfter();
    }

    private function noSpaceBefore()
    {
        $sniff = $this->sniff. '.NoSpaceBefore';
        $message = 'Expected 1 space before "="; 0 found';
        $this->sniffError(3, $sniff, $message);
    }

    private function noSpaceAfter()
    {
        $sniff = $this->sniff. '.NoSpaceAfter';
        $message = 'Expected 1 space after "="; 0 found';
        $this->sniffError(4, $sniff, $message);
    }

    private function multiSpacingBefore()
    {
        $sniff = $this->sniff. '.SpacingBefore';
        $message = 'Expected 1 space before "+"; 2 found';
        $this->sniffError(5, $sniff, $message);
    }

    private function multiSpacingAfter()
    {
        $sniff = $this->sniff. '.SpacingAfter';
        $message = 'Expected 1 space after "+"; 2 found';
        $this->sniffError(6, $sniff, $message);
    }
}
