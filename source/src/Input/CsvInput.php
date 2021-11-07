<?php

declare(strict_types=1);

namespace App\Input;

/**
 * Class CsvInput
 * @package App\Input
 */
final class CsvInput extends \SplFileObject implements InputInterface
{
    const FILE_OPEN_MODE = 'r';

    protected array $headers = [];

    public function __construct(string $filePath, string $delimiter = ',')
    {
        parent::__construct($filePath, self::FILE_OPEN_MODE);
        $this->setFlags(\SplFileObject::READ_CSV | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE);
        $this->setCsvControl($delimiter);
    }

    public function current()
    {
        $row = parent::current();

        /**
         * set headers
         */
        if ($this->key() === 0) {
            $this->setHeaders($row ?? []);
            $this->next();
            $row = parent::current();
        }

        if (!$row) {
            return null;
        }

        return $this->mapValues($row);
    }

    private function setHeaders(array $headers): void
    {
        $this->headers = array_flip(array_map('strtolower', $headers));
    }

    private function mapValues(array $row): array
    {
        return array_map(function ($value) use ($row) {
            return $row[$value] ?? null;
        }, $this->headers);
    }
}