<?php

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class ObjectOperatorSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.WhiteSpace.ObjectOperatorSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'WhiteSpace' . DIRECTORY_SEPARATOR . 'ObjectOperatorSpacing';
    }

    public function testLogicalOperatorSpacing()
    {
        $this->spaceBeforeArrow();
        $this->spaceAfterArrow();
        $this->spaceBeforeColon();
        $this->spaceAfterColon();
    }

    private function spaceBeforeArrow()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Space found before object operator';
        $this->sniffError(3, $sniff, $message);
    }

    private function spaceAfterArrow()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Space found after object operator';
        $this->sniffError(4, $sniff, $message);
    }

    private function spaceBeforeColon()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Space found before object operator';
        $this->sniffError(6, $sniff, $message);
    }

    private function spaceAfterColon()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Space found after object operator';
        $this->sniffError(7, $sniff, $message);
    }
}
