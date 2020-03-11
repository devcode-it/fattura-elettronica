<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use Dasc3er\FatturaElettronica\Common\DatiAnagrafici;
use Dasc3er\FatturaElettronica\Common\Sede;
use Dasc3er\FatturaElettronica\ElementoFattura;

class CessionarioCommittente extends ElementoFattura
{
    /** @var DatiAnagrafici */
    public DatiAnagrafici $DatiAnagrafici;

    /** @var Sede */
    public Sede $Sede;

    /**
     * CessionarioCommittente constructor.
     */
    public function __construct(
        ?DatiAnagrafici $DatiAnagrafici = null,
        ?Sede $Sede = null
    ) {
        $this->DatiAnagrafici = $DatiAnagrafici ?: new DatiAnagrafici();
        $this->Sede = $Sede ?: new Sede();
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
