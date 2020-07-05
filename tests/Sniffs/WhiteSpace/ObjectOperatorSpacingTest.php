<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\Sniffs\AbstractTestCase;

final class ObjectOperatorSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.ObjectOperatorSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/ObjectOperatorSpacing.inc';
    }

    /** @return void */
    public function testSpaceBeforeArrow()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Space found before object operator';
        $this->checkSniff(3, 7, $sniff, $message);
    }

    /** @return void */
    public function testSpaceAfterArrow()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Space found after object operator';
        $this->checkSniff(4, 6, $sniff, $message);
    }

    /** @return void */
    public function testSpaceBeforeColon()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Space found before object operator';
        $this->checkSniff(6, 8, $sniff, $message);
    }

    /** @return void */
    public function testSpaceAfterColon()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Space found after object operator';
        $this->checkSniff(7, 7, $sniff, $message);
    }
}
