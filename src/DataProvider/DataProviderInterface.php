<?php

declare(strict_types=1);

namespace RegistryParser\DataProvider;

interface DataProviderInterface
{
    /**
     * @return array|null
     */
    public function getNextRow();
}