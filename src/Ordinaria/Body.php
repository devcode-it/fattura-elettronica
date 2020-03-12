<?php

namespace Dasc3er\FatturaElettronica\Ordinaria;

use Dasc3er\FatturaElettronica\Common\Allegati;
use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Collection;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiGenerali;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiPagamento;
use Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiVeicoli;

class Body extends ElementoFattura
{
    /** @var DatiGenerali */
    protected DatiGenerali $DatiGenerali;

    /** @var DatiBeniServizi */
    protected DatiBeniServizi $DatiBeniServizi;

    /** @var DatiPagamento */
    protected DatiPagamento $DatiPagamento;

    /** @var Allegati[] */
    protected Collection $Allegati;

    /** @var DatiVeicoli */
    protected DatiVeicoli $DatiVeicoli;

    public function __construct(
        string $TipoDocumento,
        string $Data,
        string $Numero
    ) {
        $this->DatiGenerali = new DatiGenerali($TipoDocumento, $Data, $Numero);
        $this->DatiBeniServizi = new DatiBeniServizi();
        $this->DatiPagamento = new DatiPagamento();
        $this->DatiVeicoli = new DatiVeicoli();

        $this->Allegati = new Collection(Allegati::class);
    }

    public function getDatiGenerali(): DatiGenerali
    {
        return $this->DatiGenerali;
    }

    public function setDatiGenerali(DatiGenerali $DatiGenerali): Body
    {
        $this->DatiGenerali = $DatiGenerali;

        return $this;
    }

    public function getDatiBeniServizi(): DatiBeniServizi
    {
        return $this->DatiBeniServizi;
    }

    public function setDatiBeniServizi(DatiBeniServizi $DatiBeniServizi): Body
    {
        $this->DatiBeniServizi = $DatiBeniServizi;

        return $this;
    }

    public function getDatiPagamento(): DatiPagamento
    {
        return $this->DatiPagamento;
    }

    public function setDatiPagamento(DatiPagamento $DatiPagamento): Body
    {
        $this->DatiPagamento = $DatiPagamento;

        return $this;
    }

    public function getDatiVeicoli(): DatiVeicoli
    {
        return $this->DatiVeicoli;
    }

    public function setDatiVeicoli(DatiVeicoli $DatiVeicoli): Body
    {
        $this->DatiVeicoli = $DatiVeicoli;

        return $this;
    }

    /**
     * @return Allegati[]
     */
    public function getAllegati(): Collection
    {
        return $this->Allegati;
    }
}
