<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FeeAmount;
use horstoeko\invoicesuite\documents\models\ubl\cbc\FeeDescription;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeID;
use horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeTypeCode;
use horstoeko\invoicesuite\documents\models\ubl\cbc\VariantID;
use JMS\Serializer\Annotation as JMS;

class TenderedProjectType
{
    use HandlesObjectFlags;

    /**
     * @var null|VariantID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\VariantID")
     * @JMS\Expose
     * @JMS\SerializedName("VariantID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getVariantID", setter="setVariantID")
     */
    private $variantID;

    /**
     * @var null|FeeAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\FeeAmount")
     * @JMS\Expose
     * @JMS\SerializedName("FeeAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFeeAmount", setter="setFeeAmount")
     */
    private $feeAmount;

    /**
     * @var null|array<FeeDescription>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\FeeDescription>")
     * @JMS\Expose
     * @JMS\SerializedName("FeeDescription")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="FeeDescription", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getFeeDescription", setter="setFeeDescription")
     */
    private $feeDescription;

    /**
     * @var null|TenderEnvelopeID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeID")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeID", setter="setTenderEnvelopeID")
     */
    private $tenderEnvelopeID;

    /**
     * @var null|TenderEnvelopeTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cbc\TenderEnvelopeTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TenderEnvelopeTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTenderEnvelopeTypeCode", setter="setTenderEnvelopeTypeCode")
     */
    private $tenderEnvelopeTypeCode;

    /**
     * @var null|ProcurementProjectLot
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\ProcurementProjectLot")
     * @JMS\Expose
     * @JMS\SerializedName("ProcurementProjectLot")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getProcurementProjectLot", setter="setProcurementProjectLot")
     */
    private $procurementProjectLot;

    /**
     * @var null|array<EvidenceDocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\EvidenceDocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("EvidenceDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="EvidenceDocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getEvidenceDocumentReference", setter="setEvidenceDocumentReference")
     */
    private $evidenceDocumentReference;

    /**
     * @var null|array<TaxTotal>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TaxTotal>")
     * @JMS\Expose
     * @JMS\SerializedName("TaxTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TaxTotal", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTaxTotal", setter="setTaxTotal")
     */
    private $taxTotal;

    /**
     * @var null|LegalMonetaryTotal
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\LegalMonetaryTotal")
     * @JMS\Expose
     * @JMS\SerializedName("LegalMonetaryTotal")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLegalMonetaryTotal", setter="setLegalMonetaryTotal")
     */
    private $legalMonetaryTotal;

    /**
     * @var null|array<TenderLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\TenderLine>")
     * @JMS\Expose
     * @JMS\SerializedName("TenderLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="TenderLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getTenderLine", setter="setTenderLine")
     */
    private $tenderLine;

    /**
     * @var null|array<AwardingCriterionResponse>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\AwardingCriterionResponse>")
     * @JMS\Expose
     * @JMS\SerializedName("AwardingCriterionResponse")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="AwardingCriterionResponse", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getAwardingCriterionResponse", setter="setAwardingCriterionResponse")
     */
    private $awardingCriterionResponse;

    /**
     * @return null|VariantID
     */
    public function getVariantID(): ?VariantID
    {
        return $this->variantID;
    }

    /**
     * @return VariantID
     */
    public function getVariantIDWithCreate(): VariantID
    {
        $this->variantID = is_null($this->variantID) ? new VariantID() : $this->variantID;

        return $this->variantID;
    }

    /**
     * @param  null|VariantID $variantID
     * @return static
     */
    public function setVariantID(?VariantID $variantID = null): static
    {
        $this->variantID = $variantID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetVariantID(): static
    {
        $this->variantID = null;

        return $this;
    }

    /**
     * @return null|FeeAmount
     */
    public function getFeeAmount(): ?FeeAmount
    {
        return $this->feeAmount;
    }

    /**
     * @return FeeAmount
     */
    public function getFeeAmountWithCreate(): FeeAmount
    {
        $this->feeAmount = is_null($this->feeAmount) ? new FeeAmount() : $this->feeAmount;

        return $this->feeAmount;
    }

    /**
     * @param  null|FeeAmount $feeAmount
     * @return static
     */
    public function setFeeAmount(?FeeAmount $feeAmount = null): static
    {
        $this->feeAmount = $feeAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFeeAmount(): static
    {
        $this->feeAmount = null;

        return $this;
    }

    /**
     * @return null|array<FeeDescription>
     */
    public function getFeeDescription(): ?array
    {
        return $this->feeDescription;
    }

    /**
     * @param  null|array<FeeDescription> $feeDescription
     * @return static
     */
    public function setFeeDescription(?array $feeDescription = null): static
    {
        $this->feeDescription = $feeDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetFeeDescription(): static
    {
        $this->feeDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearFeeDescription(): static
    {
        $this->feeDescription = [];

        return $this;
    }

    /**
     * @return null|FeeDescription
     */
    public function firstFeeDescription(): ?FeeDescription
    {
        $feeDescription = $this->feeDescription ?? [];
        $feeDescription = reset($feeDescription);

        if (false === $feeDescription) {
            return null;
        }

        return $feeDescription;
    }

    /**
     * @return null|FeeDescription
     */
    public function lastFeeDescription(): ?FeeDescription
    {
        $feeDescription = $this->feeDescription ?? [];
        $feeDescription = end($feeDescription);

        if (false === $feeDescription) {
            return null;
        }

        return $feeDescription;
    }

    /**
     * @param  FeeDescription $feeDescription
     * @return static
     */
    public function addToFeeDescription(FeeDescription $feeDescription): static
    {
        $this->feeDescription[] = $feeDescription;

        return $this;
    }

    /**
     * @return FeeDescription
     */
    public function addToFeeDescriptionWithCreate(): FeeDescription
    {
        $this->addTofeeDescription($feeDescription = new FeeDescription());

        return $feeDescription;
    }

    /**
     * @param  FeeDescription $feeDescription
     * @return static
     */
    public function addOnceToFeeDescription(FeeDescription $feeDescription): static
    {
        if (!is_array($this->feeDescription)) {
            $this->feeDescription = [];
        }

        $this->feeDescription[0] = $feeDescription;

        return $this;
    }

    /**
     * @return FeeDescription
     */
    public function addOnceToFeeDescriptionWithCreate(): FeeDescription
    {
        if (!is_array($this->feeDescription)) {
            $this->feeDescription = [];
        }

        if ([] === $this->feeDescription) {
            $this->addOnceTofeeDescription(new FeeDescription());
        }

        return $this->feeDescription[0];
    }

    /**
     * @return null|TenderEnvelopeID
     */
    public function getTenderEnvelopeID(): ?TenderEnvelopeID
    {
        return $this->tenderEnvelopeID;
    }

    /**
     * @return TenderEnvelopeID
     */
    public function getTenderEnvelopeIDWithCreate(): TenderEnvelopeID
    {
        $this->tenderEnvelopeID = is_null($this->tenderEnvelopeID) ? new TenderEnvelopeID() : $this->tenderEnvelopeID;

        return $this->tenderEnvelopeID;
    }

    /**
     * @param  null|TenderEnvelopeID $tenderEnvelopeID
     * @return static
     */
    public function setTenderEnvelopeID(?TenderEnvelopeID $tenderEnvelopeID = null): static
    {
        $this->tenderEnvelopeID = $tenderEnvelopeID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderEnvelopeID(): static
    {
        $this->tenderEnvelopeID = null;

        return $this;
    }

    /**
     * @return null|TenderEnvelopeTypeCode
     */
    public function getTenderEnvelopeTypeCode(): ?TenderEnvelopeTypeCode
    {
        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @return TenderEnvelopeTypeCode
     */
    public function getTenderEnvelopeTypeCodeWithCreate(): TenderEnvelopeTypeCode
    {
        $this->tenderEnvelopeTypeCode = is_null($this->tenderEnvelopeTypeCode) ? new TenderEnvelopeTypeCode() : $this->tenderEnvelopeTypeCode;

        return $this->tenderEnvelopeTypeCode;
    }

    /**
     * @param  null|TenderEnvelopeTypeCode $tenderEnvelopeTypeCode
     * @return static
     */
    public function setTenderEnvelopeTypeCode(?TenderEnvelopeTypeCode $tenderEnvelopeTypeCode = null): static
    {
        $this->tenderEnvelopeTypeCode = $tenderEnvelopeTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderEnvelopeTypeCode(): static
    {
        $this->tenderEnvelopeTypeCode = null;

        return $this;
    }

    /**
     * @return null|ProcurementProjectLot
     */
    public function getProcurementProjectLot(): ?ProcurementProjectLot
    {
        return $this->procurementProjectLot;
    }

    /**
     * @return ProcurementProjectLot
     */
    public function getProcurementProjectLotWithCreate(): ProcurementProjectLot
    {
        $this->procurementProjectLot = is_null($this->procurementProjectLot) ? new ProcurementProjectLot() : $this->procurementProjectLot;

        return $this->procurementProjectLot;
    }

    /**
     * @param  null|ProcurementProjectLot $procurementProjectLot
     * @return static
     */
    public function setProcurementProjectLot(?ProcurementProjectLot $procurementProjectLot = null): static
    {
        $this->procurementProjectLot = $procurementProjectLot;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetProcurementProjectLot(): static
    {
        $this->procurementProjectLot = null;

        return $this;
    }

    /**
     * @return null|array<EvidenceDocumentReference>
     */
    public function getEvidenceDocumentReference(): ?array
    {
        return $this->evidenceDocumentReference;
    }

    /**
     * @param  null|array<EvidenceDocumentReference> $evidenceDocumentReference
     * @return static
     */
    public function setEvidenceDocumentReference(?array $evidenceDocumentReference = null): static
    {
        $this->evidenceDocumentReference = $evidenceDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetEvidenceDocumentReference(): static
    {
        $this->evidenceDocumentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearEvidenceDocumentReference(): static
    {
        $this->evidenceDocumentReference = [];

        return $this;
    }

    /**
     * @return null|EvidenceDocumentReference
     */
    public function firstEvidenceDocumentReference(): ?EvidenceDocumentReference
    {
        $evidenceDocumentReference = $this->evidenceDocumentReference ?? [];
        $evidenceDocumentReference = reset($evidenceDocumentReference);

        if (false === $evidenceDocumentReference) {
            return null;
        }

        return $evidenceDocumentReference;
    }

    /**
     * @return null|EvidenceDocumentReference
     */
    public function lastEvidenceDocumentReference(): ?EvidenceDocumentReference
    {
        $evidenceDocumentReference = $this->evidenceDocumentReference ?? [];
        $evidenceDocumentReference = end($evidenceDocumentReference);

        if (false === $evidenceDocumentReference) {
            return null;
        }

        return $evidenceDocumentReference;
    }

    /**
     * @param  EvidenceDocumentReference $evidenceDocumentReference
     * @return static
     */
    public function addToEvidenceDocumentReference(EvidenceDocumentReference $evidenceDocumentReference): static
    {
        $this->evidenceDocumentReference[] = $evidenceDocumentReference;

        return $this;
    }

    /**
     * @return EvidenceDocumentReference
     */
    public function addToEvidenceDocumentReferenceWithCreate(): EvidenceDocumentReference
    {
        $this->addToevidenceDocumentReference($evidenceDocumentReference = new EvidenceDocumentReference());

        return $evidenceDocumentReference;
    }

    /**
     * @param  EvidenceDocumentReference $evidenceDocumentReference
     * @return static
     */
    public function addOnceToEvidenceDocumentReference(EvidenceDocumentReference $evidenceDocumentReference): static
    {
        if (!is_array($this->evidenceDocumentReference)) {
            $this->evidenceDocumentReference = [];
        }

        $this->evidenceDocumentReference[0] = $evidenceDocumentReference;

        return $this;
    }

    /**
     * @return EvidenceDocumentReference
     */
    public function addOnceToEvidenceDocumentReferenceWithCreate(): EvidenceDocumentReference
    {
        if (!is_array($this->evidenceDocumentReference)) {
            $this->evidenceDocumentReference = [];
        }

        if ([] === $this->evidenceDocumentReference) {
            $this->addOnceToevidenceDocumentReference(new EvidenceDocumentReference());
        }

        return $this->evidenceDocumentReference[0];
    }

    /**
     * @return null|array<TaxTotal>
     */
    public function getTaxTotal(): ?array
    {
        return $this->taxTotal;
    }

    /**
     * @param  null|array<TaxTotal> $taxTotal
     * @return static
     */
    public function setTaxTotal(?array $taxTotal = null): static
    {
        $this->taxTotal = $taxTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTaxTotal(): static
    {
        $this->taxTotal = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTaxTotal(): static
    {
        $this->taxTotal = [];

        return $this;
    }

    /**
     * @return null|TaxTotal
     */
    public function firstTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = reset($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @return null|TaxTotal
     */
    public function lastTaxTotal(): ?TaxTotal
    {
        $taxTotal = $this->taxTotal ?? [];
        $taxTotal = end($taxTotal);

        if (false === $taxTotal) {
            return null;
        }

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addToTaxTotal(TaxTotal $taxTotal): static
    {
        $this->taxTotal[] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addToTaxTotalWithCreate(): TaxTotal
    {
        $this->addTotaxTotal($taxTotal = new TaxTotal());

        return $taxTotal;
    }

    /**
     * @param  TaxTotal $taxTotal
     * @return static
     */
    public function addOnceToTaxTotal(TaxTotal $taxTotal): static
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        $this->taxTotal[0] = $taxTotal;

        return $this;
    }

    /**
     * @return TaxTotal
     */
    public function addOnceToTaxTotalWithCreate(): TaxTotal
    {
        if (!is_array($this->taxTotal)) {
            $this->taxTotal = [];
        }

        if ([] === $this->taxTotal) {
            $this->addOnceTotaxTotal(new TaxTotal());
        }

        return $this->taxTotal[0];
    }

    /**
     * @return null|LegalMonetaryTotal
     */
    public function getLegalMonetaryTotal(): ?LegalMonetaryTotal
    {
        return $this->legalMonetaryTotal;
    }

    /**
     * @return LegalMonetaryTotal
     */
    public function getLegalMonetaryTotalWithCreate(): LegalMonetaryTotal
    {
        $this->legalMonetaryTotal = is_null($this->legalMonetaryTotal) ? new LegalMonetaryTotal() : $this->legalMonetaryTotal;

        return $this->legalMonetaryTotal;
    }

    /**
     * @param  null|LegalMonetaryTotal $legalMonetaryTotal
     * @return static
     */
    public function setLegalMonetaryTotal(?LegalMonetaryTotal $legalMonetaryTotal = null): static
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLegalMonetaryTotal(): static
    {
        $this->legalMonetaryTotal = null;

        return $this;
    }

    /**
     * @return null|array<TenderLine>
     */
    public function getTenderLine(): ?array
    {
        return $this->tenderLine;
    }

    /**
     * @param  null|array<TenderLine> $tenderLine
     * @return static
     */
    public function setTenderLine(?array $tenderLine = null): static
    {
        $this->tenderLine = $tenderLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTenderLine(): static
    {
        $this->tenderLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearTenderLine(): static
    {
        $this->tenderLine = [];

        return $this;
    }

    /**
     * @return null|TenderLine
     */
    public function firstTenderLine(): ?TenderLine
    {
        $tenderLine = $this->tenderLine ?? [];
        $tenderLine = reset($tenderLine);

        if (false === $tenderLine) {
            return null;
        }

        return $tenderLine;
    }

    /**
     * @return null|TenderLine
     */
    public function lastTenderLine(): ?TenderLine
    {
        $tenderLine = $this->tenderLine ?? [];
        $tenderLine = end($tenderLine);

        if (false === $tenderLine) {
            return null;
        }

        return $tenderLine;
    }

    /**
     * @param  TenderLine $tenderLine
     * @return static
     */
    public function addToTenderLine(TenderLine $tenderLine): static
    {
        $this->tenderLine[] = $tenderLine;

        return $this;
    }

    /**
     * @return TenderLine
     */
    public function addToTenderLineWithCreate(): TenderLine
    {
        $this->addTotenderLine($tenderLine = new TenderLine());

        return $tenderLine;
    }

    /**
     * @param  TenderLine $tenderLine
     * @return static
     */
    public function addOnceToTenderLine(TenderLine $tenderLine): static
    {
        if (!is_array($this->tenderLine)) {
            $this->tenderLine = [];
        }

        $this->tenderLine[0] = $tenderLine;

        return $this;
    }

    /**
     * @return TenderLine
     */
    public function addOnceToTenderLineWithCreate(): TenderLine
    {
        if (!is_array($this->tenderLine)) {
            $this->tenderLine = [];
        }

        if ([] === $this->tenderLine) {
            $this->addOnceTotenderLine(new TenderLine());
        }

        return $this->tenderLine[0];
    }

    /**
     * @return null|array<AwardingCriterionResponse>
     */
    public function getAwardingCriterionResponse(): ?array
    {
        return $this->awardingCriterionResponse;
    }

    /**
     * @param  null|array<AwardingCriterionResponse> $awardingCriterionResponse
     * @return static
     */
    public function setAwardingCriterionResponse(?array $awardingCriterionResponse = null): static
    {
        $this->awardingCriterionResponse = $awardingCriterionResponse;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardingCriterionResponse(): static
    {
        $this->awardingCriterionResponse = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAwardingCriterionResponse(): static
    {
        $this->awardingCriterionResponse = [];

        return $this;
    }

    /**
     * @return null|AwardingCriterionResponse
     */
    public function firstAwardingCriterionResponse(): ?AwardingCriterionResponse
    {
        $awardingCriterionResponse = $this->awardingCriterionResponse ?? [];
        $awardingCriterionResponse = reset($awardingCriterionResponse);

        if (false === $awardingCriterionResponse) {
            return null;
        }

        return $awardingCriterionResponse;
    }

    /**
     * @return null|AwardingCriterionResponse
     */
    public function lastAwardingCriterionResponse(): ?AwardingCriterionResponse
    {
        $awardingCriterionResponse = $this->awardingCriterionResponse ?? [];
        $awardingCriterionResponse = end($awardingCriterionResponse);

        if (false === $awardingCriterionResponse) {
            return null;
        }

        return $awardingCriterionResponse;
    }

    /**
     * @param  AwardingCriterionResponse $awardingCriterionResponse
     * @return static
     */
    public function addToAwardingCriterionResponse(AwardingCriterionResponse $awardingCriterionResponse): static
    {
        $this->awardingCriterionResponse[] = $awardingCriterionResponse;

        return $this;
    }

    /**
     * @return AwardingCriterionResponse
     */
    public function addToAwardingCriterionResponseWithCreate(): AwardingCriterionResponse
    {
        $this->addToawardingCriterionResponse($awardingCriterionResponse = new AwardingCriterionResponse());

        return $awardingCriterionResponse;
    }

    /**
     * @param  AwardingCriterionResponse $awardingCriterionResponse
     * @return static
     */
    public function addOnceToAwardingCriterionResponse(AwardingCriterionResponse $awardingCriterionResponse): static
    {
        if (!is_array($this->awardingCriterionResponse)) {
            $this->awardingCriterionResponse = [];
        }

        $this->awardingCriterionResponse[0] = $awardingCriterionResponse;

        return $this;
    }

    /**
     * @return AwardingCriterionResponse
     */
    public function addOnceToAwardingCriterionResponseWithCreate(): AwardingCriterionResponse
    {
        if (!is_array($this->awardingCriterionResponse)) {
            $this->awardingCriterionResponse = [];
        }

        if ([] === $this->awardingCriterionResponse) {
            $this->addOnceToawardingCriterionResponse(new AwardingCriterionResponse());
        }

        return $this->awardingCriterionResponse[0];
    }
}
