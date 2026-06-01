<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdditionalAccountID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomerAssignedAccountID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplierAssignedAccountID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class CustomerPartyType
{
    use HandlesObjectFlags;

    /**
     * @var null|CustomerAssignedAccountID
     */
    #[JMS\Accessor(getter: 'getCustomerAssignedAccountID', setter: 'setCustomerAssignedAccountID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CustomerAssignedAccountID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomerAssignedAccountID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $customerAssignedAccountID;

    /**
     * @var null|SupplierAssignedAccountID
     */
    #[JMS\Accessor(getter: 'getSupplierAssignedAccountID', setter: 'setSupplierAssignedAccountID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SupplierAssignedAccountID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SupplierAssignedAccountID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $supplierAssignedAccountID;

    /**
     * @var null|array<AdditionalAccountID>
     */
    #[JMS\Accessor(getter: 'getAdditionalAccountID', setter: 'setAdditionalAccountID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AdditionalAccountID')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdditionalAccountID>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AdditionalAccountID', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $additionalAccountID;

    /**
     * @var null|Party
     */
    #[JMS\Accessor(getter: 'getParty', setter: 'setParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Party')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Party')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $party;

    /**
     * @var null|DeliveryContact
     */
    #[JMS\Accessor(getter: 'getDeliveryContact', setter: 'setDeliveryContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DeliveryContact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DeliveryContact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $deliveryContact;

    /**
     * @var null|AccountingContact
     */
    #[JMS\Accessor(getter: 'getAccountingContact', setter: 'setAccountingContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountingContact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AccountingContact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $accountingContact;

    /**
     * @var null|BuyerContact
     */
    #[JMS\Accessor(getter: 'getBuyerContact', setter: 'setBuyerContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('BuyerContact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\BuyerContact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->customerAssignedAccountID ??= new CustomerAssignedAccountID();

        return $this->customerAssignedAccountID;
    }

    /**
     * @param  null|CustomerAssignedAccountID $customerAssignedAccountID
     * @return static
     */
    public function setCustomerAssignedAccountID(
        ?CustomerAssignedAccountID $customerAssignedAccountID = null
    ): static {
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
        $this->supplierAssignedAccountID ??= new SupplierAssignedAccountID();

        return $this->supplierAssignedAccountID;
    }

    /**
     * @param  null|SupplierAssignedAccountID $supplierAssignedAccountID
     * @return static
     */
    public function setSupplierAssignedAccountID(
        ?SupplierAssignedAccountID $supplierAssignedAccountID = null
    ): static {
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
    public function setAdditionalAccountID(
        ?array $additionalAccountID = null
    ): static {
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
    public function addToAdditionalAccountID(
        AdditionalAccountID $additionalAccountID
    ): static {
        $this->additionalAccountID[] = $additionalAccountID;

        return $this;
    }

    /**
     * @return AdditionalAccountID
     */
    public function addToAdditionalAccountIDWithCreate(): AdditionalAccountID
    {
        $this->addToAdditionalAccountID($additionalAccountID = new AdditionalAccountID());

        return $additionalAccountID;
    }

    /**
     * @param  AdditionalAccountID $additionalAccountID
     * @return static
     */
    public function addOnceToAdditionalAccountID(
        AdditionalAccountID $additionalAccountID
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->additionalAccountID)) {
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
        if (!InvoiceSuiteArrayUtils::is($this->additionalAccountID)) {
            $this->additionalAccountID = [];
        }

        if ([] === $this->additionalAccountID) {
            $this->addOnceToAdditionalAccountID(new AdditionalAccountID());
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
        $this->party ??= new Party();

        return $this->party;
    }

    /**
     * @param  null|Party $party
     * @return static
     */
    public function setParty(
        ?Party $party = null
    ): static {
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
        $this->deliveryContact ??= new DeliveryContact();

        return $this->deliveryContact;
    }

    /**
     * @param  null|DeliveryContact $deliveryContact
     * @return static
     */
    public function setDeliveryContact(
        ?DeliveryContact $deliveryContact = null
    ): static {
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
        $this->accountingContact ??= new AccountingContact();

        return $this->accountingContact;
    }

    /**
     * @param  null|AccountingContact $accountingContact
     * @return static
     */
    public function setAccountingContact(
        ?AccountingContact $accountingContact = null
    ): static {
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
        $this->buyerContact ??= new BuyerContact();

        return $this->buyerContact;
    }

    /**
     * @param  null|BuyerContact $buyerContact
     * @return static
     */
    public function setBuyerContact(
        ?BuyerContact $buyerContact = null
    ): static {
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
