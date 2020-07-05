<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\Strings;

use PhpCodeConv\Tests\Sniffs\AbstractTestCase;

final class ConcatenationSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.Strings.ConcatenationSpacing';

    protected function getFilename() : string
    {
        return 'Strings/ConcatenationSpacing.inc';
    }

    /** @return void */
    public function testNoSpaceBefore()
    {
        $sniff = $this->sniff . '.PaddingFound';
        $message = 'Concat operator must be surrounded by a single space';
        $this->checkSniff(3, 15, $sniff, $message);
    }
}
