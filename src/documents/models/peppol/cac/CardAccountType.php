<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CardChipCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CardTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ChipApplicationID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\CV2ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\HolderName;
use horstoeko\invoicesuite\documents\models\peppol\cbc\IssueNumberID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\IssuerID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NetworkID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PrimaryAccountNumberID;
use JMS\Serializer\Annotation as JMS;

class CardAccountType
{
    use HandlesObjectFlags;

    /**
     * @var null|PrimaryAccountNumberID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PrimaryAccountNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("PrimaryAccountNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrimaryAccountNumberID", setter="setPrimaryAccountNumberID")
     */
    private $primaryAccountNumberID;

    /**
     * @var null|NetworkID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NetworkID")
     * @JMS\Expose
     * @JMS\SerializedName("NetworkID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetworkID", setter="setNetworkID")
     */
    private $networkID;

    /**
     * @var null|CardTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CardTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CardTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCardTypeCode", setter="setCardTypeCode")
     */
    private $cardTypeCode;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityStartDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityStartDate", setter="setValidityStartDate")
     */
    private $validityStartDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryDate", setter="setExpiryDate")
     */
    private $expiryDate;

    /**
     * @var null|IssuerID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\IssuerID")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerID", setter="setIssuerID")
     */
    private $issuerID;

    /**
     * @var null|IssueNumberID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\IssueNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("IssueNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueNumberID", setter="setIssueNumberID")
     */
    private $issueNumberID;

    /**
     * @var null|CV2ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CV2ID")
     * @JMS\Expose
     * @JMS\SerializedName("CV2ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCV2ID", setter="setCV2ID")
     */
    private $cV2ID;

    /**
     * @var null|CardChipCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\CardChipCode")
     * @JMS\Expose
     * @JMS\SerializedName("CardChipCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCardChipCode", setter="setCardChipCode")
     */
    private $cardChipCode;

    /**
     * @var null|ChipApplicationID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ChipApplicationID")
     * @JMS\Expose
     * @JMS\SerializedName("ChipApplicationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChipApplicationID", setter="setChipApplicationID")
     */
    private $chipApplicationID;

    /**
     * @var null|HolderName
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\HolderName")
     * @JMS\Expose
     * @JMS\SerializedName("HolderName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHolderName", setter="setHolderName")
     */
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
        $this->primaryAccountNumberID = is_null($this->primaryAccountNumberID) ? new PrimaryAccountNumberID() : $this->primaryAccountNumberID;

        return $this->primaryAccountNumberID;
    }

    /**
     * @param  null|PrimaryAccountNumberID $primaryAccountNumberID
     * @return static
     */
    public function setPrimaryAccountNumberID(?PrimaryAccountNumberID $primaryAccountNumberID = null): static
    {
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
        $this->networkID = is_null($this->networkID) ? new NetworkID() : $this->networkID;

        return $this->networkID;
    }

    /**
     * @param  null|NetworkID $networkID
     * @return static
     */
    public function setNetworkID(?NetworkID $networkID = null): static
    {
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
        $this->cardTypeCode = is_null($this->cardTypeCode) ? new CardTypeCode() : $this->cardTypeCode;

        return $this->cardTypeCode;
    }

    /**
     * @param  null|CardTypeCode $cardTypeCode
     * @return static
     */
    public function setCardTypeCode(?CardTypeCode $cardTypeCode = null): static
    {
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
    public function setValidityStartDate(?DateTimeInterface $validityStartDate = null): static
    {
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
    public function setExpiryDate(?DateTimeInterface $expiryDate = null): static
    {
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
        $this->issuerID = is_null($this->issuerID) ? new IssuerID() : $this->issuerID;

        return $this->issuerID;
    }

    /**
     * @param  null|IssuerID $issuerID
     * @return static
     */
    public function setIssuerID(?IssuerID $issuerID = null): static
    {
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
        $this->issueNumberID = is_null($this->issueNumberID) ? new IssueNumberID() : $this->issueNumberID;

        return $this->issueNumberID;
    }

    /**
     * @param  null|IssueNumberID $issueNumberID
     * @return static
     */
    public function setIssueNumberID(?IssueNumberID $issueNumberID = null): static
    {
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
        $this->cV2ID = is_null($this->cV2ID) ? new CV2ID() : $this->cV2ID;

        return $this->cV2ID;
    }

    /**
     * @param  null|CV2ID $cV2ID
     * @return static
     */
    public function setCV2ID(?CV2ID $cV2ID = null): static
    {
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
        $this->cardChipCode = is_null($this->cardChipCode) ? new CardChipCode() : $this->cardChipCode;

        return $this->cardChipCode;
    }

    /**
     * @param  null|CardChipCode $cardChipCode
     * @return static
     */
    public function setCardChipCode(?CardChipCode $cardChipCode = null): static
    {
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
        $this->chipApplicationID = is_null($this->chipApplicationID) ? new ChipApplicationID() : $this->chipApplicationID;

        return $this->chipApplicationID;
    }

    /**
     * @param  null|ChipApplicationID $chipApplicationID
     * @return static
     */
    public function setChipApplicationID(?ChipApplicationID $chipApplicationID = null): static
    {
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
        $this->holderName = is_null($this->holderName) ? new HolderName() : $this->holderName;

        return $this->holderName;
    }

    /**
     * @param  null|HolderName $holderName
     * @return static
     */
    public function setHolderName(?HolderName $holderName = null): static
    {
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
