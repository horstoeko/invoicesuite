<?php

namespace horstoeko\invoicesuite\providers\ubl;

use DateTimeInterface;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference;
use horstoeko\invoicesuite\models\ubl\cac\AllowanceCharge;
use horstoeko\invoicesuite\models\ubl\cac\PartyIdentification;
use horstoeko\invoicesuite\models\ubl\cac\PartyIdentificationType;
use horstoeko\invoicesuite\models\ubl\main\Invoice;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteFloatUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class InvoiceSuiteUblInvoiceProviderBuilder extends InvoiceSuiteAbstractFormatProviderBuilder
{
    /**
     * Returns the root object as a Invoice
     *
     * @return Invoice
     */
    protected function getUblInvoiceRootObject(): Invoice
    {
        return $this->getRootObject();
    }

    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteUblInvoiceProviderBuilder
    {
        $this->setContextParameter(
            $this->getCurrentFormatProviderParameterValue('CUSTOMIZATIONID', ''),
            $this->getCurrentFormatProviderParameterValue('PROFILEID', '')
        );

        return $this;
    }

    /**
     * Init context parameter for profile definition
     *
     * @param string $newCustomizationId
     * @param string $newProfileId
     * @return static
     */
    public function setContextParameter(string $newCustomizationId, string $newProfileId): self
    {
        $this->getUblInvoiceRootObject()->getCustomizationIDWithCreate()->setValue($newCustomizationId);
        $this->getUblInvoiceRootObject()->getProfileIDWithCreate()->setValue($newProfileId);

        return $this;
    }

    /**
     * Internal helper method which updates currencies in several objects
     *
     * @return self
     */
    protected function updateCurrencies(): self
    {
        $invoiceCurrencyCode = $this
            ->getUblInvoiceRootObject()
            ->getDocumentCurrencyCode()?->getValue();

        $taxCurrencyCode = $this
            ->getUblInvoiceRootObject()
            ->getTaxCurrencyCode()?->getValue();

        // Update summation

        $summation = $this
            ->getUblInvoiceRootObject()
            ->getLegalMonetaryTotal();

        if (!is_null($summation)) {
            if (!is_null($summation->getLineExtensionAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getLineExtensionAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (!is_null($summation->getTaxExclusiveAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getTaxExclusiveAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (!is_null($summation->getTaxInclusiveAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getTaxInclusiveAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (!is_null($summation->getPayableAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getPayableAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (!is_null($summation->getChargeTotalAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getChargeTotalAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (!is_null($summation->getAllowanceTotalAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getAllowanceTotalAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (!is_null($summation->getPrepaidAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getPrepaidAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (!is_null($summation->getPayableRoundingAmount()) && !is_null($invoiceCurrencyCode)) {
                $summation->getPayableRoundingAmount()->setCurrencyID($invoiceCurrencyCode);
            }
        }

        // Update Tax

        $taxTotal = $this->getUblInvoiceRootObject()->getTaxTotal();

        if (!is_null($taxTotal)) {
            if (isset($taxTotal[0]) && !is_null($taxTotal[0]->getTaxAmount()) && !is_null($invoiceCurrencyCode)) {
                $taxTotal[0]->getTaxAmount()->setCurrencyID($invoiceCurrencyCode);
            }

            if (isset($taxTotal[1]) && !is_null($taxTotal[1]->getTaxAmount()) && !is_null($taxCurrencyCode)) {
                $taxTotal[1]->getTaxAmount()->setCurrencyID($taxCurrencyCode);
            }
        }

        return $this;
    }

    /**
     * Create a document by a DTO
     *
     * @param InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return self
     */
    public function createFromDTO(
        InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
    ): self {

        // Document-Level General information

        $this->setDocumentNo($newDocumentDTO->getNumber());
        $this->setDocumentType($newDocumentDTO->getType());
        $this->setDocumentDescription($newDocumentDTO->getDescription());
        $this->setDocumentLanguage($newDocumentDTO->getLanguage());
        $this->setDocumentDate($newDocumentDTO->getDate());
        $this->setDocumentCompleteDate($newDocumentDTO->getCompleteDate());
        $this->setDocumentCurrency($newDocumentDTO->getCurrency());
        $this->setDocumentTaxCurrency($newDocumentDTO->getTaxCurrency());
        $this->setDocumentIsTest($newDocumentDTO->getIsTest());
        $this->setDocumentIsCopy($newDocumentDTO->getIsCopy());

        // Document-Level Notes

        $newDocumentDTO->forEachNote(fn(InvoiceSuiteNoteDTO $note) => $this->addDocumentNote(
            $note->getContent(),
            $note->getContentCode(),
            $note->getSubjectCode()
        ));

        // Document-Level Billing period

        $newDocumentDTO->firstBillingPeriod(
            fn(InvoiceSuiteDateRangeDTO $item) => $this->setDocumentBillingPeriod(
                $item->getStartDate(),
                $item->getEndDate(),
                $item->getDescription()
            )
        );

        // Document-Level Posting Reference

        $newDocumentDTO->firstPostingReference(
            fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPostingReference(
                $item->getIdType(),
                $item->getId()
            )
        );

        // Document-Level Seller Order Reference

        $newDocumentDTO->firstSellerOrderReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentSellerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Buyer Order Reference

        $newDocumentDTO->firstBuyerOrderReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentBuyerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Quotation Reference

        $newDocumentDTO->firstQuotationReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentQuotationReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Contract Reference

        $newDocumentDTO->firstContractReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentContractReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Additional Reference

        $newDocumentDTO->forEachAdditionalReference(
            fn(InvoiceSuiteReferenceDocumentExtDTO $item) => $this->addDocumentAdditionalReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate(),
                $item->getTypeCode(),
                $item->getReferenceTypeCode(),
                $item->getDescription(),
                $item->getAttachment()
            )
        );

        // Document-Level Invoice Reference

        $newDocumentDTO->forEachInvoiceReference(
            fn(InvoiceSuiteReferenceDocumentExtDTO $item) => $this->addDocumentInvoiceReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate(),
                $item->getTypeCode()
            )
        );

        // Document-Level Project Reference

        $newDocumentDTO->firstProjectReference(
            fn(InvoiceSuiteProjectDTO $item) => $this->setDocumentProjectReference(
                $item->getProjectNumber(),
                $item->getProjectName()
            )
        );

        // Document-Level Ultimate Customer Order Reference

        // ... nothing here, not supported

        // Document-Level Despatch Advice Reference

        $newDocumentDTO->firstDespatchAdviceReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentDespatchAdviceReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Receiving Advice Reference

        $newDocumentDTO->firstReceivingAdviceReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentReceivingAdviceReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Delivery Note Reference

        // ... nothing here, not supported

        // Document-Level Supply Chain Event

        $this->setDocumentSupplyChainEvent($newDocumentDTO->getSupplyChainEvent());

        // Document-Level Buyer Reference

        $newDocumentDTO->firstBuyerReference(
            fn(InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerReference($item->getId())
        );

        // Document-Level Seller/Supplier Party

        $newDocumentDTO
            ->getSellerParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentSellerName($item)
            )
            ?->forEachId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentSellerId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentSellerGlobalId($item->getId(), $item->getIdType())
            )
            ?->forEachTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentSellerTaxRegistration($item->getIdType(), $item->getId()),
                null,
                2
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentSellerAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            )
            ?->firstLegalOrganisation(
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentSellerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->firstContact(
                fn(InvoiceSuiteContactDTO $item) => $this->setDocumentSellerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentSellerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Buyer/Customer Party

        $newDocumentDTO
            ->getBuyerParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentBuyerName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerId($item->getId()),
                fn() => $newDocumentDTO->getBuyerParty()->firstGlobalId(fn($item) => $this->setDocumentBuyerGlobalId($item->getId(), $item->getIdType()))
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentBuyerAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            )
            ?->firstLegalOrganisation(
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentBuyerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->firstContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentBuyerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentBuyerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Seller Tax Representative Party

        $newDocumentDTO
            ->getTaxRepresentativeParty()
            ->firstName(
                fn(string $item) => $this->setDocumentTaxRepresentativeName($item)
            )
            ->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentTaxRepresentativeTaxRegistration($item->getIdType(), $item->getId())
            )
            ->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentTaxRepresentativeAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            );

        // Document-Level Product End-User Party

        // ... nothing here, not supported

        // Document-Level Ship-To Party

        $newDocumentDTO
            ->getShipToParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentShipToName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentShipToId($item->getId()),
                fn() => $newDocumentDTO->getShipToParty()->firstGlobalId(fn($item) => $this->setDocumentShipToGlobalId($item->getId(), $item->getIdType()))
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentShipToAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            );

        // Document-Level Ultimate Ship-To Party

        // ... nothing here, not supported

        // Document-Level Ship-From Party

        // ... nothing here, not supported

        // Document-Level Invoicer Party

        // ... nothing here, not supported

        // Document-Level Invoicee Party

        // ... nothing here, not supported

        // Document-Level Payee Party

        $newDocumentDTO
            ->getPayeeParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentPayeeName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPayeeId($item->getId()),
                fn() => $newDocumentDTO->getPayeeParty()->firstGlobalId(fn($item) => $this->setDocumentPayeeGlobalId($item->getId(), $item->getIdType()))
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPayeeTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentPayeeAddress(
                    $item->getAddressLine1(),
                    $item->getAddressLine2(),
                    $item->getAddressLine3(),
                    $item->getPostcode(),
                    $item->getCity(),
                    $item->getCountry(),
                    $item->getSubDivision()
                )
            )
            ?->firstLegalOrganisation(
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentPayeeLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->firstContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentPayeeContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentPayeeCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Payment Means

        $newDocumentDTO->firstPaymentmean(
            fn(InvoiceSuitePaymentMeanDTO $item) => $this->setDocumentPaymentMean(
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
            function (InvoiceSuitePaymentTermDTO $item): void {
                $this->setDocumentPaymentTerm(
                    $item->getDescription(),
                    $item->getDueDate()
                );
            }
        );

        // Document-Level Creditor reference

        $newDocumentDTO->firstCreditorReference(
            fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPaymentCreditorReferenceID($item->getId())
        );

        // Document-Level Taxes

        $newDocumentDTO->forEachTax(
            fn(InvoiceSuiteTaxDTO $item) => $this->addDocumentTax(
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

        // Document-Level Allowances/Charges

        $newDocumentDTO->forEachAllowanceCharge(
            fn(InvoiceSuiteAllowanceChargeDTO $item) => $this->addDocumentAllowanceCharge(
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

        // Document-Level Logistic Service Charges

        $newDocumentDTO->forEachServiceCharge(
            fn(InvoiceSuiteServiceChargeDTO $item) => $this->addDocumentLogisticServiceCharge(
                $item->getAmount(),
                $item->getDescription(),
                $item->getTaxCategory(),
                $item->getTaxType(),
                $item->getTaxPercent()
            )
        );

        // Document-Level Summation

        $this->setDocumentSummation(
            $newDocumentDTO->getSummation()?->getNetAmount(),
            $newDocumentDTO->getSummation()?->getChargeTotalAmount(),
            $newDocumentDTO->getSummation()?->getDiscountTotalAmount(),
            $newDocumentDTO->getSummation()?->getTaxBasisAmount(),
            $newDocumentDTO->getSummation()?->getTaxTotalAmount(),
            $newDocumentDTO->getSummation()?->getTaxTotalAmount2(),
            $newDocumentDTO->getSummation()?->getGrossAmount(),
            $newDocumentDTO->getSummation()?->getDueAmount(),
            $newDocumentDTO->getSummation()?->getPrepaidAmount(),
            $newDocumentDTO->getSummation()?->getRoungingAmount()
        );

        // Positions

        $newDocumentDTO->forEachPosition(
            function (InvoiceSuiteDocumentPositionDTO $item): void {
                $this->addDocumentPosition(
                    $item->getLineId(),
                    $item->getParentLineId(),
                    $item->getLineStatus(),
                    $item->getLineStatusReason()
                );

                $item->firstNote(
                    fn(InvoiceSuiteNoteDTO $itemNote) => $this->setDocumentPositionNote(
                        $itemNote->getContent(),
                        $itemNote->getContentCode(),
                        $itemNote->getSubjectCode()
                    )
                );

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

                $item->getProduct()?->forEachCharacteristic(
                    fn(InvoiceSuiteProductCharacteristicDTO $characteristic) => $this->addDocumentPositionProductCharacteristic(
                        $characteristic->getDescription(),
                        $characteristic->getValue(),
                        $characteristic->getType(),
                        $characteristic->getValueMeasure()?->getValue(),
                        $characteristic->getValueMeasure()?->getUnit()
                    )
                );

                $item->getProduct()?->forEachClassification(
                    fn(InvoiceSuiteProductClassificationDTO $classification) => $this->addDocumentPositionProductClassification(
                        $classification->getCode(),
                        $classification->getListId(),
                        $classification->getListVersionId(),
                        $classification->getName()
                    )
                );

                $item->firstBuyerOrderReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionBuyerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                // Position Gross Price

                // ... nothing here, not supported

                // Position Net Price

                $this->setDocumentPositionNetPrice(
                    $item->getNetPrice()?->getAmount(),
                    $item->getNetPrice()?->getPriceQuantity()?->getQuantity(),
                    $item->getNetPrice()?->getPriceQuantity()?->getQuantityUnit()
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

                // Position Ship-To

                // ... nothing here, not supported

                // Position Ultimate Ship-To

                // ... nothing here, not supported

                // Position supply chain event

                // ... nothing here, not supported

                // Position billing period

                $item->firstBillingPeriod(
                    fn(InvoiceSuiteDateRangeDTO $item) => $this->setDocumentPositionBillingPeriod(
                        $item->getStartDate(),
                        $item->getEndDate(),
                        $item->getDescription()
                    )
                );

                // Position posting references

                $item->firstPostingReference(
                    fn(InvoiceSuiteIdDTO $postingReference) => $this->setDocumentPositionPostingReference(
                        $postingReference->getIdType(),
                        $postingReference->getId()
                    )
                );

                // Position taxes

                $item->forEachTax(
                    fn(InvoiceSuiteTaxDTO $tax) => $this->addDocumentPositionTax(
                        $tax->getCategory(),
                        $tax->getType(),
                        $tax->getAmount(),
                        $tax->getPercent(),
                        $tax->getExemptionReason(),
                        $tax->getExemptionReasonCode()
                    )
                );

                // Position allowances/charges

                $item->forEachAllowanceCharge(
                    fn(InvoiceSuiteAllowanceChargeDTO $allowanceCharge) => $this->addDocumentPositionAllowanceCharge(
                        $allowanceCharge->getChargeIndicator(),
                        $allowanceCharge->getAmount(),
                        $allowanceCharge->getBaseAmount(),
                        $allowanceCharge->getReason(),
                        $allowanceCharge->getReasonCode(),
                        $allowanceCharge->getPercent()
                    )
                );

                // Position summation

                $this->setDocumentPositionSummation(
                    $item->getSummation()?->getNetAmount(),
                    $item->getSummation()?->getChargeTotalAmount(),
                    $item->getSummation()?->getDiscountTotalAmount(),
                    $item->getSummation()?->getTaxTotalAmount(),
                    $item->getSummation()?->getGrossAmount()
                );
            }
        );

        return $this;
    }

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo The document no issued by the seller
     * @return static
     */
    public function setDocumentNo(
        ?string $newDocumentNo = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentNo])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getIDWithCreate()->setValue($newDocumentNo);

        return $this;
    }

    /**
     * Sets the new document type code
     *
     * @param string|null $newDocumentType The type of the document
     * @return static
     */
    public function setDocumentType(
        ?string $newDocumentType = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentType])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getInvoiceTypeCodeWithCreate()->setValue($newDocumentType);

        return $this;
    }

    /**
     * Sets the new document description
     *
     * @param string|null $newDocumentDescription The documenttype as free text
     * @return self
     */
    public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentDescription])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getInvoiceTypeCodeWithCreate()->setName($newDocumentDescription);

        return $this;
    }

    /**
     * Sets the new document language
     *
     * @param string|null $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return self
     */
    public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentLanguage])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getInvoiceTypeCodeWithCreate()->setLanguageID($newDocumentLanguage);

        return $this;
    }

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return self
     */
    public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): self {
        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newDocumentDate])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->setIssueDate($newDocumentDate);

        return $this;
    }

    /**
     * Sets the new document period
     *
     * @param DateTimeInterface|null $newCompleteDate Contractual due date of the document
     * @return self
     */
    public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): self {
        return $this;
    }

    /**
     * Sets the new document currency
     *
     * @param string|null $newDocumentCurrency Code for the invoice currency
     * @return self
     */
    public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentCurrency])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getDocumentCurrencyCodeWithCreate()->setValue($newDocumentCurrency);
        $this->updateCurrencies();

        return $this;
    }

    /**
     * Sets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency Code for the tax currency
     * @return self
     */
    public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentTaxCurrency])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->getTaxCurrencyCodeWithCreate()->setValue($newDocumentTaxCurrency);
        $this->updateCurrencies();

        return $this;
    }

    /**
     * Sets the new status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy Indicates that the document is a copy
     * @return self
     */
    public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): self {
        $this->getUblInvoiceRootObject()->setCopyIndicator($newDocumentIsCopy);

        return $this;
    }

    /**
     * Sets the new status of the test indicator
     *
     * @param boolean $newDocumentIsTest Indicates that the document is a test
     * @return self
     */
    public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): self {
        return $this;
    }

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->clearNote()->addToNoteWithCreate()->setValue($newContent);

        return $this;
    }

    /**
     * Add a note to the document
     *
     * @param string|null $newContent Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Qualification of the free text for the invoice
     * @return self
     */
    public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $this->getUblInvoiceRootObject()->addToNoteWithCreate()->setValue($newContent);

        return $this;
    }

    /**
     * Set the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        if (is_null($newStartDate) && is_null($newEndDate)) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearInvoicePeriod();

        $this->addDocumentBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        return $this;
    }

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        if (is_null($newStartDate) && is_null($newEndDate)) {
            return $this;
        }

        $invoicePeriod = $this
            ->getUblInvoiceRootObject()
            ->addToInvoicePeriodWithCreate();

        if (!is_null($newStartDate)) {
            $invoicePeriod->setStartDate($newStartDate);
        }

        if (!is_null($newEndDate)) {
            $invoicePeriod->setEndDate($newEndDate);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $invoicePeriod->clearDescription()->addToDescriptionWithCreate()->setValue($newDescription);
        }

        return $this;
    }

    /**
     * Set a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function setDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAccountId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCostWithCreate()
            ->setValue($newAccountId);

        return $this;
    }

    /**
     * Add a posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function addDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): self
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
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getOrderReferenceWithCreate()
            ->getSalesOrderIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Add an associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        return $this->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * Set the associated buyer's order
     *
     * @param string|null $newReferenceNumber Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
     * @return self
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $orderReference = $this
            ->getUblInvoiceRootObject()
            ->getOrderReferenceWithCreate();

        $orderReference->getIDWithCreate()->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $orderReference->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * Add an associated buyer's order
     *
     * @param string|null $newReferenceNumber Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order date
     * @return self
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        return $this->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * Set the associated quotation
     *
     * @param string|null $newReferenceNumber Quotation number
     * @param DateTimeInterface|null $newReferenceDate quotation date
     * @return self
     */
    public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $additionalDocTypeCode = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCTYPECODE', '');
        $additionalDocDescription = $this->getCurrentFormatProviderParameterValue('BUILDER_QUOTATION_DOCDESCRIPTION', '');

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$additionalDocTypeCode, $additionalDocDescription])) {
            return $this;
        }

        $additionalDocumentReferences =
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                fn(AdditionalDocumentReference $additionalDocumentReference) => strcasecmp(($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? ""), $additionalDocTypeCode) !== 0
            );

        $this->getUblInvoiceRootObject()->setAdditionalDocumentReference($additionalDocumentReferences);

        $additionalDocReference = $this->getUblInvoiceRootObject()->addToAdditionalDocumentReferenceWithCreate();

        $additionalDocReference->getIDWithCreate()->setValue($newReferenceNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($additionalDocTypeCode)) {
            $additionalDocReference->getDocumentTypeCodeWithCreate()->setValue($additionalDocTypeCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($additionalDocDescription)) {
            $additionalDocReference->addOnceToDocumentDescriptionWithCreate()->setValue($additionalDocDescription);
        }

        if (!is_null($newReferenceDate)) {
            $additionalDocReference->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * Add an associated quotation
     *
     * @param string|null $newReferenceNumber quotation number
     * @param DateTimeInterface|null $newReferenceDate quotation date
     * @return self
     */
    public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        return $this->setDocumentQuotationReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * Set the associated contract
     *
     * @param string $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
     * @return self
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearContractDocumentReference();

        return $this->addDocumentContractReference($newReferenceNumber, $newReferenceDate);
    }

    /**
     * Add am associated contract
     *
     * @param string $newReferenceNumber Contract number
     * @param DateTimeInterface|null $newReferenceDate Contract date
     * @return self
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $contractReference = $this
            ->getUblInvoiceRootObject()
            ->addToContractDocumentReferenceWithCreate();

        $contractReference->getIDWithCreate()->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $contractReference->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * Set an additional associated document
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function setDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearAdditionalDocumentReference();

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
     * @param string|null $newReferenceNumber Additional document number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function addDocumentAdditionalReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $additionalReference = $this
            ->getUblInvoiceRootObject()
            ->addToAdditionalDocumentReferenceWithCreate();

        $additionalReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $additionalReference
                ->setIssueDate($newReferenceDate);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)) {
            $additionalReference
                ->getDocumentTypeCodeWithCreate()
                ->setValue($newTypeCode);
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
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearBillingReference();

        $this->addDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode
        );

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $invoiceReference = $this
            ->getUblInvoiceRootObject()
            ->addToBillingReferenceWithCreate()
            ->getInvoiceDocumentReferenceWithCreate();

        $invoiceReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $invoiceReference
                ->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * Set an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
     * @return self
     */
    public function setDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): self
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearProjectReference();

        $this->addDocumentProjectReference($newReferenceNumber, $newName);

        return $this;
    }

    /**
     * Add an additional project reference
     *
     * @param string|null $newReferenceNumber Project number
     * @param string|null $newName Project name
     * @return self
     */
    public function addDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): self
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $projectReference = $this
            ->getUblInvoiceRootObject()
            ->addToProjectReferenceWithCreate();

        $projectReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber
     * @param DateTimeInterface|null $newReferenceDate
     * @return self
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->setDocumentAdditionalReference($newReferenceNumber, $newReferenceDate, "220");

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber
     * @param DateTimeInterface|null $newReferenceDate
     * @return self
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this->addDocumentAdditionalReference($newReferenceNumber, $newReferenceDate, "220");

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearDespatchDocumentReference();

        $this->addDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $despatchAdviceReference = $this
            ->getUblInvoiceRootObject()
            ->addToDespatchDocumentReferenceWithCreate();

        $despatchAdviceReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $despatchAdviceReference->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearReceiptDocumentReference();

        $this->addDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $receivingAdviceReference = $this
            ->getUblInvoiceRootObject()
            ->addToReceiptDocumentReferenceWithCreate();

        $receivingAdviceReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!is_null($newReferenceDate)) {
            $receivingAdviceReference->setIssueDate($newReferenceDate);
        }

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate Actual delivery date
     * @return self
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        if (is_null($newDate)) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->setActualDeliveryDate($newDate);

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param string|null $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return self
     */
    public function setDocumentBuyerReference(
        ?string $newBuyerReference = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerReference])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getBuyerReferenceWithCreate()
            ->setValue($newBuyerReference);

        return $this;
    }

    /**
     * Set the name of the seller/supplier party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentSellerName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
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
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentSellerName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentSellerName($newName);

        return $this;
    }

    /**
     * Set the ID of the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentSellerId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingSupplierPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('id')
                )
            );

        $this->addDocumentSellerId($newId);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentSellerId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
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
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingSupplierPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('globalid')
                )
            );

        $this->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
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
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);

        return $this;
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentSellerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
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
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getAccountingSupplierPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblInvoiceRootObject()
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
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $this->setDocumentSellerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * Add contact information of the seller/supplier party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this->setDocumentSellerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * Set communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    /**
     * Add communication information of the seller/supplier party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this->setDocumentSellerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the buyer/customer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentBuyerName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
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
     * @param string|null $newName __BT-44, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentBuyerName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentBuyerName($newName);

        return $this;
    }

    /**
     * Set the ID of the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentBuyerId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingCustomerPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('id')
                )
            );

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate();

        $this->addDocumentBuyerId($newId);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentBuyerId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('id')
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getAccountingCustomerPartyWithCreate()
                        ->getPartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('globalid')
                )
            );

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate();

        $this->addDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('globalid')
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);


        return $this;
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Add an address to the buyer/customer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentBuyerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
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
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getAccountingCustomerPartyWithCreate()
                ->getPartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblInvoiceRootObject()
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
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $this->setDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param string|null $newPersonName
     * @param string|null $newDepartmentName
     * @param string|null $newPhoneNumber
     * @param string|null $newFaxNumber
     * @param string|null $newEmailAddress
     * @return self
     */
    public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * Add contact information of the buyer/customer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this->setDocumentBuyerContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * Set communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getAccountingCustomerPartyWithCreate()
            ->getPartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this->setDocumentBuyerCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->clearPartyName();

        $this->addDocumentTaxRepresentativeName($newName);

        return $this;
    }

    /**
     * Add a name of the tax representative party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addToPartyNameWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Set the ID of the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getTaxRepresentativePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('id')
                )
            );

        $this->addDocumentTaxRepresentativeId($newId);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('id')
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Set the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getTaxRepresentativePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('globalid')
                )
            );

        $this->addDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('globalid')
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);

        return $this;
    }

    /**
     * Set the address of the tax representative party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Add an address to the tax representative party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentTaxRepresentativeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
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
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getTaxRepresentativePartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $this
                ->getUblInvoiceRootObject()
                ->getTaxRepresentativePartyWithCreate()
                ->addOnceToPartyNameWithCreate()
                ->getNameWithCreate()
                ->setValue($newName);
        }

        return $this;
    }

    /**
     * Add a legal information of the tax representative party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $this->setDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * Add contact information of the tax representative party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this->setDocumentTaxRepresentativeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * Set communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getTaxRepresentativePartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    /**
     * Add a communication information of the tax representative party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this->setDocumentTaxRepresentativeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set the name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentProductEndUserName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Add a name of the product end-user party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentProductEndUserName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Set the ID of the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentProductEndUserId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentProductEndUserId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Set the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        return $this;
    }

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Set the address of the product end-user party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Add an address to the product end-user party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentProductEndUserAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Set the legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Add a legal information of the product end-user party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Set the contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Add contact information of the product end-user party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Set communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Add a communication information of the product end-user party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipToName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryPartyWithCreate()
            ->addOnceToPartyNameWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentShipToName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentShipToName($newName);

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipToId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipToId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentShipToId($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
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
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this->setDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $address = $this
            ->getUblInvoiceRootObject()
            ->addOnceToDeliveryWithCreate()
            ->getDeliveryLocationWithCreate()
            ->getAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $address->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $address->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $address->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $address->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $address->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $address->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
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
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Set communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Add communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Add an address to the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Set the name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipFromName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Add a name of the Ship-From party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentShipFromName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Set the ID of the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipFromId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipFromId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Add an address to the Ship-From party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentShipFromAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Set the legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Add a legal information of the Ship-From party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Set the contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Add contact information of the Ship-From party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Set communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Add a communication information of the Ship-From party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Set the name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoicerName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Add a name of the Invoicer party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoicerName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Set the ID of the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoicerId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoicerId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Add an address to the Invoicer party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentInvoicerAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Set the legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Add a legal information of the Invoicer party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Set the contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Add contact information of the Invoicer party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Set communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Add a communication information of the Invoicer party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Set the name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoiceeName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Add a name of the Invoicee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoiceeName(
        ?string $newName = null
    ): self {
        return $this;
    }

    /**
     * Set the ID of the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoiceeId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoiceeId(
        ?string $newId = null
    ): self {
        return $this;
    }

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        return $this;
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Add an address to the Invoicee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentInvoiceeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        return $this;
    }

    /**
     * Set the legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Add a legal information of the Invoicee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        return $this;
    }

    /**
     * Set the contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Add contact information of the Invoicee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this;
    }

    /**
     * Set communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Add a communication information of the Invoicee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        return $this;
    }

    /**
     * Set the name of the Payee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPayeeName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addOnceToPartyNameWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Add a name of the Payee party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPayeeName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this->setDocumentPayeeName($newName);

        return $this;
    }

    /**
     * Set the ID of the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPayeeId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getPayeePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('id')
                )
            );

        $this->addDocumentPayeeId($newId);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPayeeId(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('id')
            ->getIDWithCreate()
            ->setValue($newId);

        return $this;
    }

    /**
     * Set the Global ID of the Payee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->setPartyIdentification(
                array_filter(
                    $this
                        ->getUblInvoiceRootObject()
                        ->getPayeePartyWithCreate()
                        ->getPartyIdentification() ?? [],
                    fn(PartyIdentificationType $partyIdentification) => !$partyIdentification->hasObjectFlag('globalid')
                )
            );

        $this->addDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addToPartyIdentificationWithCreate()
            ->addToObjectFlags('globalid')
            ->getIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        return $this;
    }

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->clearPartyTaxScheme();

        $this->addDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this;
        }

        $partyTaxScheme = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->addToPartyTaxSchemeWithCreate();

        $partyTaxScheme
            ->getCompanyIDWithCreate()
            ->setValue($newTaxRegistrationId);

        $partyTaxScheme
            ->getTaxSchemeWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationType);

        return $this;
    }

    /**
     * Set the address of the Payee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $postalAddress = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->getPostalAddressWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine1])) {
            $postalAddress->getStreetNameWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newAddressLine2])) {
            $postalAddress->getAdditionalStreetNameWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPostcode])) {
            $postalAddress->getPostalZoneWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCity])) {
            $postalAddress->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $postalAddress->getCountryWithCreate()->getIdentificationCodeWithCreate()->setValue($newCountryId);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newSubDivision])) {
            $postalAddress->getCountrySubentityWithCreate()->setValue($newSubDivision);
        }

        return $this;
    }

    /**
     * Add an address to the Payee party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentPayeeAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newAddressLine1,
                $newAddressLine2,
                $newAddressLine3,
                $newPostcode,
                $newCity,
                $newCountryId,
                $newSubDivision
            ])
        ) {
            return $this;
        }

        $this->setDocumentPayeeAddress(
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
     * Set the legal information of the Payee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $this
                ->getUblInvoiceRootObject()
                ->getPayeePartyWithCreate()
                ->addOnceToPartyLegalEntityWithCreate()
                ->getCompanyIDWithCreate()
                ->setValue($newId);
        }

        return $this;
    }

    /**
     * Add a legal information of the Payee party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this;
        }

        $this->setDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        return $this;
    }

    /**
     * Set the contact information of the Payee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress
            ])
        ) {
            return $this;
        }

        $contact = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->getContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $contact->getNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            // Nothing here
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $contact->getTelephoneWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $contact->getTelefaxWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $contact->getElectronicMailWithCreate()->setValue($newEmailAddress);
        }

        return $this;
    }

    /**
     * Add contact information of the Payee party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        return $this->setDocumentPayeeContact($newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress);
    }

    /**
     * Set communication information of the Payee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $endpointId = $this
            ->getUblInvoiceRootObject()
            ->getPayeePartyWithCreate()
            ->getEndpointIDWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
            $endpointId->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newUri])) {
            $endpointId->setValue($newUri);
        }

        return $this;
    }

    /**
     * Add a communication information of the Payee party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newUri])) {
            return $this;
        }

        $this->setDocumentPayeeCommunication($newType, $newUri);

        return $this;
    }

    /**
     * Set Payment mean
     *
     * @param string|null $newTypeCode Expected or used means of payment expressed as a code
     * @param string|null $newName Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
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
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTypeCode])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearPaymentMeans();

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
     * @param string|null $newTypeCode Expected or used means of payment expressed as a code
     * @param string|null $newName Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
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
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTypeCode])) {
            return $this;
        }

        $paymentMean = $this
            ->getUblInvoiceRootObject()
            ->addToPaymentMeansWithCreate();

        $paymentMean->getPaymentMeansCodeWithCreate()->setValue($newTypeCode);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $paymentMean->getPaymentMeansCodeWithCreate()->setName($newName);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardId, $newFinancialCardHolder])) {
            $paymentMean
                ->getCardAccountWithCreate()
                ->getPrimaryAccountNumberIDWithCreate()
                ->setValue($newFinancialCardId);

            $paymentMean
                ->getCardAccountWithCreate()
                ->getNetworkIDWithCreate()
                ->setValue('mapped-from-cii');

            $paymentMean
                ->getCardAccountWithCreate()
                ->getHolderNameWithCreate()
                ->setValue($newFinancialCardHolder);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban])) {
            $paymentMean
                ->getPaymentMandateWithCreate()
                ->getPayerFinancialAccountWithCreate()
                ->getIDWithCreate()
                ->setValue($newBuyerIban);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban, $newPayeeAccountName, $newPayeeProprietaryId, $newPayeeBic])) {
            $paymentMean
                ->getPayeeFinancialAccountWithCreate()
                ->getIDWithCreate()
                ->setValue($newPayeeIban);

            $paymentMean
                ->getPayeeFinancialAccountWithCreate()
                ->getNameWithCreate()
                ->setValue($newPayeeAccountName);

            $paymentMean
                ->getPayeeFinancialAccountWithCreate()
                ->getFinancialInstitutionBranchWithCreate()
                ->getIDWithCreate()
                ->setValue($newPayeeBic);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPaymentReference])) {
            $paymentMean->clearPaymentID()->addToPaymentIDWithCreate()->setValue($newPaymentReference);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newMandate])) {
            $paymentMean->getPaymentMandateWithCreate()->getIDWithCreate()->setValue($newMandate);
        }

        return $this;
    }

    /**
     * Set Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

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
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

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
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

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
     * @param string|null $newPayeeIban Payment account identifier
     * @param string|null $newPayeeAccountName Name of the payment account
     * @param string|null $newPayeeProprietaryId National account number (not for SEPA)
     * @param string|null $newPayeeBic Identifier of the payment service provider
     * @param string|null $newPaymentReference Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPayeeIban])) {
            return $this;
        }

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
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

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
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

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
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

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
     * @param string|null $newBuyerIban Identifier of the account to be debited
     * @param string|null $newMandate Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerIban, $newMandate])) {
            return $this;
        }

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
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardId])) {
            return $this;
        }

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
     * @param string|null $newFinancialCardId Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder Name of the payment card holder
     * @return self
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newFinancialCardId])) {
            return $this;
        }

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
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newId])) {
            return $this;
        }

        $ids = $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->getPartyIdentification();

        $ids = array_filter($ids ?? [], fn(PartyIdentification $id) => strcasecmp($id->getID()?->getSchemeID() ?? "", "SEPA") !== 0);

        $this
            ->getUblInvoiceRootObject()
            ->getAccountingSupplierPartyWithCreate()
            ->getPartyWithCreate()
            ->setPartyIdentification($ids)
            ->addToPartyIdentificationWithCreate()
            ->getIDWithCreate()
            ->setValue($newId)
            ->setSchemeID("SEPA");

        return $this;
    }

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param string|null $newId Creditor identifier
     * @return self
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newId])) {
            return $this;
        }

        $this->setDocumentPaymentCreditorReferenceID($newId);

        return $this;
    }

    /**
     * Set payment term
     *
     * @param string|null $newDescription Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate Date by which payment is due
     * @return self
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDescription])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->clearPaymentTerms();

        $this->addDocumentPaymentTerm(
            $newDescription,
            $newDueDate
        );

        return $this;
    }

    /**
     * Add payment term
     *
     * @param string|null $newDescription Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate Date by which payment is due
     * @return self
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDescription])) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addToPaymentTermsWithCreate()
            ->addToNoteWithCreate()
            ->setValue($newDescription);

        if (!is_null($newDueDate)) {
            $this->getUblInvoiceRootObject()->setDueDate($newDueDate);
        }

        return $this;
    }

    /**
     * Set payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment discount
     * @param float|null $newDiscountAmount Amount of the payment discount
     * @param float|null $newDiscountPercent Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function setDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        return $this;
    }

    /**
     * Add payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment discount
     * @param float|null $newDiscountAmount Amount of the payment discount
     * @param float|null $newDiscountPercent Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function addDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newDiscountAmount = null,
        ?float $newDiscountPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        return $this;
    }

    /**
     * Set payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment penalty
     * @param float|null $newPenaltyAmount Amount of the payment penalty
     * @param float|null $newPenaltyPercent Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function setDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        return $this;
    }

    /**
     * Add payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount Base amount of the payment penalty
     * @param float|null $newPenaltyAmount Amount of the payment penalty
     * @param float|null $newPenaltyPercent Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate Due date reference date
     * @param float|null $newBasePeriod Maturity period (basis)
     * @param string|null $newBasePeriodUnit Maturity period (unit)
     * @return self
     */
    public function addDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float $newBaseAmount = null,
        ?float $newPenaltyAmount = null,
        ?float $newPenaltyPercent = null,
        ?DateTimeInterface $newBaseDate = null,
        ?float $newBasePeriod = null,
        ?string $newBasePeriodUnit = null,
    ): self {
        return $this;
    }

    /**
     * Set Document Tax Breakdown
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newBasisAmount Tax base amount
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate Date on which tax is due
     * @param string|null $newTaxDueCode Code for the date on which tax is due
     * @return self
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])
        ) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->addOnceToTaxTotalWithCreate()
            ->clearTaxSubtotal();

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
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newBasisAmount Tax base amount
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate Date on which tax is due
     * @param string|null $newTaxDueCode Code for the date on which tax is due
     * @return self
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])
        ) {
            return $this;
        }

        $taxSubTotal = $this
            ->getUblInvoiceRootObject()
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
            $this->getUblInvoiceRootObject()->setTaxPointDate($newTaxDueDate);
        }

        return $this;
    }

    /**
     * Set Document Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])
        ) {
            return $this;
        }

        $allowanceCharges = array_filter(
            $this->getUblInvoiceRootObject()->getAllowanceCharge() ?? [],
            fn(AllowanceCharge $currentAllowanceChage) => !$currentAllowanceChage->hasObjectFlag('allowancecharge')
        );

        $this
            ->getUblInvoiceRootObject()
            ->setAllowanceCharge($allowanceCharges);

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
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
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
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount])
        ) {
            return $this;
        }

        $allowanceCharge = $this
            ->getUblInvoiceRootObject()
            ->addToAllowanceChargeWithCreate()
            ->addToObjectFlags('allowancecharge');

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

        return $this;
    }

    /**
     * Set Document Logistic Service Charge
     *
     * @param float|null $newChargeAmount Amount of the service fee
     * @param string|null $newDescription Identification of the service fee
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @return self
     */
    public function setDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])
        ) {
            return $this;
        }

        $allowanceCharges = array_filter(
            $this->getUblInvoiceRootObject()->getAllowanceCharge() ?? [],
            fn(AllowanceCharge $currentAllowanceChage) => !$currentAllowanceChage->hasObjectFlag('logservicecharge')
        );

        $this->getUblInvoiceRootObject()->setAllowanceCharge($allowanceCharges);

        $this->addDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        return $this;
    }

    /**
     * Add Document Logistic Service Charge
     *
     * @param float|null $newChargeAmount Amount of the service fee
     * @param string|null $newDescription Identification of the service fee
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @return self
     */
    public function addDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription]) ||
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])
        ) {
            return $this;
        }

        $allowanceCharge = $this
            ->getUblInvoiceRootObject()
            ->addToAllowanceChargeWithCreate()
            ->addToObjectFlags('logservicecharge');

        $allowanceCharge
            ->setChargeIndicator(true);

        $allowanceCharge
            ->getAmountWithCreate()
            ->setValue($newChargeAmount);

        $allowanceCharge
            ->clearAllowanceChargeReason()
            ->addToAllowanceChargeReasonWithCreate()
            ->setValue($newDescription);

        $taxCategory = $allowanceCharge->clearTaxCategory()->addToTaxCategoryWithCreate();
        $taxCategory->getIDWithCreate()->setValue($newTaxCategory);
        $taxCategory->getTaxSchemeWithCreate()->getIDWithCreate()->setValue($newTaxType);
        $taxCategory->getPercentWithCreate()->setValue($newTaxPercent);

        return $this;
    }

    /**
     * Prepare the document-level summation (Sets all values to zero)
     *
     * @return self
     */
    public function prepareDocumentSummation(): self
    {
        return $this;
    }

    /**
     * Set the document summation
     *
     * @param float|null $newNetAmount Sum of the net amounts of all invoice lines
     * @param float|null $newChargeTotalAmount Sum of the charges
     * @param float|null $newDiscountTotalAmount Sum of the discounts
     * @param float|null $newTaxBasisAmount Total invoice amount excluding sales tax
     * @param float|null $newTaxTotalAmount Total amount of the invoice sales tax (in the invoice currency)
     * @param float|null $newGrossAmount Total invoice amount including sales tax
     * @param float|null $newDueAmount Payment amount due
     * @param float|null $newPrepaidAmount Prepayment amount
     * @param float|null $newRoungingAmount Rounding amount
     * @return self
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
    ): self {
        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newNetAmount, $newTaxBasisAmount, $newTaxTotalAmount, $newGrossAmount, $newDueAmount])) {
            return $this;
        }

        $summation = $this
            ->getUblInvoiceRootObject()
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

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxTotalAmount)) {
            if (is_null($this->getUblInvoiceRootObject()->getTaxTotal())) {
                $this->getUblInvoiceRootObject()->addToTaxTotalWithCreate();
            }

            $this->getUblInvoiceRootObject()->getTaxTotal()[0]->getTaxAmountWithCreate()->setValue($newTaxTotalAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxTotalAmount2)) {
            if (is_null($this->getUblInvoiceRootObject()->getTaxTotal())) {
                $this->getUblInvoiceRootObject()->addToTaxTotalWithCreate();
                $this->getUblInvoiceRootObject()->addToTaxTotalWithCreate();
            }

            if (!isset($this->getUblInvoiceRootObject()->getTaxTotal()[1])) {
                $this->getUblInvoiceRootObject()->addToTaxTotalWithCreate();
            }

            $this->getUblInvoiceRootObject()->getTaxTotal()[1]->getTaxAmountWithCreate()->setValue($newTaxTotalAmount2);
        }

        $this->updateCurrencies();

        return $this;
    }

    /**
     * Add a new position to document
     *
     * @param string|null $newPositionId Identification of the position
     * @param string|null $newParentPositionId Identification of the parent position
     * @param string|null $newLineStatusCode Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param string|null $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return self
     */
    public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newPositionId])) {
            return $this;
        }

        $position = $this
            ->getUblInvoiceRootObject()
            ->addToInvoiceLineWithCreate();

        $position->getIDWithCreate()->setValue($newPositionId);

        return $this;
    }

    /**
     * Set text information to latest added position
     *
     * @param string|null $newContent Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $latestPosition->clearNote();

        $this->addDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        return $this;
    }

    /**
     * Add text information to latest added position
     *
     * @param string|null $newContent Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode Code for qualifying the free text for the invoice item
     * @return self
     */
    public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newContent])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $latestPosition->addToNoteWithCreate()->setValue($newContent);

        return $this;
    }

    /**
     * Add product details to latest added position
     *
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param string|null $newProductModelId Unique model identifier of the product
     * @param string|null $newProductBatchId Batch (lot) identifier of the product
     * @param string|null $newProductBrandName Brand name of the product
     * @param string|null $newProductModelName Model name of the product
     * @param string|null $newProductOriginTradeCountry Code indicating the country the goods came from
     * @return self
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
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductName])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $positionProduct = $latestPosition->getItemWithCreate();

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
            $positionProduct->getOriginCountryWithCreate()->getNameWithCreate()->setValue($newProductOriginTradeCountry);
        }

        return $this;
    }

    /**
     * Set product characteristics in latest added position
     *
     * @param string|null $newProductCharacteristicDescription Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit Unit of value of the characteristic
     * @return self
     */
    public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $positionProduct = $latestPosition->getItemWithCreate();

        $positionProduct->clearAdditionalItemProperty();

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
     * @param string|null $newProductCharacteristicDescription Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit Unit of value of the characteristic
     * @return self
     */
    public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $positionProduct = $latestPosition->getItemWithCreate();

        $positionProductCharacteristic = $positionProduct->addToAdditionalItemPropertyWithCreate();
        $positionProductCharacteristic->getNameWithCreate()->setValue($newProductCharacteristicDescription);
        $positionProductCharacteristic->getValueWithCreate()->setValue($newProductCharacteristicValue);

        if (
            !InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicMeasureUnit]) &&
            !InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newProductCharacteristicMeasureValue])
        ) {
            $positionProductCharacteristic
                ->getValueQuantityWithCreate()
                ->setValue($newProductCharacteristicMeasureValue)
                ->setUnitCode($newProductCharacteristicMeasureUnit);
        }

        return $this;
    }

    /**
     * Set product classification in latest added position
     *
     * @param string|null $newProductClassificationCode Classification identifier
     * @param string|null $newProductClassificationListId Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $positionProduct = $latestPosition->getItemWithCreate();

        $positionProduct->clearCommodityClassification();

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
     * @param string|null $newProductClassificationCode Classification identifier
     * @param string|null $newProductClassificationListId Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return self
     */
    public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $positionProduct = $latestPosition->getItemWithCreate();

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
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param float|null $newProductUnitQuantity Quantity Quantity of the referenced product contained
     * @param string|null $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return self
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
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add referenced product in latest added position
     *
     * @param string|null $newProductId ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName Name of the product (product name)
     * @param string|null $newProductDescription Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId Product global id
     * @param string|null $newProductGlobalIdType Type of the product global id
     * @param string|null $newProductIndustryId Id assigned by the industry
     * @param float|null $newProductUnitQuantity Quantity Quantity of the referenced product contained
     * @param string|null $newProductUnitQuantityUnit Unit code of the quantity of the referenced product contained
     * @return self
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
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated seller's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param string|null $newReferenceLineNumber Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function setDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated seller's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Seller's order confirmation number
     * @param string|null $newReferenceLineNumber Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Seller's order confirmation date
     * @return self
     */
    public function addDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $latestPosition->clearOrderLineReference();

        $this->addDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        return $this;
    }

    /**
     * Add an associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();

        $buyerOrderReference = $latestPosition->addToOrderLineReferenceWithCreate();

        $buyerOrderReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        return $this;
    }

    /**
     * Set the associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated contract (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated contract (line reference).
     *
     * @param string|null $newReferenceNumber Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional associated document (line reference)
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param string|null $newReferenceLineNumber Additional document line number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function setDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional associated document (line reference)
     *
     * @param string|null $newReferenceNumber Additional document number
     * @param string|null $newReferenceLineNumber Additional document line number
     * @param DateTimeInterface|null $newReferenceDate Additional document date
     * @param string|null $newTypeCode Additional document type code
     * @param string|null $newReferenceTypeCode Additional document reference-type code
     * @param string|null $newDescription Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     */
    public function addDocumentPositionAdditionalReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null,
        ?string $newDescription = null,
        ?InvoiceSuiteAttachment $newInvoiceSuiteAttachment = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param string|null $newReferenceLineNumber Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber Ultimate customer order number
     * @param string|null $newReferenceLineNumber Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate Ultimate customer order date
     * @return self
     */
    public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     */
    public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param string|null $newReferenceLineNumber Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber Receipt notification number
     * @param string|null $newReferenceLineNumber Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate Receipt notification date
     * @return self
     */
    public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param string|null $newReferenceLineNumber Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber Delivery slip number
     * @param string|null $newReferenceLineNumber Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate Delivery slip date
     * @return self
     */
    public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate Date of the previous invoice
     * @param string|null $newTypeCode Type code of previous invoice
     * @return self
     */
    public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the position's gross price
     *
     * @param null|float $newGrossPrice Unit price excluding sales tax before deduction of the discount on the item price
     * @param null|float $newGrossPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode Reason code for discount or charge (free text)
     * @return self
     */
    public function setDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode Reason code for discount or charge (free text)
     * @return self
     */
    public function addDocumentPositionGrossPriceAllowanceCharge(
        ?float $newGrossPriceAllowanceChargeAmount = null,
        ?bool $newIsCharge = null,
        ?float $newGrossPriceAllowanceChargePercent = null,
        ?float $newGrossPriceAllowanceChargeBasisAmount = null,
        ?string $newGrossPriceAllowanceChargeReason = null,
        ?string $newGrossPriceAllowanceChargeReasonCode = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the position's net price
     *
     * @param null|float $newNetPrice Unit price excluding sales tax after deduction of the discount on the item price
     * @param null|float $newNetPriceBasisQuantity Number of item units for which the price applies
     * @param null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null,
    ): self {
        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newNetPrice])) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();
        $latestPosition->getPriceWithCreate()->getPriceAmountWithCreate()->setValue($newNetPrice);

        if (
            !InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newNetPriceBasisQuantity]) &&
            !InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newNetPriceBasisQuantityUnit])
        ) {
            $latestPosition
                ->getPriceWithCreate()
                ->getBaseQuantityWithCreate()
                ->setValue($newNetPriceBasisQuantity)
                ->setUnitCode($newNetPriceBasisQuantityUnit);
        }

        return $this;
    }

    /**
     * Set the position's net price included tax
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function setDocumentPositionNetPriceTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the position's quantities
     *
     * @param null|float $newQuantity Invoiced quantity
     * @param null|string $newQuantityUnit Invoiced quantity unit
     * @param null|float $newChargeFreeQuantity Charge Free quantity
     * @param null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param null|float $newPackageQuantity Package quantity
     * @param null|string $newPackageQuantityUnit Package quantity unit
     * @return self
     */
    public function setDocumentPositionQuantities(
        ?float $newQuantity = null,
        ?string $newQuantityUnit = null,
        ?float $newChargeFreeQuantity = null,
        ?string $newChargeFreeQuantityUnit = null,
        ?float $newPackageQuantity = null,
        ?string $newPackageQuantityUnit = null,
    ): self {
        if (
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newQuantity]) ||
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newQuantityUnit])
        ) {
            return $this;
        }

        $latestPosition = $this->getUblInvoiceRootObject()->getLatestInvoiceLineWithCreate();
        $latestPosition->getInvoicedQuantityWithCreate()->setValue($newQuantity)->setUnitCode($newQuantityUnit);

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionShipToName(
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionShipToName(
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionShipToId(
        ?string $newId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionShipToId(
        ?string $newId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentPositionShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId A global identifier of the party.
     * @param string|null $newGlobalIdType Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId Tax identification number.
     * @return self
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function setDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add a address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     */
    public function addDocumentPositionUltimateShipToAddress(
        ?string $newAddressLine1 = null,
        ?string $newAddressLine2 = null,
        ?string $newAddressLine3 = null,
        ?string $newPostcode = null,
        ?string $newCity = null,
        ?string $newCountryId = null,
        ?string $newSubDivision = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add a legal information of the ultimate Ship-To party
     *
     * @param string|null $newType Type of the identification number of the legal registration of the party.
     * @param string|null $newId Identification number of the legal registration of the party.
     * @param string|null $newName Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName Name of the department for the contact point.
     * @param string|null $newPhoneNumber Telephone number for the contact point.
     * @param string|null $newFaxNumber Fax number of the contact point.
     * @param string|null $newEmailAddress E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType The type for the party's electronic address.
     * @param string|null $newUri The party's electronic address.
     * @return self
     */
    public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate
     * @return self
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        // Nothing here

        return $this;
    }

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        if (is_null($newStartDate) && is_null($newEndDate)) {
            return $this;
        }

        $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate()
            ->clearInvoicePeriod();

        $this->addDocumentPositionBillingPeriod($newStartDate, $newEndDate, $newDescription);

        return $this;
    }

    /**
     * Add a position's start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate Start of the billing period
     * @param null|DateTimeInterface $newEndDate End of the billing period
     * @param null|string $newDescription Further information of the billing period (Obsolete)
     * @return self
     */
    public function addDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        if (is_null($newStartDate) && is_null($newEndDate)) {
            return $this;
        }

        $latestPosition = $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate();

        $invoicePeriod = $latestPosition
            ->addToInvoicePeriodWithCreate();

        if (!is_null($newStartDate)) {
            $invoicePeriod->setStartDate($newStartDate);
        }

        if (!is_null($newEndDate)) {
            $invoicePeriod->setEndDate($newEndDate);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $invoicePeriod->clearDescription()->addToDescriptionWithCreate()->setValue($newDescription);
        }

        return $this;
    }

    /**
     * Set the position's tax information
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function setDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self {
        if (
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent]) ||
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])
        ) {
            return $this;
        }

        $latestPosition = $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate();

        $latestPosition
            ->getItemWithCreate()
            ->clearClassifiedTaxCategory();

        $this->addDocumentPositionTax(
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
     * Add a position's tax information
     *
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxAmount Tax total amount
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @param string|null $newExemptionReason Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode Reason for tax exemption (Code)
     * @return self
     */
    public function addDocumentPositionTax(
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxAmount = null,
        ?float $newTaxPercent = null,
        ?string $newExemptionReason = null,
        ?string $newExemptionReasonCode = null,
    ): self {
        if (
            InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent]) ||
            InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])
        ) {
            return $this;
        }

        $latestPosition = $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate();

        $tradeTax = $latestPosition
            ->getItemWithCreate()
            ->addToClassifiedTaxCategoryWithCreate();

        $tradeTax->getIDWithCreate()->setValue($newTaxCategory);
        $tradeTax->getTaxSchemeWithCreate()->getIDWithCreate()->setValue($newTaxType);
        $tradeTax->getPercentWithCreate()->setValue($newTaxPercent);

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newExemptionReason])) {
            $tradeTax->addOnceToTaxExemptionReasonWithCreate()->setValue($newExemptionReason);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newExemptionReasonCode])) {
            $tradeTax->getTaxExemptionReasonCodeWithCreate()->setValue($newExemptionReason);
        }

        return $this;
    }

    /**
     * Set Document position Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    public function setDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): self {
        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount]) || is_null($newChargeIndicator)) {
            return $this;
        }

        $latestPosition = $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate();

        $latestPosition
            ->clearAllowanceCharge();

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
     * @param boolean|null $newChargeIndicator Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     */
    public function addDocumentPositionAllowanceCharge(
        ?bool $newChargeIndicator = null,
        ?float $newAllowanceChargeAmount = null,
        ?float $newAllowanceChargeBaseAmount = null,
        ?string $newAllowanceChargeReason = null,
        ?string $newAllowanceChargeReasonCode = null,
        ?float $newAllowanceChargePercent = null,
    ): self {
        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newAllowanceChargeAmount]) || is_null($newChargeIndicator)) {
            return $this;
        }

        $latestPosition = $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate();

        $allowanceCharge = $latestPosition
            ->addToAllowanceChargeWithCreate();

        $allowanceCharge->setChargeIndicator($newChargeIndicator);
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

        return $this;
    }

    /**
     * Set the document position summation
     *
     * @param float|null $newNetAmount Net amount
     * @param float|null $newChargeTotalAmount Sum of the charges
     * @param float|null $newDiscountTotalAmount Sum of the discounts
     * @param float|null $newTaxTotalAmount Total amount of the line (in the invoice currency)
     * @param float|null $newGrossAmount Total invoice line amount including sales tax
     * @return self
     */
    public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null,
    ): self {
        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newNetAmount])) {
            return $this;
        }

        $latestPosition = $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate();

        $latestPosition
            ->getLineExtensionAmountWithCreate()
            ->setValue($newNetAmount);

        return $this;
    }

    /**
     * Set a position's posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function setDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAccountId])) {
            return $this;
        }

        $latestPosition = $this
            ->getUblInvoiceRootObject()
            ->getLatestInvoiceLineWithCreate();

        $latestPosition
            ->getAccountingCostCodeWithCreate()
            ->setValue($newAccountId);

        return $this;
    }

    /**
     * Add a position's posting reference
     *
     * @param string|null $newType Type of the posting reference
     * @param string|null $newAccountId Posting reference of the byuer
     * @return self
     */
    public function addDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newAccountId])) {
            return $this;
        }

        $this->setDocumentPositionPostingReference($newType, $newAccountId);

        return $this;
    }
}
