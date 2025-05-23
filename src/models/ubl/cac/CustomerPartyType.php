<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID;
use horstoeko\invoicesuite\models\ubl\cbc\CustomerAssignedAccountID;
use horstoeko\invoicesuite\models\ubl\cbc\SupplierAssignedAccountID;

class CustomerPartyType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CustomerAssignedAccountID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CustomerAssignedAccountID")
     * @JMS\Expose
     * @JMS\SerializedName("CustomerAssignedAccountID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomerAssignedAccountID", setter="setCustomerAssignedAccountID")
     */
    private $customerAssignedAccountID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\SupplierAssignedAccountID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\SupplierAssignedAccountID")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierAssignedAccountID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplierAssignedAccountID", setter="setSupplierAssignedAccountID")
     */
    private $supplierAssignedAccountID;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalAccountID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalAccountID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAdditionalAccountID", setter="setAdditionalAccountID")
     */
    private $additionalAccountID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\Party|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DeliveryContact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DeliveryContact")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryContact", setter="setDeliveryContact")
     */
    private $deliveryContact;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AccountingContact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AccountingContact")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingContact", setter="setAccountingContact")
     */
    private $accountingContact;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\BuyerContact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\BuyerContact")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerContact", setter="setBuyerContact")
     */
    private $buyerContact;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CustomerAssignedAccountID|null
     */
    public function getCustomerAssignedAccountID(): ?CustomerAssignedAccountID
    {
        return $this->customerAssignedAccountID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CustomerAssignedAccountID
     */
    public function getCustomerAssignedAccountIDWithCreate(): CustomerAssignedAccountID
    {
        $this->customerAssignedAccountID = is_null($this->customerAssignedAccountID) ? new CustomerAssignedAccountID() : $this->customerAssignedAccountID;

        return $this->customerAssignedAccountID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CustomerAssignedAccountID|null $customerAssignedAccountID
     * @return self
     */
    public function setCustomerAssignedAccountID(?CustomerAssignedAccountID $customerAssignedAccountID = null): self
    {
        $this->customerAssignedAccountID = $customerAssignedAccountID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SupplierAssignedAccountID|null
     */
    public function getSupplierAssignedAccountID(): ?SupplierAssignedAccountID
    {
        return $this->supplierAssignedAccountID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\SupplierAssignedAccountID
     */
    public function getSupplierAssignedAccountIDWithCreate(): SupplierAssignedAccountID
    {
        $this->supplierAssignedAccountID = is_null($this->supplierAssignedAccountID) ? new SupplierAssignedAccountID() : $this->supplierAssignedAccountID;

        return $this->supplierAssignedAccountID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\SupplierAssignedAccountID|null $supplierAssignedAccountID
     * @return self
     */
    public function setSupplierAssignedAccountID(?SupplierAssignedAccountID $supplierAssignedAccountID = null): self
    {
        $this->supplierAssignedAccountID = $supplierAssignedAccountID;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID>|null
     */
    public function getAdditionalAccountID(): ?array
    {
        return $this->additionalAccountID;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID>|null $additionalAccountID
     * @return self
     */
    public function setAdditionalAccountID(?array $additionalAccountID = null): self
    {
        $this->additionalAccountID = $additionalAccountID;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAdditionalAccountID(): self
    {
        $this->additionalAccountID = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID $additionalAccountID
     * @return self
     */
    public function addToAdditionalAccountID(AdditionalAccountID $additionalAccountID): self
    {
        $this->additionalAccountID[] = $additionalAccountID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID
     */
    public function addToAdditionalAccountIDWithCreate(): AdditionalAccountID
    {
        $this->addToadditionalAccountID($additionalAccountID = new AdditionalAccountID());

        return $additionalAccountID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID $additionalAccountID
     * @return self
     */
    public function addOnceToAdditionalAccountID(AdditionalAccountID $additionalAccountID): self
    {
        if (!is_array($this->additionalAccountID)) {
            $this->additionalAccountID = [];
        }

        $this->additionalAccountID[0] = $additionalAccountID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID
     */
    public function addOnceToAdditionalAccountIDWithCreate(): AdditionalAccountID
    {
        if (!is_array($this->additionalAccountID)) {
            $this->additionalAccountID = [];
        }

        if ($this->additionalAccountID === []) {
            $this->addOnceToadditionalAccountID(new AdditionalAccountID());
        }

        return $this->additionalAccountID[0];
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party|null
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\Party|null $party
     * @return self
     */
    public function setParty(?Party $party = null): self
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryContact|null
     */
    public function getDeliveryContact(): ?DeliveryContact
    {
        return $this->deliveryContact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DeliveryContact
     */
    public function getDeliveryContactWithCreate(): DeliveryContact
    {
        $this->deliveryContact = is_null($this->deliveryContact) ? new DeliveryContact() : $this->deliveryContact;

        return $this->deliveryContact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DeliveryContact|null $deliveryContact
     * @return self
     */
    public function setDeliveryContact(?DeliveryContact $deliveryContact = null): self
    {
        $this->deliveryContact = $deliveryContact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccountingContact|null
     */
    public function getAccountingContact(): ?AccountingContact
    {
        return $this->accountingContact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AccountingContact
     */
    public function getAccountingContactWithCreate(): AccountingContact
    {
        $this->accountingContact = is_null($this->accountingContact) ? new AccountingContact() : $this->accountingContact;

        return $this->accountingContact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AccountingContact|null $accountingContact
     * @return self
     */
    public function setAccountingContact(?AccountingContact $accountingContact = null): self
    {
        $this->accountingContact = $accountingContact;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BuyerContact|null
     */
    public function getBuyerContact(): ?BuyerContact
    {
        return $this->buyerContact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BuyerContact
     */
    public function getBuyerContactWithCreate(): BuyerContact
    {
        $this->buyerContact = is_null($this->buyerContact) ? new BuyerContact() : $this->buyerContact;

        return $this->buyerContact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BuyerContact|null $buyerContact
     * @return self
     */
    public function setBuyerContact(?BuyerContact $buyerContact = null): self
    {
        $this->buyerContact = $buyerContact;

        return $this;
    }
}
