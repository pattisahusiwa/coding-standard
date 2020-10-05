<?php declare(strict_types=1);

use Ptscs\Tests\AbstractUnfixable;

final class DirectiveTest extends AbstractUnfixable
{

    public function dataProvider(): array
    {
        return [
                'Strict types test' => [
                                        'no-directive.php.inc',
                                        1,
                                        0,
                                       ],
               ];
    }
}
