<?php declare(strict_types=1);

use Ptscs\Tests\AbstractTestCase;

final class WhitespaceTest extends AbstractTestCase
{

    public function dataProvider() : array
    {
        return [
                'Cast test'               => [
                                              'cast.php.fixed',
                                              'cast.php.inc',
                                             ],
                'Function test'           => [
                                              'function.php.fixed',
                                              'function.php.inc',
                                             ],
                'Language construct test' => [
                                              'language.php.fixed',
                                              'language.php.inc',
                                             ],
                'Logical Operator test'   => [
                                              'logical-operator.php.fixed',
                                              'logical-operator.php.inc',
                                             ],
                'Scope Indent test'       => [
                                              'ScopeIndent.php.fixed',
                                              'ScopeIndent.php.inc',
                                             ],
                'Object Operator test'    => [
                                              'object.php.fixed',
                                              'object.php.inc',
                                             ],
                'Operator test'           => [
                                              'operator.php.fixed',
                                              'operator.php.inc',
                                             ]
               ];
    }
}
