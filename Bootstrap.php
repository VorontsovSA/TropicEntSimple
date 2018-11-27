<?php

require_once __DIR__ . '/vendor/autoload.php';

use RegistryParser\DataProvider\CsvDataProvider;
use RegistryParser\Parser\Parser;

/**
 * @author <insert name>
 * @package test
 *
 */
class Bootstrap
{
    public static function main($argv)
    {
        $parser = new Parser();
        $dataProvider = new CsvDataProvider((string)$argv[1]);
        $response = $parser->parse($dataProvider);

        echo $response;
    }
}

Bootstrap::main($argv);

