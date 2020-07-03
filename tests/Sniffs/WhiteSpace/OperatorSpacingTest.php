<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class OperatorSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.OperatorSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/OperatorSpacing';
    }

    /** @return void */
    public function testOperatorSpacing()
    {
        $this->noSpaceBefore();
        $this->noSpaceAfter();
        $this->multiSpacingBefore();
        $this->multiSpacingAfter();
    }

    /** @return void */
    private function noSpaceBefore()
    {
        $sniff = $this->sniff . '.NoSpaceBefore';
        $message = 'Expected 1 space before "="; 0 found';
        $this->sniffError(3, $sniff, $message);
    }

    /** @return void */
    private function noSpaceAfter()
    {
        $sniff = $this->sniff . '.NoSpaceAfter';
        $message = 'Expected 1 space after "="; 0 found';
        $this->sniffError(4, $sniff, $message);
    }

    /** @return void */
    private function multiSpacingBefore()
    {
        $sniff = $this->sniff . '.SpacingBefore';
        $message = 'Expected 1 space before "+"; 2 found';
        $this->sniffError(5, $sniff, $message);
    }

    /** @return void */
    private function multiSpacingAfter()
    {
        $sniff = $this->sniff . '.SpacingAfter';
        $message = 'Expected 1 space after "+"; 2 found';
        $this->sniffError(6, $sniff, $message);
    }
}
