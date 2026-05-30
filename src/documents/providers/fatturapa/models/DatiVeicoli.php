<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class DatiVeicoli
{
    use HandlesObjectFlags;

    /**
     * @translation-german Datum
     */
    #[JMS\Accessor(getter: 'getData', setter: 'setData')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Data')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(cdata: false)]
    private ?DateTimeInterface $data = null;

    /**
     * @translation-german Gesamt Percorso
     */
    #[JMS\Accessor(getter: 'getTotalePercorso', setter: 'setTotalePercorso')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('TotalePercorso')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $totalePercorso = null;

    /**
     * @translation-german Datum
     *
     * @return null|DateTimeInterface
     */
    public function getData(): ?DateTimeInterface
    {
        return $this->data;
    }

    /**
     * @translation-german Datum
     *
     * @param  null|DateTimeInterface $data
     * @return static
     */
    public function setData(
        ?DateTimeInterface $data = null
    ): static {
        $this->data = $data;

        return $this;
    }

    /**
     * @translation-german Datum
     *
     * @return static
     */
    public function unsetData(): static
    {
        $this->data = null;

        return $this;
    }

    /**
     * @translation-german Gesamt Percorso
     *
     * @return null|string
     */
    public function getTotalePercorso(): ?string
    {
        return $this->totalePercorso;
    }

    /**
     * @translation-german Gesamt Percorso
     *
     * @param  null|string $totalePercorso
     * @return static
     */
    public function setTotalePercorso(
        ?string $totalePercorso = null
    ): static {
        $this->totalePercorso = InvoiceSuiteStringUtils::asNullWhenEmpty($totalePercorso);

        return $this;
    }

    /**
     * @translation-german Gesamt Percorso
     *
     * @return static
     */
    public function unsetTotalePercorso(): static
    {
        $this->totalePercorso = null;

        return $this;
    }
}
