<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaBody\DatiBeniServizi;

use Dasc3er\FatturaElettronica\Common\CodiceArticolo;
use Dasc3er\FatturaElettronica\ElementoFattura;
use Dasc3er\FatturaElettronica\Fields\Decimal;

class DettaglioLinee extends ElementoFattura
{
    protected static int $numero_linea = 1;

    protected int $NumeroLinea;

    protected ?string $TipoCessionePrestazione;

    /** @var CodiceArticolo[] */
    protected iterable $codiceArticolo;

    protected string $Descrizione;

    protected Decimal $Quantita;

    protected ?string $UnitaMisura;

    protected ?string $DataInizioPeriodo;

    protected ?string $DataFinePeriodo;

    protected Decimal $PrezzoUnitario;

    /** @var ScontoMaggiorazione[] */
    protected iterable $ScontoMaggiorazione;

    protected Decimal $PrezzoTotale;

    protected Decimal $AliquotaIVA;

    protected ?string $Ritenuta;

    protected ?string $Natura;

    protected ?string $RiferimentoAmministrazione;

    /** @var AltriDatiGestionali[] */
    protected iterable $AltriDatiGestionali;

    public function __construct(
        string $Descrizione,
        float $Quantita,
        ?string $UnitaMisura,
        float $PrezzoUnitario,
        ?float $AliquotaIVA,
        ?string $Ritenuta = null,
        ?string $Natura = null
    ) {
        // Impostazione numero automatico
        $this->NumeroLinea = self::$numero_linea;
        self::$numero_linea = self::$numero_linea + 1;

        $this->Descrizione = $Descrizione;
        $this->UnitaMisura = $UnitaMisura;
        $this->Ritenuta = $Ritenuta;
        $this->Natura = $Natura;

        $this->Quantita = new Decimal(2, $Quantita);
        $this->PrezzoUnitario = new Decimal(2, $PrezzoUnitario);
        $this->AliquotaIVA = new Decimal(2, $AliquotaIVA);

        $this->PrezzoTotale = new Decimal(2);
    }

    public function getNumeroLinea(): int
    {
        return $this->NumeroLinea;
    }

    public function setNumeroLinea(int $NumeroLinea): DettaglioLinee
    {
        $this->NumeroLinea = $NumeroLinea;

        return $this;
    }

    public function getTipoCessionePrestazione(): ?string
    {
        return $this->TipoCessionePrestazione;
    }

    public function setTipoCessionePrestazione(?string $TipoCessionePrestazione): DettaglioLinee
    {
        $this->TipoCessionePrestazione = $TipoCessionePrestazione;

        return $this;
    }

    /**
     * @return CodiceArticolo[]
     */
    public function getCodiceArticolo(): iterable
    {
        return $this->codiceArticolo;
    }

    public function getDescrizione(): string
    {
        return $this->Descrizione;
    }

    public function setDescrizione(string $Descrizione): DettaglioLinee
    {
        $this->Descrizione = $Descrizione;

        return $this;
    }

    /**
     * @return Decimal
     */
    public function getQuantita(): ?float
    {
        return $this->Quantita->get();
    }

    /**
     * @param Decimal $Quantita
     */
    public function setQuantita(?float $Quantita): DettaglioLinee
    {
        $this->Quantita->set($Quantita);

        return $this;
    }

    public function getUnitaMisura(): ?string
    {
        return $this->UnitaMisura;
    }

    public function setUnitaMisura(?string $UnitaMisura): DettaglioLinee
    {
        $this->UnitaMisura = $UnitaMisura;

        return $this;
    }

    public function getDataInizioPeriodo(): ?string
    {
        return $this->DataInizioPeriodo;
    }

    public function setDataInizioPeriodo(?string $DataInizioPeriodo): DettaglioLinee
    {
        $this->DataInizioPeriodo = $DataInizioPeriodo;

        return $this;
    }

    public function getDataFinePeriodo(): ?string
    {
        return $this->DataFinePeriodo;
    }

    public function setDataFinePeriodo(?string $DataFinePeriodo): DettaglioLinee
    {
        $this->DataFinePeriodo = $DataFinePeriodo;

        return $this;
    }

    /**
     * @return Decimal
     */
    public function getPrezzoUnitario(): ?float
    {
        return $this->PrezzoUnitario->get();
    }

    /**
     * @param Decimal $PrezzoUnitario
     */
    public function setPrezzoUnitario(?float $PrezzoUnitario): DettaglioLinee
    {
        $this->PrezzoUnitario->set($PrezzoUnitario);

        return $this;
    }

    /**
     * @return ScontoMaggiorazione[]
     */
    public function getScontoMaggiorazione(): iterable
    {
        return $this->ScontoMaggiorazione;
    }

    /**
     * @return Decimal
     */
    public function getPrezzoTotale(): ?float
    {
        return $this->PrezzoTotale->get();
    }

    /**
     * @param Decimal $PrezzoTotale
     */
    public function setPrezzoTotale(?float $PrezzoTotale): DettaglioLinee
    {
        $this->PrezzoTotale->set($PrezzoTotale);

        return $this;
    }

    /**
     * @return Decimal
     */
    public function getAliquotaIVA(): ?float
    {
        return $this->AliquotaIVA->get();
    }

    /**
     * @param Decimal $AliquotaIVA
     */
    public function setAliquotaIVA(?float $AliquotaIVA): DettaglioLinee
    {
        $this->AliquotaIVA->set($AliquotaIVA);

        return $this;
    }

    public function getRitenuta(): ?string
    {
        return $this->Ritenuta;
    }

    public function setRitenuta(?string $Ritenuta): DettaglioLinee
    {
        $this->Ritenuta = $Ritenuta;

        return $this;
    }

    public function getNatura(): ?string
    {
        return $this->Natura;
    }

    public function setNatura(?string $Natura): DettaglioLinee
    {
        $this->Natura = $Natura;

        return $this;
    }

    public function getRiferimentoAmministrazione(): ?string
    {
        return $this->RiferimentoAmministrazione;
    }

    public function setRiferimentoAmministrazione(?string $RiferimentoAmministrazione): DettaglioLinee
    {
        $this->RiferimentoAmministrazione = $RiferimentoAmministrazione;

        return $this;
    }

    /**
     * @return AltriDatiGestionali[]
     */
    public function getAltriDatiGestionali(): iterable
    {
        return $this->AltriDatiGestionali;
    }

    public function getXmlTags(): iterable
    {
        if ($this->PrezzoTotale->isEmpty()) {
            $prezzo_unitario = $this->PrezzoUnitario->get();
            $quantita = $this->Quantita->get() ?: 1;

            $this->PrezzoTotale->set($prezzo_unitario * $quantita);
        }

        return parent::getXmlTags();
    }
}
