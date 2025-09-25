<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveredQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethod;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethodCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingType as MeterReadingType1;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterQuantity;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethod;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethodCode;

class MeterReadingType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingType|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingType")
     * @JMS\Expose
     * @JMS\SerializedName("MeterReadingType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterReadingType", setter="setMeterReadingType")
     */
    private $meterReadingType;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MeterReadingTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterReadingTypeCode", setter="setMeterReadingTypeCode")
     */
    private $meterReadingTypeCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterReadingDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterReadingDate", setter="setPreviousMeterReadingDate")
     */
    private $previousMeterReadingDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterQuantity", setter="setPreviousMeterQuantity")
     */
    private $previousMeterQuantity;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterReadingDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterReadingDate", setter="setLatestMeterReadingDate")
     */
    private $latestMeterReadingDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterQuantity", setter="setLatestMeterQuantity")
     */
    private $latestMeterQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethod")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterReadingMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterReadingMethod", setter="setPreviousMeterReadingMethod")
     */
    private $previousMeterReadingMethod;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethodCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterReadingMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterReadingMethodCode", setter="setPreviousMeterReadingMethodCode")
     */
    private $previousMeterReadingMethodCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethod")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterReadingMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterReadingMethod", setter="setLatestMeterReadingMethod")
     */
    private $latestMeterReadingMethod;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethodCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterReadingMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterReadingMethodCode", setter="setLatestMeterReadingMethodCode")
     */
    private $latestMeterReadingMethodCode;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments>")
     * @JMS\Expose
     * @JMS\SerializedName("MeterReadingComments")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeterReadingComments", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getMeterReadingComments", setter="setMeterReadingComments")
     */
    private $meterReadingComments;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveredQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveredQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveredQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveredQuantity", setter="setDeliveredQuantity")
     */
    private $deliveredQuantity;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingType|null
     */
    public function getMeterReadingType(): ?MeterReadingType1
    {
        return $this->meterReadingType;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingType
     */
    public function getMeterReadingTypeWithCreate(): MeterReadingType1
    {
        $this->meterReadingType = is_null($this->meterReadingType) ? new MeterReadingType() : $this->meterReadingType;

        return $this->meterReadingType;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingType|null $meterReadingType
     * @return self
     */
    public function setMeterReadingType(?MeterReadingType1 $meterReadingType = null): self
    {
        $this->meterReadingType = $meterReadingType;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterReadingType(): self
    {
        $this->meterReadingType = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingTypeCode|null
     */
    public function getMeterReadingTypeCode(): ?MeterReadingTypeCode
    {
        return $this->meterReadingTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingTypeCode
     */
    public function getMeterReadingTypeCodeWithCreate(): MeterReadingTypeCode
    {
        $this->meterReadingTypeCode = is_null($this->meterReadingTypeCode) ? new MeterReadingTypeCode() : $this->meterReadingTypeCode;

        return $this->meterReadingTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingTypeCode|null $meterReadingTypeCode
     * @return self
     */
    public function setMeterReadingTypeCode(?MeterReadingTypeCode $meterReadingTypeCode = null): self
    {
        $this->meterReadingTypeCode = $meterReadingTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterReadingTypeCode(): self
    {
        $this->meterReadingTypeCode = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPreviousMeterReadingDate(): ?\DateTimeInterface
    {
        return $this->previousMeterReadingDate;
    }

    /**
     * @param \DateTimeInterface|null $previousMeterReadingDate
     * @return self
     */
    public function setPreviousMeterReadingDate(?\DateTimeInterface $previousMeterReadingDate = null): self
    {
        $this->previousMeterReadingDate = $previousMeterReadingDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPreviousMeterReadingDate(): self
    {
        $this->previousMeterReadingDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterQuantity|null
     */
    public function getPreviousMeterQuantity(): ?PreviousMeterQuantity
    {
        return $this->previousMeterQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterQuantity
     */
    public function getPreviousMeterQuantityWithCreate(): PreviousMeterQuantity
    {
        $this->previousMeterQuantity = is_null($this->previousMeterQuantity) ? new PreviousMeterQuantity() : $this->previousMeterQuantity;

        return $this->previousMeterQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterQuantity|null $previousMeterQuantity
     * @return self
     */
    public function setPreviousMeterQuantity(?PreviousMeterQuantity $previousMeterQuantity = null): self
    {
        $this->previousMeterQuantity = $previousMeterQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPreviousMeterQuantity(): self
    {
        $this->previousMeterQuantity = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getLatestMeterReadingDate(): ?\DateTimeInterface
    {
        return $this->latestMeterReadingDate;
    }

    /**
     * @param \DateTimeInterface|null $latestMeterReadingDate
     * @return self
     */
    public function setLatestMeterReadingDate(?\DateTimeInterface $latestMeterReadingDate = null): self
    {
        $this->latestMeterReadingDate = $latestMeterReadingDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLatestMeterReadingDate(): self
    {
        $this->latestMeterReadingDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterQuantity|null
     */
    public function getLatestMeterQuantity(): ?LatestMeterQuantity
    {
        return $this->latestMeterQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterQuantity
     */
    public function getLatestMeterQuantityWithCreate(): LatestMeterQuantity
    {
        $this->latestMeterQuantity = is_null($this->latestMeterQuantity) ? new LatestMeterQuantity() : $this->latestMeterQuantity;

        return $this->latestMeterQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterQuantity|null $latestMeterQuantity
     * @return self
     */
    public function setLatestMeterQuantity(?LatestMeterQuantity $latestMeterQuantity = null): self
    {
        $this->latestMeterQuantity = $latestMeterQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLatestMeterQuantity(): self
    {
        $this->latestMeterQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethod|null
     */
    public function getPreviousMeterReadingMethod(): ?PreviousMeterReadingMethod
    {
        return $this->previousMeterReadingMethod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethod
     */
    public function getPreviousMeterReadingMethodWithCreate(): PreviousMeterReadingMethod
    {
        $this->previousMeterReadingMethod = is_null($this->previousMeterReadingMethod) ? new PreviousMeterReadingMethod() : $this->previousMeterReadingMethod;

        return $this->previousMeterReadingMethod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethod|null $previousMeterReadingMethod
     * @return self
     */
    public function setPreviousMeterReadingMethod(
        ?PreviousMeterReadingMethod $previousMeterReadingMethod = null,
    ): self {
        $this->previousMeterReadingMethod = $previousMeterReadingMethod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPreviousMeterReadingMethod(): self
    {
        $this->previousMeterReadingMethod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethodCode|null
     */
    public function getPreviousMeterReadingMethodCode(): ?PreviousMeterReadingMethodCode
    {
        return $this->previousMeterReadingMethodCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethodCode
     */
    public function getPreviousMeterReadingMethodCodeWithCreate(): PreviousMeterReadingMethodCode
    {
        $this->previousMeterReadingMethodCode = is_null($this->previousMeterReadingMethodCode) ? new PreviousMeterReadingMethodCode() : $this->previousMeterReadingMethodCode;

        return $this->previousMeterReadingMethodCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PreviousMeterReadingMethodCode|null $previousMeterReadingMethodCode
     * @return self
     */
    public function setPreviousMeterReadingMethodCode(
        ?PreviousMeterReadingMethodCode $previousMeterReadingMethodCode = null,
    ): self {
        $this->previousMeterReadingMethodCode = $previousMeterReadingMethodCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPreviousMeterReadingMethodCode(): self
    {
        $this->previousMeterReadingMethodCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethod|null
     */
    public function getLatestMeterReadingMethod(): ?LatestMeterReadingMethod
    {
        return $this->latestMeterReadingMethod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethod
     */
    public function getLatestMeterReadingMethodWithCreate(): LatestMeterReadingMethod
    {
        $this->latestMeterReadingMethod = is_null($this->latestMeterReadingMethod) ? new LatestMeterReadingMethod() : $this->latestMeterReadingMethod;

        return $this->latestMeterReadingMethod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethod|null $latestMeterReadingMethod
     * @return self
     */
    public function setLatestMeterReadingMethod(?LatestMeterReadingMethod $latestMeterReadingMethod = null): self
    {
        $this->latestMeterReadingMethod = $latestMeterReadingMethod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLatestMeterReadingMethod(): self
    {
        $this->latestMeterReadingMethod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethodCode|null
     */
    public function getLatestMeterReadingMethodCode(): ?LatestMeterReadingMethodCode
    {
        return $this->latestMeterReadingMethodCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethodCode
     */
    public function getLatestMeterReadingMethodCodeWithCreate(): LatestMeterReadingMethodCode
    {
        $this->latestMeterReadingMethodCode = is_null($this->latestMeterReadingMethodCode) ? new LatestMeterReadingMethodCode() : $this->latestMeterReadingMethodCode;

        return $this->latestMeterReadingMethodCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LatestMeterReadingMethodCode|null $latestMeterReadingMethodCode
     * @return self
     */
    public function setLatestMeterReadingMethodCode(
        ?LatestMeterReadingMethodCode $latestMeterReadingMethodCode = null,
    ): self {
        $this->latestMeterReadingMethodCode = $latestMeterReadingMethodCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLatestMeterReadingMethodCode(): self
    {
        $this->latestMeterReadingMethodCode = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments>|null
     */
    public function getMeterReadingComments(): ?array
    {
        return $this->meterReadingComments;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments>|null $meterReadingComments
     * @return self
     */
    public function setMeterReadingComments(?array $meterReadingComments = null): self
    {
        $this->meterReadingComments = $meterReadingComments;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMeterReadingComments(): self
    {
        $this->meterReadingComments = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearMeterReadingComments(): self
    {
        $this->meterReadingComments = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments|null
     */
    public function firstMeterReadingComments(): ?MeterReadingComments
    {
        $meterReadingComments = $this->meterReadingComments ?? [];
        $meterReadingComments = reset($meterReadingComments);

        if ($meterReadingComments === false) {
            return null;
        }

        return $meterReadingComments;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments|null
     */
    public function lastMeterReadingComments(): ?MeterReadingComments
    {
        $meterReadingComments = $this->meterReadingComments ?? [];
        $meterReadingComments = end($meterReadingComments);

        if ($meterReadingComments === false) {
            return null;
        }

        return $meterReadingComments;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments $meterReadingComments
     * @return self
     */
    public function addToMeterReadingComments(MeterReadingComments $meterReadingComments): self
    {
        $this->meterReadingComments[] = $meterReadingComments;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments
     */
    public function addToMeterReadingCommentsWithCreate(): MeterReadingComments
    {
        $this->addTometerReadingComments($meterReadingComments = new MeterReadingComments());

        return $meterReadingComments;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments $meterReadingComments
     * @return self
     */
    public function addOnceToMeterReadingComments(MeterReadingComments $meterReadingComments): self
    {
        if (!is_array($this->meterReadingComments)) {
            $this->meterReadingComments = [];
        }

        $this->meterReadingComments[0] = $meterReadingComments;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MeterReadingComments
     */
    public function addOnceToMeterReadingCommentsWithCreate(): MeterReadingComments
    {
        if (!is_array($this->meterReadingComments)) {
            $this->meterReadingComments = [];
        }

        if ($this->meterReadingComments === []) {
            $this->addOnceTometerReadingComments(new MeterReadingComments());
        }

        return $this->meterReadingComments[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveredQuantity|null
     */
    public function getDeliveredQuantity(): ?DeliveredQuantity
    {
        return $this->deliveredQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveredQuantity
     */
    public function getDeliveredQuantityWithCreate(): DeliveredQuantity
    {
        $this->deliveredQuantity = is_null($this->deliveredQuantity) ? new DeliveredQuantity() : $this->deliveredQuantity;

        return $this->deliveredQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\DeliveredQuantity|null $deliveredQuantity
     * @return self
     */
    public function setDeliveredQuantity(?DeliveredQuantity $deliveredQuantity = null): self
    {
        $this->deliveredQuantity = $deliveredQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDeliveredQuantity(): self
    {
        $this->deliveredQuantity = null;

        return $this;
    }
}
