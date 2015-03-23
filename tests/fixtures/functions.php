<?php
/**
 * Functions used for testing purposes
 */

function testsFixturesWrongForeachParamOnLine9()
{
    $foreachParam = null; // wrong param for foreach
    foreach ($foreachParam as $i) { // MUST be on line: 9
        // it should raise an error
    }

    return 'testsFixturesWrongForeachParamOnLine9 result';
}

function testFixturesUndefinedOffsetOnLine19()
{
    $array = [];
    $x = $array[10]; // NOTICE: This must be on line 19

    return 'testFixturesUndefinedOffsetOnLine19 result';
}