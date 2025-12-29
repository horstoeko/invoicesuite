<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AdditionalAccountID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CustomerAssignedAccountID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SupplierAssignedAccountID;
use JMS\Serializer\Annotation as JMS;

class CustomerPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|CustomerAssignedAccountID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CustomerAssignedAccountID")
     * @JMS\Expose
     * @JMS\SerializedName("CustomerAssignedAccountID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCustomerAssignedAccountID", setter="setCustomerAssignedAccountID")
     */
    private $customerAssignedAccountID;

    /**
     * @var null|SupplierAssignedAccountID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SupplierAssignedAccountID")
     * @JMS\Expose
     * @JMS\SerializedName("SupplierAssignedAccountID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSupplierAssignedAccountID", setter="setSupplierAssignedAccountID")
     */
    private $supplierAssignedAccountID;

    /**
     * @var null|array<AdditionalAccountID>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\AdditionalAccountID>")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalAccountID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AdditionalAccountID", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getAdditionalAccountID", setter="setAdditionalAccountID")
     */
    private $additionalAccountID;

    /**
     * @var null|Party
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\Party")
     * @JMS\Expose
     * @JMS\SerializedName("Party")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getParty", setter="setParty")
     */
    private $party;

    /**
     * @var null|DeliveryContact
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DeliveryContact")
     * @JMS\Expose
     * @JMS\SerializedName("DeliveryContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDeliveryContact", setter="setDeliveryContact")
     */
    private $deliveryContact;

    /**
     * @var null|AccountingContact
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\AccountingContact")
     * @JMS\Expose
     * @JMS\SerializedName("AccountingContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountingContact", setter="setAccountingContact")
     */
    private $accountingContact;

    /**
     * @var null|BuyerContact
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\BuyerContact")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerContact")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getBuyerContact", setter="setBuyerContact")
     */
    private $buyerContact;

    /**
     * @return null|CustomerAssignedAccountID
     */
    public function getCustomerAssignedAccountID(): ?CustomerAssignedAccountID
    {
        return $this->customerAssignedAccountID;
    }

    /**
     * @return CustomerAssignedAccountID
     */
    public function getCustomerAssignedAccountIDWithCreate(): CustomerAssignedAccountID
    {
        $this->customerAssignedAccountID = is_null($this->customerAssignedAccountID) ? new CustomerAssignedAccountID() : $this->customerAssignedAccountID;

        return $this->customerAssignedAccountID;
    }

    /**
     * @param  null|CustomerAssignedAccountID $customerAssignedAccountID
     * @return static
     */
    public function setCustomerAssignedAccountID(?CustomerAssignedAccountID $customerAssignedAccountID = null): static
    {
        $this->customerAssignedAccountID = $customerAssignedAccountID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCustomerAssignedAccountID(): static
    {
        $this->customerAssignedAccountID = null;

        return $this;
    }

    /**
     * @return null|SupplierAssignedAccountID
     */
    public function getSupplierAssignedAccountID(): ?SupplierAssignedAccountID
    {
        return $this->supplierAssignedAccountID;
    }

    /**
     * @return SupplierAssignedAccountID
     */
    public function getSupplierAssignedAccountIDWithCreate(): SupplierAssignedAccountID
    {
        $this->supplierAssignedAccountID = is_null($this->supplierAssignedAccountID) ? new SupplierAssignedAccountID() : $this->supplierAssignedAccountID;

        return $this->supplierAssignedAccountID;
    }

    /**
     * @param  null|SupplierAssignedAccountID $supplierAssignedAccountID
     * @return static
     */
    public function setSupplierAssignedAccountID(?SupplierAssignedAccountID $supplierAssignedAccountID = null): static
    {
        $this->supplierAssignedAccountID = $supplierAssignedAccountID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSupplierAssignedAccountID(): static
    {
        $this->supplierAssignedAccountID = null;

        return $this;
    }

    /**
     * @return null|array<AdditionalAccountID>
     */
    public function getAdditionalAccountID(): ?array
    {
        return $this->additionalAccountID;
    }

    /**
     * @param  null|array<AdditionalAccountID> $additionalAccountID
     * @return static
     */
    public function setAdditionalAccountID(?array $additionalAccountID = null): static
    {
        $this->additionalAccountID = $additionalAccountID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalAccountID(): static
    {
        $this->additionalAccountID = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAdditionalAccountID(): static
    {
        $this->additionalAccountID = [];

        return $this;
    }

    /**
     * @return null|AdditionalAccountID
     */
    public function firstAdditionalAccountID(): ?AdditionalAccountID
    {
        $additionalAccountID = $this->additionalAccountID ?? [];
        $additionalAccountID = reset($additionalAccountID);

        if (false === $additionalAccountID) {
            return null;
        }

        return $additionalAccountID;
    }

    /**
     * @return null|AdditionalAccountID
     */
    public function lastAdditionalAccountID(): ?AdditionalAccountID
    {
        $additionalAccountID = $this->additionalAccountID ?? [];
        $additionalAccountID = end($additionalAccountID);

        if (false === $additionalAccountID) {
            return null;
        }

        return $additionalAccountID;
    }

    /**
     * @param  AdditionalAccountID $additionalAccountID
     * @return static
     */
    public function addToAdditionalAccountID(AdditionalAccountID $additionalAccountID): static
    {
        $this->additionalAccountID[] = $additionalAccountID;

        return $this;
    }

    /**
     * @return AdditionalAccountID
     */
    public function addToAdditionalAccountIDWithCreate(): AdditionalAccountID
    {
        $this->addToadditionalAccountID($additionalAccountID = new AdditionalAccountID());

        return $additionalAccountID;
    }

    /**
     * @param  AdditionalAccountID $additionalAccountID
     * @return static
     */
    public function addOnceToAdditionalAccountID(AdditionalAccountID $additionalAccountID): static
    {
        if (!is_array($this->additionalAccountID)) {
            $this->additionalAccountID = [];
        }

        $this->additionalAccountID[0] = $additionalAccountID;

        return $this;
    }

    /**
     * @return AdditionalAccountID
     */
    public function addOnceToAdditionalAccountIDWithCreate(): AdditionalAccountID
    {
        if (!is_array($this->additionalAccountID)) {
            $this->additionalAccountID = [];
        }

        if ([] === $this->additionalAccountID) {
            $this->addOnceToadditionalAccountID(new AdditionalAccountID());
        }

        return $this->additionalAccountID[0];
    }

    /**
     * @return null|Party
     */
    public function getParty(): ?Party
    {
        return $this->party;
    }

    /**
     * @return Party
     */
    public function getPartyWithCreate(): Party
    {
        $this->party = is_null($this->party) ? new Party() : $this->party;

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(?Party $party = null): static
    {
        $this->party = $party;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetParty(): static
    {
        $this->party = null;

        return $this;
    }

    /**
     * @return null|DeliveryContact
     */
    public function getDeliveryContact(): ?DeliveryContact
    {
        return $this->deliveryContact;
    }

    /**
     * @return DeliveryContact
     */
    public function getDeliveryContactWithCreate(): DeliveryContact
    {
        $this->deliveryContact = is_null($this->deliveryContact) ? new DeliveryContact() : $this->deliveryContact;

        return $this->deliveryContact;
    }

    /**
     * @param  null|DeliveryContact $deliveryContact
     * @return static
     */
    public function setDeliveryContact(?DeliveryContact $deliveryContact = null): static
    {
        $this->deliveryContact = $deliveryContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDeliveryContact(): static
    {
        $this->deliveryContact = null;

        return $this;
    }

    /**
     * @return null|AccountingContact
     */
    public function getAccountingContact(): ?AccountingContact
    {
        return $this->accountingContact;
    }

    /**
     * @return AccountingContact
     */
    public function getAccountingContactWithCreate(): AccountingContact
    {
        $this->accountingContact = is_null($this->accountingContact) ? new AccountingContact() : $this->accountingContact;

        return $this->accountingContact;
    }

    /**
     * @param  null|AccountingContact $accountingContact
     * @return static
     */
    public function setAccountingContact(?AccountingContact $accountingContact = null): static
    {
        $this->accountingContact = $accountingContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountingContact(): static
    {
        $this->accountingContact = null;

        return $this;
    }

    /**
     * @return null|BuyerContact
     */
    public function getBuyerContact(): ?BuyerContact
    {
        return $this->buyerContact;
    }

    /**
     * @return BuyerContact
     */
    public function getBuyerContactWithCreate(): BuyerContact
    {
        $this->buyerContact = is_null($this->buyerContact) ? new BuyerContact() : $this->buyerContact;

        return $this->buyerContact;
    }

    /**
     * @param  null|BuyerContact $buyerContact
     * @return static
     */
    public function setBuyerContact(?BuyerContact $buyerContact = null): static
    {
        $this->buyerContact = $buyerContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerContact(): static
    {
        $this->buyerContact = null;

        return $this;
    }
}
