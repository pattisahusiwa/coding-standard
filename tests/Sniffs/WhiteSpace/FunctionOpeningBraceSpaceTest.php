<?php

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class FunctionOpeningBraceSpaceTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.FunctionOpeningBraceSpace';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'WhiteSpace' . DIRECTORY_SEPARATOR . 'FunctionOpeningBraceSpace';
    }

    public function testFunctionOpeningBrace()
    {
        $sniff = $this->sniff . '.SpacingAfter';
        $message = 'Expected 0 blank lines after opening function brace; 1 found';
        $this->sniffError(4, $sniff, $message);
    }
}
