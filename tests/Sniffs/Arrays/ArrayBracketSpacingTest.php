<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Arrays;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class ArrayBracketSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.Arrays.ArrayBracketSpacing';

    protected function getFilename() : string
    {
        return 'Arrays/ArrayBracketSpacing.inc';
    }

    /** @return void */
    public function testNoSpaceBetweenVarNameAndBracket()
    {
        $sniff = $this->sniff . '.SpaceBeforeBracket';
        $message = 'Space found before square bracket; expected "$myArray[" but found "$myArray  ["';
        $this->checkSniff(3, 11, $sniff, $message);
    }

    /** @return void */
    public function testSpaceAfterOpenBracket()
    {
        $sniff = $this->sniff . '.SpaceAfterBracket';
        $message = 'Space found after square bracket; expected "[\'key\'" but found "[ \'key\'"';
        $this->checkSniff(4, 9, $sniff, $message);
    }

    /** @return void */
    public function testSpaceBeforeCloseBracket()
    {
        $sniff = $this->sniff . '.SpaceBeforeBracket';
        $message = 'Space found before square bracket; expected "\'key\']" but found "\'key\' ]"';
        $this->checkSniff(5, 16, $sniff, $message);
    }
}
