<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AdditionalAccountID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CustomerAssignedAccountID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DataSendingCapability;
use JMS\Serializer\Annotation as JMS;

class SupplierPartyType
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
     * @var null|DataSendingCapability
     */
    #[JMS\Accessor(getter: 'getDataSendingCapability', setter: 'setDataSendingCapability')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DataSendingCapability')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\DataSendingCapability')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $dataSendingCapability;

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
     * @var null|DespatchContact
     */
    #[JMS\Accessor(getter: 'getDespatchContact', setter: 'setDespatchContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('DespatchContact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\DespatchContact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $despatchContact;

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
     * @var null|SellerContact
     */
    #[JMS\Accessor(getter: 'getSellerContact', setter: 'setSellerContact')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SellerContact')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\SellerContact')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $sellerContact;

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
            $this->addOnceToAdditionalAccountID(new AdditionalAccountID());
        }

        return $this->additionalAccountID[0];
    }

    /**
     * @return null|DataSendingCapability
     */
    public function getDataSendingCapability(): ?DataSendingCapability
    {
        return $this->dataSendingCapability;
    }

    /**
     * @return DataSendingCapability
     */
    public function getDataSendingCapabilityWithCreate(): DataSendingCapability
    {
        $this->dataSendingCapability ??= new DataSendingCapability();

        return $this->dataSendingCapability;
    }

    /**
     * @param  null|DataSendingCapability $dataSendingCapability
     * @return static
     */
    public function setDataSendingCapability(
        ?DataSendingCapability $dataSendingCapability = null
    ): static {
        $this->dataSendingCapability = $dataSendingCapability;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDataSendingCapability(): static
    {
        $this->dataSendingCapability = null;

        return $this;
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
     * @return null|DespatchContact
     */
    public function getDespatchContact(): ?DespatchContact
    {
        return $this->despatchContact;
    }

    /**
     * @return DespatchContact
     */
    public function getDespatchContactWithCreate(): DespatchContact
    {
        $this->despatchContact ??= new DespatchContact();

        return $this->despatchContact;
    }

    /**
     * @param  null|DespatchContact $despatchContact
     * @return static
     */
    public function setDespatchContact(
        ?DespatchContact $despatchContact = null
    ): static {
        $this->despatchContact = $despatchContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDespatchContact(): static
    {
        $this->despatchContact = null;

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
     * @return null|SellerContact
     */
    public function getSellerContact(): ?SellerContact
    {
        return $this->sellerContact;
    }

    /**
     * @return SellerContact
     */
    public function getSellerContactWithCreate(): SellerContact
    {
        $this->sellerContact ??= new SellerContact();

        return $this->sellerContact;
    }

    /**
     * @param  null|SellerContact $sellerContact
     * @return static
     */
    public function setSellerContact(
        ?SellerContact $sellerContact = null
    ): static {
        $this->sellerContact = $sellerContact;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerContact(): static
    {
        $this->sellerContact = null;

        return $this;
    }
}
