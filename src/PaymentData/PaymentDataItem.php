<?php

declare(strict_types=1);

namespace RegistryParser\PaymentData;

class PaymentDataItem
{
    private $currency;
    private $value;

    public function __construct(string $currency, float $value)
    {
        $this->currency = $currency;
        $this->value = $value;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->currency . ' ' . number_format($this->value, 2);
    }
}
