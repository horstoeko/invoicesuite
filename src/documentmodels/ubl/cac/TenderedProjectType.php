<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeID;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeTypeCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\VariantID;

class TenderedProjectType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\VariantID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\VariantID")
     * @JMS\Expose
     * @JMS\SerializedName("VariantID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVariantID", setter="setVariantID")
     */
    private $variantID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FeeAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFeeAmount", setter="setFeeAmount")
     */
    private $feeAmount;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("FeeDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FeeDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getFeeDescription", setter="setFeeDescription")
     */
    private $feeDescription;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeID")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeID", setter="setTenderEnvelopeID")
     */
    private $tenderEnvelopeID;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeTypeCode", setter="setTenderEnvelopeTypeCode")
     */
    private $tenderEnvelopeTypeCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\ProcurementProjectLot|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\ProcurementProjectLot")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementProjectLot")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcurementProjectLot", setter="setProcurementProjectLot")
     */
    private $procurementProjectLot;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("EvidenceDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EvidenceDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEvidenceDocumentReference", setter="setEvidenceDocumentReference")
     */
    private $evidenceDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal")
     * @JMS\Expose
     * @JMS\SerializedName("LegalMonetaryTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalMonetaryTotal", setter="setLegalMonetaryTotal")
     */
    private $legalMonetaryTotal;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine>")
     * @JMS\Expose
     * @JMS\SerializedName("TenderLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TenderLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTenderLine", setter="setTenderLine")
     */
    private $tenderLine;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse>")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingCriterionResponse")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AwardingCriterionResponse", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAwardingCriterionResponse", setter="setAwardingCriterionResponse")
     */
    private $awardingCriterionResponse;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\VariantID|null
     */
    public function getVariantID(): ?VariantID
    {
        return $this->variantID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\VariantID
     */
    public function getVariantIDWithCreate(): VariantID
    {
        $this->variantID = is_null($this->variantID) ? new VariantID() : $this->variantID;

        return $this->variantID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\VariantID|null $variantID
     * @return self
     */
    public function setVariantID(?VariantID $variantID = null): self
    {
        $this->variantID = $variantID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetVariantID(): self
    {
        $this->variantID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeAmount|null
     */
    public function getFeeAmount(): ?FeeAmount
    {
        return $this->feeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeAmount
     */
    public function getFeeAmountWithCreate(): FeeAmount
    {
        $this->feeAmount = is_null($this->feeAmount) ? new FeeAmount() : $this->feeAmount;

        return $this->feeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeAmount|null $feeAmount
     * @return self
     */
    public function setFeeAmount(?FeeAmount $feeAmount = null): self
    {
        $this->feeAmount = $feeAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFeeAmount(): self
    {
        $this->feeAmount = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription>|null
     */
    public function getFeeDescription(): ?array
    {
        return $this->feeDescription;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription>|null $feeDescription
     * @return self
     */
    public function setFeeDescription(?array $feeDescription = null): self
    {
        $this->feeDescription = $feeDescription;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFeeDescription(): self
    {
        $this->feeDescription = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearFeeDescription(): self
    {
        $this->feeDescription = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription|null
     */
    public function firstFeeDescription(): ?FeeDescription
    {
        $feeDescription = $this->feeDescription ?? [];
        $feeDescription = reset($feeDescription);

        if ($feeDescription === false) {
            return null;
        }

        return $feeDescription;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription|null
     */
    public function lastFeeDescription(): ?FeeDescription
    {
        $feeDescription = $this->feeDescription ?? [];
        $feeDescription = end($feeDescription);

        if ($feeDescription === false) {
            return null;
        }

        return $feeDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription $feeDescription
     * @return self
     */
    public function addToFeeDescription(FeeDescription $feeDescription): self
    {
        $this->feeDescription[] = $feeDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription
     */
    public function addToFeeDescriptionWithCreate(): FeeDescription
    {
        $this->addTofeeDescription($feeDescription = new FeeDescription());

        return $feeDescription;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription $feeDescription
     * @return self
     */
    public function addOnceToFeeDescription(FeeDescription $feeDescription): self
    {
        if (!is_array($this->feeDescription)) {
            $this->feeDescription = [];
        }

        $this->feeDescription[0] = $feeDescription;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\FeeDescription
     */
    public function addOnceToFeeDescriptionWithCreate(): FeeDescription
    {
        if (!is_array($this->feeDescription)) {
            $this->feeDescription = [];
        }

        if ($this->feeDescription === []) {
            $this->addOnceTofeeDescription(new FeeDescription());
        }

        return $this->feeDescription[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeID|null
     */
    public function getTenderEnvelopeID(): ?TenderEnvelopeID
    {
        return $this->tenderEnvelopeID;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeID
     */
    public function getTenderEnvelopeIDWithCreate(): TenderEnvelopeID
    {
        $this->tenderEnvelopeID = is_null($this->tenderEnvelopeID) ? new TenderEnvelopeID() : $this->tenderEnvelopeID;

        return $this->tenderEnvelopeID;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeID|null $tenderEnvelopeID
     * @return self
     */
    public function setTenderEnvelopeID(?TenderEnvelopeID $tenderEnvelopeID = null): self
    {
        $this->tenderEnvelopeID = $tenderEnvelopeID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTenderEnvelopeID(): self
    {
        $this->tenderEnvelopeID = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeTypeCode|null
     */
    public function getTenderEnvelopeTypeCode(): ?TenderEnvelopeTypeCode
    {
        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeTypeCode
     */
    public function getTenderEnvelopeTypeCodeWithCreate(): TenderEnvelopeTypeCode
    {
        $this->tenderEnvelopeTypeCode = is_null($this->tenderEnvelopeTypeCode) ? new TenderEnvelopeTypeCode() : $this->tenderEnvelopeTypeCode;

        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TenderEnvelopeTypeCode|null $tenderEnvelopeTypeCode
     * @return self
     */
    public function setTenderEnvelopeTypeCode(?TenderEnvelopeTypeCode $tenderEnvelopeTypeCode = null): self
    {
        $this->tenderEnvelopeTypeCode = $tenderEnvelopeTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTenderEnvelopeTypeCode(): self
    {
        $this->tenderEnvelopeTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ProcurementProjectLot|null
     */
    public function getProcurementProjectLot(): ?ProcurementProjectLot
    {
        return $this->procurementProjectLot;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\ProcurementProjectLot
     */
    public function getProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        $this->procurementProjectLot = is_null($this->procurementProjectLot) ? new ProcurementProjectLot() : $this->procurementProjectLot;

        return $this->procurementProjectLot;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\ProcurementProjectLot|null $procurementProjectLot
     * @return self
     */
    public function setProcurementProjectLot(?ProcurementProjectLot $procurementProjectLot = null): self
    {
        $this->procurementProjectLot = $procurementProjectLot;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetProcurementProjectLot(): self
    {
        $this->procurementProjectLot = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference>|null
     */
    public function getEvidenceDocumentReference(): ?array
    {
        return $this->evidenceDocumentReference;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference>|null $evidenceDocumentReference
     * @return self
     */
    public function setEvidenceDocumentReference(?array $evidenceDocumentReference = null): self
    {
        $this->evidenceDocumentReference = $evidenceDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetEvidenceDocumentReference(): self
    {
        $this->evidenceDocumentReference = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearEvidenceDocumentReference(): self
    {
        $this->evidenceDocumentReference = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference|null
     */
    public function firstEvidenceDocumentReference(): ?EvidenceDocumentReference
    {
        $evidenceDocumentReference = $this->evidenceDocumentReference ?? [];
        $evidenceDocumentReference = reset($evidenceDocumentReference);

        if ($evidenceDocumentReference === false) {
            return null;
        }

        return $evidenceDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference|null
     */
    public function lastEvidenceDocumentReference(): ?EvidenceDocumentReference
    {
        $evidenceDocumentReference = $this->evidenceDocumentReference ?? [];
        $evidenceDocumentReference = end($evidenceDocumentReference);

        if ($evidenceDocumentReference === false) {
            return null;
        }

        return $evidenceDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference $evidenceDocumentReference
     * @return self
     */
    public function addToEvidenceDocumentReference(EvidenceDocumentReference $evidenceDocumentReference): self
    {
        $this->evidenceDocumentReference[] = $evidenceDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference
     */
    public function addToEvidenceDocumentReferenceWithCreate(): EvidenceDocumentReference
    {
        $this->addToevidenceDocumentReference($evidenceDocumentReference = new EvidenceDocumentReference());

        return $evidenceDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference $evidenceDocumentReference
     * @return self
     */
    public function addOnceToEvidenceDocumentReference(EvidenceDocumentReference $evidenceDocumentReference): self
    {
        if (!is_array($this->evidenceDocumentReference)) {
            $this->evidenceDocumentReference = [];
        }

        $this->evidenceDocumentReference[0] = $evidenceDocumentReference;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\EvidenceDocumentReference
     */
    public function addOnceToEvidenceDocumentReferenceWithCreate(): EvidenceDocumentReference
    {
        if (!is_array($this->evidenceDocumentReference)) {
            $this->evidenceDocumentReference = [];
        }

        if ($this->evidenceDocumentReference === []) {
            $this->addOnceToevidenceDocumentReference(new EvidenceDocumentReference());
        }

        return $this->evidenceDocumentReference[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>|null
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal>|null $taxTotal
     * @return self
     */
    public function setTaxTotal(?array $taxTotal = null): self
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxTotal(): self
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTaxTotal(): self
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal|null
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if ($taxTotal === false) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal|null
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if ($taxTotal === false) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addToTaxTotal(TaxTotal $taxTotal): self
    {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal $taxTotal
     * @return self
     */
    public function addOnceToTaxTotal(TaxTotal $taxTotal): self
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ($this->taxTotal === []) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal|null
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal
     */
    public function getLegalMonetaryTotalWithCreate(): LegalMonetaryTotal
    {
        $this->legalMonetaryTotal = is_null($this->legalMonetaryTotal) ? new LegalMonetaryTotal() : $this->legalMonetaryTotal;

        return $this->legalMonetaryTotal;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\LegalMonetaryTotal|null $legalMonetaryTotal
     * @return self
     */
    public function setLegalMonetaryTotal(?LegalMonetaryTotal $legalMonetaryTotal = null): self
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLegalMonetaryTotal(): self
    {
        $this->legalMonetaryTotal = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine>|null
     */
    public function getTenderLine(): ?array
    {
        return $this->tenderLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine>|null $tenderLine
     * @return self
     */
    public function setTenderLine(?array $tenderLine = null): self
    {
        $this->tenderLine = $tenderLine;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTenderLine(): self
    {
        $this->tenderLine = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearTenderLine(): self
    {
        $this->tenderLine = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine|null
     */
    public function firstTenderLine(): ?TenderLine
    {
        $tenderLine = $this->tenderLine ?? [];
        $tenderLine = reset($tenderLine);

        if ($tenderLine === false) {
            return null;
        }

        return $tenderLine;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine|null
     */
    public function lastTenderLine(): ?TenderLine
    {
        $tenderLine = $this->tenderLine ?? [];
        $tenderLine = end($tenderLine);

        if ($tenderLine === false) {
            return null;
        }

        return $tenderLine;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine $tenderLine
     * @return self
     */
    public function addToTenderLine(TenderLine $tenderLine): self
    {
        $this->tenderLine[] = $tenderLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine
     */
    public function addToTenderLineWithCreate(): TenderLine
    {
        $this->addTotenderLine($tenderLine = new TenderLine());

        return $tenderLine;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine $tenderLine
     * @return self
     */
    public function addOnceToTenderLine(TenderLine $tenderLine): self
    {
        if (!is_array($this->tenderLine)) {
            $this->tenderLine = [];
        }

        $this->tenderLine[0] = $tenderLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\TenderLine
     */
    public function addOnceToTenderLineWithCreate(): TenderLine
    {
        if (!is_array($this->tenderLine)) {
            $this->tenderLine = [];
        }

        if ($this->tenderLine === []) {
            $this->addOnceTotenderLine(new TenderLine());
        }

        return $this->tenderLine[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse>|null
     */
    public function getAwardingCriterionResponse(): ?array
    {
        return $this->awardingCriterionResponse;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse>|null $awardingCriterionResponse
     * @return self
     */
    public function setAwardingCriterionResponse(?array $awardingCriterionResponse = null): self
    {
        $this->awardingCriterionResponse = $awardingCriterionResponse;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAwardingCriterionResponse(): self
    {
        $this->awardingCriterionResponse = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearAwardingCriterionResponse(): self
    {
        $this->awardingCriterionResponse = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse|null
     */
    public function firstAwardingCriterionResponse(): ?AwardingCriterionResponse
    {
        $awardingCriterionResponse = $this->awardingCriterionResponse ?? [];
        $awardingCriterionResponse = reset($awardingCriterionResponse);

        if ($awardingCriterionResponse === false) {
            return null;
        }

        return $awardingCriterionResponse;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse|null
     */
    public function lastAwardingCriterionResponse(): ?AwardingCriterionResponse
    {
        $awardingCriterionResponse = $this->awardingCriterionResponse ?? [];
        $awardingCriterionResponse = end($awardingCriterionResponse);

        if ($awardingCriterionResponse === false) {
            return null;
        }

        return $awardingCriterionResponse;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse $awardingCriterionResponse
     * @return self
     */
    public function addToAwardingCriterionResponse(AwardingCriterionResponse $awardingCriterionResponse): self
    {
        $this->awardingCriterionResponse[] = $awardingCriterionResponse;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse
     */
    public function addToAwardingCriterionResponseWithCreate(): AwardingCriterionResponse
    {
        $this->addToawardingCriterionResponse($awardingCriterionResponse = new AwardingCriterionResponse());

        return $awardingCriterionResponse;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse $awardingCriterionResponse
     * @return self
     */
    public function addOnceToAwardingCriterionResponse(AwardingCriterionResponse $awardingCriterionResponse): self
    {
        if (!is_array($this->awardingCriterionResponse)) {
            $this->awardingCriterionResponse = [];
        }

        $this->awardingCriterionResponse[0] = $awardingCriterionResponse;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AwardingCriterionResponse
     */
    public function addOnceToAwardingCriterionResponseWithCreate(): AwardingCriterionResponse
    {
        if (!is_array($this->awardingCriterionResponse)) {
            $this->awardingCriterionResponse = [];
        }

        if ($this->awardingCriterionResponse === []) {
            $this->addOnceToawardingCriterionResponse(new AwardingCriterionResponse());
        }

        return $this->awardingCriterionResponse[0];
    }
}
