<?php

namespace Paq\PhpStarter\Test\Unit;

class PhpStarterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        \Paq\PhpStarter\PhpStarter::convertErrorsToExceptions(true);
        require_once TEST_FIXTURES_DIR . '/functions.php';
    }

    public function tearDown()
    {
        restore_error_handler();
    }

    /**
     * @expectedException \ErrorException
     * @expectedExceptionMessage Undefined variable: notSetVariable
     */
    public function testConvertErrorsToExceptions()
    {
        $a = $notSetVariable + 1;
    }

    /**
     * @expectedException \ErrorException
     * @expectedExceptionMessage Invalid argument supplied for foreach() [Source code :: File: functions.php; Line: 9]
     */
    public function testConvertErrorsToExceptionsMessageWithFileAndLineForForeachError()
    {
        testsFixturesWrongForeachParamOnLine9();
    }

    /**
     * @expectedException \ErrorException
     * @expectedExceptionMessage Undefined offset: 10 [Source code :: File: functions.php; Line: 19]
     */
    public function testConvertErrorsToExceptionsMessageWithFileAndLineForUndefinedOffsetError()
    {
        testFixturesUndefinedOffsetOnLine19();
    }

    public function testSilencedUndefinedVariable()
    {
        // $notSetVariable will hold default value of 0 in this context
        $a = @$notSetVariable + 1;
        $this->assertEquals(1, $a);
    }

    public function testSilencedInvalidParameterForForeach()
    {
        $result = @testsFixturesWrongForeachParamOnLine9();
        $this->assertEquals('testsFixturesWrongForeachParamOnLine9 result', $result);
    }

    public function testSilencedUndefinedOffset()
    {
        $result = @testFixturesUndefinedOffsetOnLine19();
        $this->assertEquals('testFixturesUndefinedOffsetOnLine19 result', $result);
    }
}
