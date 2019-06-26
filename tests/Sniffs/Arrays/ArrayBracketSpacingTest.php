<?php

namespace XynhaCS\Tests\Sniffs\Arrays;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class ArrayBracketSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.Arrays.ArrayBracketSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Arrays' . DIRECTORY_SEPARATOR . 'ArrayBracketSpacing';
    }

    public function testBracketSpacing()
    {
        $this->noSpaceBetweenVarNameAndBracket();
        $this->spaceAfterOpenBracket();
        $this->spaceBeforeCloseBracket();
    }

    private function noSpaceBetweenVarNameAndBracket()
    {
        $sniff = $this->sniff . '.SpaceBeforeBracket';
        $message = 'Space found before square bracket; expected "$myArray[" but found "$myArray  ["';
        $this->sniffError(2, $sniff, $message);
    }

    private function spaceAfterOpenBracket()
    {
        $sniff = $this->sniff . '.SpaceAfterBracket';
        $message = 'Space found after square bracket; expected "[\'key\'" but found "[ \'key\'"';
        $this->sniffError(3, $sniff, $message);
    }

    private function spaceBeforeCloseBracket()
    {
        $sniff = $this->sniff . '.SpaceBeforeBracket';
        $message = 'Space found before square bracket; expected "\'key\']" but found "\'key\' ]"';
        $this->sniffError(4, $sniff, $message);
    }
}
