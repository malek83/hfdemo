<?php

declare(strict_types=1);

namespace App\Input;

/**
 * Class JsonInput
 * @package App\Input
 */
final class JsonInput implements InputInterface
{
    protected ?array $content = null;

    protected int $currentPosition = 0;

    public function __construct(protected string $filePath)
    {
    }

    public function current()
    {
        return $this->getContent()[$this->currentPosition];
    }

    public function next()
    {
        $this->currentPosition++;
    }

    public function key()
    {
        return $this->currentPosition;
    }

    public function valid()
    {
        return isset($this->getContent()[$this->currentPosition]);
    }

    public function rewind()
    {
        $this->currentPosition = 0;
    }

    public function getContent(): array
    {
        if ($this->content === null) {
            $this->content = json_decode(file_get_contents($this->filePath), true);
        }

        return $this->content;
    }
}
