<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\AdditionalAccountID;
use horstoeko\invoicesuite\models\ubl\cbc\CustomerAssignedAccountID;
use horstoeko\invoicesuite\models\ubl\cbc\DataSendingCapability;

class SupplierPartyType
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
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DataSendingCapability|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DataSendingCapability")
     * @JMS\Expose
     * @JMS\SerializedName("DataSendingCapability")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDataSendingCapability", setter="setDataSendingCapability")
     */
    private $dataSendingCapability;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\DespatchContact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DespatchContact")
     * @JMS\Expose
     * @JMS\SerializedName("DespatchContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDespatchContact", setter="setDespatchContact")
     */
    private $despatchContact;

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
     * @var \horstoeko\invoicesuite\models\ubl\cac\SellerContact|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SellerContact")
     * @JMS\Expose
     * @JMS\SerializedName("SellerContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSellerContact", setter="setSellerContact")
     */
    private $sellerContact;

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
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DataSendingCapability|null
     */
    public function getDataSendingCapability(): ?DataSendingCapability
    {
        return $this->dataSendingCapability;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DataSendingCapability
     */
    public function getDataSendingCapabilityWithCreate(): DataSendingCapability
    {
        $this->dataSendingCapability = is_null($this->dataSendingCapability) ? new DataSendingCapability() : $this->dataSendingCapability;

        return $this->dataSendingCapability;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DataSendingCapability|null $dataSendingCapability
     * @return self
     */
    public function setDataSendingCapability(?DataSendingCapability $dataSendingCapability = null): self
    {
        $this->dataSendingCapability = $dataSendingCapability;

        return $this;
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
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchContact|null
     */
    public function getDespatchContact(): ?DespatchContact
    {
        return $this->despatchContact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DespatchContact
     */
    public function getDespatchContactWithCreate(): DespatchContact
    {
        $this->despatchContact = is_null($this->despatchContact) ? new DespatchContact() : $this->despatchContact;

        return $this->despatchContact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DespatchContact|null $despatchContact
     * @return self
     */
    public function setDespatchContact(?DespatchContact $despatchContact = null): self
    {
        $this->despatchContact = $despatchContact;

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
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerContact|null
     */
    public function getSellerContact(): ?SellerContact
    {
        return $this->sellerContact;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SellerContact
     */
    public function getSellerContactWithCreate(): SellerContact
    {
        $this->sellerContact = is_null($this->sellerContact) ? new SellerContact() : $this->sellerContact;

        return $this->sellerContact;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SellerContact|null $sellerContact
     * @return self
     */
    public function setSellerContact(?SellerContact $sellerContact = null): self
    {
        $this->sellerContact = $sellerContact;

        return $this;
    }
}
