<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiDocumentiCorrelati
{
    use HandlesObjectFlags;

    /**
     * @translation-german Referenz Nummer Position
     *
     * @var null|array<int>
     */
    #[JMS\Accessor(getter: 'getRiferimentoNumeroLinea', setter: 'setRiferimentoNumeroLinea')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RiferimentoNumeroLinea')]
    #[JMS\Type('array<int>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'RiferimentoNumeroLinea')]
    private ?array $riferimentoNumeroLinea = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getIdDocumento', setter: 'setIdDocumento')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('IdDocumento')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $idDocumento = null;

    /**
     * @translation-german Datum
     */
    #[JMS\Accessor(getter: 'getData', setter: 'setData')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Data')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $data = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getNumItem', setter: 'setNumItem')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('NumItem')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $numItem = null;

    /**
     * @translation-german Code Commessa Vereinbarung
     */
    #[JMS\Accessor(getter: 'getCodiceCommessaConvenzione', setter: 'setCodiceCommessaConvenzione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceCommessaConvenzione')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $codiceCommessaConvenzione = null;

    /**
     * @translation-german Code CUP
     */
    #[JMS\Accessor(getter: 'getCodiceCUP', setter: 'setCodiceCUP')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceCUP')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $codiceCUP = null;

    /**
     * @translation-german Code CIG
     */
    #[JMS\Accessor(getter: 'getCodiceCIG', setter: 'setCodiceCIG')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceCIG')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $codiceCIG = null;

    /**
     * @translation-german Referenz Nummer Position
     *
     * @return null|array<int>
     */
    public function getRiferimentoNumeroLinea(): ?array
    {
        return $this->riferimentoNumeroLinea;
    }

    /**
     * @translation-german Referenz Nummer Position
     *
     * @param  null|array<int> $riferimentoNumeroLinea
     * @return static
     */
    public function setRiferimentoNumeroLinea(
        ?array $riferimentoNumeroLinea = null
    ): static {
        $this->riferimentoNumeroLinea = $riferimentoNumeroLinea;

        return $this;
    }

    /**
     * @translation-german Referenz Nummer Position
     *
     * @return static
     */
    public function unsetRiferimentoNumeroLinea(): static
    {
        $this->riferimentoNumeroLinea = null;

        return $this;
    }

    /**
     * @translation-german Referenz Nummer Position
     *
     * @return static
     */
    public function clearRiferimentoNumeroLinea(): static
    {
        $this->riferimentoNumeroLinea = [];

        return $this;
    }

    /**
     * @translation-german Referenz Nummer Position
     *
     * @param  int    $riferimentoNumeroLinea
     * @return static
     */
    public function addToRiferimentoNumeroLinea(
        int $riferimentoNumeroLinea
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->riferimentoNumeroLinea)) {
            $this->riferimentoNumeroLinea = [];
        }

        $this->riferimentoNumeroLinea[] = $riferimentoNumeroLinea;

        return $this;
    }

    /**
     * @translation-german Referenz Nummer Position
     *
     * @param  int    $riferimentoNumeroLinea
     * @return static
     */
    public function addOnceToRiferimentoNumeroLinea(
        int $riferimentoNumeroLinea
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->riferimentoNumeroLinea)) {
            $this->riferimentoNumeroLinea = [];
        }

        $this->riferimentoNumeroLinea[0] = $riferimentoNumeroLinea;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getIdDocumento(): ?string
    {
        return $this->idDocumento;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $idDocumento
     * @return static
     */
    public function setIdDocumento(
        ?string $idDocumento = null
    ): static {
        $this->idDocumento = InvoiceSuiteStringUtils::asNullWhenEmpty($idDocumento);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetIdDocumento(): static
    {
        $this->idDocumento = null;

        return $this;
    }

    /**
     * @translation-german Datum
     *
     * @return null|DateTimeInterface
     */
    public function getData(): ?DateTimeInterface
    {
        return $this->data;
    }

    /**
     * @translation-german Datum
     *
     * @param  null|DateTimeInterface $data
     * @return static
     */
    public function setData(
        ?DateTimeInterface $data = null
    ): static {
        $this->data = $data;

        return $this;
    }

    /**
     * @translation-german Datum
     *
     * @return static
     */
    public function unsetData(): static
    {
        $this->data = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getNumItem(): ?string
    {
        return $this->numItem;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $numItem
     * @return static
     */
    public function setNumItem(
        ?string $numItem = null
    ): static {
        $this->numItem = InvoiceSuiteStringUtils::asNullWhenEmpty($numItem);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetNumItem(): static
    {
        $this->numItem = null;

        return $this;
    }

    /**
     * @translation-german Code Commessa Vereinbarung
     *
     * @return null|string
     */
    public function getCodiceCommessaConvenzione(): ?string
    {
        return $this->codiceCommessaConvenzione;
    }

    /**
     * @translation-german Code Commessa Vereinbarung
     *
     * @param  null|string $codiceCommessaConvenzione
     * @return static
     */
    public function setCodiceCommessaConvenzione(
        ?string $codiceCommessaConvenzione = null
    ): static {
        $this->codiceCommessaConvenzione = InvoiceSuiteStringUtils::asNullWhenEmpty($codiceCommessaConvenzione);

        return $this;
    }

    /**
     * @translation-german Code Commessa Vereinbarung
     *
     * @return static
     */
    public function unsetCodiceCommessaConvenzione(): static
    {
        $this->codiceCommessaConvenzione = null;

        return $this;
    }

    /**
     * @translation-german Code CUP
     *
     * @return null|string
     */
    public function getCodiceCUP(): ?string
    {
        return $this->codiceCUP;
    }

    /**
     * @translation-german Code CUP
     *
     * @param  null|string $codiceCUP
     * @return static
     */
    public function setCodiceCUP(
        ?string $codiceCUP = null
    ): static {
        $this->codiceCUP = InvoiceSuiteStringUtils::asNullWhenEmpty($codiceCUP);

        return $this;
    }

    /**
     * @translation-german Code CUP
     *
     * @return static
     */
    public function unsetCodiceCUP(): static
    {
        $this->codiceCUP = null;

        return $this;
    }

    /**
     * @translation-german Code CIG
     *
     * @return null|string
     */
    public function getCodiceCIG(): ?string
    {
        return $this->codiceCIG;
    }

    /**
     * @translation-german Code CIG
     *
     * @param  null|string $codiceCIG
     * @return static
     */
    public function setCodiceCIG(
        ?string $codiceCIG = null
    ): static {
        $this->codiceCIG = InvoiceSuiteStringUtils::asNullWhenEmpty($codiceCIG);

        return $this;
    }

    /**
     * @translation-german Code CIG
     *
     * @return static
     */
    public function unsetCodiceCIG(): static
    {
        $this->codiceCIG = null;

        return $this;
    }
}
