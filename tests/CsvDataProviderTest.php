<?php

declare(strict_types=1);

namespace RegistryParser\Tests;

use RegistryParser\DataProvider\CsvDataProvider;
use PHPUnit\Framework\TestCase;

class CsvDataProviderTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_work(): void
    {
        $dataProvider = new CsvDataProvider(__DIR__ . '/fixtures/test1.csv');
        $dataProvider->getNextRow();
        $row2 = $dataProvider->getNextRow();
        self::assertEquals([
            '06/03/2011',
            'PAY000003RV',
            '',
            '',
            '',
            '',
            'ITL',
            '',
            '43543.23',
            'EUR',
        ], $row2);
    }
}
