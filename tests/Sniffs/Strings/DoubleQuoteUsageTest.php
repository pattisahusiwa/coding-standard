<?php

namespace XynhaCS\Tests\Sniffs\Strings;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class DoubleQuoteUsageTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.Strings.DoubleQuoteUsage';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Strings' . DIRECTORY_SEPARATOR . 'DoubleQuoteUsage';
    }

    public function testDoubleQuote()
    {
        $this->useSingleQuote();
        $this->containsVar();
    }

    private function useSingleQuote()
    {
        $sniff = $this->sniff . '.NotRequired';
        $message = 'String "Hello world!" does not require double quotes; use single quotes instead';
        $this->sniffError(3, $sniff, $message);
    }

    private function containsVar()
    {
        $sniff = $this->sniff . '.ContainsVar';
        $message = 'Variable "$there" not allowed in double quoted string; use concatenation instead';
        $this->sniffError(4, $sniff, $message);
    }
}
