<?php

namespace horstoeko\invoicesuite\documentmodels\zffxextended\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType;

class TradeProductInstanceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BatchID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBatchID", setter="setBatchID")
     */
    private $batchID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierAssignedSerialID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSupplierAssignedSerialID", setter="setSupplierAssignedSerialID")
     */
    private $supplierAssignedSerialID;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null
     */
    public function getBatchID(): ?IDType
    {
        return $this->batchID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType
     */
    public function getBatchIDWithCreate(): IDType
    {
        $this->batchID = is_null($this->batchID) ? new IDType() : $this->batchID;

        return $this->batchID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null $batchID
     * @return self
     */
    public function setBatchID(?IDType $batchID = null): self
    {
        $this->batchID = $batchID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBatchID(): self
    {
        $this->batchID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null
     */
    public function getSupplierAssignedSerialID(): ?IDType
    {
        return $this->supplierAssignedSerialID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType
     */
    public function getSupplierAssignedSerialIDWithCreate(): IDType
    {
        $this->supplierAssignedSerialID = is_null($this->supplierAssignedSerialID) ? new IDType() : $this->supplierAssignedSerialID;

        return $this->supplierAssignedSerialID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\zffxextended\udt\IDType|null $supplierAssignedSerialID
     * @return self
     */
    public function setSupplierAssignedSerialID(?IDType $supplierAssignedSerialID = null): self
    {
        $this->supplierAssignedSerialID = $supplierAssignedSerialID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSupplierAssignedSerialID(): self
    {
        $this->supplierAssignedSerialID = null;

        return $this;
    }
}
