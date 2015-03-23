<?php

require_once __DIR__ . '/../vendor/autoload.php';

defined('TEST_FIXTURES_DIR') ? : define('TEST_FIXTURES_DIR', __DIR__ . '/fixtures/');

if (!file_exists(TEST_FIXTURES_DIR)) {
    throw new \Exception('TEST_FIXTURES_DIR does not exist at path: ' . TEST_FIXTURES_DIR);
}