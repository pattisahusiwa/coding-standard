<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class ScopeIndentTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Generic.WhiteSpace.ScopeIndent';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'WhiteSpace/ScopeIndent';
    }

    /** @return void */
    public function testIncorrectExactIdentation()
    {
        $this->blockComment();
        $this->commentBefore();
        $this->codeBefore();
        $this->commentAfter();
        $this->codeAfter();
    }

    /** @return void */
    private function blockComment()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 0 spaces, found 4';
        $this->sniffError(2, $sniff, $message);
    }

    /** @return void */
    private function commentBefore()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 0';
        $this->sniffError(6, $sniff, $message);
    }

    /** @return void */
    private function codeBefore()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 0';
        $this->sniffError(9, $sniff, $message);
    }

    /** @return void */
    private function commentAfter()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 8';
        $this->sniffError(7, $sniff, $message);
    }

    /** @return void */
    private function codeAfter()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 8';
        $this->sniffError(8, $sniff, $message);
    }
}
