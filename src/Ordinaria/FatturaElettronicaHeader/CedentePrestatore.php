<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader;

use Dasc3er\FatturaElettronica\Common\DatiAnagrafici;
use Dasc3er\FatturaElettronica\Common\Sede;
use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore\IscrizioneREA;

class CedentePrestatore extends ElementoFattura
{
    /** @var DatiAnagrafici */
    protected DatiAnagrafici $DatiAnagrafici;

    /** @var Sede */
    protected Sede $Sede;

    /** @var IscrizioneREA */
    protected ?IscrizioneREA $IscrizioneREA;

    public function __construct(
        ?DatiAnagrafici $DatiAnagrafici = null,
        ?Sede $Sede = null,
        ?IscrizioneREA $IscrizioneREA = null
    ) {
        $this->DatiAnagrafici = $DatiAnagrafici ?: new DatiAnagrafici();
        $this->Sede = $Sede ?: new Sede();
        $this->IscrizioneREA = $IscrizioneREA ?: new IscrizioneRea();
    }

    public function getDatiAnagrafici(): DatiAnagrafici
    {
        return $this->DatiAnagrafici;
    }

    public function setDatiAnagrafici(DatiAnagrafici $DatiAnagrafici): CedentePrestatore
    {
        $this->DatiAnagrafici = $DatiAnagrafici;

        return $this;
    }

    public function getSede(): Sede
    {
        return $this->Sede;
    }

    public function setSede(Sede $Sede): CedentePrestatore
    {
        $this->Sede = $Sede;

        return $this;
    }

    public function getIscrizioneREA(): IscrizioneREA
    {
        return $this->IscrizioneREA;
    }

    public function setIscrizioneREA(IscrizioneREA $IscrizioneREA): CedentePrestatore
    {
        $this->IscrizioneREA = $IscrizioneREA;

        return $this;
    }
}
