<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\FaceValueAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ImmobilizationCertificateID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\MarketValueAmount;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SecurityID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SharesNumberQuantity;
use JMS\Serializer\Annotation as JMS;

class ImmobilizedSecurityType
{
    use HandlesObjectFlags;

    /**
     * @var null|ImmobilizationCertificateID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ImmobilizationCertificateID")
     * @JMS\Expose
     * @JMS\SerializedName("ImmobilizationCertificateID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getImmobilizationCertificateID", setter="setImmobilizationCertificateID")
     */
    private $immobilizationCertificateID;

    /**
     * @var null|SecurityID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SecurityID")
     * @JMS\Expose
     * @JMS\SerializedName("SecurityID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSecurityID", setter="setSecurityID")
     */
    private $securityID;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("IssueDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssueDate", setter="setIssueDate")
     */
    private $issueDate;

    /**
     * @var null|FaceValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\FaceValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FaceValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFaceValueAmount", setter="setFaceValueAmount")
     */
    private $faceValueAmount;

    /**
     * @var null|MarketValueAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\MarketValueAmount")
     * @JMS\Expose
     * @JMS\SerializedName("MarketValueAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMarketValueAmount", setter="setMarketValueAmount")
     */
    private $marketValueAmount;

    /**
     * @var null|SharesNumberQuantity
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SharesNumberQuantity")
     * @JMS\Expose
     * @JMS\SerializedName("SharesNumberQuantity")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSharesNumberQuantity", setter="setSharesNumberQuantity")
     */
    private $sharesNumberQuantity;

    /**
     * @var null|IssuerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @return null|ImmobilizationCertificateID
     */
    public function getImmobilizationCertificateID(): ?ImmobilizationCertificateID
    {
        return $this->immobilizationCertificateID;
    }

    /**
     * @return ImmobilizationCertificateID
     */
    public function getImmobilizationCertificateIDWithCreate(): ImmobilizationCertificateID
    {
        $this->immobilizationCertificateID = is_null($this->immobilizationCertificateID) ? new ImmobilizationCertificateID() : $this->immobilizationCertificateID;

        return $this->immobilizationCertificateID;
    }

    /**
     * @param  null|ImmobilizationCertificateID $immobilizationCertificateID
     * @return static
     */
    public function setImmobilizationCertificateID(
        ?ImmobilizationCertificateID $immobilizationCertificateID = null,
    ): static {
        $this->immobilizationCertificateID = $immobilizationCertificateID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetImmobilizationCertificateID(): static
    {
        $this->immobilizationCertificateID = null;

        return $this;
    }

    /**
     * @return null|SecurityID
     */
    public function getSecurityID(): ?SecurityID
    {
        return $this->securityID;
    }

    /**
     * @return SecurityID
     */
    public function getSecurityIDWithCreate(): SecurityID
    {
        $this->securityID = is_null($this->securityID) ? new SecurityID() : $this->securityID;

        return $this->securityID;
    }

    /**
     * @param  null|SecurityID $securityID
     * @return static
     */
    public function setSecurityID(?SecurityID $securityID = null): static
    {
        $this->securityID = $securityID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSecurityID(): static
    {
        $this->securityID = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getIssueDate(): ?DateTimeInterface
    {
        return $this->issueDate;
    }

    /**
     * @param  null|DateTimeInterface $issueDate
     * @return static
     */
    public function setIssueDate(?DateTimeInterface $issueDate = null): static
    {
        $this->issueDate = $issueDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssueDate(): static
    {
        $this->issueDate = null;

        return $this;
    }

    /**
     * @return null|FaceValueAmount
     */
    public function getFaceValueAmount(): ?FaceValueAmount
    {
        return $this->faceValueAmount;
    }

    /**
     * @return FaceValueAmount
     */
    public function getFaceValueAmountWithCreate(): FaceValueAmount
    {
        $this->faceValueAmount = is_null($this->faceValueAmount) ? new FaceValueAmount() : $this->faceValueAmount;

        return $this->faceValueAmount;
    }

    /**
     * @param  null|FaceValueAmount $faceValueAmount
     * @return static
     */
    public function setFaceValueAmount(?FaceValueAmount $faceValueAmount = null): static
    {
        $this->faceValueAmount = $faceValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFaceValueAmount(): static
    {
        $this->faceValueAmount = null;

        return $this;
    }

    /**
     * @return null|MarketValueAmount
     */
    public function getMarketValueAmount(): ?MarketValueAmount
    {
        return $this->marketValueAmount;
    }

    /**
     * @return MarketValueAmount
     */
    public function getMarketValueAmountWithCreate(): MarketValueAmount
    {
        $this->marketValueAmount = is_null($this->marketValueAmount) ? new MarketValueAmount() : $this->marketValueAmount;

        return $this->marketValueAmount;
    }

    /**
     * @param  null|MarketValueAmount $marketValueAmount
     * @return static
     */
    public function setMarketValueAmount(?MarketValueAmount $marketValueAmount = null): static
    {
        $this->marketValueAmount = $marketValueAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMarketValueAmount(): static
    {
        $this->marketValueAmount = null;

        return $this;
    }

    /**
     * @return null|SharesNumberQuantity
     */
    public function getSharesNumberQuantity(): ?SharesNumberQuantity
    {
        return $this->sharesNumberQuantity;
    }

    /**
     * @return SharesNumberQuantity
     */
    public function getSharesNumberQuantityWithCreate(): SharesNumberQuantity
    {
        $this->sharesNumberQuantity = is_null($this->sharesNumberQuantity) ? new SharesNumberQuantity() : $this->sharesNumberQuantity;

        return $this->sharesNumberQuantity;
    }

    /**
     * @param  null|SharesNumberQuantity $sharesNumberQuantity
     * @return static
     */
    public function setSharesNumberQuantity(?SharesNumberQuantity $sharesNumberQuantity = null): static
    {
        $this->sharesNumberQuantity = $sharesNumberQuantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSharesNumberQuantity(): static
    {
        $this->sharesNumberQuantity = null;

        return $this;
    }

    /**
     * @return null|IssuerParty
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param  null|IssuerParty $issuerParty
     * @return static
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): static
    {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuerParty(): static
    {
        $this->issuerParty = null;

        return $this;
    }
}
