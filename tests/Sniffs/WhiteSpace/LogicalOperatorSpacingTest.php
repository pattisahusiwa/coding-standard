<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\WhiteSpace;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class LogicalOperatorSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.LogicalOperatorSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/LogicalOperatorSpacing.inc';
    }

    /** @return string[] */
    protected function getExcludeSniff() : array
    {
        return [
                'Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace',
                'Squiz.WhiteSpace.ScopeClosingBrace.ContentBefore',
               ];
    }

    /** @return void */
    public function testNoSpaceBefore()
    {
        $sniff = $this->sniff . '.NoSpaceBefore';
        $message = 'Expected 1 space before logical operator; 0 found';
        $this->checkSniff(3, 9, $sniff, $message);
    }

    /** @return void */
    public function testNoSpaceAfter()
    {
        $sniff = $this->sniff . '.NoSpaceAfter';
        $message = 'Expected 1 space after logical operator; 0 found';
        $this->checkSniff(4, 10, $sniff, $message);
    }

    /** @return void */
    public function testTooMuchSpaceBefore()
    {
        $sniff = $this->sniff . '.TooMuchSpaceBefore';
        $message = 'Expected 1 space before logical operator; 3 found';
        $this->checkSniff(5, 12, $sniff, $message);
    }

    /** @return void */
    public function testTooMuchSpaceAfter()
    {
        $sniff = $this->sniff . '.TooMuchSpaceAfter';
        $message = 'Expected 1 space after logical operator; 3 found';
        $this->checkSniff(6, 10, $sniff, $message);
    }
}
