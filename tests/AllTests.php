<?php declare(strict_types=1);

namespace PhpCodeConv\Tests;

use PHPUnit\Framework\TestSuite;
use PhpCodeConv\Tests\Sniffs\Arrays\TsArray;
use PhpCodeConv\Tests\Sniffs\WhiteSpace\TsWhiteSpace;
use PhpCodeConv\Tests\Sniffs\Strings\TsString;

final class AllTests
{

    public static function suite() : TestSuite
    {
        $suite = new TestSuite('PhpCodeConv');

        $ws = new TsWhiteSpace();
        $suite->addTest($ws->getTestSuite());

        $array = new TsArray();
        $suite->addTest($array->getTestSuite());

        $string = new TsString();
        $suite->addTest($string->getTestSuite());

        return $suite;
    }
}
