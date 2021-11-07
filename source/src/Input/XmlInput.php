<?php

declare(strict_types=1);

namespace App\Input;

class XmlInput extends \SimpleXMLIterator implements InputInterface
{
    public function __construct(string $filePath)
    {
        parent::__construct($filePath, 0, true);
    }

    public function current()
    {
        $element = parent::current();

        if ($element === null) {
            return null;
        }

        return (array)$element;
    }
}