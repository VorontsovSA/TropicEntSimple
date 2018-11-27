<?php

declare(strict_types=1);

namespace RegistryParser\PaymentData;

class PaymentData
{
    /**
     * @var PaymentDataItem[]
     */
    private $items = [];

    public function addItem(PaymentDataItem $item)
    {
        array_push($this->items, $item);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function __toString(): string
    {
        if (!count($this->items)) {
            return 'No data found' . PHP_EOL;
        }

        $result = 'Totals' . PHP_EOL;
        foreach ($this->items as $item) {
            $result .= $item . PHP_EOL;
        }

        return $result;
    }
}
