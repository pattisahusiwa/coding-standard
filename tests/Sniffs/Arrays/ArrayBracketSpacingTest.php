<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Arrays;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class ArrayBracketSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.Arrays.ArrayBracketSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'Arrays/ArrayBracketSpacing';
    }

    /** @return void */
    public function testBracketSpacing()
    {
        $this->noSpaceBetweenVarNameAndBracket();
        $this->spaceAfterOpenBracket();
        $this->spaceBeforeCloseBracket();
    }

    /** @return void */
    private function noSpaceBetweenVarNameAndBracket()
    {
        $sniff = $this->sniff . '.SpaceBeforeBracket';
        $message = 'Space found before square bracket; expected "$myArray[" but found "$myArray  ["';
        $this->sniffError(2, $sniff, $message);
    }

    /** @return void */
    private function spaceAfterOpenBracket()
    {
        $sniff = $this->sniff . '.SpaceAfterBracket';
        $message = 'Space found after square bracket; expected "[\'key\'" but found "[ \'key\'"';
        $this->sniffError(3, $sniff, $message);
    }

    /** @return void */
    private function spaceBeforeCloseBracket()
    {
        $sniff = $this->sniff . '.SpaceBeforeBracket';
        $message = 'Space found before square bracket; expected "\'key\']" but found "\'key\' ]"';
        $this->sniffError(4, $sniff, $message);
    }
}
