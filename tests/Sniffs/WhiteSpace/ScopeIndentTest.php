<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\Sniffs\AbstractTestCase;

final class ScopeIndentTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Generic.WhiteSpace.ScopeIndent';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/ScopeIndent.inc';
    }

    /** @return void */
    public function testBlockComment()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 0 spaces, found 4';
        $this->checkSniff(3, 5, $sniff, $message);
    }

    /** @return void */
    public function testCommentBefore()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 0';
        $this->checkSniff(7, 1, $sniff, $message);
    }

    /** @return void */
    public function testCommentAfter()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 8';
        $this->checkSniff(8, 9, $sniff, $message);
    }

    /** @return void */
    public function testCodeAfter()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 8';
        $this->checkSniff(9, 9, $sniff, $message);
    }

    /** @return void */
    public function testCodeBefore()
    {
        $sniff = $this->sniff . '.IncorrectExact';
        $message = 'Line indented incorrectly; expected 4 spaces, found 0';
        $this->checkSniff(10, 1, $sniff, $message);
    }
}
