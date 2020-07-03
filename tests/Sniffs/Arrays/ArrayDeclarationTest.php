<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Arrays;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class ArrayDeclarationTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.Arrays.ArrayDeclaration';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'Arrays/ArrayDeclaration';
    }

    /** @return void */
    public function testArrayDeclaration()
    {
        $this->spaceAfterKeyword();
        $this->spaceInEmptyArray();
        $this->singleValueMultiline();
        $this->closeBraceNotAligned();
        $this->inlineArraySpaceBeforeDoubleArrow();
        $this->keyNotAligned();
        $this->doubleArrowNotAligned();
        $this->closeBraceNewline();
    }

    /** @return void */
    private function spaceAfterKeyword()
    {
        $sniff = $this->sniff . '.SpaceAfterKeyword';
        $message = 'There must be no space between the "array" keyword and the opening parenthesis';
        $this->sniffError(3, $sniff, $message);
    }

    /** @return void */
    private function spaceInEmptyArray()
    {
        $sniff = $this->sniff . '.SpaceInEmptyArray';
        $message = 'Empty array declaration must have no space between the parentheses';
        $this->sniffError(5, $sniff, $message);
    }

    /** @return void */
    private function singleValueMultiline()
    {
        $sniff = $this->sniff . '.MultiLineNotAllowed';
        $message = 'Multi-line array contains a single value; use single-line array instead';
        $this->sniffError(7, $sniff, $message);
    }

    /** @return void */
    private function closeBraceNotAligned()
    {
        $sniff = $this->sniff . '.CloseBraceNotAligned';
        $message = 'Closing parenthesis not aligned correctly; expected 9 space(s) but found 0';
        $this->sniffError(9, $sniff, $message);
    }

    /** @return void */
    private function inlineArraySpaceBeforeDoubleArrow()
    {
        $sniff = $this->sniff . '.SpaceBeforeDoubleArrow';
        $message = 'Expected 1 space between "\'key_1\'" and double arrow; 4 found';
        $this->sniffError(11, $sniff, $message);
    }

    /** @return void */
    private function keyNotAligned()
    {
        $sniff = $this->sniff . '.KeyNotAligned';
        $message = 'Array key not aligned correctly; expected 10 spaces but found 4';
        $this->sniffError(14, $sniff, $message);
    }

    /** @return void */
    private function doubleArrowNotAligned()
    {
        $sniff = $this->sniff . '.DoubleArrowNotAligned';
        $message = 'Array double arrow not aligned correctly; expected 1 space(s) but found 4';
        $this->sniffError(14, $sniff, $message);
    }

    /** @return void */
    private function closeBraceNewline()
    {
        $sniff = $this->sniff . '.CloseBraceNewLine';
        $message = 'Closing parenthesis of array declaration must be on a new line';
        $this->sniffError(14, $sniff, $message);
    }
}
