<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class CodiceArticolo
{
    use HandlesObjectFlags;

    /**
     * @translation-german Code Tipo
     */
    #[JMS\Accessor(getter: 'getCodiceTipo', setter: 'setCodiceTipo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceTipo')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $codiceTipo = null;

    /**
     * @translation-german Code Valore
     */
    #[JMS\Accessor(getter: 'getCodiceValore', setter: 'setCodiceValore')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CodiceValore')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $codiceValore = null;

    /**
     * @translation-german Code Tipo
     *
     * @return null|string
     */
    public function getCodiceTipo(): ?string
    {
        return $this->codiceTipo;
    }

    /**
     * @translation-german Code Tipo
     *
     * @param  null|string $codiceTipo
     * @return static
     */
    public function setCodiceTipo(
        ?string $codiceTipo = null
    ): static {
        $this->codiceTipo = InvoiceSuiteStringUtils::asNullWhenEmpty($codiceTipo);

        return $this;
    }

    /**
     * @translation-german Code Tipo
     *
     * @return static
     */
    public function unsetCodiceTipo(): static
    {
        $this->codiceTipo = null;

        return $this;
    }

    /**
     * @translation-german Code Valore
     *
     * @return null|string
     */
    public function getCodiceValore(): ?string
    {
        return $this->codiceValore;
    }

    /**
     * @translation-german Code Valore
     *
     * @param  null|string $codiceValore
     * @return static
     */
    public function setCodiceValore(
        ?string $codiceValore = null
    ): static {
        $this->codiceValore = InvoiceSuiteStringUtils::asNullWhenEmpty($codiceValore);

        return $this;
    }

    /**
     * @translation-german Code Valore
     *
     * @return static
     */
    public function unsetCodiceValore(): static
    {
        $this->codiceValore = null;

        return $this;
    }
}
