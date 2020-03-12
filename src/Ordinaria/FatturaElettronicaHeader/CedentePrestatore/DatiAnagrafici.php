<?php

namespace Dasc3er\FatturaElettronica\Ordinaria\FatturaElettronicaHeader\CedentePrestatore;

use Dasc3er\FatturaElettronica\Common\DatiAnagrafici as Original;
use Dasc3er\FatturaElettronica\Tabelle\RegimeFiscale;

class DatiAnagrafici extends Original
{
    protected ?string $RegimeFiscale;

    public function __construct(
        ?string $CodiceFiscale = null,
        ?string $IdPaese = null,
        ?string $IdCodice = null,
        ?string $Denominazione = null,
        ?string $Nome = null,
        ?string $Cognome = null,
        ?string $RegimeFiscale = null
    ) {
        parent::__construct($CodiceFiscale, $IdPaese, $IdCodice, $Denominazione, $Nome, $Cognome);

        $this->RegimeFiscale = $RegimeFiscale ?: RegimeFiscale::Ordinario;
    }

    public function isEmpty(): bool
    {
        return parent::isEmpty();
    }

    protected function getXmlTags(): iterable
    {
        $vars = parent::getXmlTags();

        // Fix ordine tag
        unset($vars['RegimeFiscale']);
        $vars['RegimeFiscale'] = $this->RegimeFiscale;

        return $vars;
    }
}
