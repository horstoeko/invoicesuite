<?php

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documentproviders\zffxbasicwl;

use DateTimeInterface;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractDocumentFormatReader;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documentdto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\documentmodels\zffxbasicwl\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;

class InvoiceSuiteZfFxBasicWlProviderReader extends InvoiceSuiteAbstractDocumentFormatReader
{
    /**
     * Returns the root object as a CrossIndustryInvoiceType
     *
     * @return CrossIndustryInvoiceType
     */
    protected function getCrossIndustryRootObject(): CrossIndustryInvoiceType
    {
        return $this->getDocumentRootObject();
    }

    #region Document DTO

    /**
     * Create a DTO from this document
     *
     * @param InvoiceSuiteDocumentHeaderDTO|null $newDocumentDTO Data-Transfer-Object
     * @return self
     *
     * @phpstan-param-out InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
     */
    public function convertToDTO(
        ?InvoiceSuiteDocumentHeaderDTO &$newDocumentDTO
    ): self {
        // Initialize

        $this->resetCurrentDocumentSubPointers();

        // Create DTO

        $newDocumentDTO = new InvoiceSuiteDocumentHeaderDTO();

        // Document-Level General information

        $this->getDocumentNo($newDocumentNo);
        $newDocumentDTO->setNumber($newDocumentNo);

        $this->getDocumentType($newDocuemntType);
        $newDocumentDTO->setType($newDocuemntType);

        $this->getDocumentDescription($newDocumentDescription);
        $newDocumentDTO->setDescription($newDocumentDescription);

        $this->getDocumentLanguage($newDocumentLanguage);
        $newDocumentDTO->setLanguage($newDocumentLanguage);

        $this->getDocumentDate($newDocumentDate);
        $newDocumentDTO->setDate($newDocumentDate);

        $this->getDocumentCompleteDate($newDocumentCompleteDate);
        $newDocumentDTO->setCompleteDate($newDocumentCompleteDate);

        $this->getDocumentCurrency($newDocumentCurrency);
        $newDocumentDTO->setCurrency($newDocumentCurrency);

        $this->getDocumentTaxCurrency($newDocumentTaxCurrency);
        $newDocumentDTO->setTaxCurrency($newDocumentTaxCurrency);

        $this->getDocumentIsCopy($newDocumentIsCopy);
        $newDocumentDTO->setIsCopy($newDocumentIsCopy);

        $this->getDocumentIsTest($newDocumentIsTest);
        $newDocumentDTO->setIsTest($newDocumentIsTest);

        // Document-Level Notes

        while ($this->nextDocumentNote()) {
            $this->getDocumentNote(
                $newDocumentNoteContent,
                $newDocumentNoteContentCode,
                $newDocumentNoteSubjectCode
            );

            $newDocumentDTO->addNote(
                new InvoiceSuiteNoteDTO(
                    $newDocumentNoteContent,
                    $newDocumentNoteContentCode,
                    $newDocumentNoteSubjectCode
                )
            );
        }

        // Document-Level Billing period

        while ($this->nextDocumentBillingPeriod()) {
            $this->getDocumentBillingPeriod(
                $newDocumentBillingPeriodStartDate,
                $newDocumentBillingPeriodEndDate,
                $newDocumentBillingPeriodDescription
            );

            $newDocumentDTO->addBillingPeriod(
                new InvoiceSuiteDateRangeDTO(
                    $newDocumentBillingPeriodStartDate,
                    $newDocumentBillingPeriodEndDate,
                    $newDocumentBillingPeriodDescription
                )
            );
        }

        // Document-Level Posting Reference

        while ($this->nextDocumentPostingReference()) {
            $this->getDocumentPostingReference(
                $newDocumentPostingReferenceType,
                $newDocumentPostingReferenceAccountId
            );

            $newDocumentDTO->addPostingReference(
                new InvoiceSuiteIdDTO(
                    $newDocumentPostingReferenceAccountId,
                    $newDocumentPostingReferenceType
                )
            );
        }

        // Document-Level Seller Order Reference

        while ($this->nextDocumentSellerOrderReference()) {
            $this->getDocumentSellerOrderReference(
                $newDocumentSellerOrderReferenceNumber,
                $newDocumentSellerOrderReferenceDate
            );

            $newDocumentDTO->addSellerOrderReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentSellerOrderReferenceNumber,
                    $newDocumentSellerOrderReferenceDate
                )
            );
        }

        // Document-Level Buyer Order Reference

        while ($this->nextDocumentBuyerOrderReference()) {
            $this->getDocumentBuyerOrderReference(
                $newDocumentBuyerOrderReferenceNumber,
                $newDocumentBuyerOrderReferenceDate
            );

            $newDocumentDTO->addBuyerOrderReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentBuyerOrderReferenceNumber,
                    $newDocumentBuyerOrderReferenceDate
                )
            );
        }

        // Document-Level Quotation Reference

        while ($this->nextDocumentQuotationReference()) {
            $this->getDocumentQuotationReference(
                $newDocumentQuotationReferenceNumber,
                $newDocumentQuotationReferenceDate
            );

            $newDocumentDTO->addQuotationReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentQuotationReferenceNumber,
                    $newDocumentQuotationReferenceDate
                )
            );
        }

        // Document-Level Contract Reference

        while ($this->nextDocumentContractReference()) {
            $this->getDocumentContractReference(
                $newDocumentContractReferenceNumber,
                $newDocumentContractReferenceDate
            );

            $newDocumentDTO->addContractReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentContractReferenceNumber,
                    $newDocumentContractReferenceDate
                )
            );
        }

        // Document-Level Additional Reference

        while ($this->nextDocumentAdditionalReference()) {
            $this->getDocumentAdditionalReference(
                $newDocumentAdditionalReferenceNumber,
                $newDocumentAdditionalReferenceDate,
                $newDocumentAdditionalReferenceTypeCode,
                $newDocumentAdditionalReferenceReferenceTypeCode,
                $newDocumentAdditionalReferenceDescription,
                $newDocumentAdditionalReferenceAttachment
            );

            $newDocumentDTO->addAdditionalReference(
                new InvoiceSuiteReferenceDocumentExtDTO(
                    $newDocumentAdditionalReferenceNumber,
                    $newDocumentAdditionalReferenceDate,
                    $newDocumentAdditionalReferenceTypeCode,
                    $newDocumentAdditionalReferenceReferenceTypeCode,
                    $newDocumentAdditionalReferenceDescription,
                    $newDocumentAdditionalReferenceAttachment
                )
            );
        }

        // Document-Level Invoice Reference

        while ($this->nextDocumentInvoiceReference()) {
            $this->getDocumentInvoiceReference(
                $newDocumentInvoiceReferenceNumber,
                $newDocumentInvoiceReferenceDate,
                $newDocumentInvoiceReferenceTypeCode
            );

            $newDocumentDTO->addInvoiceReference(
                new InvoiceSuiteReferenceDocumentExtDTO(
                    $newDocumentInvoiceReferenceNumber,
                    $newDocumentInvoiceReferenceDate,
                    $newDocumentInvoiceReferenceTypeCode
                )
            );
        }

        // Document-Level Project Reference

        while ($this->nextDocumentProjectReference()) {
            $this->getDocumentProjectReference(
                $newDocumentProjectReferenceNumber,
                $newDocumentProjectReferenceName
            );

            $newDocumentDTO->addProjectReference(
                new InvoiceSuiteProjectDTO(
                    $newDocumentProjectReferenceNumber,
                    $newDocumentProjectReferenceName
                )
            );
        }

        // Document-Level Ultimate Customer Order Reference

        while ($this->nextDocumentUltimateCustomerOrderReference()) {
            $this->getDocumentUltimateCustomerOrderReference(
                $newDocumentUltimateCustomerOrderReferenceNumber,
                $newDocumentUltimateCustomerOrderReferenceDate
            );

            $newDocumentDTO->addUltimateCustomerOrderReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentUltimateCustomerOrderReferenceNumber,
                    $newDocumentUltimateCustomerOrderReferenceDate
                )
            );
        }

        // Document-Level Despatch Advice Reference

        while ($this->nextDocumentDespatchAdviceReference()) {
            $this->getDocumentDespatchAdviceReference(
                $newDocumentDespatchAdviceReferenceNumber,
                $newDocumentDespatchAdviceReferenceDate
            );

            $newDocumentDTO->addDespatchAdviceReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentDespatchAdviceReferenceNumber,
                    $newDocumentDespatchAdviceReferenceDate
                )
            );
        }

        // Document-Level Receiving Advice Reference

        while ($this->nextDocumentReceivingAdviceReference()) {
            $this->getDocumentReceivingAdviceReference(
                $newDocumentReceivingAdviceReferenceNumber,
                $newDocumentReceivingAdviceReferenceDate
            );

            $newDocumentDTO->addReceivingAdviceReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentReceivingAdviceReferenceNumber,
                    $newDocumentReceivingAdviceReferenceDate
                )
            );
        }

        // Document-Level Delivery Note Reference

        while ($this->nextDocumentDeliveryNoteReference()) {
            $this->getDocumentDeliveryNoteReference(
                $newDocumentDeliveryNoteReferenceNumber,
                $newDocumentDeliveryNoteReferenceDate
            );

            $newDocumentDTO->addDeliveryNoteReference(
                new InvoiceSuiteReferenceDocumentDTO(
                    $newDocumentDeliveryNoteReferenceNumber,
                    $newDocumentDeliveryNoteReferenceDate
                )
            );
        }

        // Document-Level Supply Chain Event

        $this->getDocumentSupplyChainEvent($newDocumentSupplyChainEvent);

        $newDocumentDTO->addSupplyChainEvent($newDocumentSupplyChainEvent);

        // Document-Level Buyer Reference

        $this->getDocumentBuyerReference($newDocumentBuyerReference);

        $newDocumentDTO->addBuyerReference(new InvoiceSuiteIdDTO($newDocumentBuyerReference));

        // Document-Level Seller/Supplier Party

        $newDocumentDTO->setSellerParty(new InvoiceSuitePartyDTO());

        $this->getDocumentSellerName($newDocumentSellerName);
        $newDocumentDTO->getSellerParty()->addName($newDocumentSellerName);

        while ($this->nextDocumentSellerId()) {
            $this->getDocumentSellerId(
                $newDocumentSellerId
            );

            $newDocumentDTO->getSellerParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentSellerId
                )
            );
        }

        while ($this->nextDocumentSellerGlobalId()) {
            $this->getDocumentSellerGlobalId(
                $newDocumentSellerGlobalId,
                $newDocumentSellerGlobalIdType
            );

            $newDocumentDTO->getSellerParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentSellerGlobalId,
                    $newDocumentSellerGlobalIdType
                )
            );
        }

        while ($this->nextDocumentSellerTaxRegistration()) {
            $this->getDocumentSellerTaxRegistration(
                $newDocumentSellerTaxRegistationType,
                $newDocumentSellerTaxRegistationId
            );

            $newDocumentDTO->getSellerParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentSellerTaxRegistationId,
                    $newDocumentSellerTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentSellerAddress()) {
            $this->getDocumentSellerAddress(
                $documentSellerAddressLine1,
                $documentSellerAddressLine2,
                $documentSellerAddressLine3,
                $documentSellerAddressPostCode,
                $documentSellerAddressCity,
                $documentSellerAddressCountry,
                $documentSellerAddressSubDivision
            );

            $newDocumentDTO->getSellerParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentSellerAddressLine1,
                $documentSellerAddressLine2,
                $documentSellerAddressLine3,
                $documentSellerAddressPostCode,
                $documentSellerAddressCity,
                $documentSellerAddressCountry,
                $documentSellerAddressSubDivision
            ));
        }

        while ($this->nextDocumentSellerLegalOrganisation()) {
            $this->getDocumentSellerLegalOrganisation(
                $newDocumentSellerLegalOrganisationType,
                $newDocumentSellerLegalOrganisationId,
                $newDocumentSellerLegalOrganisationName
            );

            $newDocumentDTO->getSellerParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentSellerLegalOrganisationId,
                $newDocumentSellerLegalOrganisationType,
                $newDocumentSellerLegalOrganisationName
            ));
        }

        while ($this->nextDocumentSellerContact()) {
            $this->getDocumentSellerContact(
                $newDocumentSellerContactPersonName,
                $newDocumentSellerContactDepartmentName,
                $newDocumentSellerContactPhoneNumber,
                $newDocumentSellerContactFaxNumber,
                $newDocumentSellerContactEmailAddress
            );

            $newDocumentDTO->getSellerParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentSellerContactPersonName,
                    $newDocumentSellerContactDepartmentName,
                    $newDocumentSellerContactPhoneNumber,
                    $newDocumentSellerContactFaxNumber,
                    $newDocumentSellerContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentSellerCommunication()) {
            $this->getDocumentSellerCommunication(
                $newDocumentSellerCommunicationType,
                $newDocumentSellerCommunicationUri
            );

            $newDocumentDTO->getSellerParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentSellerCommunicationUri,
                    $newDocumentSellerCommunicationType
                )
            );
        }

        // Document-Level Buyer/Customer Party

        $newDocumentDTO->setBuyerParty(new InvoiceSuitePartyDTO());

        $this->getDocumentBuyerName($newDocumentBuyerName);
        $newDocumentDTO->getBuyerParty()->addName($newDocumentBuyerName);

        while ($this->nextDocumentBuyerId()) {
            $this->getDocumentBuyerId(
                $newDocumentBuyerId
            );

            $newDocumentDTO->getBuyerParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentBuyerId
                )
            );
        }

        while ($this->nextDocumentBuyerGlobalId()) {
            $this->getDocumentBuyerGlobalId(
                $newDocumentBuyerGlobalId,
                $newDocumentBuyerGlobalIdType
            );

            $newDocumentDTO->getBuyerParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentBuyerGlobalId,
                    $newDocumentBuyerGlobalIdType
                )
            );
        }

        while ($this->nextDocumentBuyerTaxRegistration()) {
            $this->getDocumentBuyerTaxRegistration(
                $newDocumentBuyerTaxRegistationType,
                $newDocumentBuyerTaxRegistationId
            );

            $newDocumentDTO->getBuyerParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentBuyerTaxRegistationId,
                    $newDocumentBuyerTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentBuyerAddress()) {
            $this->getDocumentBuyerAddress(
                $documentBuyerAddressLine1,
                $documentBuyerAddressLine2,
                $documentBuyerAddressLine3,
                $documentBuyerAddressPostCode,
                $documentBuyerAddressCity,
                $documentBuyerAddressCountry,
                $documentBuyerAddressSubDivision
            );

            $newDocumentDTO->getBuyerParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentBuyerAddressLine1,
                $documentBuyerAddressLine2,
                $documentBuyerAddressLine3,
                $documentBuyerAddressPostCode,
                $documentBuyerAddressCity,
                $documentBuyerAddressCountry,
                $documentBuyerAddressSubDivision
            ));
        }

        while ($this->nextDocumentBuyerLegalOrganisation()) {
            $this->getDocumentBuyerLegalOrganisation(
                $newDocumentBuyerLegalOrganisationType,
                $newDocumentBuyerLegalOrganisationId,
                $newDocumentBuyerLegalOrganisationName
            );

            $newDocumentDTO->getBuyerParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentBuyerLegalOrganisationId,
                $newDocumentBuyerLegalOrganisationType,
                $newDocumentBuyerLegalOrganisationName
            ));
        }

        while ($this->nextDocumentBuyerContact()) {
            $this->getDocumentBuyerContact(
                $newDocumentBuyerContactPersonName,
                $newDocumentBuyerContactDepartmentName,
                $newDocumentBuyerContactPhoneNumber,
                $newDocumentBuyerContactFaxNumber,
                $newDocumentBuyerContactEmailAddress
            );

            $newDocumentDTO->getBuyerParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentBuyerContactPersonName,
                    $newDocumentBuyerContactDepartmentName,
                    $newDocumentBuyerContactPhoneNumber,
                    $newDocumentBuyerContactFaxNumber,
                    $newDocumentBuyerContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentBuyerCommunication()) {
            $this->getDocumentBuyerCommunication(
                $newDocumentBuyerCommunicationType,
                $newDocumentBuyerCommunicationUri
            );

            $newDocumentDTO->getBuyerParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentBuyerCommunicationUri,
                    $newDocumentBuyerCommunicationType
                )
            );
        }

        // Document-Level Seller Tax Representative Party

        $newDocumentDTO->setTaxRepresentativeParty(new InvoiceSuitePartyDTO());

        $this->getDocumentTaxRepresentativeName($newDocumentTaxRepresentativeName);
        $newDocumentDTO->getTaxRepresentativeParty()->addName($newDocumentTaxRepresentativeName);

        while ($this->nextDocumentTaxRepresentativeId()) {
            $this->getDocumentTaxRepresentativeId(
                $newDocumentTaxRepresentativeId
            );

            $newDocumentDTO->getTaxRepresentativeParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentTaxRepresentativeId
                )
            );
        }

        while ($this->nextDocumentTaxRepresentativeGlobalId()) {
            $this->getDocumentTaxRepresentativeGlobalId(
                $newDocumentTaxRepresentativeGlobalId,
                $newDocumentTaxRepresentativeGlobalIdType
            );

            $newDocumentDTO->getTaxRepresentativeParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentTaxRepresentativeGlobalId,
                    $newDocumentTaxRepresentativeGlobalIdType
                )
            );
        }

        while ($this->nextDocumentTaxRepresentativeTaxRegistration()) {
            $this->getDocumentTaxRepresentativeTaxRegistration(
                $newDocumentTaxRepresentativeTaxRegistationType,
                $newDocumentTaxRepresentativeTaxRegistationId
            );

            $newDocumentDTO->getTaxRepresentativeParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentTaxRepresentativeTaxRegistationId,
                    $newDocumentTaxRepresentativeTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentTaxRepresentativeAddress()) {
            $this->getDocumentTaxRepresentativeAddress(
                $documentTaxRepresentativeAddressLine1,
                $documentTaxRepresentativeAddressLine2,
                $documentTaxRepresentativeAddressLine3,
                $documentTaxRepresentativeAddressPostCode,
                $documentTaxRepresentativeAddressCity,
                $documentTaxRepresentativeAddressCountry,
                $documentTaxRepresentativeAddressSubDivision
            );

            $newDocumentDTO->getTaxRepresentativeParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentTaxRepresentativeAddressLine1,
                $documentTaxRepresentativeAddressLine2,
                $documentTaxRepresentativeAddressLine3,
                $documentTaxRepresentativeAddressPostCode,
                $documentTaxRepresentativeAddressCity,
                $documentTaxRepresentativeAddressCountry,
                $documentTaxRepresentativeAddressSubDivision
            ));
        }

        while ($this->nextDocumentTaxRepresentativeLegalOrganisation()) {
            $this->getDocumentTaxRepresentativeLegalOrganisation(
                $newDocumentTaxRepresentativeLegalOrganisationType,
                $newDocumentTaxRepresentativeLegalOrganisationId,
                $newDocumentTaxRepresentativeLegalOrganisationName
            );

            $newDocumentDTO->getTaxRepresentativeParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentTaxRepresentativeLegalOrganisationId,
                $newDocumentTaxRepresentativeLegalOrganisationType,
                $newDocumentTaxRepresentativeLegalOrganisationName
            ));
        }

        while ($this->nextDocumentTaxRepresentativeContact()) {
            $this->getDocumentTaxRepresentativeContact(
                $newDocumentTaxRepresentativeContactPersonName,
                $newDocumentTaxRepresentativeContactDepartmentName,
                $newDocumentTaxRepresentativeContactPhoneNumber,
                $newDocumentTaxRepresentativeContactFaxNumber,
                $newDocumentTaxRepresentativeContactEmailAddress
            );

            $newDocumentDTO->getTaxRepresentativeParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentTaxRepresentativeContactPersonName,
                    $newDocumentTaxRepresentativeContactDepartmentName,
                    $newDocumentTaxRepresentativeContactPhoneNumber,
                    $newDocumentTaxRepresentativeContactFaxNumber,
                    $newDocumentTaxRepresentativeContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentTaxRepresentativeCommunication()) {
            $this->getDocumentTaxRepresentativeCommunication(
                $newDocumentTaxRepresentativeCommunicationType,
                $newDocumentTaxRepresentativeCommunicationUri
            );

            $newDocumentDTO->getTaxRepresentativeParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentTaxRepresentativeCommunicationUri,
                    $newDocumentTaxRepresentativeCommunicationType
                )
            );
        }

        // Document-Level Product End-User Party

        $newDocumentDTO->setProductEndUserParty(new InvoiceSuitePartyDTO());

        $this->getDocumentProductEndUserName($newDocumentProductEndUserName);
        $newDocumentDTO->getProductEndUserParty()->addName($newDocumentProductEndUserName);

        while ($this->nextDocumentProductEndUserId()) {
            $this->getDocumentProductEndUserId(
                $newDocumentProductEndUserId
            );

            $newDocumentDTO->getProductEndUserParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentProductEndUserId
                )
            );
        }

        while ($this->nextDocumentProductEndUserGlobalId()) {
            $this->getDocumentProductEndUserGlobalId(
                $newDocumentProductEndUserGlobalId,
                $newDocumentProductEndUserGlobalIdType
            );

            $newDocumentDTO->getProductEndUserParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentProductEndUserGlobalId,
                    $newDocumentProductEndUserGlobalIdType
                )
            );
        }

        while ($this->nextDocumentProductEndUserTaxRegistration()) {
            $this->getDocumentProductEndUserTaxRegistration(
                $newDocumentProductEndUserTaxRegistationType,
                $newDocumentProductEndUserTaxRegistationId
            );

            $newDocumentDTO->getProductEndUserParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentProductEndUserTaxRegistationId,
                    $newDocumentProductEndUserTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentProductEndUserAddress()) {
            $this->getDocumentProductEndUserAddress(
                $documentProductEndUserAddressLine1,
                $documentProductEndUserAddressLine2,
                $documentProductEndUserAddressLine3,
                $documentProductEndUserAddressPostCode,
                $documentProductEndUserAddressCity,
                $documentProductEndUserAddressCountry,
                $documentProductEndUserAddressSubDivision
            );

            $newDocumentDTO->getProductEndUserParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentProductEndUserAddressLine1,
                $documentProductEndUserAddressLine2,
                $documentProductEndUserAddressLine3,
                $documentProductEndUserAddressPostCode,
                $documentProductEndUserAddressCity,
                $documentProductEndUserAddressCountry,
                $documentProductEndUserAddressSubDivision
            ));
        }

        while ($this->nextDocumentProductEndUserLegalOrganisation()) {
            $this->getDocumentProductEndUserLegalOrganisation(
                $newDocumentProductEndUserLegalOrganisationType,
                $newDocumentProductEndUserLegalOrganisationId,
                $newDocumentProductEndUserLegalOrganisationName
            );

            $newDocumentDTO->getProductEndUserParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentProductEndUserLegalOrganisationId,
                $newDocumentProductEndUserLegalOrganisationType,
                $newDocumentProductEndUserLegalOrganisationName
            ));
        }

        while ($this->nextDocumentProductEndUserContact()) {
            $this->getDocumentProductEndUserContact(
                $newDocumentProductEndUserContactPersonName,
                $newDocumentProductEndUserContactDepartmentName,
                $newDocumentProductEndUserContactPhoneNumber,
                $newDocumentProductEndUserContactFaxNumber,
                $newDocumentProductEndUserContactEmailAddress
            );

            $newDocumentDTO->getProductEndUserParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentProductEndUserContactPersonName,
                    $newDocumentProductEndUserContactDepartmentName,
                    $newDocumentProductEndUserContactPhoneNumber,
                    $newDocumentProductEndUserContactFaxNumber,
                    $newDocumentProductEndUserContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentProductEndUserCommunication()) {
            $this->getDocumentProductEndUserCommunication(
                $newDocumentProductEndUserCommunicationType,
                $newDocumentProductEndUserCommunicationUri
            );

            $newDocumentDTO->getProductEndUserParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentProductEndUserCommunicationUri,
                    $newDocumentProductEndUserCommunicationType
                )
            );
        }

        // Document-Level Ship-To Party

        $newDocumentDTO->setShipToParty(new InvoiceSuitePartyDTO());

        $this->getDocumentShipToName($newDocumentShipToName);
        $newDocumentDTO->getShipToParty()->addName($newDocumentShipToName);

        while ($this->nextDocumentShipToId()) {
            $this->getDocumentShipToId(
                $newDocumentShipToId
            );

            $newDocumentDTO->getShipToParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentShipToId
                )
            );
        }

        while ($this->nextDocumentShipToGlobalId()) {
            $this->getDocumentShipToGlobalId(
                $newDocumentShipToGlobalId,
                $newDocumentShipToGlobalIdType
            );

            $newDocumentDTO->getShipToParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentShipToGlobalId,
                    $newDocumentShipToGlobalIdType
                )
            );
        }

        while ($this->nextDocumentShipToTaxRegistration()) {
            $this->getDocumentShipToTaxRegistration(
                $newDocumentShipToTaxRegistationType,
                $newDocumentShipToTaxRegistationId
            );

            $newDocumentDTO->getShipToParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentShipToTaxRegistationId,
                    $newDocumentShipToTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentShipToAddress()) {
            $this->getDocumentShipToAddress(
                $documentShipToAddressLine1,
                $documentShipToAddressLine2,
                $documentShipToAddressLine3,
                $documentShipToAddressPostCode,
                $documentShipToAddressCity,
                $documentShipToAddressCountry,
                $documentShipToAddressSubDivision
            );

            $newDocumentDTO->getShipToParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentShipToAddressLine1,
                $documentShipToAddressLine2,
                $documentShipToAddressLine3,
                $documentShipToAddressPostCode,
                $documentShipToAddressCity,
                $documentShipToAddressCountry,
                $documentShipToAddressSubDivision
            ));
        }

        while ($this->nextDocumentShipToLegalOrganisation()) {
            $this->getDocumentShipToLegalOrganisation(
                $newDocumentShipToLegalOrganisationType,
                $newDocumentShipToLegalOrganisationId,
                $newDocumentShipToLegalOrganisationName
            );

            $newDocumentDTO->getShipToParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentShipToLegalOrganisationId,
                $newDocumentShipToLegalOrganisationType,
                $newDocumentShipToLegalOrganisationName
            ));
        }

        while ($this->nextDocumentShipToContact()) {
            $this->getDocumentShipToContact(
                $newDocumentShipToContactPersonName,
                $newDocumentShipToContactDepartmentName,
                $newDocumentShipToContactPhoneNumber,
                $newDocumentShipToContactFaxNumber,
                $newDocumentShipToContactEmailAddress
            );

            $newDocumentDTO->getShipToParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentShipToContactPersonName,
                    $newDocumentShipToContactDepartmentName,
                    $newDocumentShipToContactPhoneNumber,
                    $newDocumentShipToContactFaxNumber,
                    $newDocumentShipToContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentShipToCommunication()) {
            $this->getDocumentShipToCommunication(
                $newDocumentShipToCommunicationType,
                $newDocumentShipToCommunicationUri
            );

            $newDocumentDTO->getShipToParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentShipToCommunicationUri,
                    $newDocumentShipToCommunicationType
                )
            );
        }

        // Document-Level Ultimate Ship-To Party

        $newDocumentDTO->setUltimateShipToParty(new InvoiceSuitePartyDTO());

        $this->getDocumentUltimateShipToName($newDocumentUltimateShipToName);
        $newDocumentDTO->getUltimateShipToParty()->addName($newDocumentUltimateShipToName);

        while ($this->nextDocumentUltimateShipToId()) {
            $this->getDocumentUltimateShipToId(
                $newDocumentUltimateShipToId
            );

            $newDocumentDTO->getUltimateShipToParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentUltimateShipToId
                )
            );
        }

        while ($this->nextDocumentUltimateShipToGlobalId()) {
            $this->getDocumentUltimateShipToGlobalId(
                $newDocumentUltimateShipToGlobalId,
                $newDocumentUltimateShipToGlobalIdType
            );

            $newDocumentDTO->getUltimateShipToParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentUltimateShipToGlobalId,
                    $newDocumentUltimateShipToGlobalIdType
                )
            );
        }

        while ($this->nextDocumentUltimateShipToTaxRegistration()) {
            $this->getDocumentUltimateShipToTaxRegistration(
                $newDocumentUltimateShipToTaxRegistationType,
                $newDocumentUltimateShipToTaxRegistationId
            );

            $newDocumentDTO->getUltimateShipToParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentUltimateShipToTaxRegistationId,
                    $newDocumentUltimateShipToTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentUltimateShipToAddress()) {
            $this->getDocumentUltimateShipToAddress(
                $documentUltimateShipToAddressLine1,
                $documentUltimateShipToAddressLine2,
                $documentUltimateShipToAddressLine3,
                $documentUltimateShipToAddressPostCode,
                $documentUltimateShipToAddressCity,
                $documentUltimateShipToAddressCountry,
                $documentUltimateShipToAddressSubDivision
            );

            $newDocumentDTO->getUltimateShipToParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentUltimateShipToAddressLine1,
                $documentUltimateShipToAddressLine2,
                $documentUltimateShipToAddressLine3,
                $documentUltimateShipToAddressPostCode,
                $documentUltimateShipToAddressCity,
                $documentUltimateShipToAddressCountry,
                $documentUltimateShipToAddressSubDivision
            ));
        }

        while ($this->nextDocumentUltimateShipToLegalOrganisation()) {
            $this->getDocumentUltimateShipToLegalOrganisation(
                $newDocumentUltimateShipToLegalOrganisationType,
                $newDocumentUltimateShipToLegalOrganisationId,
                $newDocumentUltimateShipToLegalOrganisationName
            );

            $newDocumentDTO->getUltimateShipToParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentUltimateShipToLegalOrganisationId,
                $newDocumentUltimateShipToLegalOrganisationType,
                $newDocumentUltimateShipToLegalOrganisationName
            ));
        }

        while ($this->nextDocumentUltimateShipToContact()) {
            $this->getDocumentUltimateShipToContact(
                $newDocumentUltimateShipToContactPersonName,
                $newDocumentUltimateShipToContactDepartmentName,
                $newDocumentUltimateShipToContactPhoneNumber,
                $newDocumentUltimateShipToContactFaxNumber,
                $newDocumentUltimateShipToContactEmailAddress
            );

            $newDocumentDTO->getUltimateShipToParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentUltimateShipToContactPersonName,
                    $newDocumentUltimateShipToContactDepartmentName,
                    $newDocumentUltimateShipToContactPhoneNumber,
                    $newDocumentUltimateShipToContactFaxNumber,
                    $newDocumentUltimateShipToContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentUltimateShipToCommunication()) {
            $this->getDocumentUltimateShipToCommunication(
                $newDocumentUltimateShipToCommunicationType,
                $newDocumentUltimateShipToCommunicationUri
            );

            $newDocumentDTO->getUltimateShipToParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentUltimateShipToCommunicationUri,
                    $newDocumentUltimateShipToCommunicationType
                )
            );
        }

        // Document-Level Ship-From Party

        $newDocumentDTO->setShipFromParty(new InvoiceSuitePartyDTO());

        $this->getDocumentShipFromName($newDocumentShipFromName);
        $newDocumentDTO->getShipFromParty()->addName($newDocumentShipFromName);

        while ($this->nextDocumentShipFromId()) {
            $this->getDocumentShipFromId(
                $newDocumentShipFromId
            );

            $newDocumentDTO->getShipFromParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentShipFromId
                )
            );
        }

        while ($this->nextDocumentShipFromGlobalId()) {
            $this->getDocumentShipFromGlobalId(
                $newDocumentShipFromGlobalId,
                $newDocumentShipFromGlobalIdType
            );

            $newDocumentDTO->getShipFromParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentShipFromGlobalId,
                    $newDocumentShipFromGlobalIdType
                )
            );
        }

        while ($this->nextDocumentShipFromTaxRegistration()) {
            $this->getDocumentShipFromTaxRegistration(
                $newDocumentShipFromTaxRegistationType,
                $newDocumentShipFromTaxRegistationId
            );

            $newDocumentDTO->getShipFromParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentShipFromTaxRegistationId,
                    $newDocumentShipFromTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentShipFromAddress()) {
            $this->getDocumentShipFromAddress(
                $documentShipFromAddressLine1,
                $documentShipFromAddressLine2,
                $documentShipFromAddressLine3,
                $documentShipFromAddressPostCode,
                $documentShipFromAddressCity,
                $documentShipFromAddressCountry,
                $documentShipFromAddressSubDivision
            );

            $newDocumentDTO->getShipFromParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentShipFromAddressLine1,
                $documentShipFromAddressLine2,
                $documentShipFromAddressLine3,
                $documentShipFromAddressPostCode,
                $documentShipFromAddressCity,
                $documentShipFromAddressCountry,
                $documentShipFromAddressSubDivision
            ));
        }

        while ($this->nextDocumentShipFromLegalOrganisation()) {
            $this->getDocumentShipFromLegalOrganisation(
                $newDocumentShipFromLegalOrganisationType,
                $newDocumentShipFromLegalOrganisationId,
                $newDocumentShipFromLegalOrganisationName
            );

            $newDocumentDTO->getShipFromParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentShipFromLegalOrganisationId,
                $newDocumentShipFromLegalOrganisationType,
                $newDocumentShipFromLegalOrganisationName
            ));
        }

        while ($this->nextDocumentShipFromContact()) {
            $this->getDocumentShipFromContact(
                $newDocumentShipFromContactPersonName,
                $newDocumentShipFromContactDepartmentName,
                $newDocumentShipFromContactPhoneNumber,
                $newDocumentShipFromContactFaxNumber,
                $newDocumentShipFromContactEmailAddress
            );

            $newDocumentDTO->getShipFromParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentShipFromContactPersonName,
                    $newDocumentShipFromContactDepartmentName,
                    $newDocumentShipFromContactPhoneNumber,
                    $newDocumentShipFromContactFaxNumber,
                    $newDocumentShipFromContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentShipFromCommunication()) {
            $this->getDocumentShipFromCommunication(
                $newDocumentShipFromCommunicationType,
                $newDocumentShipFromCommunicationUri
            );

            $newDocumentDTO->getShipFromParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentShipFromCommunicationUri,
                    $newDocumentShipFromCommunicationType
                )
            );
        }

        // Document-Level Invoicer Party

        $newDocumentDTO->setInvoicerParty(new InvoiceSuitePartyDTO());

        $this->getDocumentInvoicerName($newDocumentInvoicerName);
        $newDocumentDTO->getInvoicerParty()->addName($newDocumentInvoicerName);

        while ($this->nextDocumentInvoicerId()) {
            $this->getDocumentInvoicerId(
                $newDocumentInvoicerId
            );

            $newDocumentDTO->getInvoicerParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentInvoicerId
                )
            );
        }

        while ($this->nextDocumentInvoicerGlobalId()) {
            $this->getDocumentInvoicerGlobalId(
                $newDocumentInvoicerGlobalId,
                $newDocumentInvoicerGlobalIdType
            );

            $newDocumentDTO->getInvoicerParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentInvoicerGlobalId,
                    $newDocumentInvoicerGlobalIdType
                )
            );
        }

        while ($this->nextDocumentInvoicerTaxRegistration()) {
            $this->getDocumentInvoicerTaxRegistration(
                $newDocumentInvoicerTaxRegistationType,
                $newDocumentInvoicerTaxRegistationId
            );

            $newDocumentDTO->getInvoicerParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentInvoicerTaxRegistationId,
                    $newDocumentInvoicerTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentInvoicerAddress()) {
            $this->getDocumentInvoicerAddress(
                $documentInvoicerAddressLine1,
                $documentInvoicerAddressLine2,
                $documentInvoicerAddressLine3,
                $documentInvoicerAddressPostCode,
                $documentInvoicerAddressCity,
                $documentInvoicerAddressCountry,
                $documentInvoicerAddressSubDivision
            );

            $newDocumentDTO->getInvoicerParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentInvoicerAddressLine1,
                $documentInvoicerAddressLine2,
                $documentInvoicerAddressLine3,
                $documentInvoicerAddressPostCode,
                $documentInvoicerAddressCity,
                $documentInvoicerAddressCountry,
                $documentInvoicerAddressSubDivision
            ));
        }

        while ($this->nextDocumentInvoicerLegalOrganisation()) {
            $this->getDocumentInvoicerLegalOrganisation(
                $newDocumentInvoicerLegalOrganisationType,
                $newDocumentInvoicerLegalOrganisationId,
                $newDocumentInvoicerLegalOrganisationName
            );

            $newDocumentDTO->getInvoicerParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentInvoicerLegalOrganisationId,
                $newDocumentInvoicerLegalOrganisationType,
                $newDocumentInvoicerLegalOrganisationName
            ));
        }

        while ($this->nextDocumentInvoicerContact()) {
            $this->getDocumentInvoicerContact(
                $newDocumentInvoicerContactPersonName,
                $newDocumentInvoicerContactDepartmentName,
                $newDocumentInvoicerContactPhoneNumber,
                $newDocumentInvoicerContactFaxNumber,
                $newDocumentInvoicerContactEmailAddress
            );

            $newDocumentDTO->getInvoicerParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentInvoicerContactPersonName,
                    $newDocumentInvoicerContactDepartmentName,
                    $newDocumentInvoicerContactPhoneNumber,
                    $newDocumentInvoicerContactFaxNumber,
                    $newDocumentInvoicerContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentInvoicerCommunication()) {
            $this->getDocumentInvoicerCommunication(
                $newDocumentInvoicerCommunicationType,
                $newDocumentInvoicerCommunicationUri
            );

            $newDocumentDTO->getInvoicerParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentInvoicerCommunicationUri,
                    $newDocumentInvoicerCommunicationType
                )
            );
        }

        // Document-Level Invoicee Party

        $newDocumentDTO->setInvoiceeParty(new InvoiceSuitePartyDTO());

        $this->getDocumentInvoiceeName($newDocumentInvoiceeName);
        $newDocumentDTO->getInvoiceeParty()->addName($newDocumentInvoiceeName);

        while ($this->nextDocumentInvoiceeId()) {
            $this->getDocumentInvoiceeId(
                $newDocumentInvoiceeId
            );

            $newDocumentDTO->getInvoiceeParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentInvoiceeId
                )
            );
        }

        while ($this->nextDocumentInvoiceeGlobalId()) {
            $this->getDocumentInvoiceeGlobalId(
                $newDocumentInvoiceeGlobalId,
                $newDocumentInvoiceeGlobalIdType
            );

            $newDocumentDTO->getInvoiceeParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentInvoiceeGlobalId,
                    $newDocumentInvoiceeGlobalIdType
                )
            );
        }

        while ($this->nextDocumentInvoiceeTaxRegistration()) {
            $this->getDocumentInvoiceeTaxRegistration(
                $newDocumentInvoiceeTaxRegistationType,
                $newDocumentInvoiceeTaxRegistationId
            );

            $newDocumentDTO->getInvoiceeParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentInvoiceeTaxRegistationId,
                    $newDocumentInvoiceeTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentInvoiceeAddress()) {
            $this->getDocumentInvoiceeAddress(
                $documentInvoiceeAddressLine1,
                $documentInvoiceeAddressLine2,
                $documentInvoiceeAddressLine3,
                $documentInvoiceeAddressPostCode,
                $documentInvoiceeAddressCity,
                $documentInvoiceeAddressCountry,
                $documentInvoiceeAddressSubDivision
            );

            $newDocumentDTO->getInvoiceeParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentInvoiceeAddressLine1,
                $documentInvoiceeAddressLine2,
                $documentInvoiceeAddressLine3,
                $documentInvoiceeAddressPostCode,
                $documentInvoiceeAddressCity,
                $documentInvoiceeAddressCountry,
                $documentInvoiceeAddressSubDivision
            ));
        }

        while ($this->nextDocumentInvoiceeLegalOrganisation()) {
            $this->getDocumentInvoiceeLegalOrganisation(
                $newDocumentInvoiceeLegalOrganisationType,
                $newDocumentInvoiceeLegalOrganisationId,
                $newDocumentInvoiceeLegalOrganisationName
            );

            $newDocumentDTO->getInvoiceeParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentInvoiceeLegalOrganisationId,
                $newDocumentInvoiceeLegalOrganisationType,
                $newDocumentInvoiceeLegalOrganisationName
            ));
        }

        while ($this->nextDocumentInvoiceeContact()) {
            $this->getDocumentInvoiceeContact(
                $newDocumentInvoiceeContactPersonName,
                $newDocumentInvoiceeContactDepartmentName,
                $newDocumentInvoiceeContactPhoneNumber,
                $newDocumentInvoiceeContactFaxNumber,
                $newDocumentInvoiceeContactEmailAddress
            );

            $newDocumentDTO->getInvoiceeParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentInvoiceeContactPersonName,
                    $newDocumentInvoiceeContactDepartmentName,
                    $newDocumentInvoiceeContactPhoneNumber,
                    $newDocumentInvoiceeContactFaxNumber,
                    $newDocumentInvoiceeContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentInvoiceeCommunication()) {
            $this->getDocumentInvoiceeCommunication(
                $newDocumentInvoiceeCommunicationType,
                $newDocumentInvoiceeCommunicationUri
            );

            $newDocumentDTO->getInvoiceeParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentInvoiceeCommunicationUri,
                    $newDocumentInvoiceeCommunicationType
                )
            );
        }

        // Document-Level Payee Party

        $newDocumentDTO->setPayeeParty(new InvoiceSuitePartyDTO());

        $this->getDocumentPayeeName($newDocumentPayeeName);
        $newDocumentDTO->getPayeeParty()->addName($newDocumentPayeeName);

        while ($this->nextDocumentPayeeId()) {
            $this->getDocumentPayeeId(
                $newDocumentPayeeId
            );

            $newDocumentDTO->getPayeeParty()->addId(
                new InvoiceSuiteIdDTO(
                    $newDocumentPayeeId
                )
            );
        }

        while ($this->nextDocumentPayeeGlobalId()) {
            $this->getDocumentPayeeGlobalId(
                $newDocumentPayeeGlobalId,
                $newDocumentPayeeGlobalIdType
            );

            $newDocumentDTO->getPayeeParty()->addGlobalId(
                new InvoiceSuiteIdDTO(
                    $newDocumentPayeeGlobalId,
                    $newDocumentPayeeGlobalIdType
                )
            );
        }

        while ($this->nextDocumentPayeeTaxRegistration()) {
            $this->getDocumentPayeeTaxRegistration(
                $newDocumentPayeeTaxRegistationType,
                $newDocumentPayeeTaxRegistationId
            );

            $newDocumentDTO->getPayeeParty()->addTaxRegistration(
                new InvoiceSuiteIdDTO(
                    $newDocumentPayeeTaxRegistationId,
                    $newDocumentPayeeTaxRegistationType
                )
            );
        }

        while ($this->nextDocumentPayeeAddress()) {
            $this->getDocumentPayeeAddress(
                $documentPayeeAddressLine1,
                $documentPayeeAddressLine2,
                $documentPayeeAddressLine3,
                $documentPayeeAddressPostCode,
                $documentPayeeAddressCity,
                $documentPayeeAddressCountry,
                $documentPayeeAddressSubDivision
            );

            $newDocumentDTO->getPayeeParty()->addAddress(new InvoiceSuiteAddressDTO(
                $documentPayeeAddressLine1,
                $documentPayeeAddressLine2,
                $documentPayeeAddressLine3,
                $documentPayeeAddressPostCode,
                $documentPayeeAddressCity,
                $documentPayeeAddressCountry,
                $documentPayeeAddressSubDivision
            ));
        }

        while ($this->nextDocumentPayeeLegalOrganisation()) {
            $this->getDocumentPayeeLegalOrganisation(
                $newDocumentPayeeLegalOrganisationType,
                $newDocumentPayeeLegalOrganisationId,
                $newDocumentPayeeLegalOrganisationName
            );

            $newDocumentDTO->getPayeeParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                $newDocumentPayeeLegalOrganisationId,
                $newDocumentPayeeLegalOrganisationType,
                $newDocumentPayeeLegalOrganisationName
            ));
        }

        while ($this->nextDocumentPayeeContact()) {
            $this->getDocumentPayeeContact(
                $newDocumentPayeeContactPersonName,
                $newDocumentPayeeContactDepartmentName,
                $newDocumentPayeeContactPhoneNumber,
                $newDocumentPayeeContactFaxNumber,
                $newDocumentPayeeContactEmailAddress
            );

            $newDocumentDTO->getPayeeParty()->addContact(
                new InvoiceSuiteContactDTO(
                    $newDocumentPayeeContactPersonName,
                    $newDocumentPayeeContactDepartmentName,
                    $newDocumentPayeeContactPhoneNumber,
                    $newDocumentPayeeContactFaxNumber,
                    $newDocumentPayeeContactEmailAddress
                )
            );
        }

        while ($this->nextDocumentPayeeCommunication()) {
            $this->getDocumentPayeeCommunication(
                $newDocumentPayeeCommunicationType,
                $newDocumentPayeeCommunicationUri
            );

            $newDocumentDTO->getPayeeParty()->addCommunication(
                new InvoiceSuiteCommunicationDTO(
                    $newDocumentPayeeCommunicationUri,
                    $newDocumentPayeeCommunicationType
                )
            );
        }

        // Document-Level Payment Means

        while ($this->nextDocumentPaymentMean()) {
            $this->getDocumentPaymentMean(
                $newDocumentPaymentMeanTypeCode,
                $newDocumentPaymentMeanName,
                $newDocumentPaymentMeanFinancialCardId,
                $newDocumentPaymentMeanFinancialCardHolder,
                $newDocumentPaymentMeanBuyerIban,
                $newDocumentPaymentMeanPayeeIban,
                $newDocumentPaymentMeanPayeeAccountName,
                $newDocumentPaymentMeanPayeeProprietaryId,
                $newDocumentPaymentMeanPayeeBic,
                $newDocumentPaymentMeanPaymentReference,
                $newDocumentPaymentMeanMandate
            );

            $newDocumentDTO->addPaymentMean(
                new InvoiceSuitePaymentMeanDTO(
                    $newDocumentPaymentMeanTypeCode,
                    $newDocumentPaymentMeanName,
                    $newDocumentPaymentMeanFinancialCardId,
                    $newDocumentPaymentMeanFinancialCardHolder,
                    $newDocumentPaymentMeanBuyerIban,
                    $newDocumentPaymentMeanPayeeIban,
                    $newDocumentPaymentMeanPayeeAccountName,
                    $newDocumentPaymentMeanPayeeProprietaryId,
                    $newDocumentPaymentMeanPayeeBic,
                    $newDocumentPaymentMeanPaymentReference,
                    $newDocumentPaymentMeanMandate
                )
            );
        }

        // Document-Level Payment Terms

        while ($this->nextDocumentPaymentTerm()) {
            $this->getDocumentPaymentTerm(
                $newDocumentPaymentTermDescription,
                $newDocumentPaymentTermDueDate
            );

            $documentPaymentTermDTO = new InvoiceSuitePaymentTermDTO(
                $newDocumentPaymentTermDescription,
                $newDocumentPaymentTermDueDate
            );

            while ($this->nextDocumentPaymentPenaltyTermsInLastPaymentTerm()) {
                $this->getDocumentPaymentPenaltyTermsInLastPaymentTerm(
                    $newDocumentPaymentTermPenaltyBaseAmount,
                    $newDocumentPaymentTermPenaltyAmount,
                    $newDocumentPaymentTermPenaltyPercent,
                    $newDocumentPaymentTermPenaltyBaseDate,
                    $newDocumentPaymentTermPenaltyBasePeriod,
                    $newDocumentPaymentTermPenaltyBasePeriodUnit
                );

                $documentPaymentTermDTO->addPenaltyTerms(
                    new InvoiceSuitePaymentTermPenaltyDTO(
                        $newDocumentPaymentTermPenaltyBaseAmount,
                        $newDocumentPaymentTermPenaltyAmount,
                        $newDocumentPaymentTermPenaltyPercent,
                        $newDocumentPaymentTermPenaltyBaseDate,
                        new InvoiceSuitePeriodDTO(
                            $newDocumentPaymentTermPenaltyBasePeriod,
                            $newDocumentPaymentTermPenaltyBasePeriodUnit
                        )
                    )
                );

                $this->getDocumentPaymentDiscountTermsInLastPaymentTerm(
                    $newDocumentPaymentTermDiscountBaseAmount,
                    $newDocumentPaymentTermDiscountAmount,
                    $newDocumentPaymentTermDiscountPercent,
                    $newDocumentPaymentTermDiscountBaseDate,
                    $newDocumentPaymentTermDiscountBasePeriod,
                    $newDocumentPaymentTermDiscountBasePeriodUnit
                );

                $documentPaymentTermDTO->addDiscountTerms(
                    new InvoiceSuitePaymentTermDiscountDTO(
                        $newDocumentPaymentTermDiscountBaseAmount,
                        $newDocumentPaymentTermDiscountAmount,
                        $newDocumentPaymentTermDiscountPercent,
                        $newDocumentPaymentTermDiscountBaseDate,
                        new InvoiceSuitePeriodDTO(
                            $newDocumentPaymentTermDiscountBasePeriod,
                            $newDocumentPaymentTermDiscountBasePeriodUnit
                        )
                    )
                );
            }

            $newDocumentDTO->addPaymentTerm($documentPaymentTermDTO);
        }

        // Document-Level Creditor reference

        while ($this->nextDocumentPaymentCreditorReferenceID()) {
            $this->getDocumentPaymentCreditorReferenceID($newDocumentCreditorReferenceId);
            $newDocumentDTO->addCreditorReference(new InvoiceSuiteIdDTO($newDocumentCreditorReferenceId));
        }

        // Document-Level Taxes

        while ($this->nextDocumentTax()) {
            $this->getDocumentTax(
                $newDocumentTaxCategory,
                $newDocumentTaxType,
                $newDocumentTaxBasisAmount,
                $newDocumentTaxAmount,
                $newDocumentTaxPercent,
                $newDocumentTaxExemptionReason,
                $newDocumentTaxExemptionReasonCode,
                $newDocumentTaxDueDate,
                $newDocumentTaxDueCode
            );

            $newDocumentDTO->addTax(
                new InvoiceSuiteTaxDTO(
                    $newDocumentTaxCategory,
                    $newDocumentTaxType,
                    $newDocumentTaxBasisAmount,
                    $newDocumentTaxAmount,
                    $newDocumentTaxPercent,
                    $newDocumentTaxExemptionReason,
                    $newDocumentTaxExemptionReasonCode,
                    $newDocumentTaxDueDate,
                    $newDocumentTaxDueCode
                )
            );
        }

        // Document-Level Allowances/Charges

        while ($this->nextDocumentAllowanceCharge()) {
            $this->getDocumentAllowanceCharge(
                $newDocumentAllowanceChargeChargeIndicator,
                $newDocumentAllowanceChargeAmount,
                $newDocumentAllowanceChargeBaseAmount,
                $newDocumentAllowanceChargeTaxCategory,
                $newDocumentAllowanceChargeTaxType,
                $newDocumentAllowanceChargeTaxPercent,
                $newDocumentAllowanceChargeReason,
                $newDocumentAllowanceChargeReasonCode,
                $newDocumentAllowanceChargePercent
            );

            $newDocumentDTO->addAllowanceCharge(
                new InvoiceSuiteAllowanceChargeDTO(
                    $newDocumentAllowanceChargeChargeIndicator,
                    $newDocumentAllowanceChargeAmount,
                    $newDocumentAllowanceChargeBaseAmount,
                    $newDocumentAllowanceChargePercent,
                    $newDocumentAllowanceChargeTaxCategory,
                    $newDocumentAllowanceChargeTaxType,
                    $newDocumentAllowanceChargeTaxPercent,
                    $newDocumentAllowanceChargeReason,
                    $newDocumentAllowanceChargeReasonCode
                )
            );
        }

        // Document-Level Logistic Service Charges

        while ($this->nextDocumentLogisticServiceCharge()) {
            $this->getDocumentLogisticServiceCharge(
                $newDocumentLogServiceChargeAmount,
                $newDocumentLogServiceChargeDescription,
                $newDocumentLogServiceChargeTaxCategory,
                $newDocumentLogServiceChargeTaxType,
                $newDocumentLogServiceChargeTaxPercent
            );

            $newDocumentDTO->addServiceCharge(
                new InvoiceSuiteServiceChargeDTO(
                    $newDocumentLogServiceChargeAmount,
                    $newDocumentLogServiceChargeDescription,
                    $newDocumentLogServiceChargeTaxCategory,
                    $newDocumentLogServiceChargeTaxType,
                    $newDocumentLogServiceChargeTaxPercent
                )
            );
        }

        // Document-Level Summation

        $this->getDocumentSummation(
            $newDocumentNetAmount,
            $newDocumentChargeTotalAmount,
            $newDocumentDiscountTotalAmount,
            $newDocumentTaxBasisAmount,
            $newDocumentTaxTotalAmount,
            $newDocumentTaxTotalAmount2,
            $newDocumentGrossAmount,
            $newDocumentDueAmount,
            $newDocumentPrepaidAmount,
            $newDocumentRoungingAmount
        );

        $newDocumentDTO->addSummation(
            new InvoiceSuiteSummationDTO(
                $newDocumentNetAmount,
                $newDocumentChargeTotalAmount,
                $newDocumentDiscountTotalAmount,
                $newDocumentTaxBasisAmount,
                $newDocumentTaxTotalAmount,
                $newDocumentTaxTotalAmount2,
                $newDocumentGrossAmount,
                $newDocumentDueAmount,
                $newDocumentPrepaidAmount,
                $newDocumentRoungingAmount
            )
        );

        // Positions

        while ($this->nextDocumentPosition()) {
            $this->getDocumentPosition(
                $newDocumentPositionId,
                $newDocumentPositionParentPositionId,
                $newDocumentPositionLineStatusCode,
                $newDocumentPositionLineStatusReasonCode
            );

            $newDocumentPositionDTO = new InvoiceSuiteDocumentPositionDTO(
                $newDocumentPositionId,
                $newDocumentPositionParentPositionId,
                $newDocumentPositionLineStatusCode,
                $newDocumentPositionLineStatusReasonCode
            );

            while ($this->nextDocumentPositionNote()) {
                $this->getDocumentPositionNote(
                    $newDocumentPositionNoteContent,
                    $newDocumentPositionNoteContentCode,
                    $newDocumentPositionNoteSubjectCode
                );

                $newDocumentPositionDTO->addNote(
                    new InvoiceSuiteNoteDTO(
                        $newDocumentPositionNoteContent,
                        $newDocumentPositionNoteContentCode,
                        $newDocumentPositionNoteSubjectCode
                    )
                );
            }

            $this->getDocumentPositionProductDetails(
                $newDocumentPositionProductId,
                $newDocumentPositionProductName,
                $newDocumentPositionProductDescription,
                $newDocumentPositionProductSellerId,
                $newDocumentPositionProductBuyerId,
                $newDocumentPositionProductGlobalId,
                $newDocumentPositionProductGlobalIdType,
                $newDocumentPositionProductIndustryId,
                $newDocumentPositionProductModelId,
                $newDocumentPositionProductBatchId,
                $newDocumentPositionProductBrandName,
                $newDocumentPositionProductModelName,
                $newDocumentPositionProductOriginTradeCountry
            );

            $newDocumentPositionProductDTO = new InvoiceSuiteProductDTO(
                $newDocumentPositionProductId,
                $newDocumentPositionProductName,
                $newDocumentPositionProductDescription,
                $newDocumentPositionProductSellerId,
                $newDocumentPositionProductBuyerId,
                new InvoiceSuiteIdDTO(
                    $newDocumentPositionProductGlobalId,
                    $newDocumentPositionProductGlobalIdType
                ),
                $newDocumentPositionProductIndustryId,
                $newDocumentPositionProductModelId,
                $newDocumentPositionProductBatchId,
                $newDocumentPositionProductBrandName,
                $newDocumentPositionProductModelName,
                $newDocumentPositionProductOriginTradeCountry
            );

            while ($this->nextDocumentPositionProductCharacteristic()) {
                $this->getDocumentPositionProductCharacteristic(
                    $newDocumentPositionProductCharacteristicDescription,
                    $newDocumentPositionProductCharacteristicValue,
                    $newDocumentPositionProductCharacteristicType,
                    $newDocumentPositionProductCharacteristicMeasureValue,
                    $newDocumentPositionProductCharacteristicMeasureUnit
                );

                $newDocumentPositionProductDTO->addCharacteristic(
                    new InvoiceSuiteProductCharacteristicDTO(
                        $newDocumentPositionProductCharacteristicDescription,
                        $newDocumentPositionProductCharacteristicValue,
                        $newDocumentPositionProductCharacteristicType,
                        new InvoiceSuiteMeasureDTO(
                            $newDocumentPositionProductCharacteristicMeasureValue,
                            $newDocumentPositionProductCharacteristicMeasureUnit
                        )
                    )
                );
            }

            while ($this->nextDocumentPositionProductClassification()) {
                $this->getDocumentPositionProductClassification(
                    $newDocumentPositionProductClassificationCode,
                    $newDocumentPositionProductClassificationListId,
                    $newDocumentPositionProductClassificationListVersionId,
                    $newDocumentPositionProductClassificationCodeClassname
                );

                $newDocumentPositionProductDTO->addClassification(
                    new InvoiceSuiteProductClassificationDTO(
                        $newDocumentPositionProductClassificationCode,
                        $newDocumentPositionProductClassificationCodeClassname,
                        $newDocumentPositionProductClassificationListId,
                        $newDocumentPositionProductClassificationListVersionId
                    )
                );
            }

            while ($this->nextDocumentPositionReferencedProduct()) {
                $this->getDocumentPositionReferencedProduct(
                    $newDocumentPositionReferencedProductId,
                    $newDocumentPositionReferencedProductName,
                    $newDocumentPositionReferencedProductDescription,
                    $newDocumentPositionReferencedProductSellerId,
                    $newDocumentPositionReferencedProductBuyerId,
                    $newDocumentPositionReferencedProductGlobalId,
                    $newDocumentPositionReferencedProductGlobalIdType,
                    $newDocumentPositionReferencedProductIndustryId,
                    $newDocumentPositionReferencedProductUnitQuantity,
                    $newDocumentPositionReferencedProductUnitQuantityUnit
                );

                $newDocumentPositionProductDTO->addReferenceProduct(
                    new InvoiceSuiteReferenceProductDTO(
                        $newDocumentPositionReferencedProductId,
                        $newDocumentPositionReferencedProductName,
                        $newDocumentPositionReferencedProductDescription,
                        $newDocumentPositionReferencedProductSellerId,
                        $newDocumentPositionReferencedProductBuyerId,
                        new InvoiceSuiteIdDTO(
                            $newDocumentPositionReferencedProductGlobalId,
                            $newDocumentPositionReferencedProductGlobalIdType
                        ),
                        $newDocumentPositionReferencedProductIndustryId,
                        new InvoiceSuiteQuantityDTO(
                            $newDocumentPositionReferencedProductUnitQuantity,
                            $newDocumentPositionReferencedProductUnitQuantityUnit
                        )
                    )
                );
            }

            $newDocumentPositionDTO->setProduct($newDocumentPositionProductDTO);

            while ($this->nextDocumentPositionSellerOrderReference()) {
                $this->getDocumentPositionSellerOrderReference(
                    $newDocumentPositionSellerOrderReferenceNumber,
                    $newDocumentPositionSellerOrderReferenceLineNumber,
                    $newDocumentPositionSellerOrderReferenceDate
                );

                $newDocumentPositionDTO->addSellerOrderReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionSellerOrderReferenceNumber,
                        $newDocumentPositionSellerOrderReferenceLineNumber,
                        $newDocumentPositionSellerOrderReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionBuyerOrderReference()) {
                $this->getDocumentPositionBuyerOrderReference(
                    $newDocumentPositionBuyerOrderReferenceNumber,
                    $newDocumentPositionBuyerOrderReferenceLineNumber,
                    $newDocumentPositionBuyerOrderReferenceDate
                );

                $newDocumentPositionDTO->addBuyerOrderReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionBuyerOrderReferenceNumber,
                        $newDocumentPositionBuyerOrderReferenceLineNumber,
                        $newDocumentPositionBuyerOrderReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionQuotationReference()) {
                $this->getDocumentPositionQuotationReference(
                    $newDocumentPositionQuotationReferenceNumber,
                    $newDocumentPositionQuotationReferenceLineNumber,
                    $newDocumentPositionQuotationReferenceDate
                );

                $newDocumentPositionDTO->addQuotationReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionQuotationReferenceNumber,
                        $newDocumentPositionQuotationReferenceLineNumber,
                        $newDocumentPositionQuotationReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionContractReference()) {
                $this->getDocumentPositionContractReference(
                    $newDocumentPositionContractReferenceNumber,
                    $newDocumentPositionContractReferenceLineNumber,
                    $newDocumentPositionContractReferenceDate
                );

                $newDocumentPositionDTO->addContractReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionContractReferenceNumber,
                        $newDocumentPositionContractReferenceLineNumber,
                        $newDocumentPositionContractReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionAdditionalReference()) {
                $this->getDocumentPositionAdditionalReference(
                    $newDocumentPositionAdditionalReferenceNumber,
                    $newDocumentPositionAdditionalReferenceLineNumber,
                    $newDocumentPositionAdditionalReferenceDate,
                    $newDocumentPositionAdditionalReferenceTypeCode,
                    $newDocumentPositionAdditionalReferenceReferenceTypeCode,
                    $newDocumentPositionAdditionalReferenceDescription,
                    $newDocumentPositionAdditionalReferenceAttachment
                );

                $newDocumentPositionDTO->addAdditionalReference(
                    new InvoiceSuiteReferenceDocumentLineExtDTO(
                        $newDocumentPositionAdditionalReferenceNumber,
                        $newDocumentPositionAdditionalReferenceLineNumber,
                        $newDocumentPositionAdditionalReferenceDate,
                        $newDocumentPositionAdditionalReferenceTypeCode,
                        $newDocumentPositionAdditionalReferenceReferenceTypeCode,
                        $newDocumentPositionAdditionalReferenceDescription,
                        $newDocumentPositionAdditionalReferenceAttachment
                    )
                );
            }

            while ($this->nextDocumentPositionUltimateCustomerOrderReference()) {
                $this->getDocumentPositionUltimateCustomerOrderReference(
                    $newDocumentPositionUltimateCustomerOrderReferenceNumber,
                    $newDocumentPositionUltimateCustomerOrderReferenceLineNumber,
                    $newDocumentPositionUltimateCustomerOrderReferenceDate
                );

                $newDocumentPositionDTO->addUltimateCustomerOrderReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionUltimateCustomerOrderReferenceNumber,
                        $newDocumentPositionUltimateCustomerOrderReferenceLineNumber,
                        $newDocumentPositionUltimateCustomerOrderReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionDespatchAdviceReference()) {
                $this->getDocumentPositionDespatchAdviceReference(
                    $newDocumentPositionDespatchAdviceReferenceNumber,
                    $newDocumentPositionDespatchAdviceReferenceLineNumber,
                    $newDocumentPositionDespatchAdviceReferenceDate
                );

                $newDocumentPositionDTO->addDespatchAdviceReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionDespatchAdviceReferenceNumber,
                        $newDocumentPositionDespatchAdviceReferenceLineNumber,
                        $newDocumentPositionDespatchAdviceReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionReceivingAdviceReference()) {
                $this->getDocumentPositionReceivingAdviceReference(
                    $newDocumentPositionReceivingAdviceReferenceNumber,
                    $newDocumentPositionReceivingAdviceReferenceLineNumber,
                    $newDocumentPositionReceivingAdviceReferenceDate
                );

                $newDocumentPositionDTO->addReceivingAdviceReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionReceivingAdviceReferenceNumber,
                        $newDocumentPositionReceivingAdviceReferenceLineNumber,
                        $newDocumentPositionReceivingAdviceReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionDeliveryNoteReference()) {
                $this->getDocumentPositionDeliveryNoteReference(
                    $newDocumentPositionDeliveryNoteReferenceNumber,
                    $newDocumentPositionDeliveryNoteReferenceLineNumber,
                    $newDocumentPositionDeliveryNoteReferenceDate
                );

                $newDocumentPositionDTO->addDeliveryNoteReference(
                    new InvoiceSuiteReferenceDocumentLineDTO(
                        $newDocumentPositionDeliveryNoteReferenceNumber,
                        $newDocumentPositionDeliveryNoteReferenceLineNumber,
                        $newDocumentPositionDeliveryNoteReferenceDate
                    )
                );
            }

            while ($this->nextDocumentPositionInvoiceReference()) {
                $this->getDocumentPositionInvoiceReference(
                    $newDocumentPositionInvoiceReferenceNumber,
                    $newDocumentPositionInvoiceReferenceLineNumber,
                    $newDocumentPositionInvoiceReferenceDate,
                    $newDocumentPositionInvoiceReferenceTypeCode
                );

                $newDocumentPositionDTO->addInvoiceReference(
                    new InvoiceSuiteReferenceDocumentLineExtDTO(
                        $newDocumentPositionInvoiceReferenceNumber,
                        $newDocumentPositionInvoiceReferenceLineNumber,
                        $newDocumentPositionInvoiceReferenceDate,
                        $newDocumentPositionInvoiceReferenceTypeCode
                    )
                );
            }

            // Position Gross Price

            if ($this->firstDcumentPositionGrossPrice()) {
                $this->getDocumentPositionGrossPrice(
                    $newDocumentPositionGrossPrice,
                    $newDocumentPositionGrossPriceBasisQuantity,
                    $newDocumentPositionGrossPriceBasisQuantityUnit
                );

                $newDocumentPositionGrossPriceDTO = new InvoiceSuitePriceGrossDTO(
                    $newDocumentPositionGrossPrice,
                    new InvoiceSuiteQuantityDTO(
                        $newDocumentPositionGrossPriceBasisQuantity,
                        $newDocumentPositionGrossPriceBasisQuantityUnit
                    )
                );

                while ($this->nextDocumentPositionGrossPriceAllowanceCharge()) {
                    $this->getDocumentPositionGrossPriceAllowanceCharge(
                        $newDocumentPositionGrossPriceAllowanceChargeAmount,
                        $newDocumentPositionGrossPriceAllowanceIsCharge,
                        $newDocumentPositionGrossPriceAllowanceChargePercent,
                        $newDocumentPositionGrossPriceAllowanceChargeBasisAmount,
                        $newDocumentPositionGrossPriceAllowanceChargeReason,
                        $newDocumentPositionGrossPriceAllowanceChargeReasonCode
                    );

                    $newDocumentPositionGrossPriceDTO->addAllowanceCharge(
                        new InvoiceSuiteAllowanceChargeDTO(
                            $newDocumentPositionGrossPriceAllowanceIsCharge,
                            $newDocumentPositionGrossPriceAllowanceChargeAmount,
                            $newDocumentPositionGrossPriceAllowanceChargeBasisAmount,
                            $newDocumentPositionGrossPriceAllowanceChargePercent,
                            null,
                            null,
                            null,
                            $newDocumentPositionGrossPriceAllowanceChargeReason,
                            $newDocumentPositionGrossPriceAllowanceChargeReasonCode
                        )
                    );
                }

                $newDocumentPositionDTO->setGrossPrice($newDocumentPositionGrossPriceDTO);
            }

            // Position Net Price

            if ($this->firstDocumentPositionNetPrice()) {
                $this->getDocumentPositionNetPrice(
                    $newDocumentPositionNetPrice,
                    $newDocumentPositionNetPriceBasisQuantity,
                    $newDocumentPositionNetPriceBasisQuantityUnit
                );

                $newDocumentPositionNetPriceDTO = new InvoiceSuitePriceNetDTO(
                    $newDocumentPositionNetPrice,
                    new InvoiceSuiteQuantityDTO(
                        $newDocumentPositionNetPriceBasisQuantity,
                        $newDocumentPositionNetPriceBasisQuantityUnit
                    )
                );

                $this->getDocumentPositionNetPriceTax(
                    $newDocumentPositionNetPriceTaxCategory,
                    $newDocumentPositionNetPriceTaxType,
                    $newDocumentPositionNetPriceTaxAmount,
                    $newDocumentPositionNetPriceTaxPercent,
                    $newDocumentPositionNetPriceTaxExemptionReason,
                    $newDocumentPositionNetPriceTaxExemptionReasonCode
                );

                $newDocumentPositionNetPriceDTO->addTax(
                    new InvoiceSuiteTaxDTO(
                        $newDocumentPositionNetPriceTaxCategory,
                        $newDocumentPositionNetPriceTaxType,
                        null,
                        $newDocumentPositionNetPriceTaxAmount,
                        $newDocumentPositionNetPriceTaxPercent,
                        $newDocumentPositionNetPriceTaxExemptionReason,
                        $newDocumentPositionNetPriceTaxExemptionReasonCode
                    )
                );

                $newDocumentPositionDTO->setNetPrice($newDocumentPositionNetPriceDTO);
            }

            // Position Quantities

            $this->getDocumentPositionQuantities(
                $newDocumentPositionQuantity,
                $newDocumentPositionQuantityUnit,
                $newDocumentPositionChargeFreeQuantity,
                $newDocumentPositionChargeFreeQuantityUnit,
                $newDocumentPositionPackageQuantity,
                $newDocumentPositionPackageQuantityUnit
            );

            $newDocumentPositionDTO->setQuantityBilled(new InvoiceSuiteQuantityDTO($newDocumentPositionQuantity, $newDocumentPositionQuantityUnit));
            $newDocumentPositionDTO->setQuantityChargeFree(new InvoiceSuiteQuantityDTO($newDocumentPositionChargeFreeQuantity, $newDocumentPositionChargeFreeQuantityUnit));
            $newDocumentPositionDTO->setQuantityPackage(new InvoiceSuiteQuantityDTO($newDocumentPositionPackageQuantity, $newDocumentPositionPackageQuantityUnit));

            // Position Ship-To

            $newDocumentPositionDTO->setShipToParty(new InvoiceSuitePartyDTO());

            $this->getDocumentPositionShipToName($newDocumentPositionShipToName);

            $newDocumentPositionDTO->getShipToParty()->addName($newDocumentPositionShipToName);

            while ($this->nextDocumentPositionShipToId()) {
                $this->getDocumentPositionShipToId(
                    $newDocumentPositionShipToId
                );

                $newDocumentPositionDTO->getShipToParty()->addId(
                    new InvoiceSuiteIdDTO(
                        $newDocumentPositionShipToId
                    )
                );
            }

            while ($this->nextDocumentPositionShipToGlobalId()) {
                $this->getDocumentPositionShipToGlobalId(
                    $newDocumentPositionShipToGlobalId,
                    $newDocumentPositionShipToGlobalIdType
                );

                $newDocumentPositionDTO->getShipToParty()->addGlobalId(
                    new InvoiceSuiteIdDTO(
                        $newDocumentPositionShipToGlobalId,
                        $newDocumentPositionShipToGlobalIdType
                    )
                );
            }

            while ($this->nextDocumentPositionShipToTaxRegistration()) {
                $this->getDocumentPositionShipToTaxRegistration(
                    $newDocumentPositionShipToTaxRegistationType,
                    $newDocumentPositionShipToTaxRegistationId
                );

                $newDocumentPositionDTO->getShipToParty()->addTaxRegistration(
                    new InvoiceSuiteIdDTO(
                        $newDocumentPositionShipToTaxRegistationId,
                        $newDocumentPositionShipToTaxRegistationType
                    )
                );
            }

            while ($this->nextDocumentPositionShipToAddress()) {
                $this->getDocumentPositionShipToAddress(
                    $documentShipToAddressLine1,
                    $documentShipToAddressLine2,
                    $documentShipToAddressLine3,
                    $documentShipToAddressPostCode,
                    $documentShipToAddressCity,
                    $documentShipToAddressCountry,
                    $documentShipToAddressSubDivision
                );

                $newDocumentPositionDTO->getShipToParty()->addAddress(new InvoiceSuiteAddressDTO(
                    $documentShipToAddressLine1,
                    $documentShipToAddressLine2,
                    $documentShipToAddressLine3,
                    $documentShipToAddressPostCode,
                    $documentShipToAddressCity,
                    $documentShipToAddressCountry,
                    $documentShipToAddressSubDivision
                ));
            }

            while ($this->nextDocumentPositionShipToLegalOrganisation()) {
                $this->getDocumentPositionShipToLegalOrganisation(
                    $newDocumentPositionShipToLegalOrganisationType,
                    $newDocumentPositionShipToLegalOrganisationId,
                    $newDocumentPositionShipToLegalOrganisationName
                );

                $newDocumentPositionDTO->getShipToParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                    $newDocumentPositionShipToLegalOrganisationId,
                    $newDocumentPositionShipToLegalOrganisationType,
                    $newDocumentPositionShipToLegalOrganisationName
                ));
            }

            while ($this->nextDocumentPositionShipToContact()) {
                $this->getDocumentPositionShipToContact(
                    $newDocumentPositionShipToContactPersonName,
                    $newDocumentPositionShipToContactDepartmentName,
                    $newDocumentPositionShipToContactPhoneNumber,
                    $newDocumentPositionShipToContactFaxNumber,
                    $newDocumentPositionShipToContactEmailAddress
                );

                $newDocumentPositionDTO->getShipToParty()->addContact(
                    new InvoiceSuiteContactDTO(
                        $newDocumentPositionShipToContactPersonName,
                        $newDocumentPositionShipToContactDepartmentName,
                        $newDocumentPositionShipToContactPhoneNumber,
                        $newDocumentPositionShipToContactFaxNumber,
                        $newDocumentPositionShipToContactEmailAddress
                    )
                );
            }

            while ($this->nextDocumentPositionShipToCommunication()) {
                $this->getDocumentPositionShipToCommunication(
                    $newDocumentPositionShipToCommunicationType,
                    $newDocumentPositionShipToCommunicationUri
                );

                $newDocumentPositionDTO->getShipToParty()->addCommunication(
                    new InvoiceSuiteCommunicationDTO(
                        $newDocumentPositionShipToCommunicationUri,
                        $newDocumentPositionShipToCommunicationType
                    )
                );
            }

            // Position Ultimate Ship-To

            $newDocumentPositionDTO->setUltimateShipToParty(new InvoiceSuitePartyDTO());

            $this->getDocumentPositionUltimateShipToName($newDocumentPositionUltimateShipToName);

            $newDocumentPositionDTO->getUltimateShipToParty()->addName($newDocumentPositionUltimateShipToName);

            while ($this->nextDocumentPositionUltimateShipToId()) {
                $this->getDocumentPositionUltimateShipToId(
                    $newDocumentPositionUltimateShipToId
                );

                $newDocumentPositionDTO->getUltimateShipToParty()->addId(
                    new InvoiceSuiteIdDTO(
                        $newDocumentPositionUltimateShipToId
                    )
                );
            }

            while ($this->nextDocumentPositionUltimateShipToGlobalId()) {
                $this->getDocumentPositionUltimateShipToGlobalId(
                    $newDocumentPositionUltimateShipToGlobalId,
                    $newDocumentPositionUltimateShipToGlobalIdType
                );

                $newDocumentPositionDTO->getUltimateShipToParty()->addGlobalId(
                    new InvoiceSuiteIdDTO(
                        $newDocumentPositionUltimateShipToGlobalId,
                        $newDocumentPositionUltimateShipToGlobalIdType
                    )
                );
            }

            while ($this->nextDocumentPositionUltimateShipToTaxRegistration()) {
                $this->getDocumentPositionUltimateShipToTaxRegistration(
                    $newDocumentPositionUltimateShipToTaxRegistationType,
                    $newDocumentPositionUltimateShipToTaxRegistationId
                );

                $newDocumentPositionDTO->getUltimateShipToParty()->addTaxRegistration(
                    new InvoiceSuiteIdDTO(
                        $newDocumentPositionUltimateShipToTaxRegistationId,
                        $newDocumentPositionUltimateShipToTaxRegistationType
                    )
                );
            }

            while ($this->nextDocumentPositionUltimateShipToAddress()) {
                $this->getDocumentPositionUltimateShipToAddress(
                    $documentUltimateShipToAddressLine1,
                    $documentUltimateShipToAddressLine2,
                    $documentUltimateShipToAddressLine3,
                    $documentUltimateShipToAddressPostCode,
                    $documentUltimateShipToAddressCity,
                    $documentUltimateShipToAddressCountry,
                    $documentUltimateShipToAddressSubDivision
                );

                $newDocumentPositionDTO->getUltimateShipToParty()->addAddress(new InvoiceSuiteAddressDTO(
                    $documentUltimateShipToAddressLine1,
                    $documentUltimateShipToAddressLine2,
                    $documentUltimateShipToAddressLine3,
                    $documentUltimateShipToAddressPostCode,
                    $documentUltimateShipToAddressCity,
                    $documentUltimateShipToAddressCountry,
                    $documentUltimateShipToAddressSubDivision
                ));
            }

            while ($this->nextDocumentPositionUltimateShipToLegalOrganisation()) {
                $this->getDocumentPositionUltimateShipToLegalOrganisation(
                    $newDocumentPositionUltimateShipToLegalOrganisationType,
                    $newDocumentPositionUltimateShipToLegalOrganisationId,
                    $newDocumentPositionUltimateShipToLegalOrganisationName
                );

                $newDocumentPositionDTO->getUltimateShipToParty()->addLegalOrganisation(new InvoiceSuiteOrganisationDTO(
                    $newDocumentPositionUltimateShipToLegalOrganisationId,
                    $newDocumentPositionUltimateShipToLegalOrganisationType,
                    $newDocumentPositionUltimateShipToLegalOrganisationName
                ));
            }

            while ($this->nextDocumentPositionUltimateShipToContact()) {
                $this->getDocumentPositionUltimateShipToContact(
                    $newDocumentPositionUltimateShipToContactPersonName,
                    $newDocumentPositionUltimateShipToContactDepartmentName,
                    $newDocumentPositionUltimateShipToContactPhoneNumber,
                    $newDocumentPositionUltimateShipToContactFaxNumber,
                    $newDocumentPositionUltimateShipToContactEmailAddress
                );

                $newDocumentPositionDTO->getUltimateShipToParty()->addContact(
                    new InvoiceSuiteContactDTO(
                        $newDocumentPositionUltimateShipToContactPersonName,
                        $newDocumentPositionUltimateShipToContactDepartmentName,
                        $newDocumentPositionUltimateShipToContactPhoneNumber,
                        $newDocumentPositionUltimateShipToContactFaxNumber,
                        $newDocumentPositionUltimateShipToContactEmailAddress
                    )
                );
            }

            while ($this->nextDocumentPositionUltimateShipToCommunication()) {
                $this->getDocumentPositionUltimateShipToCommunication(
                    $newDocumentPositionUltimateShipToCommunicationType,
                    $newDocumentPositionUltimateShipToCommunicationUri
                );

                $newDocumentPositionDTO->getUltimateShipToParty()->addCommunication(
                    new InvoiceSuiteCommunicationDTO(
                        $newDocumentPositionUltimateShipToCommunicationUri,
                        $newDocumentPositionUltimateShipToCommunicationType
                    )
                );
            }

            // Position supply chain event

            $this->getDocumentPositionSupplyChainEvent($newDocumentPositionSupplyChainEvent);

            $newDocumentPositionDTO->addSupplyChainEvent($newDocumentPositionSupplyChainEvent);

            // Position billing period

            while ($this->nextDocumentPositionBillingPeriod()) {
                $this->getDocumentPositionBillingPeriod(
                    $newDocumentPositionBillingPeriodStartDate,
                    $newDocumentPositionBillingPeriodEndDate,
                    $newDocumentPositionBillingPeriodDescription
                );

                $newDocumentPositionDTO->addBillingPeriod(
                    new InvoiceSuiteDateRangeDTO(
                        $newDocumentPositionBillingPeriodStartDate,
                        $newDocumentPositionBillingPeriodEndDate,
                        $newDocumentPositionBillingPeriodDescription
                    )
                );
            }

            // Position posting references

            while ($this->nextDocumentPositionPostingReference()) {
                $this->getDocumentPositionPostingReference(
                    $newDocumentPositionPostingReferenceType,
                    $newDocumentPositionPostingReferenceAccountId
                );

                $newDocumentPositionDTO->addPostingReference(
                    new InvoiceSuiteIdDTO(
                        $newDocumentPositionPostingReferenceAccountId,
                        $newDocumentPositionPostingReferenceType
                    )
                );
            }

            // Position taxes

            while ($this->nextDocumentPositionTax()) {
                $this->getDocumentPositionTax(
                    $newDocumentPositionTaxCategory,
                    $newDocumentPositionTaxType,
                    $newDocumentPositionTaxAmount,
                    $newDocumentPositionTaxPercent,
                    $newDocumentPositionTaxExemptionReason,
                    $newDocumentPositionTaxExemptionReasonCode,
                );

                $newDocumentPositionDTO->addTax(
                    new InvoiceSuiteTaxDTO(
                        $newDocumentPositionTaxCategory,
                        $newDocumentPositionTaxType,
                        null,
                        $newDocumentPositionTaxAmount,
                        $newDocumentPositionTaxPercent,
                        $newDocumentPositionTaxExemptionReason,
                        $newDocumentPositionTaxExemptionReasonCode
                    )
                );
            }

            // Position allowances/charges

            while ($this->nextDocumentPositionAllowanceCharge()) {
                $this->getDocumentPositionAllowanceCharge(
                    $newDocumentPositionAllowanceChargeIsCharge,
                    $newDocumentPositionAllowanceChargeAmount,
                    $newDocumentPositionAllowanceChargeBaseAmount,
                    $newDocumentPositionAllowanceChargeReason,
                    $newDocumentPositionAllowanceChargeReasonCode,
                    $newDocumentPositionAllowanceChargePercent
                );

                $newDocumentPositionDTO->addAllowanceCharge(
                    new InvoiceSuiteAllowanceChargeDTO(
                        $newDocumentPositionAllowanceChargeIsCharge,
                        $newDocumentPositionAllowanceChargeAmount,
                        $newDocumentPositionAllowanceChargeBaseAmount,
                        $newDocumentPositionAllowanceChargePercent,
                        null,
                        null,
                        null,
                        $newDocumentPositionAllowanceChargeReason,
                        $newDocumentPositionAllowanceChargeReasonCode
                    )
                );
            }

            // Position summation

            if ($this->firstDocumentPositionSummation()) {
                $this->getDocumentPositionSummation(
                    $newDocumentPositionNetAmount,
                    $newDocumentPositionChargeTotalAmount,
                    $newDocumentPositionDiscountTotalAmount,
                    $newDocumentPositionTaxTotalAmount,
                    $newDocumentPositionGrossAmount
                );

                $newDocumentPositionDTO->setSummation(
                    new InvoiceSuitesummationLineDTO(
                        $newDocumentPositionNetAmount,
                        $newDocumentPositionChargeTotalAmount,
                        $newDocumentPositionDiscountTotalAmount,
                        $newDocumentPositionTaxTotalAmount,
                        $newDocumentPositionGrossAmount
                    )
                );
            }

            // Finally add the position

            $newDocumentDTO->addPosition($newDocumentPositionDTO);
        }

        // Finished

        $this->resetCurrentDocumentSubPointers();

        return $this;
    }

    #endregion

    #region Document Generals

    /**
     * Reset all document-header-level internal pointers
     *
     * @return void
     */
    protected function resetCurrentDocumentSubPointers(): void
    {
        InvoiceSuitePointerUtils::resetSingle('documentnote');
        InvoiceSuitePointerUtils::resetSingle('documentbillingperiod');
        InvoiceSuitePointerUtils::resetSingle('documentpostingreference');
        InvoiceSuitePointerUtils::resetSingle('documentsellerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentquotationreference');
        InvoiceSuitePointerUtils::resetSingle('documentcontractreference');
        InvoiceSuitePointerUtils::resetSingle('documentadditionalreference');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicereference');
        InvoiceSuitePointerUtils::resetSingle('documentprojectreference');
        InvoiceSuitePointerUtils::resetSingle('documentultimatecustomerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentdespatchadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentreceivingadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentdeliverynotereference');
        InvoiceSuitePointerUtils::resetSingle('documentsellerid');
        InvoiceSuitePointerUtils::resetSingle('documentsellerglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentsellertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentselleraddress');
        InvoiceSuitePointerUtils::resetSingle('documentsellerlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentsellercontact');
        InvoiceSuitePointerUtils::resetSingle('documentsellerecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentbuyertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentbuyeraddress');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentbuyercontact');
        InvoiceSuitePointerUtils::resetSingle('documentbuyerecommunication');
        InvoiceSuitePointerUtils::resetSingle('documenttaxrepresentativeid');
        InvoiceSuitePointerUtils::resetSingle('documenttaxrepresentativeglobalid');
        InvoiceSuitePointerUtils::resetSingle('documenttaxrepresentativetaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documenttaxrepresentativeaddress');
        InvoiceSuitePointerUtils::resetSingle('documenttaxrepresentativelegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documenttaxrepresentativecontact');
        InvoiceSuitePointerUtils::resetSingle('documenttaxrepresentativeecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserid');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentproductendusertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduseraddress');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentproductendusercontact');
        InvoiceSuitePointerUtils::resetSingle('documentproductenduserecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentultimateshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromid');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromtaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromaddress');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromcontact');
        InvoiceSuitePointerUtils::resetSingle('documentshipfromecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicertaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceraddress');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerlegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicercontact');
        InvoiceSuitePointerUtils::resetSingle('documentinvoicerecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceetaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeaddress');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceelegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceecontact');
        InvoiceSuitePointerUtils::resetSingle('documentinvoiceeecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpayeeid');
        InvoiceSuitePointerUtils::resetSingle('documentpayeeglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentpayeetaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentpayeeaddress');
        InvoiceSuitePointerUtils::resetSingle('documentpayeelegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentpayeecontact');
        InvoiceSuitePointerUtils::resetSingle('documentpayeecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpaymentmean');
        InvoiceSuitePointerUtils::resetSingle('documentcreditorreference');
        InvoiceSuitePointerUtils::resetSingle('documentpaymentterm');
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentdiscount');
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentpenalty');
        InvoiceSuitePointerUtils::resetSingle('documenttax');
        InvoiceSuitePointerUtils::resetSingle('documentallowancecharge');
        InvoiceSuitePointerUtils::resetSingle('documentlogservicecharge');
        InvoiceSuitePointerUtils::resetSingle('documentposition');

        $this->resetCurrentDocumentPositionSubPointers();
    }

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param string|null $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): self {
        $newDocumentNo = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param string|null $newDocumentType __BT-3, From MINIMUM__ The type of the document
     * @return static
     *
     * @phpstan-param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): self {
        $newDocumentType = $this->getCrossIndustryRootObject()->getExchangedDocument()?->getTypeCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param string|null $newDocumentDescription __BT-X-2, From EXTENDED__ The documenttype as free text
     * @return self
     *
     * @phpstan-param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): self {
        $newDocumentDescription = "";

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param string|null $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @return self
     *
     * @phpstan-param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): self {
        $newDocumentLanguage = "";

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate __BT-2, From MINIMUM__ Date of the document. The date when the document was issued by the seller
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): self {
        $newDocumentDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param DateTimeInterface|null $newCompleteDate __BT-X-6-000, From EXTENDED__ Contractual due date of the document
     * @return self
     *
     * @phpstan-param-out null $newCompleteDate
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): self {
        $newCompleteDate = null;

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param string|null $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentCurrency
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): self {
        $newDocumentCurrency = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceCurrencyCode()
            ?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency __BT-6, From BASIC WL__ Code for the tax currency
     * @return self
     *
     * @phpstan-param-out string $newDocumentTaxCurrency
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): self {
        $newDocumentTaxCurrency = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getTaxCurrencyCode()
            ?->getValue() ?? "";

        return $this;
    }

    /**
     * Gets the new status of the copy indicator
     *
     * @param boolean $newDocumentIsCopy __BT-X-1-00, From EXTENDED__ Indicates that the document is a copy
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsCopy
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy = null
    ): self {
        $newDocumentIsCopy = false;

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest __BT-X-3-00, From EXTENDED__ Indicates that the document is a test
     * @return self
     *
     * @phpstan-param-out boolean $newDocumentIsTest
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): self {
        $newDocumentIsTest = false;

        return $this;
    }

    /**
     * Go to the first document of the document
     *
     * @return bool
     */
    public function firstDocumentNote(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? []
            ),
            'documentnote'
        );
    }

    /**
     * Go to the next document of the document
     *
     * @return bool
     */
    public function nextDocumentNote(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? []
            ),
            'documentnote'
        );
    }

    /**
     * Get a note to the document.
     *
     * @param string|null $newContent __BT-22, From BASIC WL__ Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode __BT-X-5, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode __BT-21, From BASIC WL__ Qualification of the free text for the invoice
     * @return self
     *
     * @phpstan-param-out string $newContent
     * @phpstan-param-out string $newContentCode
     * @phpstan-param-out string $newSubjectCode
     */
    public function getDocumentNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\NoteType>
         */
        $documentNotes = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getExchangedDocument()?->getIncludedNote() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\NoteType
         */
        $documentNote = $documentNotes[InvoiceSuitePointerUtils::getValue('documentnote')];

        $newContent = $documentNote->getContent()?->getValue() ?? "";
        $newContentCode = "";
        $newSubjectCode = $documentNote->getSubjectCode()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return boolean
     */
    public function firstDocumentBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getBillingSpecifiedPeriod() ?? []
            ),
            'documentbillingperiod'
        );
    }

    /**
     * Go to the next billing period
     *
     * @return boolean
     */
    public function nextDocumentBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getBillingSpecifiedPeriod() ?? []
            ),
            'documentbillingperiod'
        );
    }

    /**
     * Get the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate __BT-73, From BASIC WL__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-74, From BASIC WL__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newStartDate
     * @phpstan-param-out DateTimeInterface|null $newEndDate
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\SpecifiedPeriodType>
         */
        $billingPeriods = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getBillingSpecifiedPeriod() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\SpecifiedPeriodType
         */
        $billingPeriod = $billingPeriods[InvoiceSuitePointerUtils::getValue('documentbillingperiod')];

        $newStartDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $billingPeriod->getStartDateTime()?->getDateTimeString()->getValue(),
            $billingPeriod->getStartDateTime()?->getDateTimeString()->getFormat(),
        );
        $newEndDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $billingPeriod->getEndDateTime()?->getDateTimeString()->getValue(),
            $billingPeriod->getEndDateTime()?->getDateTimeString()->getFormat(),
        );
        $newDescription = "";

        return $this;
    }

    /**
     * Go to the first posting reference
     *
     * @return boolean
     */
    public function firstDocumentPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getReceivableSpecifiedTradeAccountingAccount() ?? []
            ),
            'documentpostingreference'
        );
    }

    /**
     * Go to the next posting reference
     *
     * @return boolean
     */
    public function nextDocumentPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getReceivableSpecifiedTradeAccountingAccount() ?? []
            ),
            'documentpostingreference'
        );
    }

    /**
     * Get a posting reference
     *
     * @param string|null $newType __BT-X-290, From EXTENDED__ Type of the posting reference
     * @param string|null $newAccountId __BT-19, From BASIC WL__ Posting reference of the byuer
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newAccountId
     */
    public function getDocumentPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAccountingAccountType>
         */
        $documentPostingReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getReceivableSpecifiedTradeAccountingAccount() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAccountingAccountType
         */
        $documentPostingReference = $documentPostingReferences[InvoiceSuitePointerUtils::getValue('documentpostingreference')];

        $newType = "";
        $newAccountId = $documentPostingReference->getID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document References

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentSellerOrderReference(): bool
    {
        return false;
    }

    /**
     * Get the associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return boolean
     */
    public function firstDocumentBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerOrderReferencedDocument() ?? []
            ),
            'documentbuyerorderreference'
        );
    }

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return boolean
     */
    public function nextDocumentBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerOrderReferencedDocument() ?? []
            ),
            'documentbuyerorderreference'
        );
    }

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param string|null $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-147, From EXTENDED__ Buyer's order date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentBuyerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\ReferencedDocumentType>
         */
        $documentBuyerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerOrderReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\ReferencedDocumentType
         */
        $documentBuyerOrderReference = $documentBuyerOrderReferences[InvoiceSuitePointerUtils::getValue('documentbuyerorderreference')];

        $newReferenceNumber = $documentBuyerOrderReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentBuyerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentBuyerOrderReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Go to the first associated quotation
     *
     * @return boolean
     */
    public function firstDocumentQuotationReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated quotation
     *
     * @return boolean
     */
    public function nextDocumentQuotationReference(): bool
    {
        return false;
    }

    /**
     * Get the associated quotation
     *
     * @param string|null $newReferenceNumber __BT-X-403, From EXTENDED__ Quotation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-404, From EXTENDED__ Quotation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentQuotationReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated contract
     *
     * @return boolean
     */
    public function firstDocumentContractReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getContractReferencedDocument() ?? []
            ),
            'documentcontractreference'
        );
    }

    /**
     * Go to the next associated contract
     *
     * @return boolean
     */
    public function nextDocumentContractReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getContractReferencedDocument() ?? []
            ),
            'documentcontractreference'
        );
    }

    /**
     * Get the associated contract
     *
     * @param string $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Contract date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentContractReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType>
         */
        $documentContractReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getContractReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxextended\ram\ReferencedDocumentType
         */
        $documentContractReference = $documentContractReferences[InvoiceSuitePointerUtils::getValue('documentcontractreference')];

        $newReferenceNumber = $documentContractReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentContractReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentContractReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Go to the first additional associated document
     *
     * @return boolean
     */
    public function firstDocumentAdditionalReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional associated document
     *
     * @return boolean
     */
    public function nextDocumentAdditionalReference(): bool
    {
        return false;
    }

    /**
     * Get an additional associated document
     *
     * @param string|null $newReferenceNumber __BT-122, From EN 16931__ Additional document number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-149, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-122-0, From EN 16931__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param string|null $newDescription __BT-123, From EN 16931__ Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment Additional document attachment
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out null $newInvoiceSuiteAttachment
     */
    public function getDocumentAdditionalReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): self {
        $newReferenceNumber = "";
        $newReferenceDate = null;
        $newTypeCode = "";
        $newReferenceTypeCode = "";
        $newDescription = "";
        $newInvoiceSuiteAttachment = null;

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function firstDocumentInvoiceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceReferencedDocument() ?? []
            ),
            'documentinvoicereference'
        );
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return boolean
     */
    public function nextDocumentInvoiceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceReferencedDocument() ?? []
            ),
            'documentinvoicereference'
        );
    }

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-555, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-26, From BASIC WL__ Type code of previous invoice
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     */
    public function getDocumentInvoiceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\ReferencedDocumentType>
         */
        $documentInvoiceReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getInvoiceReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\ReferencedDocumentType
         */
        $documentInvoiceReference = $documentInvoiceReferences[InvoiceSuitePointerUtils::getValue('documentinvoicereference')];

        $newReferenceNumber = $documentInvoiceReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentInvoiceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentInvoiceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );
        $newTypeCode = "";

        return $this;
    }

    /**
     * Go to the first additional project reference
     *
     * @return boolean
     */
    public function firstDocumentProjectReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional project reference
     *
     * @return boolean
     */
    public function nextDocumentProjectReference(): bool
    {
        return false;
    }

    /**
     * Get an additional project reference
     *
     * @param string|null $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param string|null $newName __BT-11-0, From EN 16931__ Project name
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newName
     */
    public function getDocumentProjectReference(
        ?string &$newReferenceNumber,
        ?string &$newName
    ): self {
        $newReferenceNumber = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return boolean
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return boolean
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool
    {
        return false;
    }

    /**
     * Get an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber __BT-X-150, From EXTENDED__
     * @param DateTimeInterface|null $newReferenceDate __BT-X-151, From EXTENDED__
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference
     *
     * @return boolean
     */
    public function firstDocumentDespatchAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDespatchAdviceReferencedDocument() ?? []
            ),
            'documentdespatchadvicereference'
        );
    }

    /**
     * Go to the next additional despatch advice reference
     *
     * @return boolean
     */
    public function nextDocumentDespatchAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDespatchAdviceReferencedDocument() ?? []
            ),
            'documentdespatchadvicereference'
        );
    }

    /**
     * Get an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-200, From EXTENDED__ Shipping notification date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\ReferencedDocumentType>
         */
        $documentDespatchAdviceReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getDespatchAdviceReferencedDocument() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\ReferencedDocumentType
         */
        $documentDespatchAdviceReference = $documentDespatchAdviceReferences[InvoiceSuitePointerUtils::getValue('documentdespatchadvicereference')];

        $newReferenceNumber = $documentDespatchAdviceReference->getIssuerAssignedID()?->getValue() ?? "";
        $newReferenceDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentDespatchAdviceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getValue(),
            $documentDespatchAdviceReference->getFormattedIssueDateTime()?->getDateTimeString()?->getFormat()
        );

        return $this;
    }

    /**
     * Go to the first additional Receiving advice reference
     *
     * @return boolean
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional receiving advice reference
     *
     * @return boolean
     */
    public function nextDocumentReceivingAdviceReference(): bool
    {
        return false;
    }

    /**
     * Get an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber __BT-15, From BASIC WL__ Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-201, From EXTENDED__ Receipt notification date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return boolean
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return boolean
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Get an additional delivery note reference
     *
     * @param string|null $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-203, From EXTENDED__ Delivery slip date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Get the date of the delivery
     *
     * @param DateTimeInterface|null $newDate __BT-72, From BASIC WL__ Actual delivery date
     * @return self
     *
     * @phpstan-param-out DateTimeInterface|null $newDate
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self {
        $newDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getActualDeliverySupplyChainEvent()?->getOccurrenceDateTime()?->getDateTimeString()?->getValue(),
            $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getActualDeliverySupplyChainEvent()?->getOccurrenceDateTime()?->getDateTimeString()?->getFormat()
        );

        return $this;
    }

    /**
     * Get the identifier assigned by the buyer and used for internal routing
     *
     * @param string|null $newBuyerReference __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return self
     *
     * @phpstan-param-out string $newBuyerReference
     */
    public function getDocumentBuyerReference(
        ?string &$newBuyerReference
    ): self {
        $newBuyerReference = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerReference()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Seller/Supplier

    /**
     * Get the name of the seller/supplier party
     *
     * @param string|null $newName __BT-27, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getID() ?? []
            ),
            'documentsellerid'
        );
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getID() ?? []
            ),
            'documentsellerid'
        );
    }

    /**
     * Get the ID of the seller/supplier party
     *
     * @param string|null $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentSellerIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentSellerId = $documentSellerIds[InvoiceSuitePointerUtils::getValue('documentsellerid')];

        $newId = $documentSellerId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getGlobalID() ?? []
            ),
            'documentsellerglobalid'
        );
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getGlobalID() ?? []
            ),
            'documentsellerglobalid'
        );
    }

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param string|null $newGlobalId __BT-29-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentSellerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentSellerGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentSellerGlobalId = $documentSellerGlobalIds[InvoiceSuitePointerUtils::getValue('documentsellerglobalid')];

        $newGlobalId = $documentSellerGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentSellerGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentsellertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentsellertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-31/32, From MINIMUM/EN 16931__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentSellerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType>
         */
        $documentSellerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType
         */
        $documentSellerTaxRegistration = $documentSellerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentsellertaxregistration')];

        $newTaxRegistrationType = $documentSellerTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentSellerTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentselleraddress'
        );
    }

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentselleraddress'
        );
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param string|null $newAddressLine1 __BT-35, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-36, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-162, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-38, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-37, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-40, From MINIMUM__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-39, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentSellerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType>
         */
        $documentSellerAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType
         */
        $documentSellerAddress = $documentSellerAddresses[InvoiceSuitePointerUtils::getValue('documentselleraddress')];

        $newAddressLine1 = $documentSellerAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentSellerAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentSellerAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentSellerAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentSellerAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentSellerAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentSellerAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentsellerlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentsellerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param string|null $newType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-30, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType>
         */
        $documentSellerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType
         */
        $documentSellerLegalOrganisation = $documentSellerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentsellerlegalorganisation')];

        $newType = $documentSellerLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentSellerLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentSellerLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param string|null $newPersonName __BT-41, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-42, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-107, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-43, From EN 16931__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentSellerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the seller/supplier party
     *
     * @return boolean
     */
    public function firstDocumentSellerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentsellerecommunication'
        );
    }

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return boolean
     */
    public function nextDocumentSellerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentsellerecommunication'
        );
    }

    /**
     * Get communication information of the seller/supplier party
     *
     * @param string|null $newType __BT-34-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-34, From BASIC WL__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentSellerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType>
         */
        $documentSellerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType
         */
        $documentSellerElectronicCommunication = $documentSellerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentsellerecommunication')];

        $newType = $documentSellerElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentSellerElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Buyer/Customer

    /**
     * Get the name of the buyer/customer party
     *
     * @param string|null $newName __BT-44, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getID() ?? []
            ),
            'documentbuyerid'
        );
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getID() ?? []
            ),
            'documentbuyerid'
        );
    }

    /**
     * Get the ID of the buyer/customer party
     *
     * @param string|null $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentBuyerIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentBuyerId = $documentBuyerIds[InvoiceSuitePointerUtils::getValue('documentbuyerid')];

        $newId = $documentBuyerId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getGlobalID() ?? []
            ),
            'documentbuyerglobalid'
        );
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getGlobalID() ?? []
            ),
            'documentbuyerglobalid'
        );
    }

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId __BT-46-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentBuyerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentBuyerGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentBuyerGlobalId = $documentBuyerGlobalIds[InvoiceSuitePointerUtils::getValue('documentbuyerglobalid')];

        $newGlobalId = $documentBuyerGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentBuyerGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentbuyertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentbuyertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType __BT-48-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-48, From MINIMUM__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentBuyerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType>
         */
        $documentBuyerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType
         */
        $documentBuyerTaxRegistration = $documentBuyerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentbuyertaxregistration')];

        $newTaxRegistrationType = $documentBuyerTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentBuyerTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentbuyeraddress'
        );
    }

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentbuyeraddress'
        );
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param string|null $newAddressLine1 __BT-50, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-51, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-163, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-53, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-52, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-55, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-54, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentBuyerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType>
         */
        $documentBuyerAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType
         */
        $documentBuyerAddress = $documentBuyerAddresses[InvoiceSuitePointerUtils::getValue('documentbuyeraddress')];

        $newAddressLine1 = $documentBuyerAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentBuyerAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentBuyerAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentBuyerAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentBuyerAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentBuyerAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentBuyerAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentbuyerlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentbuyerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param string|null $newType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-47, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-45, From BASIC WL__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType>
         */
        $documentBuyerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType
         */
        $documentBuyerLegalOrganisation = $documentBuyerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentbuyerlegalorganisation')];

        $newType = $documentBuyerLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentBuyerLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentBuyerLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param string|null $newPersonName __BT-56, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-57, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-115, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-58, From EN 16931__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentBuyerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the buyer/customer party
     *
     * @return boolean
     */
    public function firstDocumentBuyerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentbuyerecommunication'
        );
    }

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return boolean
     */
    public function nextDocumentBuyerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentbuyerecommunication'
        );
    }

    /**
     * Get communication information of the buyer/customer party
     *
     * @param string|null $newType __BT-49-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-49, From BASIC WL__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentBuyerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType>
         */
        $documentBuyerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getBuyerTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType
         */
        $documentBuyerElectronicCommunication = $documentBuyerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentbuyerecommunication')];

        $newType = $documentBuyerElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentBuyerElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Tax Representativ party

    /**
     * Get the name of the tax representative party
     *
     * @param string|null $newName __BT-62, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getID() ?? []
            ),
            'documenttaxrepresentativeid'
        );
    }

    /**
     * Go to the next ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getID() ?? []
            ),
            'documenttaxrepresentativeid'
        );
    }

    /**
     * Get the ID of the tax representative party
     *
     * @param string|null $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentTaxRepresentativeIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentTaxRepresentativeId = $documentTaxRepresentativeIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeid')];

        $newId = $documentTaxRepresentativeId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getGlobalID() ?? []
            ),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Go to the next ID of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getGlobalID() ?? []
            ),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Get the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId __BT-X-117, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentTaxRepresentativeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentTaxRepresentativeGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentTaxRepresentativeGlobalId = $documentTaxRepresentativeGlobalIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeglobalid')];

        $newGlobalId = $documentTaxRepresentativeGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentTaxRepresentativeGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documenttaxrepresentativetaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documenttaxrepresentativetaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-63, From BASIC WL__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentTaxRepresentativeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType>
         */
        $documentTaxRepresentativeTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType
         */
        $documentTaxRepresentativeTaxRegistration = $documentTaxRepresentativeTaxRegistrations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativetaxregistration')];

        $newTaxRegistrationType = $documentTaxRepresentativeTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentTaxRepresentativeTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documenttaxrepresentativeaddress'
        );
    }

    /**
     * Go to the next address of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documenttaxrepresentativeaddress'
        );
    }

    /**
     * Set the address of the tax representative party
     *
     * @param string|null $newAddressLine1 __BT-64, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-65, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-164, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-67, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-66, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-69, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-68, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentTaxRepresentativeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType>
         */
        $documentTaxRepresentativeAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType
         */
        $documentTaxRepresentativeAddress = $documentTaxRepresentativeAddresses[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeaddress')];

        $newAddressLine1 = $documentTaxRepresentativeAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentTaxRepresentativeAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentTaxRepresentativeAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentTaxRepresentativeAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentTaxRepresentativeAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentTaxRepresentativeAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentTaxRepresentativeAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documenttaxrepresentativelegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documenttaxrepresentativelegalorganisation'
        );
    }

    /**
     * Get the legal information of the tax representative party
     *
     * @param string|null $newType __BT-, From __ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-, From __ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-, From __ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType>
         */
        $documentTaxRepresentativeLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType
         */
        $documentTaxRepresentativeLegalOrganisation = $documentTaxRepresentativeLegalOrganisations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativelegalorganisation')];

        $newType = $documentTaxRepresentativeLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentTaxRepresentativeLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentTaxRepresentativeLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the tax representative party
     *
     * @param string|null $newPersonName __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-122, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-123, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-124, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentTaxRepresentativeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the tax representative party
     *
     * @return boolean
     */
    public function firstDocumentTaxRepresentativeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documenttaxrepresentativeecommunication'
        );
    }

    /**
     * Go to the next communication information of the tax representative party
     *
     * @return boolean
     */
    public function nextDocumentTaxRepresentativeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documenttaxrepresentativeecommunication'
        );
    }

    /**
     * Get communication information of the tax representative party
     *
     * @param string|null $newType __BT-X-125-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-125, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentTaxRepresentativeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType>
         */
        $documentTaxRepresentativeElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeAgreement()?->getSellerTaxRepresentativeTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType
         */
        $documentTaxRepresentativeElectronicCommunication = $documentTaxRepresentativeElectronicCommunications[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeecommunication')];

        $newType = $documentTaxRepresentativeElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentTaxRepresentativeElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Product Enduser

    /**
     * Get the name of the product end-user party
     *
     * @param string|null $newName __BT-X-128, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the product end-user party
     *
     * @param string|null $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId __BT-X-127, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-, From __ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the product end-user party
     *
     * @param string|null $newAddressLine1 __BT-X-397, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-398, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-399, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-396, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-400, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-401, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-402, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentProductEndUserAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the product end-user party
     *
     * @param string|null $newType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the product end-user party
     *
     * @param string|null $newPersonName __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-133, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-134, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-135, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentProductEndUserContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return boolean
     */
    public function firstDocumentProductEndUserCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return boolean
     */
    public function nextDocumentProductEndUserCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the product end-user party
     *
     * @param string|null $newType __BT-X-143-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-143, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Ship-To

    /**
     * Get the name of the Ship-To party
     *
     * @param string|null $newName __BT-70, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getID() ?? []
            ),
            'documentshiptoid'
        );
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getID() ?? []
            ),
            'documentshiptoid'
        );
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param string|null $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentShipToIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentShipToId = $documentShipToIds[InvoiceSuitePointerUtils::getValue('documentshiptoid')];

        $newId = $documentShipToId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getGlobalID() ?? []
            ),
            'documentshiptoglobalid'
        );
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getGlobalID() ?? []
            ),
            'documentshiptoglobalid'
        );
    }

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId __BT-71-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentShipToGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentShipToGlobalId = $documentShipToGlobalIds[InvoiceSuitePointerUtils::getValue('documentshiptoglobalid')];

        $newGlobalId = $documentShipToGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentShipToGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentshiptotaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentshiptotaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-161, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType>
         */
        $documentShipToTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType
         */
        $documentShipToTaxRegistration = $documentShipToTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentshiptotaxregistration')];

        $newTaxRegistrationType = $documentShipToTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentShipToTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentshiptoaddress'
        );
    }

    /**
     * Go to the next address of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentshiptoaddress'
        );
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param string|null $newAddressLine1 __BT-75, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-76, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-165, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-78, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-77, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-80, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-79, From BASIC WL__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType>
         */
        $documentShipToAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType
         */
        $documentShipToAddress = $documentShipToAddresses[InvoiceSuitePointerUtils::getValue('documentshiptoaddress')];

        $newAddressLine1 = $documentShipToAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentShipToAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentShipToAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentShipToAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentShipToAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentShipToAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentShipToAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentshiptolegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentshiptolegalorganisation'
        );
    }

    /**
     * Get the legal information of the Ship-To party
     *
     * @param string|null $newType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType>
         */
        $documentShipToLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType
         */
        $documentShipToLegalOrganisation = $documentShipToLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentshiptolegalorganisation')];

        $newType = $documentShipToLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentShipToLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentShipToLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-To party
     *
     * @param string|null $newPersonName __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-157, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-158, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-159, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentShipToCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentshiptoecommunication'
        );
    }

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentShipToCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentshiptoecommunication'
        );
    }

    /**
     * Get communication information of the Ship-To party
     *
     * @param string|null $newType __BT-X-160, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-160-0, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType>
         */
        $documentShipToElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeDelivery()?->getShipToTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType
         */
        $documentShipToElectronicCommunication = $documentShipToElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentshiptoecommunication')];

        $newType = $documentShipToElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentShipToElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Ultimate Ship-To

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param string|null $newName __BT-X-164, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param string|null $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-163, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-180, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 __BT-X-173, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-174, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-175, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-172, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-176, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-177, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-178, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-169, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-170, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-171, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-83, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-83-0, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Ship-From

    /**
     * Get the name of the Ship-From party
     *
     * @param string|null $newName __BT-X-183, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Ship-From party
     *
     * @param string|null $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId __BT-X-182, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-199, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param string|null $newAddressLine1 __BT-X-192, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-193, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-194, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-191, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-195, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-196, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-197, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentShipFromAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Ship-From party
     *
     * @param string|null $newType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-From party
     *
     * @param string|null $newPersonName __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-188, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-189, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-190, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentShipFromContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return boolean
     */
    public function firstDocumentShipFromCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return boolean
     */
    public function nextDocumentShipFromCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Ship-From party
     *
     * @param string|null $newType __BT-X-199, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-199-0, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Invoicer

    /**
     * Get the name of the Invoicer party
     *
     * @param string|null $newName __BT-X-207, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Invoicer party
     *
     * @param string|null $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId __BT-X-206, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-223, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param string|null $newAddressLine1 __BT-X-216, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-217, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-218, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-215, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-219, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-220, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-221, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentInvoicerAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Invoicer party
     *
     * @param string|null $newType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Invoicer party
     *
     * @param string|null $newPersonName __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-212, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-213, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-214, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentInvoicerContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return boolean
     */
    public function firstDocumentInvoicerCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return boolean
     */
    public function nextDocumentInvoicerCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Invoicer party
     *
     * @param string|null $newType __BT-X-222-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-222, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Invoicee

    /**
     * Get the name of the Invoicee party
     *
     * @param string|null $newName __BT-X-226, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Invoicee party
     *
     * @param string|null $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId __BT-X-225, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-242, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeAddress(): bool
    {
        return false;
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param string|null $newAddressLine1 __BT-X-235, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-236, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-237, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-234, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-238, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-239, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-240, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentInvoiceeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Invoicee party
     *
     * @param string|null $newType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Invoicee party
     *
     * @param string|null $newPersonName __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-231, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-232, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-233, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentInvoiceeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return boolean
     */
    public function firstDocumentInvoiceeCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return boolean
     */
    public function nextDocumentInvoiceeCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Invoicee party
     *
     * @param string|null $newType __BT-X-241-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-241, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    #endregion

    #region Document Payee

    /**
     * Get the name of the Payee party
     *
     * @param string|null $newName __BT-59, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPayeeName(
        ?string &$newName
    ): self {
        $newName = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getID() ?? []
            ),
            'documentpayeeid'
        );
    }

    /**
     * Go to the next ID of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getID() ?? []
            ),
            'documentpayeeid'
        );
    }

    /**
     * Get the ID of the Payee party
     *
     * @param string|null $newId __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPayeeId(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentPayeeIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentPayeeId = $documentPayeeIds[InvoiceSuitePointerUtils::getValue('documentpayeeid')];

        $newId = $documentPayeeId->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first ID of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getGlobalID() ?? []
            ),
            'documentpayeeglobalid'
        );
    }

    /**
     * Go to the next ID of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getGlobalID() ?? []
            ),
            'documentpayeeglobalid'
        );
    }

    /**
     * Get the Global ID of the Payee party
     *
     * @param string|null $newGlobalId __BT-60-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-60-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPayeeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentPayeeGlobalIds = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getGlobalID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentPayeeGlobalId = $documentPayeeGlobalIds[InvoiceSuitePointerUtils::getValue('documentpayeeglobalid')];

        $newGlobalId = $documentPayeeGlobalId->getValue() ?? "";
        $newGlobalIdType = $documentPayeeGlobalId->getSchemeID() ?? "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentpayeetaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getSpecifiedTaxRegistration() ?? []
            ),
            'documentpayeetaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Payee party
     *
     * @param string|null $newTaxRegistrationType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-257, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPayeeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType>
         */
        $documentPayeeTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getSpecifiedTaxRegistration() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TaxRegistrationType
         */
        $documentPayeeTaxRegistration = $documentPayeeTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentpayeetaxregistration')];

        $newTaxRegistrationType = $documentPayeeTaxRegistration->getID()?->getSchemeID() ?? "";
        $newTaxRegistrationId = $documentPayeeTaxRegistration->getID()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first address of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentpayeeaddress'
        );
    }

    /**
     * Go to the next address of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getPostalTradeAddress() ?? []
            ),
            'documentpayeeaddress'
        );
    }

    /**
     * Get the address of the Payee party
     *
     * @param string|null $newAddressLine1 __BT-X-250, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-251, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-252, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-249, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-253, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-254, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-255, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentPayeeAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType>
         */
        $documentPayeeAddresses = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getPostalTradeAddress() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAddressType
         */
        $documentPayeeAddress = $documentPayeeAddresses[InvoiceSuitePointerUtils::getValue('documentpayeeaddress')];

        $newAddressLine1 = $documentPayeeAddress->getLineOne()?->getValue() ?? "";
        $newAddressLine2 = $documentPayeeAddress->getLineTwo()?->getValue() ?? "";
        $newAddressLine3 = $documentPayeeAddress->getLineThree()?->getValue() ?? "";
        $newPostcode = $documentPayeeAddress->getPostcodeCode()?->getValue() ?? "";
        $newCity = $documentPayeeAddress->getCityName()?->getValue() ?? "";
        $newCountryId = $documentPayeeAddress->getCountryID()?->getValue() ?? "";
        $newSubDivision = $documentPayeeAddress->getCountrySubDivisionName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentpayeelegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getSpecifiedLegalOrganization() ?? []
            ),
            'documentpayeelegalorganisation'
        );
    }

    /**
     * Get the legal information of the Payee party
     *
     * @param string|null $newType __BT-61-1, From BASIC WL__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-61, From BASIC WL__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-243, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPayeeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType>
         */
        $documentPayeeLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getSpecifiedLegalOrganization() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\LegalOrganizationType
         */
        $documentPayeeLegalOrganisation = $documentPayeeLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentpayeelegalorganisation')];

        $newType = $documentPayeeLegalOrganisation->getID()?->getSchemeID() ?? "";
        $newId = $documentPayeeLegalOrganisation->getID()?->getValue() ?? "";
        $newName = $documentPayeeLegalOrganisation->getTradingBusinessName()?->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first contact information of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Payee party
     *
     * @param string|null $newPersonName __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-246, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-247, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-248, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentPayeeContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Payee party
     *
     * @return boolean
     */
    public function firstDocumentPayeeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentpayeecommunication'
        );
    }

    /**
     * Go to the next communication information of the Payee party
     *
     * @return boolean
     */
    public function nextDocumentPayeeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getURIUniversalCommunication() ?? []
            ),
            'documentpayeecommunication'
        );
    }

    /**
     * Get communication information of the Payee party
     *
     * @param string|null $newType __BT-X-256-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-256, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPayeeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType>
         */
        $documentPayeeElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPayeeTradeParty()?->getURIUniversalCommunication() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\UniversalCommunicationType
         */
        $documentPayeeElectronicCommunication = $documentPayeeElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentpayeecommunication')];

        $newType = $documentPayeeElectronicCommunication->getURIID()?->getSchemeID() ?? "";
        $newUri = $documentPayeeElectronicCommunication->getURIID()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Payment

    /**
     * Go to the first Payment mean
     *
     * @return boolean
     */
    public function firstDocumentPaymentMean(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradeSettlementPaymentMeans() ?? []
            ),
            'documentpaymentmean'
        );
    }

    /**
     * Go to the next Payment mean
     *
     * @return boolean
     */
    public function nextDocumentPaymentMean(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradeSettlementPaymentMeans() ?? []
            ),
            'documentpaymentmean'
        );
    }

    /**
     * Get Payment mean
     *
     * @param string|null $newTypeCode __BT-81, From BASIC WL__ Expected or used means of payment expressed as a code
     * @param string|null $newName __BT-82, From EN 16931__ Expected or used means of payment expressed in text form
     * @param string|null $newFinancialCardId __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     *
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newName
     * @phpstan-param-out string $newFinancialCardId
     * @phpstan-param-out string $newFinancialCardHolder
     * @phpstan-param-out string $newBuyerIban
     * @phpstan-param-out string $newPayeeIban
     * @phpstan-param-out string $newPayeeAccountName
     * @phpstan-param-out string $newPayeeProprietaryId
     * @phpstan-param-out string $newPayeeBic
     * @phpstan-param-out string $newPaymentReference
     * @phpstan-param-out string $newMandate
     */
    public function getDocumentPaymentMean(
        ?string &$newTypeCode,
        ?string &$newName,
        ?string &$newFinancialCardId,
        ?string &$newFinancialCardHolder,
        ?string &$newBuyerIban,
        ?string &$newPayeeIban,
        ?string &$newPayeeAccountName,
        ?string &$newPayeeProprietaryId,
        ?string &$newPayeeBic,
        ?string &$newPaymentReference,
        ?string &$newMandate
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeSettlementPaymentMeansType>
         */
        $documentPaymentMeans = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradeSettlementPaymentMeans() ?? [];

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeSettlementPaymentMeansType
         */
        $documentPaymentMean = $documentPaymentMeans[InvoiceSuitePointerUtils::getValue('documentpaymentmean')];

        $newTypeCode = $documentPaymentMean->getTypeCode()?->getValue() ?? "";
        $newName = "";
        $newFinancialCardId = "";
        $newFinancialCardHolder = "";
        $newBuyerIban = $documentPaymentMean->getPayerPartyDebtorFinancialAccount()?->getIBANID()?->getValue() ?? "";
        $newPayeeIban = $documentPaymentMean->getPayeePartyCreditorFinancialAccount()?->getIBANID()?->getValue() ?? "";
        $newPayeeAccountName = "";
        $newPayeeProprietaryId = $documentPaymentMean->getPayeePartyCreditorFinancialAccount()?->getProprietaryID()?->getValue() ?? "";
        $newPayeeBic = "";
        $newPaymentReference = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getPaymentReference()?->getValue() ?? "";

        $paymentTerms = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradePaymentTerms() ?? []);
        $paymentTerms = array_filter($paymentTerms, fn(TradePaymentTermsType $paymentTerm) => ($paymentTerm->getDirectDebitMandateID()?->getValue() ?? "") !== "");

        $paymentTerm = reset($paymentTerms);

        $newMandate = $paymentTerm !== false ? ($paymentTerm->getDirectDebitMandateID()?->getValue() ?? "") : "";

        return $this;
    }

    /**
     * Go to the first Unique bank details of the payee or the seller
     *
     * @return boolean
     */
    public function firstDocumentPaymentCreditorReferenceID(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getCreditorReferenceID() ?? []
            ),
            'documentcreditorreference'
        );
    }

    /**
     * Go to the next Unique bank details of the payee or the seller
     *
     * @return boolean
     */
    public function nextDocumentPaymentCreditorReferenceID(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getCreditorReferenceID() ?? []
            ),
            'documentcreditorreference'
        );
    }

    /**
     * Get Unique bank details of the payee or the seller
     *
     * @param string|null $newId __BT-90, From BASIC WL__ Creditor identifier
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPaymentCreditorReferenceID(
        ?string &$newId
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType>
         */
        $documentCreditorReferences = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getCreditorReferenceID() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\udt\IDType
         */
        $documentCreditorReference = $documentCreditorReferences[InvoiceSuitePointerUtils::getValue('documentcreditorreference')];

        $newId = $documentCreditorReference->getValue() ?? "";

        return $this;
    }

    /**
     * Go to the first payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentTerm(): bool
    {
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentdiscount');
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentpenalty');

        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradePaymentTerms() ?? []
            ),
            'documentpaymentterm'
        );
    }

    /**
     * Go to the next payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentTerm(): bool
    {
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentdiscount');
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentpenalty');

        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradePaymentTerms() ?? []
            ),
            'documentpaymentterm'
        );
    }

    /**
     * Get payment term
     *
     * @param string|null $newDescription __BT-20, From _BASIC WL__ Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate __BT-9, From BASIC WL__ Date by which payment is due
     * @return self
     *
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentPaymentTerm(
        ?string &$newDescription,
        ?DateTimeInterface &$newDueDate
    ): self {
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentdiscount');
        InvoiceSuitePointerUtils::resetSingle('documentpaymenttermpaymentpenalty');

        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradePaymentTermsType>
         */
        $documentPaymentTerms = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradePaymentTerms() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradePaymentTermsType
         */
        $documentPaymentTerm = $documentPaymentTerms[InvoiceSuitePointerUtils::getValue('documentpaymentterm')];

        $newDescription = $documentPaymentTerm->getDescription()?->getValue() ?? "";
        $newDueDate = InvoiceSuiteDateTimeUtils::convertZfFxDateStringToDateTime(
            $documentPaymentTerm->getDueDateDateTime()?->getDateTimeString()?->getValue() ?? "",
            $documentPaymentTerm->getDueDateDateTime()?->getDateTimeString()?->getFormat() ?? "",
        );

        return $this;
    }

    /**
     * Go to the first payment discount term in latest resolved payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Go to the last payment discount term in latest resolved payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Get payment discount terms in latest resolved payment terms
     *
     * @param float|null $newBaseAmount __BT-X-285, From EXTENDED__ Base amount of the payment discount
     * @param float|null $newDiscountAmount __BT-X-287, From EXTENDED__ Amount of the payment discount
     * @param float|null $newDiscountPercent __BT-X-286, From EXTENDED__ Percentage of the payment discount
     * @param null $newBaseDate __BT-X-282, From EXTENDED__ Due date reference date
     * @param float|null $newBasePeriod __BT-X-283, From EXTENDED__ Maturity period (basis)
     * @param string|null $newBasePeriodUnit __BT-X-284, From EXTENDED__ Maturity period (unit)
     * @return self
     *
     * @phpstan-param-out float $newBaseAmount
     * @phpstan-param-out float $newDiscountAmount
     * @phpstan-param-out float $newDiscountPercent
     * @phpstan-param-out null $newBaseDate
     * @phpstan-param-out float $newBasePeriod
     * @phpstan-param-out string $newBasePeriodUnit
     */
    public function getDocumentPaymentDiscountTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newDiscountAmount,
        ?float &$newDiscountPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): self {
        $newBaseAmount = 0.0;
        $newDiscountAmount = 0.0;
        $newDiscountPercent = 0.0;
        $newBaseDate = null;
        $newBasePeriod = 0.0;
        $newBasePeriodUnit = "";

        return $this;
    }

    /**
     * Go to the first payment penalty term in latest resolved payment term
     *
     * @return boolean
     */
    public function firstDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Go to the last payment penalty term in latest resolved payment term
     *
     * @return boolean
     */
    public function nextDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Get payment penalty terms in latest resolved payment terms
     *
     * @param float|null $newBaseAmount __BT-X-285, From EXTENDED__ Base amount of the payment penalty
     * @param float|null $newPenaltyAmount __BT-X-287, From EXTENDED__ Amount of the payment penalty
     * @param float|null $newPenaltyPercent __BT-X-286, From EXTENDED__ Percentage of the payment penalty
     * @param null $newBaseDate __BT-X-282, From EXTENDED__ Due date reference date
     * @param float|null $newBasePeriod __BT-X-283, From EXTENDED__ Maturity period (basis)
     * @param string|null $newBasePeriodUnit __BT-X-284, From EXTENDED__ Maturity period (unit)
     * @return self
     *
     * @phpstan-param-out float $newBaseAmount
     * @phpstan-param-out float $newPenaltyAmount
     * @phpstan-param-out float $newPenaltyPercent
     * @phpstan-param-out null $newBaseDate
     * @phpstan-param-out float $newBasePeriod
     * @phpstan-param-out string $newBasePeriodUnit
     */
    public function getDocumentPaymentPenaltyTermsInLastPaymentTerm(
        ?float &$newBaseAmount,
        ?float &$newPenaltyAmount,
        ?float &$newPenaltyPercent,
        ?DateTimeInterface &$newBaseDate,
        ?float &$newBasePeriod,
        ?string &$newBasePeriodUnit
    ): self {
        $newBaseAmount = 0.0;
        $newPenaltyAmount = 0.0;
        $newPenaltyPercent = 0.0;
        $newBaseDate = null;
        $newBasePeriod = 0.0;
        $newBasePeriodUnit = "";

        return $this;
    }

    #endregion

    #region Document Tax

    /**
     * Go to the first Document Tax Breakdown
     *
     * @return boolean
     */
    public function firstDocumentTax(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getApplicableTradeTax() ?? []
            ),
            'documenttax'
        );
    }

    /**
     * Go to the next Document Tax Breakdown
     *
     * @return boolean
     */
    public function nextDocumentTax(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getApplicableTradeTax() ?? []
            ),
            'documenttax'
        );
    }

    /**
     * Get Document Tax Breakdown
     *
     * @param string|null $newTaxCategory __BT-118, From BASIC WL__ Coded description of the tax category
     * @param string|null $newTaxType __BT-118-0, From BASIC WL__ Coded description of the tax type
     * @param float|null $newBasisAmount __BT-116, From BASIC WL__ Tax base amount
     * @param float|null $newTaxAmount __BT-117, From BASIC WL__ Tax total amount
     * @param float|null $newTaxPercent __BT-119, From BASIC WL__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-120, From BASIC WL__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-121, From BASIC WL__ Reason for tax exemption (Code)
     * @param DateTimeInterface|null $newTaxDueDate __BT-7-00, From EN 16931__ Date on which tax is due
     * @param string|null $newTaxDueCode __BT-8, From BASIC WL__ Code for the date on which tax is due
     * @return self
     *
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newBasisAmount
     * @phpstan-param-out float $newTaxAmount
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newExemptionReason
     * @phpstan-param-out string $newExemptionReasonCode
     * @phpstan-param-out null $newTaxDueDate
     * @phpstan-param-out string $newTaxDueCode
     */
    public function getDocumentTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newBasisAmount,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
        ?DateTimeInterface &$newTaxDueDate,
        ?string &$newTaxDueCode
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeTaxType>
         */
        $documentTaxes = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getApplicableTradeTax() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeTaxType
         */
        $documentTax = $documentTaxes[InvoiceSuitePointerUtils::getValue('documenttax')];

        $newTaxCategory = $documentTax->getCategoryCode()?->getValue() ?? "";
        $newTaxType = $documentTax->getTypeCode()?->getValue() ?? "";
        $newBasisAmount = $documentTax->getBasisAmount()?->getValue() ?? 0.0;
        $newTaxAmount = $documentTax->getCalculatedAmount()?->getValue() ?? 0.0;
        $newTaxPercent = $documentTax->getRateApplicablePercent()?->getValue() ?? 0.0;
        $newExemptionReason = $documentTax->getExemptionReason()?->getValue() ?? "";
        $newExemptionReasonCode = $documentTax->getExemptionReasonCode()?->getValue() ?? "";
        $newTaxDueDate = null;
        $newTaxDueCode = $documentTax->getDueDateTypeCode()?->getValue() ?? "";

        return $this;
    }

    #endregion

    #region Document Allowances/Charges

    /**
     * Go to the first Document Allowance/Charge
     *
     * @return boolean
     */
    public function firstDocumentAllowanceCharge(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradeAllowanceCharge() ?? []
            ),
            'documentallowancecharge'
        );
    }

    /**
     * Go to the next Document Allowance/Charge
     *
     * @return boolean
     */
    public function nextDocumentAllowanceCharge(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradeAllowanceCharge() ?? []
            ),
            'documentallowancecharge'
        );
    }

    /**
     * Get Document Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator __BT-20-1/BT-21-1, From BASIC WL__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount __BT-92/BT-99, From BASIC WL__ Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount __BT-93/BT-100, From BASIC WL__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newTaxCategory __BT-95/BT-102, From BASIC WL__ Coded description of the tax category
     * @param string|null $newTaxType __BT-95-0/BT-102-0, From BASIC WL__ Coded description of the tax type
     * @param float|null $newTaxPercent __BT-96/BT-103, From BASIC WL__ Tax Rate (Percentage)
     * @param string|null $newAllowanceChargeReason __BT-98/BT-105, From BASIC WL__ Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode __BT-97/BT-104, From BASIC WL__ Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent __BT-94/BT-101, From BASIC WL__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     *
     * @phpstan-param-out bool $newChargeIndicator
     * @phpstan-param-out float $newAllowanceChargeAmount
     * @phpstan-param-out float $newAllowanceChargeBaseAmount
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newAllowanceChargeReason
     * @phpstan-param-out string $newAllowanceChargeReasonCode
     * @phpstan-param-out float $newAllowanceChargePercent
     */
    public function getDocumentAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): self {
        /**
         * @var array<\horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAllowanceChargeType>
         */
        $documentAllowanceCharges = InvoiceSuiteArrayUtils::ensure($this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradeAllowanceCharge() ?? []);

        /**
         * @var \horstoeko\invoicesuite\documentmodels\zffxbasicwl\ram\TradeAllowanceChargeType
         */
        $documentAllowanceCharge = $documentAllowanceCharges[InvoiceSuitePointerUtils::getValue('documentallowancecharge')];

        $newChargeIndicator = $documentAllowanceCharge->getChargeIndicator()?->getIndicator() ?? false;
        $newAllowanceChargeAmount = $documentAllowanceCharge->getActualAmount()?->getValue() ?? 0.0;
        $newAllowanceChargeBaseAmount = $documentAllowanceCharge->getBasisAmount()?->getValue() ?? 0.0;
        $newTaxCategory = $documentAllowanceCharge->getCategoryTradeTax()?->getCategoryCode()?->getValue() ?? "";
        $newTaxType = $documentAllowanceCharge->getCategoryTradeTax()?->getTypeCode()?->getValue() ?? "";
        $newTaxPercent = $documentAllowanceCharge->getCategoryTradeTax()?->getRateApplicablePercent()?->getValue() ?? 0.0;
        $newAllowanceChargeReason = $documentAllowanceCharge->getReason()?->getValue() ?? "";
        $newAllowanceChargeReasonCode = $documentAllowanceCharge->getReasonCode()?->getValue() ?? "";
        $newAllowanceChargePercent = $documentAllowanceCharge->getCalculationPercent()?->getValue() ?? 0.0;

        return $this;
    }

    /**
     * Go to the first Document Logistic Service Charge
     *
     * @return boolean
     */
    public function firstDocumentLogisticServiceCharge(): bool
    {
        return false;
    }

    /**
     * Go to the next Document Logistic Service Charge
     *
     * @return boolean
     */
    public function nextDocumentLogisticServiceCharge(): bool
    {
        return false;
    }

    /**
     * Get Document Logistic Service Charge
     *
     * @param float|null $newChargeAmount Amount of the service fee
     * @param string|null $newDescription Identification of the service fee
     * @param string|null $newTaxCategory Coded description of the tax category
     * @param string|null $newTaxType Coded description of the tax type
     * @param float|null $newTaxPercent Tax Rate (Percentage)
     * @return self
     *
     * @phpstan-param-out float $newChargeAmount
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxPercent
     */
    public function getDocumentLogisticServiceCharge(
        ?float &$newChargeAmount,
        ?string &$newDescription,
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxPercent
    ): self {
        $newChargeAmount = 0.0;
        $newDescription = "";
        $newTaxCategory = "";
        $newTaxType = "";
        $newTaxPercent = 0.0;

        return $this;
    }

    #endregion

    #region Document Amounts

    /**
     * Get the document summation
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
     *
     * @phpstan-param-out float $newNetAmount
     * @phpstan-param-out float $newChargeTotalAmount
     * @phpstan-param-out float $newDiscountTotalAmount
     * @phpstan-param-out float $newTaxBasisAmount
     * @phpstan-param-out float $newTaxTotalAmount
     * @phpstan-param-out float $newTaxTotalAmount2
     * @phpstan-param-out float $newGrossAmount
     * @phpstan-param-out float $newDueAmount
     * @phpstan-param-out float $newPrepaidAmount
     * @phpstan-param-out float $newRoungingAmount
     */
    public function getDocumentSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxBasisAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newTaxTotalAmount2,
        ?float &$newGrossAmount,
        ?float &$newDueAmount,
        ?float &$newPrepaidAmount,
        ?float &$newRoungingAmount
    ): self {
        $documentSummation = $this->getCrossIndustryRootObject()->getSupplyChainTradeTransaction()?->getApplicableHeaderTradeSettlement()?->getSpecifiedTradeSettlementHeaderMonetarySummation();

        $taxTotalAmounts = $documentSummation?->getTaxTotalAmount() ?? [];
        $taxTotalAmount = reset($taxTotalAmounts);
        $taxTotalAmount2 = next($taxTotalAmounts);

        $newNetAmount = $documentSummation?->getLineTotalAmount()?->getValue() ?? 0.0;
        $newChargeTotalAmount = $documentSummation?->getChargeTotalAmount()?->getValue() ?? 0.0;
        $newDiscountTotalAmount = $documentSummation?->getAllowanceTotalAmount()?->getValue() ?? 0.0;
        $newTaxBasisAmount = $documentSummation?->getTaxBasisTotalAmount()?->getValue() ?? 0.0;
        $newTaxTotalAmount = $taxTotalAmount !== false ? ($taxTotalAmount->getValue() ?? 0.0) : 0.0;
        $newTaxTotalAmount2 = $taxTotalAmount2 !== false ? ($taxTotalAmount2->getValue() ?? 0.0) : 0.0;
        $newGrossAmount = $documentSummation?->getGrandTotalAmount()?->getValue() ?? 0.0;
        $newDueAmount = $documentSummation?->getDuePayableAmount()?->getValue() ?? 0.0;
        $newPrepaidAmount = $documentSummation?->getTotalPrepaidAmount()?->getValue() ?? 0.0;
        $newRoungingAmount = 0.0;

        return $this;
    }

    #endregion

    #region Document Positions

    /**
     * Go to the first document position
     *
     * @return boolean
     */
    public function firstDocumentPosition(): bool
    {
        $this->resetCurrentDocumentPositionSubPointers();

        return false;
    }

    /**
     * Go to the next document position
     *
     * @return boolean
     */
    public function nextDocumentPosition(): bool
    {
        $this->resetCurrentDocumentPositionSubPointers();

        return false;
    }

    /**
     * Resets the sub-pointers releated to the currently seeked position
     *
     * @return void
     */
    protected function resetCurrentDocumentPositionSubPointers(): void
    {
        InvoiceSuitePointerUtils::resetSingle('documentpositionnote');
        InvoiceSuitePointerUtils::resetSingle('documentpositionproductcharacteristic');
        InvoiceSuitePointerUtils::resetSingle('documentpositionproductclassification');
        InvoiceSuitePointerUtils::resetSingle('documentpositionproductreferencedproduct');
        InvoiceSuitePointerUtils::resetSingle('documentpositionsellerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionbuyerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionquotationreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositioncontractreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionadditionalreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimatecustomerorderreference');
        InvoiceSuitePointerUtils::resetSingle('documentpositiondespatchadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositionreceivingadvicereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositiondeliverynotereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositioninvoicereference');
        InvoiceSuitePointerUtils::resetSingle('documentpositiongrosspriceallowancecharge');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentpositionshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoglobalid');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptotaxregistration');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoaddress');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptolegalorganisation');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptocontact');
        InvoiceSuitePointerUtils::resetSingle('documentpositionultimateshiptoecommunication');
        InvoiceSuitePointerUtils::resetSingle('documentpositionbillingperiod');
        InvoiceSuitePointerUtils::resetSingle('documentpositiontax');
        InvoiceSuitePointerUtils::resetSingle('documentpositionallowancecharge');
        InvoiceSuitePointerUtils::resetSingle('documentpositionpostingreference');
    }

    /**
     * Get position general information
     *
     * @param string|null $newPositionId __BT-126, From BASIC__ Identification of the position
     * @param string|null $newParentPositionId __BT-X-304, From EXTENDED__ Identification of the parent position
     * @param string|null $newLineStatusCode __BT-X-7, From EXTENDED__ Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param string|null $newLineStatusReasonCode __BT-X-8, From EXTENDED__ Type to specify whether the invoice line is
     * @return self
     *
     * @phpstan-param-out string $newPositionId
     * @phpstan-param-out string $newParentPositionId
     * @phpstan-param-out string $newLineStatusCode
     * @phpstan-param-out string $newLineStatusReasonCode
     */
    public function getDocumentPosition(
        ?string &$newPositionId,
        ?string &$newParentPositionId,
        ?string &$newLineStatusCode,
        ?string &$newLineStatusReasonCode
    ): self {
        $newPositionId = "";
        $newParentPositionId = "";
        $newLineStatusCode = "";
        $newLineStatusReasonCode = "";

        return $this;
    }

    /**
     * Go to the first text information of the latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionNote(): bool
    {
        return false;
    }

    /**
     * Go to the next text information of the latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionNote(): bool
    {
        return false;
    }

    /**
     * Get text information from latest position
     *
     * @param string|null $newContent __BT-127, From BASIC__ Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode __BT-X-9, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode __BT-X-10, From EXTENDED__ Code for qualifying the free text for the invoice item
     * @return self
     *
     * @phpstan-param-out string $newContent
     * @phpstan-param-out string $newContentCode
     * @phpstan-param-out string $newSubjectCode
     */
    public function getDocumentPositionNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): self {
        $newContent = "";
        $newContentCode = "";
        $newSubjectCode = "";

        return $this;
    }

    /**
     * Get product details from latest position
     *
     * @param string|null $newProductId __BT-X-305, From EXTENDED__ ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName __BT-153, From BASIC__ Name of the product (product name)
     * @param string|null $newProductDescription __BT-154, From EN 16931__ Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId __BT-155, From EN 16931__ Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId __BT-156, From EN 16931__ Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId __BT-157, From BASIC__ Product global id
     * @param string|null $newProductGlobalIdType __BT-157-1, From BASIC__ Type of the product global id
     * @param string|null $newProductIndustryId __BT-X-309, From EXTENDED__ Id assigned by the industry
     * @param string|null $newProductModelId __BT-X-533, From EXTENDED__ Unique model identifier of the product
     * @param string|null $newProductBatchId __BT-X-534. From EXTENDED__ Batch (lot) identifier of the product
     * @param string|null $newProductBrandName __BT-X-535. From EXTENDED__ Brand name of the product
     * @param string|null $newProductModelName __BT-X-536. From EXTENDED__ Model name of the product
     * @param string|null $newProductOriginTradeCountry __BT-159, From EN 16931__ Code indicating the country the goods came from
     * @return self
     *
     * @phpstan-param-out string $newProductId
     * @phpstan-param-out string $newProductName
     * @phpstan-param-out string $newProductDescription
     * @phpstan-param-out string $newProductSellerId
     * @phpstan-param-out string $newProductBuyerId
     * @phpstan-param-out string $newProductGlobalId
     * @phpstan-param-out string $newProductGlobalIdType
     * @phpstan-param-out string $newProductIndustryId
     * @phpstan-param-out string $newProductModelId
     * @phpstan-param-out string $newProductBatchId
     * @phpstan-param-out string $newProductBrandName
     * @phpstan-param-out string $newProductModelName
     * @phpstan-param-out string $newProductOriginTradeCountry
     */
    public function getDocumentPositionProductDetails(
        ?string &$newProductId,
        ?string &$newProductName,
        ?string &$newProductDescription,
        ?string &$newProductSellerId,
        ?string &$newProductBuyerId,
        ?string &$newProductGlobalId,
        ?string &$newProductGlobalIdType,
        ?string &$newProductIndustryId,
        ?string &$newProductModelId,
        ?string &$newProductBatchId,
        ?string &$newProductBrandName,
        ?string &$newProductModelName,
        ?string &$newProductOriginTradeCountry
    ): self {
        $newProductId = "";
        $newProductName = "";
        $newProductDescription = "";
        $newProductSellerId = "";
        $newProductBuyerId = "";
        $newProductGlobalId = "";
        $newProductGlobalIdType = "";
        $newProductIndustryId = "";
        $newProductModelId = "";
        $newProductBatchId = "";
        $newProductBrandName = "";
        $newProductModelName = "";
        $newProductOriginTradeCountry = "";

        return $this;
    }

    /**
     * Go to the first product characteristics from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionProductCharacteristic(): bool
    {
        return false;
    }

    /**
     * Go to the next product characteristics from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionProductCharacteristic(): bool
    {
        return false;
    }

    /**
     * Get product characteristics from latest position
     *
     * @param string|null $newProductCharacteristicDescription __BT-160, From EN 16931__ Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue __BT-161, From EN 16931__ Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType __BT-X-11, From EXTENDED__ Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue __BT-X-12, From EXTENDED__ Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit __BT-X-12-0, From EXTENDED__ Unit of value of the characteristic
     * @return self
     *
     * @phpstan-param-out string $newProductCharacteristicDescription
     * @phpstan-param-out string $newProductCharacteristicValue
     * @phpstan-param-out string $newProductCharacteristicType
     * @phpstan-param-out float $newProductCharacteristicMeasureValue
     * @phpstan-param-out string $newProductCharacteristicMeasureUnit
     */
    public function getDocumentPositionProductCharacteristic(
        ?string &$newProductCharacteristicDescription,
        ?string &$newProductCharacteristicValue,
        ?string &$newProductCharacteristicType,
        ?float &$newProductCharacteristicMeasureValue,
        ?string &$newProductCharacteristicMeasureUnit
    ): self {
        $newProductCharacteristicDescription = "";
        $newProductCharacteristicValue = "";
        $newProductCharacteristicType = "";
        $newProductCharacteristicMeasureValue = 0.0;
        $newProductCharacteristicMeasureUnit = "";

        return $this;
    }

    /**
     * Go to the first product classification from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionProductClassification(): bool
    {
        return false;
    }

    /**
     * Go to the next product classification from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionProductClassification(): bool
    {
        return false;
    }

    /**
     * Get product classification from latest position
     *
     * @param string|null $newProductClassificationCode __BT-158, From EN 16931__ Classification identifier
     * @param string|null $newProductClassificationListId __BT-158-1, From EN 16931__ Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId __BT-158-2, From EN 16931__ Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname __BT-X-138, From EXTENDED__ Name with which an article can be classified according to type or quality
     * @return self
     *
     * @phpstan-param-out string $newProductClassificationCode
     * @phpstan-param-out string $newProductClassificationListId
     * @phpstan-param-out string $newProductClassificationListVersionId
     * @phpstan-param-out string $newProductClassificationCodeClassname
     */
    public function getDocumentPositionProductClassification(
        ?string &$newProductClassificationCode,
        ?string &$newProductClassificationListId,
        ?string &$newProductClassificationListVersionId,
        ?string &$newProductClassificationCodeClassname
    ): self {
        $newProductClassificationCode = "";
        $newProductClassificationListId = "";
        $newProductClassificationListVersionId = "";
        $newProductClassificationCodeClassname = "";

        return $this;
    }

    /**
     * Go to the first referenced product in latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionReferencedProduct(): bool
    {
        return false;
    }

    /**
     * Go to the next referenced product in latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionReferencedProduct(): bool
    {
        return false;
    }

    /**
     * Get referenced product from latest position
     *
     * @param string|null $newProductId __BT-X-301, From EXTENDED__ ID of the product (product id, Order-X interoperable)
     * @param string|null $newProductName __BT-X-18, From EXTENDED__ Name of the product (product name)
     * @param string|null $newProductDescription __BT-X-19, From EXTENDED__ Product description of the item, the item description makes it possible to describe the item
     * @param string|null $newProductSellerId __BT-X-16, From EXTENDED__ Identifier assigned to the product by the seller
     * @param string|null $newProductBuyerId __BT-X-17, From EXTENDED__ Identifier assigned to the product by the buyer
     * @param string|null $newProductGlobalId __BT-X-15, From EXTENDED__ Product global id
     * @param string|null $newProductGlobalIdType __BT-X-15-1, From EXTENDED__ Type of the product global id
     * @param string|null $newProductIndustryId __BT-X-309, From EXTENDED__ Id assigned by the industry
     * @param float|null $newProductUnitQuantity __BT-X-20, From EXTENDED__ Quantity Quantity of the referenced product contained
     * @param string|null $newProductUnitQuantityUnit __BT-X-20-1, From EXTENDED__ Unit code of the quantity of the referenced product contained
     * @return self
     *
     * @phpstan-param-out string $newProductId
     * @phpstan-param-out string $newProductName
     * @phpstan-param-out string $newProductDescription
     * @phpstan-param-out string $newProductSellerId
     * @phpstan-param-out string $newProductBuyerId
     * @phpstan-param-out string $newProductGlobalId
     * @phpstan-param-out string $newProductGlobalIdType
     * @phpstan-param-out string $newProductIndustryId
     * @phpstan-param-out float $newProductUnitQuantity
     * @phpstan-param-out string $newProductUnitQuantityUnit
     */
    public function getDocumentPositionReferencedProduct(
        ?string &$newProductId,
        ?string &$newProductName,
        ?string &$newProductDescription,
        ?string &$newProductSellerId,
        ?string &$newProductBuyerId,
        ?string &$newProductGlobalId,
        ?string &$newProductGlobalIdType,
        ?string &$newProductIndustryId,
        ?float &$newProductUnitQuantity,
        ?string &$newProductUnitQuantityUnit
    ): self {
        $newProductId = "";
        $newProductName = "";
        $newProductDescription = "";
        $newProductSellerId = "";
        $newProductBuyerId = "";
        $newProductGlobalId = "";
        $newProductGlobalIdType = "";
        $newProductIndustryId = "";
        $newProductUnitQuantity = 0.0;
        $newProductUnitQuantityUnit = "";

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionSellerOrderReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated seller's order confirmation (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionSellerOrderReference(): bool
    {
        return false;
    }

    /**
     * Get the associated seller's order confirmation (line reference) from latest position
     *
     * @param string|null $newReferenceNumber __BT-X-537, From EXTENDED__ Seller's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-538, From EXTENDED__ Seller's order confirmation line number
     * @param null $newReferenceDate __BT-X-539, From EXTENDED__ Seller's order confirmation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionSellerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionBuyerOrderReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated buyer's order confirmation (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionBuyerOrderReference(): bool
    {
        return false;
    }

    /**
     * Get the associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber __BT-X-537, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-538, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-539, From EXTENDED__ Buyer's order confirmation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionBuyerOrderReference(
        ?string &$newReferenceNumber = null,
        ?string &$newReferenceLineNumber = null,
        ?DateTimeInterface &$newReferenceDate = null
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated quotation (line reference)
     *
     * @return boolean
     */
    public function firstDocumentPositionQuotationReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated quotation (line reference)
     *
     * @return boolean
     */
    public function nextDocumentPositionQuotationReference(): bool
    {
        return false;
    }

    /**
     * Get the associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber __BT-X-310, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-311, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-312, From EXTENDED__ Buyer's order confirmation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionQuotationReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated contract (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionContractReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated contract (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionContractReference(): bool
    {
        return false;
    }

    /**
     * Get the associated contract (line reference) from latest position
     *
     * @param string|null $newReferenceNumber __BT-X-24, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-25, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Buyer's order confirmation date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionContractReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to first additional associated document (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionAdditionalReference(): bool
    {
        return false;
    }

    /**
     * Go to next additional associated document (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionAdditionalReference(): bool
    {
        return false;
    }

    /**
     * Get an additional associated document (line reference) from latest position
     *
     * @param string|null $newReferenceNumber __BT-X-27, From EXTENDED__ Additional document number
     * @param string|null $newReferenceLineNumber __BT-X-29, From EXTENDED__ Additional document line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-33, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-X-30, From EXTENDED__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-X-32, From EXTENDED__ Additional document reference-type code
     * @param string|null $newDescription __BT-X-299, From EXTENDED__ Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment __BT-X-31, From EXTENDED__ Additional document attachment
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out null $newInvoiceSuiteAttachment
     */
    public function getDocumentPositionAdditionalReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;
        $newTypeCode = "";
        $newReferenceTypeCode = "";
        $newDescription = "";
        $newInvoiceSuiteAttachment = null;

        return $this;
    }

    /**
     * Go to the first an additional ultimate customer order reference (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return false;
    }

    /**
     * Go to the next an additional ultimate customer order reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return false;
    }

    /**
     * Get an additional ultimate customer order reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber __BT-X-43, From EXTENDED__ Ultimate customer order number
     * @param string|null $newReferenceLineNumber __BT-X-44, From EXTENDED__ Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-45, From EXTENDED__ Ultimate customer order date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionDespatchAdviceReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional despatch advice reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionDespatchAdviceReference(): bool
    {
        return false;
    }

    /**
     * Get an additional despatch advice reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber Shipping notification number
     * @param string|null $newReferenceLineNumber Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate Shipping notification date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionReceivingAdviceReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional receiving advice reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionReceivingAdviceReference(): bool
    {
        return false;
    }

    /**
     * Get an additional receiving advice reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber __BT-X-89, From EXTENDED__ Receipt notification number
     * @param string|null $newReferenceLineNumber __BT-X-90, From EXTENDED__ Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-91, From EXTENDED__ Receipt notification date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional delivery note reference (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional delivery note reference (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Get an additional delivery note reference (line reference) from latest position
     *
     * @param string|null $newReferenceNumber __BT-X-92, From EXTENDED__ Delivery slip number
     * @param string|null $newReferenceLineNumber __BT-X-93, From EXTENDED__ Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-94, From EXTENDED__ Delivery slip date
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionInvoiceReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionInvoiceReference(): bool
    {
        return false;
    }

    /**
     * Get an additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @param string|null $newReferenceNumber __BT-X-331, From EXTENDED__ Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber __BT-X-540, From EXTENDED__ Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-333, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-X-332, From EXTENDED__ Type code of previous invoice
     * @return self
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     */
    public function getDocumentPositionInvoiceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): self {
        $newReferenceNumber = "";
        $newReferenceLineNumber = "";
        $newReferenceDate = null;
        $newTypeCode = "";

        return $this;
    }

    /**
     * Returns true if a gross price was specified
     *
     * @return boolean
     */
    public function firstDcumentPositionGrossPrice(): bool
    {
        return false;
    }

    /**
     * Get the position's gross price from latest position
     *
     * @param null|float $newGrossPrice __BT-148, From BASIC__ Unit price excluding sales tax before deduction of the discount on the item price
     * @param null|float $newGrossPriceBasisQuantity __BT-149-1, From BASIC__ Number of item units for which the price applies
     * @param null|string $newGrossPriceBasisQuantityUnit __BT-150-1, From BASIC__ Unit code of the number of item units for which the price applies
     * @return self
     *
     * @phpstan-param-out float $newGrossPrice
     * @phpstan-param-out float $newGrossPriceBasisQuantity
     * @phpstan-param-out string $newGrossPriceBasisQuantityUnit
     */
    public function getDocumentPositionGrossPrice(
        ?float &$newGrossPrice,
        ?float &$newGrossPriceBasisQuantity,
        ?string &$newGrossPriceBasisQuantityUnit
    ): self {
        $newGrossPrice = 0.0;
        $newGrossPriceBasisQuantity = 0.0;
        $newGrossPriceBasisQuantityUnit = "";

        return $this;
    }

    /**
     * Go to the first discount or charge from the gross price from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return false;
    }

    /**
     * Go to the next discount or charge from the gross price from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return false;
    }

    /**
     * Get discount or charge from the gross price from latest position
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount __BT-147, From BASIC__ Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge __BT-147-02, From BASIC__ Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent __BT-X-34, From EXTENDED__ Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount __BT-X-35, From EXTENDED__ Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason __BT-X-36, From EXTENDED__ Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode __BT-X-313, From EXTENDED__ Reason code for discount or charge (free text)
     * @return self
     *
     * @phpstan-param-out float $newGrossPriceAllowanceChargeAmount
     * @phpstan-param-out bool $newIsCharge
     * @phpstan-param-out float $newGrossPriceAllowanceChargePercent
     * @phpstan-param-out float $newGrossPriceAllowanceChargeBasisAmount
     * @phpstan-param-out string $newGrossPriceAllowanceChargeReason
     * @phpstan-param-out string $newGrossPriceAllowanceChargeReasonCode
     */
    public function getDocumentPositionGrossPriceAllowanceCharge(
        ?float &$newGrossPriceAllowanceChargeAmount,
        ?bool &$newIsCharge,
        ?float &$newGrossPriceAllowanceChargePercent,
        ?float &$newGrossPriceAllowanceChargeBasisAmount,
        ?string &$newGrossPriceAllowanceChargeReason,
        ?string &$newGrossPriceAllowanceChargeReasonCode
    ): self {
        $newGrossPriceAllowanceChargeAmount = 0.0;
        $newIsCharge = false;
        $newGrossPriceAllowanceChargePercent = 0.0;
        $newGrossPriceAllowanceChargeBasisAmount = 0.0;
        $newGrossPriceAllowanceChargeReason = "";
        $newGrossPriceAllowanceChargeReasonCode = "";

        return $this;
    }

    /**
     * Returns true if a net price was specified
     *
     * @return boolean
     */
    public function firstDocumentPositionNetPrice(): bool
    {
        return false;
    }

    /**
     * Get the position's net price from latest position
     *
     * @param null|float $newNetPrice __BT-146, From BASIC__ Unit price excluding sales tax after deduction of the discount on the item price
     * @param null|float $newNetPriceBasisQuantity __BT-149, From BASIC__ Number of item units for which the price applies
     * @param null|string $newNetPriceBasisQuantityUnit __BT-150, From BASIC__ Unit code of the number of item units for which the price applies
     * @return self
     *
     * @phpstan-param-out float $newNetPrice
     * @phpstan-param-out float $newNetPriceBasisQuantity
     * @phpstan-param-out string $newNetPriceBasisQuantityUnit
     */
    public function getDocumentPositionNetPrice(
        ?float &$newNetPrice,
        ?float &$newNetPriceBasisQuantity,
        ?string &$newNetPriceBasisQuantityUnit
    ): self {
        $newNetPrice = 0.0;
        $newNetPriceBasisQuantity = 0.0;
        $newNetPriceBasisQuantityUnit = "";

        return $this;
    }

    /**
     * Get the position's net price included tax from latest position
     *
     * @param string|null $newTaxCategory __BT-X-40, From EXTENDED__ Coded description of the tax category
     * @param string|null $newTaxType __BT-X-38, From EXTENDED__ Coded description of the tax type
     * @param float|null $newTaxAmount __BT-X-37, From EXTENDED__ Tax total amount
     * @param float|null $newTaxPercent __BT-X-42, From EXTENDED__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-X-39, From EXTENDED__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-X-41, From EXTENDED__ Reason for tax exemption (Code)
     * @return self
     *
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxAmount
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newExemptionReason
     * @phpstan-param-out string $newExemptionReasonCode
     */
    public function getDocumentPositionNetPriceTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode
    ): self {
        $newTaxCategory = "";
        $newTaxType = "";
        $newTaxAmount = 0.0;
        $newTaxPercent = 0.0;
        $newExemptionReason = "";
        $newExemptionReasonCode = "";

        return $this;
    }

    /**
     * Get the position's quantities from latest position
     *
     * @param null|float $newQuantity __BT-129, From BASIC__ Invoiced quantity
     * @param null|string $newQuantityUnit __BT-130, From BASIC__ Invoiced quantity unit
     * @param null|float $newChargeFreeQuantity __BT-X-46, From EXTENDED__ Charge Free quantity
     * @param null|string $newChargeFreeQuantityUnit __BT-X-46-0, From EXTENDED__ Charge Free quantity unit
     * @param null|float $newPackageQuantity __BT-X-47, From EXTENDED__ Package quantity
     * @param null|string $newPackageQuantityUnit __BT-X-47-0, From EXTENDED__ Package quantity unit
     * @return self
     *
     * @phpstan-param-out float $newQuantity
     * @phpstan-param-out string $newQuantityUnit
     * @phpstan-param-out float $newChargeFreeQuantity
     * @phpstan-param-out string $newChargeFreeQuantityUnit
     * @phpstan-param-out float $newPackageQuantity
     * @phpstan-param-out string $newPackageQuantityUnit
     */
    public function getDocumentPositionQuantities(
        ?float &$newQuantity,
        ?string &$newQuantityUnit,
        ?float &$newChargeFreeQuantity,
        ?string &$newChargeFreeQuantityUnit,
        ?float &$newPackageQuantity,
        ?string &$newPackageQuantityUnit
    ): self {
        $newQuantity = 0.0;
        $newQuantityUnit = "";
        $newChargeFreeQuantity = 0.0;
        $newChargeFreeQuantityUnit = "";
        $newPackageQuantity = 0.0;
        $newPackageQuantityUnit = "";

        return $this;
    }

    /**
     * Get the name of the Ship-To party from latest position
     *
     * @param string $newName __BT-X-50, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionShipToName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param string|null $newId __BT-X-48, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPositionShipToId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Ship-To party from latest position
     *
     * @param string|null $newGlobalId __BT-X-49, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-49-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPositionShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Ship-To party from latest position
     *
     * @param string|null $newTaxRegistrationType __BT-X-66-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-66, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToAddress(): bool
    {
        return false;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToAddress(): bool
    {
        return false;
    }

    /**
     * Get the address of the Ship-To party from latest position
     *
     * @param string|null $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId Country in which the party's address is located.
     * @param string|null $newSubDivision Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentPositionShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Ship-To party from latest position
     *
     * @param string|null $newType __BT-X-51-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-51, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-52, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-To party from latest position
     *
     * @param string|null $newPersonName __BT-X-54, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-54-1, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-55, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-56, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-57, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentPositionShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get the communication information of the Ship-To party from latest position
     *
     * @param string|null $newType __BT-X-65-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-65, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPositionShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    /**
     * Get the name of the ultimate Ship-To party from latest position
     *
     * @param string|null $newName __BT-X-69, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionUltimateShipToName(
        ?string &$newName
    ): self {
        $newName = "";

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param string|null $newId __BT-X-67, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPositionUltimateShipToId(
        ?string &$newId
    ): self {
        $newId = "";

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the ultimate Ship-To party from latest position
     *
     * @param string|null $newGlobalId __BT-X-68, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-68-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPositionUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): self {
        $newGlobalId = "";
        $newGlobalIdType = "";

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party from latest position
     *
     * @param string|null $newTaxRegistrationType __BT-X-84-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-84, From EXTENDED__ Tax identification number.
     * @return self
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): self {
        $newTaxRegistrationType = "";
        $newTaxRegistrationId = "";

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Get the address of the ultimate Ship-To party from latest position
     *
     * @param string|null $newAddressLine1 __BT_X-77, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT_X-78, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT_X-79, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT_X-76, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT_X-80, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT_X-81, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT_X-82, From EXTENDED__ Region or federal state in which the party's address is located.
     * @return self
     *
     * @phpstan-param-out string $newAddressLine1
     * @phpstan-param-out string $newAddressLine2
     * @phpstan-param-out string $newAddressLine3
     * @phpstan-param-out string $newPostcode
     * @phpstan-param-out string $newCity
     * @phpstan-param-out string $newCountryId
     * @phpstan-param-out string $newSubDivision
     */
    public function getDocumentPositionUltimateShipToAddress(
        ?string &$newAddressLine1,
        ?string &$newAddressLine2,
        ?string &$newAddressLine3,
        ?string &$newPostcode,
        ?string &$newCity,
        ?string &$newCountryId,
        ?string &$newSubDivision
    ): self {
        $newAddressLine1 = "";
        $newAddressLine2 = "";
        $newAddressLine3 = "";
        $newPostcode = "";
        $newCity = "";
        $newCountryId = "";
        $newSubDivision = "";

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the ultimate Ship-To party from latest position
     *
     * @param string|null $newType __BT-X-70-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-70, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-71, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): self {
        $newType = "";
        $newId = "";
        $newName = "";

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the ultimate Ship-To party from latest position
     *
     * @param string|null $newPersonName __BT_X-72, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT_X-72-1, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT_X-73, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT_X-74, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT_X-75, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     *
     * @phpstan-param-out string $newPersonName
     * @phpstan-param-out string $newDepartmentName
     * @phpstan-param-out string $newPhoneNumber
     * @phpstan-param-out string $newFaxNumber
     * @phpstan-param-out string $newEmailAddress
     */
    public function getDocumentPositionUltimateShipToContact(
        ?string &$newPersonName,
        ?string &$newDepartmentName,
        ?string &$newPhoneNumber,
        ?string &$newFaxNumber,
        ?string &$newEmailAddress
    ): self {
        $newPersonName = "";
        $newDepartmentName = "";
        $newPhoneNumber = "";
        $newFaxNumber = "";
        $newEmailAddress = "";

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get the communication information of the ultimate Ship-To party from latest position
     *
     * @param string|null $newType __BT-X-75-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-75, From EXTENDED__ The party's electronic address.
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPositionUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): self {
        $newType = "";
        $newUri = "";

        return $this;
    }

    /**
     * Get the date of the delivery from latest position
     *
     * @param DateTimeInterface|null $newDate __BT-X-85, From EXTENDED__
     * @return self
     *
     * @phpstan-param-out null $newDate
     */
    public function getDocumentPositionSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): self {
        $newDate = null;

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return boolean
     */
    public function firstDocumentPositionBillingPeriod(): bool
    {
        return false;
    }

    /**
     * Go to the next billing period
     *
     * @return boolean
     */
    public function nextDocumentPositionBillingPeriod(): bool
    {
        return false;
    }

    /**
     * Get the start and/or end date of the billing period from latest position
     *
     * @param null|DateTimeInterface $newStartDate __BT-134, From BASIC__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-135, From BASIC__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return self
     *
     * @phpstan-param-out null $newStartDate
     * @phpstan-param-out null $newEndDate
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentPositionBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): self {
        $newStartDate = null;
        $newEndDate = null;
        $newDescription = "";

        return $this;
    }

    /**
     * Go to the first position's tax information from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionTax(): bool
    {
        return false;
    }

    /**
     * Go to the next position's tax information from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionTax(): bool
    {
        return false;
    }

    /**
     * Get the position's tax information from latest position
     *
     * @param string|null $newTaxCategory __BT-151, From BASIC__ Coded description of the tax category
     * @param string|null $newTaxType __BT-151-0, From BASIC__ Coded description of the tax type
     * @param float|null $newTaxAmount __BT-X-95, From EXTENDED__ Tax total amount
     * @param float|null $newTaxPercent __BT-152, From BASIC__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-X-96, From EXTENDED__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-X-97, From EXTENDED__ Reason for tax exemption (Code)
     * @return self
     *
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newTaxAmount
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newExemptionReason
     * @phpstan-param-out string $newExemptionReasonCode
     */
    public function getDocumentPositionTax(
        ?string &$newTaxCategory,
        ?string &$newTaxType,
        ?float &$newTaxAmount,
        ?float &$newTaxPercent,
        ?string &$newExemptionReason,
        ?string &$newExemptionReasonCode,
    ): self {
        $newTaxCategory = "";
        $newTaxType = "";
        $newTaxAmount = 0.0;
        $newTaxPercent = 0.0;
        $newExemptionReason = "";
        $newExemptionReasonCode = "";

        return $this;
    }

    /**
     * Go to the first Document position Allowance/Charge from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionAllowanceCharge(): bool
    {
        return false;
    }

    /**
     * Go to the next Document position Allowance/Charge from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionAllowanceCharge(): bool
    {
        return false;
    }

    /**
     * Get Document position Allowance/Charge from latest position
     *
     * @param boolean|null $newChargeIndicator __BT-27-1/BT-28-1, From BASIC__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount __BT-136/BT-141, From BASIC__ Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount __BT-137, From EN 16931__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason __BT-139/BT-144, From BASIC__ Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode __BT-140/BT-145, From BASIC__ Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent __BT-138, From BASIC__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return self
     *
     * @phpstan-param-out bool $newChargeIndicator
     * @phpstan-param-out float $newAllowanceChargeAmount
     * @phpstan-param-out float $newAllowanceChargeBaseAmount
     * @phpstan-param-out string $newAllowanceChargeReason
     * @phpstan-param-out string $newAllowanceChargeReasonCode
     * @phpstan-param-out float $newAllowanceChargePercent
     */
    public function getDocumentPositionAllowanceCharge(
        ?bool &$newChargeIndicator,
        ?float &$newAllowanceChargeAmount,
        ?float &$newAllowanceChargeBaseAmount,
        ?string &$newAllowanceChargeReason,
        ?string &$newAllowanceChargeReasonCode,
        ?float &$newAllowanceChargePercent
    ): self {
        $newChargeIndicator = false;
        $newAllowanceChargeAmount = 0.0;
        $newAllowanceChargeBaseAmount = 0.0;
        $newAllowanceChargeReason = "";
        $newAllowanceChargeReasonCode = "";
        $newAllowanceChargePercent = 0.0;

        return $this;
    }

    /**
     * Returns true if a position summation exists
     *
     * @return boolean
     */
    public function firstDocumentPositionSummation(): bool
    {
        return false;
    }

    /**
     * Get the document position summation from latest position
     *
     * @param float|null $newNetAmount __BT-131, From BASIC__ Net amount
     * @param float|null $newChargeTotalAmount __BT-X-327, From EXTENDED__ Sum of the charges
     * @param float|null $newDiscountTotalAmount __BT-X-328, From EXTENDED__ Sum of the discounts
     * @param float|null $newTaxTotalAmount __BT-X-329, From EXTENDED__ Total amount of the line (in the invoice currency)
     * @param float|null $newGrossAmount __BT-X-330, From EXTENDED__ Total invoice line amount including sales tax
     * @return self
     *
     * @phpstan-param-out float $newNetAmount
     * @phpstan-param-out float $newChargeTotalAmount
     * @phpstan-param-out float $newDiscountTotalAmount
     * @phpstan-param-out float $newTaxTotalAmount
     * @phpstan-param-out float $newGrossAmount
     */
    public function getDocumentPositionSummation(
        ?float &$newNetAmount,
        ?float &$newChargeTotalAmount,
        ?float &$newDiscountTotalAmount,
        ?float &$newTaxTotalAmount,
        ?float &$newGrossAmount
    ): self {
        $newNetAmount = 0.0;
        $newChargeTotalAmount = 0.0;
        $newDiscountTotalAmount = 0.0;
        $newTaxTotalAmount = 0.0;
        $newGrossAmount = 0.0;

        return $this;
    }

    /**
     * Go to the first posting reference from latest position
     *
     * @return boolean
     */
    public function firstDocumentPositionPostingReference(): bool
    {
        return false;
    }

    /**
     * Go to the next posting reference from latest position
     *
     * @return boolean
     */
    public function nextDocumentPositionPostingReference(): bool
    {
        return false;
    }

    /**
     * Get a position's posting reference from latest position
     *
     * @param string|null $newType __BT-X-99, From EXTENDED__ Type of the posting reference
     * @param string|null $newAccountId __BT-133, From EN 16931__ Posting reference of the byuer
     * @return self
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newAccountId
     */
    public function getDocumentPositionPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): self {
        $newType = "";
        $newAccountId = "";

        return $this;
    }

    #endregion
}
