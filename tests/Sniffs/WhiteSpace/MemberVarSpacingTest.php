<?php declare(strict_types=1);

namespace PhpCodeConv\Tests\Sniffs\WhiteSpace;

use PhpCodeConv\Tests\Sniffs\AbstractTestCase;

final class MemberVarSpacingTest extends AbstractTestCase
{

    /** @var string */
    private $sniff = 'Squiz.WhiteSpace.MemberVarSpacing';

    protected function getSniffs() : string
    {
        return $this->sniff;
    }

    protected function getFilename() : string
    {
        return 'WhiteSpace/MemberVarSpacing.inc';
    }

    /** @return string[] */
    protected function getExcludeSniff() : array
    {
        return [
                'PSR1.Classes.ClassDeclaration.MissingNamespace',
                'Squiz.WhiteSpace.FunctionSpacing.Before',
                'PSR2.Methods.FunctionClosingBrace.SpacingBeforeClose',
               ];
    }

    /** @return void */
    public function testSpaceBeforeFirstProperty()
    {
        $sniff = $this->sniff . '.FirstIncorrect';
        $message = 'Expected 1 blank line(s) before first member var; 0 found';
        $this->checkSniff(5, 5, $sniff, $message);
    }

    /** @return void */
    public function testSpaceBetweenProperties()
    {
        $sniff = $this->sniff . '.Incorrect';
        $message = 'Expected 1 blank line(s) before member var; 0 found';
        $this->checkSniff(6, 5, $sniff, $message);

        $message = 'Expected 1 blank line(s) before member var; 2 found';
        $this->checkSniff(9, 5, $sniff, $message);
    }
}
