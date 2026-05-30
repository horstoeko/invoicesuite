<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FaceValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ImmobilizationCertificateID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MarketValueAmount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SecurityID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SharesNumberQuantity;
use JMS\Serializer\Annotation as JMS;

class ImmobilizedSecurityType
{
    use HandlesObjectFlags;

    /**
     * @var null|ImmobilizationCertificateID
     */
    #[JMS\Accessor(getter: 'getImmobilizationCertificateID', setter: 'setImmobilizationCertificateID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ImmobilizationCertificateID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ImmobilizationCertificateID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $immobilizationCertificateID;

    /**
     * @var null|SecurityID
     */
    #[JMS\Accessor(getter: 'getSecurityID', setter: 'setSecurityID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SecurityID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SecurityID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $securityID;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getIssueDate', setter: 'setIssueDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssueDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $issueDate;

    /**
     * @var null|FaceValueAmount
     */
    #[JMS\Accessor(getter: 'getFaceValueAmount', setter: 'setFaceValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('FaceValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\FaceValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $faceValueAmount;

    /**
     * @var null|MarketValueAmount
     */
    #[JMS\Accessor(getter: 'getMarketValueAmount', setter: 'setMarketValueAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MarketValueAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\MarketValueAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $marketValueAmount;

    /**
     * @var null|SharesNumberQuantity
     */
    #[JMS\Accessor(getter: 'getSharesNumberQuantity', setter: 'setSharesNumberQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SharesNumberQuantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\SharesNumberQuantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $sharesNumberQuantity;

    /**
     * @var null|IssuerParty
     */
    #[JMS\Accessor(getter: 'getIssuerParty', setter: 'setIssuerParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('IssuerParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\IssuerParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
        $this->immobilizationCertificateID ??= new ImmobilizationCertificateID();

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
        $this->securityID ??= new SecurityID();

        return $this->securityID;
    }

    /**
     * @param  null|SecurityID $securityID
     * @return static
     */
    public function setSecurityID(
        ?SecurityID $securityID = null
    ): static {
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
    public function setIssueDate(
        ?DateTimeInterface $issueDate = null
    ): static {
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
        $this->faceValueAmount ??= new FaceValueAmount();

        return $this->faceValueAmount;
    }

    /**
     * @param  null|FaceValueAmount $faceValueAmount
     * @return static
     */
    public function setFaceValueAmount(
        ?FaceValueAmount $faceValueAmount = null
    ): static {
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
        $this->marketValueAmount ??= new MarketValueAmount();

        return $this->marketValueAmount;
    }

    /**
     * @param  null|MarketValueAmount $marketValueAmount
     * @return static
     */
    public function setMarketValueAmount(
        ?MarketValueAmount $marketValueAmount = null
    ): static {
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
        $this->sharesNumberQuantity ??= new SharesNumberQuantity();

        return $this->sharesNumberQuantity;
    }

    /**
     * @param  null|SharesNumberQuantity $sharesNumberQuantity
     * @return static
     */
    public function setSharesNumberQuantity(
        ?SharesNumberQuantity $sharesNumberQuantity = null
    ): static {
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
        $this->issuerParty ??= new IssuerParty();

        return $this->issuerParty;
    }

    /**
     * @param  null|IssuerParty $issuerParty
     * @return static
     */
    public function setIssuerParty(
        ?IssuerParty $issuerParty = null
    ): static {
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
