<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\LineID;
use horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode;
use horstoeko\invoicesuite\models\ubl\cbc\SalesOrderLineID;
use horstoeko\invoicesuite\models\ubl\cbc\UUID;

class OrderLineReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LineID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LineID")
     * @JMS\Expose
     * @JMS\SerializedName("LineID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineID", setter="setLineID")
     */
    private $lineID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SalesOrderLineID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SalesOrderLineID")
     * @JMS\Expose
     * @JMS\SerializedName("SalesOrderLineID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSalesOrderLineID", setter="setSalesOrderLineID")
     */
    private $salesOrderLineID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\UUID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\UUID")
     * @JMS\Expose
     * @JMS\SerializedName("UUID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getUUID", setter="setUUID")
     */
    private $uUID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("LineStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineStatusCode", setter="setLineStatusCode")
     */
    private $lineStatusCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\OrderReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\OrderReference")
     * @JMS\Expose
     * @JMS\SerializedName("OrderReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getOrderReference", setter="setOrderReference")
     */
    private $orderReference;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineID|null
     */
    public function getLineID(): ?LineID
    {
        return $this->lineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineID
     */
    public function getLineIDWithCreate(): LineID
    {
        $this->lineID = is_null($this->lineID) ? new LineID() : $this->lineID;

        return $this->lineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LineID|null $lineID
     * @return self
     */
    public function setLineID(?LineID $lineID = null): self
    {
        $this->lineID = $lineID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineID(): self
    {
        $this->lineID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SalesOrderLineID|null
     */
    public function getSalesOrderLineID(): ?SalesOrderLineID
    {
        return $this->salesOrderLineID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SalesOrderLineID
     */
    public function getSalesOrderLineIDWithCreate(): SalesOrderLineID
    {
        $this->salesOrderLineID = is_null($this->salesOrderLineID) ? new SalesOrderLineID() : $this->salesOrderLineID;

        return $this->salesOrderLineID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SalesOrderLineID|null $salesOrderLineID
     * @return self
     */
    public function setSalesOrderLineID(?SalesOrderLineID $salesOrderLineID = null): self
    {
        $this->salesOrderLineID = $salesOrderLineID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSalesOrderLineID(): self
    {
        $this->salesOrderLineID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UUID|null
     */
    public function getUUID(): ?UUID
    {
        return $this->uUID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\UUID
     */
    public function getUUIDWithCreate(): UUID
    {
        $this->uUID = is_null($this->uUID) ? new UUID() : $this->uUID;

        return $this->uUID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\UUID|null $uUID
     * @return self
     */
    public function setUUID(?UUID $uUID = null): self
    {
        $this->uUID = $uUID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetUUID(): self
    {
        $this->uUID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode|null
     */
    public function getLineStatusCode(): ?LineStatusCode
    {
        return $this->lineStatusCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode
     */
    public function getLineStatusCodeWithCreate(): LineStatusCode
    {
        $this->lineStatusCode = is_null($this->lineStatusCode) ? new LineStatusCode() : $this->lineStatusCode;

        return $this->lineStatusCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\LineStatusCode|null $lineStatusCode
     * @return self
     */
    public function setLineStatusCode(?LineStatusCode $lineStatusCode = null): self
    {
        $this->lineStatusCode = $lineStatusCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineStatusCode(): self
    {
        $this->lineStatusCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OrderReference|null
     */
    public function getOrderReference(): ?OrderReference
    {
        return $this->orderReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\OrderReference
     */
    public function getOrderReferenceWithCreate(): OrderReference
    {
        $this->orderReference = is_null($this->orderReference) ? new OrderReference() : $this->orderReference;

        return $this->orderReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\OrderReference|null $orderReference
     * @return self
     */
    public function setOrderReference(?OrderReference $orderReference = null): self
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetOrderReference(): self
    {
        $this->orderReference = null;

        return $this;
    }
}
