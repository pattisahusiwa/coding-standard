<?php declare(strict_types=1);

use Ptscs\Tests\AbstractTestCase;

final class WhitespaceTest extends AbstractTestCase
{

    public function dataProvider() : array
    {
        return [
                'Whitespace style' => [
                                       'cast.php.fixed',
                                       'cast.php.inc',
                                      ],
               ];
    }
}
