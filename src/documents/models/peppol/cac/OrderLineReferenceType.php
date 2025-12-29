<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LineID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\LineStatusCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SalesOrderLineID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\UUID;
use JMS\Serializer\Annotation as JMS;

class OrderLineReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|LineID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LineID")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var null|SalesOrderLineID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SalesOrderLineID")
     * @JMS\Expose
     * @JMS\SerializedName("SalesOrderLineID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSalesOrderLineID", setter="setSalesOrderLineID")
     */
    private $salesOrderLineID;

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
     * @var null|LineStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\LineStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineStatusCode", setter="setLineStatusCode")
     */
    private $lineStatusCode;

    /**
     * @var null|OrderReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\OrderReference")
     * @JMS\Expose
     * @JMS\SerializedName("OrderReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderReference", setter="setOrderReference")
     */
    private $orderReference;

    /**
     * @return null|LineID
     */
    public function getLineID(): ?LineID
    {
        return $this->lineID;
    }

    /**
     * @return LineID
     */
    public function getLineIDWithCreate(): LineID
    {
        $this->lineID = is_null($this->lineID) ? new LineID() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param  null|LineID $lineID
     * @return static
     */
    public function setLineID(?LineID $lineID = null): static
    {
        $this->lineID = $lineID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineID(): static
    {
        $this->lineID = null;

        return $this;
    }

    /**
     * @return null|SalesOrderLineID
     */
    public function getSalesOrderLineID(): ?SalesOrderLineID
    {
        return $this->salesOrderLineID;
    }

    /**
     * @return SalesOrderLineID
     */
    public function getSalesOrderLineIDWithCreate(): SalesOrderLineID
    {
        $this->salesOrderLineID = is_null($this->salesOrderLineID) ? new SalesOrderLineID() : $this->salesOrderLineID;

        return $this->salesOrderLineID;
    }

    /**
     * @param  null|SalesOrderLineID $salesOrderLineID
     * @return static
     */
    public function setSalesOrderLineID(?SalesOrderLineID $salesOrderLineID = null): static
    {
        $this->salesOrderLineID = $salesOrderLineID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSalesOrderLineID(): static
    {
        $this->salesOrderLineID = null;

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
     * @return null|LineStatusCode
     */
    public function getLineStatusCode(): ?LineStatusCode
    {
        return $this->lineStatusCode;
    }

    /**
     * @return LineStatusCode
     */
    public function getLineStatusCodeWithCreate(): LineStatusCode
    {
        $this->lineStatusCode = is_null($this->lineStatusCode) ? new LineStatusCode() : $this->lineStatusCode;

        return $this->lineStatusCode;
    }

    /**
     * @param  null|LineStatusCode $lineStatusCode
     * @return static
     */
    public function setLineStatusCode(?LineStatusCode $lineStatusCode = null): static
    {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineStatusCode(): static
    {
        $this->lineStatusCode = null;

        return $this;
    }

    /**
     * @return null|OrderReference
     */
    public function getOrderReference(): ?OrderReference
    {
        return $this->orderReference;
    }

    /**
     * @return OrderReference
     */
    public function getOrderReferenceWithCreate(): OrderReference
    {
        $this->orderReference = is_null($this->orderReference) ? new OrderReference() : $this->orderReference;

        return $this->orderReference;
    }

    /**
     * @param  null|OrderReference $orderReference
     * @return static
     */
    public function setOrderReference(?OrderReference $orderReference = null): static
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderReference(): static
    {
        $this->orderReference = null;

        return $this;
    }
}
