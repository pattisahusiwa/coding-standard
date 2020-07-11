<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\WhiteSpace;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class CastSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.CastSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/CastSpacing.inc';
    }

    /** @return void */
    public function testCastSpacing()
    {
        $sniff = $this->sniff . '.ContainsWhiteSpace';
        $message = 'Cast statements must not contain whitespace; expected "(int)" but found "( int )"';
        $this->checkSniff(3, 8, $sniff, $message);
    }
}
