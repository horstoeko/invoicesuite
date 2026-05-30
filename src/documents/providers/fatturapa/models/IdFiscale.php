<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class IdFiscale
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getIdPaese', setter: 'setIdPaese')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('IdPaese')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $idPaese = null;

    /**
     * @translation-german Id Code
     */
    #[JMS\Accessor(getter: 'getIdCodice', setter: 'setIdCodice')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('IdCodice')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $idCodice = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getIdPaese(): ?string
    {
        return $this->idPaese;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $idPaese
     * @return static
     */
    public function setIdPaese(
        ?string $idPaese = null
    ): static {
        $this->idPaese = InvoiceSuiteStringUtils::asNullWhenEmpty($idPaese);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetIdPaese(): static
    {
        $this->idPaese = null;

        return $this;
    }

    /**
     * @translation-german Id Code
     *
     * @return null|string
     */
    public function getIdCodice(): ?string
    {
        return $this->idCodice;
    }

    /**
     * @translation-german Id Code
     *
     * @param  null|string $idCodice
     * @return static
     */
    public function setIdCodice(
        ?string $idCodice = null
    ): static {
        $this->idCodice = InvoiceSuiteStringUtils::asNullWhenEmpty($idCodice);

        return $this;
    }

    /**
     * @translation-german Id Code
     *
     * @return static
     */
    public function unsetIdCodice(): static
    {
        $this->idCodice = null;

        return $this;
    }
}
