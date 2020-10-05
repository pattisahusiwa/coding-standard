<?php declare(strict_types=1);

use Ptscs\Tests\AbstractFixable;

final class ArrayTest extends AbstractFixable
{

    public function dataProvider(): array
    {
        return [
                'Array declaration' => [
                                        'array.php.fixed',
                                        'array.php.inc',
                                       ],
               ];
    }
}
