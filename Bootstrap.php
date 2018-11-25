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
        $dataProvider = new CsvDataProvider($argv[1]);
        $parser = new Parser($dataProvider);
        $response = $parser->getResults();

        echo $response;
    }
}

Bootstrap::main($argv);

