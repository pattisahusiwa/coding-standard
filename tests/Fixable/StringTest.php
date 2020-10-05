<?php declare(strict_types=1);

use Ptscs\Tests\AbstractFixable;

final class StringTest extends AbstractFixable
{

    public function dataProvider(): array
    {
        return [
                'Echoed String should not be bracketed' => [
                                                            'EchoedStrings.php.fixed',
                                                            'EchoedStrings.php.inc',
                                                           ],
                'Double Quote'                          => [
                                                            'DoubleQuote.php.fixed',
                                                            'DoubleQuote.php.inc',
                                                           ],
                'Concatenation spacing'                 => [
                                                            'concatenation.php.fixed',
                                                            'concatenation.php.inc',
                                                           ]
               ];
    }
}
