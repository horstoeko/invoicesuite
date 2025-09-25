<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FaceValueAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ImmobilizationCertificateID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\MarketValueAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SecurityID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\SharesNumberQuantity;

class ImmobilizedSecurityType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ImmobilizationCertificateID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ImmobilizationCertificateID")
     * @JMS\Expose
     * @JMS\SerializedName("ImmobilizationCertificateID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getImmobilizationCertificateID", setter="setImmobilizationCertificateID")
     */
    private $immobilizationCertificateID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\SecurityID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\SecurityID")
     * @JMS\Expose
     * @JMS\SerializedName("SecurityID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSecurityID", setter="setSecurityID")
     */
    private $securityID;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FaceValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FaceValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FaceValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFaceValueAmount", setter="setFaceValueAmount")
     */
    private $faceValueAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\MarketValueAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\MarketValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MarketValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarketValueAmount", setter="setMarketValueAmount")
     */
    private $marketValueAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\SharesNumberQuantity|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\SharesNumberQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("SharesNumberQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSharesNumberQuantity", setter="setSharesNumberQuantity")
     */
    private $sharesNumberQuantity;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ImmobilizationCertificateID|null
     */
    public function getImmobilizationCertificateID(): ?ImmobilizationCertificateID
    {
        return $this->immobilizationCertificateID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ImmobilizationCertificateID
     */
    public function getImmobilizationCertificateIDWithCreate(): ImmobilizationCertificateID
    {
        $this->immobilizationCertificateID = is_null($this->immobilizationCertificateID) ? new ImmobilizationCertificateID() : $this->immobilizationCertificateID;

        return $this->immobilizationCertificateID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ImmobilizationCertificateID|null $immobilizationCertificateID
     * @return self
     */
    public function setImmobilizationCertificateID(
        ?ImmobilizationCertificateID $immobilizationCertificateID = null,
    ): self {
        $this->immobilizationCertificateID = $immobilizationCertificateID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetImmobilizationCertificateID(): self
    {
        $this->immobilizationCertificateID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SecurityID|null
     */
    public function getSecurityID(): ?SecurityID
    {
        return $this->securityID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SecurityID
     */
    public function getSecurityIDWithCreate(): SecurityID
    {
        $this->securityID = is_null($this->securityID) ? new SecurityID() : $this->securityID;

        return $this->securityID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SecurityID|null $securityID
     * @return self
     */
    public function setSecurityID(?SecurityID $securityID = null): self
    {
        $this->securityID = $securityID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSecurityID(): self
    {
        $this->securityID = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param \DateTimeInterface|null $issueDate
     * @return self
     */
    public function setIssueDate(?\DateTimeInterface $issueDate = null): self
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssueDate(): self
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FaceValueAmount|null
     */
    public function getFaceValueAmount(): ?FaceValueAmount
    {
        return $this->faceValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FaceValueAmount
     */
    public function getFaceValueAmountWithCreate(): FaceValueAmount
    {
        $this->faceValueAmount = is_null($this->faceValueAmount) ? new FaceValueAmount() : $this->faceValueAmount;

        return $this->faceValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FaceValueAmount|null $faceValueAmount
     * @return self
     */
    public function setFaceValueAmount(?FaceValueAmount $faceValueAmount = null): self
    {
        $this->faceValueAmount = $faceValueAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFaceValueAmount(): self
    {
        $this->faceValueAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MarketValueAmount|null
     */
    public function getMarketValueAmount(): ?MarketValueAmount
    {
        return $this->marketValueAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\MarketValueAmount
     */
    public function getMarketValueAmountWithCreate(): MarketValueAmount
    {
        $this->marketValueAmount = is_null($this->marketValueAmount) ? new MarketValueAmount() : $this->marketValueAmount;

        return $this->marketValueAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\MarketValueAmount|null $marketValueAmount
     * @return self
     */
    public function setMarketValueAmount(?MarketValueAmount $marketValueAmount = null): self
    {
        $this->marketValueAmount = $marketValueAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMarketValueAmount(): self
    {
        $this->marketValueAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SharesNumberQuantity|null
     */
    public function getSharesNumberQuantity(): ?SharesNumberQuantity
    {
        return $this->sharesNumberQuantity;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\SharesNumberQuantity
     */
    public function getSharesNumberQuantityWithCreate(): SharesNumberQuantity
    {
        $this->sharesNumberQuantity = is_null($this->sharesNumberQuantity) ? new SharesNumberQuantity() : $this->sharesNumberQuantity;

        return $this->sharesNumberQuantity;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\SharesNumberQuantity|null $sharesNumberQuantity
     * @return self
     */
    public function setSharesNumberQuantity(?SharesNumberQuantity $sharesNumberQuantity = null): self
    {
        $this->sharesNumberQuantity = $sharesNumberQuantity;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSharesNumberQuantity(): self
    {
        $this->sharesNumberQuantity = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty|null
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\IssuerParty|null $issuerParty
     * @return self
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): self
    {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetIssuerParty(): self
    {
        $this->issuerParty = null;

        return $this;
    }
}
