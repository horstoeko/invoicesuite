<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountFormatCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AliasName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrencyCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentNote;
use JMS\Serializer\Annotation as JMS;

class FinancialAccountType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|Name
     */
    #[JMS\Accessor(getter: 'getName', setter: 'setName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Name')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Name')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $name;

    /**
     * @var null|AliasName
     */
    #[JMS\Accessor(getter: 'getAliasName', setter: 'setAliasName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AliasName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AliasName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $aliasName;

    /**
     * @var null|AccountTypeCode
     */
    #[JMS\Accessor(getter: 'getAccountTypeCode', setter: 'setAccountTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $accountTypeCode;

    /**
     * @var null|AccountFormatCode
     */
    #[JMS\Accessor(getter: 'getAccountFormatCode', setter: 'setAccountFormatCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AccountFormatCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AccountFormatCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $accountFormatCode;

    /**
     * @var null|CurrencyCode
     */
    #[JMS\Accessor(getter: 'getCurrencyCode', setter: 'setCurrencyCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CurrencyCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CurrencyCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $currencyCode;

    /**
     * @var null|array<PaymentNote>
     */
    #[JMS\Accessor(getter: 'getPaymentNote', setter: 'setPaymentNote')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaymentNote')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaymentNote>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'PaymentNote', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $paymentNote;

    /**
     * @var null|FinancialInstitutionBranch
     */
    #[JMS\Accessor(getter: 'getFinancialInstitutionBranch', setter: 'setFinancialInstitutionBranch')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FinancialInstitutionBranch')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\FinancialInstitutionBranch')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $financialInstitutionBranch;

    /**
     * @var null|Country
     */
    #[JMS\Accessor(getter: 'getCountry', setter: 'setCountry')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Country')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\Country')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $country;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|Name
     */
    public function getName(): ?Name
    {
        return $this->name;
    }

    /**
     * @return Name
     */
    public function getNameWithCreate(): Name
    {
        $this->name ??= new Name();

        return $this->name;
    }

    /**
     * @param  null|Name $name
     * @return static
     */
    public function setName(
        ?Name $name = null
    ): static {
        $this->name = $name;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetName(): static
    {
        $this->name = null;

        return $this;
    }

    /**
     * @return null|AliasName
     */
    public function getAliasName(): ?AliasName
    {
        return $this->aliasName;
    }

    /**
     * @return AliasName
     */
    public function getAliasNameWithCreate(): AliasName
    {
        $this->aliasName ??= new AliasName();

        return $this->aliasName;
    }

    /**
     * @param  null|AliasName $aliasName
     * @return static
     */
    public function setAliasName(
        ?AliasName $aliasName = null
    ): static {
        $this->aliasName = $aliasName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAliasName(): static
    {
        $this->aliasName = null;

        return $this;
    }

    /**
     * @return null|AccountTypeCode
     */
    public function getAccountTypeCode(): ?AccountTypeCode
    {
        return $this->accountTypeCode;
    }

    /**
     * @return AccountTypeCode
     */
    public function getAccountTypeCodeWithCreate(): AccountTypeCode
    {
        $this->accountTypeCode ??= new AccountTypeCode();

        return $this->accountTypeCode;
    }

    /**
     * @param  null|AccountTypeCode $accountTypeCode
     * @return static
     */
    public function setAccountTypeCode(
        ?AccountTypeCode $accountTypeCode = null
    ): static {
        $this->accountTypeCode = $accountTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountTypeCode(): static
    {
        $this->accountTypeCode = null;

        return $this;
    }

    /**
     * @return null|AccountFormatCode
     */
    public function getAccountFormatCode(): ?AccountFormatCode
    {
        return $this->accountFormatCode;
    }

    /**
     * @return AccountFormatCode
     */
    public function getAccountFormatCodeWithCreate(): AccountFormatCode
    {
        $this->accountFormatCode ??= new AccountFormatCode();

        return $this->accountFormatCode;
    }

    /**
     * @param  null|AccountFormatCode $accountFormatCode
     * @return static
     */
    public function setAccountFormatCode(
        ?AccountFormatCode $accountFormatCode = null
    ): static {
        $this->accountFormatCode = $accountFormatCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountFormatCode(): static
    {
        $this->accountFormatCode = null;

        return $this;
    }

    /**
     * @return null|CurrencyCode
     */
    public function getCurrencyCode(): ?CurrencyCode
    {
        return $this->currencyCode;
    }

    /**
     * @return CurrencyCode
     */
    public function getCurrencyCodeWithCreate(): CurrencyCode
    {
        $this->currencyCode ??= new CurrencyCode();

        return $this->currencyCode;
    }

    /**
     * @param  null|CurrencyCode $currencyCode
     * @return static
     */
    public function setCurrencyCode(
        ?CurrencyCode $currencyCode = null
    ): static {
        $this->currencyCode = $currencyCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCurrencyCode(): static
    {
        $this->currencyCode = null;

        return $this;
    }

    /**
     * @return null|array<PaymentNote>
     */
    public function getPaymentNote(): ?array
    {
        return $this->paymentNote;
    }

    /**
     * @param  null|array<PaymentNote> $paymentNote
     * @return static
     */
    public function setPaymentNote(
        ?array $paymentNote = null
    ): static {
        $this->paymentNote = $paymentNote;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaymentNote(): static
    {
        $this->paymentNote = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearPaymentNote(): static
    {
        $this->paymentNote = [];

        return $this;
    }

    /**
     * @return null|PaymentNote
     */
    public function firstPaymentNote(): ?PaymentNote
    {
        $paymentNote = $this->paymentNote ?? [];
        $paymentNote = reset($paymentNote);

        if (false === $paymentNote) {
            return null;
        }

        return $paymentNote;
    }

    /**
     * @return null|PaymentNote
     */
    public function lastPaymentNote(): ?PaymentNote
    {
        $paymentNote = $this->paymentNote ?? [];
        $paymentNote = end($paymentNote);

        if (false === $paymentNote) {
            return null;
        }

        return $paymentNote;
    }

    /**
     * @param  PaymentNote $paymentNote
     * @return static
     */
    public function addToPaymentNote(
        PaymentNote $paymentNote
    ): static {
        $this->paymentNote[] = $paymentNote;

        return $this;
    }

    /**
     * @return PaymentNote
     */
    public function addToPaymentNoteWithCreate(): PaymentNote
    {
        $this->addTopaymentNote($paymentNote = new PaymentNote());

        return $paymentNote;
    }

    /**
     * @param  PaymentNote $paymentNote
     * @return static
     */
    public function addOnceToPaymentNote(
        PaymentNote $paymentNote
    ): static {
        if (!is_array($this->paymentNote)) {
            $this->paymentNote = [];
        }

        $this->paymentNote[0] = $paymentNote;

        return $this;
    }

    /**
     * @return PaymentNote
     */
    public function addOnceToPaymentNoteWithCreate(): PaymentNote
    {
        if (!is_array($this->paymentNote)) {
            $this->paymentNote = [];
        }

        if ([] === $this->paymentNote) {
            $this->addOnceTopaymentNote(new PaymentNote());
        }

        return $this->paymentNote[0];
    }

    /**
     * @return null|FinancialInstitutionBranch
     */
    public function getFinancialInstitutionBranch(): ?FinancialInstitutionBranch
    {
        return $this->financialInstitutionBranch;
    }

    /**
     * @return FinancialInstitutionBranch
     */
    public function getFinancialInstitutionBranchWithCreate(): FinancialInstitutionBranch
    {
        $this->financialInstitutionBranch ??= new FinancialInstitutionBranch();

        return $this->financialInstitutionBranch;
    }

    /**
     * @param  null|FinancialInstitutionBranch $financialInstitutionBranch
     * @return static
     */
    public function setFinancialInstitutionBranch(
        ?FinancialInstitutionBranch $financialInstitutionBranch = null,
    ): static {
        $this->financialInstitutionBranch = $financialInstitutionBranch;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFinancialInstitutionBranch(): static
    {
        $this->financialInstitutionBranch = null;

        return $this;
    }

    /**
     * @return null|Country
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }

    /**
     * @return Country
     */
    public function getCountryWithCreate(): Country
    {
        $this->country ??= new Country();

        return $this->country;
    }

    /**
     * @param  null|Country $country
     * @return static
     */
    public function setCountry(
        ?Country $country = null
    ): static {
        $this->country = $country;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCountry(): static
    {
        $this->country = null;

        return $this;
    }
}
