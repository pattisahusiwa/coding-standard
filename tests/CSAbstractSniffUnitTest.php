<?php

namespace XynhaCS\Tests;

use PHPUnit\Framework\TestCase;
use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Ruleset;
use PHP_CodeSniffer\Files\DummyFile;

abstract class CSAbstractSniffUnitTest extends TestCase
{

    private $incDir;

    private $errors = array();

    private $warnings = array();

    abstract protected function getTestFile();

    final public function setUp()
    {
        $this->incDir = __DIR__ . DIRECTORY_SEPARATOR . 'Inc' . DIRECTORY_SEPARATOR;
        $this->setFile($this->incDir . $this->getTestFile() . '.inc');
    }

    final public function tearDown()
    {
        unset($this->incDir);
        unset($this->errors);
        unset($this->warnings);
    }

    final protected function sniffError($lineNum, $sniff)
    {
        if (array_key_exists($lineNum, $this->errors) === false) {
            $this->fail('No error found on line ' . $lineNum);
        }

        $lineErrors = $this->errors[$lineNum];
        foreach ($lineErrors as $columnErrors) {
            foreach ($columnErrors as $errors) {
                if ($errors['source'] === $sniff) {
                    return $this->assertSame($sniff, $errors['source']);
                }
            }
        }

        return $this->fail($sniff . ' is not found on line ' . $lineNum);
    }

    private function setFile($filename)
    {
        if (file_exists($filename) === false) {
            $this->fail('Can not load ' . $filename);
        }

        $content = file_get_contents($filename);
        $config = new Config();
        $ruleSet = new Ruleset($config);

        $file = new DummyFile($content, $ruleSet, $config);
        $file->process();
        $this->errors = $file->getErrors();
        $this->warnings = $file->getWarnings();
    }
}
