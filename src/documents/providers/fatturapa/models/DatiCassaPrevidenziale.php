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
     */
    #[JMS\Accessor(getter: 'getTipoCassa', setter: 'setTipoCassa')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('TipoCassa')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoCassa\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?TipoCassa $tipoCassa = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getAlCassa', setter: 'setAlCassa')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('AlCassa')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $alCassa = null;

    /**
     * @translation-german Betrag Contributo Cassa
     */
    #[JMS\Accessor(getter: 'getImportoContributoCassa', setter: 'setImportoContributoCassa')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ImportoContributoCassa')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $importoContributoCassa = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getImponibileCassa', setter: 'setImponibileCassa')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ImponibileCassa')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $imponibileCassa = null;

    /**
     * @translation-german Steuersatz IVA
     */
    #[JMS\Accessor(getter: 'getAliquotaIVA', setter: 'setAliquotaIVA')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('AliquotaIVA')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $aliquotaIVA = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getRitenuta', setter: 'setRitenuta')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Ritenuta')]
    #[JMS\Type('horstoeko\\\invoicesuite\\\documents\\\providers\\\fatturapa\\\models\\\Enum\\\Ritenuta')]
    #[JMS\XmlElement(cdata: false)]
    private ?Ritenuta $ritenuta = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getNatura', setter: 'setNatura')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Natura')]
    #[JMS\Type('horstoeko\\\invoicesuite\\\documents\\\providers\\\fatturapa\\\models\\\Enum\\\Natura')]
    #[JMS\XmlElement(cdata: false)]
    private ?Natura $natura = null;

    /**
     * @translation-german Referenz Amministrazione
     */
    #[JMS\Accessor(getter: 'getRiferimentoAmministrazione', setter: 'setRiferimentoAmministrazione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RiferimentoAmministrazione')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
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
    public function setTipoCassa(
        ?TipoCassa $tipoCassa = null
    ): static {
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
     * @return null|float
     */
    public function getAlCassa(): ?float
    {
        return $this->alCassa;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $alCassa
     * @return static
     */
    public function setAlCassa(
        ?float $alCassa = null
    ): static {
        $this->alCassa = $alCassa;

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
     * @return null|float
     */
    public function getImportoContributoCassa(): ?float
    {
        return $this->importoContributoCassa;
    }

    /**
     * @translation-german Betrag Contributo Cassa
     *
     * @param  null|float $importoContributoCassa
     * @return static
     */
    public function setImportoContributoCassa(
        ?float $importoContributoCassa = null
    ): static {
        $this->importoContributoCassa = $importoContributoCassa;

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
     * @return null|float
     */
    public function getImponibileCassa(): ?float
    {
        return $this->imponibileCassa;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $imponibileCassa
     * @return static
     */
    public function setImponibileCassa(
        ?float $imponibileCassa = null
    ): static {
        $this->imponibileCassa = $imponibileCassa;

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
     * @return null|float
     */
    public function getAliquotaIVA(): ?float
    {
        return $this->aliquotaIVA;
    }

    /**
     * @translation-german Steuersatz IVA
     *
     * @param  null|float $aliquotaIVA
     * @return static
     */
    public function setAliquotaIVA(
        ?float $aliquotaIVA = null
    ): static {
        $this->aliquotaIVA = $aliquotaIVA;

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
    public function setRitenuta(
        ?Ritenuta $ritenuta = null
    ): static {
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
    public function setNatura(
        ?Natura $natura = null
    ): static {
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
    public function setRiferimentoAmministrazione(
        ?string $riferimentoAmministrazione = null
    ): static {
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
}
