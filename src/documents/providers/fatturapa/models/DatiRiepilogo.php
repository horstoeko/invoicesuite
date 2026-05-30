<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\EsigibilitaIVA;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Natura;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiRiepilogo
{
    use HandlesObjectFlags;

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
    #[JMS\Accessor(getter: 'getNatura', setter: 'setNatura')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Natura')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\Natura\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?Natura $natura = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getSpeseAccessorie', setter: 'setSpeseAccessorie')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SpeseAccessorie')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $speseAccessorie = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getArrotondamento', setter: 'setArrotondamento')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Arrotondamento')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $arrotondamento = null;

    /**
     * @translation-german Imponibile Betrag
     */
    #[JMS\Accessor(getter: 'getImponibileImporto', setter: 'setImponibileImporto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ImponibileImporto')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $imponibileImporto = null;

    /**
     * @translation-german Steuer
     */
    #[JMS\Accessor(getter: 'getImposta', setter: 'setImposta')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Imposta')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $imposta = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getEsigibilitaIVA', setter: 'setEsigibilitaIVA')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('EsigibilitaIVA')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\EsigibilitaIVA\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?EsigibilitaIVA $esigibilitaIVA = null;

    /**
     * @translation-german Referenz Normativo
     */
    #[JMS\Accessor(getter: 'getRiferimentoNormativo', setter: 'setRiferimentoNormativo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('RiferimentoNormativo')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $riferimentoNormativo = null;

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
     * @translation-german-untranslated
     *
     * @return null|float
     */
    public function getSpeseAccessorie(): ?float
    {
        return $this->speseAccessorie;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $speseAccessorie
     * @return static
     */
    public function setSpeseAccessorie(
        ?float $speseAccessorie = null
    ): static {
        $this->speseAccessorie = $speseAccessorie;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSpeseAccessorie(): static
    {
        $this->speseAccessorie = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|float
     */
    public function getArrotondamento(): ?float
    {
        return $this->arrotondamento;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $arrotondamento
     * @return static
     */
    public function setArrotondamento(
        ?float $arrotondamento = null
    ): static {
        $this->arrotondamento = $arrotondamento;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetArrotondamento(): static
    {
        $this->arrotondamento = null;

        return $this;
    }

    /**
     * @translation-german Imponibile Betrag
     *
     * @return null|float
     */
    public function getImponibileImporto(): ?float
    {
        return $this->imponibileImporto;
    }

    /**
     * @translation-german Imponibile Betrag
     *
     * @param  null|float $imponibileImporto
     * @return static
     */
    public function setImponibileImporto(
        ?float $imponibileImporto = null
    ): static {
        $this->imponibileImporto = $imponibileImporto;

        return $this;
    }

    /**
     * @translation-german Imponibile Betrag
     *
     * @return static
     */
    public function unsetImponibileImporto(): static
    {
        $this->imponibileImporto = null;

        return $this;
    }

    /**
     * @translation-german Steuer
     *
     * @return null|float
     */
    public function getImposta(): ?float
    {
        return $this->imposta;
    }

    /**
     * @translation-german Steuer
     *
     * @param  null|float $imposta
     * @return static
     */
    public function setImposta(
        ?float $imposta = null
    ): static {
        $this->imposta = $imposta;

        return $this;
    }

    /**
     * @translation-german Steuer
     *
     * @return static
     */
    public function unsetImposta(): static
    {
        $this->imposta = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|EsigibilitaIVA
     */
    public function getEsigibilitaIVA(): ?EsigibilitaIVA
    {
        return $this->esigibilitaIVA;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|EsigibilitaIVA $esigibilitaIVA
     * @return static
     */
    public function setEsigibilitaIVA(
        ?EsigibilitaIVA $esigibilitaIVA = null
    ): static {
        $this->esigibilitaIVA = $esigibilitaIVA;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetEsigibilitaIVA(): static
    {
        $this->esigibilitaIVA = null;

        return $this;
    }

    /**
     * @translation-german Referenz Normativo
     *
     * @return null|string
     */
    public function getRiferimentoNormativo(): ?string
    {
        return $this->riferimentoNormativo;
    }

    /**
     * @translation-german Referenz Normativo
     *
     * @param  null|string $riferimentoNormativo
     * @return static
     */
    public function setRiferimentoNormativo(
        ?string $riferimentoNormativo = null
    ): static {
        $this->riferimentoNormativo = InvoiceSuiteStringUtils::asNullWhenEmpty($riferimentoNormativo);

        return $this;
    }

    /**
     * @translation-german Referenz Normativo
     *
     * @return static
     */
    public function unsetRiferimentoNormativo(): static
    {
        $this->riferimentoNormativo = null;

        return $this;
    }
}
