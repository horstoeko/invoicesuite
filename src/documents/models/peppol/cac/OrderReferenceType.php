<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CustomerReference;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\OrderTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SalesOrderID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class OrderReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|SalesOrderID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SalesOrderID")
     * @JMS\Expose
     * @JMS\SerializedName("SalesOrderID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSalesOrderID", setter="setSalesOrderID")
     */
    private $salesOrderID;

    /**
     * @var null|bool
     * @JMS\Groups({"ubl"})
     * @JMS\Type("bool")
     * @JMS\Expose
     * @JMS\SerializedName("CopyIndicator")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCopyIndicator", setter="setCopyIndicator")
     */
    private $copyIndicator;

    /**
     * @var null|UUID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("IssueTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueTime", setter="setIssueTime")
     */
    private $issueTime;

    /**
     * @var null|CustomerReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CustomerReference")
     * @JMS\Expose
     * @JMS\SerializedName("CustomerReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomerReference", setter="setCustomerReference")
     */
    private $customerReference;

    /**
     * @var null|OrderTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\OrderTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("OrderTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderTypeCode", setter="setOrderTypeCode")
     */
    private $orderTypeCode;

    /**
     * @var null|DocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
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
        $this->salesOrderID = is_null($this->salesOrderID) ? new SalesOrderID() : $this->salesOrderID;

        return $this->salesOrderID;
    }

    /**
     * @param  null|SalesOrderID $salesOrderID
     * @return static
     */
    public function setSalesOrderID(?SalesOrderID $salesOrderID = null): static
    {
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
    public function setCopyIndicator(?bool $copyIndicator = null): static
    {
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
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param  null|UUID $uUID
     * @return static
     */
    public function setUUID(?UUID $uUID = null): static
    {
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
    public function setIssueDate(?DateTimeInterface $issueDate = null): static
    {
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
    public function setIssueTime(?DateTimeInterface $issueTime = null): static
    {
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
        $this->customerReference = is_null($this->customerReference) ? new CustomerReference() : $this->customerReference;

        return $this->customerReference;
    }

    /**
     * @param  null|CustomerReference $customerReference
     * @return static
     */
    public function setCustomerReference(?CustomerReference $customerReference = null): static
    {
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
        $this->orderTypeCode = is_null($this->orderTypeCode) ? new OrderTypeCode() : $this->orderTypeCode;

        return $this->orderTypeCode;
    }

    /**
     * @param  null|OrderTypeCode $orderTypeCode
     * @return static
     */
    public function setOrderTypeCode(?OrderTypeCode $orderTypeCode = null): static
    {
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
        $this->documentReference = is_null($this->documentReference) ? new DocumentReference() : $this->documentReference;

        return $this->documentReference;
    }

    /**
     * @param  null|DocumentReference $documentReference
     * @return static
     */
    public function setDocumentReference(?DocumentReference $documentReference = null): static
    {
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
