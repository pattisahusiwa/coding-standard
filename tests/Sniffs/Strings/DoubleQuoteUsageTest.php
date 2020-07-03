<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Strings;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class DoubleQuoteUsageTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.Strings.DoubleQuoteUsage';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile(): string
    {
        return 'Strings/DoubleQuoteUsage';
    }

    /** @return void */
    public function testDoubleQuote()
    {
        $this->useSingleQuote();
        $this->containsVar();
    }

    /** @return void */
    private function useSingleQuote()
    {
        $sniff = $this->sniff . '.NotRequired';
        $message = 'String "Hello world!" does not require double quotes; use single quotes instead';
        $this->sniffError(3, $sniff, $message);
    }

    /** @return void */
    private function containsVar()
    {
        $sniff = $this->sniff . '.ContainsVar';
        $message = 'Variable "$there" not allowed in double quoted string; use concatenation instead';
        $this->sniffError(4, $sniff, $message);
    }
}
