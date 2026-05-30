<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CardChipCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CardTypeCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChipApplicationID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CV2ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HolderName;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IssueNumberID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IssuerID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetworkID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrimaryAccountNumberID;
use JMS\Serializer\Annotation as JMS;

class CardAccountType
{
    use HandlesObjectFlags;

    /**
     * @var null|PrimaryAccountNumberID
     */
    #[JMS\Accessor(getter: 'getPrimaryAccountNumberID', setter: 'setPrimaryAccountNumberID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PrimaryAccountNumberID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PrimaryAccountNumberID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $primaryAccountNumberID;

    /**
     * @var null|NetworkID
     */
    #[JMS\Accessor(getter: 'getNetworkID', setter: 'setNetworkID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('NetworkID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\NetworkID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $networkID;

    /**
     * @var null|CardTypeCode
     */
    #[JMS\Accessor(getter: 'getCardTypeCode', setter: 'setCardTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CardTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CardTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $cardTypeCode;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getValidityStartDate', setter: 'setValidityStartDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidityStartDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $validityStartDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getExpiryDate', setter: 'setExpiryDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ExpiryDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $expiryDate;

    /**
     * @var null|IssuerID
     */
    #[JMS\Accessor(getter: 'getIssuerID', setter: 'setIssuerID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssuerID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IssuerID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issuerID;

    /**
     * @var null|IssueNumberID
     */
    #[JMS\Accessor(getter: 'getIssueNumberID', setter: 'setIssueNumberID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueNumberID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\IssueNumberID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueNumberID;

    /**
     * @var null|CV2ID
     */
    #[JMS\Accessor(getter: 'getCV2ID', setter: 'setCV2ID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CV2ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CV2ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $cV2ID;

    /**
     * @var null|CardChipCode
     */
    #[JMS\Accessor(getter: 'getCardChipCode', setter: 'setCardChipCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('CardChipCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\CardChipCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $cardChipCode;

    /**
     * @var null|ChipApplicationID
     */
    #[JMS\Accessor(getter: 'getChipApplicationID', setter: 'setChipApplicationID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ChipApplicationID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChipApplicationID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $chipApplicationID;

    /**
     * @var null|HolderName
     */
    #[JMS\Accessor(getter: 'getHolderName', setter: 'setHolderName')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('HolderName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\HolderName')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $holderName;

    /**
     * @return null|PrimaryAccountNumberID
     */
    public function getPrimaryAccountNumberID(): ?PrimaryAccountNumberID
    {
        return $this->primaryAccountNumberID;
    }

    /**
     * @return PrimaryAccountNumberID
     */
    public function getPrimaryAccountNumberIDWithCreate(): PrimaryAccountNumberID
    {
        $this->primaryAccountNumberID ??= new PrimaryAccountNumberID();

        return $this->primaryAccountNumberID;
    }

    /**
     * @param  null|PrimaryAccountNumberID $primaryAccountNumberID
     * @return static
     */
    public function setPrimaryAccountNumberID(
        ?PrimaryAccountNumberID $primaryAccountNumberID = null
    ): static {
        $this->primaryAccountNumberID = $primaryAccountNumberID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPrimaryAccountNumberID(): static
    {
        $this->primaryAccountNumberID = null;

        return $this;
    }

    /**
     * @return null|NetworkID
     */
    public function getNetworkID(): ?NetworkID
    {
        return $this->networkID;
    }

    /**
     * @return NetworkID
     */
    public function getNetworkIDWithCreate(): NetworkID
    {
        $this->networkID ??= new NetworkID();

        return $this->networkID;
    }

    /**
     * @param  null|NetworkID $networkID
     * @return static
     */
    public function setNetworkID(
        ?NetworkID $networkID = null
    ): static {
        $this->networkID = $networkID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNetworkID(): static
    {
        $this->networkID = null;

        return $this;
    }

    /**
     * @return null|CardTypeCode
     */
    public function getCardTypeCode(): ?CardTypeCode
    {
        return $this->cardTypeCode;
    }

    /**
     * @return CardTypeCode
     */
    public function getCardTypeCodeWithCreate(): CardTypeCode
    {
        $this->cardTypeCode ??= new CardTypeCode();

        return $this->cardTypeCode;
    }

    /**
     * @param  null|CardTypeCode $cardTypeCode
     * @return static
     */
    public function setCardTypeCode(
        ?CardTypeCode $cardTypeCode = null
    ): static {
        $this->cardTypeCode = $cardTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCardTypeCode(): static
    {
        $this->cardTypeCode = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getValidityStartDate(): ?DateTimeInterface
    {
        return $this->validityStartDate;
    }

    /**
     * @param  null|DateTimeInterface $validityStartDate
     * @return static
     */
    public function setValidityStartDate(
        ?DateTimeInterface $validityStartDate = null
    ): static {
        $this->validityStartDate = $validityStartDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityStartDate(): static
    {
        $this->validityStartDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getExpiryDate(): ?DateTimeInterface
    {
        return $this->expiryDate;
    }

    /**
     * @param  null|DateTimeInterface $expiryDate
     * @return static
     */
    public function setExpiryDate(
        ?DateTimeInterface $expiryDate = null
    ): static {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetExpiryDate(): static
    {
        $this->expiryDate = null;

        return $this;
    }

    /**
     * @return null|IssuerID
     */
    public function getIssuerID(): ?IssuerID
    {
        return $this->issuerID;
    }

    /**
     * @return IssuerID
     */
    public function getIssuerIDWithCreate(): IssuerID
    {
        $this->issuerID ??= new IssuerID();

        return $this->issuerID;
    }

    /**
     * @param  null|IssuerID $issuerID
     * @return static
     */
    public function setIssuerID(
        ?IssuerID $issuerID = null
    ): static {
        $this->issuerID = $issuerID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuerID(): static
    {
        $this->issuerID = null;

        return $this;
    }

    /**
     * @return null|IssueNumberID
     */
    public function getIssueNumberID(): ?IssueNumberID
    {
        return $this->issueNumberID;
    }

    /**
     * @return IssueNumberID
     */
    public function getIssueNumberIDWithCreate(): IssueNumberID
    {
        $this->issueNumberID ??= new IssueNumberID();

        return $this->issueNumberID;
    }

    /**
     * @param  null|IssueNumberID $issueNumberID
     * @return static
     */
    public function setIssueNumberID(
        ?IssueNumberID $issueNumberID = null
    ): static {
        $this->issueNumberID = $issueNumberID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueNumberID(): static
    {
        $this->issueNumberID = null;

        return $this;
    }

    /**
     * @return null|CV2ID
     */
    public function getCV2ID(): ?CV2ID
    {
        return $this->cV2ID;
    }

    /**
     * @return CV2ID
     */
    public function getCV2IDWithCreate(): CV2ID
    {
        $this->cV2ID ??= new CV2ID();

        return $this->cV2ID;
    }

    /**
     * @param  null|CV2ID $cV2ID
     * @return static
     */
    public function setCV2ID(
        ?CV2ID $cV2ID = null
    ): static {
        $this->cV2ID = $cV2ID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCV2ID(): static
    {
        $this->cV2ID = null;

        return $this;
    }

    /**
     * @return null|CardChipCode
     */
    public function getCardChipCode(): ?CardChipCode
    {
        return $this->cardChipCode;
    }

    /**
     * @return CardChipCode
     */
    public function getCardChipCodeWithCreate(): CardChipCode
    {
        $this->cardChipCode ??= new CardChipCode();

        return $this->cardChipCode;
    }

    /**
     * @param  null|CardChipCode $cardChipCode
     * @return static
     */
    public function setCardChipCode(
        ?CardChipCode $cardChipCode = null
    ): static {
        $this->cardChipCode = $cardChipCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCardChipCode(): static
    {
        $this->cardChipCode = null;

        return $this;
    }

    /**
     * @return null|ChipApplicationID
     */
    public function getChipApplicationID(): ?ChipApplicationID
    {
        return $this->chipApplicationID;
    }

    /**
     * @return ChipApplicationID
     */
    public function getChipApplicationIDWithCreate(): ChipApplicationID
    {
        $this->chipApplicationID ??= new ChipApplicationID();

        return $this->chipApplicationID;
    }

    /**
     * @param  null|ChipApplicationID $chipApplicationID
     * @return static
     */
    public function setChipApplicationID(
        ?ChipApplicationID $chipApplicationID = null
    ): static {
        $this->chipApplicationID = $chipApplicationID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChipApplicationID(): static
    {
        $this->chipApplicationID = null;

        return $this;
    }

    /**
     * @return null|HolderName
     */
    public function getHolderName(): ?HolderName
    {
        return $this->holderName;
    }

    /**
     * @return HolderName
     */
    public function getHolderNameWithCreate(): HolderName
    {
        $this->holderName ??= new HolderName();

        return $this->holderName;
    }

    /**
     * @param  null|HolderName $holderName
     * @return static
     */
    public function setHolderName(
        ?HolderName $holderName = null
    ): static {
        $this->holderName = $holderName;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetHolderName(): static
    {
        $this->holderName = null;

        return $this;
    }
}
