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
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getTipoDato", setter="setTipoDato")
     * @JMS\SerializedName("TipoDato")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $tipoDato = null;

    /**
     * @translation-german Referenz Testo
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getRiferimentoTesto", setter="setRiferimentoTesto")
     * @JMS\SerializedName("RiferimentoTesto")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $riferimentoTesto = null;

    /**
     * @translation-german Referenz Nummer
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getRiferimentoNumero", setter="setRiferimentoNumero")
     * @JMS\SerializedName("RiferimentoNumero")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $riferimentoNumero = null;

    /**
     * @translation-german Referenz Datum
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Accessor(getter="getRiferimentoData", setter="setRiferimentoData")
     * @JMS\SerializedName("RiferimentoData")
     * @JMS\XmlElement(cdata=false)
     */
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
    public function setTipoDato(?string $tipoDato = null): static
    {
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
    public function setRiferimentoTesto(?string $riferimentoTesto = null): static
    {
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
     * @return null|string
     */
    public function getRiferimentoNumero(): ?string
    {
        return $this->riferimentoNumero;
    }

    /**
     * @translation-german Referenz Nummer
     *
     * @param  null|string $riferimentoNumero
     * @return static
     */
    public function setRiferimentoNumero(?string $riferimentoNumero = null): static
    {
        $this->riferimentoNumero = InvoiceSuiteStringUtils::asNullWhenEmpty($riferimentoNumero);

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
    public function setRiferimentoData(?DateTimeInterface $riferimentoData = null): static
    {
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

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getRiferimentoNumeroAsFloat(): ?float
    {
        return is_null($this->riferimentoNumero) ? null : (float) $this->riferimentoNumero;
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
    public function setRiferimentoNumeroFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setRiferimentoNumero(null);
        }

        $scale = max(2, min(8, $scale ?? 2));
        $formatted = number_format($value, $scale, '.', '');

        return $this->setRiferimentoNumero($formatted);
    }
}
