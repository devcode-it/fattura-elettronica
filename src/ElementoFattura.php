<?php

namespace Dasc3er\FatturaElettronica;

use Dasc3er\FatturaElettronica\Interfaces\FieldInterface;
use Dasc3er\FatturaElettronica\Interfaces\SerializableInterface;
use Dasc3er\FatturaElettronica\XML\SerializableTrait;

abstract class ElementoFattura implements SerializableInterface
{
    use SerializableTrait;

    public function __get($name)
    {
        if (method_exists($this, 'get'.$name)) {
            return $this->{'get'.$name}();
        } elseif ($this->{$name} instanceof FieldInterface) {
            return $this->{$name}->get();
        }

        return $this->{$name};
    }

    public function __set($name, $value)
    {
        if (method_exists($this, 'set'.$name)) {
            $this->{'set'.$name}($value);
        } elseif ($this->{$name} instanceof FieldInterface) {
            $this->{$name}->set($value);
        } else {
            $this->{$name} = $value;
        }

        return;
    }
}
