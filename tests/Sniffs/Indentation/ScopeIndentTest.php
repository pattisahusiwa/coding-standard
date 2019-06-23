<?php

namespace XynhaCS\Tests\Sniffs\Identation;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class ScopeIndentTest extends CSAbstractSniffUnitTest
{
    protected function getTestFile()
    {
        return 'Identation' . DIRECTORY_SEPARATOR . 'IncorrectExact';
    }
    public function testIncorrectExactIdentation()
    {
        $this->sniffError(4, 'Generic.WhiteSpace.ScopeIndent.IncorrectExact');
    }
}
