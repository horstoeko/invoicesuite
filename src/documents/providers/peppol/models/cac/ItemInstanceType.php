<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProductTraceID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RegistrationID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SerialID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ItemInstanceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ProductTraceID
     */
    #[JMS\Accessor(getter: 'getProductTraceID', setter: 'setProductTraceID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ProductTraceID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ProductTraceID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $productTraceID;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getManufactureDate', setter: 'setManufactureDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ManufactureDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $manufactureDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getManufactureTime', setter: 'setManufactureTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ManufactureTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $manufactureTime;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getBestBeforeDate', setter: 'setBestBeforeDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BestBeforeDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $bestBeforeDate;

    /**
     * @var null|RegistrationID
     */
    #[JMS\Accessor(getter: 'getRegistrationID', setter: 'setRegistrationID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('RegistrationID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\RegistrationID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $registrationID;

    /**
     * @var null|SerialID
     */
    #[JMS\Accessor(getter: 'getSerialID', setter: 'setSerialID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SerialID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SerialID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $serialID;

    /**
     * @var null|array<AdditionalItemProperty>
     */
    #[JMS\Accessor(getter: 'getAdditionalItemProperty', setter: 'setAdditionalItemProperty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdditionalItemProperty')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\AdditionalItemProperty>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AdditionalItemProperty', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $additionalItemProperty;

    /**
     * @var null|LotIdentification
     */
    #[JMS\Accessor(getter: 'getLotIdentification', setter: 'setLotIdentification')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LotIdentification')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LotIdentification')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $lotIdentification;

    /**
     * @return null|ProductTraceID
     */
    public function getProductTraceID(): ?ProductTraceID
    {
        return $this->productTraceID;
    }

    /**
     * @return ProductTraceID
     */
    public function getProductTraceIDWithCreate(): ProductTraceID
    {
        $this->productTraceID ??= new ProductTraceID();

        return $this->productTraceID;
    }

    /**
     * @param  null|ProductTraceID $productTraceID
     * @return static
     */
    public function setProductTraceID(
        ?ProductTraceID $productTraceID = null
    ): static {
        $this->productTraceID = $productTraceID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProductTraceID(): static
    {
        $this->productTraceID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getManufactureDate(): ?DateTimeInterface
    {
        return $this->manufactureDate;
    }

    /**
     * @param  null|DateTimeInterface $manufactureDate
     * @return static
     */
    public function setManufactureDate(
        ?DateTimeInterface $manufactureDate = null
    ): static {
        $this->manufactureDate = $manufactureDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetManufactureDate(): static
    {
        $this->manufactureDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getManufactureTime(): ?DateTimeInterface
    {
        return $this->manufactureTime;
    }

    /**
     * @param  null|DateTimeInterface $manufactureTime
     * @return static
     */
    public function setManufactureTime(
        ?DateTimeInterface $manufactureTime = null
    ): static {
        $this->manufactureTime = $manufactureTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetManufactureTime(): static
    {
        $this->manufactureTime = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getBestBeforeDate(): ?DateTimeInterface
    {
        return $this->bestBeforeDate;
    }

    /**
     * @param  null|DateTimeInterface $bestBeforeDate
     * @return static
     */
    public function setBestBeforeDate(
        ?DateTimeInterface $bestBeforeDate = null
    ): static {
        $this->bestBeforeDate = $bestBeforeDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBestBeforeDate(): static
    {
        $this->bestBeforeDate = null;

        return $this;
    }

    /**
     * @return null|RegistrationID
     */
    public function getRegistrationID(): ?RegistrationID
    {
        return $this->registrationID;
    }

    /**
     * @return RegistrationID
     */
    public function getRegistrationIDWithCreate(): RegistrationID
    {
        $this->registrationID ??= new RegistrationID();

        return $this->registrationID;
    }

    /**
     * @param  null|RegistrationID $registrationID
     * @return static
     */
    public function setRegistrationID(
        ?RegistrationID $registrationID = null
    ): static {
        $this->registrationID = $registrationID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRegistrationID(): static
    {
        $this->registrationID = null;

        return $this;
    }

    /**
     * @return null|SerialID
     */
    public function getSerialID(): ?SerialID
    {
        return $this->serialID;
    }

    /**
     * @return SerialID
     */
    public function getSerialIDWithCreate(): SerialID
    {
        $this->serialID ??= new SerialID();

        return $this->serialID;
    }

    /**
     * @param  null|SerialID $serialID
     * @return static
     */
    public function setSerialID(
        ?SerialID $serialID = null
    ): static {
        $this->serialID = $serialID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSerialID(): static
    {
        $this->serialID = null;

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
    public function setAdditionalItemProperty(
        ?array $additionalItemProperty = null
    ): static {
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
    public function addToAdditionalItemProperty(
        AdditionalItemProperty $additionalItemProperty
    ): static {
        $this->additionalItemProperty[] = $additionalItemProperty;

        return $this;
    }

    /**
     * @return AdditionalItemProperty
     */
    public function addToAdditionalItemPropertyWithCreate(): AdditionalItemProperty
    {
        $this->addToAdditionalItemProperty($additionalItemProperty = new AdditionalItemProperty());

        return $additionalItemProperty;
    }

    /**
     * @param  AdditionalItemProperty $additionalItemProperty
     * @return static
     */
    public function addOnceToAdditionalItemProperty(
        AdditionalItemProperty $additionalItemProperty
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->additionalItemProperty)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->additionalItemProperty)) {
            $this->additionalItemProperty = [];
        }

        if ([] === $this->additionalItemProperty) {
            $this->addOnceToAdditionalItemProperty(new AdditionalItemProperty());
        }

        return $this->additionalItemProperty[0];
    }

    /**
     * @return null|LotIdentification
     */
    public function getLotIdentification(): ?LotIdentification
    {
        return $this->lotIdentification;
    }

    /**
     * @return LotIdentification
     */
    public function getLotIdentificationWithCreate(): LotIdentification
    {
        $this->lotIdentification ??= new LotIdentification();

        return $this->lotIdentification;
    }

    /**
     * @param  null|LotIdentification $lotIdentification
     * @return static
     */
    public function setLotIdentification(
        ?LotIdentification $lotIdentification = null
    ): static {
        $this->lotIdentification = $lotIdentification;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLotIdentification(): static
    {
        $this->lotIdentification = null;

        return $this;
    }
}
