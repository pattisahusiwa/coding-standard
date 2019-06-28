<?php

namespace XynhaCS\Tests\Sniffs\WhiteSpace;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class CastSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.CastSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'WhiteSpace' . DIRECTORY_SEPARATOR . 'CastSpacing';
    }

    public function testCastSpacing()
    {
        $sniff = $this->sniff . '.ContainsWhiteSpace';
        $message = 'Cast statements must not contain whitespace; expected "(int)" but found "( int )"';
        $this->sniffError(3, $sniff, $message);
    }
}
