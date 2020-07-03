<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class MemberVarSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.MemberVarSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/MemberVarSpacing';
    }

    /** @return void */
    public function testSpacing()
    {
        $this->spaceBeforeFirstProperty();
        $this->spaceBetweenProperties();
    }

    /** @return void */
    private function spaceBeforeFirstProperty()
    {
        $sniff = $this->sniff . '.FirstIncorrect';
        $message = 'Expected 1 blank line(s) before first member var; 0 found';
        $this->sniffError(5, $sniff, $message);
    }

    /** @return void */
    private function spaceBetweenProperties()
    {
        $sniff = $this->sniff . '.Incorrect';
        $message = 'Expected 1 blank line(s) before member var; 0 found';
        $this->sniffError(6, $sniff, $message);

        $message = 'Expected 1 blank line(s) before member var; 2 found';
        $this->sniffError(9, $sniff, $message);
    }
}
