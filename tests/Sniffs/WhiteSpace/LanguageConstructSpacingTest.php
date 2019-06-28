<?php

namespace XynhaCS\Tests\Sniffs\WhiteSpace;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class LanguageConstructSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.LanguageConstructSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'WhiteSpace' . DIRECTORY_SEPARATOR . 'LanguageConstructSpacing';
    }

    public function testLanguageConstructSpacing()
    {
        $this->noSpace();
        $this->multipleSpace();
    }

    private function noSpace()
    {
        $sniff = $this->sniff . '.Incorrect';
        $message = 'Language constructs must be followed by a single space; expected "require $blah" but found "require$blah"';
        $this->sniffError(3, $sniff, $message);
    }

    private function multipleSpace()
    {
        $sniff = $this->sniff . '.IncorrectSingle';
        $message = 'Language constructs must be followed by a single space; expected 1 space but found "[30;1m·[0m[30;1m·[0m"';
        $this->sniffError(4, $sniff, $message);
    }
}
