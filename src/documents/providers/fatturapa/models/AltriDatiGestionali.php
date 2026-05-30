<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class AltriDatiGestionali
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getTipoDato', setter: 'setTipoDato')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('TipoDato')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $tipoDato = null;

    /**
     * @translation-german Referenz Testo
     */
    #[JMS\Accessor(getter: 'getRiferimentoTesto', setter: 'setRiferimentoTesto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RiferimentoTesto')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $riferimentoTesto = null;

    /**
     * @translation-german Referenz Nummer
     */
    #[JMS\Accessor(getter: 'getRiferimentoNumero', setter: 'setRiferimentoNumero')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RiferimentoNumero')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $riferimentoNumero = null;

    /**
     * @translation-german Referenz Datum
     */
    #[JMS\Accessor(getter: 'getRiferimentoData', setter: 'setRiferimentoData')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RiferimentoData')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $riferimentoData = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getTipoDato(): ?string
    {
        return $this->tipoDato;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $tipoDato
     * @return static
     */
    public function setTipoDato(
        ?string $tipoDato = null
    ): static {
        $this->tipoDato = InvoiceSuiteStringUtils::asNullWhenEmpty($tipoDato);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTipoDato(): static
    {
        $this->tipoDato = null;

        return $this;
    }

    /**
     * @translation-german Referenz Testo
     *
     * @return null|string
     */
    public function getRiferimentoTesto(): ?string
    {
        return $this->riferimentoTesto;
    }

    /**
     * @translation-german Referenz Testo
     *
     * @param  null|string $riferimentoTesto
     * @return static
     */
    public function setRiferimentoTesto(
        ?string $riferimentoTesto = null
    ): static {
        $this->riferimentoTesto = InvoiceSuiteStringUtils::asNullWhenEmpty($riferimentoTesto);

        return $this;
    }

    /**
     * @translation-german Referenz Testo
     *
     * @return static
     */
    public function unsetRiferimentoTesto(): static
    {
        $this->riferimentoTesto = null;

        return $this;
    }

    /**
     * @translation-german Referenz Nummer
     *
     * @return null|float
     */
    public function getRiferimentoNumero(): ?float
    {
        return $this->riferimentoNumero;
    }

    /**
     * @translation-german Referenz Nummer
     *
     * @param  null|float $riferimentoNumero
     * @return static
     */
    public function setRiferimentoNumero(
        ?float $riferimentoNumero = null
    ): static {
        $this->riferimentoNumero = $riferimentoNumero;

        return $this;
    }

    /**
     * @translation-german Referenz Nummer
     *
     * @return static
     */
    public function unsetRiferimentoNumero(): static
    {
        $this->riferimentoNumero = null;

        return $this;
    }

    /**
     * @translation-german Referenz Datum
     *
     * @return null|DateTimeInterface
     */
    public function getRiferimentoData(): ?DateTimeInterface
    {
        return $this->riferimentoData;
    }

    /**
     * @translation-german Referenz Datum
     *
     * @param  null|DateTimeInterface $riferimentoData
     * @return static
     */
    public function setRiferimentoData(
        ?DateTimeInterface $riferimentoData = null
    ): static {
        $this->riferimentoData = $riferimentoData;

        return $this;
    }

    /**
     * @translation-german Referenz Datum
     *
     * @return static
     */
    public function unsetRiferimentoData(): static
    {
        $this->riferimentoData = null;

        return $this;
    }
}
