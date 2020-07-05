<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\Sniffs\AbstractTestCase;

final class FunctionOpeningBraceSpaceTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.FunctionOpeningBraceSpace';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/FunctionOpeningBraceSpace.inc';
    }

    /** @return void */
    public function testFunctionOpeningBrace()
    {
        $sniff = $this->sniff . '.SpacingAfter';
        $message = 'Expected 0 blank lines after opening function brace; 1 found';
        $this->checkSniff(4, 1, $sniff, $message);
    }
}
