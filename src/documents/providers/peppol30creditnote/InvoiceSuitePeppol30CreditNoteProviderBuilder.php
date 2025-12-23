<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\peppol30creditnote;

use DateTimeInterface;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatBuilder;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\PartyIdentification;
use horstoeko\invoicesuite\documents\models\ubl\main\CreditNote;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteFloatUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class InvoiceSuitePeppol30CreditNoteProviderBuilder extends InvoiceSuiteAbstractDocumentFormatBuilder
{
    /**
     * {@inheritDoc}
     */
    public function initDocumentRootObject(): static
    {
        $this->setContextParameter(
            $this->getCurrentDocumentFormatProviderParameterValue('CustomizationId', ''),
            $this->getCurrentDocumentFormatProviderParameterValue('ProfileId', '')
        );

        return $this;
    }

    /**
     * Init context parameter for profile definition
     *
     * @param  string $newCustomizationId
     * @param  string $newProfileId
     * @return static
     */
    public function setContextParameter(string $newCustomizationId, string $newProfileId): static
    {
        $this->getUblRootObject()->getCustomizationIDWithCreate()->setValue($newCustomizationId);
        $this->getUblRootObject()->getProfileIDWithCreate()->setValue($newProfileId);

        return $this;
    }

    /**
     * Create a document by a DTO
     *
     * @param  InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return static
     */
    public function createFromDTO(
        InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
    ): static {
        // Document-Level General information

        $this->setDocumentNo($newDocumentDTO->getNumber());
        $this->setDocumentType($newDocumentDTO->getType());
        $this->setDocumentDescription($newDocumentDTO->getDescription());
        $this->setDocumentLanguage($newDocumentDTO->getLanguage());
        $this->setDocumentDate($newDocumentDTO->getDate());
        $this->setDocumentCompleteDate($newDocumentDTO->getCompleteDate());
        $this->setDocumentCurrency($newDocumentDTO->getCurrency());
        $this->setDocumentTaxCurrency($newDocumentDTO->getTaxCurrency());
        $this->setDocumentIsCopy($newDocumentDTO->getIsCopy());
        $this->setDocumentIsTest($newDocumentDTO->getIsTest());

        // Document-Level Notes

        $newDocumentDTO->firstNote(fn (InvoiceSuiteNoteDTO $note) => $this->setDocumentNote(
            $note->getContent(),
            $note->getContentCode(),
            $note->getSubjectCode()
        ));

        // Document-Level Posting Reference

        $newDocumentDTO->firstPostingReference(
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPostingReference(
                $item->getIdType(),
                $item->getId()
            )
        );

        // Document-Level Buyer Reference

        $newDocumentDTO->firstBuyerReference(
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerReference($item->getId())
        );

        // Document-Level Billing period

        $newDocumentDTO->firstBillingPeriod(
            fn (InvoiceSuiteDateRangeDTO $item) => $this->setDocumentBillingPeriod(
                $item->getStartDate(),
                $item->getEndDate(),
                $item->getDescription()
            )
        );

        // Document-Level Buyer Order Reference

        $newDocumentDTO->firstBuyerOrderReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentBuyerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Seller Order Reference

        $newDocumentDTO->firstSellerOrderReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentSellerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Invoice Reference

        $newDocumentDTO->firstInvoiceReference(
            fn (InvoiceSuiteReferenceDocumentExtDTO $item) => $this->setDocumentInvoiceReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate(),
                $item->getTypeCode()
            )
        );

        // Document-Level Despatch Advice Reference

        $newDocumentDTO->firstDespatchAdviceReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentDespatchAdviceReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Receiving Advice Reference

        $newDocumentDTO->firstReceivingAdviceReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentReceivingAdviceReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Contract Reference

        $newDocumentDTO->firstContractReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentContractReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Additional Reference

        $newDocumentDTO->forEachAdditionalReference(
            fn (InvoiceSuiteReferenceDocumentExtDTO $item) => $this->addDocumentAdditionalReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate(),
                $item->getTypeCode(),
                $item->getReferenceTypeCode(),
                $item->getDescription(),
                $item->getAttachment()
            )
        );

        // Document-Level Project Reference

        $newDocumentDTO->firstProjectReference(
            fn (InvoiceSuiteProjectDTO $item) => $this->setDocumentProjectReference(
                $item->getProjectNumber(),
                $item->getProjectName()
            )
        );

        // Document-Level Seller/Supplier Party

        $newDocumentDTO
            ->getSellerParty()
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentSellerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            )
            ?->forEachId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentSellerId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentSellerGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstName(
                fn (string $item) => $this->setDocumentSellerName($item)
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentSellerAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            )
            ?->forEachTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentSellerTaxRegistration($item->getIdType(), $item->getId()),
                null,
                2
            )
            ?->firstLegalOrganisation(
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentSellerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->firstContact(
                fn (InvoiceSuiteContactDTO $item) => $this->setDocumentSellerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            );

        // Document-Level Buyer/Customer Party

        $newDocumentDTO
            ->getBuyerParty()
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentBuyerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerId($item->getId()),
                fn () => $newDocumentDTO->getBuyerParty()->firstGlobalId(fn ($item) => $this->setDocumentBuyerGlobalId($item->getId(), $item->getIdType()))
            )
            ?->firstName(
                fn (string $item) => $this->setDocumentBuyerName($item)
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentBuyerAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstLegalOrganisation(
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentBuyerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->firstContact(
                fn (InvoiceSuiteContactDTO $item) => $this->setDocumentBuyerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            );

        // Document-Level Payee Party

        $newDocumentDTO
            ->getPayeeParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentPayeeName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPayeeId($item->getId()),
                fn () => $newDocumentDTO->getPayeeParty()->firstGlobalId(fn ($item) => $this->setDocumentPayeeGlobalId($item->getId(), $item->getIdType()))
            )
            ?->firstLegalOrganisation(
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentPayeeLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            );

        // Document-Level Seller Tax Representative Party

        $newDocumentDTO
            ->getTaxRepresentativeParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentTaxRepresentativeName($item)
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentTaxRepresentativeAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentTaxRepresentativeTaxRegistration($item->getIdType(), $item->getId())
            );

        // Document-Level Supply Chain Event

        $newDocumentDTO->firstSupplyChainEvent(
            fn (DateTimeInterface $item) => $this->setDocumentSupplyChainEvent($item)
        );

        // Document-Level Delivery Terms

        $newDocumentDTO->firstDeliveryTerm(
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentDeliveryTerms($item->getId())
        );

        // Document-Level Ship-To Party

        $newDocumentDTO
            ->getShipToParty()
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentShipToId($item->getId()),
                fn () => $newDocumentDTO->getShipToParty()->firstGlobalId(fn ($item) => $this->setDocumentShipToGlobalId($item->getId(), $item->getIdType()))
            )
            ?->firstName(
                fn (string $item) => $this->setDocumentShipToName($item)
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentShipToAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            );

        // Document-Level Payment Means

        $newDocumentDTO->forEachPaymentmean(
            fn (InvoiceSuitePaymentMeanDTO $item) => $this->addDocumentPaymentMean(
                $item->getTypeCode(),
                $item->getName(),
                $item->getFinancialCardId(),
                $item->getFinancialCardHolder(),
                $item->getBuyerIban(),
                $item->getPayeeIban(),
                $item->getPayeeAccountName(),
                $item->getPayeeProprietaryId(),
                $item->getPayeeBic(),
                $item->getPaymentReference(),
                $item->getMandate()
            )
        );

        // Document-Level Payment Terms

        $newDocumentDTO->firstPaymentTerm(
            fn (InvoiceSuitePaymentTermDTO $item) => $this->setDocumentPaymentTerm(
                $item->getDescription(),
                $item->getDueDate(),
                $item->getMandate()
            )
        );

        // Document-Level Allowances/Charges

        $newDocumentDTO->forEachAllowanceCharge(
            fn (InvoiceSuiteAllowanceChargeDTO $item) => $this->addDocumentAllowanceCharge(
                $item->getChargeIndicator(),
                $item->getAmount(),
                $item->getBaseAmount(),
                $item->getTaxCategory(),
                $item->getTaxType(),
                $item->getTaxPercent(),
                $item->getReason(),
                $item->getReasonCode(),
                $item->getPercent()
            )
        );

        // Document-Level Taxes

        $newDocumentDTO->forEachTax(
            fn (InvoiceSuiteTaxDTO $item) => $this->addDocumentTax(
                $item->getCategory(),
                $item->getType(),
                $item->getBasisAmount(),
                $item->getAmount(),
                $item->getPercent(),
                $item->getExemptionReason(),
                $item->getExemptionReasonCode(),
                $item->getDueDate(),
                $item->getDueCode()
            )
        );

        // Document-Level Summation

        $newDocumentDTO->firstSummation(
            fn (InvoiceSuiteSummationDTO $item) => $this->setDocumentSummation(
                $item->getNetAmount(),
                $item->getChargeTotalAmount(),
                $item->getDiscountTotalAmount(),
                $item->getTaxBasisAmount(),
                $item->getTaxTotalAmount(),
                $item->getTaxTotalAmount2(),
                $item->getGrossAmount(),
                $item->getDueAmount(),
                $item->getPrepaidAmount(),
                $item->getRoungingAmount()
            )
        );

        // Document-Level Creditor reference

        $newDocumentDTO->firstCreditorReference(
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPaymentCreditorReferenceID($item->getId())
        );

        // Positions

        $newDocumentDTO->forEachPosition(
            function (InvoiceSuiteDocumentPositionDTO $item): void {
                // Position ID

                $this->addDocumentPosition(
                    $item->getLineId(),
                    $item->getParentLineId(),
                    $item->getLineStatus(),
                    $item->getLineStatusReason()
                );

                // Position Note

                $item->firstNote(
                    fn (InvoiceSuiteNoteDTO $itemNote) => $this->setDocumentPositionNote(
                        $itemNote->getContent(),
                        $itemNote->getContentCode(),
                        $itemNote->getSubjectCode()
                    )
                );

                // Position Quantities

                $this->setDocumentPositionQuantities(
                    $item->getQuantityBilled()?->getQuantity(),
                    $item->getQuantityBilled()?->getQuantityUnit(),
                    $item->getQuantityChargeFree()?->getQuantity(),
                    $item->getQuantityChargeFree()?->getQuantityUnit(),
                    $item->getQuantityPackage()?->getQuantity(),
                    $item->getQuantityPackage()?->getQuantityUnit()
                );

                // Position summation

                $this->setDocumentPositionSummation(
                    $item->getSummation()?->getNetAmount(),
                    $item->getSummation()?->getChargeTotalAmount(),
                    $item->getSummation()?->getDiscountTotalAmount(),
                    $item->getSummation()?->getTaxTotalAmount(),
                    $item->getSummation()?->getGrossAmount()
                );

                // Position posting references

                $item->firstPostingReference(
                    fn (InvoiceSuiteIdDTO $postingReference) => $this->setDocumentPositionPostingReference(
                        $postingReference->getIdType(),
                        $postingReference->getId()
                    )
                );

                // Position billing period

                $item->firstBillingPeriod(
                    fn (InvoiceSuiteDateRangeDTO $item) => $this->setDocumentPositionBillingPeriod(
                        $item->getStartDate(),
                        $item->getEndDate(),
                        $item->getDescription()
                    )
                );

                // Position buyer order reference

                $item->firstBuyerOrderReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionBuyerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                // Position object reference

                $item->firstAdditionalObjectReference(
                    fn (InvoiceSuiteReferenceDocumentExtDTO $item) => $this->setDocumentPositionAdditionalObjectReference(
                        $item->getReferenceNumber(),
                        $item->getTypeCode(),
                        $item->getReferenceTypeCode()
                    )
                );

                // Position allowances/charges

                $item->forEachAllowanceCharge(
                    fn (InvoiceSuiteAllowanceChargeDTO $allowanceCharge) => $this->addDocumentPositionAllowanceCharge(
                        $allowanceCharge->getChargeIndicator(),
                        $allowanceCharge->getAmount(),
                        $allowanceCharge->getBaseAmount(),
                        $allowanceCharge->getReason(),
                        $allowanceCharge->getReasonCode(),
                        $allowanceCharge->getPercent()
                    )
                );

                // Position product

                $this->setDocumentPositionProductDetails(
                    $item->getProduct()?->getId(),
                    $item->getProduct()?->getName(),
                    $item->getProduct()?->getDescription(),
                    $item->getProduct()?->getSellerId(),
                    $item->getProduct()?->getBuyerId(),
                    $item->getProduct()?->getGlobalId()?->getId(),
                    $item->getProduct()?->getGlobalId()?->getIdType(),
                    $item->getProduct()?->getIndustryId(),
                    $item->getProduct()?->getModelId(),
                    $item->getProduct()?->getBatchId(),
                    $item->getProduct()?->getBrandName(),
                    $item->getProduct()?->getModelName(),
                    $item->getProduct()?->getOriginTradeCountry()
                );

                // Position product classifications

                $item->getProduct()?->forEachClassification(
                    fn (InvoiceSuiteProductClassificationDTO $classification) => $this->addDocumentPositionProductClassification(
                        $classification->getCode(),
                        $classification->getListId(),
                        $classification->getListVersionId(),
                        $classification->getName()
                    )
                );

                // Position taxes

                $item->firstTax(
                    fn (InvoiceSuiteTaxDTO $tax) => $this->setDocumentPositionTax(
                        $tax->getCategory(),
                        $tax->getType(),
                        $tax->getAmount(),
                        $tax->getPercent(),
                        $tax->getExemptionReason(),
                        $tax->getExemptionReasonCode()
                    )
                );

                // Position product characteristics

                $item->getProduct()?->forEachCharacteristic(
                    fn (InvoiceSuiteProductCharacteristicDTO $characteristic) => $this->addDocumentPositionProductCharacteristic(
                        $characteristic->getDescription(),
                        $characteristic->getValue(),
                        $characteristic->getType(),
                        $characteristic->getValueMeasure()?->getValue(),
                        $characteristic->getValueMeasure()?->getUnit()
                    )
                );

                // Position Net Price

                $this->setDocumentPositionNetPrice(
                    $item->getNetPrice()?->getAmount(),
                    $item->getNetPrice()?->getPriceQuantity()?->getQuantity(),
                    $item->getNetPrice()?->getPriceQuantity()?->getQuantityUnit()
                );
            }
        );

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function setDocumentNo(
        ?string $newDocumentNo = null
    ): static {
        $this->getUblRootObject()->unsetID();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentNo])) {
            return $this;
        }

        $this->getUblRootObject()->getIDWithCreate()->setValue($newDocumentNo);

        return $this;
    }

    /**
     * Sets the new document type code
     *
     * @param  null|string $newDocumentType The type of the document
     * @return static
     */
    public function setDocumentType(
        ?string $newDocumentType = null
    ): static {
        $this->getUblRootObject()->unsetCreditNoteTypeCode();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentType])) {
            return $this;
        }

        $this->getUblRootObject()->getCreditNoteTypeCodeWithCreate()->setValue($newDocumentType);

        return $this;
    }

    /**
     * Sets the new document description
     *
     * @param  null|string $newDocumentDescription The documenttype as free text
     * @return static
     */
    public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new document language
     *
     * @param  null|string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return static
     */
    public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return static
     */
    public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): static {
        $this->getUblRootObject()->unsetIssueDate();

        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newDocumentDate])) {
            return $this;
        }

        $this->getUblRootObject()->setIssueDate($newDocumentDate);

        return $this;
    }

    /**
     * Sets the new document period
     *
     * @param  null|DateTimeInterface $newCompleteDate Contractual due date of the document
     * @return static
     */
    public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new document currency
     *
     * @param  null|string $newDocumentCurrency Code for the invoice currency
     * @return static
     */
    public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): static {
        $this->getUblRootObject()->unsetDocumentCurrencyCode();
        $this->updateCurrencies();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentCurrency])) {
            return $this;
        }

        $this->getUblRootObject()->getDocumentCurrencyCodeWithCreate()->setValue($newDocumentCurrency);
        $this->updateCurrencies();

        return $this;
    }

    /**
     * Sets the new document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency Code for the tax currency
     * @return static
     */
    public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): static {
        $this->getUblRootObject()->unsetTaxCurrencyCode();
        $this->updateCurrencies();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentTaxCurrency])) {
            return $this;
        }

        $this->getUblRootObject()->getTaxCurrencyCodeWithCreate()->setValue($newDocumentTaxCurrency);
        $this->updateCurrencies();

        return $this;
    }

    /**
     * Sets the new status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy Indicates that the document is a copy
     * @return static
     */
    public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new status of the test indicator
     *
     * @param  bool   $newDocumentIsTest Indicates that the document is a test
     * @return static
     */
    public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return static
     */
    public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this->getUblRootObject()->unsetNote();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $this->getUblRootObject()->addOnceToNoteWithCreate()->setValue($newContent);

        return $this;
    }

    /**
     * Add a note to the document
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return static
     */
    public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $this->setDocumentNote($newContent, $newContentCode, $newSubjectCode);

        return $this;
    }

    /**
     * Set the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        $this->getUblRootObject()->unsetInvoicePeriod();

        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this;
        }

        $invoicePeriod = $this
            ->getUblRootObject()
            ->addToInvoicePeriodWithCreate();

        if (!is_null($newStartDate)) {
            $invoicePeriod->setStartDate($newStartDate);
        }

        if (!is_null($newEndDate)) {
            $invoicePeriod->setEndDate($newEndDate);
        }

        return $this;
    }

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this;
        }

        $this->setDocumentBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        return $this;
    }

    /**
     * Set a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function setDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): static
    {
        $this
            ->getUblRootObject()
            ->unsetAccountingCost();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAccountId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingCostWithCreate()
            ->setValue($newAccountId);

        return $this;
    }

    /**
     * Add a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function addDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAccountId])) {
            return $this;
        }

        $this->setDocumentPostingReference($newType, $newAccountId);

        return $this;
    }

    /**
     * Set the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return static
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getOrderReference()
            ?->unsetSalesOrderID();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getOrderReferenceWithCreate()
            ->getSalesOrderIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Add an associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return static
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated buyer's order
     *
     * @param  null|string            $newReferenceNumber Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return static
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getOrderReference()
            ?->unsetID()
            ?->unsetIssueDate();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getOrderReferenceWithCreate()
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Add an associated buyer's order
     *
     * @param  null|string            $newReferenceNumber Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return static
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set the associated quotation
     *
     * @param  null|string            $newReferenceNumber Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   quotation date
     * @return static
     */
    public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated quotation
     *
     * @param  null|string            $newReferenceNumber quotation number
     * @param  null|DateTimeInterface $newReferenceDate   quotation date
     * @return static
     */
    public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated contract
     *
     * @param  string                 $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return static
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetContractDocumentReference();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addToContractDocumentReferenceWithCreate()
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Add am associated contract
     *
     * @param  string                 $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return static
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentContractReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetAdditionalDocumentReference();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this;
        }

        $this->addDocumentAdditionalReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        return $this;
    }

    /**
     * Add an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this;
        }

        $additionalReference = $this
            ->getUblRootObject()
            ->addToAdditionalDocumentReferenceWithCreate();

        $additionalReference->getIDWithCreate()->setValue($newReferenceNumber);

        if ($newTypeCode === '130') {
            $additionalReference->getDocumentTypeCodeWithCreate()->setValue($newTypeCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $additionalReference
                ->clearDocumentDescription()
                ->addToDocumentDescriptionWithCreate()
                ->setValue($newDescription);
        }

        if (!is_null($newInvoiceSuiteAttachment)) {
            if ($newInvoiceSuiteAttachment->isBinaryAttachment()) {
                $additionalReference
                    ->getAttachmentWithCreate()
                    ->getEmbeddedDocumentBinaryObjectWithCreate()
                    ->setFilename($newInvoiceSuiteAttachment->getFilename())
                    ->setMimeCode($newInvoiceSuiteAttachment->getContentMimeType())
                    ->setValue($newInvoiceSuiteAttachment->getRawContent());
            }

            if ($newInvoiceSuiteAttachment->isUrlAttachment()) {
                $additionalReference
                    ->getAttachmentWithCreate()
                    ->getExternalReferenceWithCreate()
                    ->getURIWithCreate()
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }
        }

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return static
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetBillingReference();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $invoiceReference = $this
            ->getUblRootObject()
            ->addToBillingReferenceWithCreate()
            ->getInvoiceDocumentReferenceWithCreate();

        $invoiceReference->getIDWithCreate()->setValue($newReferenceNumber);
        $invoiceReference->setIssueDate($newReferenceDate);

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return static
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * Set an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return static
     */
    public function setDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return static
     */
    public function addDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber
     * @param  null|DateTimeInterface $newReferenceDate
     * @return static
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber
     * @param  null|DateTimeInterface $newReferenceDate
     * @return static
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return static
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetDespatchDocumentReference();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addToDespatchDocumentReferenceWithCreate()
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return static
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return static
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetReceiptDocumentReference();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addOnceToReceiptDocumentReferenceWithCreate()
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return static
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return static
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return static
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate Actual delivery date
     * @return static
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): static {
        $this
            ->getUblRootObject()
            ->firstDelivery()
            ?->unsetActualDeliveryDate();

        if (InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDate)) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addOnceToDeliveryWithCreate()
            ->setActualDeliveryDate($newDate);

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return static
     */
    public function setDocumentBuyerReference(
        ?string $newBuyerReference = null
    ): static {
        $this
            ->getUblRootObject()
            ->unsetBuyerReference();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerReference])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getBuyerReferenceWithCreate()
            ->setValue($newBuyerReference);

        return $this;
    }

    /**
     * Set information on the delivery conditions
     *
     * @param  null|string $newCode The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     */
    public function setDocumentDeliveryTerms(
        ?string $newCode = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentSellerName(
        ?string $newName = null
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->firstPartyLegalEntity()
            ?->unsetRegistrationName();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addOnceToPartyLegalEntityWithCreate()
            ->getRegistrationNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Add a name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentSellerName(
        ?string $newName = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentSellerName($newName);

        return $this;
    }

    /**
     * Set the ID of the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentSellerId(
        ?string $newId = null
    ): static {
        $ids = array_filter(
            $this
                ->getUblRootObject()
                ->getAccountingSupplierParty()
                ?->getParty()
                ?->getPartyIdentification() ?? [],
            static fn (PartyIdentification $partyIdentification) => !$partyIdentification->hasObjectFlag('id')
        );

        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->setPartyIdentification($ids);

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->addDocumentSellerId($newId);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentSellerId(
        ?string $newId = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('id')
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $ids = array_filter(
            $this
                ->getUblRootObject()
                ->getAccountingSupplierParty()
                ?->getParty()
                ?->getPartyIdentification() ?? [],
            static fn (PartyIdentification $partyIdentification) => !$partyIdentification->hasObjectFlag('globalid')
        );

        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->setPartyIdentification($ids);

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('globalid')
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->unsetPartyTaxScheme();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($this->convertTaxRegistrationType($newTaxRegistrationType));

        return $this;
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->unsetPostalAddress();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            return $this;
        }

        $postalAddress = $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getPostalAddressWithCreate();

        $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $postalAddress->addOnceToAddressLineWithCreate()->getLineWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            return $this;
        }

        $this->setDocumentSellerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->firstPartyLegalEntity()
            ?->unsetCompanyID();

        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->unsetPartyName();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblRootObject()
                ->getAccountingSupplierPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId)
                ->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblRootObject()
                ->getAccountingSupplierPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyNameWithCreate()
                ->getNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * Add a legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $this->setDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->unsetContact();

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newPhoneNumber,
                $newEmailAddress,
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * Add contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newPhoneNumber,
                $newEmailAddress,
            ])
        ) {
            return $this;
        }

        $this->setDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->unsetEndpointID();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getEndpointIDWithCreate()
            ->setSchemeID($newType)
            ->setValue($newUri);

        return $this;
    }

    /**
     * Add communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this->setDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentBuyerName(
        ?string $newName = null
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->firstPartyLegalEntity()
            ?->unsetRegistrationName();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addOnceToPartyLegalEntityWithCreate()
            ->getRegistrationNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Add a name of the buyer/customer party
     *
     * @param  null|string $newName __BT-44, From MINIMUM__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentBuyerName(
        ?string $newName = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Set the ID of the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentBuyerId(
        ?string $newId = null
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->unsetPartyIdentification();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addOnceToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentBuyerId(
        ?string $newId = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->unsetPartyIdentification();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addOnceToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this->setDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->unsetPartyTaxScheme();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($this->convertTaxRegistrationType($newTaxRegistrationType));

        return $this;
    }

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this->setDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->unsetPostalAddress();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            return $this;
        }

        $postalAddress = $this
            ->getUblRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getPostalAddressWithCreate();

        $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $postalAddress->addOnceToAddressLineWithCreate()->getLineWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Add an address to the buyer/customer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            return $this;
        }

        $this->setDocumentBuyerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->firstPartyLegalEntity()
            ?->unsetCompanyID();

        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->unsetPartyName();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblRootObject()
                ->getAccountingCustomerPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId)
                ->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblRootObject()
                ->getAccountingCustomerPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyNameWithCreate()
                ->getNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * Add a legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $this->setDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName
     * @param  null|string $newDepartmentName
     * @param  null|string $newPhoneNumber
     * @param  null|string $newFaxNumber
     * @param  null|string $newEmailAddress
     * @return static
     */
    public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->unsetContact();

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newPhoneNumber,
                $newEmailAddress,
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * Add contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newPhoneNumber,
                $newEmailAddress,
            ])
        ) {
            return $this;
        }

        $this->setDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);

        return $this;
    }

    /**
     * Set communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        $this
            ->getUblRootObject()
            ->getAccountingCustomerParty()
            ?->getParty()
            ?->unsetEndpointID();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getEndpointIDWithCreate()
            ->setSchemeID($newType)
            ->setValue($newUri);

        return $this;
    }

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this->setDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): static {
        $this
            ->getUblRootObject()
            ->getTaxRepresentativeParty()
            ?->unsetPartyName();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addOnceToPartyNameWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Add a name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Set the ID of the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getTaxRepresentativeParty()
            ?->unsetPartyTaxScheme();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addOnceToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($this->convertTaxRegistrationType($newTaxRegistrationType));

        return $this;
    }

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this->setDocumentTaxRepresentativeTaxRegistration(
            $newTaxRegistrationType,
            $newTaxRegistrationId
        );

        return $this;
    }

    /**
     * Set the address of the tax representative party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getTaxRepresentativeParty()
            ?->unsetPostalAddress();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            return $this;
        }

        $postalAddress = $this
            ->getUblRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->getPostalAddressWithCreate();

        $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $postalAddress->addOnceToAddressLineWithCreate()->getLineWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Add an address to the tax representative party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            return $this;
        }

        $this->setDocumentTaxRepresentativeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentProductEndUserName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentProductEndUserName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentProductEndUserId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentProductEndUserId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the product end-user party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the product end-user party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentProductEndUserCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentShipToName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentShipToName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentShipToId(
        ?string $newId = null
    ): static {
        $this
            ->getUblRootObject()
            ->firstDelivery()
            ?->getDeliveryLocation()
            ?->unsetID();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipToId(
        ?string $newId = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentShipToId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this
            ->getUblRootObject()
            ->firstDelivery()
            ?->getDeliveryLocation()
            ?->unsetID();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this->setDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        $this
            ->getUblRootObject()
            ->firstDelivery()
            ?->getDeliveryLocation()
            ?->unsetAddress();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            return $this;
        }

        $postalAddress = $this
            ->getUblRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getAddressWithCreate();

        $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine3])) {
            $postalAddress->addOnceToAddressLineWithCreate()->getLineWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision,
            ])
        ) {
            return $this;
        }

        $this->setDocumentShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentShipFromName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentShipFromName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentShipFromId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipFromId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Ship-From party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentInvoicerName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentInvoicerName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentInvoicerId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentInvoicerId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Invoicer party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentInvoiceeName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentInvoiceeName(
        ?string $newName = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentInvoiceeId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentInvoiceeId(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Invoicee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPayeeName(
        ?string $newName = null
    ): static {
        $this
            ->getUblRootObject()
            ->getPayeeParty()
            ?->firstPartyName()
            ?->unsetName();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getPayeePartyWithCreate()
            ->addOnceToPartyNameWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Add a name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPayeeName(
        ?string $newName = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Set the ID of the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPayeeId(
        ?string $newId = null
    ): static {
        $this
            ->getUblRootObject()
            ->getPayeeParty()
            ?->unsetPartyIdentification();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getPayeePartyWithCreate()
            ->addOnceToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPayeeId(
        ?string $newId = null
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        $this
            ->getUblRootObject()
            ->getPayeeParty()
            ?->unsetPartyIdentification();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getPayeePartyWithCreate()
            ->addOnceToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this->setDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the Payee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Payee party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getPayeeParty()
            ?->firstPartyLegalEntity()
            ?->unsetCompanyID()
            ?->unsetRegistrationName();

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblRootObject()
                ->getPayeePartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId)
                ->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblRootObject()
                ->getPayeePartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getRegistrationNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * Add a legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $this->setDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set Payment mean
     *
     * @param  null|string $newTypeCode            Expected or used means of payment expressed as a code
     * @param  null|string $newName                Expected or used means of payment expressed in text form
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @param  null|string $newBuyerIban           Identifier of the account to be debited
     * @param  null|string $newPayeeIban           Payment account identifier
     * @param  null|string $newPayeeAccountName    Name of the payment account
     * @param  null|string $newPayeeProprietaryId  National account number (not for SEPA)
     * @param  null|string $newPayeeBic            Identifier of the payment service provider
     * @param  null|string $newPaymentReference    Text value used to link the payment to the invoice issued by the seller
     * @param  null|string $newMandate             Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentMean(
        ?string $newTypeCode = null,
        ?string $newName = null,
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
        ?string $newBuyerIban = null,
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
        ?string $newMandate = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetPaymentMeans();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTypeCode])) {
            return $this;
        }

        $this->addDocumentPaymentMean(
            $newTypeCode,
            $newName,
            $newFinancialCardId,
            $newFinancialCardHolder,
            $newBuyerIban,
            $newPayeeIban,
            $newPayeeAccountName,
            $newPayeeProprietaryId,
            $newPayeeBic,
            $newPaymentReference,
            $newMandate
        );

        return $this;
    }

    /**
     * Add Payment mean
     *
     * @param  null|string $newTypeCode            Expected or used means of payment expressed as a code
     * @param  null|string $newName                Expected or used means of payment expressed in text form
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @param  null|string $newBuyerIban           Identifier of the account to be debited
     * @param  null|string $newPayeeIban           Payment account identifier
     * @param  null|string $newPayeeAccountName    Name of the payment account
     * @param  null|string $newPayeeProprietaryId  National account number (not for SEPA)
     * @param  null|string $newPayeeBic            Identifier of the payment service provider
     * @param  null|string $newPaymentReference    Text value used to link the payment to the invoice issued by the seller
     * @param  null|string $newMandate             Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentMean(
        ?string $newTypeCode = null,
        ?string $newName = null,
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
        ?string $newBuyerIban = null,
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
        ?string $newMandate = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTypeCode])) {
            return $this;
        }

        $paymentMean = $this
            ->getUblRootObject()
            ->addToPaymentMeansWithCreate();

        $paymentMean->getPaymentMeansCodeWithCreate()->setValue($newTypeCode);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $paymentMean->getPaymentMeansCodeWithCreate()->setName($newName);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardId])) {
            $paymentMean
                ->getCardAccountWithCreate()
                ->getPrimaryAccountNumberIDWithCreate()
                ->setValue($newFinancialCardId);

            $paymentMean
                ->getCardAccountWithCreate()
                ->getNetworkIDWithCreate()
                ->setValue('mapped-from-cii');

            if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardHolder])) {
                $paymentMean
                    ->getCardAccountWithCreate()
                    ->getHolderNameWithCreate()
                    ->setValue($newFinancialCardHolder);
            }
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban])) {
            $paymentMean
                ->getPaymentMandateWithCreate()
                ->getPayerFinancialAccountWithCreate()
                ->getIDWithCreate()
                ->setValue($newBuyerIban);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            $paymentMean
                ->getPayeeFinancialAccountWithCreate()
                ->getIDWithCreate()
                ->setValue($newPayeeIban);

            if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeAccountName])) {
                $paymentMean
                    ->getPayeeFinancialAccountWithCreate()
                    ->getNameWithCreate()
                    ->setValue($newPayeeAccountName);
            }

            if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeBic])) {
                $paymentMean
                    ->getPayeeFinancialAccountWithCreate()
                    ->getFinancialInstitutionBranchWithCreate()
                    ->getIDWithCreate()
                    ->setValue($newPayeeBic);
            }
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newMandate])) {
            $paymentMean->getPaymentMandateWithCreate()->getIDWithCreate()->setValue($newMandate);
        }

        return $this;
    }

    /**
     * Set Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * Add Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * Add Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          Payment account identifier
     * @param  null|string $newPayeeAccountName   Name of the payment account
     * @param  null|string $newPayeeProprietaryId National account number (not for SEPA)
     * @param  null|string $newPayeeBic           Identifier of the payment service provider
     * @param  null|string $newPaymentReference   Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        return $this;
    }

    /**
     * Set Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * Add Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * Add Payment mean (as non SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban Identifier of the account to be debited
     * @param  null|string $newMandate   Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        return $this;
    }

    /**
     * Set Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @return static
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): static {
        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: $newFinancialCardId,
            newFinancialCardHolder: $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * Add Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder Name of the payment card holder
     * @return static
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): static {
        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: $newFinancialCardId,
            newFinancialCardHolder: $newFinancialCardHolder
        );

        return $this;
    }

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): static {
        $ids = $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->getPartyIdentification() ?? [];

        $ids = array_filter(
            $ids,
            static fn (PartyIdentification $partyIdentification) => !$partyIdentification->hasObjectFlag('creditorreference')
        );

        $this
            ->getUblRootObject()
            ->getAccountingSupplierParty()
            ?->getParty()
            ?->setPartyIdentification($ids);

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('creditorreference')
            ->getIDWithCreate()
            ->setValue($newId)
            ->setSchemeID('SEPA');

        return $this;
    }

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentPaymentCreditorReferenceID($newId);

        return $this;
    }

    /**
     * Set a link to the invoice issued by the seller
     *
     * @param  null|string $newId A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentReference(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add a link to the invoice issued by the seller
     *
     * @param  null|string $newId A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentReference(
        ?string $newId = null
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @param  null|string            $newMandate     Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): static {
        $this
            ->getUblRootObject()
            ->unsetPaymentTerms();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDescription])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addOnceToPaymentTermsWithCreate()
            ->addToNoteWithCreate()
            ->setValue($newDescription);

        return $this;
    }

    /**
     * Add payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @param  null|string            $newMandate     Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDescription])) {
            return $this;
        }

        $this->setDocumentPaymentTerm(
            $newDescription,
            $newDueDate,
            $newMandate
        );

        return $this;
    }

    /**
     * Set payment discount terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return static
     */
    public function setDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add payment discount terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return static
     */
    public function addDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set payment penalty terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return static
     */
    public function setDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add payment penalty terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return static
     */
    public function addDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set Document Tax Breakdown
     *
     * @param  null|string            $newTaxCategory         Coded description of the tax category
     * @param  null|string            $newTaxType             Coded description of the tax type
     * @param  null|float             $newBasisAmount         Tax base amount
     * @param  null|float             $newTaxAmount           Tax total amount
     * @param  null|float             $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string            $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string            $newExemptionReasonCode Reason for tax exemption (Code)
     * @param  null|DateTimeInterface $newTaxDueDate          Date on which tax is due
     * @param  null|string            $newTaxDueCode          Code for the date on which tax is due
     * @return static
     */
    public function setDocumentTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newBasisAmount = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
        ?DateTimeInterface $newTaxDueDate = null,
        ?string $newTaxDueCode = null,
    ): static {
        $this
            ->getUblRootObject()
            ->firstTaxTotal()
            ?->unsetTaxSubtotal();

        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])
            || InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])
        ) {
            return $this;
        }

        $this->addDocumentTax(
            $newTaxCategory,
            $newTaxType,
            $newBasisAmount,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode,
            $newTaxDueDate,
            $newTaxDueCode
        );

        return $this;
    }

    /**
     * Add Document Tax Breakdown
     *
     * @param  null|string            $newTaxCategory         Coded description of the tax category
     * @param  null|string            $newTaxType             Coded description of the tax type
     * @param  null|float             $newBasisAmount         Tax base amount
     * @param  null|float             $newTaxAmount           Tax total amount
     * @param  null|float             $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string            $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string            $newExemptionReasonCode Reason for tax exemption (Code)
     * @param  null|DateTimeInterface $newTaxDueDate          Date on which tax is due
     * @param  null|string            $newTaxDueCode          Code for the date on which tax is due
     * @return static
     */
    public function addDocumentTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newBasisAmount = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
        ?DateTimeInterface $newTaxDueDate = null,
        ?string $newTaxDueCode = null,
    ): static {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])
            || InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])
        ) {
            return $this;
        }

        $taxSubTotal = $this
            ->getUblRootObject()
            ->addOnceToTaxTotalWithCreate()
            ->addToTaxSubtotalWithCreate();

        $taxCategory = $taxSubTotal->getTaxCategoryWithCreate();
        $taxCategory->getIDWithCreate()->setValue($newTaxCategory);
        $taxCategory->getTaxSchemeWithCreate()->getIDWithCreate()->setValue($newTaxType);

        $taxSubTotal->getTaxableAmountWithCreate()->setValue($newBasisAmount);
        $taxSubTotal->getTaxAmountWithCreate()->setValue($newTaxAmount);

        if (!is_null($newTaxPercent)) {
            $taxCategory->getPercentWithCreate()->setValue($newTaxPercent);
        }

        if (!is_null($newExemptionReason)) {
            $taxCategory->addOnceToTaxExemptionReasonWithCreate()->setValue($newExemptionReason);
        }

        if (!is_null($newExemptionReasonCode)) {
            $taxCategory->getTaxExemptionReasonCodeWithCreate()->setValue($newExemptionReasonCode);
        }

        if (!is_null($newTaxDueDate)) {
            $this->getUblRootObject()->setTaxPointDate($newTaxDueDate);
        }

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Set Document Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newTaxCategory               Coded description of the tax category
     * @param  null|string $newTaxType                   Coded description of the tax type
     * @param  null|float  $newTaxPercent                Tax Rate (Percentage)
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     */
    public function setDocumentAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetAllowanceCharge();

        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])
            || InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])
        ) {
            return $this;
        }

        $this->addDocumentAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        return $this;
    }

    /**
     * Add Document Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newTaxCategory               Coded description of the tax category
     * @param  null|string $newTaxType                   Coded description of the tax type
     * @param  null|float  $newTaxPercent                Tax Rate (Percentage)
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     */
    public function addDocumentAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): static {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])
            || InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])
        ) {
            return $this;
        }

        $allowanceCharge = $this
            ->getUblRootObject()
            ->addToAllowanceChargeWithCreate();

        $allowanceCharge
            ->setChargeIndicator($newChargeIndicator ?? false);

        $allowanceCharge
            ->getAmountWithCreate()
            ->setValue($newAllowanceChargeAmount);

        if (!is_null($newAllowanceChargeBaseAmount)) {
            $allowanceCharge
                ->getBaseAmountWithCreate()
                ->setValue($newAllowanceChargeBaseAmount);
        }

        if (!is_null($newAllowanceChargePercent)) {
            $allowanceCharge
                ->getMultiplierFactorNumericWithCreate()
                ->setValue($newAllowanceChargePercent);
        }

        if (!is_null($newAllowanceChargeReason)) {
            $allowanceCharge
                ->clearAllowanceChargeReason()
                ->addToAllowanceChargeReasonWithCreate()
                ->setValue($newAllowanceChargeReason);
        }

        if (!is_null($newAllowanceChargeReasonCode)) {
            $allowanceCharge
                ->getAllowanceChargeReasonCodeWithCreate()
                ->setValue($newAllowanceChargeReasonCode);
        }

        $taxCategory = $allowanceCharge->clearTaxCategory()->addToTaxCategoryWithCreate();
        $taxCategory->getIDWithCreate()->setValue($newTaxCategory);
        $taxCategory->getTaxSchemeWithCreate()->getIDWithCreate()->setValue($newTaxType);

        if (!is_null($newTaxPercent)) {
            $taxCategory->getPercentWithCreate()->setValue($newTaxPercent);
        }

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Set Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return static
     */
    public function setDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return static
     */
    public function addDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Prepare the document-level summation (Sets all values to zero)
     *
     * @return static
     */
    public function prepareDocumentSummation(): static
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the document summation
     *
     * @param  null|float $newNetAmount           Sum of the net amounts of all invoice lines
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxBasisAmount      Total invoice amount excluding sales tax
     * @param  null|float $newTaxTotalAmount      Total amount of the invoice sales tax (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice amount including sales tax
     * @param  null|float $newDueAmount           Payment amount due
     * @param  null|float $newPrepaidAmount       Prepayment amount
     * @param  null|float $newRoungingAmount      Rounding amount
     * @return static
     */
    public function setDocumentSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxBasisAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newTaxTotalAmount2 = null,
        ?float $newGrossAmount = null,
        ?float $newDueAmount = null,
        ?float $newPrepaidAmount = null,
        ?float $newRoungingAmount = null,
    ): static {
        $this
            ->getUblRootObject()
            ->unsetLegalMonetaryTotal();

        $this
            ->getUblRootObject()
            ->getTaxTotalAtIndex(0)
            ?->unsetTaxAmount();

        $this
            ->getUblRootObject()
            ->getTaxTotalAtIndex(1)
            ?->unsetTaxAmount();

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([
            $newNetAmount, $newTaxBasisAmount, $newTaxTotalAmount, $newGrossAmount, $newDueAmount,
        ])) {
            return $this;
        }

        $summation = $this
            ->getUblRootObject()
            ->getLegalMonetaryTotalWithCreate();

        $summation->getLineExtensionAmountWithCreate()->setValue($newNetAmount);
        $summation->getTaxExclusiveAmountWithCreate()->setValue($newTaxBasisAmount);
        $summation->getTaxInclusiveAmountWithCreate()->setValue($newGrossAmount);
        $summation->getPayableAmountWithCreate()->setValue($newDueAmount);

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newChargeTotalAmount)) {
            $summation->getChargeTotalAmountWithCreate()->setValue($newChargeTotalAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newDiscountTotalAmount)) {
            $summation->getAllowanceTotalAmountWithCreate()->setValue($newDiscountTotalAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newPrepaidAmount)) {
            $summation->getPrepaidAmountWithCreate()->setValue($newPrepaidAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newRoungingAmount)) {
            $summation->getPayableRoundingAmountWithCreate()->setValue($newRoungingAmount);
        }

        $this->getUblRootObject()->addToTaxTotalWithCreateAtIndex(0)->getTaxAmountWithCreate()->setValue($newTaxTotalAmount);

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxTotalAmount2)) {
            $this->getUblRootObject()->addToTaxTotalWithCreateAtIndex(1)->getTaxAmountWithCreate()->setValue($newTaxTotalAmount2);
        }

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Add a new position to document
     *
     * @param  null|string $newPositionId           Identification of the position
     * @param  null|string $newParentPositionId     Identification of the parent position
     * @param  null|string $newLineStatusCode       Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return static
     */
    public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPositionId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->addToCreditNoteLineWithCreate()
            ->getIDWithCreate()
            ->setValue($newPositionId);

        return $this;
    }

    /**
     * Set text information to latest added position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return static
     */
    public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetNote();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->addToNoteWithCreate()
            ->setValue($newContent);

        return $this;
    }

    /**
     * Add text information to latest added position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return static
     */
    public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $this->setDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        return $this;
    }

    /**
     * Add product details to latest added position
     *
     * @param  null|string $newProductId                 ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName               Name of the product (product name)
     * @param  null|string $newProductDescription        Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId           Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId            Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId           Product global id
     * @param  null|string $newProductGlobalIdType       Type of the product global id
     * @param  null|string $newProductIndustryId         Id assigned by the industry
     * @param  null|string $newProductModelId            Unique model identifier of the product
     * @param  null|string $newProductBatchId            Batch (lot) identifier of the product
     * @param  null|string $newProductBrandName          Brand name of the product
     * @param  null|string $newProductModelName          Model name of the product
     * @param  null|string $newProductOriginTradeCountry Code indicating the country the goods came from
     * @return static
     */
    public function setDocumentPositionProductDetails(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?string $newProductModelId = null,
        ?string $newProductBatchId = null,
        ?string $newProductBrandName = null,
        ?string $newProductModelName = null,
        ?string $newProductOriginTradeCountry = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetItem();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductName])) {
            return $this;
        }

        $positionProduct = $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->getItemWithCreate();

        $positionProduct->getNameWithCreate()->setValue($newProductName);

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductDescription])) {
            $positionProduct->addOnceToDescriptionWithCreate()->setValue($newProductDescription);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductSellerId])) {
            $positionProduct->getSellersItemIdentificationWithCreate()->getIDWithCreate()->setValue($newProductSellerId);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductBuyerId])) {
            $positionProduct->getBuyersItemIdentificationWithCreate()->getIDWithCreate()->setValue($newProductBuyerId);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductGlobalIdType]) && !InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductGlobalId])) {
            $positionProduct->getStandardItemIdentificationWithCreate()->getIDWithCreate()->setValue($newProductGlobalId)->setSchemeID($newProductGlobalIdType);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductOriginTradeCountry])) {
            $positionProduct->getOriginCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newProductOriginTradeCountry);
        }

        return $this;
    }

    /**
     * Set product characteristics in latest added position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return static
     */
    public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): static {
        $positionProduct = $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->getItem();

        if (is_null($positionProduct)) {
            return $this;
        }

        $positionProduct->unsetAdditionalItemProperty();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])) {
            return $this;
        }

        $this->addDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit,
        );

        return $this;
    }

    /**
     * Add product characteristics in latest added position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return static
     */
    public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): static {
        $positionProduct = $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->getItem();

        if (is_null($positionProduct)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])) {
            return $this;
        }

        $positionProductCharacteristic = $positionProduct->addToAdditionalItemPropertyWithCreate();
        $positionProductCharacteristic->getNameWithCreate()->setValue($newProductCharacteristicDescription);
        $positionProductCharacteristic->getValueWithCreate()->setValue($newProductCharacteristicValue);

        return $this;
    }

    /**
     * Set product classification in latest added position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return static
     */
    public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): static {
        $positionProduct = $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->getItem();

        if (is_null($positionProduct)) {
            return $this;
        }

        $positionProduct->unsetCommodityClassification();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])) {
            return $this;
        }

        $this->addDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        return $this;
    }

    /**
     * Add product classification in latest added position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return static
     */
    public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): static {
        $positionProduct = $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->getItem();

        if (is_null($positionProduct)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])) {
            return $this;
        }

        $positionProductClassification = $positionProduct->addToCommodityClassificationWithCreate();

        $positionProductClassificationCode = $positionProductClassification
            ->getItemClassificationCodeWithCreate()
            ->setValue($newProductClassificationCode)
            ->setListID($newProductClassificationListId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductClassificationListVersionId)) {
            $positionProductClassificationCode->setListVersionID($newProductClassificationListVersionId);
        }

        return $this;
    }

    /**
     * Set referenced product in latest added position
     *
     * @param  null|string $newProductId               ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName             Name of the product (product name)
     * @param  null|string $newProductDescription      Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId         Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId          Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId         Product global id
     * @param  null|string $newProductGlobalIdType     Type of the product global id
     * @param  null|string $newProductIndustryId       Id assigned by the industry
     * @param  null|float  $newProductUnitQuantity     Quantity Quantity of the referenced product contained
     * @param  null|string $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return static
     */
    public function setDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add referenced product in latest added position
     *
     * @param  null|string $newProductId               ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName             Name of the product (product name)
     * @param  null|string $newProductDescription      Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId         Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId          Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId         Product global id
     * @param  null|string $newProductGlobalIdType     Type of the product global id
     * @param  null|string $newProductIndustryId       Id assigned by the industry
     * @param  null|float  $newProductUnitQuantity     Quantity Quantity of the referenced product contained
     * @param  null|string $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return static
     */
    public function addDocumentPositionReferencedProduct(
        ?string $newProductId = null,
        ?string $newProductName = null,
        ?string $newProductDescription = null,
        ?string $newProductSellerId = null,
        ?string $newProductBuyerId = null,
        ?string $newProductGlobalId = null,
        ?string $newProductGlobalIdType = null,
        ?string $newProductIndustryId = null,
        ?float $newProductUnitQuantity = null,
        ?string $newProductUnitQuantityUnit = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated seller's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return static
     */
    public function setDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated seller's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return static
     */
    public function addDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetOrderLineReference();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->addToOrderLineReferenceWithCreate()
            ->getLineIDWithCreate()
            ->setValue($newReferenceLineNumber);

        return $this;
    }

    /**
     * Add an associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber])) {
            return $this;
        }

        $this->setDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Set the associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated contract (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated contract (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional associated document (line reference)
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|string                 $newReferenceLineNumber    Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function setDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional associated document (line reference)
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|string                 $newReferenceLineNumber    Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     */
    public function addDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference (line reference)
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return static
     */
    public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference (line reference)
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return static
     */
    public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return static
     */
    public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return static
     */
    public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return static
     */
    public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return static
     */
    public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return static
     */
    public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return static
     */
    public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return static
     */
    public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return static
     */
    public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional object reference
     *
     * @param  null|string $newReferenceNumber   Object identification at the level on position-level
     * @param  null|string $newTypeCode          Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     */
    public function setDocumentPositionAdditionalObjectReference(
        ?string $newReferenceNumber = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetDocumentReference();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $documentReference = $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->addOnceToDocumentReferenceWithCreate();

        $documentReference->getIDWithCreate()->setValue($newReferenceNumber);

        if ($newTypeCode === '130') {
            $documentReference->getDocumentTypeCodeWithCreate()->setValue($newTypeCode);
        }

        return $this;
    }

    /**
     * Add an additional object reference
     *
     * @param  null|string $newReferenceNumber   Object identification at the level on position-level
     * @param  null|string $newTypeCode          Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     */
    public function addDocumentPositionAdditionalObjectReference(
        ?string $newReferenceNumber = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this;
        }

        $this->setDocumentPositionAdditionalObjectReference(
            $newReferenceNumber,
            $newTypeCode,
            $newReferenceTypeCode
        );

        return $this;
    }

    /**
     * Set the position's gross price
     *
     * @param  null|float  $newGrossPrice                  Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     */
    public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set discount or charge to the gross price
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return static
     */
    public function setDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add discount or charge to the gross price
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return static
     */
    public function addDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the position's net price
     *
     * @param  null|float  $newNetPrice                  Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     */
    public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetPrice();

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newNetPrice])) {
            return $this;
        }

        $netPrice = $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->getPriceWithCreate();

        $netPrice->getPriceAmountWithCreate()
            ->setValue($newNetPrice);

        if (
            !InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newNetPriceBasisQuantity])
            && !InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newNetPriceBasisQuantityUnit])
        ) {
            $netPrice
                ->getBaseQuantityWithCreate()
                ->setValue($newNetPriceBasisQuantity)
                ->setUnitCode($newNetPriceBasisQuantityUnit);
        }

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Set the position's net price included tax
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     */
    public function setDocumentPositionNetPriceTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the position's quantities
     *
     * @param  null|float  $newQuantity               Invoiced quantity
     * @param  null|string $newQuantityUnit           Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity     Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param  null|float  $newPackageQuantity        Package quantity
     * @param  null|string $newPackageQuantityUnit    Package quantity unit
     * @return static
     */
    public function setDocumentPositionQuantities(
        ?float $newQuantity = null,
        ?string $newQuantityUnit = null,
        ?float $newChargeFreeQuantity = null,
        ?string $newChargeFreeQuantityUnit = null,
        ?float $newPackageQuantity = null,
        ?string $newPackageQuantityUnit = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetCreditedQuantity();

        if (
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newQuantity])
            || InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newQuantityUnit])
        ) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->getCreditedQuantityWithCreate()
            ->setValue($newQuantity)
            ->setUnitCode($newQuantityUnit);

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPositionShipToName(
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPositionShipToName(
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPositionShipToId(
        ?string $newId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPositionShipToId(
        ?string $newId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function setDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add a address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
     */
    public function addDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     */
    public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate
     * @return static
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): static {
        // Nothing here

        return $this;
    }

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetInvoicePeriod();

        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->addOnceToInvoicePeriodWithCreate()
            ->setStartDate($newStartDate)
            ->setEndDate($newEndDate);

        return $this;
    }

    /**
     * Add a position's start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     */
    public function addDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this;
        }

        $this->setDocumentPositionBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Set the position's tax information
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     */
    public function setDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->getItem()
            ?->unsetClassifiedTaxCategory();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this;
        }

        $tradeTax = $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->getItemWithCreate()
            ->addToClassifiedTaxCategoryWithCreate();

        $tradeTax->getIDWithCreate()->setValue($newTaxCategory);
        $tradeTax->getTaxSchemeWithCreate()->getIDWithCreate()->setValue($newTaxType);

        if (!InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent])) {
            $tradeTax->getPercentWithCreate()->setValue($newTaxPercent);
        }

        return $this;
    }

    /**
     * Add a position's tax information
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
     */
    public function addDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): static {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this;
        }

        $this->setDocumentPositionTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode
        );

        return $this;
    }

    /**
     * Set Document position Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     */
    public function setDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetAllowanceCharge();

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])) {
            return $this;
        }

        $this->addDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        return $this;
    }

    /**
     * Add Document position Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
     */
    public function addDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): static {
        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])) {
            return $this;
        }

        $allowanceCharge = $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->addToAllowanceChargeWithCreate();

        $allowanceCharge->setChargeIndicator($newChargeIndicator ?? false);
        $allowanceCharge->getAmountWithCreate()->setValue($newAllowanceChargeAmount);

        if (!InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeBaseAmount])) {
            $allowanceCharge->getBaseAmountWithCreate()->setValue($newAllowanceChargeBaseAmount);
        }

        if (!InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargePercent])) {
            $allowanceCharge->getMultiplierFactorNumericWithCreate()->setValue($newAllowanceChargePercent);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAllowanceChargeReason])) {
            $allowanceCharge->addOnceToAllowanceChargeReasonWithCreate()->setValue($newAllowanceChargeReason);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAllowanceChargeReasonCode])) {
            $allowanceCharge->getAllowanceChargeReasonCodeWithCreate()->setValue($newAllowanceChargeReasonCode);
        }

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Set the document position summation
     *
     * @param  null|float $newNetAmount           Net amount
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxTotalAmount      Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice line amount including sales tax
     * @return static
     */
    public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null,
    ): static {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetLineExtensionAmount();

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newNetAmount])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->getLineExtensionAmountWithCreate()
            ->setValue($newNetAmount);

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Set a position's posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function setDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): static
    {
        $this
            ->getUblRootObject()
            ->getLatestDocumentLine()
            ?->unsetAccountingCost();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAccountId])) {
            return $this;
        }

        $this
            ->getUblRootObject()
            ->getLatestDocumentLineWithCreate()
            ->getAccountingCostCodeWithCreate()
            ->setValue($newAccountId);

        return $this;
    }

    /**
     * Add a position's posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     */
    public function addDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): static
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAccountId])) {
            return $this;
        }

        $this->setDocumentPositionPostingReference($newType, $newAccountId);

        return $this;
    }

    /**
     * Returns the root object as a credit note
     *
     * @return CreditNote
     */
    protected function getUblRootObject(): CreditNote
    {
        return $this->getDocumentRootObject();
    }

    /**
     * Internal helper method which updates currencies in several objects
     *
     * @return static
     */
    protected function updateCurrencies(): static
    {
        $invoiceCurrencyCode = $this
            ->getUblRootObject()
            ->getDocumentCurrencyCode()
            ?->getValue();

        $taxCurrencyCode = $this
            ->getUblRootObject()
            ->getTaxCurrencyCode()
            ?->getValue();

        // Update summation

        $summation = $this
            ->getUblRootObject()
            ->getLegalMonetaryTotal();

        $summation?->getLineExtensionAmount()?->setCurrencyID($invoiceCurrencyCode);
        $summation?->getTaxExclusiveAmount()?->setCurrencyID($invoiceCurrencyCode);
        $summation?->getTaxInclusiveAmount()?->setCurrencyID($invoiceCurrencyCode);
        $summation?->getPayableAmount()?->setCurrencyID($invoiceCurrencyCode);
        $summation?->getChargeTotalAmount()?->setCurrencyID($invoiceCurrencyCode);
        $summation?->getAllowanceTotalAmount()?->setCurrencyID($invoiceCurrencyCode);
        $summation?->getPrepaidAmount()?->setCurrencyID($invoiceCurrencyCode);
        $summation?->getPayableRoundingAmount()?->setCurrencyID($invoiceCurrencyCode);

        // Update Header

        foreach ($this->getUblRootObject()->getAllowanceCharge() ?? [] as $allowanceCharge) {
            $allowanceCharge->getAmount()?->setCurrencyID($invoiceCurrencyCode);
            $allowanceCharge->getBaseAmount()?->setCurrencyID($invoiceCurrencyCode);
        }

        // Update Lines

        foreach ($this->getUblRootObject()->getCreditNoteLine() ?? [] as $invoiceLine) {
            $invoiceLine->getPrice()?->getPriceAmount()?->setCurrencyID($invoiceCurrencyCode);
            $invoiceLine->getLineExtensionAmount()?->setCurrencyID($invoiceCurrencyCode);

            foreach ($invoiceLine->getAllowanceCharge() ?? [] as $allowanceCharge) {
                $allowanceCharge->getAmount()?->setCurrencyID($invoiceCurrencyCode);
                $allowanceCharge->getBaseAmount()?->setCurrencyID($invoiceCurrencyCode);
            }
        }

        // Update Tax

        $taxTotal = $this->getUblRootObject()->getTaxTotal();
        $taxTotal1 = array_key_exists(0, $taxTotal ?? []) ? $taxTotal[0] : null;
        $taxTotal2 = array_key_exists(1, $taxTotal ?? []) ? $taxTotal[1] : null;

        $taxTotal1?->getTaxAmount()?->setCurrencyID($invoiceCurrencyCode);
        $taxTotal2?->getTaxAmount()?->setCurrencyID($taxCurrencyCode);

        foreach ($taxTotal1?->getTaxSubtotal() ?? [] as $taxSubTotal) {
            $taxSubTotal->getTaxableAmount()?->setCurrencyID($invoiceCurrencyCode);
            $taxSubTotal->getTaxAmount()?->setCurrencyID($invoiceCurrencyCode);
        }

        foreach ($taxTotal2?->getTaxSubtotal() ?? [] as $taxSubTotal) {
            $taxSubTotal->getTaxableAmount()?->setCurrencyID($taxCurrencyCode);
            $taxSubTotal->getTaxAmount()?->setCurrencyID($taxCurrencyCode);
        }

        // Remove TaxTotal at index 1 if no tax currency was provided

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($taxCurrencyCode)) {
            $this->getUblRootObject()->unsetTaxTotalAtIndex(1);
        }

        return $this;
    }

    /**
     * Converts the tax registration identifier
     *
     * @param  ?string $newTaxRegistrationType
     * @return string
     */
    private function convertTaxRegistrationType(?string $newTaxRegistrationType): string
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTaxRegistrationType)) {
            return '';
        }

        if (strcasecmp((string) $newTaxRegistrationType, 'VA') === 0) {
            return 'VAT';
        }

        return $newTaxRegistrationType;
    }
}
