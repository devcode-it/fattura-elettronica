<?php

namespace DevCode\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use DevCode\FatturaElettronica\Common\DatiAnagrafici;
use DevCode\FatturaElettronica\Common\Sede;
use DevCode\FatturaElettronica\ElementoFattura;

class CessionarioCommittente extends ElementoFattura
{
    public DatiAnagrafici $DatiAnagrafici;

    public Sede $Sede;

    public function __construct(
        ?DatiAnagrafici $DatiAnagrafici = null,
        ?Sede $Sede = null
    ) {
        $this->DatiAnagrafici = new DatiAnagrafici();
        $this->Sede = new Sede();
    }

    public static function build(
        ?DatiAnagrafici $DatiAnagrafici = null,
        ?Sede $Sede = null
    ) {
        $element = new static();
        $element->DatiAnagrafici = $DatiAnagrafici ?: new DatiAnagrafici();
        $element->Sede = $Sede ?: new Sede();

        return $element;
    }

    public function getDatiAnagrafici(): DatiAnagrafici
    {
        return $this->DatiAnagrafici;
    }

    public function setDatiAnagrafici(DatiAnagrafici $DatiAnagrafici): CessionarioCommittente
    {
        $this->DatiAnagrafici = $DatiAnagrafici;

        return $this;
    }

    public function getSede(): Sede
    {
        return $this->Sede;
    }

    public function setSede(Sede $Sede): CessionarioCommittente
    {
        $this->Sede = $Sede;

        return $this;
    }
}
