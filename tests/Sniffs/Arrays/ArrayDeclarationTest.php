<?php

namespace PhpCodeConv\Tests\Sniffs\Arrays;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class ArrayDeclarationTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.Arrays.ArrayDeclaration';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Arrays' . DIRECTORY_SEPARATOR . 'ArrayDeclaration';
    }

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

    private function spaceAfterKeyword()
    {
        $sniff = $this->sniff . '.SpaceAfterKeyword';
        $message = 'There must be no space between the "array" keyword and the opening parenthesis';
        $this->sniffError(3, $sniff, $message);
    }

    private function spaceInEmptyArray()
    {
        $sniff = $this->sniff . '.SpaceInEmptyArray';
        $message = 'Empty array declaration must have no space between the parentheses';
        $this->sniffError(5, $sniff, $message);
    }

    private function singleValueMultiline()
    {
        $sniff = $this->sniff . '.MultiLineNotAllowed';
        $message = 'Multi-line array contains a single value; use single-line array instead';
        $this->sniffError(7, $sniff, $message);
    }

    private function closeBraceNotAligned()
    {
        $sniff = $this->sniff . '.CloseBraceNotAligned';
        $message = 'Closing parenthesis not aligned correctly; expected 9 space(s) but found 0';
        $this->sniffError(9, $sniff, $message);
    }

    private function inlineArraySpaceBeforeDoubleArrow()
    {
        $sniff = $this->sniff . '.SpaceBeforeDoubleArrow';
        $message = 'Expected 1 space between "\'key_1\'" and double arrow; 4 found';
        $this->sniffError(11, $sniff, $message);
    }

    private function keyNotAligned()
    {
        $sniff = $this->sniff . '.KeyNotAligned';
        $message = 'Array key not aligned correctly; expected 10 spaces but found 4';
        $this->sniffError(14, $sniff, $message);
    }

    private function doubleArrowNotAligned()
    {
        $sniff = $this->sniff . '.DoubleArrowNotAligned';
        $message = 'Array double arrow not aligned correctly; expected 1 space(s) but found 4';
        $this->sniffError(14, $sniff, $message);
    }

    private function closeBraceNewline()
    {
        $sniff = $this->sniff . '.CloseBraceNewLine';
        $message = 'Closing parenthesis of array declaration must be on a new line';
        $this->sniffError(14, $sniff, $message);
    }
}
