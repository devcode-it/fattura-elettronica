<?php

namespace DevCode\FatturaElettronica\Standard;

use DevCode\FatturaElettronica\Interfaces\FieldInterface;
use DevCode\FatturaElettronica\Interfaces\UnserializeInterface;

/**
 * Classe per la gestione virtuale di stringhe che hanno lunghezza massima e possono essere separate in più elementi.
 */
class Testo implements \IteratorAggregate, FieldInterface, UnserializeInterface
{
    protected bool $optional;
    protected int $minLength;
    protected ?int $maxLength;
    protected ?int $molteplicita;
    protected ?string $regex;
    protected ?string $content;

    public function __construct(
        bool $optional,
        int $minLength,
        ?int $maxLength,
        ?int $molteplicita = null,
        ?string $regex = null,
        ?string $content = null,
    ) {
        $this->optional = $optional;
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->molteplicita = $molteplicita;
        $this->regex = $regex;

        $this->content = null;
        if (!is_null($content)) {
            $this->set($content);
        }
    }

    public function set($value): void
    {
        $len = strlen($value);
        if ($len >= $this->minLength) {
            if (empty($this->molteplicita)) {
                $this->content = $this->cleanup($value);

                return;
            } else {
                if (empty($this->maxLength) || empty($this->molteplicita)) {
                    $this->content = $this->cleanup($value);

                    return;
                } elseif (!empty($this->molteplicita) && $len <= $this->molteplicita * $this->maxLength) {
                    $this->content = $this->cleanup($value);

                    return;
                }
            }
        }

        if ($len == 0 && $this->optional) {
            $this->content = null;

            return;
        }

        throw new \InvalidArgumentException("Text value length must be within {$this->minLength} and {$this->maxLength} (repeated by {$this->molteplicita}, not optional) - \"{$value}\" has length {$len}");
    }

    public function get()
    {
        return $this->content;
    }

    public function toArray(): array
    {
        return !$this->isEmpty() ? (
            empty($this->maxLength) ?
            [$this->content] :
            str_split($this->content, $this->maxLength)
        ) : [];
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->toArray());
    }

    public function isEmpty(): bool
    {
        return empty($this->content);
    }

    public function isOptional(): bool
    {
        return $this->optional;
    }

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

    protected function cleanup($value)
    {
        if (empty($this->regex)) {
            return $value;
        }

        preg_match_all('/(\\\p\{(.+?)\})/', $this->regex, $match);
        if (empty($match[0])) {
            return $value;
        }

        // http://www.unicode.org/reports/tr44/#Code_Point_Ranges
        $mappa_charset = [
            'IsBasicLatin' => '\x00-\x7F',
            'IsLatin-1Supplement' => '\x80-\xFF',
        ];
        $match_regex = [];
        foreach ($match[2] as $charset) {
            if (isset($mappa_charset[$charset])) {
                $match_regex[] = $mappa_charset[$charset];
            }
        }
        $match_replace = implode('', $match_regex);

        return preg_replace('/[^'.$match_replace.']+/u', '', $value);
    }
}
