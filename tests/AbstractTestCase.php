<?php declare(strict_types=1);

namespace Ptscs\Tests;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Ruleset;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    /** @var string */
    protected $dataPath;

    /** @var Config */
    private $config;

    /** @var Ruleset */
    private $ruleset;

    /** @return void */
    protected function setUp()
    {
        $this->config        = new Config();
        $this->config->cache = false;

        $this->ruleset = new Ruleset($this->config);

        $parts = explode('\\', static::class);

        //@phpstan-ignore-next-line
        $dirname        = strtolower(str_replace('Test', '', array_pop($parts)));
        $this->dataPath = __DIR__ . '/Fixable/_data/' . $dirname . '/';
    }

    protected function doAssertion(string $filename): LocalFile
    {
        $filepath = $this->dataPath . $filename;

        $this->assertFileExists($filepath);

        $phpcsFile = new LocalFile($filepath, $this->ruleset, $this->config);
        $phpcsFile->process();

        $this->assertGreaterThan(
            0,
            $phpcsFile->getFixableCount(),
            sprintf("File %s doesn't have fixable violations", $filename)
        );

        // Attempt to fix the errors.
        $this->assertTrue($phpcsFile->fixer->fixFile());

        if ($phpcsFile->getFixableCount() > 0) {
            $fixable = $phpcsFile->getFixableCount();
            $this->fail(sprintf('Failed to fix %d fixable violations in %s', $fixable, $filename));
        }

        return $phpcsFile;
    }
}
