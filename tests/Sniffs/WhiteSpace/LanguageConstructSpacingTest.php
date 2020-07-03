<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class LanguageConstructSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.LanguageConstructSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() :string
    {
        return 'WhiteSpace/LanguageConstructSpacing';
    }

    /** @return void */
    public function testLanguageConstructSpacing()
    {
        $this->noSpace();
        $this->multipleSpace();
    }

    /** @return void */
    private function noSpace()
    {
        $sniff = $this->sniff . '.Incorrect';
        $message = 'Language constructs must be followed by a single space; expected' .
        ' "require $blah" but found "require$blah"';
        $this->sniffError(3, $sniff, $message);
    }

    /** @return void */
    private function multipleSpace()
    {
        $sniff = $this->sniff . '.IncorrectSingle';
        $message = 'Language constructs must be followed by a single space; ' .
        'expected 1 space but found "[30;1m·[0m[30;1m·[0m"';
        $this->sniffError(4, $sniff, $message);
    }
}
