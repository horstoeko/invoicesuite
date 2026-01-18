<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Natura;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Ritenuta;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoCassa;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiCassaPrevidenziale
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoCassa','value'>")
     * @JMS\Accessor(getter="getTipoCassa", setter="setTipoCassa")
     * @JMS\SerializedName("TipoCassa")
     * @JMS\XmlElement(cdata=false)
     */
    private ?TipoCassa $tipoCassa = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getAlCassa", setter="setAlCassa")
     * @JMS\SerializedName("AlCassa")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $alCassa = null;

    /**
     * @translation-german Betrag Contributo Cassa
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getImportoContributoCassa", setter="setImportoContributoCassa")
     * @JMS\SerializedName("ImportoContributoCassa")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $importoContributoCassa = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getImponibileCassa", setter="setImponibileCassa")
     * @JMS\SerializedName("ImponibileCassa")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $imponibileCassa = null;

    /**
     * @translation-german Steuersatz IVA
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getAliquotaIVA", setter="setAliquotaIVA")
     * @JMS\SerializedName("AliquotaIVA")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $aliquotaIVA = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("horstoeko\\invoicesuite\\documents\\providers\\fatturapa\\models\\Enum\\Ritenuta")
     * @JMS\Accessor(getter="getRitenuta", setter="setRitenuta")
     * @JMS\SerializedName("Ritenuta")
     * @JMS\XmlElement(cdata=false)
     */
    private ?Ritenuta $ritenuta = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("horstoeko\\invoicesuite\\documents\\providers\\fatturapa\\models\\Enum\\Natura")
     * @JMS\Accessor(getter="getNatura", setter="setNatura")
     * @JMS\SerializedName("Natura")
     * @JMS\XmlElement(cdata=false)
     */
    private ?Natura $natura = null;

    /**
     * @translation-german Referenz Amministrazione
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getRiferimentoAmministrazione", setter="setRiferimentoAmministrazione")
     * @JMS\SerializedName("RiferimentoAmministrazione")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $riferimentoAmministrazione = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|TipoCassa
     */
    public function getTipoCassa(): ?TipoCassa
    {
        return $this->tipoCassa;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|TipoCassa $tipoCassa
     * @return static
     */
    public function setTipoCassa(?TipoCassa $tipoCassa = null): static
    {
        $this->tipoCassa = $tipoCassa;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTipoCassa(): static
    {
        $this->tipoCassa = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getAlCassa(): ?string
    {
        return $this->alCassa;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $alCassa
     * @return static
     */
    public function setAlCassa(?string $alCassa = null): static
    {
        $this->alCassa = InvoiceSuiteStringUtils::asNullWhenEmpty($alCassa);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetAlCassa(): static
    {
        $this->alCassa = null;

        return $this;
    }

    /**
     * @translation-german Betrag Contributo Cassa
     *
     * @return null|string
     */
    public function getImportoContributoCassa(): ?string
    {
        return $this->importoContributoCassa;
    }

    /**
     * @translation-german Betrag Contributo Cassa
     *
     * @param  null|string $importoContributoCassa
     * @return static
     */
    public function setImportoContributoCassa(?string $importoContributoCassa = null): static
    {
        $this->importoContributoCassa = InvoiceSuiteStringUtils::asNullWhenEmpty($importoContributoCassa);

        return $this;
    }

    /**
     * @translation-german Betrag Contributo Cassa
     *
     * @return static
     */
    public function unsetImportoContributoCassa(): static
    {
        $this->importoContributoCassa = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getImponibileCassa(): ?string
    {
        return $this->imponibileCassa;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $imponibileCassa
     * @return static
     */
    public function setImponibileCassa(?string $imponibileCassa = null): static
    {
        $this->imponibileCassa = InvoiceSuiteStringUtils::asNullWhenEmpty($imponibileCassa);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetImponibileCassa(): static
    {
        $this->imponibileCassa = null;

        return $this;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @return null|string
     */
    public function getAliquotaIVA(): ?string
    {
        return $this->aliquotaIVA;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @param  null|string $aliquotaIVA
     * @return static
     */
    public function setAliquotaIVA(?string $aliquotaIVA = null): static
    {
        $this->aliquotaIVA = InvoiceSuiteStringUtils::asNullWhenEmpty($aliquotaIVA);

        return $this;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @return static
     */
    public function unsetAliquotaIVA(): static
    {
        $this->aliquotaIVA = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|Ritenuta
     */
    public function getRitenuta(): ?Ritenuta
    {
        return $this->ritenuta;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|Ritenuta $ritenuta
     * @return static
     */
    public function setRitenuta(?Ritenuta $ritenuta = null): static
    {
        $this->ritenuta = $ritenuta;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetRitenuta(): static
    {
        $this->ritenuta = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|Natura
     */
    public function getNatura(): ?Natura
    {
        return $this->natura;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|Natura $natura
     * @return static
     */
    public function setNatura(?Natura $natura = null): static
    {
        $this->natura = $natura;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetNatura(): static
    {
        $this->natura = null;

        return $this;
    }

    /**
     * @translation-german Referenz Amministrazione
     *
     * @return null|string
     */
    public function getRiferimentoAmministrazione(): ?string
    {
        return $this->riferimentoAmministrazione;
    }

    /**
     * @translation-german Referenz Amministrazione
     *
     * @param  null|string $riferimentoAmministrazione
     * @return static
     */
    public function setRiferimentoAmministrazione(?string $riferimentoAmministrazione = null): static
    {
        $this->riferimentoAmministrazione = InvoiceSuiteStringUtils::asNullWhenEmpty($riferimentoAmministrazione);

        return $this;
    }

    /**
     * @translation-german Referenz Amministrazione
     *
     * @return static
     */
    public function unsetRiferimentoAmministrazione(): static
    {
        $this->riferimentoAmministrazione = null;

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
    public function getAlCassaAsFloat(): ?float
    {
        return is_null($this->alCassa) ? null : (float) $this->alCassa;
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
    public function setAlCassaFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setAlCassa(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setAlCassa($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getImportoContributoCassaAsFloat(): ?float
    {
        return is_null($this->importoContributoCassa) ? null : (float) $this->importoContributoCassa;
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
    public function setImportoContributoCassaFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setImportoContributoCassa(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setImportoContributoCassa($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getImponibileCassaAsFloat(): ?float
    {
        return is_null($this->imponibileCassa) ? null : (float) $this->imponibileCassa;
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
    public function setImponibileCassaFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setImponibileCassa(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setImponibileCassa($formatted);
    }

    /**
     * @translation-german-untranslated
     *
     * Komfort-Methode: Dezimalwert als Float lesen.
     * Achtung: Floats sind ungenau (IEEE 754) und nur für Bequemlichkeit gedacht.
     *
     * @return null|float
     */
    public function getAliquotaIVAAsFloat(): ?float
    {
        return is_null($this->aliquotaIVA) ? null : (float) $this->aliquotaIVA;
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
    public function setAliquotaIVAFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setAliquotaIVA(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setAliquotaIVA($formatted);
    }
}
