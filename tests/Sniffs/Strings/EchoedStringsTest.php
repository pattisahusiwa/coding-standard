<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Strings;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class EchoedStringsTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.Strings.EchoedStrings';

    protected function getFilename() : string
    {
        return 'Strings/EchoedStrings.inc';
    }

    protected function getExcludeSniff() : array
    {
        return ['Generic.PHP.ForbiddenFunctions.Found'];
    }

    /** @return void */
    public function testEchoNoBracket()
    {
        $sniff = $this->sniff . '.HasBracket';
        $message = 'Echoed strings should not be bracketed';
        $this->checkSniff(3, 1, $sniff, $message);
    }
}
