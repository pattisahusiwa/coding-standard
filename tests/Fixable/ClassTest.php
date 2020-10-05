<?php declare(strict_types=1);

use Ptscs\Tests\AbstractFixable;

final class ClassTest extends AbstractFixable
{

    public function dataProvider(): array
    {
        return [
                'Class declaration' => [
                                        'class.php.fixed',
                                        'class.php.inc',
                                       ],
               ];
    }
}
