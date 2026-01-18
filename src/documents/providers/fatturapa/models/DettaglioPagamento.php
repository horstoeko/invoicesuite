<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\ModalitaPagamento;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DettaglioPagamento
{
    use HandlesObjectFlags;

    /**
     * @translation-german Begünstigter
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getBeneficiario", setter="setBeneficiario")
     * @JMS\SerializedName("Beneficiario")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $beneficiario = null;

    /**
     * @translation-german Art/Modus Zahlung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\ModalitaPagamento','value'>")
     * @JMS\Accessor(getter="getModalitaPagamento", setter="setModalitaPagamento")
     * @JMS\SerializedName("ModalitaPagamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?ModalitaPagamento $modalitaPagamento = null;

    /**
     * @translation-german Datum Referenz Termini Zahlung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getDataRiferimentoTerminiPagamento", setter="setDataRiferimentoTerminiPagamento")
     * @JMS\SerializedName("DataRiferimentoTerminiPagamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataRiferimentoTerminiPagamento = null;

    /**
     * @translation-german Giorni Termini Zahlung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("int")
     * @JMS\Accessor(getter="getGiorniTerminiPagamento", setter="setGiorniTerminiPagamento")
     * @JMS\SerializedName("GiorniTerminiPagamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?int $giorniTerminiPagamento = null;

    /**
     * @translation-german Datum Fälligkeit Zahlung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getDataScadenzaPagamento", setter="setDataScadenzaPagamento")
     * @JMS\SerializedName("DataScadenzaPagamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataScadenzaPagamento = null;

    /**
     * @translation-german Betrag Zahlung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getImportoPagamento", setter="setImportoPagamento")
     * @JMS\SerializedName("ImportoPagamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $importoPagamento = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getCodUfficioPostale", setter="setCodUfficioPostale")
     * @JMS\SerializedName("CodUfficioPostale")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $codUfficioPostale = null;

    /**
     * @translation-german Nachname Quietanzante
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getCognomeQuietanzante", setter="setCognomeQuietanzante")
     * @JMS\SerializedName("CognomeQuietanzante")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $cognomeQuietanzante = null;

    /**
     * @translation-german Name Quietanzante
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getNomeQuietanzante", setter="setNomeQuietanzante")
     * @JMS\SerializedName("NomeQuietanzante")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $nomeQuietanzante = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getCFQuietanzante", setter="setCFQuietanzante")
     * @JMS\SerializedName("CFQuietanzante")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $cFQuietanzante = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getTitoloQuietanzante", setter="setTitoloQuietanzante")
     * @JMS\SerializedName("TitoloQuietanzante")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $titoloQuietanzante = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getIstitutoFinanziario", setter="setIstitutoFinanziario")
     * @JMS\SerializedName("IstitutoFinanziario")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $istitutoFinanziario = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getIBAN", setter="setIBAN")
     * @JMS\SerializedName("IBAN")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $iBAN = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getABI", setter="setABI")
     * @JMS\SerializedName("ABI")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $aBI = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getCAB", setter="setCAB")
     * @JMS\SerializedName("CAB")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $cAB = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getBIC", setter="setBIC")
     * @JMS\SerializedName("BIC")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $bIC = null;

    /**
     * @translation-german Sconto Zahlung Anticipato
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getScontoPagamentoAnticipato", setter="setScontoPagamentoAnticipato")
     * @JMS\SerializedName("ScontoPagamentoAnticipato")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $scontoPagamentoAnticipato = null;

    /**
     * @translation-german Datum Limite Zahlung Anticipato
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getDataLimitePagamentoAnticipato", setter="setDataLimitePagamentoAnticipato")
     * @JMS\SerializedName("DataLimitePagamentoAnticipato")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataLimitePagamentoAnticipato = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getPenalitaPagamentiRitardati", setter="setPenalitaPagamentiRitardati")
     * @JMS\SerializedName("PenalitaPagamentiRitardati")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $penalitaPagamentiRitardati = null;

    /**
     * @translation-german Datum Decorrenza Penale
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getDataDecorrenzaPenale", setter="setDataDecorrenzaPenale")
     * @JMS\SerializedName("DataDecorrenzaPenale")
     * @JMS\XmlElement(cdata=false)
     */
    private ?DateTimeInterface $dataDecorrenzaPenale = null;

    /**
     * @translation-german Code Zahlung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getCodicePagamento", setter="setCodicePagamento")
     * @JMS\SerializedName("CodicePagamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $codicePagamento = null;

    /**
     * @translation-german Begünstigter
     *
     * @return null|string
     */
    public function getBeneficiario(): ?string
    {
        return $this->beneficiario;
    }

    /**
     * @translation-german Begünstigter
     *
     * @param  null|string $beneficiario
     * @return static
     */
    public function setBeneficiario(?string $beneficiario = null): static
    {
        $this->beneficiario = InvoiceSuiteStringUtils::asNullWhenEmpty($beneficiario);

        return $this;
    }

    /**
     * @translation-german Begünstigter
     *
     * @return static
     */
    public function unsetBeneficiario(): static
    {
        $this->beneficiario = null;

        return $this;
    }

    /**
     * @translation-german Art/Modus Zahlung
     *
     * @return null|ModalitaPagamento
     */
    public function getModalitaPagamento(): ?ModalitaPagamento
    {
        return $this->modalitaPagamento;
    }

    /**
     * @translation-german Art/Modus Zahlung
     *
     * @param  null|ModalitaPagamento $modalitaPagamento
     * @return static
     */
    public function setModalitaPagamento(?ModalitaPagamento $modalitaPagamento = null): static
    {
        $this->modalitaPagamento = $modalitaPagamento;

        return $this;
    }

    /**
     * @translation-german Art/Modus Zahlung
     *
     * @return static
     */
    public function unsetModalitaPagamento(): static
    {
        $this->modalitaPagamento = null;

        return $this;
    }

    /**
     * @translation-german Datum Referenz Termini Zahlung
     *
     * @return null|DateTimeInterface
     */
    public function getDataRiferimentoTerminiPagamento(): ?DateTimeInterface
    {
        return $this->dataRiferimentoTerminiPagamento;
    }

    /**
     * @translation-german Datum Referenz Termini Zahlung
     *
     * @param  null|DateTimeInterface $dataRiferimentoTerminiPagamento
     * @return static
     */
    public function setDataRiferimentoTerminiPagamento(?DateTimeInterface $dataRiferimentoTerminiPagamento = null): static
    {
        $this->dataRiferimentoTerminiPagamento = $dataRiferimentoTerminiPagamento;

        return $this;
    }

    /**
     * @translation-german Datum Referenz Termini Zahlung
     *
     * @return static
     */
    public function unsetDataRiferimentoTerminiPagamento(): static
    {
        $this->dataRiferimentoTerminiPagamento = null;

        return $this;
    }

    /**
     * @translation-german Giorni Termini Zahlung
     *
     * @return null|int
     */
    public function getGiorniTerminiPagamento(): ?int
    {
        return $this->giorniTerminiPagamento;
    }

    /**
     * @translation-german Giorni Termini Zahlung
     *
     * @param  null|int $giorniTerminiPagamento
     * @return static
     */
    public function setGiorniTerminiPagamento(?int $giorniTerminiPagamento = null): static
    {
        $this->giorniTerminiPagamento = $giorniTerminiPagamento;

        return $this;
    }

    /**
     * @translation-german Giorni Termini Zahlung
     *
     * @return static
     */
    public function unsetGiorniTerminiPagamento(): static
    {
        $this->giorniTerminiPagamento = null;

        return $this;
    }

    /**
     * @translation-german Datum Fälligkeit Zahlung
     *
     * @return null|DateTimeInterface
     */
    public function getDataScadenzaPagamento(): ?DateTimeInterface
    {
        return $this->dataScadenzaPagamento;
    }

    /**
     * @translation-german Datum Fälligkeit Zahlung
     *
     * @param  null|DateTimeInterface $dataScadenzaPagamento
     * @return static
     */
    public function setDataScadenzaPagamento(?DateTimeInterface $dataScadenzaPagamento = null): static
    {
        $this->dataScadenzaPagamento = $dataScadenzaPagamento;

        return $this;
    }

    /**
     * @translation-german Datum Fälligkeit Zahlung
     *
     * @return static
     */
    public function unsetDataScadenzaPagamento(): static
    {
        $this->dataScadenzaPagamento = null;

        return $this;
    }

    /**
     * @translation-german Betrag Zahlung
     *
     * @return null|string
     */
    public function getImportoPagamento(): ?string
    {
        return $this->importoPagamento;
    }

    /**
     * @translation-german Betrag Zahlung
     *
     * @param  null|string $importoPagamento
     * @return static
     */
    public function setImportoPagamento(?string $importoPagamento = null): static
    {
        $this->importoPagamento = InvoiceSuiteStringUtils::asNullWhenEmpty($importoPagamento);

        return $this;
    }

    /**
     * @translation-german Betrag Zahlung
     *
     * @return static
     */
    public function unsetImportoPagamento(): static
    {
        $this->importoPagamento = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getCodUfficioPostale(): ?string
    {
        return $this->codUfficioPostale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $codUfficioPostale
     * @return static
     */
    public function setCodUfficioPostale(?string $codUfficioPostale = null): static
    {
        $this->codUfficioPostale = InvoiceSuiteStringUtils::asNullWhenEmpty($codUfficioPostale);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetCodUfficioPostale(): static
    {
        $this->codUfficioPostale = null;

        return $this;
    }

    /**
     * @translation-german Nachname Quietanzante
     *
     * @return null|string
     */
    public function getCognomeQuietanzante(): ?string
    {
        return $this->cognomeQuietanzante;
    }

    /**
     * @translation-german Nachname Quietanzante
     *
     * @param  null|string $cognomeQuietanzante
     * @return static
     */
    public function setCognomeQuietanzante(?string $cognomeQuietanzante = null): static
    {
        $this->cognomeQuietanzante = InvoiceSuiteStringUtils::asNullWhenEmpty($cognomeQuietanzante);

        return $this;
    }

    /**
     * @translation-german Nachname Quietanzante
     *
     * @return static
     */
    public function unsetCognomeQuietanzante(): static
    {
        $this->cognomeQuietanzante = null;

        return $this;
    }

    /**
     * @translation-german Name Quietanzante
     *
     * @return null|string
     */
    public function getNomeQuietanzante(): ?string
    {
        return $this->nomeQuietanzante;
    }

    /**
     * @translation-german Name Quietanzante
     *
     * @param  null|string $nomeQuietanzante
     * @return static
     */
    public function setNomeQuietanzante(?string $nomeQuietanzante = null): static
    {
        $this->nomeQuietanzante = InvoiceSuiteStringUtils::asNullWhenEmpty($nomeQuietanzante);

        return $this;
    }

    /**
     * @translation-german Name Quietanzante
     *
     * @return static
     */
    public function unsetNomeQuietanzante(): static
    {
        $this->nomeQuietanzante = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getCFQuietanzante(): ?string
    {
        return $this->cFQuietanzante;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $cFQuietanzante
     * @return static
     */
    public function setCFQuietanzante(?string $cFQuietanzante = null): static
    {
        $this->cFQuietanzante = InvoiceSuiteStringUtils::asNullWhenEmpty($cFQuietanzante);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetCFQuietanzante(): static
    {
        $this->cFQuietanzante = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getTitoloQuietanzante(): ?string
    {
        return $this->titoloQuietanzante;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $titoloQuietanzante
     * @return static
     */
    public function setTitoloQuietanzante(?string $titoloQuietanzante = null): static
    {
        $this->titoloQuietanzante = InvoiceSuiteStringUtils::asNullWhenEmpty($titoloQuietanzante);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTitoloQuietanzante(): static
    {
        $this->titoloQuietanzante = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getIstitutoFinanziario(): ?string
    {
        return $this->istitutoFinanziario;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $istitutoFinanziario
     * @return static
     */
    public function setIstitutoFinanziario(?string $istitutoFinanziario = null): static
    {
        $this->istitutoFinanziario = InvoiceSuiteStringUtils::asNullWhenEmpty($istitutoFinanziario);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetIstitutoFinanziario(): static
    {
        $this->istitutoFinanziario = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getIBAN(): ?string
    {
        return $this->iBAN;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $iBAN
     * @return static
     */
    public function setIBAN(?string $iBAN = null): static
    {
        $this->iBAN = InvoiceSuiteStringUtils::asNullWhenEmpty($iBAN);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetIBAN(): static
    {
        $this->iBAN = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getABI(): ?string
    {
        return $this->aBI;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $aBI
     * @return static
     */
    public function setABI(?string $aBI = null): static
    {
        $this->aBI = InvoiceSuiteStringUtils::asNullWhenEmpty($aBI);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetABI(): static
    {
        $this->aBI = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getCAB(): ?string
    {
        return $this->cAB;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $cAB
     * @return static
     */
    public function setCAB(?string $cAB = null): static
    {
        $this->cAB = InvoiceSuiteStringUtils::asNullWhenEmpty($cAB);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetCAB(): static
    {
        $this->cAB = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getBIC(): ?string
    {
        return $this->bIC;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $bIC
     * @return static
     */
    public function setBIC(?string $bIC = null): static
    {
        $this->bIC = InvoiceSuiteStringUtils::asNullWhenEmpty($bIC);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetBIC(): static
    {
        $this->bIC = null;

        return $this;
    }

    /**
     * @translation-german Sconto Zahlung Anticipato
     *
     * @return null|string
     */
    public function getScontoPagamentoAnticipato(): ?string
    {
        return $this->scontoPagamentoAnticipato;
    }

    /**
     * @translation-german Sconto Zahlung Anticipato
     *
     * @param  null|string $scontoPagamentoAnticipato
     * @return static
     */
    public function setScontoPagamentoAnticipato(?string $scontoPagamentoAnticipato = null): static
    {
        $this->scontoPagamentoAnticipato = InvoiceSuiteStringUtils::asNullWhenEmpty($scontoPagamentoAnticipato);

        return $this;
    }

    /**
     * @translation-german Sconto Zahlung Anticipato
     *
     * @return static
     */
    public function unsetScontoPagamentoAnticipato(): static
    {
        $this->scontoPagamentoAnticipato = null;

        return $this;
    }

    /**
     * @translation-german Datum Limite Zahlung Anticipato
     *
     * @return null|DateTimeInterface
     */
    public function getDataLimitePagamentoAnticipato(): ?DateTimeInterface
    {
        return $this->dataLimitePagamentoAnticipato;
    }

    /**
     * @translation-german Datum Limite Zahlung Anticipato
     *
     * @param  null|DateTimeInterface $dataLimitePagamentoAnticipato
     * @return static
     */
    public function setDataLimitePagamentoAnticipato(?DateTimeInterface $dataLimitePagamentoAnticipato = null): static
    {
        $this->dataLimitePagamentoAnticipato = $dataLimitePagamentoAnticipato;

        return $this;
    }

    /**
     * @translation-german Datum Limite Zahlung Anticipato
     *
     * @return static
     */
    public function unsetDataLimitePagamentoAnticipato(): static
    {
        $this->dataLimitePagamentoAnticipato = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getPenalitaPagamentiRitardati(): ?string
    {
        return $this->penalitaPagamentiRitardati;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $penalitaPagamentiRitardati
     * @return static
     */
    public function setPenalitaPagamentiRitardati(?string $penalitaPagamentiRitardati = null): static
    {
        $this->penalitaPagamentiRitardati = InvoiceSuiteStringUtils::asNullWhenEmpty($penalitaPagamentiRitardati);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPenalitaPagamentiRitardati(): static
    {
        $this->penalitaPagamentiRitardati = null;

        return $this;
    }

    /**
     * @translation-german Datum Decorrenza Penale
     *
     * @return null|DateTimeInterface
     */
    public function getDataDecorrenzaPenale(): ?DateTimeInterface
    {
        return $this->dataDecorrenzaPenale;
    }

    /**
     * @translation-german Datum Decorrenza Penale
     *
     * @param  null|DateTimeInterface $dataDecorrenzaPenale
     * @return static
     */
    public function setDataDecorrenzaPenale(?DateTimeInterface $dataDecorrenzaPenale = null): static
    {
        $this->dataDecorrenzaPenale = $dataDecorrenzaPenale;

        return $this;
    }

    /**
     * @translation-german Datum Decorrenza Penale
     *
     * @return static
     */
    public function unsetDataDecorrenzaPenale(): static
    {
        $this->dataDecorrenzaPenale = null;

        return $this;
    }

    /**
     * @translation-german Code Zahlung
     *
     * @return null|string
     */
    public function getCodicePagamento(): ?string
    {
        return $this->codicePagamento;
    }

    /**
     * @translation-german Code Zahlung
     *
     * @param  null|string $codicePagamento
     * @return static
     */
    public function setCodicePagamento(?string $codicePagamento = null): static
    {
        $this->codicePagamento = InvoiceSuiteStringUtils::asNullWhenEmpty($codicePagamento);

        return $this;
    }

    /**
     * @translation-german Code Zahlung
     *
     * @return static
     */
    public function unsetCodicePagamento(): static
    {
        $this->codicePagamento = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getImportoPagamentoAsFloat(): ?float
    {
        return is_null($this->importoPagamento) ? null : (float) $this->importoPagamento;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert aus Float setzen.
     * Wenn $scale nicht gesetzt ist, wird ein sinnvoller Default verwendet.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @param  null|float $value
     * @param  null|int   $scale anzahl Nachkommastellen (wird auf den erlaubten Bereich begrenzt)
     * @return static
     */
    public function setImportoPagamentoFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setImportoPagamento(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setImportoPagamento($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getScontoPagamentoAnticipatoAsFloat(): ?float
    {
        return is_null($this->scontoPagamentoAnticipato) ? null : (float) $this->scontoPagamentoAnticipato;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert aus Float setzen.
     * Wenn $scale nicht gesetzt ist, wird ein sinnvoller Default verwendet.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @param  null|float $value
     * @param  null|int   $scale anzahl Nachkommastellen (wird auf den erlaubten Bereich begrenzt)
     * @return static
     */
    public function setScontoPagamentoAnticipatoFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setScontoPagamentoAnticipato(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setScontoPagamentoAnticipato($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getPenalitaPagamentiRitardatiAsFloat(): ?float
    {
        return is_null($this->penalitaPagamentiRitardati) ? null : (float) $this->penalitaPagamentiRitardati;
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert aus Float setzen.
     * Wenn $scale nicht gesetzt ist, wird ein sinnvoller Default verwendet.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @param  null|float $value
     * @param  null|int   $scale anzahl Nachkommastellen (wird auf den erlaubten Bereich begrenzt)
     * @return static
     */
    public function setPenalitaPagamentiRitardatiFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setPenalitaPagamentiRitardati(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setPenalitaPagamentiRitardati($formatted);
    }
}
