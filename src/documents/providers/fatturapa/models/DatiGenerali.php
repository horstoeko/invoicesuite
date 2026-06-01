<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiGenerali
{
    use HandlesObjectFlags;

    /**
     * @translation-german Allgemeine Angaben Documento
     */
    #[JMS\Accessor(getter: 'getDatiGeneraliDocumento', setter: 'setDatiGeneraliDocumento')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiGeneraliDocumento')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiGeneraliDocumento')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiGeneraliDocumento $datiGeneraliDocumento = null;

    /**
     * @translation-german Bestelldaten
     *
     * @var null|array<DatiDocumentiCorrelati>
     */
    #[JMS\Accessor(getter: 'getDatiOrdineAcquisto', setter: 'setDatiOrdineAcquisto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiOrdineAcquisto')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiOrdineAcquisto')]
    private ?array $datiOrdineAcquisto = null;

    /**
     * @translation-german Vertragsdaten
     *
     * @var null|array<DatiDocumentiCorrelati>
     */
    #[JMS\Accessor(getter: 'getDatiContratto', setter: 'setDatiContratto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiContratto')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiContratto')]
    private ?array $datiContratto = null;

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @var null|array<DatiDocumentiCorrelati>
     */
    #[JMS\Accessor(getter: 'getDatiConvenzione', setter: 'setDatiConvenzione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiConvenzione')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiConvenzione')]
    private ?array $datiConvenzione = null;

    /**
     * @translation-german Empfangsdaten
     *
     * @var null|array<DatiDocumentiCorrelati>
     */
    #[JMS\Accessor(getter: 'getDatiRicezione', setter: 'setDatiRicezione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiRicezione')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiRicezione')]
    private ?array $datiRicezione = null;

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @var null|array<DatiDocumentiCorrelati>
     */
    #[JMS\Accessor(getter: 'getDatiFattureCollegate', setter: 'setDatiFattureCollegate')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiFattureCollegate')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDocumentiCorrelati>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiFattureCollegate')]
    private ?array $datiFattureCollegate = null;

    /**
     * @translation-german Angaben SAL
     *
     * @var null|array<DatiSAL>
     */
    #[JMS\Accessor(getter: 'getDatiSAL', setter: 'setDatiSAL')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiSAL')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiSAL>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiSAL')]
    private ?array $datiSAL = null;

    /**
     * @translation-german Angaben DDT
     *
     * @var null|array<DatiDDT>
     */
    #[JMS\Accessor(getter: 'getDatiDDT', setter: 'setDatiDDT')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiDDT')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiDDT>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiDDT')]
    private ?array $datiDDT = null;

    /**
     * @translation-german Transportdaten
     */
    #[JMS\Accessor(getter: 'getDatiTrasporto', setter: 'setDatiTrasporto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiTrasporto')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiTrasporto')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiTrasporto $datiTrasporto = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getFatturaPrincipale', setter: 'setFatturaPrincipale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('FatturaPrincipale')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaPrincipale')]
    #[JMS\XmlElement(cdata: false)]
    private ?FatturaPrincipale $fatturaPrincipale = null;

    /**
     * @translation-german Allgemeine Angaben Documento
     *
     * @return null|DatiGeneraliDocumento
     */
    public function getDatiGeneraliDocumento(): ?DatiGeneraliDocumento
    {
        return $this->datiGeneraliDocumento;
    }

    /**
     * @translation-german Allgemeine Angaben Documento
     *
     * @return DatiGeneraliDocumento
     */
    public function getDatiGeneraliDocumentoWithCreate(): DatiGeneraliDocumento
    {
        $this->datiGeneraliDocumento ??= new DatiGeneraliDocumento();

        return $this->datiGeneraliDocumento;
    }

    /**
     * @translation-german Allgemeine Angaben Documento
     *
     * @param  null|DatiGeneraliDocumento $datiGeneraliDocumento
     * @return static
     */
    public function setDatiGeneraliDocumento(
        ?DatiGeneraliDocumento $datiGeneraliDocumento = null
    ): static {
        $this->datiGeneraliDocumento = $datiGeneraliDocumento;

        return $this;
    }

    /**
     * @translation-german Allgemeine Angaben Documento
     *
     * @return static
     */
    public function unsetDatiGeneraliDocumento(): static
    {
        $this->datiGeneraliDocumento = null;

        return $this;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @return null|array<DatiDocumentiCorrelati>
     */
    public function getDatiOrdineAcquisto(): ?array
    {
        return $this->datiOrdineAcquisto;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @param  null|array<DatiDocumentiCorrelati> $datiOrdineAcquisto
     * @return static
     */
    public function setDatiOrdineAcquisto(
        ?array $datiOrdineAcquisto = null
    ): static {
        $this->datiOrdineAcquisto = $datiOrdineAcquisto;

        return $this;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @return static
     */
    public function unsetDatiOrdineAcquisto(): static
    {
        $this->datiOrdineAcquisto = null;

        return $this;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @return static
     */
    public function clearDatiOrdineAcquisto(): static
    {
        $this->datiOrdineAcquisto = [];

        return $this;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @param  DatiDocumentiCorrelati $datiOrdineAcquisto
     * @return static
     */
    public function addToDatiOrdineAcquisto(
        DatiDocumentiCorrelati $datiOrdineAcquisto
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiOrdineAcquisto)) {
            $this->datiOrdineAcquisto = [];
        }

        $this->datiOrdineAcquisto[] = $datiOrdineAcquisto;

        return $this;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addToDatiOrdineAcquistoWithCreate(): DatiDocumentiCorrelati
    {
        $this->addToDatiOrdineAcquisto($datiOrdineAcquisto = new DatiDocumentiCorrelati());

        return $datiOrdineAcquisto;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @param  DatiDocumentiCorrelati $datiOrdineAcquisto
     * @return static
     */
    public function addOnceToDatiOrdineAcquisto(
        DatiDocumentiCorrelati $datiOrdineAcquisto
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiOrdineAcquisto)) {
            $this->datiOrdineAcquisto = [];
        }

        $this->datiOrdineAcquisto[0] = $datiOrdineAcquisto;

        return $this;
    }

    /**
     * @translation-german Bestelldaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addOnceToDatiOrdineAcquistoWithCreate(): DatiDocumentiCorrelati
    {
        if (!InvoiceSuiteArrayUtils::is($this->datiOrdineAcquisto)) {
            $this->datiOrdineAcquisto = [];
        }

        if ([] === $this->datiOrdineAcquisto) {
            $this->addOnceToDatiOrdineAcquisto(new DatiDocumentiCorrelati());
        }

        return $this->datiOrdineAcquisto[0];
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @return null|array<DatiDocumentiCorrelati>
     */
    public function getDatiContratto(): ?array
    {
        return $this->datiContratto;
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @param  null|array<DatiDocumentiCorrelati> $datiContratto
     * @return static
     */
    public function setDatiContratto(
        ?array $datiContratto = null
    ): static {
        $this->datiContratto = $datiContratto;

        return $this;
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @return static
     */
    public function unsetDatiContratto(): static
    {
        $this->datiContratto = null;

        return $this;
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @return static
     */
    public function clearDatiContratto(): static
    {
        $this->datiContratto = [];

        return $this;
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @param  DatiDocumentiCorrelati $datiContratto
     * @return static
     */
    public function addToDatiContratto(
        DatiDocumentiCorrelati $datiContratto
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiContratto)) {
            $this->datiContratto = [];
        }

        $this->datiContratto[] = $datiContratto;

        return $this;
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addToDatiContrattoWithCreate(): DatiDocumentiCorrelati
    {
        $this->addToDatiContratto($datiContratto = new DatiDocumentiCorrelati());

        return $datiContratto;
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @param  DatiDocumentiCorrelati $datiContratto
     * @return static
     */
    public function addOnceToDatiContratto(
        DatiDocumentiCorrelati $datiContratto
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiContratto)) {
            $this->datiContratto = [];
        }

        $this->datiContratto[0] = $datiContratto;

        return $this;
    }

    /**
     * @translation-german Vertragsdaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addOnceToDatiContrattoWithCreate(): DatiDocumentiCorrelati
    {
        if (!InvoiceSuiteArrayUtils::is($this->datiContratto)) {
            $this->datiContratto = [];
        }

        if ([] === $this->datiContratto) {
            $this->addOnceToDatiContratto(new DatiDocumentiCorrelati());
        }

        return $this->datiContratto[0];
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @return null|array<DatiDocumentiCorrelati>
     */
    public function getDatiConvenzione(): ?array
    {
        return $this->datiConvenzione;
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @param  null|array<DatiDocumentiCorrelati> $datiConvenzione
     * @return static
     */
    public function setDatiConvenzione(
        ?array $datiConvenzione = null
    ): static {
        $this->datiConvenzione = $datiConvenzione;

        return $this;
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @return static
     */
    public function unsetDatiConvenzione(): static
    {
        $this->datiConvenzione = null;

        return $this;
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @return static
     */
    public function clearDatiConvenzione(): static
    {
        $this->datiConvenzione = [];

        return $this;
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @param  DatiDocumentiCorrelati $datiConvenzione
     * @return static
     */
    public function addToDatiConvenzione(
        DatiDocumentiCorrelati $datiConvenzione
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiConvenzione)) {
            $this->datiConvenzione = [];
        }

        $this->datiConvenzione[] = $datiConvenzione;

        return $this;
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addToDatiConvenzioneWithCreate(): DatiDocumentiCorrelati
    {
        $this->addToDatiConvenzione($datiConvenzione = new DatiDocumentiCorrelati());

        return $datiConvenzione;
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @param  DatiDocumentiCorrelati $datiConvenzione
     * @return static
     */
    public function addOnceToDatiConvenzione(
        DatiDocumentiCorrelati $datiConvenzione
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiConvenzione)) {
            $this->datiConvenzione = [];
        }

        $this->datiConvenzione[0] = $datiConvenzione;

        return $this;
    }

    /**
     * @translation-german Vereinbarungsdaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addOnceToDatiConvenzioneWithCreate(): DatiDocumentiCorrelati
    {
        if (!InvoiceSuiteArrayUtils::is($this->datiConvenzione)) {
            $this->datiConvenzione = [];
        }

        if ([] === $this->datiConvenzione) {
            $this->addOnceToDatiConvenzione(new DatiDocumentiCorrelati());
        }

        return $this->datiConvenzione[0];
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @return null|array<DatiDocumentiCorrelati>
     */
    public function getDatiRicezione(): ?array
    {
        return $this->datiRicezione;
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @param  null|array<DatiDocumentiCorrelati> $datiRicezione
     * @return static
     */
    public function setDatiRicezione(
        ?array $datiRicezione = null
    ): static {
        $this->datiRicezione = $datiRicezione;

        return $this;
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @return static
     */
    public function unsetDatiRicezione(): static
    {
        $this->datiRicezione = null;

        return $this;
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @return static
     */
    public function clearDatiRicezione(): static
    {
        $this->datiRicezione = [];

        return $this;
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @param  DatiDocumentiCorrelati $datiRicezione
     * @return static
     */
    public function addToDatiRicezione(
        DatiDocumentiCorrelati $datiRicezione
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiRicezione)) {
            $this->datiRicezione = [];
        }

        $this->datiRicezione[] = $datiRicezione;

        return $this;
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addToDatiRicezioneWithCreate(): DatiDocumentiCorrelati
    {
        $this->addToDatiRicezione($datiRicezione = new DatiDocumentiCorrelati());

        return $datiRicezione;
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @param  DatiDocumentiCorrelati $datiRicezione
     * @return static
     */
    public function addOnceToDatiRicezione(
        DatiDocumentiCorrelati $datiRicezione
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiRicezione)) {
            $this->datiRicezione = [];
        }

        $this->datiRicezione[0] = $datiRicezione;

        return $this;
    }

    /**
     * @translation-german Empfangsdaten
     *
     * @return DatiDocumentiCorrelati
     */
    public function addOnceToDatiRicezioneWithCreate(): DatiDocumentiCorrelati
    {
        if (!InvoiceSuiteArrayUtils::is($this->datiRicezione)) {
            $this->datiRicezione = [];
        }

        if ([] === $this->datiRicezione) {
            $this->addOnceToDatiRicezione(new DatiDocumentiCorrelati());
        }

        return $this->datiRicezione[0];
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @return null|array<DatiDocumentiCorrelati>
     */
    public function getDatiFattureCollegate(): ?array
    {
        return $this->datiFattureCollegate;
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @param  null|array<DatiDocumentiCorrelati> $datiFattureCollegate
     * @return static
     */
    public function setDatiFattureCollegate(
        ?array $datiFattureCollegate = null
    ): static {
        $this->datiFattureCollegate = $datiFattureCollegate;

        return $this;
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @return static
     */
    public function unsetDatiFattureCollegate(): static
    {
        $this->datiFattureCollegate = null;

        return $this;
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @return static
     */
    public function clearDatiFattureCollegate(): static
    {
        $this->datiFattureCollegate = [];

        return $this;
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @param  DatiDocumentiCorrelati $datiFattureCollegate
     * @return static
     */
    public function addToDatiFattureCollegate(
        DatiDocumentiCorrelati $datiFattureCollegate
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiFattureCollegate)) {
            $this->datiFattureCollegate = [];
        }

        $this->datiFattureCollegate[] = $datiFattureCollegate;

        return $this;
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @return DatiDocumentiCorrelati
     */
    public function addToDatiFattureCollegateWithCreate(): DatiDocumentiCorrelati
    {
        $this->addToDatiFattureCollegate($datiFattureCollegate = new DatiDocumentiCorrelati());

        return $datiFattureCollegate;
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @param  DatiDocumentiCorrelati $datiFattureCollegate
     * @return static
     */
    public function addOnceToDatiFattureCollegate(
        DatiDocumentiCorrelati $datiFattureCollegate
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiFattureCollegate)) {
            $this->datiFattureCollegate = [];
        }

        $this->datiFattureCollegate[0] = $datiFattureCollegate;

        return $this;
    }

    /**
     * @translation-german Verknüpfte Rechnungen
     *
     * @return DatiDocumentiCorrelati
     */
    public function addOnceToDatiFattureCollegateWithCreate(): DatiDocumentiCorrelati
    {
        if (!InvoiceSuiteArrayUtils::is($this->datiFattureCollegate)) {
            $this->datiFattureCollegate = [];
        }

        if ([] === $this->datiFattureCollegate) {
            $this->addOnceToDatiFattureCollegate(new DatiDocumentiCorrelati());
        }

        return $this->datiFattureCollegate[0];
    }

    /**
     * @translation-german Angaben SAL
     *
     * @return null|array<DatiSAL>
     */
    public function getDatiSAL(): ?array
    {
        return $this->datiSAL;
    }

    /**
     * @translation-german Angaben SAL
     *
     * @param  null|array<DatiSAL> $datiSAL
     * @return static
     */
    public function setDatiSAL(
        ?array $datiSAL = null
    ): static {
        $this->datiSAL = $datiSAL;

        return $this;
    }

    /**
     * @translation-german Angaben SAL
     *
     * @return static
     */
    public function unsetDatiSAL(): static
    {
        $this->datiSAL = null;

        return $this;
    }

    /**
     * @translation-german Angaben SAL
     *
     * @return static
     */
    public function clearDatiSAL(): static
    {
        $this->datiSAL = [];

        return $this;
    }

    /**
     * @translation-german Angaben SAL
     *
     * @param  DatiSAL $datiSAL
     * @return static
     */
    public function addToDatiSAL(
        DatiSAL $datiSAL
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiSAL)) {
            $this->datiSAL = [];
        }

        $this->datiSAL[] = $datiSAL;

        return $this;
    }

    /**
     * @translation-german Angaben SAL
     *
     * @return DatiSAL
     */
    public function addToDatiSALWithCreate(): DatiSAL
    {
        $this->addToDatiSAL($datiSAL = new DatiSAL());

        return $datiSAL;
    }

    /**
     * @translation-german Angaben SAL
     *
     * @param  DatiSAL $datiSAL
     * @return static
     */
    public function addOnceToDatiSAL(
        DatiSAL $datiSAL
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiSAL)) {
            $this->datiSAL = [];
        }

        $this->datiSAL[0] = $datiSAL;

        return $this;
    }

    /**
     * @translation-german Angaben SAL
     *
     * @return DatiSAL
     */
    public function addOnceToDatiSALWithCreate(): DatiSAL
    {
        if (!InvoiceSuiteArrayUtils::is($this->datiSAL)) {
            $this->datiSAL = [];
        }

        if ([] === $this->datiSAL) {
            $this->addOnceToDatiSAL(new DatiSAL());
        }

        return $this->datiSAL[0];
    }

    /**
     * @translation-german Angaben DDT
     *
     * @return null|array<DatiDDT>
     */
    public function getDatiDDT(): ?array
    {
        return $this->datiDDT;
    }

    /**
     * @translation-german Angaben DDT
     *
     * @param  null|array<DatiDDT> $datiDDT
     * @return static
     */
    public function setDatiDDT(
        ?array $datiDDT = null
    ): static {
        $this->datiDDT = $datiDDT;

        return $this;
    }

    /**
     * @translation-german Angaben DDT
     *
     * @return static
     */
    public function unsetDatiDDT(): static
    {
        $this->datiDDT = null;

        return $this;
    }

    /**
     * @translation-german Angaben DDT
     *
     * @return static
     */
    public function clearDatiDDT(): static
    {
        $this->datiDDT = [];

        return $this;
    }

    /**
     * @translation-german Angaben DDT
     *
     * @param  DatiDDT $datiDDT
     * @return static
     */
    public function addToDatiDDT(
        DatiDDT $datiDDT
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiDDT)) {
            $this->datiDDT = [];
        }

        $this->datiDDT[] = $datiDDT;

        return $this;
    }

    /**
     * @translation-german Angaben DDT
     *
     * @return DatiDDT
     */
    public function addToDatiDDTWithCreate(): DatiDDT
    {
        $this->addToDatiDDT($datiDDT = new DatiDDT());

        return $datiDDT;
    }

    /**
     * @translation-german Angaben DDT
     *
     * @param  DatiDDT $datiDDT
     * @return static
     */
    public function addOnceToDatiDDT(
        DatiDDT $datiDDT
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->datiDDT)) {
            $this->datiDDT = [];
        }

        $this->datiDDT[0] = $datiDDT;

        return $this;
    }

    /**
     * @translation-german Angaben DDT
     *
     * @return DatiDDT
     */
    public function addOnceToDatiDDTWithCreate(): DatiDDT
    {
        if (!InvoiceSuiteArrayUtils::is($this->datiDDT)) {
            $this->datiDDT = [];
        }

        if ([] === $this->datiDDT) {
            $this->addOnceToDatiDDT(new DatiDDT());
        }

        return $this->datiDDT[0];
    }

    /**
     * @translation-german Transportdaten
     *
     * @return null|DatiTrasporto
     */
    public function getDatiTrasporto(): ?DatiTrasporto
    {
        return $this->datiTrasporto;
    }

    /**
     * @translation-german Transportdaten
     *
     * @return DatiTrasporto
     */
    public function getDatiTrasportoWithCreate(): DatiTrasporto
    {
        $this->datiTrasporto ??= new DatiTrasporto();

        return $this->datiTrasporto;
    }

    /**
     * @translation-german Transportdaten
     *
     * @param  null|DatiTrasporto $datiTrasporto
     * @return static
     */
    public function setDatiTrasporto(
        ?DatiTrasporto $datiTrasporto = null
    ): static {
        $this->datiTrasporto = $datiTrasporto;

        return $this;
    }

    /**
     * @translation-german Transportdaten
     *
     * @return static
     */
    public function unsetDatiTrasporto(): static
    {
        $this->datiTrasporto = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|FatturaPrincipale
     */
    public function getFatturaPrincipale(): ?FatturaPrincipale
    {
        return $this->fatturaPrincipale;
    }

    /**
     * @translation-german-untranslated
     *
     * @return FatturaPrincipale
     */
    public function getFatturaPrincipaleWithCreate(): FatturaPrincipale
    {
        $this->fatturaPrincipale ??= new FatturaPrincipale();

        return $this->fatturaPrincipale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|FatturaPrincipale $fatturaPrincipale
     * @return static
     */
    public function setFatturaPrincipale(
        ?FatturaPrincipale $fatturaPrincipale = null
    ): static {
        $this->fatturaPrincipale = $fatturaPrincipale;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetFatturaPrincipale(): static
    {
        $this->fatturaPrincipale = null;

        return $this;
    }
}
