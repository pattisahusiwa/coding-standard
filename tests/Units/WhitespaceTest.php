<?php declare(strict_types=1);

use Ptscs\Tests\AbstractTestCase;

final class WhitespaceTest extends AbstractTestCase
{

    public function dataProvider() : array
    {
        return [
                'Cast style'     => [
                                     'cast.php.fixed',
                                     'cast.php.inc',
                                    ],
                'Function style' => [
                                     'function.php.fixed',
                                     'function.php.inc',
                                    ]
               ];
    }
}
