<?php

namespace DevCode\FatturaElettronica\Common;

use DevCode\FatturaElettronica\ElementoFattura;

class ContattiTrasmittente extends ElementoFattura
{
    protected ?string $Telefono;

    protected ?string $Email;

    public static function build(
        ?string $Telefono = null,
        ?string $Email = null
    ) {
        $element = new static();

        $element->Telefono = $Telefono;
        $element->Email = $Email;

        return $element;
    }

    public function getTelefono(): ?string
    {
        return $this->Telefono;
    }

    public function setTelefono(?string $Telefono): ContattiTrasmittente
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): ContattiTrasmittente
    {
        $this->Email = $Email;

        return $this;
    }
}
