<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\WhiteSpace;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class OperatorSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.OperatorSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/OperatorSpacing.inc';
    }

    /** @return void */
    public function testNoSpaceBefore()
    {
        $sniff = $this->sniff . '.NoSpaceBefore';
        $message = 'Expected 1 space before "="; 0 found';
        $this->checkSniff(3, 6, $sniff, $message);
    }

    /** @return void */
    public function testNoSpaceAfter()
    {
        $sniff = $this->sniff . '.NoSpaceAfter';
        $message = 'Expected 1 space after "="; 0 found';
        $this->checkSniff(4, 7, $sniff, $message);
    }

    /** @return void */
    public function testMultiSpacingBefore()
    {
        $sniff = $this->sniff . '.SpacingBefore';
        $message = 'Expected 1 space before "+"; 2 found';
        $this->checkSniff(5, 12, $sniff, $message);
    }

    /** @return void */
    public function testMultiSpacingAfter()
    {
        $sniff = $this->sniff . '.SpacingAfter';
        $message = 'Expected 1 space after "+"; 2 found';
        $this->checkSniff(6, 11, $sniff, $message);
    }
}
