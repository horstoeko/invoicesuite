<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\SocioUnico;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\StatoLiquidazione;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class IscrizioneREA
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getUfficio', setter: 'setUfficio')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Ufficio')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $ufficio = null;

    /**
     * @translation-german Nummer REA
     */
    #[JMS\Accessor(getter: 'getNumeroREA', setter: 'setNumeroREA')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('NumeroREA')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $numeroREA = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getCapitaleSociale', setter: 'setCapitaleSociale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CapitaleSociale')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $capitaleSociale = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getSocioUnico', setter: 'setSocioUnico')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SocioUnico')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\SocioUnico')]
    #[JMS\XmlElement(cdata: false)]
    private ?SocioUnico $socioUnico = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getStatoLiquidazione', setter: 'setStatoLiquidazione')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('StatoLiquidazione')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\StatoLiquidazione\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?StatoLiquidazione $statoLiquidazione = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getUfficio(): ?string
    {
        return $this->ufficio;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $ufficio
     * @return static
     */
    public function setUfficio(
        ?string $ufficio = null
    ): static {
        $this->ufficio = InvoiceSuiteStringUtils::asNullWhenEmpty($ufficio);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetUfficio(): static
    {
        $this->ufficio = null;

        return $this;
    }

    /**
     * @translation-german Nummer REA
     *
     * @return null|string
     */
    public function getNumeroREA(): ?string
    {
        return $this->numeroREA;
    }

    /**
     * @translation-german Nummer REA
     *
     * @param  null|string $numeroREA
     * @return static
     */
    public function setNumeroREA(
        ?string $numeroREA = null
    ): static {
        $this->numeroREA = InvoiceSuiteStringUtils::asNullWhenEmpty($numeroREA);

        return $this;
    }

    /**
     * @translation-german Nummer REA
     *
     * @return static
     */
    public function unsetNumeroREA(): static
    {
        $this->numeroREA = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|float
     */
    public function getCapitaleSociale(): ?float
    {
        return $this->capitaleSociale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $capitaleSociale
     * @return static
     */
    public function setCapitaleSociale(
        ?float $capitaleSociale = null
    ): static {
        $this->capitaleSociale = $capitaleSociale;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetCapitaleSociale(): static
    {
        $this->capitaleSociale = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|SocioUnico
     */
    public function getSocioUnico(): ?SocioUnico
    {
        return $this->socioUnico;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|SocioUnico $socioUnico
     * @return static
     */
    public function setSocioUnico(
        ?SocioUnico $socioUnico = null
    ): static {
        $this->socioUnico = $socioUnico;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSocioUnico(): static
    {
        $this->socioUnico = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|StatoLiquidazione
     */
    public function getStatoLiquidazione(): ?StatoLiquidazione
    {
        return $this->statoLiquidazione;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|StatoLiquidazione $statoLiquidazione
     * @return static
     */
    public function setStatoLiquidazione(
        ?StatoLiquidazione $statoLiquidazione = null
    ): static {
        $this->statoLiquidazione = $statoLiquidazione;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetStatoLiquidazione(): static
    {
        $this->statoLiquidazione = null;

        return $this;
    }
}
