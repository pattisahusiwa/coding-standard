<?php

namespace XynhaCS\Tests\Sniffs\Strings;

use XynhaCS\Tests\CSAbstractSniffUnitTest;

final class ConcatenationSpacingTest extends CSAbstractSniffUnitTest
{

    private $sniff = 'Squiz.Strings.ConcatenationSpacing';

    protected function getSniffs()
    {
        return $this->sniff;
    }

    protected function getTestFile()
    {
        return 'Strings' . DIRECTORY_SEPARATOR . 'ConcatenationSpacing';
    }

    public function testConcatOperatorPadding()
    {
        $this->noSpaceBefore();
    }

    private function noSpaceBefore()
    {
        $sniff = $this->sniff . '.PaddingFound';
        $message = 'Concat operator must be surrounded by a single space';
        $this->sniffError(3, $sniff, $message);
    }
}
