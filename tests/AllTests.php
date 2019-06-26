<?php

namespace XynhaCS\Tests;

use PHPUnit\Framework\TestSuite;

use XynhaCS\Tests\Sniffs\Arrays\TsArray;
use XynhaCS\Tests\Sniffs\WhiteSpace\TsWhiteSpace;

final class AllTests
{

    public static function suite()
    {
        $suite = new TestSuite('XynhaCS');

        $ws = new TsWhiteSpace();
        $suite->addTest($ws->getTestSuite());

        $array = new TsArray();
        $suite->addTest($array->getTestSuite());

        return $suite;
    }
}
