<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\CausalePagamento;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoRitenuta;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiRitenuta
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoRitenuta','value'>")
     * @JMS\Accessor(getter="getTipoRitenuta", setter="setTipoRitenuta")
     * @JMS\SerializedName("TipoRitenuta")
     * @JMS\XmlElement(cdata=false)
     */
    private ?TipoRitenuta $tipoRitenuta = null;

    /**
     * @translation-german Betrag Ritenuta
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getImportoRitenuta", setter="setImportoRitenuta")
     * @JMS\SerializedName("ImportoRitenuta")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $importoRitenuta = null;

    /**
     * @translation-german Steuersatz Ritenuta
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getAliquotaRitenuta", setter="setAliquotaRitenuta")
     * @JMS\SerializedName("AliquotaRitenuta")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $aliquotaRitenuta = null;

    /**
     * @translation-german Begründung Zahlung
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\CausalePagamento','value'>")
     * @JMS\Accessor(getter="getCausalePagamento", setter="setCausalePagamento")
     * @JMS\SerializedName("CausalePagamento")
     * @JMS\XmlElement(cdata=false)
     */
    private ?CausalePagamento $causalePagamento = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|TipoRitenuta
     */
    public function getTipoRitenuta(): ?TipoRitenuta
    {
        return $this->tipoRitenuta;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|TipoRitenuta $tipoRitenuta
     * @return static
     */
    public function setTipoRitenuta(?TipoRitenuta $tipoRitenuta = null): static
    {
        $this->tipoRitenuta = $tipoRitenuta;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTipoRitenuta(): static
    {
        $this->tipoRitenuta = null;

        return $this;
    }

    /**
     * @translation-german Betrag Ritenuta
     *
     * @return null|string
     */
    public function getImportoRitenuta(): ?string
    {
        return $this->importoRitenuta;
    }

    /**
     * @translation-german Betrag Ritenuta
     *
     * @param  null|string $importoRitenuta
     * @return static
     */
    public function setImportoRitenuta(?string $importoRitenuta = null): static
    {
        $this->importoRitenuta = InvoiceSuiteStringUtils::asNullWhenEmpty($importoRitenuta);

        return $this;
    }

    /**
     * @translation-german Betrag Ritenuta
     *
     * @return static
     */
    public function unsetImportoRitenuta(): static
    {
        $this->importoRitenuta = null;

        return $this;
    }

    /**
     * @translation-german Steuersatz Ritenuta
     *
     * @return null|string
     */
    public function getAliquotaRitenuta(): ?string
    {
        return $this->aliquotaRitenuta;
    }

    /**
     * @translation-german Steuersatz Ritenuta
     *
     * @param  null|string $aliquotaRitenuta
     * @return static
     */
    public function setAliquotaRitenuta(?string $aliquotaRitenuta = null): static
    {
        $this->aliquotaRitenuta = InvoiceSuiteStringUtils::asNullWhenEmpty($aliquotaRitenuta);

        return $this;
    }

    /**
     * @translation-german Steuersatz Ritenuta
     *
     * @return static
     */
    public function unsetAliquotaRitenuta(): static
    {
        $this->aliquotaRitenuta = null;

        return $this;
    }

    /**
     * @translation-german Begründung Zahlung
     *
     * @return null|CausalePagamento
     */
    public function getCausalePagamento(): ?CausalePagamento
    {
        return $this->causalePagamento;
    }

    /**
     * @translation-german Begründung Zahlung
     *
     * @param  null|CausalePagamento $causalePagamento
     * @return static
     */
    public function setCausalePagamento(?CausalePagamento $causalePagamento = null): static
    {
        $this->causalePagamento = $causalePagamento;

        return $this;
    }

    /**
     * @translation-german Begründung Zahlung
     *
     * @return static
     */
    public function unsetCausalePagamento(): static
    {
        $this->causalePagamento = null;

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
    public function getImportoRitenutaAsFloat(): ?float
    {
        return is_null($this->importoRitenuta) ? null : (float) $this->importoRitenuta;
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
    public function setImportoRitenutaFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setImportoRitenuta(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setImportoRitenuta($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getAliquotaRitenutaAsFloat(): ?float
    {
        return is_null($this->aliquotaRitenuta) ? null : (float) $this->aliquotaRitenuta;
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
    public function setAliquotaRitenutaFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setAliquotaRitenuta(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setAliquotaRitenuta($formatted);
    }
}
