<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Strings;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class EchoedStringsTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.Strings.EchoedStrings';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'Strings/EchoedStrings';
    }

    /** @return void */
    public function testEchoedString()
    {
        $this->noBracket();
    }

    /** @return void */
    private function noBracket()
    {
        $sniff = $this->sniff . '.HasBracket';
        $message = 'Echoed strings should not be bracketed';
        $this->sniffError(3, $sniff, $message);
    }
}
