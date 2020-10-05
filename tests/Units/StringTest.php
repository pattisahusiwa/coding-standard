<?php declare(strict_types=1);

use Ptscs\Tests\AbstractTestCase;

final class StringTest extends AbstractTestCase
{

    public function dataProvider() : array
    {
        return [
                'Echoed String should not be bracketed' => [
                                                            'EchoedStrings.php.fixed',
                                                            'EchoedStrings.php.inc',
                                                           ],
               ];
    }
}
