<?php

declare(strict_types=1);

namespace RegistryParser\Parser;

use RegistryParser\DataProvider\DataProviderInterface;
use RegistryParser\PaymentData\PaymentData;
use RegistryParser\PaymentData\PaymentDataItem;

class Parser
{
    private $dataProvider;
    private $parsedData;

    public function __construct(DataProviderInterface $dataProvider)
    {
        $this->dataProvider = $dataProvider;
        $this->parsedData = new PaymentData();
        $this->parse();
    }

    private function parse(): void
    {
        while ($row = $this->dataProvider->getNextRow()) {
            if ($this->isMatch($row)) {
                $this->addParsedItem($row[9], (float)$row[8]);
            }
        }
    }

    private function isMatch(array $row): bool
    {
        return preg_match('/^PAY\d{6}[A-Z]{2}$/', $row[1]) === 1
            && is_numeric($row[8])
            && preg_match('/^[A-Z]{3}$/', $row[9]) === 1;
    }

    private function addParsedItem(string $currency, float $value): void
    {
        $this->parsedData->addItem(new PaymentDataItem($currency, $value));
    }

    public function getResults(): PaymentData
    {
        return $this->parsedData;
    }
}