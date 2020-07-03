<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class CastSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.CastSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/CastSpacing';
    }

    /** @return void */
    public function testCastSpacing()
    {
        $sniff = $this->sniff . '.ContainsWhiteSpace';
        $message = 'Cast statements must not contain whitespace; expected "(int)" but found "( int )"';
        $this->sniffError(3, $sniff, $message);
    }
}
