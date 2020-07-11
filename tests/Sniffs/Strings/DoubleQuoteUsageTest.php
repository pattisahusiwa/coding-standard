<?php declare(strict_types=1);

namespace Ptscs\Tests\Sniffs\Strings;

use Ptscs\Tests\Sniffs\AbstractTestCase;

final class DoubleQuoteUsageTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.Strings.DoubleQuoteUsage';

    protected function getFilename(): string
    {
        return 'Strings/DoubleQuoteUsage.inc';
    }

    /** @return void */
    public function testUseSingleQuote()
    {
        $sniff = $this->sniff . '.NotRequired';
        $message = 'String "Hello world!" does not require double quotes; use single quotes instead';
        $this->checkSniff(3, 9, $sniff, $message);
    }

    /** @return void */
    public function testContainsVar()
    {
        $sniff = $this->sniff . '.ContainsVar';
        $message = 'Variable "$there" not allowed in double quoted string; use concatenation instead';
        $this->checkSniff(4, 8, $sniff, $message);
    }
}
