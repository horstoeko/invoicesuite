<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomerReference;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SalesOrderID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class OrderReferenceType
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
     * @var null|SalesOrderID
     */
    #[JMS\Accessor(getter: 'getSalesOrderID', setter: 'setSalesOrderID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SalesOrderID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SalesOrderID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $salesOrderID;

    /**
     * @var null|bool
     */
    #[JMS\Accessor(getter: 'getCopyIndicator', setter: 'setCopyIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CopyIndicator')]
    #[JMS\Type('bool')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $copyIndicator;

    /**
     * @var null|UUID
     */
    #[JMS\Accessor(getter: 'getUUID', setter: 'setUUID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('UUID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\UUID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uUID;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueDate', setter: 'setIssueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueTime', setter: 'setIssueTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueTime;

    /**
     * @var null|CustomerReference
     */
    #[JMS\Accessor(getter: 'getCustomerReference', setter: 'setCustomerReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomerReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomerReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $customerReference;

    /**
     * @var null|OrderTypeCode
     */
    #[JMS\Accessor(getter: 'getOrderTypeCode', setter: 'setOrderTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('OrderTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\OrderTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $orderTypeCode;

    /**
     * @var null|DocumentReference
     */
    #[JMS\Accessor(getter: 'getDocumentReference', setter: 'setDocumentReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DocumentReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DocumentReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $documentReference;

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
     * @return null|SalesOrderID
     */
    public function getSalesOrderID(): ?SalesOrderID
    {
        return $this->salesOrderID;
    }

    /**
     * @return SalesOrderID
     */
    public function getSalesOrderIDWithCreate(): SalesOrderID
    {
        $this->salesOrderID ??= new SalesOrderID();

        return $this->salesOrderID;
    }

    /**
     * @param  null|SalesOrderID $salesOrderID
     * @return static
     */
    public function setSalesOrderID(
        ?SalesOrderID $salesOrderID = null
    ): static {
        $this->salesOrderID = $salesOrderID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSalesOrderID(): static
    {
        $this->salesOrderID = null;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getCopyIndicator(): ?bool
    {
        return $this->copyIndicator;
    }

    /**
     * @param  null|bool $copyIndicator
     * @return static
     */
    public function setCopyIndicator(
        ?bool $copyIndicator = null
    ): static {
        $this->copyIndicator = $copyIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCopyIndicator(): static
    {
        $this->copyIndicator = null;

        return $this;
    }

    /**
     * @return null|UUID
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID ??= new UUID();

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(
        ?UUID $uUID = null
    ): static {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUUID(): static
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(
        ?DateTimeInterface $issueDate = null
    ): static {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueTime(): ?DateTimeInterface
    {
        return $this->issueTime;
    }

    /**
     * @param  null|DateTimeInterface $issueTime
     * @return static
     */
    public function setIssueTime(
        ?DateTimeInterface $issueTime = null
    ): static {
        $this->issueTime = $issueTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueTime(): static
    {
        $this->issueTime = null;

        return $this;
    }

    /**
     * @return null|CustomerReference
     */
    public function getCustomerReference(): ?CustomerReference
    {
        return $this->customerReference;
    }

    /**
     * @return CustomerReference
     */
    public function getCustomerReferenceWithCreate(): CustomerReference
    {
        $this->customerReference ??= new CustomerReference();

        return $this->customerReference;
    }

    /**
     * @param  null|CustomerReference $customerReference
     * @return static
     */
    public function setCustomerReference(
        ?CustomerReference $customerReference = null
    ): static {
        $this->customerReference = $customerReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomerReference(): static
    {
        $this->customerReference = null;

        return $this;
    }

    /**
     * @return null|OrderTypeCode
     */
    public function getOrderTypeCode(): ?OrderTypeCode
    {
        return $this->orderTypeCode;
    }

    /**
     * @return OrderTypeCode
     */
    public function getOrderTypeCodeWithCreate(): OrderTypeCode
    {
        $this->orderTypeCode ??= new OrderTypeCode();

        return $this->orderTypeCode;
    }

    /**
     * @param  null|OrderTypeCode $orderTypeCode
     * @return static
     */
    public function setOrderTypeCode(
        ?OrderTypeCode $orderTypeCode = null
    ): static {
        $this->orderTypeCode = $orderTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderTypeCode(): static
    {
        $this->orderTypeCode = null;

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function getDocumentReference(): ?DocumentReference
    {
        return $this->documentReference;
    }

    /**
     * @return DocumentReference
     */
    public function getDocumentReferenceWithCreate(): DocumentReference
    {
        $this->documentReference ??= new DocumentReference();

        return $this->documentReference;
    }

    /**
     * @param  null|DocumentReference $documentReference
     * @return static
     */
    public function setDocumentReference(
        ?DocumentReference $documentReference = null
    ): static {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }
}
