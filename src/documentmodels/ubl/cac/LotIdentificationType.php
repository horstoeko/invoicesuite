<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LotNumberID;

class LotIdentificationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LotNumberID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LotNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("LotNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLotNumberID", setter="setLotNumberID")
     */
    private $lotNumberID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryDate", setter="setExpiryDate")
     */
    private $expiryDate;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalItemProperty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalItemProperty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAdditionalItemProperty", setter="setAdditionalItemProperty")
     */
    private $additionalItemProperty;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LotNumberID|null
     */
    public function getLotNumberID(): ?LotNumberID
    {
        return $this->lotNumberID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LotNumberID
     */
    public function getLotNumberIDWithCreate(): LotNumberID
    {
        $this->lotNumberID = is_null($this->lotNumberID) ? new LotNumberID() : $this->lotNumberID;

        return $this->lotNumberID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LotNumberID|null $lotNumberID
     * @return self
     */
    public function setLotNumberID(?LotNumberID $lotNumberID = null): self
    {
        $this->lotNumberID = $lotNumberID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLotNumberID(): self
    {
        $this->lotNumberID = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    /**
     * @param \DateTimeInterface|null $expiryDate
     * @return self
     */
    public function setExpiryDate(?\DateTimeInterface $expiryDate = null): self
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetExpiryDate(): self
    {
        $this->expiryDate = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>|null
     */
    public function getAdditionalItemProperty(): ?array
    {
        return $this->additionalItemProperty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty>|null $additionalItemProperty
     * @return self
     */
    public function setAdditionalItemProperty(?array $additionalItemProperty = null): self
    {
        $this->additionalItemProperty = $additionalItemProperty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalItemProperty(): self
    {
        $this->additionalItemProperty = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalItemProperty(): self
    {
        $this->additionalItemProperty = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty|null
     */
    public function firstAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = reset($additionalItemProperty);

        if ($additionalItemProperty === false) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty|null
     */
    public function lastAdditionalItemProperty(): ?AdditionalItemProperty
    {
        $additionalItemProperty = $this->additionalItemProperty ?? [];
        $additionalItemProperty = end($additionalItemProperty);

        if ($additionalItemProperty === false) {
            return null;
        }

        return $additionalItemProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty $additionalItemProperty
     * @return self
     */
    public function addToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): self
    {
        $this->additionalItemProperty[] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty
     */
    public function addToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        $this->addToadditionalItemProperty($additionalItemProperty = new AdditionalItemProperty());

        return $additionalItemProperty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty $additionalItemProperty
     * @return self
     */
    public function addOnceToAdditionalItemProperty(AdditionalItemProperty $additionalItemProperty): self
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        $this->additionalItemProperty[0] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AdditionalItemProperty
     */
    public function addOnceToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        if (!is_array($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        if ($this->additionalItemProperty === []) {
            $this->addOnceToadditionalItemProperty(new AdditionalItemProperty());
        }

        return $this->additionalItemProperty[0];
    }
}
