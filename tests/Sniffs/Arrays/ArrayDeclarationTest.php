<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Arrays;

use PhpCodeConv\Tests\Sniffs\AbstractTestCase;

final class ArrayDeclarationTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.Arrays.ArrayDeclaration';

    protected function getFilename() : string
    {
        return 'Arrays/ArrayDeclaration.inc';
    }

    /** @return void */
    public function testSpaceAfterKeyword()
    {
        $sniff = $this->sniff . '.SpaceAfterKeyword';
        $message = 'There must be no space between the "array" keyword and the opening parenthesis';
        $this->checkSniff(3, 10, $sniff, $message);
    }

    /** @return void */
    public function testSpaceInEmptyArray()
    {
        $sniff = $this->sniff . '.SpaceInEmptyArray';
        $msg = 'Empty array declaration must have no space between the parentheses';

        $this->checkSniff(5, 10, $sniff, $msg);
    }

    /** @return void */
    public function testSingleValueMultiline()
    {
        $sniff = $this->sniff . '.MultiLineNotAllowed';
        $message = 'Multi-line array contains a single value; use single-line array instead';
        $this->checkSniff(7, 10, $sniff, $message);
    }

    /** @return void */
    public function testCloseBraceNotAligned()
    {
        $sniff = $this->sniff . '.CloseBraceNotAligned';
        $message = 'Closing parenthesis not aligned correctly; expected 9 space(s) but found 0';
        $this->checkSniff(9, 1, $sniff, $message);
    }

    /** @return void */
    public function testInlineArraySpaceBeforeDoubleArrow()
    {
        $sniff = $this->sniff . '.SpaceBeforeDoubleArrow';
        $message = 'Expected 1 space between "\'key_1\'" and double arrow; 4 found';
        $this->checkSniff(11, 28, $sniff, $message);
    }

    /** @return void */
    public function testKeyNotAligned()
    {
        $sniff = $this->sniff . '.KeyNotAligned';
        $message = 'Array key not aligned correctly; expected 10 spaces but found 4';
        $this->checkSniff(14, 5, $sniff, $message);
    }

    /** @return void */
    public function testDoubleArrowNotAligned()
    {
        $sniff = $this->sniff . '.DoubleArrowNotAligned';
        $message = 'Array double arrow not aligned correctly; expected 1 space(s) but found 4';
        $this->checkSniff(14, 16, $sniff, $message);
    }

    /** @return void */
    public function testCloseBraceNewline()
    {
        $sniff = $this->sniff . '.CloseBraceNewLine';
        $message = 'Closing parenthesis of array declaration must be on a new line';
        $this->checkSniff(14, 26, $sniff, $message);
    }
}
