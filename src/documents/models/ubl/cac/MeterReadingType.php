<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\DeliveredQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LatestMeterQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LatestMeterReadingMethod;
use horstoeko\invoicesuite\documents\models\ubl\cbc\LatestMeterReadingMethodCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MeterReadingComments;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MeterReadingType as MeterReadingType1;
use horstoeko\invoicesuite\documents\models\ubl\cbc\MeterReadingTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PreviousMeterQuantity;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PreviousMeterReadingMethod;
use horstoeko\invoicesuite\documents\models\ubl\cbc\PreviousMeterReadingMethodCode;
use JMS\Serializer\Annotation as JMS;

class MeterReadingType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|MeterReadingType1
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MeterReadingType")
     * @JMS\Expose
     * @JMS\SerializedName("MeterReadingType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterReadingType", setter="setMeterReadingType")
     */
    private $meterReadingType;

    /**
     * @var null|MeterReadingTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\MeterReadingTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("MeterReadingTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMeterReadingTypeCode", setter="setMeterReadingTypeCode")
     */
    private $meterReadingTypeCode;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterReadingDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterReadingDate", setter="setPreviousMeterReadingDate")
     */
    private $previousMeterReadingDate;

    /**
     * @var null|PreviousMeterQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PreviousMeterQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterQuantity", setter="setPreviousMeterQuantity")
     */
    private $previousMeterQuantity;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterReadingDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterReadingDate", setter="setLatestMeterReadingDate")
     */
    private $latestMeterReadingDate;

    /**
     * @var null|LatestMeterQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LatestMeterQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterQuantity", setter="setLatestMeterQuantity")
     */
    private $latestMeterQuantity;

    /**
     * @var null|PreviousMeterReadingMethod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PreviousMeterReadingMethod")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterReadingMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterReadingMethod", setter="setPreviousMeterReadingMethod")
     */
    private $previousMeterReadingMethod;

    /**
     * @var null|PreviousMeterReadingMethodCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\PreviousMeterReadingMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("PreviousMeterReadingMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreviousMeterReadingMethodCode", setter="setPreviousMeterReadingMethodCode")
     */
    private $previousMeterReadingMethodCode;

    /**
     * @var null|LatestMeterReadingMethod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LatestMeterReadingMethod")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterReadingMethod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterReadingMethod", setter="setLatestMeterReadingMethod")
     */
    private $latestMeterReadingMethod;

    /**
     * @var null|LatestMeterReadingMethodCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\LatestMeterReadingMethodCode")
     * @JMS\Expose
     * @JMS\SerializedName("LatestMeterReadingMethodCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLatestMeterReadingMethodCode", setter="setLatestMeterReadingMethodCode")
     */
    private $latestMeterReadingMethodCode;

    /**
     * @var null|array<MeterReadingComments>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\MeterReadingComments>")
     * @JMS\Expose
     * @JMS\SerializedName("MeterReadingComments")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="MeterReadingComments", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getMeterReadingComments", setter="setMeterReadingComments")
     */
    private $meterReadingComments;

    /**
     * @var null|DeliveredQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\DeliveredQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveredQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveredQuantity", setter="setDeliveredQuantity")
     */
    private $deliveredQuantity;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|MeterReadingType1
     */
    public function getMeterReadingType(): ?MeterReadingType1
    {
        return $this->meterReadingType;
    }

    /**
     * @return MeterReadingType1
     */
    public function getMeterReadingTypeWithCreate(): MeterReadingType1
    {
        $this->meterReadingType = is_null($this->meterReadingType) ? new MeterReadingType1() : $this->meterReadingType;

        return $this->meterReadingType;
    }

    /**
     * @param  null|MeterReadingType1 $meterReadingType
     * @return static
     */
    public function setMeterReadingType(?MeterReadingType1 $meterReadingType = null): static
    {
        $this->meterReadingType = $meterReadingType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterReadingType(): static
    {
        $this->meterReadingType = null;

        return $this;
    }

    /**
     * @return null|MeterReadingTypeCode
     */
    public function getMeterReadingTypeCode(): ?MeterReadingTypeCode
    {
        return $this->meterReadingTypeCode;
    }

    /**
     * @return MeterReadingTypeCode
     */
    public function getMeterReadingTypeCodeWithCreate(): MeterReadingTypeCode
    {
        $this->meterReadingTypeCode = is_null($this->meterReadingTypeCode) ? new MeterReadingTypeCode() : $this->meterReadingTypeCode;

        return $this->meterReadingTypeCode;
    }

    /**
     * @param  null|MeterReadingTypeCode $meterReadingTypeCode
     * @return static
     */
    public function setMeterReadingTypeCode(?MeterReadingTypeCode $meterReadingTypeCode = null): static
    {
        $this->meterReadingTypeCode = $meterReadingTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterReadingTypeCode(): static
    {
        $this->meterReadingTypeCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getPreviousMeterReadingDate(): ?DateTimeInterface
    {
        return $this->previousMeterReadingDate;
    }

    /**
     * @param  null|DateTimeInterface $previousMeterReadingDate
     * @return static
     */
    public function setPreviousMeterReadingDate(?DateTimeInterface $previousMeterReadingDate = null): static
    {
        $this->previousMeterReadingDate = $previousMeterReadingDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreviousMeterReadingDate(): static
    {
        $this->previousMeterReadingDate = null;

        return $this;
    }

    /**
     * @return null|PreviousMeterQuantity
     */
    public function getPreviousMeterQuantity(): ?PreviousMeterQuantity
    {
        return $this->previousMeterQuantity;
    }

    /**
     * @return PreviousMeterQuantity
     */
    public function getPreviousMeterQuantityWithCreate(): PreviousMeterQuantity
    {
        $this->previousMeterQuantity = is_null($this->previousMeterQuantity) ? new PreviousMeterQuantity() : $this->previousMeterQuantity;

        return $this->previousMeterQuantity;
    }

    /**
     * @param  null|PreviousMeterQuantity $previousMeterQuantity
     * @return static
     */
    public function setPreviousMeterQuantity(?PreviousMeterQuantity $previousMeterQuantity = null): static
    {
        $this->previousMeterQuantity = $previousMeterQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreviousMeterQuantity(): static
    {
        $this->previousMeterQuantity = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getLatestMeterReadingDate(): ?DateTimeInterface
    {
        return $this->latestMeterReadingDate;
    }

    /**
     * @param  null|DateTimeInterface $latestMeterReadingDate
     * @return static
     */
    public function setLatestMeterReadingDate(?DateTimeInterface $latestMeterReadingDate = null): static
    {
        $this->latestMeterReadingDate = $latestMeterReadingDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestMeterReadingDate(): static
    {
        $this->latestMeterReadingDate = null;

        return $this;
    }

    /**
     * @return null|LatestMeterQuantity
     */
    public function getLatestMeterQuantity(): ?LatestMeterQuantity
    {
        return $this->latestMeterQuantity;
    }

    /**
     * @return LatestMeterQuantity
     */
    public function getLatestMeterQuantityWithCreate(): LatestMeterQuantity
    {
        $this->latestMeterQuantity = is_null($this->latestMeterQuantity) ? new LatestMeterQuantity() : $this->latestMeterQuantity;

        return $this->latestMeterQuantity;
    }

    /**
     * @param  null|LatestMeterQuantity $latestMeterQuantity
     * @return static
     */
    public function setLatestMeterQuantity(?LatestMeterQuantity $latestMeterQuantity = null): static
    {
        $this->latestMeterQuantity = $latestMeterQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestMeterQuantity(): static
    {
        $this->latestMeterQuantity = null;

        return $this;
    }

    /**
     * @return null|PreviousMeterReadingMethod
     */
    public function getPreviousMeterReadingMethod(): ?PreviousMeterReadingMethod
    {
        return $this->previousMeterReadingMethod;
    }

    /**
     * @return PreviousMeterReadingMethod
     */
    public function getPreviousMeterReadingMethodWithCreate(): PreviousMeterReadingMethod
    {
        $this->previousMeterReadingMethod = is_null($this->previousMeterReadingMethod) ? new PreviousMeterReadingMethod() : $this->previousMeterReadingMethod;

        return $this->previousMeterReadingMethod;
    }

    /**
     * @param  null|PreviousMeterReadingMethod $previousMeterReadingMethod
     * @return static
     */
    public function setPreviousMeterReadingMethod(
        ?PreviousMeterReadingMethod $previousMeterReadingMethod = null,
    ): static {
        $this->previousMeterReadingMethod = $previousMeterReadingMethod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreviousMeterReadingMethod(): static
    {
        $this->previousMeterReadingMethod = null;

        return $this;
    }

    /**
     * @return null|PreviousMeterReadingMethodCode
     */
    public function getPreviousMeterReadingMethodCode(): ?PreviousMeterReadingMethodCode
    {
        return $this->previousMeterReadingMethodCode;
    }

    /**
     * @return PreviousMeterReadingMethodCode
     */
    public function getPreviousMeterReadingMethodCodeWithCreate(): PreviousMeterReadingMethodCode
    {
        $this->previousMeterReadingMethodCode = is_null($this->previousMeterReadingMethodCode) ? new PreviousMeterReadingMethodCode() : $this->previousMeterReadingMethodCode;

        return $this->previousMeterReadingMethodCode;
    }

    /**
     * @param  null|PreviousMeterReadingMethodCode $previousMeterReadingMethodCode
     * @return static
     */
    public function setPreviousMeterReadingMethodCode(
        ?PreviousMeterReadingMethodCode $previousMeterReadingMethodCode = null,
    ): static {
        $this->previousMeterReadingMethodCode = $previousMeterReadingMethodCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreviousMeterReadingMethodCode(): static
    {
        $this->previousMeterReadingMethodCode = null;

        return $this;
    }

    /**
     * @return null|LatestMeterReadingMethod
     */
    public function getLatestMeterReadingMethod(): ?LatestMeterReadingMethod
    {
        return $this->latestMeterReadingMethod;
    }

    /**
     * @return LatestMeterReadingMethod
     */
    public function getLatestMeterReadingMethodWithCreate(): LatestMeterReadingMethod
    {
        $this->latestMeterReadingMethod = is_null($this->latestMeterReadingMethod) ? new LatestMeterReadingMethod() : $this->latestMeterReadingMethod;

        return $this->latestMeterReadingMethod;
    }

    /**
     * @param  null|LatestMeterReadingMethod $latestMeterReadingMethod
     * @return static
     */
    public function setLatestMeterReadingMethod(?LatestMeterReadingMethod $latestMeterReadingMethod = null): static
    {
        $this->latestMeterReadingMethod = $latestMeterReadingMethod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestMeterReadingMethod(): static
    {
        $this->latestMeterReadingMethod = null;

        return $this;
    }

    /**
     * @return null|LatestMeterReadingMethodCode
     */
    public function getLatestMeterReadingMethodCode(): ?LatestMeterReadingMethodCode
    {
        return $this->latestMeterReadingMethodCode;
    }

    /**
     * @return LatestMeterReadingMethodCode
     */
    public function getLatestMeterReadingMethodCodeWithCreate(): LatestMeterReadingMethodCode
    {
        $this->latestMeterReadingMethodCode = is_null($this->latestMeterReadingMethodCode) ? new LatestMeterReadingMethodCode() : $this->latestMeterReadingMethodCode;

        return $this->latestMeterReadingMethodCode;
    }

    /**
     * @param  null|LatestMeterReadingMethodCode $latestMeterReadingMethodCode
     * @return static
     */
    public function setLatestMeterReadingMethodCode(
        ?LatestMeterReadingMethodCode $latestMeterReadingMethodCode = null,
    ): static {
        $this->latestMeterReadingMethodCode = $latestMeterReadingMethodCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLatestMeterReadingMethodCode(): static
    {
        $this->latestMeterReadingMethodCode = null;

        return $this;
    }

    /**
     * @return null|array<MeterReadingComments>
     */
    public function getMeterReadingComments(): ?array
    {
        return $this->meterReadingComments;
    }

    /**
     * @param  null|array<MeterReadingComments> $meterReadingComments
     * @return static
     */
    public function setMeterReadingComments(?array $meterReadingComments = null): static
    {
        $this->meterReadingComments = $meterReadingComments;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMeterReadingComments(): static
    {
        $this->meterReadingComments = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearMeterReadingComments(): static
    {
        $this->meterReadingComments = [];

        return $this;
    }

    /**
     * @return null|MeterReadingComments
     */
    public function firstMeterReadingComments(): ?MeterReadingComments
    {
        $meterReadingComments = $this->meterReadingComments ?? [];
        $meterReadingComments = reset($meterReadingComments);

        if (false === $meterReadingComments) {
            return null;
        }

        return $meterReadingComments;
    }

    /**
     * @return null|MeterReadingComments
     */
    public function lastMeterReadingComments(): ?MeterReadingComments
    {
        $meterReadingComments = $this->meterReadingComments ?? [];
        $meterReadingComments = end($meterReadingComments);

        if (false === $meterReadingComments) {
            return null;
        }

        return $meterReadingComments;
    }

    /**
     * @param  MeterReadingComments $meterReadingComments
     * @return static
     */
    public function addToMeterReadingComments(MeterReadingComments $meterReadingComments): static
    {
        $this->meterReadingComments[] = $meterReadingComments;

        return $this;
    }

    /**
     * @return MeterReadingComments
     */
    public function addToMeterReadingCommentsWithCreate(): MeterReadingComments
    {
        $this->addTometerReadingComments($meterReadingComments = new MeterReadingComments());

        return $meterReadingComments;
    }

    /**
     * @param  MeterReadingComments $meterReadingComments
     * @return static
     */
    public function addOnceToMeterReadingComments(MeterReadingComments $meterReadingComments): static
    {
        if (!is_array($this->meterReadingComments)) {
            $this->meterReadingComments = [];
        }

        $this->meterReadingComments[0] = $meterReadingComments;

        return $this;
    }

    /**
     * @return MeterReadingComments
     */
    public function addOnceToMeterReadingCommentsWithCreate(): MeterReadingComments
    {
        if (!is_array($this->meterReadingComments)) {
            $this->meterReadingComments = [];
        }

        if ([] === $this->meterReadingComments) {
            $this->addOnceTometerReadingComments(new MeterReadingComments());
        }

        return $this->meterReadingComments[0];
    }

    /**
     * @return null|DeliveredQuantity
     */
    public function getDeliveredQuantity(): ?DeliveredQuantity
    {
        return $this->deliveredQuantity;
    }

    /**
     * @return DeliveredQuantity
     */
    public function getDeliveredQuantityWithCreate(): DeliveredQuantity
    {
        $this->deliveredQuantity = is_null($this->deliveredQuantity) ? new DeliveredQuantity() : $this->deliveredQuantity;

        return $this->deliveredQuantity;
    }

    /**
     * @param  null|DeliveredQuantity $deliveredQuantity
     * @return static
     */
    public function setDeliveredQuantity(?DeliveredQuantity $deliveredQuantity = null): static
    {
        $this->deliveredQuantity = $deliveredQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveredQuantity(): static
    {
        $this->deliveredQuantity = null;

        return $this;
    }
}
