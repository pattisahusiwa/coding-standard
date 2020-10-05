<?php declare(strict_types=1);

use Ptscs\Tests\AbstractTestCase;

final class ArrayTest extends AbstractTestCase
{

    public function dataProvider() : array
    {
        return [
                'Array declaration' => [
                                        'array.php.fixed',
                                        'array.php.inc',
                                       ],
               ];
    }
}
