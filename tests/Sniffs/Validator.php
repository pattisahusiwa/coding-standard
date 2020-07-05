<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs;

use InvalidArgumentException;
use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\DummyFile;
use PHP_CodeSniffer\Ruleset;
use RuntimeException;

final class Validator
{

    /** @var array<string,SniffEntity> */
    private $errors;

    public function errorCount() : int
    {
        return count($this->errors);
    }

    /** @return void */
    public function printError()
    {
        foreach ($this->errors as $item) {
            printf("%s\n", $item->toString());
        }
    }

    public function hasKey(string $key) : bool
    {
        return array_key_exists($key, $this->errors);
    }

    public function getMessage(string $key) : string
    {
        if ($this->hasKey($key)) {
            return $this->errors[$key]->getMessage();
        }

        return '';
    }

    /** @return void */
    public function removeItem(string $key)
    {
        unset($this->errors[$key]);
    }

    /**
     * @param string[] $exclude
     *
     * @return void
     */
    public function setFile(string $filename, array $exclude)
    {
        if (file_exists($filename) === false) {
            throw new InvalidArgumentException('Can\'t load ' . $filename);
        }

        $content = (string)file_get_contents($filename);
        $config = new Config();
        $ruleSet = new Ruleset($config);

        $file = new DummyFile($content, $ruleSet, $config);
        $file->process();

        $this->errors = $this->extractError($file->getErrors(), $exclude);
    }

    /**
     * @param array<string,string>[][][] $data
     * @param string[] $exclude
     *
     * @return array<string,SniffEntity>
     */
    private function extractError(array $data, array $exclude) : array
    {
        $result = array();
        foreach ($data as $line => $lines) {
            foreach ($lines as $column => $errors) {
                foreach ($errors as $errData) {
                    if (in_array($errData['source'], $exclude) === true) {
                        continue;
                    }

                    $entity = new SniffEntity($line, $column, $errData['source'], $errData['message']);

                    if (array_key_exists($entity->getKey(), $result)) {
                        throw new RuntimeException($entity->getKey() . ' is exist');
                    }
                    $result[$entity->getKey()] = $entity;
                }
            }
        }
        return $result;
    }
}
