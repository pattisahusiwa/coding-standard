<?php

namespace XynhaCS\Tests\Sniffs\Strings;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class EchoedStringsTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.Strings.EchoedStrings';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Strings' . DIRECTORY_SEPARATOR . 'EchoedStrings';
    }

    public function testEchoedString()
    {
        $this->noBracket();
    }

    private function noBracket()
    {
        $sniff = $this->sniff . '.HasBracket';
        $message = 'Echoed strings should not be bracketed';
        $this->sniffError(3, $sniff, $message);
    }
}
