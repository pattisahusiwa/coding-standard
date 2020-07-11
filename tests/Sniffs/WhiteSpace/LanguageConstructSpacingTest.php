<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\WhiteSpace;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class LanguageConstructSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.LanguageConstructSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() :string
    {
        return 'WhiteSpace/LanguageConstructSpacing.inc';
    }

    /** @return void */
    public function testNoSpace()
    {
        $sniff = $this->sniff . '.Incorrect';
        $message = 'Language constructs must be followed by a single space; expected' .
        ' "require $blah" but found "require$blah"';
        $this->checkSniff(3, 1, $sniff, $message);
    }

    /** @return void */
    public function testMultipleSpace()
    {
        $sniff = $this->sniff . '.IncorrectSingle';
        $message = 'Language constructs must be followed by a single space; ' .
        'expected 1 space but found "[30;1m·[0m[30;1m·[0m"';
        $this->checkSniff(4, 1, $sniff, $message);
    }
}
