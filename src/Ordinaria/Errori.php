<?php

namespace DevCode\FatturaElettronica\Ordinaria;

use DevCode\FatturaElettronica\Tabelle\Tabella;

class Errori extends Tabella
{
    public static function getCodifiche(): iterable
    {
        return [
            '00001' => 'Nome file non valido',
            '00002' => 'Nome file duplicato',
            '00003' => 'Le dimensioni del file superano quelle ammesse',
            '00102' => 'File non integro (firma non valida)',
            '00100' => 'Certificato di firma scaduto',
            '00101' => 'Certificato di firma revocato',
            '00104' => 'CA (Certification Authority) non affidabile',
            '00107' => 'Certificato non valido',
            '00103' => 'La firma digitale apposta manca del riferimento temporale',
            '00105' => 'Il riferimento temporale della firma digitale apposta non è coerente',
            '00106' => 'File/archivio vuoto o corrotto',
            '00200' => 'File non conforme al formato (nella descrizione del messaggio è riportata l\'indicazione puntuale della non conformità)',
            '00201' => 'Riscontrati più di 50 errori di formato',
            '00400' => '2.2.1.14 <Natura> non presente a fronte di 2.2.1.12 <AliquotaIVA> pari a zero',
            '00401' => '2.2.1.14 <Natura> presente a fronte di 2.2.1.12 <AliquotaIVA> diversa da zero',
            '00403' => '2.1.1.3 <Data> successiva alla data di ricezione',
            '00411' => '2.1.1.5 <DatiRitenuta> non presente a fronte di almeno un blocco 2.2.1 <DettaglioLinee> con 2.2.1.13 <Ritenuta> uguale a SI',
            '00413' => '2.1.1.7.7 <Natura> non presente a fronte di 2.1.1.7.5 <AliquotaIVA> pari a zero',
            '00414' => '2.1.1.7.7 <Natura> presente a fronte di 2.1.1.7.5 <Aliquota IVA> diversa da zero',
            '00415' => '2.1.1.5 <DatiRitenuta> non presente a fronte di 2.1.1.7.6 <Ritenuta> uguale a SI',
            '00417' => '1.4.1.1 <IdFiscaleIVA> e 1.4.1.2 <CodiceFiscale> non valorizzati (almeno uno dei due deve essere valorizzato)',
            '00418' => '2.1.1.3 <Data> antecedente a 2.1.6.3 <Data>',
            '00419' => '2.2.2 <DatiRiepilogo> non presente in corrispondenza di almeno un valore di 2.1.1.7.5 <AliquotaIVA> o 2.2.1.12 <AliquotaIVA>',
            '00420' => '2.2.2.2 <Natura> con valore N6 (inversione contabile) a fronte di 2.2.2.7 <EsigibilitaIVA> uguale a S (scissione pagamenti)',
            '00421' => '2.2.2.6 <Imposta> non calcolato secondo le regole definite nelle specifiche tecniche',
            '00422' => '2.2.2.5 <ImponibileImporto> non calcolato secondo le regole definite nelle specifiche tecniche',
            '00423' => '2.2.1.11 <PrezzoTotale> non calcolato secondo le regole definite nelle specifiche tecniche',
            '00424' => '2.2.1.12 <AliquotaIVA> o 2.2.2.1< AliquotaIVA> o 2.1.1.7.5 <AliquotaIVA> non indicata in termini percentuali',
            '00425' => '2.1.1.4 <Numero> non contenente caratteri numerici',
            '00426' => '1.1.6 <PECDestinatario> non valorizzato a fronte di 1.1.4 <CodiceDestinatario> con valore 0000000, o 1.1.6 <PECDestinatario> valorizzato a fronte di 1.1.4 <Destinatario> con valore diverso da 0000000',
            '00427' => '1.1.4 <CodiceDestinatario> di 7 caratteri a fronte di 1.1.3 <FormatoTrasmissione> con valore FPA12 o 1.1.4 <CodiceDestinatario> di 6 caratteri a fronte di 1.1.3 <FormatoTrasmissione> con valore FP R12',
            '00428' => '1.1.3 <FormatoTrasmissione> non coerente con il valore dell\'attributo VERSION',
            '00429' => '2.2.2.2 <Natura> non presente a fronte di 2.2.2.1 <AliquotaIVA> pari a zero',
            '00430' => '2.2.2.2 <Natura> presente a fronte di 2.2.2.1 <Aliquota IVA> diversa da zero',
            '00437' => '2.1.1.8.2 <Percentuale> e 2.1.1.8.3 <Importo> non presenti a fronte di 2.1.1.8.1 <Tipo> valorizzato',
            '00438' => '2.2.1.10.2 <Percentuale> e 2.2.1.10.3 <Importo> non presenti a fronte di 2.2.1.10.1 <Tipo> valorizzato',
            '00459' => 'Valore RF03 non ammesso per il campo 1.2.1.8 <RegimeFiscale>',
            '00300' => '1.1.1.2 <IdCodice> non valido',
            '00301' => '1.2.1.1.2 <IdCodice> non valido',
            '00302' => '1.2.1.2 <CodiceFiscale> non valido',
            '00303' => '1.3.1.1.2 <IdCodice> o 1.4.4.1.2 <IdCodice> non valido',
            '00304' => '1.3.1.2 <CodiceFiscale> non valido',
            '00305' => '1.4.1.1.2 <IdCodice> non valido',
            '00306' => '1.4.1.2 <CodiceFiscale> non valido',
            '00311' => '1.1.4 <CodiceDestinatario> non valido',
            '00312' => '1.1.4 <CodiceDestinatario> non attivo',
            '00398' => 'Ufficio presente ed univocamente identificabile nell\'anagrafica IPA di riferimento, in presenza di 1.1.4 <CodiceDestinatario> valorizzato con codice ufficio "Centrale"',
            '00399' => 'CodiceFiscale del CessionarioCommittente presente nell\'anagrafica IPA di riferimento in presenza di 1.1.4 <CodiceDestinatario> valorizzato a "999999" oppure di 1.1.3 <FormatoTrasmissione> valorizzato a "FPR12"',
            '00404' => 'Fattura duplicata',
            '00409' => 'Fattura duplicata nel lotto',
        ];
    }
}
