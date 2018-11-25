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
        $result = '';
        foreach ($this->items as $item) {
            $result .= $item . PHP_EOL;
        }

        return $result;
    }
}