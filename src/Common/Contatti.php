<?php

namespace DevCode\FatturaElettronica\Common;

use DevCode\FatturaElettronica\ElementoFattura;

class Contatti extends ElementoFattura
{
    protected ?string $Telefono;

    protected ?string $Fax;

    protected ?string $Email;

    public static function build(
        ?string $Telefono = null,
        ?string $Fax = null,
        ?string $Email = null
    ) {
        $element = new static();

        $element->Telefono = $Telefono;
        $element->Fax = $Fax;
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

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(?string $Fax): ContattiTrasmittente
    {
        $this->Fax = $Fax;

        return $this;
    }
}
