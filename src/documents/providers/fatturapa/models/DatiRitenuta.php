<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\CausalePagamento;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoRitenuta;
use JMS\Serializer\Annotation as JMS;

final class DatiRitenuta
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getTipoRitenuta', setter: 'setTipoRitenuta')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('TipoRitenuta')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoRitenuta\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?TipoRitenuta $tipoRitenuta = null;

    /**
     * @translation-german Betrag Ritenuta
     */
    #[JMS\Accessor(getter: 'getImportoRitenuta', setter: 'setImportoRitenuta')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ImportoRitenuta')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $importoRitenuta = null;

    /**
     * @translation-german Steuersatz Ritenuta
     */
    #[JMS\Accessor(getter: 'getAliquotaRitenuta', setter: 'setAliquotaRitenuta')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('AliquotaRitenuta')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $aliquotaRitenuta = null;

    /**
     * @translation-german Begründung Zahlung
     */
    #[JMS\Accessor(getter: 'getCausalePagamento', setter: 'setCausalePagamento')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CausalePagamento')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\CausalePagamento\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
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
    public function setTipoRitenuta(
        ?TipoRitenuta $tipoRitenuta = null
    ): static {
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
     * @return null|float
     */
    public function getImportoRitenuta(): ?float
    {
        return $this->importoRitenuta;
    }

    /**
     * @translation-german Betrag Ritenuta
     *
     * @param  null|float $importoRitenuta
     * @return static
     */
    public function setImportoRitenuta(
        ?float $importoRitenuta = null
    ): static {
        $this->importoRitenuta = $importoRitenuta;

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
     * @return null|float
     */
    public function getAliquotaRitenuta(): ?float
    {
        return $this->aliquotaRitenuta;
    }

    /**
     * @translation-german Steuersatz Ritenuta
     *
     * @param  null|float $aliquotaRitenuta
     * @return static
     */
    public function setAliquotaRitenuta(
        ?float $aliquotaRitenuta = null
    ): static {
        $this->aliquotaRitenuta = $aliquotaRitenuta;

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
    public function setCausalePagamento(
        ?CausalePagamento $causalePagamento = null
    ): static {
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
}
