<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\CV2ID;
use horstoeko\invoicesuite\models\ubl\cbc\CardChipCode;
use horstoeko\invoicesuite\models\ubl\cbc\CardTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\ChipApplicationID;
use horstoeko\invoicesuite\models\ubl\cbc\HolderName;
use horstoeko\invoicesuite\models\ubl\cbc\IssueNumberID;
use horstoeko\invoicesuite\models\ubl\cbc\IssuerID;
use horstoeko\invoicesuite\models\ubl\cbc\NetworkID;
use horstoeko\invoicesuite\models\ubl\cbc\PrimaryAccountNumberID;

class CardAccountType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PrimaryAccountNumberID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PrimaryAccountNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("PrimaryAccountNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrimaryAccountNumberID", setter="setPrimaryAccountNumberID")
     */
    private $primaryAccountNumberID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NetworkID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NetworkID")
     * @JMS\Expose
     * @JMS\SerializedName("NetworkID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNetworkID", setter="setNetworkID")
     */
    private $networkID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CardTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CardTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("CardTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCardTypeCode", setter="setCardTypeCode")
     */
    private $cardTypeCode;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ValidityStartDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValidityStartDate", setter="setValidityStartDate")
     */
    private $validityStartDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ExpiryDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getExpiryDate", setter="setExpiryDate")
     */
    private $expiryDate;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\IssuerID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\IssuerID")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerID", setter="setIssuerID")
     */
    private $issuerID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\IssueNumberID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\IssueNumberID")
     * @JMS\Expose
     * @JMS\SerializedName("IssueNumberID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueNumberID", setter="setIssueNumberID")
     */
    private $issueNumberID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CV2ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CV2ID")
     * @JMS\Expose
     * @JMS\SerializedName("CV2ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCV2ID", setter="setCV2ID")
     */
    private $cV2ID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\CardChipCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\CardChipCode")
     * @JMS\Expose
     * @JMS\SerializedName("CardChipCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCardChipCode", setter="setCardChipCode")
     */
    private $cardChipCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ChipApplicationID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ChipApplicationID")
     * @JMS\Expose
     * @JMS\SerializedName("ChipApplicationID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChipApplicationID", setter="setChipApplicationID")
     */
    private $chipApplicationID;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\HolderName|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\HolderName")
     * @JMS\Expose
     * @JMS\SerializedName("HolderName")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getHolderName", setter="setHolderName")
     */
    private $holderName;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrimaryAccountNumberID|null
     */
    public function getPrimaryAccountNumberID(): ?PrimaryAccountNumberID
    {
        return $this->primaryAccountNumberID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PrimaryAccountNumberID
     */
    public function getPrimaryAccountNumberIDWithCreate(): PrimaryAccountNumberID
    {
        $this->primaryAccountNumberID = is_null($this->primaryAccountNumberID) ? new PrimaryAccountNumberID() : $this->primaryAccountNumberID;

        return $this->primaryAccountNumberID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PrimaryAccountNumberID|null $primaryAccountNumberID
     * @return self
     */
    public function setPrimaryAccountNumberID(?PrimaryAccountNumberID $primaryAccountNumberID = null): self
    {
        $this->primaryAccountNumberID = $primaryAccountNumberID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetworkID|null
     */
    public function getNetworkID(): ?NetworkID
    {
        return $this->networkID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NetworkID
     */
    public function getNetworkIDWithCreate(): NetworkID
    {
        $this->networkID = is_null($this->networkID) ? new NetworkID() : $this->networkID;

        return $this->networkID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NetworkID|null $networkID
     * @return self
     */
    public function setNetworkID(?NetworkID $networkID = null): self
    {
        $this->networkID = $networkID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CardTypeCode|null
     */
    public function getCardTypeCode(): ?CardTypeCode
    {
        return $this->cardTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CardTypeCode
     */
    public function getCardTypeCodeWithCreate(): CardTypeCode
    {
        $this->cardTypeCode = is_null($this->cardTypeCode) ? new CardTypeCode() : $this->cardTypeCode;

        return $this->cardTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CardTypeCode|null $cardTypeCode
     * @return self
     */
    public function setCardTypeCode(?CardTypeCode $cardTypeCode = null): self
    {
        $this->cardTypeCode = $cardTypeCode;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getValidityStartDate(): ?\DateTimeInterface
    {
        return $this->validityStartDate;
    }

    /**
     * @param \DateTimeInterface|null $validityStartDate
     * @return self
     */
    public function setValidityStartDate(?\DateTimeInterface $validityStartDate = null): self
    {
        $this->validityStartDate = $validityStartDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    /**
     * @param \DateTimeInterface|null $expiryDate
     * @return self
     */
    public function setExpiryDate(?\DateTimeInterface $expiryDate = null): self
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IssuerID|null
     */
    public function getIssuerID(): ?IssuerID
    {
        return $this->issuerID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IssuerID
     */
    public function getIssuerIDWithCreate(): IssuerID
    {
        $this->issuerID = is_null($this->issuerID) ? new IssuerID() : $this->issuerID;

        return $this->issuerID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\IssuerID|null $issuerID
     * @return self
     */
    public function setIssuerID(?IssuerID $issuerID = null): self
    {
        $this->issuerID = $issuerID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IssueNumberID|null
     */
    public function getIssueNumberID(): ?IssueNumberID
    {
        return $this->issueNumberID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\IssueNumberID
     */
    public function getIssueNumberIDWithCreate(): IssueNumberID
    {
        $this->issueNumberID = is_null($this->issueNumberID) ? new IssueNumberID() : $this->issueNumberID;

        return $this->issueNumberID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\IssueNumberID|null $issueNumberID
     * @return self
     */
    public function setIssueNumberID(?IssueNumberID $issueNumberID = null): self
    {
        $this->issueNumberID = $issueNumberID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CV2ID|null
     */
    public function getCV2ID(): ?CV2ID
    {
        return $this->cV2ID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CV2ID
     */
    public function getCV2IDWithCreate(): CV2ID
    {
        $this->cV2ID = is_null($this->cV2ID) ? new CV2ID() : $this->cV2ID;

        return $this->cV2ID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CV2ID|null $cV2ID
     * @return self
     */
    public function setCV2ID(?CV2ID $cV2ID = null): self
    {
        $this->cV2ID = $cV2ID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CardChipCode|null
     */
    public function getCardChipCode(): ?CardChipCode
    {
        return $this->cardChipCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\CardChipCode
     */
    public function getCardChipCodeWithCreate(): CardChipCode
    {
        $this->cardChipCode = is_null($this->cardChipCode) ? new CardChipCode() : $this->cardChipCode;

        return $this->cardChipCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\CardChipCode|null $cardChipCode
     * @return self
     */
    public function setCardChipCode(?CardChipCode $cardChipCode = null): self
    {
        $this->cardChipCode = $cardChipCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ChipApplicationID|null
     */
    public function getChipApplicationID(): ?ChipApplicationID
    {
        return $this->chipApplicationID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ChipApplicationID
     */
    public function getChipApplicationIDWithCreate(): ChipApplicationID
    {
        $this->chipApplicationID = is_null($this->chipApplicationID) ? new ChipApplicationID() : $this->chipApplicationID;

        return $this->chipApplicationID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ChipApplicationID|null $chipApplicationID
     * @return self
     */
    public function setChipApplicationID(?ChipApplicationID $chipApplicationID = null): self
    {
        $this->chipApplicationID = $chipApplicationID;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HolderName|null
     */
    public function getHolderName(): ?HolderName
    {
        return $this->holderName;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\HolderName
     */
    public function getHolderNameWithCreate(): HolderName
    {
        $this->holderName = is_null($this->holderName) ? new HolderName() : $this->holderName;

        return $this->holderName;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\HolderName|null $holderName
     * @return self
     */
    public function setHolderName(?HolderName $holderName = null): self
    {
        $this->holderName = $holderName;

        return $this;
    }
}
