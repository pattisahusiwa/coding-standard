<?php

namespace XynhaCS\Tests;

use PHPUnit\Framework\TestCase;
use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Ruleset;
use PHP_CodeSniffer\Files\DummyFile;
use XynhaCS\Tests\CSTestEntity;

abstract class CSAbstractSniffUnitTest extends TestCase
{

    private $incDir;

    /** @var CSTestEntity[] */
    private $errors = array();

    /** @var CSTestEntity[] */
    private $warnings = array();

    abstract protected function getTestFile();

    abstract protected function getSniffs();

    final public function setUp()
    {
        $this->incDir = __DIR__ . DIRECTORY_SEPARATOR . 'Inc' . DIRECTORY_SEPARATOR;
        $this->setFile($this->incDir . $this->getTestFile() . '.inc');
    }

    final public function tearDown()
    {
        if (empty($this->errors) === false) {
            print("\n");
            foreach ($this->errors as $errorLine) {
                foreach ($errorLine as $error) {
                    printf(
                        "%s (Line %d:%d)\n%s\n\n",
                        $error->getSource(),
                        $error->getLine(),
                        $error->getColumn(),
                        $error->getMessage()
                    );
                }
            }
            // var_dump($this->errors);
            // print_r($this->errors);
        }

        if (empty($this->warnings) === false) {
            var_dump($this->warnings);
        }

        unset($this->incDir);
        unset($this->errors);
        unset($this->warnings);
    }

    final protected function sniffError($lineNum, $source, $message)
    {
        if (array_key_exists($lineNum, $this->errors) === false) {
            $this->fail('No error found on line ' . $lineNum);
        }

        $lineErrors = $this->errors[$lineNum];

        /** @var CSTestEntity $entity */
        foreach ($lineErrors as $key => $entity) {
            if ($entity->getSource() === $source) {
                unset($this->errors[$lineNum][$key]);

                if (empty($this->errors[$lineNum]) === true) {
                    unset($this->errors[$lineNum]);
                }

                return $this->assertEquals($message, $entity->getMessage());
            }
        }

        return $this->fail($source . ' is not found on line ' . $lineNum);
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
        $this->errors = $this->filterSniff($this->getSniffs(), $file->getErrors());
        $this->warnings = $this->filterSniff($this->getSniffs(), $file->getWarnings());
    }

    private function filterSniff($sniff, array $haystack)
    {
        $result = array();
        foreach ($haystack as $line => $lines) {
            foreach ($lines as $column => $errors) {
                foreach ($errors as $errData) {
                    if (strpos($errData['source'], $sniff) !== false) {
                        $entity = new CSTestEntity($line, $column, $errData);
                        $result[$line][] = $entity;
                    }
                }
            }
        }
        return $result;
    }
}
