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
    }

    protected function doAssertion(string $filename): LocalFile
    {
        $filepath = $this->dataPath . $filename;

        $this->assertFileExists($filepath);

        $phpcsFile = new LocalFile($filepath, $this->ruleset, $this->config);
        $phpcsFile->process();

        return $phpcsFile;
    }
}
