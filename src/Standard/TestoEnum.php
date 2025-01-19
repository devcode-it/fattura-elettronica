<?php

namespace DevCode\FatturaElettronica\Standard;

/**
 * Classe per la gestione virtuale di stringhe limitate a un specifico ENUM.
 */
class TestoEnum extends Testo
{
    protected bool $optional;
    protected string $class;
    protected ?string $content;

    public function __construct(
        bool $optional,
        string $class,
        ?string $content = null,
    ) {
        $this->class = $class;

        parent::__construct($optional, 0, null, null, $content);
    }

    public function set($value): void
    {
        if (is_a($value, $this->class, true)) {
            parent::set($value->value);

            return;
        }

        $try = call_user_func([$this->class, 'tryFrom'], $value);
        if (!is_null($try)) {
            parent::set($try->value);

            return;
        }

        if ($this->isOptional() && is_null($value)) {
            parent::set(null);

            return;
        }

        throw new \InvalidArgumentException("Value must match one of {$this->class} values");
    }
}
