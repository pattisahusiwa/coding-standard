<?php declare(strict_types=1);

namespace Ptscs\Tests\Fixable;

use Ptscs\Tests\AbstractFixable;

final class DirectiveTest extends AbstractFixable
{

    public function dataProvider(): array
    {
        return [
                'Strict Types on the same line' => [
                                                    'directive-01.php.fixed',
                                                    'directive-01.php.inc',
                                                   ],
                'Strict Types on the next line' => [
                                                    'directive-02.php.fixed',
                                                    'directive-02.php.inc',
                                                   ],
                'Strict Types on the few lines' => [
                                                    'directive-03.php.fixed',
                                                    'directive-03.php.inc',
                                                   ]
               ];
    }
}
