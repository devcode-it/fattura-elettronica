<?php

namespace Dasc3er\FatturaElettronica\Fields;

use ArrayIterator;
use Dasc3er\FatturaElettronica\Interfaces\FieldInterface;
use Dasc3er\FatturaElettronica\Interfaces\UnserializeInterface;
use IteratorAggregate;

/**
 * Classe per la gestione virtuale di stringhe che hanno lunghezza massima e possono essere separate in più elementi.
 */
class Text implements IteratorAggregate, FieldInterface, UnserializeInterface
{
    protected int $length;
    protected ?string $content;

    public function __construct(
        int $length,
        ?string $content = null
    ) {
        $this->length = $length;
        $this->content = $content;
    }

    /**
     * {@inheritdoc}
     */
    public function set($value): void
    {
        $this->content = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->content;
    }

    public function toArray(): array
    {
        return !$this->isEmpty() ? str_split($this->content, $this->length) : [];
    }

    public function getIterator()
    {
        return new ArrayIterator($this->toArray());
    }

    public function isEmpty(): bool
    {
        return empty($this->content);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize(array $content): void
    {
        if (!isset($content[0])) {
            $content = [$content];
        }

        $result = '';
        foreach ($content as $i => $var) {
            $result .= $var;
        }

        $this->content = $result;
    }
}
