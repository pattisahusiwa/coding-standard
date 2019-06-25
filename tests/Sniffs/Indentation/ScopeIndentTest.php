<?php

namespace XynhaCS\Tests\Sniffs\Identation;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class ScopeIndentTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Generic.WhiteSpace.ScopeIndent';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Identation' . DIRECTORY_SEPARATOR . 'IncorrectExact';
    }

    public function testIncorrectExactIdentation()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 0 tabs, found 1';
        $this->sniffError(4, $sniff, $message);
    }
}
