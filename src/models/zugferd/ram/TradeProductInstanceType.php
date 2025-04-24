<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;

class TradeProductInstanceType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BatchID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBatchID", setter="setBatchID")
     */
    private $batchID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierAssignedSerialID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSupplierAssignedSerialID", setter="setSupplierAssignedSerialID")
     */
    private $supplierAssignedSerialID;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getBatchID(): ?IDType
    {
        return $this->batchID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getBatchIDWithCreate(): IDType
    {
        $this->batchID = is_null($this->batchID) ? new IDType() : $this->batchID;

        return $this->batchID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $batchID
     * @return self
     */
    public function setBatchID(IDType $batchID): self
    {
        $this->batchID = $batchID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getSupplierAssignedSerialID(): ?IDType
    {
        return $this->supplierAssignedSerialID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getSupplierAssignedSerialIDWithCreate(): IDType
    {
        $this->supplierAssignedSerialID = is_null($this->supplierAssignedSerialID) ? new IDType() : $this->supplierAssignedSerialID;

        return $this->supplierAssignedSerialID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType $supplierAssignedSerialID
     * @return self
     */
    public function setSupplierAssignedSerialID(IDType $supplierAssignedSerialID): self
    {
        $this->supplierAssignedSerialID = $supplierAssignedSerialID;

        return $this;
    }
}
