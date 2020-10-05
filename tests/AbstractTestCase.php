<?php declare(strict_types=1);

namespace Ptscs\Tests;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Ruleset;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{

    /** @var Config */
    private $config;

    /** @var Ruleset */
    private $ruleset;

    /** @var string */
    private $dataPath;

    /** @return array<string,string[]> */
    abstract public function dataProvider(): array;

    /** @return void */
    protected function setUp()
    {
        $this->config        = new Config();
        $this->config->cache = false;

        $this->ruleset = new Ruleset($this->config);

        $parts = explode('\\', static::class);

        //@phpstan-ignore-next-line
        $dirname        = strtolower(str_replace('Test', '', array_pop($parts)));
        $this->dataPath = __DIR__ . '/Units/_data/' . $dirname . '/';
    }

    /**
     * @dataProvider dataProvider
     *
     * @return void
     */
    public function testSniff(string $expected, string $actual)
    {
        $expectedFile = $this->dataPath . $expected;
        $actualFile   = $this->dataPath . $actual;

        $this->assertFileExists($expectedFile);
        $this->assertFileExists($actualFile);

        $phpcsFile = new LocalFile($actualFile, $this->ruleset, $this->config);
        $phpcsFile->process();

        $this->assertGreaterThan(
            0,
            $phpcsFile->getFixableCount(),
            sprintf("File %s doesn't have fixable violations", $actual)
        );

        // Attempt to fix the errors.
        $this->assertTrue($phpcsFile->fixer->fixFile());

        $fixable = $phpcsFile->getFixableCount();
        $this->assertSame(0, $fixable, sprintf('Failed to fix %d fixable violations in %s', $fixable, $actual));

        // Compare with fixed file
        $diff = $phpcsFile->fixer->generateDiff($expectedFile);
        if ($diff !== '') {
            $msg = sprintf(
                "Fixed version of %s does not match expected version in %s; the diff is\n%s",
                $actual,
                $expected,
                $diff
            );
            $this->fail($msg);
        }
    }
}
