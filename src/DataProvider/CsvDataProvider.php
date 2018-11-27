<?php

declare(strict_types=1);

namespace RegistryParser\DataProvider;

class CsvDataProvider implements DataProviderInterface
{
    public $rowsGenerator;

    public function __construct(string $fileName)
    {
        $this->rowsGenerator = $this->getRowsGenerator($fileName);
    }

    private function getRowsGenerator(string $fileName): \Generator
    {
        if (($handle = fopen($fileName, 'rb')) !== false) {
            try {
                while (($row = fgetcsv($handle, 0, ',')) !== false) {
                    yield $row;
                }
            } finally {
                fclose($handle);
            }
        }
    }

    public function getNextRow()
    {
        $current = $this->rowsGenerator->current() ?? null;
        $this->rowsGenerator->next();

        return $current;
    }
}
