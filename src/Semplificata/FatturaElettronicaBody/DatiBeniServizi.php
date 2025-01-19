<?php

namespace DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody;

use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi\DatiIVA;
use DevCode\FatturaElettronica\Semplificata\FatturaElettronicaBody\DatiBeniServizi\Natura;
use DevCode\FatturaElettronica\Standard\Decimale;
use DevCode\FatturaElettronica\Standard\Elemento;
use DevCode\FatturaElettronica\Standard\Testo;
use DevCode\FatturaElettronica\Standard\TestoEnum;

/**
 * @riferimento 2.2
 *
 * @name DatiBeniServizi
 *
 * Blocco sempre obbligatorio. Contiene natura, qualità, quantità e gli elementi necessari a determinare il valore dei beni e/o dei servizi formanti oggetto dell'operazione
 *
 * Blocco relativo ai dati di Beni Servizi della Fattura	Elettronica
 */
class DatiBeniServizi extends Elemento
{
    protected Testo $Descrizione;
    protected Decimale $Importo;
    protected DatiIVA $DatiIVA;
    protected TestoEnum $Natura;
    protected Testo $RiferimentoNormativo;

    public function __construct()
    {
        parent::__construct(false);
        $this->Descrizione = new Testo(false, 1, 1000, 1);
        $this->Importo = new Decimale(false, 2, 2, 2);
        $this->DatiIVA = new DatiIVA();
        $this->Natura = new TestoEnum(true, Natura::class);
        $this->RiferimentoNormativo = new Testo(true, 1, 100, 1);
    }

    public function getDescrizione(): ?string
    {
        return $this->Descrizione->get();
    }

    public function setDescrizione(?string $value)
    {
        $this->Descrizione->set($value);

        return $this;
    }

    public function getImporto(): ?float
    {
        return $this->Importo->get();
    }

    public function setImporto(?float $value)
    {
        $this->Importo->set($value);

        return $this;
    }

    public function getDatiIVA(): DatiIVA
    {
        return $this->DatiIVA;
    }

    public function setDatiIVA(DatiIVA $DatiIVA)
    {
        $this->DatiIVA = $DatiIVA;

        return $this;
    }

    public function getNatura(): ?string
    {
        return $this->Natura->get();
    }

    public function setNatura(Natura|string|null $value)
    {
        $this->Natura->set($value);

        return $this;
    }

    public function getRiferimentoNormativo(): ?string
    {
        return $this->RiferimentoNormativo->get();
    }

    public function setRiferimentoNormativo(?string $value)
    {
        $this->RiferimentoNormativo->set($value);

        return $this;
    }
}
