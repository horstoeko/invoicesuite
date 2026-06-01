<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeliveredQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatestMeterQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatestMeterReadingMethod;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatestMeterReadingMethodCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterReadingComments;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterReadingType as MeterReadingType1;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterReadingTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousMeterQuantity;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousMeterReadingMethod;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousMeterReadingMethodCode;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class MeterReadingType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|MeterReadingType1
     */
    #[JMS\Accessor(getter: 'getMeterReadingType', setter: 'setMeterReadingType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterReadingType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterReadingType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $meterReadingType;

    /**
     * @var null|MeterReadingTypeCode
     */
    #[JMS\Accessor(getter: 'getMeterReadingTypeCode', setter: 'setMeterReadingTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterReadingTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterReadingTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $meterReadingTypeCode;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getPreviousMeterReadingDate', setter: 'setPreviousMeterReadingDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreviousMeterReadingDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $previousMeterReadingDate;

    /**
     * @var null|PreviousMeterQuantity
     */
    #[JMS\Accessor(getter: 'getPreviousMeterQuantity', setter: 'setPreviousMeterQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreviousMeterQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousMeterQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $previousMeterQuantity;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getLatestMeterReadingDate', setter: 'setLatestMeterReadingDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatestMeterReadingDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latestMeterReadingDate;

    /**
     * @var null|LatestMeterQuantity
     */
    #[JMS\Accessor(getter: 'getLatestMeterQuantity', setter: 'setLatestMeterQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatestMeterQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatestMeterQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latestMeterQuantity;

    /**
     * @var null|PreviousMeterReadingMethod
     */
    #[JMS\Accessor(getter: 'getPreviousMeterReadingMethod', setter: 'setPreviousMeterReadingMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreviousMeterReadingMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousMeterReadingMethod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $previousMeterReadingMethod;

    /**
     * @var null|PreviousMeterReadingMethodCode
     */
    #[JMS\Accessor(getter: 'getPreviousMeterReadingMethodCode', setter: 'setPreviousMeterReadingMethodCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreviousMeterReadingMethodCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PreviousMeterReadingMethodCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $previousMeterReadingMethodCode;

    /**
     * @var null|LatestMeterReadingMethod
     */
    #[JMS\Accessor(getter: 'getLatestMeterReadingMethod', setter: 'setLatestMeterReadingMethod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatestMeterReadingMethod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatestMeterReadingMethod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latestMeterReadingMethod;

    /**
     * @var null|LatestMeterReadingMethodCode
     */
    #[JMS\Accessor(getter: 'getLatestMeterReadingMethodCode', setter: 'setLatestMeterReadingMethodCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LatestMeterReadingMethodCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\LatestMeterReadingMethodCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $latestMeterReadingMethodCode;

    /**
     * @var null|array<MeterReadingComments>
     */
    #[JMS\Accessor(getter: 'getMeterReadingComments', setter: 'setMeterReadingComments')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MeterReadingComments')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MeterReadingComments>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'MeterReadingComments', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $meterReadingComments;

    /**
     * @var null|DeliveredQuantity
     */
    #[JMS\Accessor(getter: 'getDeliveredQuantity', setter: 'setDeliveredQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveredQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DeliveredQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
        $this->meterReadingType ??= new MeterReadingType1();

        return $this->meterReadingType;
    }

    /**
     * @param  null|MeterReadingType1 $meterReadingType
     * @return static
     */
    public function setMeterReadingType(
        ?MeterReadingType1 $meterReadingType = null
    ): static {
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
        $this->meterReadingTypeCode ??= new MeterReadingTypeCode();

        return $this->meterReadingTypeCode;
    }

    /**
     * @param  null|MeterReadingTypeCode $meterReadingTypeCode
     * @return static
     */
    public function setMeterReadingTypeCode(
        ?MeterReadingTypeCode $meterReadingTypeCode = null
    ): static {
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
    public function setPreviousMeterReadingDate(
        ?DateTimeInterface $previousMeterReadingDate = null
    ): static {
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
        $this->previousMeterQuantity ??= new PreviousMeterQuantity();

        return $this->previousMeterQuantity;
    }

    /**
     * @param  null|PreviousMeterQuantity $previousMeterQuantity
     * @return static
     */
    public function setPreviousMeterQuantity(
        ?PreviousMeterQuantity $previousMeterQuantity = null
    ): static {
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
    public function setLatestMeterReadingDate(
        ?DateTimeInterface $latestMeterReadingDate = null
    ): static {
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
        $this->latestMeterQuantity ??= new LatestMeterQuantity();

        return $this->latestMeterQuantity;
    }

    /**
     * @param  null|LatestMeterQuantity $latestMeterQuantity
     * @return static
     */
    public function setLatestMeterQuantity(
        ?LatestMeterQuantity $latestMeterQuantity = null
    ): static {
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
        $this->previousMeterReadingMethod ??= new PreviousMeterReadingMethod();

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
        $this->previousMeterReadingMethodCode ??= new PreviousMeterReadingMethodCode();

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
        $this->latestMeterReadingMethod ??= new LatestMeterReadingMethod();

        return $this->latestMeterReadingMethod;
    }

    /**
     * @param  null|LatestMeterReadingMethod $latestMeterReadingMethod
     * @return static
     */
    public function setLatestMeterReadingMethod(
        ?LatestMeterReadingMethod $latestMeterReadingMethod = null
    ): static {
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
        $this->latestMeterReadingMethodCode ??= new LatestMeterReadingMethodCode();

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
    public function setMeterReadingComments(
        ?array $meterReadingComments = null
    ): static {
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
    public function addToMeterReadingComments(
        MeterReadingComments $meterReadingComments
    ): static {
        $this->meterReadingComments[] = $meterReadingComments;

        return $this;
    }

    /**
     * @return MeterReadingComments
     */
    public function addToMeterReadingCommentsWithCreate(): MeterReadingComments
    {
        $this->addToMeterReadingComments($meterReadingComments = new MeterReadingComments());

        return $meterReadingComments;
    }

    /**
     * @param  MeterReadingComments $meterReadingComments
     * @return static
     */
    public function addOnceToMeterReadingComments(
        MeterReadingComments $meterReadingComments
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->meterReadingComments)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->meterReadingComments)) {
            $this->meterReadingComments = [];
        }

        if ([] === $this->meterReadingComments) {
            $this->addOnceToMeterReadingComments(new MeterReadingComments());
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
        $this->deliveredQuantity ??= new DeliveredQuantity();

        return $this->deliveredQuantity;
    }

    /**
     * @param  null|DeliveredQuantity $deliveredQuantity
     * @return static
     */
    public function setDeliveredQuantity(
        ?DeliveredQuantity $deliveredQuantity = null
    ): static {
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
