<?php

namespace horstoeko\invoicesuite\providers\zffxminimum;

use DateTimeInterface;
use horstoeko\invoicesuite\abstracts\InvoiceSuiteAbstractFormatProviderBuilder;
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
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\models\zffxminimum\ram\DocumentContextParameterType;
use horstoeko\invoicesuite\models\zffxminimum\ram\ExchangedDocumentContextType;
use horstoeko\invoicesuite\models\zffxminimum\ram\ExchangedDocumentType;
use horstoeko\invoicesuite\models\zffxminimum\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteFloatUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class InvoiceSuiteZfFxMinimumProviderBuilder extends InvoiceSuiteAbstractFormatProviderBuilder
{
    /**
     * @inheritDoc
     */
    public function initRootObject(): InvoiceSuiteZfFxMinimumProviderBuilder
    {
        $this->setContextParameter($this->getCurrentFormatProviderParameterValue('CONTEXTPARAMETER', ''));

        return $this;
    }

    /**
     * Returns the root object as a CrossIndustryInvoiceType
     *
     * @return CrossIndustryInvoiceType
     */
    protected function getCrossIndustryRootObject(): CrossIndustryInvoiceType
    {
        return $this->getRootObject();
    }

    /**
     * Init context parameter for profile definition
     *
     * @param string $newContextParameter
     * @param string $newBusinessProcessContextParameter
     * @return static
     */
    public function setContextParameter(
        string $newContextParameter,
        string $newBusinessProcessContextParameter = '',
    ): self {
        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentContextWithCreate()
            ->getGuidelineSpecifiedDocumentContextParameterWithCreate()
            ->getIDWithCreate()
            ->setValue($newContextParameter);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newBusinessProcessContextParameter)) {
            $this
                ->getCrossIndustryRootObject()
                ->getExchangedDocumentContextWithCreate()
                ->getBusinessProcessSpecifiedDocumentContextParameterWithCreate()
                ->getIDWithCreate()
                ->setValue($newBusinessProcessContextParameter);
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
        $this->setDocumentIsCopy($newDocumentDTO->getIsCopy());
        $this->setDocumentIsTest($newDocumentDTO->getIsTest());

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

        $newDocumentDTO->forEachUltimateCustomerOrderReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->addDocumentUltimateCustomerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

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

        $newDocumentDTO->firstDeliveryNoteReference(
            fn(InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentDeliveryNoteReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

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
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentSellerTaxRegistration($item->getIdType(), $item->getId())
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
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentSellerContact(
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
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentBuyerGlobalId($item->getId(), $item->getIdType())
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
            ?->forEachContact(
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
            ?->firstName(
                fn(string $item) => $this->setDocumentTaxRepresentativeName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentTaxRepresentativeId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentTaxRepresentativeGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentTaxRepresentativeTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentTaxRepresentativeAddress(
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
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentTaxRepresentativeLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentTaxRepresentativeContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentTaxRepresentativeCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Product End-User Party

        $newDocumentDTO
            ->getProductEndUserParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentProductEndUserName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentProductEndUserId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentProductEndUserGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentProductEndUserTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentProductEndUserAddress(
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
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentProductEndUserLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentProductEndUserContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentProductEndUserCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Ship-To Party

        $newDocumentDTO
            ->getShipToParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentShipToName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentShipToId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentShipToGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentShipToTaxRegistration($item->getIdType(), $item->getId())
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
            )
            ?->firstLegalOrganisation(
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentShipToLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentShipToContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentShipToCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Ultimate Ship-To Party

        $newDocumentDTO
            ->getUltimateShipToParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentUltimateShipToName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentUltimateShipToId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentUltimateShipToGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentUltimateShipToTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentUltimateShipToAddress(
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
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentUltimateShipToLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentUltimateShipToContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentUltimateShipToCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Ship-From Party

        $newDocumentDTO
            ->getShipFromParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentShipfromName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentShipfromId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentShipfromGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentShipfromTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentShipfromAddress(
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
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentShipfromLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentShipfromContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentShipfromCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Invoicer Party

        $newDocumentDTO
            ->getInvoicerParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentInvoicerName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentInvoicerId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentInvoicerGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentInvoicerTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentInvoicerAddress(
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
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentInvoicerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentInvoicerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentInvoicerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Invoicee Party

        $newDocumentDTO
            ->getInvoiceeParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentInvoiceeName($item)
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentInvoiceeId($item->getId())
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentInvoiceeGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentInvoiceeTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentInvoiceeAddress(
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
                fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentInvoiceeLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn(InvoiceSuiteContactDTO $item) => $this->addDocumentInvoiceeContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentInvoiceeCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Payee Party

        $newDocumentDTO
            ->getPayeeParty()
            ?->firstName(
                fn(string $item) => $this->setDocumentPayeeName(
                    $item
                )
            )
            ?->firstId(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPayeeId(
                    $item->getId()
                )
            )
            ?->forEachGlobalId(
                fn(InvoiceSuiteIdDTO $item) => $this->addDocumentPayeeGlobalId(
                    $item->getId(),
                    $item->getIdType()
                )
            )
            ?->firstTaxRegistration(
                fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPayeeTaxRegistration(
                    $item->getIdType(),
                    $item->getId()
                )
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
            ?->forEachContact(
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

        $newDocumentDTO->forEachPaymentMean(
            fn(InvoiceSuitePaymentMeanDTO $item) => $this->addDocumentPaymentMean(
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

        $newDocumentDTO->forEachPaymentTerm(
            function (InvoiceSuitePaymentTermDTO $item): void {
                $this->addDocumentPaymentTerm(
                    $item->getDescription(),
                    $item->getDueDate()
                );
                $item->forEachDiscountTerms(
                    fn(InvoiceSuitePaymentTermDiscountDTO $item) => $this->addDocumentPaymentDiscountTermsInLastPaymentTerm(
                        $item->getBaseAmount(),
                        $item->getDiscountAmount(),
                        $item->getDiscountPercent(),
                        $item->getBaseDate(),
                        $item->getPeriod()?->getPeriod(),
                        $item->getPeriod()?->getPeriodUnit()
                    )
                );
                $item->forEachPenaltyTerms(
                    fn(InvoiceSuitePaymentTermPenaltyDTO $item) => $this->addDocumentPaymentPenaltyTermsInLastPaymentTerm(
                        $item->getBaseAmount(),
                        $item->getPenaltyAmount(),
                        $item->getPenaltyPercent(),
                        $item->getBaseDate(),
                        $item->getPeriod()?->getPeriod(),
                        $item->getPeriod()?->getPeriodUnit()
                    )
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

                $item->getProduct()?->forEachReferenceProduct(
                    fn(InvoiceSuiteReferenceProductDTO $referencedProduct) => $this->addDocumentPositionReferencedProduct(
                        $referencedProduct->getId(),
                        $referencedProduct->getName(),
                        $referencedProduct->getDescription(),
                        $referencedProduct->getSellerId(),
                        $referencedProduct->getBuyerId(),
                        $referencedProduct->getGlobalId()?->getId(),
                        $referencedProduct->getGlobalId()?->getIdType(),
                        $referencedProduct->getIndustryId(),
                        $referencedProduct->getUnitQuantity()?->getQuantity(),
                        $referencedProduct->getUnitQuantity()?->getQuantityUnit()
                    )
                );

                $item->firstSellerOrderReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionSellerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstBuyerOrderReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionBuyerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstQuotationReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionQuotationReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstContractReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionContractReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->forEachAdditionalReference(
                    fn(InvoiceSuiteReferenceDocumentLineExtDTO $item) => $this->addDocumentPositionAdditionalReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate(),
                        $item->getTypeCode(),
                        $item->getReferenceTypeCode(),
                        $item->getDescription(),
                        $item->getAttachment()
                    )
                );

                $item->firstUltimateCustomerOrderReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionUltimateCustomerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstDespatchAdviceReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionDespatchAdviceReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstReceivingAdviceReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionReceivingAdviceReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstDeliveryNoteReference(
                    fn(InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionDeliveryNoteReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstInvoiceReference(
                    fn(InvoiceSuiteReferenceDocumentLineExtDTO $item) => $this->addDocumentPositionInvoiceReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate(),
                        $item->getTypeCode()
                    )
                );

                // Position Gross Price

                $this->setDocumentPositionGrossPrice(
                    $item->getGrossPrice()?->getAmount(),
                    $item->getGrossPrice()?->getPriceQuantity()?->getQuantity(),
                    $item->getGrossPrice()?->getPriceQuantity()?->getQuantityUnit()
                );

                $item->getGrossPrice()?->firstAllowanceCharge(
                    fn(InvoiceSuiteAllowanceChargeDTO $itemGrossPriceAllowanceCharge) => $this->setDocumentPositionGrossPriceAllowanceCharge(
                        $itemGrossPriceAllowanceCharge->getAmount(),
                        $itemGrossPriceAllowanceCharge->getChargeIndicator(),
                        $itemGrossPriceAllowanceCharge->getPercent(),
                        $itemGrossPriceAllowanceCharge->getBaseAmount(),
                        $itemGrossPriceAllowanceCharge->getReason(),
                        $itemGrossPriceAllowanceCharge->getReasonCode()
                    )
                );

                // Position Net Price

                $this->setDocumentPositionNetPrice(
                    $item->getNetPrice()?->getAmount(),
                    $item->getNetPrice()?->getPriceQuantity()?->getQuantity(),
                    $item->getNetPrice()?->getPriceQuantity()?->getQuantityUnit()
                );

                $item->getNetPrice()?->firstTax(
                    fn(InvoiceSuiteTaxDTO $netPriceTax) => $this->setDocumentPositionNetPriceTax(
                        $netPriceTax->getCategory(),
                        $netPriceTax->getType(),
                        $netPriceTax->getAmount(),
                        $netPriceTax->getPercent(),
                        $netPriceTax->getExemptionReason(),
                        $netPriceTax->getExemptionReasonCode()
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

                // Position Ship-To

                $item->getShipToParty()
                    ?->firstName(
                        fn(string $item) => $this->setDocumentPositionShipToName($item)
                    )
                    ?->firstId(
                        fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPositionShipToId($item->getId())
                    )
                    ?->forEachGlobalId(
                        fn(InvoiceSuiteIdDTO $item) => $this->addDocumentPositionShipToGlobalId($item->getId(), $item->getIdType())
                    )
                    ?->firstTaxRegistration(
                        fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPositionShipToTaxRegistration($item->getIdType(), $item->getId())
                    )
                    ?->firstAddress(
                        fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentPositionShipToAddress(
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
                        fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentPositionShipToLegalOrganisation(
                            $item->getIdType(),
                            $item->getId(),
                            $item->getName()
                        )
                    )
                    ?->forEachContact(
                        fn(InvoiceSuiteContactDTO $item) => $this->addDocumentPositionShipToContact(
                            $item->getPersonName(),
                            $item->getDepartmentName(),
                            $item->getPhoneNumber(),
                            $item->getFaxNumber(),
                            $item->getEmailAddress()
                        )
                    )
                    ?->firstCommunication(
                        fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentPositionShipToCommunication(
                            $item->getIdType(),
                            $item->getId()
                        )
                    );

                // Position Ultimate Ship-To

                $item->getUltimateShipToParty()
                    ?->firstName(
                        fn(string $item) => $this->setDocumentPositionUltimateShipToName($item)
                    )
                    ?->firstId(
                        fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPositionUltimateShipToId($item->getId())
                    )
                    ?->forEachGlobalId(
                        fn(InvoiceSuiteIdDTO $item) => $this->addDocumentPositionUltimateShipToGlobalId($item->getId(), $item->getIdType())
                    )
                    ?->firstTaxRegistration(
                        fn(InvoiceSuiteIdDTO $item) => $this->setDocumentPositionUltimateShipToTaxRegistration($item->getIdType(), $item->getId())
                    )
                    ?->firstAddress(
                        fn(InvoiceSuiteAddressDTO $item) => $this->setDocumentPositionUltimateShipToAddress(
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
                        fn(InvoiceSuiteOrganisationDTO $item) => $this->setDocumentPositionUltimateShipToLegalOrganisation(
                            $item->getIdType(),
                            $item->getId(),
                            $item->getName()
                        )
                    )
                    ?->forEachContact(
                        fn(InvoiceSuiteContactDTO $item) => $this->addDocumentPositionUltimateShipToContact(
                            $item->getPersonName(),
                            $item->getDepartmentName(),
                            $item->getPhoneNumber(),
                            $item->getFaxNumber(),
                            $item->getEmailAddress()
                        )
                    )
                    ?->firstCommunication(
                        fn(InvoiceSuiteCommunicationDTO $item) => $this->setDocumentPositionUltimateShipToCommunication(
                            $item->getIdType(),
                            $item->getId()
                        )
                    );

                // Position supply chain event

                $this->setDocumentPositionSupplyChainEvent($item->getSupplyChainEvent());

                // Position billing period

                $item->firstBillingPeriod(
                    fn(InvoiceSuiteDateRangeDTO $billingPeriod) => $this->setDocumentPositionBillingPeriod(
                        $billingPeriod->getStartDate(),
                        $billingPeriod->getEndDate(),
                        $billingPeriod->getDescription()
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
     * @param string|null $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     * @return static
     */
    public function setDocumentNo(
        ?string $newDocumentNo = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentNo])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIDWithCreate()
            ->setValue($newDocumentNo);

        return $this;
    }

    /**
     * Sets the new document type code
     *
     * @param string|null $newDocumentType __BT-3, From MINIMUM__ The type of the document
     * @return static
     */
    public function setDocumentType(
        ?string $newDocumentType = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentType])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getTypeCodeWithCreate()
            ->setValue($newDocumentType);

        return $this;
    }

    /**
     * Sets the new document description
     *
     * @param string|null $newDocumentDescription __BT-X-2, From EXTENDED__ The documenttype as free text
     * @return self
     */
    public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new document language
     *
     * @param string|null $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @return self
     */
    public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param DateTimeInterface|null $newDocumentDate __BT-2, From MINIMUM__ Date of the document. The date when the document was issued by the seller
     * @return self
     */
    public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): self {
        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newDocumentDate])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIssueDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newDocumentDate->format("Ymd"))
            ->setFormat('102');

        return $this;
    }

    /**
     * Sets the new document period
     *
     * @param DateTimeInterface|null $newCompleteDate __BT-X-6-000, From EXTENDED__ Contractual due date of the document
     * @return self
     */
    public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new document currency
     *
     * @param string|null $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     * @return self
     */
    public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newDocumentCurrency])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceCurrencyCodeWithCreate()
            ->setValue($newDocumentCurrency);

        return $this;
    }

    /**
     * Sets the new document tax currency
     *
     * @param string|null $newDocumentTaxCurrency __BT-6, From BASIC WL__ Code for the tax currency
     * @return self
     */
    public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new status of the copy indicator
     *
     * @param boolean|null $newDocumentIsCopy __BT-X-1-00, From EXTENDED__ Indicates that the document is a copy
     * @return self
     */
    public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Sets the new status of the test indicator
     *
     * @param boolean|null $newDocumentIsTest __BT-X-3-00, From EXTENDED__ Indicates that the document is a test
     * @return self
     */
    public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param string|null $newContent __BT-22, From BASIC WL__ Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode __BT-X-5, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode __BT-21, From BASIC WL__ Qualification of the free text for the invoice
     * @return self
     */
    public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a note to the document
     *
     * @param string|null $newContent __BT-22, From BASIC WL__ Free text containing unstructured information that is relevant to the invoice as a whole
     * @param string|null $newContentCode __BT-X-5, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode __BT-21, From BASIC WL__ Qualification of the free text for the invoice
     * @return self
     */
    public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate __BT-73, From BASIC WL__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-74, From BASIC WL__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate __BT-73, From BASIC WL__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-74, From BASIC WL__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return self
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set a posting reference
     *
     * @param string|null $newType __BT-X-290, From EXTENDED__ Type of the posting reference
     * @param string|null $newAccountId __BT-19, From BASIC WL__ Posting reference of the byuer
     * @return self
     */
    public function setDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a posting reference
     *
     * @param string|null $newType __BT-X-290, From EXTENDED__ Type of the posting reference
     * @param string|null $newAccountId __BT-19, From BASIC WL__ Posting reference of the byuer
     * @return self
     */
    public function addDocumentPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return self
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated seller's order confirmation.
     *
     * @param string|null $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return self
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated buyer's order
     *
     * @param string|null $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-147, From EXTENDED__ Buyer's order date
     * @return self
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newReferenceNumber])) {
            return $this;
        }

        $buyerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerOrderReferencedDocumentWithCreate();

        $buyerOrderReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        return $this;
    }

    /**
     * Add an associated buyer's order
     *
     * @param string|null $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-147, From EXTENDED__ Buyer's order date
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
     * @param string|null $newReferenceNumber __BT-X-403, From EXTENDED__ Quotation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-404, From EXTENDED__ Quotation date
     * @return self
     */
    public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated quotation
     *
     * @param string|null $newReferenceNumber __BT-X-403, From EXTENDED__ quotation number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-404, From EXTENDED__ quotation date
     * @return self
     */
    public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated contract
     *
     * @param string $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Contract date
     * @return self
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add am associated contract
     *
     * @param string $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Contract date
     * @return self
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional associated document
     *
     * @param string|null $newReferenceNumber __BT-122, From EN 16931__ Additional document number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-149, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-122-0, From EN 16931__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param string|null $newDescription __BT-123, From EN 16931__ Additional document description
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional associated document
     *
     * @param string|null $newReferenceNumber __BT-122, From EN 16931__ Additional document number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-149, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-122-0, From EN 16931__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param string|null $newDescription __BT-123, From EN 16931__ Additional document description
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
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-555, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-26, From BASIC WL__ Type code of previous invoice
     * @return self
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-555, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-26, From BASIC WL__ Type code of previous invoice
     * @return self
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional project reference
     *
     * @param string|null $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param string|null $newName __BT-11-0, From EN 16931__ Project name
     * @return self
     */
    public function setDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional project reference
     *
     * @param string|null $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param string|null $newName __BT-11-0, From EN 16931__ Project name
     * @return self
     */
    public function addDocumentProjectReference(?string $newReferenceNumber = null, ?string $newName = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber __BT-X-150, From EXTENDED__
     * @param DateTimeInterface|null $newReferenceDate __BT-X-151, From EXTENDED__
     * @return self
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference
     *
     * @param string|null $newReferenceNumber __BT-X-150, From EXTENDED__
     * @param DateTimeInterface|null $newReferenceDate __BT-X-151, From EXTENDED__
     * @return self
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-200, From EXTENDED__ Shipping notification date
     * @return self
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-200, From EXTENDED__ Shipping notification date
     * @return self
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber __BT-15, From BASIC WL__ Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-201, From EXTENDED__ Receipt notification date
     * @return self
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber __BT-15, From BASIC WL__ Receipt notification number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-201, From EXTENDED__ Receipt notification date
     * @return self
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-203, From EXTENDED__ Delivery slip date
     * @return self
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-203, From EXTENDED__ Delivery slip date
     * @return self
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate __BT-72, From BASIC WL__ Actual delivery date
     * @return self
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param string|null $newBuyerReference __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return self
     */
    public function setDocumentBuyerReference(
        ?string $newBuyerReference = null
    ): self {
        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newBuyerReference])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreement()
            ->getBuyerReferenceWithCreate()
            ->setValue($newBuyerReference);

        return $this;
    }

    /**
     * Set the name of the seller/supplier party
     *
     * @param string|null $newName __BT-27, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentSellerName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        return $this;
    }

    /**
     * Add a name of the seller/supplier party
     *
     * @param string|null $newName __BT-27, From MINIMUM__ The full formal name under which the party is registered.
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
     * @param string|null $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentSellerId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentSellerId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param string|null $newGlobalId __BT-29-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param string|null $newGlobalId __BT-29-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentSellerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-31/32, From MINIMUM/EN 16931__ Tax identification number.
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
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param string|null $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM/EN 16931__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-31/32, From MINIMUM/EN 16931__ Tax identification number.
     * @return self
     */
    public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
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

        $sellerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        return $this;
    }

    /**
     * Add an address to the seller/supplier party
     *
     * @param string|null $newAddressLine1 __BT-35, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-36, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-162, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-38, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-37, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-40, From MINIMUM__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-39, From BASIC WL__ Region or federal state in which the party's address is located.
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
     * @param string|null $newType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-30, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name.
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

        $sellerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $sellerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $sellerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        return $this;
    }

    /**
     * Add a legal information of the seller/supplier party
     *
     * @param string|null $newType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-30, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name.
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
     * @param string|null $newPersonName __BT-41, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-42, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-107, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-43, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the seller/supplier party
     *
     * @param string|null $newPersonName __BT-41, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-42, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-107, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-43, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the seller/supplier party
     *
     * @param string|null $newType __BT-34-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-34, From BASIC WL__ The party's electronic address.
     * @return self
     */
    public function setDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add communication information of the seller/supplier party
     *
     * @param string|null $newType __BT-34-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-34, From BASIC WL__ The party's electronic address.
     * @return self
     */
    public function addDocumentSellerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the buyer/customer party
     *
     * @param string|null $newName __BT-44, From MINIMUM__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentBuyerName(
        ?string $newName = null
    ): self {
        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newName])) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->getNameWithCreate()
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
     * @param string|null $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentBuyerId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentBuyerId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param string|null $newGlobalId __BT-46-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param string|null $newGlobalId __BT-46-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentBuyerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType __BT-48-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-48, From MINIMUM__ Tax identification number.
     * @return self
     */
    public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->clearSpecifiedTaxRegistration();

        $this->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        return $this;
    }

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param string|null $newTaxRegistrationType __BT-48-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-48, From MINIMUM__ Tax identification number.
     * @return self
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])
        ) {
            return $this;
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        return $this;
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

        $buyerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newCountryId])) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);
        }

        return $this;
    }

    /**
     * Add an address to the buyer/customer party
     *
     * @param string|null $newAddressLine1 __BT-50, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-51, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-163, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-53, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-52, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-55, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-54, From BASIC WL__ Region or federal state in which the party's address is located.
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
     * @param string|null $newType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-47, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-45, From BASIC WL__ Name by which the party is known, if different from the party's name.
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

        $buyerTradeParty = $this->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newId])) {
            $buyerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);
            if (!InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType])) {
                $buyerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        return $this;
    }

    /**
     * Add a legal information of the buyer/customer party
     *
     * @param string|null $newType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-47, From MINIMUM__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-45, From BASIC WL__ Name by which the party is known, if different from the party's name.
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
     * @param string|null $newPersonName __BT-56, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-57, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-115, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-58, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the buyer/customer party
     *
     * @param string|null $newPersonName __BT-56, From EN 16931__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-57, From EN 16931__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-115, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-58, From EN 16931__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the buyer/customer party
     *
     * @param string|null $newType __BT-49-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-49, From BASIC WL__ The party's electronic address.
     * @return self
     */
    public function setDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param string|null $newType __BT-49-1, From BASIC WL__ The type for the party's electronic address.
     * @param string|null $newUri __BT-49, From BASIC WL__ The party's electronic address.
     * @return self
     */
    public function addDocumentBuyerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the tax representative party
     *
     * @param string|null $newName __BT-62, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the tax representative party
     *
     * @param string|null $newName __BT-62, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the tax representative party
     *
     * @param string|null $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the tax representative party
     *
     * @param string|null $newGlobalId __BT-X-117, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param string|null $newGlobalId __BT-X-117, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param string|null $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-63, From BASIC WL__ Tax identification number.
     * @return self
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param string|null $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-63, From BASIC WL__ Tax identification number.
     * @return self
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the tax representative party
     *
     * @param string|null $newAddressLine1 __BT-64, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-65, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-164, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-67, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-66, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-69, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-68, From BASIC WL__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the tax representative party
     *
     * @param string|null $newType __BT-, From __ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-, From __ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-, From __ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the tax representative party
     *
     * @param string|null $newType __BT-, From __ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-, From __ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-, From __ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the tax representative party
     *
     * @param string|null $newPersonName __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-122, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-123, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-124, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the tax representative party
     *
     * @param string|null $newPersonName __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-122, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-123, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-124, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the tax representative party
     *
     * @param string|null $newType __BT-X-125-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-125, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the tax representative party
     *
     * @param string|null $newType __BT-X-125-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-125, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentTaxRepresentativeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the product end-user party
     *
     * @param string|null $newName __BT-X-128, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentProductEndUserName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the product end-user party
     *
     * @param string|null $newName __BT-X-128, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentProductEndUserName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the product end-user party
     *
     * @param string|null $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentProductEndUserId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentProductEndUserId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the product end-user party
     *
     * @param string|null $newGlobalId __BT-X-127, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param string|null $newGlobalId __BT-X-127, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param string|null $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-, From __ Tax identification number.
     * @return self
     */
    public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param string|null $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-, From __ Tax identification number.
     * @return self
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the product end-user party
     *
     * @param string|null $newAddressLine1 __BT-X-397, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-398, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-399, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-396, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-400, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-401, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-402, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the product end-user party
     *
     * @param string|null $newType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the product end-user party
     *
     * @param string|null $newType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the product end-user party
     *
     * @param string|null $newPersonName __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-133, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-134, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-135, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the product end-user party
     *
     * @param string|null $newPersonName __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-133, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-134, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-135, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the product end-user party
     *
     * @param string|null $newType __BT-X-143-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-143, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the product end-user party
     *
     * @param string|null $newType __BT-X-143-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-143, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentProductEndUserCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName __BT-70, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipToName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName __BT-70, From BASIC WL__ The full formal name under which the party is registered.
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
     * @param string|null $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId __BT-71-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newGlobalId __BT-71-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipToGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-161, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-161, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param string|null $newAddressLine1 __BT-75, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-76, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-165, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-78, From BASIC WL__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-77, From BASIC WL__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-80, From BASIC WL__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-79, From BASIC WL__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string|null $newType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-157, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-158, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-159, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-157, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-158, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-159, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Ship-To party
     *
     * @param string|null $newType __BT-X-160, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-160-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param string|null $newType __BT-X-160, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-160-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName __BT-X-164, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName __BT-X-164, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-163, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-163, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-180, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-180, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 __BT-X-173, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-174, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-175, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-172, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-176, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-177, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-178, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add legal information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-169, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-170, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-171, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-169, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-170, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-171, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-83, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-83-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-83, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-83-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentUltimateShipToCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Ship-From party
     *
     * @param string|null $newName __BT-X-183, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentShipFromName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Ship-From party
     *
     * @param string|null $newName __BT-X-183, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentShipFromName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Ship-From party
     *
     * @param string|null $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentShipFromId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentShipFromId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param string|null $newGlobalId __BT-X-182, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param string|null $newGlobalId __BT-X-182, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentShipFromGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param string|null $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-199, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param string|null $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-199, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Ship-From party
     *
     * @param string|null $newAddressLine1 __BT-X-192, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-193, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-194, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-191, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-195, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-196, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-197, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Ship-From party
     *
     * @param string|null $newType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Ship-From party
     *
     * @param string|null $newType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Ship-From party
     *
     * @param string|null $newPersonName __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-188, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-189, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-190, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Ship-From party
     *
     * @param string|null $newPersonName __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-188, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-189, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-190, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Ship-From party
     *
     * @param string|null $newType __BT-X-199, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-199-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Ship-From party
     *
     * @param string|null $newType __BT-X-199, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-199-0, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentShipFromCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Invoicer party
     *
     * @param string|null $newName __BT-X-207, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoicerName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Invoicer party
     *
     * @param string|null $newName __BT-X-207, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoicerName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Invoicer party
     *
     * @param string|null $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoicerId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoicerId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param string|null $newGlobalId __BT-X-206, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param string|null $newGlobalId __BT-X-206, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoicerGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param string|null $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-223, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param string|null $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-223, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Invoicer party
     *
     * @param string|null $newType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Invoicer party
     *
     * @param string|null $newType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Invoicer party
     *
     * @param string|null $newPersonName __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-212, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-213, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-214, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Invoicer party
     *
     * @param string|null $newPersonName __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-212, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-213, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-214, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Invoicer party
     *
     * @param string|null $newType __BT-X-222-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-222, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Invoicer party
     *
     * @param string|null $newType __BT-X-222-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-222, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentInvoicerCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Invoicee party
     *
     * @param string|null $newName __BT-X-226, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentInvoiceeName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Invoicee party
     *
     * @param string|null $newName __BT-X-226, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentInvoiceeName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Invoicee party
     *
     * @param string|null $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentInvoiceeId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentInvoiceeId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param string|null $newGlobalId __BT-X-225, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param string|null $newGlobalId __BT-X-225, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentInvoiceeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param string|null $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-242, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param string|null $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-242, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Invoicee party
     *
     * @param string|null $newAddressLine1 __BT-X-235, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-236, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-237, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-234, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-238, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-239, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-240, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Invoicee party
     *
     * @param string|null $newType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Invoicee party
     *
     * @param string|null $newType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Invoicee party
     *
     * @param string|null $newPersonName __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-231, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-232, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-233, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Invoicee party
     *
     * @param string|null $newPersonName __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-231, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-232, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-233, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Invoicee party
     *
     * @param string|null $newType __BT-X-241-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-241, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Invoicee party
     *
     * @param string|null $newType __BT-X-241-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-241, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentInvoiceeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Payee party
     *
     * @param string|null $newName __BT-59, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPayeeName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Payee party
     *
     * @param string|null $newName __BT-59, From BASIC WL__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPayeeName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Payee party
     *
     * @param string|null $newId __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPayeeId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newId __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPayeeId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Payee party
     *
     * @param string|null $newGlobalId __BT-60-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-60-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param string|null $newGlobalId __BT-60-0, From BASIC WL__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-60-1, From BASIC WL__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPayeeGlobalId(?string $newGlobalId = null, ?string $newGlobalIdType = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param string|null $newTaxRegistrationType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-257, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param string|null $newTaxRegistrationType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-257, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the Payee party
     *
     * @param string|null $newAddressLine1 __BT-X-250, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-251, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-252, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-249, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-253, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-254, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-255, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an address to the Payee party
     *
     * @param string|null $newAddressLine1 __BT-X-250, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT-X-251, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT-X-252, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT-X-249, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT-X-253, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT-X-254, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT-X-255, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Payee party
     *
     * @param string|null $newType __BT-61-1, From BASIC WL__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-61, From BASIC WL__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-243, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Payee party
     *
     * @param string|null $newType __BT-61-1, From BASIC WL__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-61, From BASIC WL__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-243, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Payee party
     *
     * @param string|null $newPersonName __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-246, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-247, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-248, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Payee party
     *
     * @param string|null $newPersonName __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-246, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-247, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-248, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set communication information of the Payee party
     *
     * @param string|null $newType __BT-X-256-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-256, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Payee party
     *
     * @param string|null $newType __BT-X-256-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-256, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentPayeeCommunication(?string $newType = null, ?string $newUri = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Set Payment mean
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
        // Nothing here...

        return $this;
    }

    /**
     * Add Payment mean
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
        // Nothing here...

        return $this;
    }

    /**
     * Set Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param string|null $newPayeeIban __BT-84, From BASIC WL__ Payment account identifier
     * @param string|null $newPayeeAccountName __BT-85, From BASIC WL__ Name of the payment account
     * @param string|null $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param string|null $newPayeeBic __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param string|null $newPaymentReference __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return self
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add Payment mean (as non SEPA direct debit, German: Lastschrift)
     *
     * @param string|null $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param string|null $newMandate __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return self
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set Payment mean (as payment card)
     *
     * @param string|null $newFinancialCardId __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @return self
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add Payment mean (as payment card)
     *
     * @param string|null $newFinancialCardId __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param string|null $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @return self
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param string|null $newId __BT-90, From BASIC WL__ Creditor identifier
     * @return self
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param string|null $newId __BT-90, From BASIC WL__ Creditor identifier
     * @return self
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set payment term
     *
     * @param string|null $newDescription __BT-20, From _BASIC WL__ Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate __BT-9, From BASIC WL__ Date by which payment is due
     * @return self
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add payment term
     *
     * @param string|null $newDescription __BT-20, From _BASIC WL__ Text description of the payment terms
     * @param DateTimeInterface|null $newDueDate __BT-9, From BASIC WL__ Date by which payment is due
     * @return self
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount __BT-X-285, From EXTENDED__ Base amount of the payment discount
     * @param float|null $newDiscountAmount __BT-X-287, From EXTENDED__ Amount of the payment discount
     * @param float|null $newDiscountPercent __BT-X-286, From EXTENDED__ Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate __BT-X-282, From EXTENDED__ Due date reference date
     * @param float|null $newBasePeriod __BT-X-283, From EXTENDED__ Maturity period (basis)
     * @param string|null $newBasePeriodUnit __BT-X-284, From EXTENDED__ Maturity period (unit)
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
        // Nothing here...

        return $this;
    }

    /**
     * Add payment discount terms in last added payment terms
     *
     * @param float|null $newBaseAmount __BT-X-285, From EXTENDED__ Base amount of the payment discount
     * @param float|null $newDiscountAmount __BT-X-287, From EXTENDED__ Amount of the payment discount
     * @param float|null $newDiscountPercent __BT-X-286, From EXTENDED__ Percentage of the payment discount
     * @param DateTimeInterface|null $newBaseDate __BT-X-282, From EXTENDED__ Due date reference date
     * @param float|null $newBasePeriod __BT-X-283, From EXTENDED__ Maturity period (basis)
     * @param string|null $newBasePeriodUnit __BT-X-284, From EXTENDED__ Maturity period (unit)
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
        // Nothing here...

        return $this;
    }

    /**
     * Set payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount __BT-X-279, From EXTENDED__ Base amount of the payment penalty
     * @param float|null $newPenaltyAmount __BT-X-281, From EXTENDED__ Amount of the payment penalty
     * @param float|null $newPenaltyPercent __BT-X-280, From EXTENDED__ Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate __BT-X-276, From EXTENDED__ Due date reference date
     * @param float|null $newBasePeriod __BT-X-277, From EXTENDED__ Maturity period (basis)
     * @param string|null $newBasePeriodUnit __BT-X-278, From EXTENDED__ Maturity period (unit)
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
        // Nothing here...

        return $this;
    }

    /**
     * Add payment penalty terms in last added payment terms
     *
     * @param float|null $newBaseAmount __BT-X-279, From EXTENDED__ Base amount of the payment penalty
     * @param float|null $newPenaltyAmount __BT-X-281, From EXTENDED__ Amount of the payment penalty
     * @param float|null $newPenaltyPercent __BT-X-280, From EXTENDED__ Percentage of the payment penalty
     * @param DateTimeInterface|null $newBaseDate __BT-X-276, From EXTENDED__ Due date reference date
     * @param float|null $newBasePeriod __BT-X-277, From EXTENDED__ Maturity period (basis)
     * @param string|null $newBasePeriodUnit __BT-X-278, From EXTENDED__ Maturity period (unit)
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
        // Nothing here...

        return $this;
    }

    /**
     * Set Document Tax Breakdown
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
        // Nothing here...

        return $this;
    }

    /**
     * Add Document Tax Breakdown
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
        // Nothing here...

        return $this;
    }

    /**
     * Set Document Allowance/Charge
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
        // Nothing here...

        return $this;
    }

    /**
     * Add Document Allowance/Charge
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
        // Nothing here...

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
        // Nothing here...

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
        // Nothing here...

        return $this;
    }

    /**
     * Prepare the document-level summation (Sets all values to zero)
     *
     * @return self
     */
    public function prepareDocumentSummation(): self
    {
        $summation = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        $summation->getTaxBasisTotalAmountWithCreate()->setValue(0.0);
        $summation->getGrandTotalAmountWithCreate()->setValue(0.0);
        $summation->getDuePayableAmountWithCreate()->setValue(0.0);

        $invoiceCurrencyCode = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceCurrencyCode()?->getValue();

        $taxTotalAmount = $summation->clearTaxTotalAmount()->addToTaxTotalAmountWithCreate()->setValue(0);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($invoiceCurrencyCode)) {
            $taxTotalAmount->setCurrencyID($invoiceCurrencyCode);
        }

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
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        $summation->getTaxBasisTotalAmountWithCreate()->setValue($newTaxBasisAmount);
        $summation->getGrandTotalAmountWithCreate()->setValue($newGrossAmount);
        $summation->getDuePayableAmountWithCreate()->setValue($newDueAmount);

        $summation->clearTaxTotalAmount()->addToTaxTotalAmountWithCreate()->setValue($newTaxTotalAmount);

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxTotalAmount2)) {
            $summation->addToTaxTotalAmountWithCreate()->setValue($newTaxTotalAmount2);
        }

        return $this;
    }

    /**
     * Add a new position to document
     *
     * @param string|null $newPositionId __BT-126, From BASIC__ Identification of the position
     * @param string|null $newParentPositionId __BT-X-304, From EXTENDED__ Identification of the parent position
     * @param string|null $newLineStatusCode __BT-X-7, From EXTENDED__ Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param string|null $newLineStatusReasonCode __BT-X-8, From EXTENDED__ Type to specify whether the invoice line is
     * @return self
     */
    public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set text information to latest added position
     *
     * @param string|null $newContent __BT-127, From BASIC__ Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode __BT-X-9, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode __BT-X-10, From EXTENDED__ Code for qualifying the free text for the invoice item
     * @return self
     */
    public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add text information to latest added position
     *
     * @param string|null $newContent __BT-127, From BASIC__ Text that contains unstructured information that is relevant to the invoice item
     * @param string|null $newContentCode __BT-X-9, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param string|null $newSubjectCode __BT-X-10, From EXTENDED__ Code for qualifying the free text for the invoice item
     * @return self
     */
    public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add product details to latest added position
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
        // Nothing here...

        return $this;
    }

    /**
     * Set product characteristics in latest added position
     *
     * @param string|null $newProductCharacteristicDescription __BT-160, From EN 16931__ Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue __BT-161, From EN 16931__ Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType __BT-X-11, From EXTENDED__ Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue __BT-X-12, From EXTENDED__ Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit __BT-X-12-0, From EXTENDED__ Unit of value of the characteristic
     * @return self
     */
    public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add product characteristics in latest added position
     *
     * @param string|null $newProductCharacteristicDescription __BT-160, From EN 16931__ Name of the attribute or characteristic ("Colour")
     * @param string|null $newProductCharacteristicValue __BT-161, From EN 16931__ Value of the attribute or characteristic ("Red")
     * @param string|null $newProductCharacteristicType __BT-X-11, From EXTENDED__ Type (Code) of product characteristic
     * @param float|null $newProductCharacteristicMeasureValue __BT-X-12, From EXTENDED__ Value of the characteristic (numerical measured)
     * @param string|null $newProductCharacteristicMeasureUnit __BT-X-12-0, From EXTENDED__ Unit of value of the characteristic
     * @return self
     */
    public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set product classification in latest added position
     *
     * @param string|null $newProductClassificationCode __BT-158, From EN 16931__ Classification identifier
     * @param string|null $newProductClassificationListId __BT-158-1, From EN 16931__ Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId __BT-158-2, From EN 16931__ Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname __BT-X-138, From EXTENDED__ Name with which an article can be classified according to type or quality
     * @return self
     */
    public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add product classification in latest added position
     *
     * @param string|null $newProductClassificationCode __BT-158, From EN 16931__ Classification identifier
     * @param string|null $newProductClassificationListId __BT-158-1, From EN 16931__ Identifier for the identification scheme of the item classification
     * @param string|null $newProductClassificationListVersionId __BT-158-2, From EN 16931__ Version of the identification scheme
     * @param string|null $newProductClassificationCodeClassname __BT-X-138, From EXTENDED__ Name with which an article can be classified according to type or quality
     * @return self
     */
    public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set referenced product in latest added position
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
     * @param string|null $newReferenceNumber __BT-X-537, From EXTENDED__ Seller's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-538, From EXTENDED__ Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-539, From EXTENDED__ Seller's order confirmation date
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
     * @param string|null $newReferenceNumber __BT-X-537, From EXTENDED__ Seller's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-538, From EXTENDED__ Seller's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-539, From EXTENDED__ Seller's order confirmation date
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
     * @param string|null $newReferenceNumber __BT-X-537, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-538, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-539, From EXTENDED__ Buyer's order confirmation date
     * @return self
     */
    public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an associated buyer's order confirmation (line reference).
     *
     * @param string|null $newReferenceNumber __BT-X-537, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-538, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-539, From EXTENDED__ Buyer's order confirmation date
     * @return self
     */
    public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the associated quotation (line reference).
     *
     * @param string|null $newReferenceNumber __BT-X-310, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-311, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-312, From EXTENDED__ Buyer's order confirmation date
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
     * @param string|null $newReferenceNumber __BT-X-310, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-311, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-312, From EXTENDED__ Buyer's order confirmation date
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
     * @param string|null $newReferenceNumber __BT-X-24, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-25, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Buyer's order confirmation date
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
     * @param string|null $newReferenceNumber __BT-X-24, From EXTENDED__ Buyer's order confirmation number
     * @param string|null $newReferenceLineNumber __BT-X-25, From EXTENDED__ Buyer's order confirmation line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-26, From EXTENDED__ Buyer's order confirmation date
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
     * @param string|null $newReferenceNumber __BT-X-27, From EXTENDED__ Additional document number
     * @param string|null $newReferenceLineNumber __BT-X-29, From EXTENDED__ Additional document line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-33, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-X-30, From EXTENDED__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-X-32, From EXTENDED__ Additional document reference-type code
     * @param string|null $newDescription __BT-X-299, From EXTENDED__ Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment __BT-X-31, From EXTENDED__ Additional document attachment
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
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional associated document (line reference)
     *
     * @param string|null $newReferenceNumber __BT-X-27, From EXTENDED__ Additional document number
     * @param string|null $newReferenceLineNumber __BT-X-29, From EXTENDED__ Additional document line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-33, From EXTENDED__ Additional document date
     * @param string|null $newTypeCode __BT-X-30, From EXTENDED__ Additional document type code
     * @param string|null $newReferenceTypeCode __BT-X-32, From EXTENDED__ Additional document reference-type code
     * @param string|null $newDescription __BT-X-299, From EXTENDED__ Additional document description
     * @param InvoiceSuiteAttachment|null $newInvoiceSuiteAttachment __BT-X-31, From EXTENDED__ Additional document attachment
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
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber __BT-X-43, From EXTENDED__ Ultimate customer order number
     * @param string|null $newReferenceLineNumber __BT-X-44, From EXTENDED__ Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-45, From EXTENDED__ Ultimate customer order date
     * @return self
     */
    public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference (line reference)
     *
     * @param string|null $newReferenceNumber __BT-X-43, From EXTENDED__ Ultimate customer order number
     * @param string|null $newReferenceLineNumber __BT-X-44, From EXTENDED__ Ultimate customer order line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-45, From EXTENDED__ Ultimate customer order date
     * @return self
     */
    public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber __BT-X-86, From EXTENDED__ Shipping notification number
     * @param string|null $newReferenceLineNumber __BT-X-87, From EXTENDED__ Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-88, From EXTENDED__ Shipping notification date
     * @return self
     */
    public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param string|null $newReferenceNumber __BT-X-86, From EXTENDED__ Shipping notification number
     * @param string|null $newReferenceLineNumber __BT-X-87, From EXTENDED__ Shipping notification line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-88, From EXTENDED__ Shipping notification date
     * @return self
     */
    public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber __BT-X-89, From EXTENDED__ Receipt notification number
     * @param string|null $newReferenceLineNumber __BT-X-90, From EXTENDED__ Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-91, From EXTENDED__ Receipt notification date
     * @return self
     */
    public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional receiving advice reference
     *
     * @param string|null $newReferenceNumber __BT-X-89, From EXTENDED__ Receipt notification number
     * @param string|null $newReferenceLineNumber __BT-X-90, From EXTENDED__ Receipt notification line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-91, From EXTENDED__ Receipt notification date
     * @return self
     */
    public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param string|null $newReferenceNumber __BT-X-92, From EXTENDED__ Delivery slip number
     * @param string|null $newReferenceLineNumber __BT-X-93, From EXTENDED__ Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-94, From EXTENDED__ Delivery slip date
     * @return self
     */
    public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param string|null $newReferenceNumber __BT-X-92, From EXTENDED__ Delivery slip number
     * @param string|null $newReferenceLineNumber __BT-X-93, From EXTENDED__ Delivery slip line number
     * @param DateTimeInterface|null $newReferenceDate __BT-X-94, From EXTENDED__ Delivery slip date
     * @return self
     */
    public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber __BT-X-331, From EXTENDED__ Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber __BT-X-540, From EXTENDED__ Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-333, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-X-332, From EXTENDED__ Type code of previous invoice
     * @return self
     */
    public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param string|null $newReferenceNumber __BT-X-331, From EXTENDED__ Identification of an invoice previously sent
     * @param string|null $newReferenceLineNumber __BT-X-540, From EXTENDED__ Identification of an invoice line previously sent
     * @param DateTimeInterface|null $newReferenceDate __BT-X-333, From EXTENDED__ Date of the previous invoice
     * @param string|null $newTypeCode __BT-X-332, From EXTENDED__ Type code of previous invoice
     * @return self
     */
    public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the position's gross price
     *
     * @param null|float $newGrossPrice __BT-148, From BASIC__ Unit price excluding sales tax before deduction of the discount on the item price
     * @param null|float $newGrossPriceBasisQuantity __BT-149-1, From BASIC__ Number of item units for which the price applies
     * @param null|string $newGrossPriceBasisQuantityUnit __BT-150-1, From BASIC__ Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount __BT-147, From BASIC__ Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge __BT-147-02, From BASIC__ Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent __BT-X-34, From EXTENDED__ Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount __BT-X-35, From EXTENDED__ Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason __BT-X-36, From EXTENDED__ Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode __BT-X-313, From EXTENDED__ Reason code for discount or charge (free text)
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
        // Nothing here...

        return $this;
    }

    /**
     * Add discount or charge to the gross price
     *
     * @param null|float $newGrossPriceAllowanceChargeAmount __BT-147, From BASIC__ Discount amount or charge amount on the item price
     * @param null|bool $newIsCharge __BT-147-02, From BASIC__ Switch for charge/discount
     * @param null|float $newGrossPriceAllowanceChargePercent __BT-X-34, From EXTENDED__ Discount or charge on the item price in percent
     * @param null|float $newGrossPriceAllowanceChargeBasisAmount __BT-X-35, From EXTENDED__ Base amount of the discount or charge
     * @param null|string $newGrossPriceAllowanceChargeReason __BT-X-36, From EXTENDED__ Reason for discount or charge (free text)
     * @param null|string $newGrossPriceAllowanceChargeReasonCode __BT-X-313, From EXTENDED__ Reason code for discount or charge (free text)
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the position's net price
     *
     * @param null|float $newNetPrice __BT-146, From BASIC__ Unit price excluding sales tax after deduction of the discount on the item price
     * @param null|float $newNetPriceBasisQuantity __BT-149, From BASIC__ Number of item units for which the price applies
     * @param null|string $newNetPriceBasisQuantityUnit __BT-150, From BASIC__ Unit code of the number of item units for which the price applies
     * @return self
     */
    public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the position's net price included tax
     *
     * @param string|null $newTaxCategory __BT-X-40, From EXTENDED__ Coded description of the tax category
     * @param string|null $newTaxType __BT-X-38, From EXTENDED__ Coded description of the tax type
     * @param float|null $newTaxAmount __BT-X-37, From EXTENDED__ Tax total amount
     * @param float|null $newTaxPercent __BT-X-42, From EXTENDED__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-X-39, From EXTENDED__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-X-41, From EXTENDED__ Reason for tax exemption (Code)
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the position's quantities
     *
     * @param null|float $newQuantity __BT-129, From BASIC__ Invoiced quantity
     * @param null|string $newQuantityUnit __BT-130, From BASIC__ Invoiced quantity unit
     * @param null|float $newChargeFreeQuantity __BT-X-46, From EXTENDED__ Charge Free quantity
     * @param null|string $newChargeFreeQuantityUnit __BT-X-46-0, From EXTENDED__ Charge Free quantity unit
     * @param null|float $newPackageQuantity __BT-X-47, From EXTENDED__ Package quantity
     * @param null|string $newPackageQuantityUnit __BT-X-47-0, From EXTENDED__ Package quantity unit
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param string|null $newName __BT-X-50, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionShipToName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param string|null $newName __BT-X-50, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionShipToName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param string|null $newId __BT-X-48, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newId __BT-X-48, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-49, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-49-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-49, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-49-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-66-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-66, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-66-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-66, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        // Nothing here...

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
        // Nothing here...

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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param string|null $newType __BT-X-51-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-51, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-52, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param string|null $newType __BT-X-51-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-51, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-52, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param string|null $newPersonName __BT-X-54, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-54-1, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-55, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-56, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-57, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param string|null $newPersonName __BT-X-54, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT-X-54-1, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT-X-55, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT-X-56, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT-X-57, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add communication information of the Ship-To party
     *
     * @param string|null $newType __BT-X-65-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-65, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param string|null $newType __BT-X-65-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-65, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param string|null $newName __BT-X-69, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param string|null $newName __BT-X-69, From EXTENDED__ The full formal name under which the party is registered.
     * @return self
     */
    public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param string|null $newId __BT-X-67, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newId __BT-X-67, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return self
     */
    public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-68, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-68-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param string|null $newGlobalId __BT-X-68, From EXTENDED__ A global identifier of the party.
     * @param string|null $newGlobalIdType __BT-X-68-0, From EXTENDED__ Type of the global identifier of the party.
     * @return self
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-84-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-84, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param string|null $newTaxRegistrationType __BT-X-84-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param string|null $newTaxRegistrationId __BT-X-84, From EXTENDED__ Tax identification number.
     * @return self
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 __BT_X-77, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT_X-78, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT_X-79, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT_X-76, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT_X-80, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT_X-81, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT_X-82, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Add a address of the ultimate Ship-To party
     *
     * @param string|null $newAddressLine1 __BT_X-77, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param string|null $newAddressLine2 __BT_X-78, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newAddressLine3 __BT_X-79, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param string|null $newPostcode __BT_X-76, From EXTENDED__ Zip code of the city or municipality in which the party's address is located.
     * @param string|null $newCity __BT_X-80, From EXTENDED__ Name of the city or municipality in which the party's address is located.
     * @param string|null $newCountryId __BT_X-81, From EXTENDED__ Country in which the party's address is located.
     * @param string|null $newSubDivision __BT_X-82, From EXTENDED__ Region or federal state in which the party's address is located.
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-70-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-70, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-71, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-70-0, From EXTENDED__ Type of the identification number of the legal registration of the party.
     * @param string|null $newId __BT-X-70, From EXTENDED__ Identification number of the legal registration of the party.
     * @param string|null $newName __BT-X-71, From EXTENDED__ Name by which the party is known, if different from the party's name.
     * @return self
     */
    public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName __BT_X-72, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT_X-72-1, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT_X-73, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT_X-74, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT_X-75, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param string|null $newPersonName __BT_X-72, From EXTENDED__ Name of contact person or department or office for the contact point.
     * @param string|null $newDepartmentName __BT_X-72-1, From EXTENDED__ Name of the department for the contact point.
     * @param string|null $newPhoneNumber __BT_X-73, From EXTENDED__ Telephone number for the contact point.
     * @param string|null $newFaxNumber __BT_X-74, From EXTENDED__ Fax number of the contact point.
     * @param string|null $newEmailAddress __BT_X-75, From EXTENDED__ E-Mail address of the contact point.
     * @return self
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-75-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-75, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param string|null $newType __BT-X-75-0, From EXTENDED__ The type for the party's electronic address.
     * @param string|null $newUri __BT-X-75, From EXTENDED__ The party's electronic address.
     * @return self
     */
    public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param DateTimeInterface|null $newDate __BT-X-85, From EXTENDED__
     * @return self
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param null|DateTimeInterface $newStartDate __BT-134, From BASIC__ Start of the billing period
     * @param null|DateTimeInterface $newEndDate __BT-135, From BASIC__ End of the billing period
     * @param null|string $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return self
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): self {
        // Nothing here...

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
        // Nothing here...

        return $this;
    }

    /**
     * Set the position's tax information
     *
     * @param string|null $newTaxCategory __BT-151, From BASIC__ Coded description of the tax category
     * @param string|null $newTaxType __BT-151-0, From BASIC__ Coded description of the tax type
     * @param float|null $newTaxAmount __BT-X-95, From EXTENDED__ Tax total amount
     * @param float|null $newTaxPercent __BT-152, From BASIC__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-X-96, From EXTENDED__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-X-97, From EXTENDED__ Reason for tax exemption (Code)
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
        // Nothing here...

        return $this;
    }

    /**
     * Add a position's tax information
     *
     * @param string|null $newTaxCategory __BT-151, From BASIC__ Coded description of the tax category
     * @param string|null $newTaxType __BT-151-0, From BASIC__ Coded description of the tax type
     * @param float|null $newTaxAmount __BT-X-95, From EXTENDED__ Tax total amount
     * @param float|null $newTaxPercent __BT-152, From BASIC__ Tax Rate (Percentage)
     * @param string|null $newExemptionReason __BT-X-96, From EXTENDED__ Reason for tax exemption (free text)
     * @param string|null $newExemptionReasonCode __BT-X-97, From EXTENDED__ Reason for tax exemption (Code)
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
        // Nothing here...

        return $this;
    }

    /**
     * Set Document position Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator __BT-27-1/BT-28-1, From BASIC__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount __BT-136/BT-141, From BASIC__ Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount __BT-137, From EN 16931__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason __BT-139/BT-144, From BASIC__ Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode __BT-140/BT-145, From BASIC__ Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent __BT-138, From BASIC__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        // Nothing here...

        return $this;
    }

    /**
     * Add Document position Allowance/Charge
     *
     * @param boolean|null $newChargeIndicator __BT-27-1/BT-28-1, From BASIC__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param float|null $newAllowanceChargeAmount __BT-136/BT-141, From BASIC__ Amount of the surcharge or discount
     * @param float|null $newAllowanceChargeBaseAmount __BT-137, From EN 16931__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param string|null $newAllowanceChargeReason __BT-139/BT-144, From BASIC__ Reason given in text form for the surcharge or discount
     * @param string|null $newAllowanceChargeReasonCode __BT-140/BT-145, From BASIC__ Reason given as a code for the surcharge or discount
     * @param float|null $newAllowanceChargePercent __BT-138, From BASIC__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        // Nothing here...

        return $this;
    }

    /**
     * Set the document position summation
     *
     * @param float|null $newNetAmount __BT-131, From BASIC__ Net amount
     * @param float|null $newChargeTotalAmount __BT-X-327, From EXTENDED__ Sum of the charges
     * @param float|null $newDiscountTotalAmount __BT-X-328, From EXTENDED__ Sum of the discounts
     * @param float|null $newTaxTotalAmount __BT-X-329, From EXTENDED__ Total amount of the line (in the invoice currency)
     * @param float|null $newGrossAmount __BT-X-330, From EXTENDED__ Total invoice line amount including sales tax
     * @return self
     */
    public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null,
    ): self {
        // Nothing here...

        return $this;
    }

    /**
     * Set a position's posting reference
     *
     * @param string|null $newType __BT-X-99, From EXTENDED__ Type of the posting reference
     * @param string|null $newAccountId __BT-133, From EN 16931__ Posting reference of the byuer
     * @return self
     */
    public function setDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        // Nothing here...

        return $this;
    }

    /**
     * Add a position's posting reference
     *
     * @param string|null $newType __BT-X-99, From EXTENDED__ Type of the posting reference
     * @param string|null $newAccountId __BT-133, From EN 16931__ Posting reference of the byuer
     * @return self
     */
    public function addDocumentPositionPostingReference(?string $newType = null, ?string $newAccountId = null): self
    {
        // Nothing here...

        return $this;
    }
}
