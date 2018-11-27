<?php

declare(strict_types=1);

namespace RegistryParser\Parser;

use RegistryParser\DataProvider\DataProviderInterface;
use RegistryParser\PaymentData\PaymentData;
use RegistryParser\PaymentData\PaymentDataItem;

class Parser
{
    public function parse(DataProviderInterface $dataProvider): PaymentData
    {
        $parsedData = new PaymentData();
        while ($row = $dataProvider->getNextRow()) {
            if ($this->isMatch($row)) {
              $parsedData->addItem(new PaymentDataItem($row[9], (float)$row[8]));
            }
        }

        return $parsedData;
    }

    private function isMatch(array $row): bool
    {
        return preg_match('/^PAY\d{6}[A-Z]{2}$/', $row[1] ?? '') === 1
            && is_numeric($row[8] ?? '')
            && preg_match('/^[A-Z]{3}$/', $row[9] ?? '') === 1;
    }
}