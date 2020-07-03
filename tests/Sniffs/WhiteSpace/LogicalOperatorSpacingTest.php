<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class LogicalOperatorSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.LogicalOperatorSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/LogicalOperatorSpacing';
    }

    /** @return void */
    public function testLogicalOperatorSpacing()
    {
        $this->noSpaceBefore();
        $this->noSpaceAfter();
        $this->tooMuchSpaceBefore();
        $this->tooMuchSpaceAfter();
    }

    /** @return void */
    private function noSpaceBefore()
    {
        $sniff = $this->sniff . '.NoSpaceBefore';
        $message = 'Expected 1 space before logical operator; 0 found';
        $this->sniffError(3, $sniff, $message);
    }

    /** @return void */
    private function noSpaceAfter()
    {
        $sniff = $this->sniff . '.NoSpaceAfter';
        $message = 'Expected 1 space after logical operator; 0 found';
        $this->sniffError(4, $sniff, $message);
    }

    /** @return void */
    private function tooMuchSpaceBefore()
    {
        $sniff = $this->sniff . '.TooMuchSpaceBefore';
        $message = 'Expected 1 space before logical operator; 3 found';
        $this->sniffError(5, $sniff, $message);
    }

    /** @return void */
    private function tooMuchSpaceAfter()
    {
        $sniff = $this->sniff . '.TooMuchSpaceAfter';
        $message = 'Expected 1 space after logical operator; 3 found';
        $this->sniffError(6, $sniff, $message);
    }
}
