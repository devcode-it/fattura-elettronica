<?php

namespace Dasc3er\FatturaElettronica;

use Dasc3er\FatturaElettronica\XML\SerializableInterface;
use Dasc3er\FatturaElettronica\XML\SerializableTrait;

abstract class ElementoFattura implements SerializableInterface
{
    use SerializableTrait;

    public function __get($name)
    {
        if (method_exists($this, 'get'.$name)) {
            return $this->{'get'.$name}();
        }

        return $this->{$name};
    }

    public function __set($name, $value)
    {
        if (method_exists($this, 'set'.$name)) {
            $this->{'set'.$name}($value);

            return;
        }

        $this->{$name} = $value;

        return;
    }
}
