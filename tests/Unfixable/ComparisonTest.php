<?php declare(strict_types=1);

use Ptscs\Tests\AbstractUnfixable;

final class ComparisonTest extends AbstractUnfixable
{

    public function dataProvider(): array
    {
        return [
                'Forbidden comparison operator' => [
                                                    'operator.php.inc',
                                                    1,
                                                    0,
                                                   ],
               ];
    }
}
