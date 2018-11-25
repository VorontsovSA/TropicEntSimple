<?php

declare(strict_types=1);

namespace RegistryParser\Tests;

use PHPUnit\Framework\TestCase;
use RegistryParser\DataProvider\CsvDataProvider;
use RegistryParser\Parser\Parser;

class ParserTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_parse_test1(): void
    {
        $expectedResponse =
            'EUR 43,543.23' . PHP_EOL
            . 'USD 13,432.34' . PHP_EOL
            . 'GBP 3,432.21' . PHP_EOL
            . 'CAD 2,321.34' . PHP_EOL
            . 'USD 1,000.00' . PHP_EOL;

        $dataProvider = new CsvDataProvider(__DIR__ . '/fixtures/test1.csv');
        $parser = new Parser($dataProvider);
        $response = $parser->getResults();

        self::assertEquals($expectedResponse, $response);
    }

    /**
     * @test
     */
    public function it_should_parse_test2(): void
    {
        $expectedResponse =
            'EUR 43,543.23' . PHP_EOL
            . 'RUR 4,352,342,343.00' . PHP_EOL
            . 'BTC 12.23' . PHP_EOL;

        $dataProvider = new CsvDataProvider(__DIR__ . '/fixtures/test2.csv');
        $parser = new Parser($dataProvider);
        $response = $parser->getResults();

        self::assertEquals($expectedResponse, $response);
    }
}