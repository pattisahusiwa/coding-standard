<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class ObjectOperatorSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.ObjectOperatorSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/ObjectOperatorSpacing';
    }

    /** @return void */
    public function testLogicalOperatorSpacing()
    {
        $this->spaceBeforeArrow();
        $this->spaceAfterArrow();
        $this->spaceBeforeColon();
        $this->spaceAfterColon();
    }

    /** @return void */
    private function spaceBeforeArrow()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Space found before object operator';
        $this->sniffError(3, $sniff, $message);
    }

    /** @return void */
    private function spaceAfterArrow()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Space found after object operator';
        $this->sniffError(4, $sniff, $message);
    }

    /** @return void */
    private function spaceBeforeColon()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Space found before object operator';
        $this->sniffError(6, $sniff, $message);
    }

    /** @return void */
    private function spaceAfterColon()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Space found after object operator';
        $this->sniffError(7, $sniff, $message);
    }
}
