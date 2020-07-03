<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class FunctionOpeningBraceSpaceTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.FunctionOpeningBraceSpace';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/FunctionOpeningBraceSpace';
    }

    /** @return void */
    public function testFunctionOpeningBrace()
    {
        $sniff = $this->sniff . '.SpacingAfter';
        $message = 'Expected 0 blank lines after opening function brace; 1 found';
        $this->sniffError(4, $sniff, $message);
    }
}
