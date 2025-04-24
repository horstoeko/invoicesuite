<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IDType;

class TradeProductInstanceType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("BatchID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBatchID", setter="setBatchID")
     */
    private $batchID;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierAssignedSerialID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getSupplierAssignedSerialID", setter="setSupplierAssignedSerialID")
     */
    private $supplierAssignedSerialID;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getBatchID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->batchID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getBatchIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->batchID = is_null($this->batchID) ? new IDType() : $this->batchID;

        return $this->batchID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setBatchID(\horstoeko\invoicesuite\models\zugferd\udt\IDType $idType): self
    {
        $this->batchID = $idType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType|null
     */
    public function getSupplierAssignedSerialID(): ?\horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        return $this->supplierAssignedSerialID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IDType
     */
    public function getSupplierAssignedSerialIDWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IDType
    {
        $this->supplierAssignedSerialID = is_null($this->supplierAssignedSerialID) ? new IDType() : $this->supplierAssignedSerialID;

        return $this->supplierAssignedSerialID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IDType
     * @return self
     */
    public function setSupplierAssignedSerialID(
        \horstoeko\invoicesuite\models\zugferd\udt\IDType $idType,
    ): self {
        $this->supplierAssignedSerialID = $idType;

        return $this;
    }
}
