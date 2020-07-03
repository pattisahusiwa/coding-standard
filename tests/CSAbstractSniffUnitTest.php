<?php declare(strict_types=1);

namespace PhpCodeConv\Tests;

use PHPUnit\Framework\TestCase;
use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Ruleset;
use PHP_CodeSniffer\Files\DummyFile;
use PhpCodeConv\Tests\CSTestEntity;

abstract class CSAbstractSniffUnitTest extends TestCase
{

    // private $incDir;

    /** @var array<int,array<int,CSTestEntity>> */
    private $errors = array();

    /** @var array<int,array<int,CSTestEntity>> */
    private $warnings = array();

    /** @return string */
    abstract protected function getTestFile();

    /** @return string */
    abstract protected function getSniffs();

    /** @return void */
    final public function setUp()
    {
        $this->setFile(__DIR__ . '/Inc/' . $this->getTestFile() . '.inc');
    }

    /** @return void */
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
        }

        if (empty($this->warnings) === false) {
            var_dump($this->warnings);
        }

        // unset($this->incDir);
        unset($this->errors);
        unset($this->warnings);
    }

    /** @return void */
    final protected function sniffError(int $lineNum, string $source, string $message)
    {
        if (array_key_exists($lineNum, $this->errors) === false) {
            $this->fail('No error found on line ' . $lineNum);
        }

        /** @var array<int,CSTestEntity> $lineErrors */
        $lineErrors = $this->errors[$lineNum];

        /** @var CSTestEntity $entity */
        foreach ($lineErrors as $key => $entity) {
            if ($entity->getSource() === $source) {
                unset($this->errors[$lineNum][$key]);

                if (empty($this->errors[$lineNum]) === true) {
                    unset($this->errors[$lineNum]);
                }

                $this->assertEquals($message, $entity->getMessage());
                return;
            }
        }

        $this->fail($source . ' is not found on line ' . $lineNum);
    }

    /** @return void */
    private function setFile(string $filename)
    {
        if (file_exists($filename) === false) {
            $this->fail('Can not load ' . $filename);
        }

        $content = (string)file_get_contents($filename);
        $config = new Config();
        $ruleSet = new Ruleset($config);

        $file = new DummyFile($content, $ruleSet, $config);
        $file->process();
        $this->errors = $this->filterSniff($this->getSniffs(), $file->getErrors());
        $this->warnings = $this->filterSniff($this->getSniffs(), $file->getWarnings());
    }

    /**
     * @param array<string,string>[][][] $haystack
     * @return CSTestEntity[][]
     */
    private function filterSniff(string $sniff, array $haystack) : array
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
