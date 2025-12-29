<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LotNumberID;
use JMS\Serializer\Annotation as JMS;

class LotIdentificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|LotNumberID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LotNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("LotNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLotNumberID", setter="setLotNumberID")
     */
    private $lotNumberID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryDate", setter="setExpiryDate")
     */
    private $expiryDate;

    /**
     * @var null|array<AdditionalItemProperty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\AdditionalItemProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalItemProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalItemProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalItemProperty", setter="setAdditionalItemProperty")
     */
    private $additionalItemProperty;

    /**
     * @return null|LotNumberID
     */
    public function getLotNumberID(): ?LotNumberID
    {
        return $this->lotNumberID;
    }

    /**
     * @return LotNumberID
     */
    public function getLotNumberIDWithCreate(): LotNumberID
    {
        $this->lotNumberID = is_null($this->lotNumberID) ? new LotNumberID() : $this->lotNumberID;

        return $this->lotNumberID;
    }

    /**
     * @param  null|LotNumberID $lotNumberID
     * @return static
     */
    public function setLotNumberID(?LotNumberID $lotNumberID = null): static
    {
        $this->lotNumberID = $lotNumberID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLotNumberID(): static
    {
        $this->lotNumberID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getExpiryDate(): ?DateTimeInterface
    {
        return $this->expiryDate;
    }

    /**
     * @param  null|DateTimeInterface $expiryDate
     * @return static
     */
    public function setExpiryDate(?DateTimeInterface $expiryDate = null): static
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpiryDate(): static
    {
        $this->expiryDate = null;

        return $this;
    }

    /**
     * @return null|array<AdditionalItemProperty>
     */
    public function getAdditionalItemProperty(): ?array
    {
        return $this->additionalItemProperty;
    }

    /**
     * @param  null|array<AdditionalItemProperty> $additionalItemProperty
     * @return static
     */
    public function setAdditionalItemProperty(?array $additionalItemProperty = null): static
    {
        $this->additionalItemProperty = $additionalItemProperty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalItemProperty(): static
    {
        $this->additionalItemProperty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalItemProperty(): static
    {
        $this->additionalItemProperty = [];

        return $this;
    }

    /**
     * @return null|AdditionalItemProperty
     */
    public function firstAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = reset($additionalItemProperty);

        if (false === $additionalItemProperty) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @return null|AdditionalItemProperty
     */
    public function lastAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = end($additionalItemProperty);

        if (false === $additionalItemProperty) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @param  AdditionalItemProperty $additionalItemProperty
     * @return static
     */
    public function addToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): static
    {
        $this->additionalItemProperty[] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return AdditionalItemProperty
     */
    public function addToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        $this->addToadditionalItemProperty($additionalItemProperty = new AdditionalItemProperty());

        return $additionalItemProperty;
    }

    /**
     * @param  AdditionalItemProperty $additionalItemProperty
     * @return static
     */
    public function addOnceToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): static
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        $this->additionalItemProperty[0] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return AdditionalItemProperty
     */
    public function addOnceToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        if ([] === $this->additionalItemProperty) {
            $this->addOnceToadditionalItemProperty(new AdditionalItemProperty());
        }

        return $this->additionalItemProperty[0];
    }
}
