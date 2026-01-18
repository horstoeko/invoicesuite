<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\BolloVirtuale;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiBollo
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\BolloVirtuale','value'>")
     * @JMS\Accessor(getter="getBolloVirtuale", setter="setBolloVirtuale")
     * @JMS\SerializedName("BolloVirtuale")
     * @JMS\XmlElement(cdata=false)
     */
    private ?BolloVirtuale $bolloVirtuale = null;

    /**
     * @translation-german Betrag Bollo
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getImportoBollo", setter="setImportoBollo")
     * @JMS\SerializedName("ImportoBollo")
     * @JMS\XmlElement(cdata=false)
     */
    private ?string $importoBollo = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|BolloVirtuale
     */
    public function getBolloVirtuale(): ?BolloVirtuale
    {
        return $this->bolloVirtuale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|BolloVirtuale $bolloVirtuale
     * @return static
     */
    public function setBolloVirtuale(?BolloVirtuale $bolloVirtuale = null): static
    {
        $this->bolloVirtuale = $bolloVirtuale;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetBolloVirtuale(): static
    {
        $this->bolloVirtuale = null;

        return $this;
    }

    /**
     * @translation-german Betrag Bollo
     *
     * @return null|string
     */
    public function getImportoBollo(): ?string
    {
        return $this->importoBollo;
    }

    /**
     * @translation-german Betrag Bollo
     *
     * @param  null|string $importoBollo
     * @return static
     */
    public function setImportoBollo(?string $importoBollo = null): static
    {
        $this->importoBollo = InvoiceSuiteStringUtils::asNullWhenEmpty($importoBollo);

        return $this;
    }

    /**
     * @translation-german Betrag Bollo
     *
     * @return static
     */
    public function unsetImportoBollo(): static
    {
        $this->importoBollo = null;

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
    public function getImportoBolloAsFloat(): ?float
    {
        return is_null($this->importoBollo) ? null : (float) $this->importoBollo;
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
    public function setImportoBolloFromFloat(?float $value = null, ?int $scale = null): static
    {
        if (is_null($value)) {
            return $this->setImportoBollo(null);
        }

        $formatted = number_format($value, 2, '.', '');

        return $this->setImportoBollo($formatted);
    }
}
