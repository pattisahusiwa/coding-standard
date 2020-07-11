<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\WhiteSpace;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class FunctionSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.FunctionSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/FunctionSpacing.inc';
    }

    /** @return string[] */
    protected function getExcludeSniff() : array
    {
        return [
                'PSR2.Classes.ClassDeclaration.CloseBraceAfterBody',
                'PSR1.Classes.ClassDeclaration.MissingNamespace',
                'Squiz.WhiteSpace.MemberVarSpacing.FirstIncorrect',
                'Squiz.WhiteSpace.ScopeClosingBrace.ContentBefore',
               ];
    }

    /** @return void */
    public function testSpacingBefore()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Expected 1 blank line before function; 0 found';
        $this->checkSniff(6, 12, $sniff, $message);
    }

    /** @return void */
    public function testSpacingAfter()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Expected 1 blank line after function; 2 found';
        $this->checkSniff(8, 5, $sniff, $message);
    }

    /** @return void */
    public function testSpacingBeforeLast()
    {
        $sniff = $this->sniff . '.AfterLast';
        $message = 'Expected 0 blank lines after function; 3 found';
        $this->checkSniff(13, 5, $sniff, $message);
    }

    /** @return void */
    public function testGlobalSpacingBefore()
    {
        $sniff = $this->sniff . '.Before';
        $message = 'Expected 1 blank line before function; 2 found';
        $this->checkSniff(20, 1, $sniff, $message);
    }

    /** @return void */
    public function testGlobalSpacingAfter()
    {
        $sniff = $this->sniff . '.After';
        $message = 'Expected 1 blank line after function; 0 found';
        $this->checkSniff(21, 2, $sniff, $message);
    }
}
