<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ProductTraceID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\RegistrationID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SerialID;

class ItemInstanceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProductTraceID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ProductTraceID")
     * @JMS\Expose
     * @JMS\SerializedName("ProductTraceID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProductTraceID", setter="setProductTraceID")
     */
    private $productTraceID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ManufactureDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getManufactureDate", setter="setManufactureDate")
     */
    private $manufactureDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("ManufactureTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getManufactureTime", setter="setManufactureTime")
     */
    private $manufactureTime;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("BestBeforeDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBestBeforeDate", setter="setBestBeforeDate")
     */
    private $bestBeforeDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\RegistrationID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\RegistrationID")
     * @JMS\Expose
     * @JMS\SerializedName("RegistrationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRegistrationID", setter="setRegistrationID")
     */
    private $registrationID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\SerialID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\SerialID")
     * @JMS\Expose
     * @JMS\SerializedName("SerialID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSerialID", setter="setSerialID")
     */
    private $serialID;

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
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\LotIdentification|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\LotIdentification")
     * @JMS\Expose
     * @JMS\SerializedName("LotIdentification")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLotIdentification", setter="setLotIdentification")
     */
    private $lotIdentification;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProductTraceID|null
     */
    public function getProductTraceID(): ?ProductTraceID
    {
        return $this->productTraceID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProductTraceID
     */
    public function getProductTraceIDWithCreate(): ProductTraceID
    {
        $this->productTraceID = is_null($this->productTraceID) ? new ProductTraceID() : $this->productTraceID;

        return $this->productTraceID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ProductTraceID|null $productTraceID
     * @return self
     */
    public function setProductTraceID(?ProductTraceID $productTraceID = null): self
    {
        $this->productTraceID = $productTraceID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProductTraceID(): self
    {
        $this->productTraceID = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getManufactureDate(): ?\DateTimeInterface
    {
        return $this->manufactureDate;
    }

    /**
     * @param \DateTimeInterface|null $manufactureDate
     * @return self
     */
    public function setManufactureDate(?\DateTimeInterface $manufactureDate = null): self
    {
        $this->manufactureDate = $manufactureDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetManufactureDate(): self
    {
        $this->manufactureDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getManufactureTime(): ?\DateTimeInterface
    {
        return $this->manufactureTime;
    }

    /**
     * @param \DateTimeInterface|null $manufactureTime
     * @return self
     */
    public function setManufactureTime(?\DateTimeInterface $manufactureTime = null): self
    {
        $this->manufactureTime = $manufactureTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetManufactureTime(): self
    {
        $this->manufactureTime = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getBestBeforeDate(): ?\DateTimeInterface
    {
        return $this->bestBeforeDate;
    }

    /**
     * @param \DateTimeInterface|null $bestBeforeDate
     * @return self
     */
    public function setBestBeforeDate(?\DateTimeInterface $bestBeforeDate = null): self
    {
        $this->bestBeforeDate = $bestBeforeDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBestBeforeDate(): self
    {
        $this->bestBeforeDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RegistrationID|null
     */
    public function getRegistrationID(): ?RegistrationID
    {
        return $this->registrationID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\RegistrationID
     */
    public function getRegistrationIDWithCreate(): RegistrationID
    {
        $this->registrationID = is_null($this->registrationID) ? new RegistrationID() : $this->registrationID;

        return $this->registrationID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\RegistrationID|null $registrationID
     * @return self
     */
    public function setRegistrationID(?RegistrationID $registrationID = null): self
    {
        $this->registrationID = $registrationID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetRegistrationID(): self
    {
        $this->registrationID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SerialID|null
     */
    public function getSerialID(): ?SerialID
    {
        return $this->serialID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SerialID
     */
    public function getSerialIDWithCreate(): SerialID
    {
        $this->serialID = is_null($this->serialID) ? new SerialID() : $this->serialID;

        return $this->serialID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SerialID|null $serialID
     * @return self
     */
    public function setSerialID(?SerialID $serialID = null): self
    {
        $this->serialID = $serialID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSerialID(): self
    {
        $this->serialID = null;

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

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LotIdentification|null
     */
    public function getLotIdentification(): ?LotIdentification
    {
        return $this->lotIdentification;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LotIdentification
     */
    public function getLotIdentificationWithCreate(): LotIdentification
    {
        $this->lotIdentification = is_null($this->lotIdentification) ? new LotIdentification() : $this->lotIdentification;

        return $this->lotIdentification;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\LotIdentification|null $lotIdentification
     * @return self
     */
    public function setLotIdentification(?LotIdentification $lotIdentification = null): self
    {
        $this->lotIdentification = $lotIdentification;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLotIdentification(): self
    {
        $this->lotIdentification = null;

        return $this;
    }
}
