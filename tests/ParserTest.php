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
            'Totals' . PHP_EOL
            . 'EUR 43,543.23' . PHP_EOL
            . 'USD 13,432.34' . PHP_EOL
            . 'GBP 3,432.21' . PHP_EOL
            . 'CAD 2,321.34' . PHP_EOL
            . 'USD 1,000.00' . PHP_EOL;

        $parser = new Parser();
        $dataProvider = new CsvDataProvider(__DIR__ . '/fixtures/test1.csv');
        $response = $parser->parse($dataProvider);

        self::assertEquals($expectedResponse, $response);
    }

    /**
     * @test
     */
    public function it_should_parse_test2(): void
    {
        $expectedResponse =
            'Totals' . PHP_EOL
            . 'EUR 43,543.23' . PHP_EOL
            . 'RUR 4,352,342,343.00' . PHP_EOL
            . 'BTC 12.23' . PHP_EOL;

        $parser = new Parser();
        $dataProvider = new CsvDataProvider(__DIR__ . '/fixtures/test2.csv');
        $response = $parser->parse($dataProvider);

        self::assertEquals($expectedResponse, $response);
    }
}
