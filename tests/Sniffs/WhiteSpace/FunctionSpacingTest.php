<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class FunctionSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.FunctionSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/FunctionSpacing';
    }

    /** @return void */
    public function testClassFunctionSpacing()
    {
        $this->spacingBefore();
        $this->spacingAfter();
        $this->spacingBeforeLast();
        $this->globalSpacingBefore();
        $this->globalSpacingAfter();
    }

    /** @return void */
    private function spacingBefore()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Expected 1 blank line before function; 0 found';
        $this->sniffError(6, $sniff, $message);
    }

    /** @return void */
    private function spacingAfter()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Expected 1 blank line after function; 2 found';
        $this->sniffError(8, $sniff, $message);
    }

    /** @return void */
    private function spacingBeforeLast()
    {
        $sniff = $this->sniff . '.AfterLast';
        $message = 'Expected 0 blank lines after function; 3 found';
        $this->sniffError(13, $sniff, $message);
    }

    /** @return void */
    private function globalSpacingBefore()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Expected 1 blank line before function; 2 found';
        $this->sniffError(20, $sniff, $message);
    }

    /** @return void */
    private function globalSpacingAfter()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Expected 1 blank line after function; 0 found';
        $this->sniffError(21, $sniff, $message);
    }
}
