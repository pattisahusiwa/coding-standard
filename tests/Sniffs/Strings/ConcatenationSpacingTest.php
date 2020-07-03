<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Strings;

use PhpCodeConv\Tests\CSAbstractSniffUnitTest;

final class ConcatenationSpacingTest extends CSAbstractSniffUnitTest
{

    /** @var string */
    private $sniff = 'Squiz.Strings.ConcatenationSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getTestFile() : string
    {
        return 'Strings/ConcatenationSpacing';
    }

    /** @return void */
    public function testConcatOperatorPadding()
    {
        $this->noSpaceBefore();
    }

    /** @return void */
    private function noSpaceBefore()
    {
        $sniff = $this->sniff . '.PaddingFound';
        $message = 'Concat operator must be surrounded by a single space';
        $this->sniffError(3, $sniff, $message);
    }
}
