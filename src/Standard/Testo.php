<?php

namespace DevCode\FatturaElettronica\Standard;

use ArrayIterator;
use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\UnserializeInterface;
use IteratorAggregate;

/**
 * Classe per la gestione virtuale di stringhe che hanno lunghezza massima e possono essere separate in più elementi.
 */
class Testo implements IteratorAggregate, FieldInterface, UnserializeInterface
{
    protected bool $optional;
    protected int $minLength;
    protected int $maxLength;
    protected ?int $molteplicita;
    protected ?string $content;

    public function __construct(
        bool $optional,
        int $minLength,
        int $maxLength,
        ?int $molteplicita = null,
        ?string $content = null
    ) {
        $this->optional = $optional;
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->molteplicita = $molteplicita;
    
        $this->content = null;
        if (!is_null($content)) $this->set($content);
    }

    /**
     * {@inheritdoc}
     */
    public function set($value): void
    {
        $len = strlen($value);
        if ($len >= $this->minLength) {
            if (empty($this->molteplicita)){
                $this->content = $value;
            } else {
                $this->content = \substr($value, 0, $this->molteplicita*$this->maxLength);
            }

            return;
        }

        throw new \InvalidArgumentException("Text value length must be within {$this->minLength} and {$this->maxLength} (repeated by {$this->molteplicita})");
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
        return !$this->isEmpty() ? str_split($this->content, $this->maxLength) : [];
    }

    public function getIterator(): \Traversable
    {
        return new ArrayIterator($this->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty(): bool
    {
        return empty($this->content);
    }
    
    /**
     * {@inheritdoc}
     */
    public function isOptional(): bool
    {
        return $this->optional;
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
