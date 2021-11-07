<?php

declare(strict_types=1);

namespace App\Input;

class CsvInput extends \SplFileObject implements InputInterface
{
    const FILE_OPEN_MODE = 'r';

    public function __construct(string $filePath, string $delimiter = ',')
    {
        parent::__construct($filePath, self::FILE_OPEN_MODE);
        $this->setFlags(\SplFileObject::READ_CSV | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::DROP_NEW_LINE);
        $this->setCsvControl($delimiter);
    }

    public function current()
    {
        $row = parent::current();

        if(!$row) {
            return null;
        }

        /**
         * skip headers
         */
        if($this->key() === 0) {
            $this->next();
            $row = parent::current();
        }

        return [
            'first_name' => $row[0],
            'age' => $row[1],
            'gender' => $row[2],
        ];
    }
}