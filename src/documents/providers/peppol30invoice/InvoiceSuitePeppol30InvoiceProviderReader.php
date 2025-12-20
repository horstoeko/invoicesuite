<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\peppol30invoice;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\models\ubl\cbc\ID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\documents\models\ubl\cac\Item;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Note;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use horstoeko\invoicesuite\utils\InvoiceSuitePointerUtils;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\Contact;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\Delivery;
use horstoeko\invoicesuite\documents\models\ubl\cac\TaxTotal;
use horstoeko\invoicesuite\documents\models\ubl\main\Invoice;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\documents\models\ubl\cbc\EndpointID;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\InvoiceLine;
use horstoeko\invoicesuite\documents\models\ubl\cac\TaxSubtotal;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\PaymentMeans;
use horstoeko\invoicesuite\documents\models\ubl\cac\PaymentTerms;
use horstoeko\invoicesuite\documents\models\ubl\cbc\SalesOrderID;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\InvoicePeriod;
use horstoeko\invoicesuite\documents\models\ubl\cac\PostalAddress;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\OrderReference;
use horstoeko\invoicesuite\documents\models\ubl\cac\PartyTaxScheme;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AccountingCost;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\AllowanceCharge;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\BillingReference;
use horstoeko\invoicesuite\documents\models\ubl\cac\PartyLegalEntity;
use horstoeko\invoicesuite\documents\models\ubl\cac\ProjectReference;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\DocumentReference;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\OrderLineReference;
use horstoeko\invoicesuite\documents\models\ubl\cbc\AccountingCostCode;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\PartyIdentification;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\ClassifiedTaxCategory;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\AdditionalItemProperty;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\CommodityClassification;
use horstoeko\invoicesuite\documents\models\ubl\cac\PartyIdentificationType;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\ReceiptDocumentReference;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documents\models\ubl\cac\ContractDocumentReference;
use horstoeko\invoicesuite\documents\models\ubl\cac\DespatchDocumentReference;
use horstoeko\invoicesuite\documents\models\ubl\cac\AdditionalDocumentReference;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\documents\abstracts\InvoiceSuiteAbstractDocumentFormatReader;

class InvoiceSuitePeppol30InvoiceProviderReader extends InvoiceSuiteAbstractDocumentFormatReader
{
    /**
     * Create a DTO from this document
     *
     * @param  null|InvoiceSuiteDocumentHeaderDTO $newDocumentDTO Data-Transfer-Object
     * @return static
     *
     * @phpstan-param-out InvoiceSuiteDocumentHeaderDTO $newDocumentDTO
     */
    public function convertToDTO(
        ?InvoiceSuiteDocumentHeaderDTO &$newDocumentDTO
    ): static {
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

        // Document-Level Delivery Terms

        $this->getDocumentDeliveryTerms($newDocumentDeliveryTerms);

        $newDocumentDTO->addDeliveryTerm(new InvoiceSuiteIdDTO($newDocumentDeliveryTerms));

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
                $newDocumentPaymentTermDueDate,
                $newDocumentPaymentTermMandate
            );

            $documentPaymentTermDTO = new InvoiceSuitePaymentTermDTO(
                $newDocumentPaymentTermDescription,
                $newDocumentPaymentTermDueDate,
                mandate: $newDocumentPaymentTermMandate
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

                $documentPaymentTermDTO->addPenaltyTerm(
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

                $documentPaymentTermDTO->addDiscountTerm(
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

        // Document-Level Payment Reference

        while ($this->nextDocumentPaymentReference()) {
            $this->getDocumentPaymentReference($newDocumentPaymentReference);
            $newDocumentDTO->addPaymentReference(new InvoiceSuiteIdDTO($newDocumentPaymentReference));
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

            while ($this->nextDocumentPositionAdditionalObjectReference()) {
                $this->getDocumentPositionAdditionalObjectReference(
                    $newDocumentPositionAdditionalObjectReferenceNumber,
                    $newDocumentPositionAdditionalObjectReferenceTypeCode,
                    $newDocumentPositionAdditionalObjectReferenceReferenceTypeCode
                );

                $newDocumentPositionDTO->addAdditionalObjectReference(
                    new InvoiceSuiteReferenceDocumentExtDTO(
                        referenceNumber: $newDocumentPositionAdditionalObjectReferenceNumber,
                        typeCode: $newDocumentPositionAdditionalObjectReferenceTypeCode,
                        referenceTypeCode: $newDocumentPositionAdditionalObjectReferenceReferenceTypeCode
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

    /**
     * Gets the document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo The document no issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newDocumentNo
     */
    public function getDocumentNo(
        ?string &$newDocumentNo
    ): static {
        $newDocumentNo = $this->getUblInvoiceRootObject()->getID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Gets the document type code
     *
     * @param  null|string $newDocumentType The type of the document
     * @return static
     *
     * @phpstan-param-out string $newDocumentType
     */
    public function getDocumentType(
        ?string &$newDocumentType
    ): static {
        $newDocumentType = $this->getUblInvoiceRootObject()->getInvoiceTypeCode()?->getValue() ?? '';

        return $this;
    }

    /**
     * Gets the document description
     *
     * @param  null|string $newDocumentDescription The documenttype as free text
     * @return static
     *
     * @phpstan-param-out string $newDocumentDescription
     */
    public function getDocumentDescription(
        ?string &$newDocumentDescription
    ): static {
        $newDocumentDescription = '';

        return $this;
    }

    /**
     * Gets the document language
     *
     * @param  null|string $newDocumentLanguage Language indicator. The language code in which the document was written
     * @return static
     *
     * @phpstan-param-out string $newDocumentLanguage
     */
    public function getDocumentLanguage(
        ?string &$newDocumentLanguage
    ): static {
        $newDocumentLanguage = '';

        return $this;
    }

    /**
     * Gets the document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate Date of the document. The date when the document was issued by the seller
     * @return static
     *
     * @phpstan-param-out DateTimeInterface $newDocumentDate
     */
    public function getDocumentDate(
        ?DateTimeInterface &$newDocumentDate
    ): static {
        $newDocumentDate = $this->getUblInvoiceRootObject()->getIssueDate() ?? new DateTime();

        return $this;
    }

    /**
     * Gets the document period
     *
     * @param  null|DateTimeInterface $newCompleteDate Contractual due date of the document
     * @return static
     *
     * @phpstan-param-out null $newCompleteDate
     */
    public function getDocumentCompleteDate(
        ?DateTimeInterface &$newCompleteDate
    ): static {
        $newCompleteDate = null;

        return $this;
    }

    /**
     * Gets the document currency
     *
     * @param  null|string $newDocumentCurrency Code for the invoice currency
     * @return static
     *
     * @phpstan-param-out string $newDocumentCurrency
     */
    public function getDocumentCurrency(
        ?string &$newDocumentCurrency
    ): static {
        $newDocumentCurrency = $this->getUblInvoiceRootObject()->getDocumentCurrencyCode()?->getValue() ?? '';

        return $this;
    }

    /**
     * Gets the new document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency Code for the tax currency
     * @return static
     *
     * @phpstan-param-out string $newDocumentTaxCurrency
     */
    public function getDocumentTaxCurrency(
        ?string &$newDocumentTaxCurrency
    ): static {
        $newDocumentTaxCurrency = $this->getUblInvoiceRootObject()->getTaxCurrencyCode()?->getValue() ?? '';

        return $this;
    }

    /**
     * Gets the new status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy Indicates that the document is a copy
     * @return static
     *
     * @phpstan-param-out boolean $newDocumentIsCopy
     */
    public function getDocumentIsCopy(
        ?bool &$newDocumentIsCopy = null
    ): static {
        $newDocumentIsCopy = false;

        return $this;
    }

    /**
     * Gets the status of the test indicator
     *
     * @param  null|bool $newDocumentIsTest Indicates that the document is a test
     * @return static
     *
     * @phpstan-param-out boolean $newDocumentIsTest
     */
    public function getDocumentIsTest(
        ?bool &$newDocumentIsTest
    ): static {
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
                $this->getUblInvoiceRootObject()->getNote() ?? []
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
                $this->getUblInvoiceRootObject()->getNote() ?? []
            ),
            'documentnote'
        );
    }

    /**
     * Get a note to the document.
     *
     * @param  null|string $newContent     Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Qualification of the free text for the invoice
     * @return static
     *
     * @phpstan-param-out string $newContent
     * @phpstan-param-out string $newContentCode
     * @phpstan-param-out string $newSubjectCode
     */
    public function getDocumentNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): static {
        /**
         * @var array<Note>
         */
        $documentNotes = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getNote() ?? []);

        /**
         * @var Note
         */
        $documentNote = $documentNotes[InvoiceSuitePointerUtils::getValue('documentnote')];

        $newContent = $documentNote->getValue() ?? '';
        $newContentCode = '';
        $newSubjectCode = '';

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    public function firstDocumentBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getInvoicePeriod() ?? []
            ),
            'documentbillingperiod'
        );
    }

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    public function nextDocumentBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getInvoicePeriod() ?? []
            ),
            'documentbillingperiod'
        );
    }

    /**
     * Get the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newStartDate
     * @phpstan-param-out DateTimeInterface|null $newEndDate
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): static {
        /**
         * @var array<InvoicePeriod>
         */
        $billingPeriods = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getInvoicePeriod() ?? []);

        /**
         * @var InvoicePeriod
         */
        $billingPeriod = $billingPeriods[InvoiceSuitePointerUtils::getValue('documentbillingperiod')];

        $newStartDate = $billingPeriod->getStartDate();
        $newEndDate = $billingPeriod->getEndDate();
        $billingPeriodDescriptions = $billingPeriod->getDescription();
        $billingPeriodDescription = reset($billingPeriodDescriptions);
        $newDescription = $billingPeriodDescription !== false ? $billingPeriodDescription->getValue() : '';

        return $this;
    }

    /**
     * Go to the first posting reference
     *
     * @return bool
     */
    public function firstDocumentPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCost() ?? []
            ),
            'documentpostingreference'
        );
    }

    /**
     * Go to the next posting reference
     *
     * @return bool
     */
    public function nextDocumentPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCost() ?? []
            ),
            'documentpostingreference'
        );
    }

    /**
     * Get a posting reference
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newAccountId
     */
    public function getDocumentPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): static {
        /**
         * @var array<AccountingCost>
         */
        $postingReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCost() ?? []);

        /**
         * @var AccountingCost
         */
        $postingReference = $postingReferences[InvoiceSuitePointerUtils::getValue('documentpostingreference')];

        $newType = '';
        $newAccountId = $postingReference->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation
     *
     * @return bool
     */
    public function firstDocumentSellerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getOrderReference()?->getSalesOrderID() ?? []
            ),
            'documentsellerorderreference'
        );
    }

    /**
     * Go to the next associated seller's order confirmation
     *
     * @return bool
     */
    public function nextDocumentSellerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getOrderReference()?->getSalesOrderID() ?? []
            ),
            'documentsellerorderreference'
        );
    }

    /**
     * Get the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   Seller's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentSellerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        /**
         * @var array<SalesOrderID>
         */
        $documentSellerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getOrderReference()?->getSalesOrderID() ?? []);

        /**
         * @var SalesOrderID
         */
        $documentSellerOrderReference = $documentSellerOrderReferences[InvoiceSuitePointerUtils::getValue('documentsellerorderreference')];

        $newReferenceNumber = $documentSellerOrderReference->getValue() ?? '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation
     *
     * @return bool
     */
    public function firstDocumentBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getOrderReference() ?? []
            ),
            'documentbuyerorderreference'
        );
    }

    /**
     * Go to the next associated buyer's order confirmation
     *
     * @return bool
     */
    public function nextDocumentBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getOrderReference() ?? []
            ),
            'documentbuyerorderreference'
        );
    }

    /**
     * Get the associated buyer's order confirmation.
     *
     * @param  null|string            $newReferenceNumber Buyer's order number
     * @param  null|DateTimeInterface $newReferenceDate   Buyer's order date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentBuyerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        /**
         * @var array<OrderReference>
         */
        $documentBuyerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getOrderReference() ?? []);

        /**
         * @var OrderReference
         */
        $documentBuyerOrderReference = $documentBuyerOrderReferences[InvoiceSuitePointerUtils::getValue('documentbuyerorderreference')];

        $newReferenceNumber = $documentBuyerOrderReference->getID()?->getValue() ?? '';
        $newReferenceDate = $documentBuyerOrderReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first associated quotation
     *
     * @return bool
     */
    public function firstDocumentQuotationReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveQuotationReferences()),
            'documentquotationreference'
        );
    }

    /**
     * Go to the next associated quotation
     *
     * @return bool
     */
    public function nextDocumentQuotationReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure($this->resolveQuotationReferences()),
            'documentquotationreference'
        );
    }

    /**
     * Get the associated quotation
     *
     * @param  null|string            $newReferenceNumber Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   Quotation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentQuotationReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        /**
         * @var array<AdditionalDocumentReference>
         */
        $documentQuotationReferences = InvoiceSuiteArrayUtils::ensure($this->resolveQuotationReferences());

        /**
         * @var AdditionalDocumentReference
         */
        $documentQuotationReference = $documentQuotationReferences[InvoiceSuitePointerUtils::getValue('documentquotationreference')];

        $newReferenceNumber = $documentQuotationReference->getID()?->getValue() ?? '';
        $newReferenceDate = $documentQuotationReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first associated contract
     *
     * @return bool
     */
    public function firstDocumentContractReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getContractDocumentReference() ?? []
            ),
            'documentcontractreference'
        );
    }

    /**
     * Go to the next associated contract
     *
     * @return bool
     */
    public function nextDocumentContractReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getContractDocumentReference() ?? []
            ),
            'documentcontractreference'
        );
    }

    /**
     * Get the associated contract
     *
     * @param  string                 $newReferenceNumber Contract number
     * @param  null|DateTimeInterface $newReferenceDate   Contract date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentContractReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        /**
         * @var array<ContractDocumentReference>
         */
        $documentContractReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getContractDocumentReference() ?? []);

        /**
         * @var ContractDocumentReference
         */
        $documentContractReference = $documentContractReferences[InvoiceSuitePointerUtils::getValue('documentcontractreference')];

        $newReferenceNumber = $documentContractReference->getID()?->getValue() ?? '';
        $newReferenceDate = $documentContractReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first additional associated document
     *
     * @return bool
     */
    public function firstDocumentAdditionalReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? []
            ),
            'documentadditionalreference'
        );
    }

    /**
     * Go to the next additional associated document
     *
     * @return bool
     */
    public function nextDocumentAdditionalReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? []
            ),
            'documentadditionalreference'
        );
    }

    /**
     * Get an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment
     */
    public function getDocumentAdditionalReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode,
        ?string &$newReferenceTypeCode,
        ?string &$newDescription,
        ?InvoiceSuiteAttachment &$newInvoiceSuiteAttachment
    ): static {
        /**
         * @var array<AdditionalDocumentReference>
         */
        $documentAdditionalReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? []);

        /**
         * @var AdditionalDocumentReference
         */
        $documentAdditionalReference = $documentAdditionalReferences[InvoiceSuitePointerUtils::getValue('documentadditionalreference')];

        $newReferenceNumber = $documentAdditionalReference->getID()?->getValue() ?? '';
        $newReferenceDate = $documentAdditionalReference->getIssueDate();
        $newTypeCode = $documentAdditionalReference->getDocumentTypeCode()?->getValue() ?? '';
        $newReferenceTypeCode = '';
        $newDescriptions = $documentAdditionalReference->getDocumentDescription() ?? [];
        $newDescriptions = reset($newDescriptions);

        $newDescription = $newDescriptions !== false ? $newDescriptions->getValue() ?? '' : '';

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    public function firstDocumentInvoiceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getBillingReference() ?? []
            ),
            'documentinvoicereference'
        );
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice)
     *
     * @return bool
     */
    public function nextDocumentInvoiceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getBillingReference() ?? []
            ),
            'documentinvoicereference'
        );
    }

    /**
     * Get an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   Date of the previous invoice
     * @param  null|string            $newTypeCode        Type code of previous invoice
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     * @phpstan-param-out string $newTypeCode
     */
    public function getDocumentInvoiceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate,
        ?string &$newTypeCode
    ): static {
        /**
         * @var array<BillingReference>
         */
        $documentInvoiceReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getBillingReference() ?? []);

        /**
         * @var BillingReference
         */
        $documentInvoiceReference = $documentInvoiceReferences[InvoiceSuitePointerUtils::getValue('documentinvoicereference')];

        $newReferenceNumber = $documentInvoiceReference->getInvoiceDocumentReference()?->getID()?->getValue() ?? '';
        $newReferenceDate = $documentInvoiceReference->getInvoiceDocumentReference()?->getIssueDate();
        $newTypeCode = '';

        return $this;
    }

    /**
     * Go to the first additional project reference
     *
     * @return bool
     */
    public function firstDocumentProjectReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getProjectReference() ?? []
            ),
            'documentprojectreference'
        );
    }

    /**
     * Go to the next additional project reference
     *
     * @return bool
     */
    public function nextDocumentProjectReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getProjectReference() ?? []
            ),
            'documentprojectreference'
        );
    }

    /**
     * Get an additional project reference
     *
     * @param  null|string $newReferenceNumber Project number
     * @param  null|string $newName            Project name
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newName
     */
    public function getDocumentProjectReference(
        ?string &$newReferenceNumber,
        ?string &$newName
    ): static {
        /**
         * @var array<ProjectReference>
         */
        $documentProjectReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getProjectReference() ?? []);

        /**
         * @var ProjectReference
         */
        $documentProjectReference = $documentProjectReferences[InvoiceSuitePointerUtils::getValue('documentprojectreference')];

        $newReferenceNumber = $documentProjectReference->getID()?->getValue() ?? '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first additional ultimate customer order reference
     *
     * @return bool
     */
    public function firstDocumentUltimateCustomerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveDocumentUltimateCustomerOrderReferences()),
            'documentultimatecustomerorderreference'
        );
    }

    /**
     * Go to the next additional ultimate customer order reference
     *
     * @return bool
     */
    public function nextDocumentUltimateCustomerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure($this->resolveDocumentUltimateCustomerOrderReferences()),
            'documentultimatecustomerorderreference'
        );
    }

    /**
     * Get an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber Ultimate customer order number
     * @param  null|DateTimeInterface $newReferenceDate   Ultimate customer order date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        /**
         * @var array<AdditionalDocumentReference>
         */
        $documentUltimateCustomerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->resolveDocumentUltimateCustomerOrderReferences());

        /**
         * @var AdditionalDocumentReference
         */
        $documentUltimateCustomerOrderReference = $documentUltimateCustomerOrderReferences[InvoiceSuitePointerUtils::getValue('documentultimatecustomerorderreference')];

        $newReferenceNumber = $documentUltimateCustomerOrderReference->getID()?->getValue() ?? '';
        $newReferenceDate = $documentUltimateCustomerOrderReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference
     *
     * @return bool
     */
    public function firstDocumentDespatchAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getDespatchDocumentReference() ?? []
            ),
            'documentdespatchadvicereference'
        );
    }

    /**
     * Go to the next additional despatch advice reference
     *
     * @return bool
     */
    public function nextDocumentDespatchAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getDespatchDocumentReference() ?? []
            ),
            'documentdespatchadvicereference'
        );
    }

    /**
     * Get an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   Shipping notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        /**
         * @var array<DespatchDocumentReference>
         */
        $documentDespatchAdviceReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getDespatchDocumentReference() ?? []);

        /**
         * @var DespatchDocumentReference
         */
        $documentDespatchAdviceReference = $documentDespatchAdviceReferences[InvoiceSuitePointerUtils::getValue('documentdespatchadvicereference')];

        $newReferenceNumber = $documentDespatchAdviceReference->getID()?->getValue() ?? '';
        $newReferenceDate = $documentDespatchAdviceReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference
     *
     * @return bool
     */
    public function firstDocumentReceivingAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getReceiptDocumentReference() ?? []
            ),
            'documentreceivingadvicereference'
        );
    }

    /**
     * Go to the next additional receiving advice reference
     *
     * @return bool
     */
    public function nextDocumentReceivingAdviceReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getReceiptDocumentReference() ?? []
            ),
            'documentreceivingadvicereference'
        );
    }

    /**
     * Get an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   Receipt notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out DateTimeInterface|null $newReferenceDate
     */
    public function getDocumentReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        /**
         * @var array<ReceiptDocumentReference>
         */
        $documentReceivingAdviceReferences = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getReceiptDocumentReference() ?? []);

        /**
         * @var ReceiptDocumentReference
         */
        $documentReceivingAdviceReference = $documentReceivingAdviceReferences[InvoiceSuitePointerUtils::getValue('documentreceivingadvicereference')];

        $newReferenceNumber = $documentReceivingAdviceReference->getID()?->getValue() ?? '';
        $newReferenceDate = $documentReceivingAdviceReference->getIssueDate();

        return $this;
    }

    /**
     * Go to the first additional delivery note reference
     *
     * @return bool
     */
    public function firstDocumentDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional delivery note reference
     *
     * @return bool
     */
    public function nextDocumentDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Get an additional delivery note reference
     *
     * @param  null|string            $newReferenceNumber Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   Delivery slip date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Get the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate Actual delivery date
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newDate
     */
    public function getDocumentSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): static {
        $newDate = null;

        $deliveries = $this->getUblInvoiceRootObject()->getDelivery();
        $delivery = reset($deliveries);

        if ($delivery === false) {
            return $this;
        }

        $newDate = $delivery->getActualDeliveryDate();

        return $this;
    }

    /**
     * Get the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference An identifier assigned by the buyer and used for internal routing
     * @return static
     *
     * @phpstan-param-out string $newBuyerReference
     */
    public function getDocumentBuyerReference(
        ?string &$newBuyerReference
    ): static {
        $newBuyerReference = $this->getUblInvoiceRootObject()->getBuyerReference()?->getValue() ?? '';

        return $this;
    }

    /**
     * Get information on the delivery conditions
     *
     * @param  null|string $newCode The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     *
     * @phpstan-param-out string $newCode
     */
    public function getDocumentDeliveryTerms(
        ?string &$newCode = null
    ): static {
        $newCode = '';

        return $this;
    }

    /**
     * Get the name of the seller/supplier party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerName(
        ?string &$newName
    ): static {
        $newName = '';

        $sellerLegalEntities = $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity() ?? [];
        $sellerLegalEntity = reset($sellerLegalEntities);

        if ($sellerLegalEntity === false) {
            return $this;
        }

        $newName = $sellerLegalEntity->getRegistrationName()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first ID of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentSellerIds(),
            'documentsellerid'
        );
    }

    /**
     * Go to the next ID of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentSellerIds(),
            'documentsellerid'
        );
    }

    /**
     * Get the ID of the seller/supplier party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentSellerId(
        ?string &$newId
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentSellerIds = $this->resolveDocumentSellerIds();

        /**
         * @var PartyIdentification
         */
        $documentSellerId = $documentSellerIds[InvoiceSuitePointerUtils::getValue('documentsellerid')];

        $newId = $documentSellerId->getID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first global ID of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentSellerGlobalIds(),
            'documentsellerglobalid'
        );
    }

    /**
     * Go to the next global ID of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentSellerGlobalIds(),
            'documentsellerglobalid'
        );
    }

    /**
     * Get the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentSellerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentSellerGlobalIds = $this->resolveDocumentSellerGlobalIds();

        /**
         * @var PartyIdentification
         */
        $documentSellerGlobalId = $documentSellerGlobalIds[InvoiceSuitePointerUtils::getValue('documentsellerglobalid')];

        $newGlobalId = $documentSellerGlobalId->getID()?->getValue() ?? '';
        $newGlobalIdType = $documentSellerGlobalId->getID()?->getSchemeID() ?? '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyTaxScheme() ?? []
            ),
            'documentsellertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyTaxScheme() ?? []
            ),
            'documentsellertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentSellerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        /**
         * @var array<PartyTaxScheme>
         */
        $documentSellerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var PartyTaxScheme
         */
        $documentSellerTaxRegistration = $documentSellerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentsellertaxregistration')];

        $newTaxRegistrationType = $documentSellerTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? '';
        $newTaxRegistrationId = $documentSellerTaxRegistration->getCompanyID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first address of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPostalAddress() ?? []
            ),
            'documentselleraddress'
        );
    }

    /**
     * Go to the next address of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPostalAddress() ?? []
            ),
            'documentselleraddress'
        );
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
    ): static {
        /**
         * @var array<PostalAddress>
         */
        $documentSellerAddresses = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPostalAddress() ?? []);

        /**
         * @var PostalAddress
         */
        $documentSellerAddress = $documentSellerAddresses[InvoiceSuitePointerUtils::getValue('documentselleraddress')];

        $newAddressLine1 = $documentSellerAddress->getStreetName()?->getValue() ?? '';
        $newAddressLine2 = $documentSellerAddress->getAdditionalStreetName()?->getValue() ?? '';
        $newAddressLine3 = '';
        $newPostcode = $documentSellerAddress->getPostalZone()?->getValue() ?? '';
        $newCity = $documentSellerAddress->getCityName()?->getValue() ?? '';
        $newCountryId = $documentSellerAddress->getCountry()?->getIdentificationCode()?->getValue() ?? '';
        $newSubDivision = $documentSellerAddress->getCountrySubentity()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first the legal information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity() ?? []
            ),
            'documentsellerlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity() ?? []
            ),
            'documentsellerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the seller/supplier party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentSellerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        /**
         * @var array<PartyLegalEntity>
         */
        $documentSellerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyLegalEntity() ?? []);

        /**
         * @var PartyLegalEntity
         */
        $documentSellerLegalOrganisation = $documentSellerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentsellerlegalorganisation')];

        $newType = $documentSellerLegalOrganisation->getCompanyID()?->getSchemeID() ?? '';
        $newId = $documentSellerLegalOrganisation->getCompanyID()?->getValue() ?? '';

        // Trading name and Party name are swapped in UBL
        $partyNames = $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyName() ?? [];
        $partyName = reset($partyNames);
        $newName = $partyName !== false ? $partyName->getName()?->getValue() ?? '' : '';

        return $this;
    }

    /**
     * Go to the first contact information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getContact() ?? []
            ),
            'documentsellercontact'
        );
    }

    /**
     * Go to the next contact information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getContact() ?? []
            ),
            'documentsellercontact'
        );
    }

    /**
     * Get the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        /**
         * @var array<Contact>
         */
        $documentSellerContacts = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getContact() ?? []);

        /**
         * @var Contact
         */
        $documentSellerContact = $documentSellerContacts[InvoiceSuitePointerUtils::getValue('documentsellercontact')];

        $newPersonName = $documentSellerContact->getName()?->getValue() ?? '';
        $newDepartmentName = '';
        $newPhoneNumber = $documentSellerContact->getTelephone()?->getValue() ?? '';
        $newFaxNumber = $documentSellerContact->getTelefax()?->getValue() ?? '';
        $newEmailAddress = $documentSellerContact->getElectronicMail()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first communication information of the seller/supplier party
     *
     * @return bool
     */
    public function firstDocumentSellerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getEndpointID() ?? []
            ),
            'documentsellerecommunication'
        );
    }

    /**
     * Go to the next communication information of the seller/supplier party
     *
     * @return bool
     */
    public function nextDocumentSellerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getEndpointID() ?? []
            ),
            'documentsellerecommunication'
        );
    }

    /**
     * Get communication information of the seller/supplier party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentSellerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        /**
         * @var array<EndpointID>
         */
        $documentSellerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getEndpointID() ?? []);

        /**
         * @var EndpointID
         */
        $documentSellerElectronicCommunication = $documentSellerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentsellerecommunication')];

        $newType = $documentSellerElectronicCommunication->getSchemeID() ?? '';
        $newUri = $documentSellerElectronicCommunication->getValue() ?? '';

        return $this;
    }

    /**
     * Get the name of the buyer/customer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerName(
        ?string &$newName
    ): static {
        $newName = '';

        $buyerLegalEntities = $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity() ?? [];
        $buyerLegalEntity = reset($buyerLegalEntities);

        if ($buyerLegalEntity === false) {
            return $this;
        }

        $newName = $buyerLegalEntity->getRegistrationName()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first ID of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentBuyerIds(),
            'documentbuyerid'
        );
    }

    /**
     * Go to the next ID of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentBuyerIds(),
            'documentbuyerid'
        );
    }

    /**
     * Get the ID of the buyer/customer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentBuyerId(
        ?string &$newId
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentBuyerIds = $this->resolveDocumentBuyerIds();

        /**
         * @var PartyIdentification
         */
        $documentBuyerId = $documentBuyerIds[InvoiceSuitePointerUtils::getValue('documentbuyerid')];

        $newId = $documentBuyerId->getID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first global ID of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentBuyerGlobalIds(),
            'documentbuyerglobalid'
        );
    }

    /**
     * Go to the next global ID of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentBuyerGlobalIds(),
            'documentbuyerglobalid'
        );
    }

    /**
     * Get the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentBuyerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentBuyerGlobalIds = $this->resolveDocumentBuyerGlobalIds();

        /**
         * @var PartyIdentification
         */
        $documentBuyerGlobalId = $documentBuyerGlobalIds[InvoiceSuitePointerUtils::getValue('documentbuyerglobalid')];

        $newGlobalId = $documentBuyerGlobalId->getID()?->getValue() ?? '';
        $newGlobalIdType = $documentBuyerGlobalId->getID()?->getSchemeID() ?? '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyTaxScheme() ?? []
            ),
            'documentbuyertaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyTaxScheme() ?? []
            ),
            'documentbuyertaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentBuyerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        /**
         * @var array<PartyTaxScheme>
         */
        $documentBuyerTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var PartyTaxScheme
         */
        $documentBuyerTaxRegistration = $documentBuyerTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentbuyertaxregistration')];

        $newTaxRegistrationType = $documentBuyerTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? '';
        $newTaxRegistrationId = $documentBuyerTaxRegistration->getCompanyID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first address of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPostalAddress() ?? []
            ),
            'documentbuyeraddress'
        );
    }

    /**
     * Go to the next address of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPostalAddress() ?? []
            ),
            'documentbuyeraddress'
        );
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
    ): static {
        /**
         * @var array<PostalAddress>
         */
        $documentBuyerAddresses = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPostalAddress() ?? []);

        /**
         * @var PostalAddress
         */
        $documentBuyerAddress = $documentBuyerAddresses[InvoiceSuitePointerUtils::getValue('documentbuyeraddress')];

        $newAddressLine1 = $documentBuyerAddress->getStreetName()?->getValue() ?? '';
        $newAddressLine2 = $documentBuyerAddress->getAdditionalStreetName()?->getValue() ?? '';
        $newAddressLine3 = '';
        $newPostcode = $documentBuyerAddress->getPostalZone()?->getValue() ?? '';
        $newCity = $documentBuyerAddress->getCityName()?->getValue() ?? '';
        $newCountryId = $documentBuyerAddress->getCountry()?->getIdentificationCode()?->getValue() ?? '';
        $newSubDivision = $documentBuyerAddress->getCountrySubentity()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first the legal information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity() ?? []
            ),
            'documentbuyerlegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity() ?? []
            ),
            'documentbuyerlegalorganisation'
        );
    }

    /**
     * Get the legal information of the buyer/customer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentBuyerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        /**
         * @var array<PartyLegalEntity>
         */
        $documentBuyerLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyLegalEntity() ?? []);

        /**
         * @var PartyLegalEntity
         */
        $documentBuyerLegalOrganisation = $documentBuyerLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentbuyerlegalorganisation')];

        $newType = $documentBuyerLegalOrganisation->getCompanyID()?->getSchemeID() ?? '';
        $newId = $documentBuyerLegalOrganisation->getCompanyID()?->getValue() ?? '';

        // Trading name and Party name are swapped in UBL
        $partyNames = $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyName() ?? [];
        $partyName = reset($partyNames);
        $newName = $partyName !== false ? $partyName->getName()?->getValue() ?? '' : '';

        return $this;
    }

    /**
     * Go to the first contact information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getContact() ?? []
            ),
            'documentbuyercontact'
        );
    }

    /**
     * Go to the next contact information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getContact() ?? []
            ),
            'documentbuyercontact'
        );
    }

    /**
     * Get the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        /**
         * @var array<Contact>
         */
        $documentBuyerContacts = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getContact() ?? []);

        /**
         * @var Contact
         */
        $documentBuyerContact = $documentBuyerContacts[InvoiceSuitePointerUtils::getValue('documentbuyercontact')];

        $newPersonName = $documentBuyerContact->getName()?->getValue() ?? '';
        $newDepartmentName = '';
        $newPhoneNumber = $documentBuyerContact->getTelephone()?->getValue() ?? '';
        $newFaxNumber = $documentBuyerContact->getTelefax()?->getValue() ?? '';
        $newEmailAddress = $documentBuyerContact->getElectronicMail()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first communication information of the buyer/customer party
     *
     * @return bool
     */
    public function firstDocumentBuyerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getEndpointID() ?? []
            ),
            'documentbuyerecommunication'
        );
    }

    /**
     * Go to the next communication information of the buyer/customer party
     *
     * @return bool
     */
    public function nextDocumentBuyerCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getEndpointID() ?? []
            ),
            'documentbuyerecommunication'
        );
    }

    /**
     * Get communication information of the buyer/customer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentBuyerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        /**
         * @var array<EndpointID>
         */
        $documentBuyerElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getEndpointID() ?? []);

        /**
         * @var EndpointID
         */
        $documentBuyerElectronicCommunication = $documentBuyerElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentbuyerecommunication')];

        $newType = $documentBuyerElectronicCommunication->getSchemeID() ?? '';
        $newUri = $documentBuyerElectronicCommunication->getValue() ?? '';

        return $this;
    }

    /**
     * Get the name of the tax representative party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeName(
        ?string &$newName
    ): static {
        $newName = '';

        $taxRepresentativeMames = $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyName() ?? [];
        $taxRepresentativeMame = reset($taxRepresentativeMames);

        if ($taxRepresentativeMame === false) {
            return $this;
        }

        $newName = $taxRepresentativeMame->getName()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first ID of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentTaxRepresentativeIds(),
            'documenttaxrepresentativeid'
        );
    }

    /**
     * Go to the next ID of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentTaxRepresentativeIds(),
            'documenttaxrepresentativeid'
        );
    }

    /**
     * Get the ID of the tax representative party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentTaxRepresentativeId(
        ?string &$newId
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentTaxRepresentativeIds = $this->resolveDocumentTaxRepresentativeIds();

        /**
         * @var PartyIdentification
         */
        $documentTaxRepresentativeId = $documentTaxRepresentativeIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeid')];

        $newId = $documentTaxRepresentativeId->getID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first global ID of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentTaxRepresentativeGlobalIds(),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Go to the next global ID of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentTaxRepresentativeGlobalIds(),
            'documenttaxrepresentativeglobalid'
        );
    }

    /**
     * Get the Global ID of the tax representative party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentTaxRepresentativeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentTaxRepresentativeGlobalIds = $this->resolveDocumentTaxRepresentativeGlobalIds();

        /**
         * @var PartyIdentification
         */
        $documentTaxRepresentativeGlobalId = $documentTaxRepresentativeGlobalIds[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeglobalid')];

        $newGlobalId = $documentTaxRepresentativeGlobalId->getID()?->getValue() ?? '';
        $newGlobalIdType = $documentTaxRepresentativeGlobalId->getID()?->getSchemeID() ?? '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyTaxScheme() ?? []
            ),
            'documenttaxrepresentativetaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyTaxScheme() ?? []
            ),
            'documenttaxrepresentativetaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the tax representative party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentTaxRepresentativeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        /**
         * @var array<PartyTaxScheme>
         */
        $documentTaxRepresentativeTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var PartyTaxScheme
         */
        $documentTaxRepresentativeTaxRegistration = $documentTaxRepresentativeTaxRegistrations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativetaxregistration')];

        $newTaxRegistrationType = $documentTaxRepresentativeTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? '';
        $newTaxRegistrationId = $documentTaxRepresentativeTaxRegistration->getCompanyID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first address of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPostalAddress() ?? []
            ),
            'documenttaxrepresentativeaddress'
        );
    }

    /**
     * Go to the next address of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPostalAddress() ?? []
            ),
            'documenttaxrepresentativeaddress'
        );
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
    ): static {
        /**
         * @var array<PostalAddress>
         */
        $documentTaxRepresentativeAddresses = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPostalAddress() ?? []);

        /**
         * @var PostalAddress
         */
        $documentTaxRepresentativeAddress = $documentTaxRepresentativeAddresses[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeaddress')];

        $newAddressLine1 = $documentTaxRepresentativeAddress->getStreetName()?->getValue() ?? '';
        $newAddressLine2 = $documentTaxRepresentativeAddress->getAdditionalStreetName()?->getValue() ?? '';
        $newAddressLine3 = '';
        $newPostcode = $documentTaxRepresentativeAddress->getPostalZone()?->getValue() ?? '';
        $newCity = $documentTaxRepresentativeAddress->getCityName()?->getValue() ?? '';
        $newCountryId = $documentTaxRepresentativeAddress->getCountry()?->getIdentificationCode()?->getValue() ?? '';
        $newSubDivision = $documentTaxRepresentativeAddress->getCountrySubentity()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first the legal information of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyLegalEntity() ?? []
            ),
            'documenttaxrepresentativelegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyLegalEntity() ?? []
            ),
            'documenttaxrepresentativelegalorganisation'
        );
    }

    /**
     * Get the legal information of the tax representative party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentTaxRepresentativeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        /**
         * @var array<PartyLegalEntity>
         */
        $documentTaxRepresentativeLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyLegalEntity() ?? []);

        /**
         * @var PartyLegalEntity
         */
        $documentTaxRepresentativeLegalOrganisation = $documentTaxRepresentativeLegalOrganisations[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativelegalorganisation')];

        $newType = $documentTaxRepresentativeLegalOrganisation->getCompanyID()?->getSchemeID() ?? '';
        $newId = $documentTaxRepresentativeLegalOrganisation->getCompanyID()?->getValue() ?? '';

        $partyNames = $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyName() ?? [];
        $partyName = reset($partyNames);
        $newName = $partyName !== false ? $partyName->getName()?->getValue() ?? '' : '';

        return $this;
    }

    /**
     * Go to the first contact information of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getContact() ?? []
            ),
            'documenttaxrepresentativecontact'
        );
    }

    /**
     * Go to the next contact information of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getContact() ?? []
            ),
            'documenttaxrepresentativecontact'
        );
    }

    /**
     * Get the contact information of the tax representative party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        /**
         * @var array<Contact>
         */
        $documentTaxRepresentativeContacts = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getContact() ?? []);

        /**
         * @var Contact
         */
        $documentTaxRepresentativeContact = $documentTaxRepresentativeContacts[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativecontact')];

        $newPersonName = $documentTaxRepresentativeContact->getName()?->getValue() ?? '';
        $newDepartmentName = '';
        $newPhoneNumber = $documentTaxRepresentativeContact->getTelephone()?->getValue() ?? '';
        $newFaxNumber = $documentTaxRepresentativeContact->getTelefax()?->getValue() ?? '';
        $newEmailAddress = $documentTaxRepresentativeContact->getElectronicMail()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first communication information of the tax representative party
     *
     * @return bool
     */
    public function firstDocumentTaxRepresentativeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getEndpointID() ?? []
            ),
            'documenttaxrepresentativeecommunication'
        );
    }

    /**
     * Go to the next communication information of the tax representative party
     *
     * @return bool
     */
    public function nextDocumentTaxRepresentativeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getEndpointID() ?? []
            ),
            'documenttaxrepresentativeecommunication'
        );
    }

    /**
     * Get communication information of the tax representative party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentTaxRepresentativeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        /**
         * @var array<EndpointID>
         */
        $documentTaxRepresentativeElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getEndpointID() ?? []);

        /**
         * @var EndpointID
         */
        $documentTaxRepresentativeElectronicCommunication = $documentTaxRepresentativeElectronicCommunications[InvoiceSuitePointerUtils::getValue('documenttaxrepresentativeecommunication')];

        $newType = $documentTaxRepresentativeElectronicCommunication->getSchemeID() ?? '';
        $newUri = $documentTaxRepresentativeElectronicCommunication->getValue() ?? '';

        return $this;
    }

    /**
     * Get the name of the product end-user party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserName(
        ?string &$newName
    ): static {
        $newName = '';

        return $this;
    }

    /**
     * Go to the first ID of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the product end-user party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentProductEndUserId(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first global ID of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentProductEndUserGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $newGlobalId = '';
        $newGlobalIdType = '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentProductEndUserTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';

        return $this;
    }

    /**
     * Go to the first address of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserAddress(): bool
    {
        return false;
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
    ): static {
        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';

        return $this;
    }

    /**
     * Go to the first the legal information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the product end-user party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentProductEndUserLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the product end-user party
     *
     * @return bool
     */
    public function firstDocumentProductEndUserCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the product end-user party
     *
     * @return bool
     */
    public function nextDocumentProductEndUserCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the product end-user party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentProductEndUserCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the name of the Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToName(
        ?string &$newName
    ): static {
        $newName = '';

        $shipToMames = $this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyName() ?? [];
        $shipToMame = reset($shipToMames);

        if ($shipToMame === false) {
            return $this;
        }

        $newName = $shipToMame->getName()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentShipToIds(),
            'documentshiptoid'
        );
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentShipToIds(),
            'documentshiptoid'
        );
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipToId(
        ?string &$newId
    ): static {
        /**
         * @var array<ID>
         */
        $documentShipToIds = $this->resolveDocumentShipToIds();

        /**
         * @var ID
         */
        $documentShipToId = $documentShipToIds[InvoiceSuitePointerUtils::getValue('documentshiptoid')];

        $newId = $documentShipToId->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentShipToGlobalIds(),
            'documentshiptoglobalid'
        );
    }

    /**
     * Go to the next global ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentShipToGlobalIds(),
            'documentshiptoglobalid'
        );
    }

    /**
     * Get the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        /**
         * @var array<ID>
         */
        $documentShipToGlobalIds = $this->resolveDocumentShipToGlobalIds();

        /**
         * @var ID
         */
        $documentShipToGlobalId = $documentShipToGlobalIds[InvoiceSuitePointerUtils::getValue('documentshiptoglobalid')];

        $newGlobalId = $documentShipToGlobalId->getValue() ?? '';
        $newGlobalIdType = $documentShipToGlobalId->getSchemeID() ?? '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyTaxScheme() ?? []
            ),
            'documentshiptotaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyTaxScheme() ?? []
            ),
            'documentshiptotaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        /**
         * @var array<PartyTaxScheme>
         */
        $documentShipToTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->resolveFirstDocumentDelivery()?->getDeliveryParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var PartyTaxScheme
         */
        $documentShipToTaxRegistration = $documentShipToTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentshiptotaxregistration')];

        $newTaxRegistrationType = $documentShipToTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? '';
        $newTaxRegistrationId = $documentShipToTaxRegistration->getCompanyID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getAddress() ?? []
            ),
            'documentshiptoaddress'
        );
    }

    /**
     * Go to the next address of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getAddress() ?? []
            ),
            'documentshiptoaddress'
        );
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
    ): static {
        /**
         * @var array<PostalAddress>
         */
        $documentShipToAddresses = InvoiceSuiteArrayUtils::ensure($this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getAddress() ?? []);

        /**
         * @var PostalAddress
         */
        $documentShipToAddress = $documentShipToAddresses[InvoiceSuitePointerUtils::getValue('documentshiptoaddress')];

        $newAddressLine1 = $documentShipToAddress->getStreetName()?->getValue() ?? '';
        $newAddressLine2 = $documentShipToAddress->getAdditionalStreetName()?->getValue() ?? '';
        $newAddressLine3 = '';
        $newPostcode = $documentShipToAddress->getPostalZone()?->getValue() ?? '';
        $newCity = $documentShipToAddress->getCityName()?->getValue() ?? '';
        $newCountryId = $documentShipToAddress->getCountry()?->getIdentificationCode()?->getValue() ?? '';
        $newSubDivision = $documentShipToAddress->getCountrySubentity()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the name of the ultimate Ship-To party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToName(
        ?string &$newName
    ): static {
        $newName = '';

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentUltimateShipToId(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $newGlobalId = '';
        $newGlobalIdType = '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToAddress(): bool
    {
        return false;
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
    ): static {
        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the name of the Ship-From party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromName(
        ?string &$newName
    ): static {
        $newName = '';

        return $this;
    }

    /**
     * Go to the first ID of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Ship-From party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentShipFromId(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first global ID of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentShipFromGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $newGlobalId = '';
        $newGlobalIdType = '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentShipFromTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';

        return $this;
    }

    /**
     * Go to the first address of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromAddress(): bool
    {
        return false;
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
    ): static {
        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Ship-From party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentShipFromLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-From party
     *
     * @return bool
     */
    public function firstDocumentShipFromCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Ship-From party
     *
     * @return bool
     */
    public function nextDocumentShipFromCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Ship-From party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentShipFromCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the name of the Invoicer party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerName(
        ?string &$newName
    ): static {
        $newName = '';

        return $this;
    }

    /**
     * Go to the first ID of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Invoicer party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoicerId(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoicerGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $newGlobalId = '';
        $newGlobalIdType = '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoicerTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';

        return $this;
    }

    /**
     * Go to the first address of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerAddress(): bool
    {
        return false;
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
    ): static {
        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Invoicer party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoicerLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicer party
     *
     * @return bool
     */
    public function firstDocumentInvoicerCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Invoicer party
     *
     * @return bool
     */
    public function nextDocumentInvoicerCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Invoicer party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoicerCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the name of the Invoicee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeName(
        ?string &$newName
    ): static {
        $newName = '';

        return $this;
    }

    /**
     * Go to the first ID of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Invoicee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentInvoiceeId(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first global ID of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next global ID of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentInvoiceeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $newGlobalId = '';
        $newGlobalIdType = '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentInvoiceeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';

        return $this;
    }

    /**
     * Go to the first address of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeAddress(): bool
    {
        return false;
    }

    /**
     * Go to the next address of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeAddress(): bool
    {
        return false;
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
    ): static {
        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';

        return $this;
    }

    /**
     * Go to the first the legal information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Invoicee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentInvoiceeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the Invoicee party
     *
     * @return bool
     */
    public function firstDocumentInvoiceeCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Invoicee party
     *
     * @return bool
     */
    public function nextDocumentInvoiceeCommunication(): bool
    {
        return false;
    }

    /**
     * Get communication information of the Invoicee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentInvoiceeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the name of the Payee party
     *
     * @param  null|string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPayeeName(
        ?string &$newName
    ): static {
        $newName = '';

        $documentPayeeNames = $this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyName() ?? [];
        $documentPayeeName = reset($documentPayeeNames);

        if ($documentPayeeName === false) {
            return $this;
        }

        $newName = $documentPayeeName->getName()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first ID of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentPayeeIds(),
            'documentpayeeid'
        );
    }

    /**
     * Go to the next ID of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentPayeeIds(),
            'documentpayeeid'
        );
    }

    /**
     * Get the ID of the Payee party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPayeeId(
        ?string &$newId
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentPayeeIds = $this->resolveDocumentPayeeIds();

        /**
         * @var PartyIdentification
         */
        $documentPayeeId = $documentPayeeIds[InvoiceSuitePointerUtils::getValue('documentpayeeid')];

        $newId = $documentPayeeId->getID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first global ID of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentPayeeGlobalIds(),
            'documentpayeeglobalid'
        );
    }

    /**
     * Go to the next global ID of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeGlobalId(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentPayeeGlobalIds(),
            'documentpayeeglobalid'
        );
    }

    /**
     * Get the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPayeeGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentPayeeGlobalIds = $this->resolveDocumentPayeeGlobalIds();

        /**
         * @var PartyIdentification
         */
        $documentPayeeGlobalId = $documentPayeeGlobalIds[InvoiceSuitePointerUtils::getValue('documentpayeeglobalid')];

        $newGlobalId = $documentPayeeGlobalId->getID()?->getValue() ?? '';
        $newGlobalIdType = $documentPayeeGlobalId->getID()?->getSchemeID() ?? '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyTaxScheme() ?? []
            ),
            'documentpayeetaxregistration'
        );
    }

    /**
     * Go to the next Tax Registration of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeTaxRegistration(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyTaxScheme() ?? []
            ),
            'documentpayeetaxregistration'
        );
    }

    /**
     * Get the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPayeeTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        /**
         * @var array<PartyTaxScheme>
         */
        $documentPayeeTaxRegistrations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyTaxScheme() ?? []);

        /**
         * @var PartyTaxScheme
         */
        $documentPayeeTaxRegistration = $documentPayeeTaxRegistrations[InvoiceSuitePointerUtils::getValue('documentpayeetaxregistration')];

        $newTaxRegistrationType = $documentPayeeTaxRegistration->getTaxScheme()?->getID()?->getValue() ?? '';
        $newTaxRegistrationId = $documentPayeeTaxRegistration->getCompanyID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first address of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getPostalAddress() ?? []
            ),
            'documentpayeeaddress'
        );
    }

    /**
     * Go to the next address of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeAddress(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getPostalAddress() ?? []
            ),
            'documentpayeeaddress'
        );
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
    ): static {
        /**
         * @var array<PostalAddress>
         */
        $documentPayeeAddresses = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getPayeeParty()?->getPostalAddress() ?? []);

        /**
         * @var PostalAddress
         */
        $documentPayeeAddress = $documentPayeeAddresses[InvoiceSuitePointerUtils::getValue('documentpayeeaddress')];

        $newAddressLine1 = $documentPayeeAddress->getStreetName()?->getValue() ?? '';
        $newAddressLine2 = $documentPayeeAddress->getAdditionalStreetName()?->getValue() ?? '';
        $newAddressLine3 = '';
        $newPostcode = $documentPayeeAddress->getPostalZone()?->getValue() ?? '';
        $newCity = $documentPayeeAddress->getCityName()?->getValue() ?? '';
        $newCountryId = $documentPayeeAddress->getCountry()?->getIdentificationCode()?->getValue() ?? '';
        $newSubDivision = $documentPayeeAddress->getCountrySubentity()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first the legal information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyLegalEntity() ?? []
            ),
            'documentpayeelegalorganisation'
        );
    }

    /**
     * Go to the next the legal information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeLegalOrganisation(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyLegalEntity() ?? []
            ),
            'documentpayeelegalorganisation'
        );
    }

    /**
     * Get the legal information of the Payee party
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPayeeLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        /**
         * @var array<PartyLegalEntity>
         */
        $documentPayeeLegalOrganisations = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyLegalEntity() ?? []);

        /**
         * @var PartyLegalEntity
         */
        $documentPayeeLegalOrganisation = $documentPayeeLegalOrganisations[InvoiceSuitePointerUtils::getValue('documentpayeelegalorganisation')];

        $newType = $documentPayeeLegalOrganisation->getCompanyID()?->getSchemeID() ?? '';
        $newId = $documentPayeeLegalOrganisation->getCompanyID()?->getValue() ?? '';
        $newName = $documentPayeeLegalOrganisation->getRegistrationName()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first contact information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getContact() ?? []
            ),
            'documentpayeecontact'
        );
    }

    /**
     * Go to the next contact information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeContact(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getContact() ?? []
            ),
            'documentpayeecontact'
        );
    }

    /**
     * Get the contact information of the Payee party
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        /**
         * @var array<Contact>
         */
        $documentPayeeContacts = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getPayeeParty()?->getContact() ?? []);

        /**
         * @var Contact
         */
        $documentPayeeContact = $documentPayeeContacts[InvoiceSuitePointerUtils::getValue('documentpayeecontact')];

        $newPersonName = $documentPayeeContact->getName()?->getValue() ?? '';
        $newDepartmentName = '';
        $newPhoneNumber = $documentPayeeContact->getTelephone()?->getValue() ?? '';
        $newFaxNumber = $documentPayeeContact->getTelefax()?->getValue() ?? '';
        $newEmailAddress = $documentPayeeContact->getElectronicMail()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first communication information of the Payee party
     *
     * @return bool
     */
    public function firstDocumentPayeeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getEndpointID() ?? []
            ),
            'documentpayeeecommunication'
        );
    }

    /**
     * Go to the next communication information of the Payee party
     *
     * @return bool
     */
    public function nextDocumentPayeeCommunication(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPayeeParty()?->getEndpointID() ?? []
            ),
            'documentpayeeecommunication'
        );
    }

    /**
     * Get communication information of the Payee party
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPayeeCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        /**
         * @var array<EndpointID>
         */
        $documentPayeeElectronicCommunications = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getPayeeParty()?->getEndpointID() ?? []);

        /**
         * @var EndpointID
         */
        $documentPayeeElectronicCommunication = $documentPayeeElectronicCommunications[InvoiceSuitePointerUtils::getValue('documentpayeeecommunication')];

        $newType = $documentPayeeElectronicCommunication->getSchemeID() ?? '';
        $newUri = $documentPayeeElectronicCommunication->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first Payment mean
     *
     * @return bool
     */
    public function firstDocumentPaymentMean(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPaymentMeans() ?? []
            ),
            'documentpaymentmean'
        );
    }

    /**
     * Go to the next Payment mean
     *
     * @return bool
     */
    public function nextDocumentPaymentMean(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPaymentMeans() ?? []
            ),
            'documentpaymentmean'
        );
    }

    /**
     * Get Payment mean
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
    ): static {
        /**
         * @var array<PaymentMeans>
         */
        $documentPaymentMeans = $this->getUblInvoiceRootObject()->getPaymentMeans() ?? [];

        /**
         * @var PaymentMeans
         */
        $documentPaymentMean = $documentPaymentMeans[InvoiceSuitePointerUtils::getValue('documentpaymentmean')];

        $paymentMeanPaymentIds = $documentPaymentMean->getPaymentID() ?? [];
        $paymentMeanPaymentId = reset($paymentMeanPaymentIds);

        $newTypeCode = $documentPaymentMean->getPaymentMeansCode()?->getValue() ?? '';
        $newName = $documentPaymentMean->getPaymentMeansCode()?->getName() ?? '';
        $newFinancialCardId = $documentPaymentMean->getCardAccount()?->getPrimaryAccountNumberID()?->getValue() ?? '';
        $newFinancialCardHolder = $documentPaymentMean->getCardAccount()?->getHolderName()?->getValue() ?? '';
        $newBuyerIban = $documentPaymentMean->getPaymentMandate()?->getPayerFinancialAccount()?->getID()?->getValue() ?? '';
        $newPayeeIban = $documentPaymentMean->getPayeeFinancialAccount()?->getId()?->getValue() ?? '';
        $newPayeeAccountName = $documentPaymentMean->getPayeeFinancialAccount()?->getName()?->getValue() ?? '';
        $newPayeeProprietaryId = '';
        $newPayeeBic = $documentPaymentMean->getPayeeFinancialAccount()?->getFinancialInstitutionBranch()?->getID()?->getValue() ?? '';
        $newPaymentReference = $paymentMeanPaymentId !== false ? $paymentMeanPaymentId->getValue() ?? '' : '';
        $newMandate = $documentPaymentMean->getPaymentMandate()?->getID()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first Unique bank details of the payee or the seller
     *
     * @return bool
     */
    public function firstDocumentPaymentCreditorReferenceID(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            $this->resolveDocumentPaymentCreditorReferenceIDs(),
            'documentpaymentcreditorreferences'
        );
    }

    /**
     * Go to the next Unique bank details of the payee or the seller
     *
     * @return bool
     */
    public function nextDocumentPaymentCreditorReferenceID(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            $this->resolveDocumentPaymentCreditorReferenceIDs(),
            'documentpaymentcreditorreferences'
        );
    }

    /**
     * Get Unique bank details of the payee or the seller
     *
     * @param  null|string $newId Creditor identifier
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPaymentCreditorReferenceID(
        ?string &$newId
    ): static {
        /**
         * @var array<PartyIdentification>
         */
        $documentCreditorReferences = InvoiceSuiteArrayUtils::ensure($this->resolveDocumentPaymentCreditorReferenceIDs());

        /**
         * @var PartyIdentification
         */
        $documentCreditorReference = $documentCreditorReferences[InvoiceSuitePointerUtils::getValue('documentpaymentcreditorreferences')];

        $newId = $documentCreditorReference->getID()->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first link to the invoice issued by the seller
     *
     * @return bool
     */
    public function firstDocumentPaymentReference(): bool
    {
        return false;
    }

    /**
     * Go to the next link to the invoice issued by the seller
     *
     * @return bool
     */
    public function nextDocumentPaymentReference(): bool
    {
        return false;
    }

    /**
     * Get a link to the invoice issued by the seller
     *
     * @param  null|string $newId A text value used to link the payment to the invoice issued by the seller
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPaymentReference(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentTerm(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPaymentTerms() ?? []
            ),
            'documentpaymentterm'
        );
    }

    /**
     * Go to the next payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentTerm(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getPaymentTerms() ?? []
            ),
            'documentpaymentterm'
        );
    }

    /**
     * Get payment term
     *
     * @param  null|string            $newDescription Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     Date by which payment is due
     * @param  null|string            $newMandate     Identification of the mandate reference
     * @return static
     *
     * @phpstan-param-out string $newDescription
     * @phpstan-param-out string $newMandate
     */
    public function getDocumentPaymentTerm(
        ?string &$newDescription,
        ?DateTimeInterface &$newDueDate,
        ?string &$newMandate
    ): static {
        /**
         * @var array<PaymentTerms>
         */
        $documentPaymentTerms = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getPaymentTerms() ?? []);

        /**
         * @var PaymentTerms
         */
        $documentPaymentTerm = $documentPaymentTerms[InvoiceSuitePointerUtils::getValue('documentpaymentterm')];

        $documentPaymentTermNotes = $documentPaymentTerm->getNote() ?? [];
        $documentPaymentTermNote = reset($documentPaymentTermNotes);

        $newDescription = $documentPaymentTermNote !== false ? ($documentPaymentTermNote->getValue() ?? '') : '';
        $newDueDate = $this->getUblInvoiceRootObject()->getDueDate();
        $newMandate = '';

        return $this;
    }

    /**
     * Go to the first payment discount term in latest resolved payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Go to the last payment discount term in latest resolved payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentDiscountTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Get payment discount terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount      Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  Amount of the payment discount
     * @param  null|float             $newDiscountPercent Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        Due date reference date
     * @param  null|float             $newBasePeriod      Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  Maturity period (unit)
     * @return static
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
    ): static {
        $newBaseAmount = 0.0;
        $newDiscountAmount = 0.0;
        $newDiscountPercent = 0.0;
        $newBaseDate = null;
        $newBasePeriod = 0.0;
        $newBasePeriodUnit = '';

        return $this;
    }

    /**
     * Go to the first payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    public function firstDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Go to the last payment penalty term in latest resolved payment term
     *
     * @return bool
     */
    public function nextDocumentPaymentPenaltyTermsInLastPaymentTerm(): bool
    {
        return false;
    }

    /**
     * Get payment penalty terms in latest resolved payment terms
     *
     * @param  null|float             $newBaseAmount     Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       Due date reference date
     * @param  null|float             $newBasePeriod     Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit Maturity period (unit)
     * @return static
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
    ): static {
        $newBaseAmount = 0.0;
        $newPenaltyAmount = 0.0;
        $newPenaltyPercent = 0.0;
        $newBaseDate = null;
        $newBasePeriod = 0.0;
        $newBasePeriodUnit = '';

        return $this;
    }

    /**
     * Go to the first Document Tax Breakdown
     *
     * @return bool
     */
    public function firstDocumentTax(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveTaxTotal()?->getTaxSubtotal() ?? []
            ),
            'documenttax'
        );
    }

    /**
     * Go to the next Document Tax Breakdown
     *
     * @return bool
     */
    public function nextDocumentTax(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveTaxTotal()?->getTaxSubtotal() ?? []
            ),
            'documenttax'
        );
    }

    /**
     * Get Document Tax Breakdown
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
     *
     * @phpstan-param-out string $newTaxCategory
     * @phpstan-param-out string $newTaxType
     * @phpstan-param-out float $newBasisAmount
     * @phpstan-param-out float $newTaxAmount
     * @phpstan-param-out float $newTaxPercent
     * @phpstan-param-out string $newExemptionReason
     * @phpstan-param-out string $newExemptionReasonCode
     * @phpstan-param-out DateTimeInterface|null $newTaxDueDate
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
    ): static {
        /**
         * @var array<TaxSubtotal>
         */
        $documentTaxes = InvoiceSuiteArrayUtils::ensure($this->resolveTaxTotal()?->getTaxSubtotal() ?? []);

        /**
         * @var TaxSubtotal
         */
        $documentTax = $documentTaxes[InvoiceSuitePointerUtils::getValue('documenttax')];

        $taxExceptionReasons = $documentTax->getTaxCategory()?->getTaxExemptionReason() ?? [];
        $taxExceptionReason = reset($taxExceptionReasons);

        $newTaxCategory = $documentTax->getTaxCategory()?->getID()?->getValue() ?? '';
        $newTaxType = $documentTax->getTaxCategory()?->getTaxScheme()?->getID()?->getValue() ?? '';
        $newBasisAmount = $documentTax->getTaxableAmount()?->getValue() ?? 0.0;
        $newTaxAmount = $documentTax->getTaxAmount()?->getValue() ?? 0.0;
        $newTaxPercent = $documentTax->getTaxCategory()?->getPercent()?->getValue() ?? 0.0;
        $newExemptionReason = $taxExceptionReason !== false ? ($taxExceptionReason->getValue() ?? '') : '';
        $newExemptionReasonCode = $documentTax->getTaxCategory()?->getTaxExemptionReasonCode()?->getValue() ?? '';
        $newTaxDueDate = $this->getUblInvoiceRootObject()->getTaxPointDate();
        $newTaxDueCode = '';

        return $this;
    }

    /**
     * Go to the first Document Allowance/Charge
     *
     * @return bool
     */
    public function firstDocumentAllowanceCharge(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAllowanceCharge() ?? []
            ),
            'documentallowancecharge'
        );
    }

    /**
     * Go to the next Document Allowance/Charge
     *
     * @return bool
     */
    public function nextDocumentAllowanceCharge(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getAllowanceCharge() ?? []
            ),
            'documentallowancecharge'
        );
    }

    /**
     * Get Document Allowance/Charge
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
    ): static {
        /**
         * @var array<AllowanceCharge>
         */
        $documentAllowanceCharges = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getAllowanceCharge() ?? []);

        /**
         * @var AllowanceCharge
         */
        $documentAllowanceCharge = $documentAllowanceCharges[InvoiceSuitePointerUtils::getValue('documentallowancecharge')];

        $documentAllowanceChargeTaxCategories = $documentAllowanceCharge->getTaxCategory() ?? [];
        $documentAllowanceChargeTaxCategory = reset($documentAllowanceChargeTaxCategories);

        $documentAllowanceChargeReasons = $documentAllowanceCharge->getAllowanceChargeReason() ?? [];
        $documentAllowanceChargeReason = reset($documentAllowanceChargeReasons);

        $newChargeIndicator = $documentAllowanceCharge->getChargeIndicator() ?? false;
        $newAllowanceChargeAmount = $documentAllowanceCharge->getAmount()?->getValue() ?? 0.0;
        $newAllowanceChargeBaseAmount = $documentAllowanceCharge->getBaseAmount()?->getValue() ?? 0.0;
        $newTaxCategory = $documentAllowanceChargeTaxCategory !== false ? ($documentAllowanceChargeTaxCategory->getID()?->getValue() ?? '') : '';
        $newTaxType = $documentAllowanceChargeTaxCategory !== false ? ($documentAllowanceChargeTaxCategory->getTaxScheme()?->getID()?->getValue() ?? '') : '';
        $newTaxPercent = $documentAllowanceChargeTaxCategory !== false ? ($documentAllowanceChargeTaxCategory->getPercent()?->getValue() ?? 0.0) : 0.0;
        $newAllowanceChargeReason = $documentAllowanceChargeReason !== false ? ($documentAllowanceChargeReason->getValue() ?? '') : '';
        $newAllowanceChargeReasonCode = $documentAllowanceCharge->getAllowanceChargeReasonCode()?->getValue() ?? '';
        $newAllowanceChargePercent = $documentAllowanceCharge->getMultiplierFactorNumeric()?->getValue() ?? 0.0;

        return $this;
    }

    /**
     * Go to the first Document Logistic Service Charge
     *
     * @return bool
     */
    public function firstDocumentLogisticServiceCharge(): bool
    {
        return false;
    }

    /**
     * Go to the next Document Logistic Service Charge
     *
     * @return bool
     */
    public function nextDocumentLogisticServiceCharge(): bool
    {
        return false;
    }

    /**
     * Get Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount Amount of the service fee
     * @param  null|string $newDescription  Identification of the service fee
     * @param  null|string $newTaxCategory  Coded description of the tax category
     * @param  null|string $newTaxType      Coded description of the tax type
     * @param  null|float  $newTaxPercent   Tax Rate (Percentage)
     * @return static
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
    ): static {
        $newChargeAmount = 0.0;
        $newDescription = '';
        $newTaxCategory = '';
        $newTaxType = '';
        $newTaxPercent = 0.0;

        return $this;
    }

    /**
     * Get the document summation
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
    ): static {
        $documentSummation = $this->getUblInvoiceRootObject()->getLegalMonetaryTotal();

        $taxTotalAmounts = $this->getUblInvoiceRootObject()->getTaxTotal() ?? [];
        $taxTotalAmount = reset($taxTotalAmounts);
        $taxTotalAmount2 = next($taxTotalAmounts);

        $newNetAmount = $documentSummation?->getLineExtensionAmount()?->getValue() ?? 0.0;
        $newChargeTotalAmount = $documentSummation?->getChargeTotalAmount()?->getValue() ?? 0.0;
        $newDiscountTotalAmount = $documentSummation?->getAllowanceTotalAmount()?->getValue() ?? 0.0;
        $newTaxBasisAmount = $documentSummation?->getTaxExclusiveAmount()?->getValue() ?? 0.0;
        $newTaxTotalAmount = $taxTotalAmount !== false ? ($taxTotalAmount->getTaxAmount()?->getValue() ?? 0.0) : 0.0;
        $newTaxTotalAmount2 = $taxTotalAmount2 !== false ? ($taxTotalAmount2->getTaxAmount()?->getValue() ?? 0.0) : 0.0;
        $newGrossAmount = $documentSummation?->getTaxInclusiveAmount()?->getValue() ?? 0.0;
        $newDueAmount = $documentSummation?->getPayableAmount()?->getValue() ?? 0.0;
        $newPrepaidAmount = $documentSummation?->getPrepaidAmount()?->getValue() ?? 0.0;
        $newRoungingAmount = $documentSummation?->getPayableRoundingAmount()?->getValue() ?? 0.0;

        return $this;
    }

    /**
     * Go to the first document position
     *
     * @return bool
     */
    public function firstDocumentPosition(): bool
    {
        $this->resetCurrentDocumentPositionSubPointers();

        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getInvoiceLine() ?? []
            ),
            'documentposition'
        );
    }

    /**
     * Go to the next document position
     *
     * @return bool
     */
    public function nextDocumentPosition(): bool
    {
        $this->resetCurrentDocumentPositionSubPointers();

        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->getUblInvoiceRootObject()->getInvoiceLine() ?? []
            ),
            'documentposition'
        );
    }

    /**
     * Get position general information
     *
     * @param  null|string $newPositionId           Identification of the position
     * @param  null|string $newParentPositionId     Identification of the parent position
     * @param  null|string $newLineStatusCode       Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode Type to specify whether the invoice line is
     * @return static
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
    ): static {
        $documentPosition = $this->resolveCurrentDocumentPosition();

        $newPositionId = $documentPosition->getID()?->getValue() ?? '';
        $newParentPositionId = '';
        $newLineStatusCode = '';
        $newLineStatusReasonCode = '';

        return $this;
    }

    /**
     * Go to the first text information of the latest position
     *
     * @return bool
     */
    public function firstDocumentPositionNote(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getNote() ?? []),
            'documentpositionnote'
        );
    }

    /**
     * Go to the next text information of the latest position
     *
     * @return bool
     */
    public function nextDocumentPositionNote(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getNote() ?? []),
            'documentpositionnote'
        );
    }

    /**
     * Get text information from latest position
     *
     * @param  null|string $newContent     Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode Code for qualifying the free text for the invoice item
     * @return static
     *
     * @phpstan-param-out string $newContent
     * @phpstan-param-out string $newContentCode
     * @phpstan-param-out string $newSubjectCode
     */
    public function getDocumentPositionNote(
        ?string &$newContent,
        ?string &$newContentCode,
        ?string &$newSubjectCode
    ): static {
        /**
         * @var array<Note>
         */
        $documentPositionNotes = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getNote() ?? []);

        /**
         * @var Note
         */
        $documentPositionNote = $documentPositionNotes[InvoiceSuitePointerUtils::getValue('documentpositionnote')];

        $newContent = $documentPositionNote->getValue() ?? '';
        $newContentCode = '';
        $newSubjectCode = '';

        return $this;
    }

    /**
     * Get product details from latest position
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
    ): static {
        /**
         * @var null|Item
         */
        $documentPositionProduct = $this->resolveCurrentDocumentPosition()->getItem();

        /**
         * @var array<Description>
         */
        $documentPositionProductDescriptions = $documentPositionProduct?->getDescription() ?? [];

        /**
         * @var Description
         */
        $documentPositionProductDescription = reset($documentPositionProductDescriptions);

        $newProductId = '';
        $newProductName = $documentPositionProduct?->getName()?->getValue() ?? '';
        $newProductDescription = $documentPositionProductDescription !== false ? ($documentPositionProductDescription->getValue() ?? '') : '';
        $newProductSellerId = $documentPositionProduct?->getSellersItemIdentification()?->getID()?->getValue() ?? '';
        $newProductBuyerId = $documentPositionProduct?->getBuyersItemIdentification()?->getID()?->getValue() ?? '';
        $newProductGlobalId = $documentPositionProduct?->getStandardItemIdentification()?->getID()?->getValue() ?? '';
        $newProductGlobalIdType = $documentPositionProduct?->getStandardItemIdentification()?->getID()?->getSchemeID() ?? '';
        $newProductIndustryId = '';
        $newProductModelId = '';
        $newProductBatchId = '';
        $newProductBrandName = '';
        $newProductModelName = '';
        $newProductOriginTradeCountry = $documentPositionProduct?->getOriginCountry()?->getName()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first product characteristics from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionProductCharacteristic(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getItem()?->getAdditionalItemProperty() ?? []),
            'documentpositionproductcharacteristic'
        );
    }

    /**
     * Go to the next product characteristics from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionProductCharacteristic(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getItem()?->getAdditionalItemProperty() ?? []),
            'documentpositionproductcharacteristic'
        );
    }

    /**
     * Get product characteristics from latest position
     *
     * @param  null|string $newProductCharacteristicDescription  Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  Unit of value of the characteristic
     * @return static
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
    ): static {
        /**
         * @var array<AdditionalItemProperty>
         */
        $documentPositionProductCharacteristics = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getItem()?->getAdditionalItemProperty() ?? []);

        /**
         * @var AdditionalItemProperty
         */
        $documentPositionProductCharacteristic = $documentPositionProductCharacteristics[InvoiceSuitePointerUtils::getValue('documentpositionproductcharacteristic')];

        $newProductCharacteristicDescription = $documentPositionProductCharacteristic->getName()?->getValue() ?? '';
        $newProductCharacteristicValue = $documentPositionProductCharacteristic->getValue()?->getValue() ?? '';
        $newProductCharacteristicType = '';
        $newProductCharacteristicMeasureValue = $documentPositionProductCharacteristic->getValueQuantity()?->getValue() ?? 0.0;
        $newProductCharacteristicMeasureUnit = $documentPositionProductCharacteristic->getValueQuantity()?->getUnitCode() ?? '';

        return $this;
    }

    /**
     * Go to the first product classification from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionProductClassification(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getItem()?->getCommodityClassification() ?? []),
            'documentpositionproductclassification'
        );
    }

    /**
     * Go to the next product classification from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionProductClassification(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getItem()?->getCommodityClassification() ?? []),
            'documentpositionproductclassification'
        );
    }

    /**
     * Get product classification from latest position
     *
     * @param  null|string $newProductClassificationCode          Classification identifier
     * @param  null|string $newProductClassificationListId        Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname Name with which an article can be classified according to type or quality
     * @return static
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
    ): static {
        /**
         * @var array<CommodityClassification>
         */
        $documentPositionProductClassifications = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getItem()?->getCommodityClassification() ?? []);

        /**
         * @var CommodityClassification
         */
        $documentPositionProductClassification = $documentPositionProductClassifications[InvoiceSuitePointerUtils::getValue('documentpositionproductclassification')];

        $newProductClassificationCode = $documentPositionProductClassification->getItemClassificationCode()?->getValue() ?? '';
        $newProductClassificationListId = $documentPositionProductClassification->getItemClassificationCode()?->getListID() ?? '';
        $newProductClassificationListVersionId = $documentPositionProductClassification->getItemClassificationCode()?->getListVersionID() ?? '';
        $newProductClassificationCodeClassname = '';

        return $this;
    }

    /**
     * Go to the first referenced product in latest position
     *
     * @return bool
     */
    public function firstDocumentPositionReferencedProduct(): bool
    {
        return false;
    }

    /**
     * Go to the next referenced product in latest position
     *
     * @return bool
     */
    public function nextDocumentPositionReferencedProduct(): bool
    {
        return false;
    }

    /**
     * Get referenced product from latest position
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
    ): static {
        $newProductId = '';
        $newProductName = '';
        $newProductDescription = '';
        $newProductSellerId = '';
        $newProductBuyerId = '';
        $newProductGlobalId = '';
        $newProductGlobalIdType = '';
        $newProductIndustryId = '';
        $newProductUnitQuantity = 0.0;
        $newProductUnitQuantityUnit = '';

        return $this;
    }

    /**
     * Go to the first associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionSellerOrderReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated seller's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionSellerOrderReference(): bool
    {
        return false;
    }

    /**
     * Get the associated seller's order confirmation (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Seller's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionSellerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getOrderLineReference() ?? []),
            'documentpositionbuyerorderreference'
        );
    }

    /**
     * Go to the next associated buyer's order confirmation (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionBuyerOrderReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getOrderLineReference() ?? []),
            'documentpositionbuyerorderreference'
        );
    }

    /**
     * Get the associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionBuyerOrderReference(
        ?string &$newReferenceNumber = null,
        ?string &$newReferenceLineNumber = null,
        ?DateTimeInterface &$newReferenceDate = null
    ): static {
        /**
         * @var array<OrderLineReference>
         */
        $documentPositionBuyerOrderReferences = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getOrderLineReference() ?? []);

        /**
         * @var OrderLineReference
         */
        $documentPositionBuyerOrderReference = $documentPositionBuyerOrderReferences[InvoiceSuitePointerUtils::getValue('documentpositionbuyerorderreference')];

        $newReferenceNumber = '';
        $newReferenceLineNumber = $documentPositionBuyerOrderReference->getLineID()?->getValue() ?? '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated quotation (line reference)
     *
     * @return bool
     */
    public function firstDocumentPositionQuotationReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated quotation (line reference)
     *
     * @return bool
     */
    public function nextDocumentPositionQuotationReference(): bool
    {
        return false;
    }

    /**
     * Get the associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionQuotationReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first associated contract (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionContractReference(): bool
    {
        return false;
    }

    /**
     * Go to the next associated contract (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionContractReference(): bool
    {
        return false;
    }

    /**
     * Get the associated contract (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       Buyer's order confirmation date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionContractReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to first additional associated document (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalReference(): bool
    {
        return false;
    }

    /**
     * Go to next additional associated document (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalReference(): bool
    {
        return false;
    }

    /**
     * Get an additional associated document (line reference) from latest position
     *
     * @param  null|string                 $newReferenceNumber        Additional document number
     * @param  null|string                 $newReferenceLineNumber    Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          Additional document date
     * @param  null|string                 $newTypeCode               Additional document type code
     * @param  null|string                 $newReferenceTypeCode      Additional document reference-type code
     * @param  null|string                 $newDescription            Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment Additional document attachment
     * @return static
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
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        $newTypeCode = '';
        $newReferenceTypeCode = '';
        $newDescription = '';
        $newInvoiceSuiteAttachment = null;

        return $this;
    }

    /**
     * Go to the first an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return false;
    }

    /**
     * Go to the next an additional ultimate customer order reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateCustomerOrderReference(): bool
    {
        return false;
    }

    /**
     * Get an additional ultimate customer order reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       Ultimate customer order date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionUltimateCustomerOrderReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionDespatchAdviceReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional despatch advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionDespatchAdviceReference(): bool
    {
        return false;
    }

    /**
     * Get an additional despatch advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Shipping notification number
     * @param  null|string            $newReferenceLineNumber Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Shipping notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionDespatchAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionReceivingAdviceReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional receiving advice reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionReceivingAdviceReference(): bool
    {
        return false;
    }

    /**
     * Get an additional receiving advice reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Receipt notification number
     * @param  null|string            $newReferenceLineNumber Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       Receipt notification date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionReceivingAdviceReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional delivery note reference (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionDeliveryNoteReference(): bool
    {
        return false;
    }

    /**
     * Get an additional delivery note reference (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Delivery slip number
     * @param  null|string            $newReferenceLineNumber Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       Delivery slip date
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newReferenceLineNumber
     * @phpstan-param-out null $newReferenceDate
     */
    public function getDocumentPositionDeliveryNoteReference(
        ?string &$newReferenceNumber,
        ?string &$newReferenceLineNumber,
        ?DateTimeInterface &$newReferenceDate
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;

        return $this;
    }

    /**
     * Go to the first additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionInvoiceReference(): bool
    {
        return false;
    }

    /**
     * Go to the next additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionInvoiceReference(): bool
    {
        return false;
    }

    /**
     * Get an additional invoice document (reference to preceding invoice) (line reference) from latest position
     *
     * @param  null|string            $newReferenceNumber     Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       Date of the previous invoice
     * @param  null|string            $newTypeCode            Type code of previous invoice
     * @return static
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
    ): static {
        $newReferenceNumber = '';
        $newReferenceLineNumber = '';
        $newReferenceDate = null;
        $newTypeCode = '';

        return $this;
    }

    /**
     * Go to the first additional object reference
     *
     * @return bool
     */
    public function firstDocumentPositionAdditionalObjectReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getDocumentReference() ?? []),
            'documentpositionadditionalobjectreference'
        );
    }

    /**
     * Go to the next additional object reference
     *
     * @return bool
     */
    public function nextDocumentPositionAdditionalObjectReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getDocumentReference() ?? []),
            'documentpositionadditionalobjectreference'
        );
    }

    /**
     * Get an additional object reference
     *
     * @param  null|string $newReferenceNumber   Object identification at the level on position-level
     * @param  null|string $newTypeCode          Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     *
     * @phpstan-param-out string $newReferenceNumber
     * @phpstan-param-out string $newTypeCode
     * @phpstan-param-out string $newReferenceTypeCode
     */
    public function getDocumentPositionAdditionalObjectReference(
        ?string &$newReferenceNumber = null,
        ?string &$newTypeCode = null,
        ?string &$newReferenceTypeCode = null
    ): static {
        /**
         * @var array<DocumentReference>
         */
        $documentPositionAdditionalObjectReferences = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getDocumentReference() ?? []);

        /**
         * @var DocumentReference
         */
        $documentPositionAdditionalObjectReferences = $documentPositionAdditionalObjectReferences[InvoiceSuitePointerUtils::getValue('documentpositionadditionalobjectreference')];

        $newReferenceNumber = $documentPositionAdditionalObjectReferences->getID()?->getValue() ?? "";
        $newTypeCode = $documentPositionAdditionalObjectReferences->getDocumentTypeCode()?->getValue() ?? "";
        $newReferenceTypeCode = '';

        return $this;
    }

    /**
     * Returns true if a gross price was specified
     *
     * @return bool
     */
    public function firstDcumentPositionGrossPrice(): bool
    {
        return false;
    }

    /**
     * Get the position's gross price from latest position
     *
     * @param  null|float  $newGrossPrice                  Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     *
     * @phpstan-param-out float $newGrossPrice
     * @phpstan-param-out float $newGrossPriceBasisQuantity
     * @phpstan-param-out string $newGrossPriceBasisQuantityUnit
     */
    public function getDocumentPositionGrossPrice(
        ?float &$newGrossPrice,
        ?float &$newGrossPriceBasisQuantity,
        ?string &$newGrossPriceBasisQuantityUnit
    ): static {
        $newGrossPrice = 0.0;
        $newGrossPriceBasisQuantity = 0.0;
        $newGrossPriceBasisQuantityUnit = '';

        return $this;
    }

    /**
     * Go to the first discount or charge from the gross price from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return false;
    }

    /**
     * Go to the next discount or charge from the gross price from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionGrossPriceAllowanceCharge(): bool
    {
        return false;
    }

    /**
     * Get discount or charge from the gross price from latest position
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  Reason code for discount or charge (free text)
     * @return static
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
    ): static {
        $newGrossPriceAllowanceChargeAmount = 0.0;
        $newIsCharge = false;
        $newGrossPriceAllowanceChargePercent = 0.0;
        $newGrossPriceAllowanceChargeBasisAmount = 0.0;
        $newGrossPriceAllowanceChargeReason = '';
        $newGrossPriceAllowanceChargeReasonCode = '';

        return $this;
    }

    /**
     * Returns true if a net price was specified
     *
     * @return bool
     */
    public function firstDocumentPositionNetPrice(): bool
    {
        return !is_null($this->resolveCurrentDocumentPosition()->getPrice());
    }

    /**
     * Get the position's net price from latest position
     *
     * @param  null|float  $newNetPrice                  Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit Unit code of the number of item units for which the price applies
     * @return static
     *
     * @phpstan-param-out float $newNetPrice
     * @phpstan-param-out float $newNetPriceBasisQuantity
     * @phpstan-param-out string $newNetPriceBasisQuantityUnit
     */
    public function getDocumentPositionNetPrice(
        ?float &$newNetPrice,
        ?float &$newNetPriceBasisQuantity,
        ?string &$newNetPriceBasisQuantityUnit
    ): static {
        $documentPosition = $this->resolveCurrentDocumentPosition();

        $newNetPrice = $documentPosition->getPrice()?->getPriceAmount()?->getValue() ?? 0.0;
        $newNetPriceBasisQuantity = $documentPosition->getPrice()?->getBaseQuantity()?->getValue() ?? 0.0;
        $newNetPriceBasisQuantityUnit = $documentPosition->getPrice()?->getBaseQuantity()?->getUnitCode() ?? '';

        return $this;
    }

    /**
     * Get the position's net price included tax from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
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
    ): static {
        $newTaxCategory = '';
        $newTaxType = '';
        $newTaxAmount = 0.0;
        $newTaxPercent = 0.0;
        $newExemptionReason = '';
        $newExemptionReasonCode = '';

        return $this;
    }

    /**
     * Get the position's quantities from latest position
     *
     * @param  null|float  $newQuantity               Invoiced quantity
     * @param  null|string $newQuantityUnit           Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity     Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit Charge Free quantity unit
     * @param  null|float  $newPackageQuantity        Package quantity
     * @param  null|string $newPackageQuantityUnit    Package quantity unit
     * @return static
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
    ): static {
        $documentPosition = $this->resolveCurrentDocumentPosition();

        $newQuantity = $documentPosition->getInvoicedQuantity()?->getValue() ?? 0.0;
        $newQuantityUnit = $documentPosition->getInvoicedQuantity()?->getUnitCode() ?? '';
        $newChargeFreeQuantity = 0.0;
        $newChargeFreeQuantityUnit = '';
        $newPackageQuantity = 0.0;
        $newPackageQuantityUnit = '';

        return $this;
    }

    /**
     * Get the name of the Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionShipToName(
        ?string &$newName
    ): static {
        $newName = '';

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party
     *
     * @return bool
     */
    public function firstDocumentPositionShipToId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-To party
     *
     * @return bool
     */
    public function nextDocumentPositionShipToId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPositionShipToId(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPositionShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $newGlobalId = '';
        $newGlobalIdType = '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';

        return $this;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToAddress(): bool
    {
        return false;
    }

    /**
     * Go to the first address of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToAddress(): bool
    {
        return false;
    }

    /**
     * Get the address of the Ship-To party from latest position
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
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
    ): static {
        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';

        return $this;
    }

    /**
     * Go to the first the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get the communication information of the Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPositionShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the name of the ultimate Ship-To party from latest position
     *
     * @param  string $newName the full formal name under which the party is registered
     * @return static
     *
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionUltimateShipToName(
        ?string &$newName
    ): static {
        $newName = '';

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToId(): bool
    {
        return false;
    }

    /**
     * Get the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId An identifier of the party. In many systems, identification is key information.
     * @return static
     *
     * @phpstan-param-out string $newId
     */
    public function getDocumentPositionUltimateShipToId(
        ?string &$newId
    ): static {
        $newId = '';

        return $this;
    }

    /**
     * Go to the first ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Go to the next ID of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToGlobalId(): bool
    {
        return false;
    }

    /**
     * Get the Global ID of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newGlobalId     a global identifier of the party
     * @param  null|string $newGlobalIdType type of the global identifier of the party
     * @return static
     *
     * @phpstan-param-out string $newGlobalId
     * @phpstan-param-out string $newGlobalIdType
     */
    public function getDocumentPositionUltimateShipToGlobalId(
        ?string &$newGlobalId,
        ?string &$newGlobalIdType
    ): static {
        $newGlobalId = '';
        $newGlobalIdType = '';

        return $this;
    }

    /**
     * Go to the first Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Go to the next Tax Registration of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToTaxRegistration(): bool
    {
        return false;
    }

    /**
     * Get the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   tax identification number
     * @return static
     *
     * @phpstan-param-out string $newTaxRegistrationType
     * @phpstan-param-out string $newTaxRegistrationId
     */
    public function getDocumentPositionUltimateShipToTaxRegistration(
        ?string &$newTaxRegistrationType,
        ?string &$newTaxRegistrationId
    ): static {
        $newTaxRegistrationType = '';
        $newTaxRegistrationId = '';

        return $this;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Go to the first address of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToAddress(): bool
    {
        return false;
    }

    /**
     * Get the address of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newAddressLine1 The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    country in which the party's address is located
     * @param  null|string $newSubDivision  region or federal state in which the party's address is located
     * @return static
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
    ): static {
        $newAddressLine1 = '';
        $newAddressLine2 = '';
        $newAddressLine3 = '';
        $newPostcode = '';
        $newCity = '';
        $newCountryId = '';
        $newSubDivision = '';

        return $this;
    }

    /**
     * Go to the first the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Go to the next the legal information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToLegalOrganisation(): bool
    {
        return false;
    }

    /**
     * Get the legal information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType type of the identification number of the legal registration of the party
     * @param  null|string $newId   identification number of the legal registration of the party
     * @param  null|string $newName name by which the party is known, if different from the party's name
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newId
     * @phpstan-param-out string $newName
     */
    public function getDocumentPositionUltimateShipToLegalOrganisation(
        ?string &$newType,
        ?string &$newId,
        ?string &$newName
    ): static {
        $newType = '';
        $newId = '';
        $newName = '';

        return $this;
    }

    /**
     * Go to the first contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Go to the next contact information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToContact(): bool
    {
        return false;
    }

    /**
     * Get the contact information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newPersonName     name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName name of the department for the contact point
     * @param  null|string $newPhoneNumber    telephone number for the contact point
     * @param  null|string $newFaxNumber      fax number of the contact point
     * @param  null|string $newEmailAddress   E-Mail address of the contact point
     * @return static
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
    ): static {
        $newPersonName = '';
        $newDepartmentName = '';
        $newPhoneNumber = '';
        $newFaxNumber = '';
        $newEmailAddress = '';

        return $this;
    }

    /**
     * Go to the first communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Go to the next communication information of the ultimate Ship-To party from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionUltimateShipToCommunication(): bool
    {
        return false;
    }

    /**
     * Get the communication information of the ultimate Ship-To party from latest position
     *
     * @param  null|string $newType the type for the party's electronic address
     * @param  null|string $newUri  the party's electronic address
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newUri
     */
    public function getDocumentPositionUltimateShipToCommunication(
        ?string &$newType,
        ?string &$newUri
    ): static {
        $newType = '';
        $newUri = '';

        return $this;
    }

    /**
     * Get the date of the delivery from latest position
     *
     * @param  null|DateTimeInterface $newDate
     * @return static
     *
     * @phpstan-param-out null $newDate
     */
    public function getDocumentPositionSupplyChainEvent(
        ?DateTimeInterface &$newDate
    ): static {
        $newDate = null;

        return $this;
    }

    /**
     * Go to the first billing period
     *
     * @return bool
     */
    public function firstDocumentPositionBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getInvoicePeriod() ?? []
            ),
            'documentpositionbillingperiod'
        );
    }

    /**
     * Go to the next billing period
     *
     * @return bool
     */
    public function nextDocumentPositionBillingPeriod(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getInvoicePeriod() ?? []
            ),
            'documentpositionbillingperiod'
        );
    }

    /**
     * Get the start and/or end date of the billing period from latest position
     *
     * @param  null|DateTimeInterface $newStartDate   Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     End of the billing period
     * @param  null|string            $newDescription Further information of the billing period (Obsolete)
     * @return static
     *
     * @phpstan-param-out DateTimeInterface|null $newStartDate
     * @phpstan-param-out DateTimeInterface|null $newEndDate
     * @phpstan-param-out string $newDescription
     */
    public function getDocumentPositionBillingPeriod(
        ?DateTimeInterface &$newStartDate,
        ?DateTimeInterface &$newEndDate,
        ?string &$newDescription,
    ): static {
        /**
         * @var array<InvoicePeriod>
         */
        $positionBillingPeriods = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getInvoicePeriod() ?? []);

        /**
         * @var InvoicePeriod
         */
        $positionBillingPeriod = $positionBillingPeriods[InvoiceSuitePointerUtils::getValue('documentpositionbillingperiod')];

        $positionBillingPeriodDescriptions = $positionBillingPeriod->getDescription() ?? [];
        $positionBillingPeriodDescription = reset($positionBillingPeriodDescriptions);

        $newStartDate = $positionBillingPeriod->getStartDate();
        $newEndDate = $positionBillingPeriod->getEndDate();
        $newDescription = $positionBillingPeriodDescription !== false ? ($positionBillingPeriodDescription->getValue() ?? '') : '';

        return $this;
    }

    /**
     * Go to the first position's tax information from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionTax(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getItem()?->getClassifiedTaxCategory() ?? []
            ),
            'documentpositiontax'
        );
    }

    /**
     * Go to the next position's tax information from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionTax(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getItem()?->getClassifiedTaxCategory() ?? []
            ),
            'documentpositiontax'
        );
    }

    /**
     * Get the position's tax information from latest position
     *
     * @param  null|string $newTaxCategory         Coded description of the tax category
     * @param  null|string $newTaxType             Coded description of the tax type
     * @param  null|float  $newTaxAmount           Tax total amount
     * @param  null|float  $newTaxPercent          Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode Reason for tax exemption (Code)
     * @return static
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
    ): static {
        /**
         * @var array<ClassifiedTaxCategory>
         */
        $positionTaxes = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getItem()?->getClassifiedTaxCategory() ?? []);

        /**
         * @var ClassifiedTaxCategory
         */
        $positionTax = $positionTaxes[InvoiceSuitePointerUtils::getValue('documentpositiontax')];

        $positionTaxExcemptionReasons = $positionTax->getTaxExemptionReason() ?? [];
        $positionTaxExcemptionReason = reset($positionTaxExcemptionReasons);

        $newTaxCategory = $positionTax->getID()?->getValue() ?? '';
        $newTaxType = $positionTax->getTaxScheme()->getID()?->getValue() ?? '';
        $newTaxAmount = 0.0;
        $newTaxPercent = $positionTax->getPercent()?->getValue() ?? 0.0;
        $newExemptionReason = $positionTaxExcemptionReason !== false ? ($positionTaxExcemptionReason->getValue() ?? '') : '';
        $newExemptionReasonCode = $positionTax->getTaxExemptionReasonCode()?->getValue() ?? '';

        return $this;
    }

    /**
     * Go to the first Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionAllowanceCharge(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getAllowanceCharge() ?? []
            ),
            'documentpositionallowancecharge'
        );
    }

    /**
     * Go to the next Document position Allowance/Charge from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionAllowanceCharge(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getAllowanceCharge() ?? []
            ),
            'documentpositionallowancecharge'
        );
    }

    /**
     * Get Document position Allowance/Charge from latest position
     *
     * @param  null|bool   $newChargeIndicator           Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
     * @return static
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
    ): static {
        /**
         * @var array<AllowanceCharge>
         */
        $positionAllowanceCharges = $this->resolveCurrentDocumentPosition()->getAllowanceCharge() ?? [];

        /**
         * @var AllowanceCharge
         */
        $positionAllowanceCharge = $positionAllowanceCharges[InvoiceSuitePointerUtils::getValue('documentpositionallowancecharge')];

        $positionAllowanceChargeReasons = $positionAllowanceCharge->getAllowanceChargeReason() ?? [];
        $positionAllowanceChargeReason = reset($positionAllowanceChargeReasons);

        $newChargeIndicator = $positionAllowanceCharge->getChargeIndicator() ?? false;
        $newAllowanceChargeAmount = $positionAllowanceCharge->getAmount()?->getValue() ?? 0.0;
        $newAllowanceChargeBaseAmount = $positionAllowanceCharge->getBaseAmount()?->getValue() ?? 0.0;
        $newAllowanceChargeReason = $positionAllowanceChargeReason !== false ? ($positionAllowanceChargeReason->getValue() ?? '') : '';
        $newAllowanceChargeReasonCode = $positionAllowanceCharge->getAllowanceChargeReasonCode()?->getValue() ?? '';
        $newAllowanceChargePercent = $positionAllowanceCharge->getMultiplierFactorNumeric()?->getValue() ?? 0.0;

        return $this;
    }

    /**
     * Returns true if a position summation exists
     *
     * @return bool
     */
    public function firstDocumentPositionSummation(): bool
    {
        return !is_null($this->resolveCurrentDocumentPosition()->getLineExtensionAmount());
    }

    /**
     * Get the document position summation from latest position
     *
     * @param  null|float $newNetAmount           Net amount
     * @param  null|float $newChargeTotalAmount   Sum of the charges
     * @param  null|float $newDiscountTotalAmount Sum of the discounts
     * @param  null|float $newTaxTotalAmount      Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         Total invoice line amount including sales tax
     * @return static
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
    ): static {
        $newNetAmount = $this->resolveCurrentDocumentPosition()->getLineExtensionAmount()?->getValue() ?? 0.0;
        $newChargeTotalAmount = 0.0;
        $newDiscountTotalAmount = 0.0;
        $newTaxTotalAmount = 0.0;
        $newGrossAmount = 0.0;

        return $this;
    }

    /**
     * Go to the first posting reference from latest position
     *
     * @return bool
     */
    public function firstDocumentPositionPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasFirst(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getAccountingCostCode() ?? []
            ),
            'documentpositionpostingreference'
        );
    }

    /**
     * Go to the next posting reference from latest position
     *
     * @return bool
     */
    public function nextDocumentPositionPostingReference(): bool
    {
        return InvoiceSuitePointerUtils::hasNext(
            InvoiceSuiteArrayUtils::ensure(
                $this->resolveCurrentDocumentPosition()->getAccountingCostCode() ?? []
            ),
            'documentpositionpostingreference'
        );
    }

    /**
     * Get a position's posting reference from latest position
     *
     * @param  null|string $newType      Type of the posting reference
     * @param  null|string $newAccountId Posting reference of the byuer
     * @return static
     *
     * @phpstan-param-out string $newType
     * @phpstan-param-out string $newAccountId
     */
    public function getDocumentPositionPostingReference(
        ?string &$newType,
        ?string &$newAccountId
    ): static {
        /**
         * @var array<AccountingCostCode>
         */
        $positionPostingReferences = InvoiceSuiteArrayUtils::ensure($this->resolveCurrentDocumentPosition()->getAccountingCostCode() ?? []);

        /**
         * @var AccountingCostCode
         */
        $positionPostingReference = $positionPostingReferences[InvoiceSuitePointerUtils::getValue('documentpositionpostingreference')];

        $newType = '';
        $newAccountId = $positionPostingReference->getValue() ?? '';

        return $this;
    }

    /**
     * Returns the root object as a Invoice
     *
     * @return Invoice
     */
    protected function getUblInvoiceRootObject(): Invoice
    {
        return $this->getDocumentRootObject();
    }

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
     * Get the currently seeked document position
     *
     * @return InvoiceLine
     */
    protected function resolveCurrentDocumentPosition(): InvoiceLine
    {
        /**
         * @var array<InvoiceLine>
         */
        $documentPositions = InvoiceSuiteArrayUtils::ensure($this->getUblInvoiceRootObject()->getInvoiceLine() ?? []);

        return $documentPositions[InvoiceSuitePointerUtils::getValue('documentposition')];
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
        InvoiceSuitePointerUtils::resetSingle('documentpositionadditionalobjectreference');
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
     * Helper function for getting associated quotations from additional document references
     *
     * @return array<AdditionalDocumentReference>
     */
    private function resolveQuotationReferences(): array
    {
        $additionalDocTypeCode = $this->getCurrentDocumentFormatProviderParameterValue('BUILDER_QUOTATION_DOCTYPECODE', '');
        $additionalDocDescription = $this->getCurrentDocumentFormatProviderParameterValue('BUILDER_QUOTATION_DOCDESCRIPTION', '');

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$additionalDocTypeCode, $additionalDocDescription])) {
            return [];
        }

        return array_values(
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                static fn (AdditionalDocumentReference $additionalDocumentReference) => strcasecmp($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? '', (string) $additionalDocTypeCode) !== 0
            )
        );
    }

    /**
     * Get the ultimate customer order references from additional documents filtered by type code 220
     *
     * @return array<AdditionalDocumentReference>
     */
    private function resolveDocumentUltimateCustomerOrderReferences(): array
    {
        $ultimateCustomerOrderDocTypeCode = $this->getCurrentDocumentFormatProviderParameterValue('BUILDER_ULTIMATECUSTOMERORDER_DOCTYPECODE', '220');

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$ultimateCustomerOrderDocTypeCode])) {
            return [];
        }

        return array_values(
            array_filter(
                $this->getUblInvoiceRootObject()->getAdditionalDocumentReference() ?? [],
                static fn (AdditionalDocumentReference $additionalDocumentReference) => strcasecmp($additionalDocumentReference->getDocumentTypeCode()?->getValue() ?? '', (string) $ultimateCustomerOrderDocTypeCode) !== 0
            )
        );
    }

    /**
     * Get all seller/supplier IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentSellerIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') === ''
                )
            );
    }

    /**
     * Get all seller/supplier global IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentSellerGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') !== ''
                )
            );
    }

    /**
     * Get all buyer/customer IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentBuyerIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') === ''
                )
            );
    }

    /**
     * Get all buyer/customer global IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentBuyerGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getAccountingCustomerParty()?->getParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') !== ''
                )
            );
    }

    /**
     * Get all tax representative IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentTaxRepresentativeIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') === ''
                )
            );
    }

    /**
     * Get all tax representative global IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentTaxRepresentativeGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getTaxRepresentativeParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') !== ''
                )
            );
    }

    /**
     * Resolve the first delivery node
     *
     * @return null|Delivery
     */
    private function resolveFirstDocumentDelivery(): ?Delivery
    {
        $deliveryNodes = $this->getUblInvoiceRootObject()->getDelivery() ?? [];
        $deliveryNode = reset($deliveryNodes);

        if ($deliveryNode === false) {
            return null;
        }

        return $deliveryNode;
    }

    /**
     * Get all buyer/customer IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentShipToIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getID() ?? []
                    ),
                    static fn (ID $partyIdentification) => ($partyIdentification->getSchemeID() ?? '') === ''
                )
            );
    }

    /**
     * Get all buyer/customer global IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentShipToGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->resolveFirstDocumentDelivery()?->getDeliveryLocation()?->getID() ?? []
                    ),
                    static fn (ID $partyIdentification) => ($partyIdentification->getSchemeID() ?? '') !== ''
                )
            );
    }

    /**
     * Get all buyer/customer IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentPayeeIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') === ''
                )
            );
    }

    /**
     * Get all buyer/customer global IDs
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentPayeeGlobalIds(): array
    {
        return
            array_values(
                array_filter(
                    InvoiceSuiteArrayUtils::ensure(
                        $this->getUblInvoiceRootObject()->getPayeeParty()?->getPartyIdentification() ?? []
                    ),
                    static fn (PartyIdentificationType $partyIdentification) => ($partyIdentification->getID()?->getSchemeID() ?? '') !== ''
                )
            );
    }

    /**
     * Internal helper for resolving payment creditor references
     *
     * @return array<PartyIdentification>
     */
    private function resolveDocumentPaymentCreditorReferenceIDs(): array
    {
        $partyIdentifications = $this->getUblInvoiceRootObject()->getAccountingSupplierParty()?->getPartyWithCreate()?->getPartyIdentification();

        return array_values(
            array_filter($partyIdentifications ?? [], static fn (PartyIdentification $id) => strcasecmp($id->getID()?->getSchemeID() ?? '', 'SEPA') === 0)
        );
    }

    /**
     * Resolve tax total
     *
     * @return null|TaxTotal
     */
    private function resolveTaxTotal()
    {
        $taxTotals = $this->getUblInvoiceRootObject()->getTaxTotal();
        $taxTotal = reset($taxTotals);

        if ($taxTotal === false) {
            return null;
        }

        return $taxTotal;
    }
}
