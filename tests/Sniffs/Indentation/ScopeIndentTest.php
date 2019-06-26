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
        $this->blockComment();
        $this->commentBefore();
        $this->codeBefore();
        $this->commentAfter();
        $this->codeAfter();
    }

    private function blockComment()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 0 spaces, found 4';
        $this->sniffError(2, $sniff, $message);
    }

    private function commentBefore()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 0';
        $this->sniffError(6, $sniff, $message);
    }

    private function codeBefore()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 0';
        $this->sniffError(9, $sniff, $message);
    }

    private function commentAfter()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 8';
        $this->sniffError(7, $sniff, $message);
    }

    private function codeAfter()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 8';
        $this->sniffError(8, $sniff, $message);
    }
}
