<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffx;

use DateTimeInterface;
use horstoeko\invoicesuite\codelists\InvoiceSuiteCodelistPaymentMeans;
use horstoeko\invoicesuite\concerns\HandlesKeyValuePairs;
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
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\documents\providers\zffx\models\ram\TradePaymentTermsType;
use horstoeko\invoicesuite\documents\providers\zffx\models\rsm\CrossIndustryInvoiceType;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteDateTimeUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteFloatUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;

class InvoiceSuiteZfFxProviderBuilder extends InvoiceSuiteAbstractDocumentFormatBuilder
{
    use HandlesKeyValuePairs;
    use InvoiceSuiteZfFxChecksProfiles;

    /**
     * {@inheritDoc}
     */
    public function initDocumentRootObject(): static
    {
        $this->setContextParameter(
            $this->getCurrentDocumentFormatProviderParameterValue('ContextParameter', ''),
            $this->getCurrentDocumentFormatProviderParameterValue('BusinessProcess', '')
        );

        return $this;
    }

    /**
     * Init context parameter for profile definition
     *
     * @param  string $newContextParameter
     * @param  string $newBusinessProcessContextParameter
     * @return static
     */
    public function setContextParameter(
        string $newContextParameter,
        string $newBusinessProcessContextParameter = '',
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContextParameter)) {
            $this
                ->getCrossIndustryRootObject()
                ->getExchangedDocumentContextWithCreate()
                ->getGuidelineSpecifiedDocumentContextParameterWithCreate()
                ->getIDWithCreate()
                ->setValue($newContextParameter);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newBusinessProcessContextParameter)) {
            $this
                ->getCrossIndustryRootObject()
                ->getExchangedDocumentContextWithCreate()
                ->getBusinessProcessSpecifiedDocumentContextParameterWithCreate()
                ->getIDWithCreate()
                ->setValue($newBusinessProcessContextParameter);
        }

        $this->traceMethodExit(__METHOD__);

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
        $this->traceMethodEnter(__METHOD__);

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

        $newDocumentDTO->forEachNote(fn (InvoiceSuiteNoteDTO $note) => $this->addDocumentNote(
            $note->getContent(),
            $note->getContentCode(),
            $note->getSubjectCode()
        ));

        // Document-Level Billing period

        $newDocumentDTO->firstBillingPeriod(
            fn (InvoiceSuiteDateRangeDTO $item) => $this->setDocumentBillingPeriod(
                $item->getStartDate(),
                $item->getEndDate(),
                $item->getDescription()
            )
        );

        // Document-Level Posting Reference

        $newDocumentDTO->forEachOrFirstPostingReference(
            $this->supportsAtLeastExtended(),
            fn (InvoiceSuiteIdDTO $item) => $this->addDocumentPostingReference(
                $item->getIdType(),
                $item->getId()
            )
        );

        // Document-Level Seller Order Reference

        $newDocumentDTO->firstSellerOrderReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentSellerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Buyer Order Reference

        $newDocumentDTO->firstBuyerOrderReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentBuyerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Quotation Reference

        $newDocumentDTO->firstQuotationReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentQuotationReference(
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

        // Document-Level Invoice Reference

        $newDocumentDTO->forEachInvoiceReference(
            fn (InvoiceSuiteReferenceDocumentExtDTO $item) => $this->addDocumentInvoiceReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate(),
                $item->getTypeCode()
            )
        );

        // Document-Level Project Reference

        $newDocumentDTO->firstProjectReference(
            fn (InvoiceSuiteProjectDTO $item) => $this->setDocumentProjectReference(
                $item->getProjectNumber(),
                $item->getProjectName()
            )
        );

        // Document-Level Ultimate Customer Order Reference

        $newDocumentDTO->forEachUltimateCustomerOrderReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->addDocumentUltimateCustomerOrderReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
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

        // Document-Level Delivery Note Reference

        $newDocumentDTO->firstDeliveryNoteReference(
            fn (InvoiceSuiteReferenceDocumentDTO $item) => $this->setDocumentDeliveryNoteReference(
                $item->getReferenceNumber(),
                $item->getReferenceDate()
            )
        );

        // Document-Level Supply Chain Event

        $newDocumentDTO->firstSupplyChainEvent(
            fn (DateTimeInterface $item) => $this->setDocumentSupplyChainEvent($item)
        );

        // Document-Level Buyer Reference

        $newDocumentDTO->firstBuyerReference(
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerReference($item->getId())
        );

        // Document-Level Delivery Terms

        $newDocumentDTO->firstDeliveryTerm(
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentDeliveryTerms($item->getId())
        );

        // Document-Level Seller/Supplier Party

        $newDocumentDTO
            ->getSellerParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentSellerName($item)
            )
            ?->forEachId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentSellerId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentSellerGlobalId($item->getId(), $item->getIdType())
            )
            ?->forEachTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentSellerTaxRegistration($item->getIdType(), $item->getId())
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
            ?->firstLegalOrganisation(
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentSellerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachOrFirstContact(
                $this->supportsAtLeastExtended(),
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentSellerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentSellerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Buyer/Customer Party

        $newDocumentDTO
            ->getBuyerParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentBuyerName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentBuyerGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentBuyerTaxRegistration($item->getIdType(), $item->getId())
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
            ?->firstLegalOrganisation(
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentBuyerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachOrFirstContact(
                $this->supportsAtLeastExtended(),
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentBuyerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentBuyerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Seller Tax Representative Party

        $newDocumentDTO
            ->getTaxRepresentativeParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentTaxRepresentativeName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentTaxRepresentativeId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentTaxRepresentativeGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentTaxRepresentativeTaxRegistration($item->getIdType(), $item->getId())
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
            ?->firstLegalOrganisation(
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentTaxRepresentativeLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentTaxRepresentativeContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentTaxRepresentativeCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Product End-User Party

        $newDocumentDTO
            ->getProductEndUserParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentProductEndUserName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentProductEndUserId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentProductEndUserGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentProductEndUserTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentProductEndUserAddress(
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
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentProductEndUserLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentProductEndUserContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentProductEndUserCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Ship-To Party

        $newDocumentDTO
            ->getShipToParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentShipToName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentShipToId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentShipToGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentShipToTaxRegistration($item->getIdType(), $item->getId())
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
            )
            ?->firstLegalOrganisation(
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentShipToLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentShipToContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentShipToCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Ultimate Ship-To Party

        $newDocumentDTO
            ->getUltimateShipToParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentUltimateShipToName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentUltimateShipToId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentUltimateShipToGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentUltimateShipToTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentUltimateShipToAddress(
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
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentUltimateShipToLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentUltimateShipToContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentUltimateShipToCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Ship-From Party

        $newDocumentDTO
            ->getShipFromParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentShipfromName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentShipfromId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentShipfromGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentShipfromTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentShipfromAddress(
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
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentShipfromLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentShipfromContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentShipfromCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Invoicer Party

        $newDocumentDTO
            ->getInvoicerParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentInvoicerName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentInvoicerId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentInvoicerGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentInvoicerTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentInvoicerAddress(
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
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentInvoicerLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentInvoicerContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentInvoicerCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Invoicee Party

        $newDocumentDTO
            ->getInvoiceeParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentInvoiceeName($item)
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentInvoiceeId($item->getId())
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentInvoiceeGlobalId($item->getId(), $item->getIdType())
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentInvoiceeTaxRegistration($item->getIdType(), $item->getId())
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentInvoiceeAddress(
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
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentInvoiceeLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentInvoiceeContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentInvoiceeCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Payee Party

        $newDocumentDTO
            ->getPayeeParty()
            ?->firstName(
                fn (string $item) => $this->setDocumentPayeeName(
                    $item
                )
            )
            ?->firstId(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPayeeId(
                    $item->getId()
                )
            )
            ?->forEachGlobalId(
                fn (InvoiceSuiteIdDTO $item) => $this->addDocumentPayeeGlobalId(
                    $item->getId(),
                    $item->getIdType()
                )
            )
            ?->firstTaxRegistration(
                fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPayeeTaxRegistration(
                    $item->getIdType(),
                    $item->getId()
                )
            )
            ?->firstAddress(
                fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentPayeeAddress(
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
                fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentPayeeLegalOrganisation(
                    $item->getIdType(),
                    $item->getId(),
                    $item->getName()
                )
            )
            ?->forEachContact(
                fn (InvoiceSuiteContactDTO $item) => $this->addDocumentPayeeContact(
                    $item->getPersonName(),
                    $item->getDepartmentName(),
                    $item->getPhoneNumber(),
                    $item->getFaxNumber(),
                    $item->getEmailAddress()
                )
            )
            ?->firstCommunication(
                fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentPayeeCommunication(
                    $item->getIdType(),
                    $item->getId()
                )
            );

        // Document-Level Payment Means

        $newDocumentDTO->forEachPaymentMean(
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

        $newDocumentDTO->forEachOrFirstPaymentTerm(
            $this->supportsAtLeastExtended(),
            function (InvoiceSuitePaymentTermDTO $item): void {
                $this->addDocumentPaymentTerm(
                    $item->getDescription(),
                    $item->getDueDate(),
                    $item->getMandate()
                );
                $item->firstDiscountTerm(
                    fn (InvoiceSuitePaymentTermDiscountDTO $item) => $this->setDocumentPaymentDiscountTermsInLastPaymentTerm(
                        $item->getBaseAmount(),
                        $item->getDiscountAmount(),
                        $item->getDiscountPercent(),
                        $item->getBaseDate(),
                        $item->getPeriod()?->getPeriod(),
                        $item->getPeriod()?->getPeriodUnit()
                    )
                );
                $item->firstPenaltyTerm(
                    fn (InvoiceSuitePaymentTermPenaltyDTO $item) => $this->setDocumentPaymentPenaltyTermsInLastPaymentTerm(
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
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPaymentCreditorReferenceID($item->getId())
        );

        // Document-Level Payment Reference

        $newDocumentDTO->firstPaymentReference(
            fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPaymentReference($item->getId())
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

        // Document-Level Logistic Service Charges

        $newDocumentDTO->forEachServiceCharge(
            fn (InvoiceSuiteServiceChargeDTO $item) => $this->addDocumentLogisticServiceCharge(
                $item->getAmount(),
                $item->getDescription(),
                $item->getTaxCategory(),
                $item->getTaxType(),
                $item->getTaxPercent()
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

        // Positions

        $newDocumentDTO->forEachPosition(
            function (InvoiceSuiteDocumentPositionDTO $item): void {
                $this->addDocumentPosition(
                    $item->getLineId(),
                    $item->getParentLineId(),
                    $item->getLineStatus(),
                    $item->getLineStatusReason()
                );

                $item->forEachOrFirstNote(
                    $this->supportsAtLeastExtended(),
                    fn (InvoiceSuiteNoteDTO $itemNote) => $this->addDocumentPositionNote(
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
                    fn (InvoiceSuiteProductCharacteristicDTO $characteristic) => $this->addDocumentPositionProductCharacteristic(
                        $characteristic->getDescription(),
                        $characteristic->getValue(),
                        $characteristic->getType(),
                        $characteristic->getValueMeasure()?->getValue(),
                        $characteristic->getValueMeasure()?->getUnit()
                    )
                );

                $item->getProduct()?->forEachClassification(
                    fn (InvoiceSuiteProductClassificationDTO $classification) => $this->addDocumentPositionProductClassification(
                        $classification->getCode(),
                        $classification->getListId(),
                        $classification->getListVersionId(),
                        $classification->getName()
                    )
                );

                $item->getProduct()?->forEachReferenceProduct(
                    fn (InvoiceSuiteReferenceProductDTO $referencedProduct) => $this->addDocumentPositionReferencedProduct(
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
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionSellerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstBuyerOrderReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionBuyerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstQuotationReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionQuotationReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstContractReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionContractReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->forEachAdditionalReference(
                    fn (InvoiceSuiteReferenceDocumentLineExtDTO $item) => $this->addDocumentPositionAdditionalReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate(),
                        $item->getTypeCode(),
                        $item->getReferenceTypeCode(),
                        $item->getDescription(),
                        $item->getAttachment()
                    )
                );

                $item->forEachUltimateCustomerOrderReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->addDocumentPositionUltimateCustomerOrderReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstDespatchAdviceReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionDespatchAdviceReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstReceivingAdviceReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionReceivingAdviceReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstDeliveryNoteReference(
                    fn (InvoiceSuiteReferenceDocumentLineDTO $item) => $this->setDocumentPositionDeliveryNoteReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate()
                    )
                );

                $item->firstInvoiceReference(
                    fn (InvoiceSuiteReferenceDocumentLineExtDTO $item) => $this->setDocumentPositionInvoiceReference(
                        $item->getReferenceNumber(),
                        $item->getReferenceLineNumber(),
                        $item->getReferenceDate(),
                        $item->getTypeCode()
                    )
                );

                $item->forEachOrFirstAdditionalObjectReference(
                    $this->supportsAtLeastExtended(),
                    fn (InvoiceSuiteReferenceDocumentExtDTO $item) => $this->addDocumentPositionAdditionalObjectReference(
                        $item->getReferenceNumber(),
                        $item->getTypeCode(),
                        $item->getReferenceTypeCode()
                    )
                );

                // Position Gross Price

                $this->setDocumentPositionGrossPrice(
                    $item->getGrossPrice()?->getAmount(),
                    $item->getGrossPrice()?->getPriceQuantity()?->getQuantity(),
                    $item->getGrossPrice()?->getPriceQuantity()?->getQuantityUnit()
                );

                $item->getGrossPrice()?->forEachOrFirstAllowanceCharge(
                    $this->supportsAtLeastExtended(),
                    fn (InvoiceSuiteAllowanceChargeDTO $itemGrossPriceAllowanceCharge) => $this->addDocumentPositionGrossPriceAllowanceCharge(
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
                    fn (InvoiceSuiteTaxDTO $netPriceTax) => $this->setDocumentPositionNetPriceTax(
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
                    $item->getQuantityPackage()?->getQuantityUnit(),
                    $item->getQuantityPerPackage()?->getQuantity(),
                    $item->getQuantityPerPackage()?->getQuantityUnit()
                );

                // Position Ship-To

                $item->getShipToParty()
                    ?->firstName(
                        fn (string $item) => $this->setDocumentPositionShipToName($item)
                    )
                    ?->firstId(
                        fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPositionShipToId($item->getId())
                    )
                    ?->forEachGlobalId(
                        fn (InvoiceSuiteIdDTO $item) => $this->addDocumentPositionShipToGlobalId($item->getId(), $item->getIdType())
                    )
                    ?->firstTaxRegistration(
                        fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPositionShipToTaxRegistration($item->getIdType(), $item->getId())
                    )
                    ?->firstAddress(
                        fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentPositionShipToAddress(
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
                        fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentPositionShipToLegalOrganisation(
                            $item->getIdType(),
                            $item->getId(),
                            $item->getName()
                        )
                    )
                    ?->forEachContact(
                        fn (InvoiceSuiteContactDTO $item) => $this->addDocumentPositionShipToContact(
                            $item->getPersonName(),
                            $item->getDepartmentName(),
                            $item->getPhoneNumber(),
                            $item->getFaxNumber(),
                            $item->getEmailAddress()
                        )
                    )
                    ?->firstCommunication(
                        fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentPositionShipToCommunication(
                            $item->getIdType(),
                            $item->getId()
                        )
                    );

                // Position Ultimate Ship-To

                $item->getUltimateShipToParty()
                    ?->firstName(
                        fn (string $item) => $this->setDocumentPositionUltimateShipToName($item)
                    )
                    ?->firstId(
                        fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPositionUltimateShipToId($item->getId())
                    )
                    ?->forEachGlobalId(
                        fn (InvoiceSuiteIdDTO $item) => $this->addDocumentPositionUltimateShipToGlobalId($item->getId(), $item->getIdType())
                    )
                    ?->firstTaxRegistration(
                        fn (InvoiceSuiteIdDTO $item) => $this->setDocumentPositionUltimateShipToTaxRegistration($item->getIdType(), $item->getId())
                    )
                    ?->firstAddress(
                        fn (InvoiceSuiteAddressDTO $item) => $this->setDocumentPositionUltimateShipToAddress(
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
                        fn (InvoiceSuiteOrganisationDTO $item) => $this->setDocumentPositionUltimateShipToLegalOrganisation(
                            $item->getIdType(),
                            $item->getId(),
                            $item->getName()
                        )
                    )
                    ?->forEachContact(
                        fn (InvoiceSuiteContactDTO $item) => $this->addDocumentPositionUltimateShipToContact(
                            $item->getPersonName(),
                            $item->getDepartmentName(),
                            $item->getPhoneNumber(),
                            $item->getFaxNumber(),
                            $item->getEmailAddress()
                        )
                    )
                    ?->firstCommunication(
                        fn (InvoiceSuiteCommunicationDTO $item) => $this->setDocumentPositionUltimateShipToCommunication(
                            $item->getIdType(),
                            $item->getId()
                        )
                    );

                // Position supply chain event

                $item->firstSupplyChainEvent(
                    fn (DateTimeInterface $supplyChainEvent) => $this->setDocumentPositionSupplyChainEvent($supplyChainEvent)
                );

                // Position billing period

                $item->firstBillingPeriod(
                    fn (InvoiceSuiteDateRangeDTO $billingPeriod) => $this->setDocumentPositionBillingPeriod(
                        $billingPeriod->getStartDate(),
                        $billingPeriod->getEndDate(),
                        $billingPeriod->getDescription()
                    )
                );

                // Position posting references

                $item->forEachOrFirstPostingReference(
                    $this->supportsAtLeastExtended(),
                    fn (InvoiceSuiteIdDTO $postingReference) => $this->addDocumentPositionPostingReference(
                        $postingReference->getIdType(),
                        $postingReference->getId()
                    )
                );

                // Position taxes

                $item->forEachOrFirstTax(
                    $this->supportsAtLeastExtended(),
                    fn (InvoiceSuiteTaxDTO $tax) => $this->addDocumentPositionTax(
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
                    fn (InvoiceSuiteAllowanceChargeDTO $allowanceCharge) => $this->addDocumentPositionAllowanceCharge(
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document number (e.g. invoice number)
     *
     * @param  null|string $newDocumentNo __BT-1, From MINIMUM__ The document no issued by the seller
     * @return static
     */
    public function setDocumentNo(
        ?string $newDocumentNo = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetID();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentNo)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentNo)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIDWithCreate()
            ->setValue($newDocumentNo);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document type code
     *
     * @param  null|string $newDocumentType __BT-3, From MINIMUM__ The type of the document
     * @return static
     */
    public function setDocumentType(
        ?string $newDocumentType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetTypeCode();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentType)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentType)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getTypeCodeWithCreate()
            ->setValue($newDocumentType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document description
     *
     * @param  null|string $newDocumentDescription __BT-X-2, From EXTENDED__ The documenttype as free text
     * @return static
     */
    public function setDocumentDescription(
        ?string $newDocumentDescription = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentDescription)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentDescription)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getNameWithCreate()
            ->setValue($newDocumentDescription);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document language
     *
     * @param  null|string $newDocumentLanguage __BT-X-4, From EXTENDED__ Language indicator. The language code in which the document was written
     * @return static
     */
    public function setDocumentLanguage(
        ?string $newDocumentLanguage = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetLanguageID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentLanguage)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentLanguage)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getLanguageIDWithCreate()
            ->setValue($newDocumentLanguage);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document date (e.g. invoice date)
     *
     * @param  null|DateTimeInterface $newDocumentDate __BT-2-00, From MINIMUM__ Date of the document. The date when the document was issued by the seller
     * @return static
     */
    public function setDocumentDate(
        ?DateTimeInterface $newDocumentDate = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetIssueDateTime();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDocumentDate)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'datetimeIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDocumentDate)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getIssueDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newDocumentDate->format('Ymd'))
            ->setFormat('102');

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document period
     *
     * @param  null|DateTimeInterface $newCompleteDate __BT-X-6-000, From EXTENDED__ Contractual due date of the document
     * @return static
     */
    public function setDocumentCompleteDate(
        ?DateTimeInterface $newCompleteDate = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetEffectiveSpecifiedPeriod();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newCompleteDate)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'datetimeIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newCompleteDate)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getEffectiveSpecifiedPeriodWithCreate()
            ->getCompleteDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newCompleteDate->format('Ymd'))
            ->setFormat('102');

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document currency
     *
     * @param  null|string $newDocumentCurrency __BT-5, From MINIMUM__ Code for the invoice currency
     * @return static
     */
    public function setDocumentCurrency(
        ?string $newDocumentCurrency = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetInvoiceCurrencyCode();

        $this->updateCurrencies();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentCurrency)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentCurrency)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceCurrencyCodeWithCreate()
            ->setValue($newDocumentCurrency);

        $this->updateCurrencies();

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new document tax currency
     *
     * @param  null|string $newDocumentTaxCurrency __BT-6, From BASIC WL__ Code for the tax currency
     * @return static
     */
    public function setDocumentTaxCurrency(
        ?string $newDocumentTaxCurrency = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetTaxCurrencyCode();

        $this->updateCurrencies();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentTaxCurrency)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDocumentTaxCurrency)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getTaxCurrencyCodeWithCreate()
            ->setValue($newDocumentTaxCurrency);

        $this->updateCurrencies();

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new status of the copy indicator
     *
     * @param  null|bool $newDocumentIsCopy __BT-X-1-00, From EXTENDED__ Indicates that the document is a copy
     * @return static
     */
    public function setDocumentIsCopy(
        ?bool $newDocumentIsCopy = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetCopyIndicator();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (is_null($newDocumentIsCopy)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($newDocumentIsCopy)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->getCopyIndicatorWithCreate()
            ->setIndicator($newDocumentIsCopy);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Sets the new status of the test indicator
     *
     * @param  null|bool $newDocumentIsTest __BT-X-3-00, From EXTENDED__ Indicates that the document is a test
     * @return static
     */
    public function setDocumentIsTest(
        ?bool $newDocumentIsTest = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentContext()
            ?->unsetTestIndicator();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (is_null($newDocumentIsTest)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($newDocumentIsTest)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentContextWithCreate()
            ->getTestIndicatorWithCreate()
            ->setIndicator($newDocumentIsTest);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set a note to the document. This clears all added notes
     *
     * @param  null|string $newContent     __BT-22, From BASIC WL__ Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode __BT-X-5, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode __BT-21, From BASIC WL__ Qualification of the free text for the invoice
     * @return static
     */
    public function setDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocument()
            ?->unsetIncludedNote();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)');
        }

        $this->addDocumentNote($newContent, $newContentCode, $newSubjectCode);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a note to the document
     *
     * @param  null|string $newContent     __BT-22, From BASIC WL__ Free text containing unstructured information that is relevant to the invoice as a whole
     * @param  null|string $newContentCode __BT-X-5, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode __BT-21, From BASIC WL__ Qualification of the free text for the invoice
     * @return static
     */
    public function addDocumentNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)');
        }

        $note = $this
            ->getCrossIndustryRootObject()
            ->getExchangedDocumentWithCreate()
            ->addToIncludedNoteWithCreate();

        $note->getContentWithCreate()->setValue($newContent);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContentCode)) {
            $note->getContentCodeWithCreate()->setValue($newContentCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubjectCode)) {
            $note->getSubjectCodeWithCreate()->setValue($newSubjectCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   __BT-73, From BASIC WL__ Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     __BT-74, From BASIC WL__ End of the billing period
     * @param  null|string            $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return static
     */
    public function setDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetBillingSpecifiedPeriod();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])');
        }

        $billingPeriod = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getBillingSpecifiedPeriodWithCreate();

        $billingPeriod
            ->getStartDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newStartDate->format('Ymd'))
            ->setFormat('102');

        $billingPeriod
            ->getEndDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newEndDate->format('Ymd'))
            ->setFormat('102');

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $billingPeriod
                ->getDescriptionWithCreate()
                ->setValue($newDescription);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a the start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   __BT-73, From BASIC WL__ Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     __BT-74, From BASIC WL__ End of the billing period
     * @param  null|string            $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return static
     */
    public function addDocumentBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])');
        }

        $this->setDocumentBillingPeriod(
            $newStartDate,
            $newEndDate,
            $newDescription
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set a posting reference
     *
     * @param  null|string $newType      __BT-X-290, From EXTENDED__ Type of the posting reference
     * @param  null|string $newAccountId __BT-19, From BASIC WL__ Posting reference of the byuer
     * @return static
     */
    public function setDocumentPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetReceivableSpecifiedTradeAccountingAccount();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)');
        }

        $this->addDocumentPostingReference($newType, $newAccountId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a posting reference
     *
     * @param  null|string $newType      __BT-X-290, From EXTENDED__ Type of the posting reference
     * @param  null|string $newAccountId __BT-19, From BASIC WL__ Posting reference of the byuer
     * @return static
     */
    public function addDocumentPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getApplicableHeaderTradeSettlement()
                ?->unsetReceivableSpecifiedTradeAccountingAccount();
        }

        $tradeAccountingAccount = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $tradeAccountingAccount->getIDWithCreate()->setValue($newAccountId);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $tradeAccountingAccount->getTypeCodeWithCreate()->setValue($newType);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return static
     */
    public function setDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetSellerOrderReferencedDocument();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $sellerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerOrderReferencedDocumentWithCreate();

        $sellerOrderReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $sellerOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an associated seller's order confirmation.
     *
     * @param  null|string            $newReferenceNumber __BT-14, From EN 16931__ Seller's order confirmation number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-146, From EXTENDED__ Seller's order confirmation date
     * @return static
     */
    public function addDocumentSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->setDocumentSellerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated buyer's order
     *
     * @param  null|string            $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-147, From EXTENDED__ Buyer's order date
     * @return static
     */
    public function setDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetBuyerOrderReferencedDocument();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $buyerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerOrderReferencedDocumentWithCreate();

        $buyerOrderReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $buyerOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an associated buyer's order
     *
     * @param  null|string            $newReferenceNumber __BT-13, From MINIMUM__ Buyers's order number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-147, From EXTENDED__ Buyer's order date
     * @return static
     */
    public function addDocumentBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->setDocumentBuyerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated quotation
     *
     * @param  null|string            $newReferenceNumber __BT-X-403, From EXTENDED__ Quotation number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-404, From EXTENDED__ Quotation date
     * @return static
     */
    public function setDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetQuotationReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $quotationReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getQuotationReferencedDocumentWithCreate();

        $quotationReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $quotationReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an associated quotation
     *
     * @param  null|string            $newReferenceNumber __BT-X-403, From EXTENDED__ quotation number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-404, From EXTENDED__ quotation date
     * @return static
     */
    public function addDocumentQuotationReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->setDocumentQuotationReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated contract
     *
     * @param  string                 $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-26, From EXTENDED__ Contract date
     * @return static
     */
    public function setDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetContractReferencedDocument();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $contractReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getContractReferencedDocumentWithCreate();

        $contractReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $contractReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add am associated contract
     *
     * @param  string                 $newReferenceNumber __BT-12, From BASIC WL__ Contract number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-26, From EXTENDED__ Contract date
     * @return static
     */
    public function addDocumentContractReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->setDocumentContractReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        __BT-122, From EN 16931__ Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          __BT-X-149, From EXTENDED__ Additional document date
     * @param  null|string                 $newTypeCode               __BT-122-0, From EN 16931__ Additional document type code
     * @param  null|string                 $newReferenceTypeCode      __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param  null|string                 $newDescription            __BT-123, From EN 16931__ Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment __BT-125, From EN 16931__ Additional document attachment
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetAdditionalReferencedDocument();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])');
        }

        $this->addDocumentAdditionalReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional associated document
     *
     * @param  null|string                 $newReferenceNumber        __BT-122, From EN 16931__ Additional document number
     * @param  null|DateTimeInterface      $newReferenceDate          __BT-X-149, From EXTENDED__ Additional document date
     * @param  null|string                 $newTypeCode               __BT-122-0, From EN 16931__ Additional document type code
     * @param  null|string                 $newReferenceTypeCode      __BT-18-1, From EN 16931__ Additional document reference-type code
     * @param  null|string                 $newDescription            __BT-123, From EN 16931__ Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment __BT-125, From EN 16931__ Additional document attachment
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])');
        }

        $additionalReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->addToAdditionalReferencedDocumentWithCreate();

        $additionalReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        $additionalReference
            ->getTypeCodeWithCreate()
            ->setValue($newTypeCode);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $additionalReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceTypeCode)) {
            $additionalReference
                ->getReferenceTypeCodeWithCreate()
                ->setValue($newReferenceTypeCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $additionalReference
                ->getNameWithCreate()
                ->setValue($newDescription);
        }

        if (!is_null($newInvoiceSuiteAttachment)) {
            if ($newInvoiceSuiteAttachment->isBinaryAttachment()) {
                $additionalReference
                    ->getAttachmentBinaryObjectWithCreate()
                    ->setFilename($newInvoiceSuiteAttachment->getFilename())
                    ->setMimeCode($newInvoiceSuiteAttachment->getContentMimeType())
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }

            if ($newInvoiceSuiteAttachment->isUrlAttachment()) {
                $additionalReference
                    ->getURIIDWithCreate()
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   __BT-26, From BASIC WL__Date of the previous invoice
     * @param  null|string            $newTypeCode        __BT-X-555, From EXTENDED__ Type code of previous invoice
     * @return static
     */
    public function setDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetInvoiceReferencedDocument();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->addDocumentInvoiceReference(
            $newReferenceNumber,
            $newReferenceDate,
            $newTypeCode
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber __BT-25, From BASIC WL__ Identification of an invoice previously sent
     * @param  null|DateTimeInterface $newReferenceDate   __BT-26, From BASIC WL__Date of the previous invoice
     * @param  null|string            $newTypeCode        __BT-X-555, From EXTENDED__ Type code of previous invoice
     * @return static
     */
    public function addDocumentInvoiceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $invoiceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToInvoiceReferencedDocumentWithCreate();

        $invoiceReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)) {
            $invoiceReference
                ->getTypeCodeWithCreate()
                ->setValue($newTypeCode);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $invoiceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional project reference
     *
     * @param  null|string $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param  null|string $newName            __BT-11-0, From EN 16931__ Project name
     * @return static
     */
    public function setDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetSpecifiedProcuringProject();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newName])');
        }

        $projectReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSpecifiedProcuringProjectWithCreate();

        $projectReference
            ->getIDWithCreate()
            ->setValue($newReferenceNumber);

        $projectReference
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional project reference
     *
     * @param  null|string $newReferenceNumber __BT-11, From EN 16931__ Project number
     * @param  null|string $newName            __BT-11-0, From EN 16931__ Project name
     * @return static
     */
    public function addDocumentProjectReference(
        ?string $newReferenceNumber = null,
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newName])');
        }

        $this->setDocumentProjectReference($newReferenceNumber, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber __BT-X-150, From EXTENDED__
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-151, From EXTENDED__
     * @return static
     */
    public function setDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetUltimateCustomerOrderReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->addDocumentUltimateCustomerOrderReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference
     *
     * @param  null|string            $newReferenceNumber __BT-X-150, From EXTENDED__
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-151, From EXTENDED__
     * @return static
     */
    public function addDocumentUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $orderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $orderReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $orderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-200, From EXTENDED__ Shipping notification date
     * @return static
     */
    public function setDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->unsetDespatchAdviceReferencedDocument();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $despatchAdviceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getDespatchAdviceReferencedDocumentWithCreate();

        $despatchAdviceReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $despatchAdviceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber __BT-16, From BASIC WL__ Shipping notification number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-200, From EXTENDED__ Shipping notification date
     * @return static
     */
    public function addDocumentDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->setDocumentDespatchAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber __BT-15, From EN 16931__ Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-201, From EXTENDED__ Receipt notification date
     * @return static
     */
    public function setDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->unsetReceivingAdviceReferencedDocument();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $receivingAdviceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getReceivingAdviceReferencedDocumentWithCreate();

        $receivingAdviceReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $receivingAdviceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber __BT-15, From EN 16931__ Receipt notification number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-201, From EXTENDED__ Receipt notification date
     * @return static
     */
    public function addDocumentReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->setDocumentReceivingAdviceReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param  null|string            $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-203, From EXTENDED__ Delivery slip date
     * @return static
     */
    public function setDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->unsetDeliveryNoteReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $deliveryNoteReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getDeliveryNoteReferencedDocumentWithCreate();

        $deliveryNoteReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $deliveryNoteReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param  null|string            $newReferenceNumber __BT-X-202, From EXTENDED__ Delivery slip number
     * @param  null|DateTimeInterface $newReferenceDate   __BT-X-203, From EXTENDED__ Delivery slip date
     * @return static
     */
    public function addDocumentDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)');
        }

        $this->setDocumentDeliveryNoteReference($newReferenceNumber, $newReferenceDate);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate __BT-72, From BASIC WL__ Actual delivery date
     * @return static
     */
    public function setDocumentSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->unsetActualDeliverySupplyChainEvent();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDate)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'datetimeIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDate)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getActualDeliverySupplyChainEventWithCreate()
            ->getOccurrenceDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newDate->format('Ymd'))
            ->setFormat('102');

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the identifier assigned by the buyer and used for internal routing
     *
     * @param  null|string $newBuyerReference __BT-10, From MINIMUM__ An identifier assigned by the buyer and used for internal routing
     * @return static
     */
    public function setDocumentBuyerReference(
        ?string $newBuyerReference = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetBuyerReference();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newBuyerReference)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newBuyerReference)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerReferenceWithCreate()
            ->setValue($newBuyerReference);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set information on the delivery conditions
     *
     * @param  null|string $newCode __BT-X-145, From EXTENDED__ The code indicating the type of delivery for these commercial delivery terms. To be selected from the entries in the list UNTDID 4053 + INCOTERMS
     * @return static
     */
    public function setDocumentDeliveryTerms(
        ?string $newCode = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->unsetApplicableTradeDeliveryTerms();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCode)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCode)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getApplicableTradeDeliveryTermsWithCreate()
            ->getDeliveryTypeCodeWithCreate()
            ->setValue($newCode);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the seller/supplier party
     *
     * @param  null|string $newName __BT-27, From MINIMUM__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentSellerName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the seller/supplier party
     *
     * @param  null|string $newName __BT-27, From MINIMUM__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentSellerName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentSellerName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the seller/supplier party
     *
     * @param  null|string $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentSellerId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentSellerId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newId __BT-29, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentSellerId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the seller/supplier party
     *
     * @param  null|string $newGlobalId     __BT-29-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentSellerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentSellerGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the seller/supplier party
     *
     * @param  null|string $newGlobalId     __BT-29-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-29-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentSellerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-31/BT-32, From MINIMUM__ Tax identification number
     * @return static
     */
    public function setDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentSellerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the seller/supplier party
     *
     * @param  null|string $newTaxRegistrationType __BT-31-0/BT-32-0, From MINIMUM__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-31/BT-32, From MINIMUM__ Tax identification number
     * @return static
     */
    public function addDocumentSellerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the seller/supplier party
     *
     * @param  null|string $newAddressLine1 __BT-35, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-36, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-162, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-38, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-37, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-40, From MINIMUM__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-39, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $sellerTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate();

        $sellerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $sellerTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the seller/supplier party
     *
     * @param  null|string $newAddressLine1 __BT-35, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-36, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-162, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-38, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-37, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-40, From MINIMUM__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-39, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the seller/supplier party
     *
     * @param  null|string $newType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-30, From MINIMUM__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $sellerTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $sellerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $sellerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $sellerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the seller/supplier party
     *
     * @param  null|string $newType __BT-30-1, From MINIMUM__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-30, From MINIMUM__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-28, From BASIC WL__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentSellerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentSellerLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     __BT-41, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-42, From EN 16931__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-107, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-43, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentSellerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the seller/supplier party
     *
     * @param  null|string $newPersonName     __BT-41, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-41-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-42, From EN 16931__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-107, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-43, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentSellerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getApplicableHeaderTradeAgreement()
                ?->getSellerTradeParty()
                ?->unsetDefinedTradeContact();
        }

        $sellerTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $sellerTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $sellerTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $sellerTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $sellerTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $sellerTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the seller/supplier party
     *
     * @param  null|string $newType __BT-34-1, From BASIC WL__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-34, From BASIC WL__ The party's electronic address
     * @return static
     */
    public function setDocumentSellerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate()
            ->getURIIDWithCreate()
            ->setValue($newUri)
            ->setSchemeID($newType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add communication information of the seller/supplier party
     *
     * @param  null|string $newType __BT-34-1, From BASIC WL__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-34, From BASIC WL__ The party's electronic address
     * @return static
     */
    public function addDocumentSellerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentSellerCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the buyer/customer party
     *
     * @param  null|string $newName __BT-44, From MINIMUM__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentBuyerName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentBuyerName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the buyer/customer party
     *
     * @param  null|string $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentBuyerId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentBuyerId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newId __BT-46, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentBuyerId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the buyer/customer party
     *
     * @param  null|string $newGlobalId     __BT-46-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentBuyerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentBuyerGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the buyer/customer party
     *
     * @param  null|string $newGlobalId     __BT-46-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-46-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentBuyerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType __BT-48-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-48, From BASIC WL__ Tax identification number
     * @return static
     */
    public function setDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentBuyerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the buyer/customer party
     *
     * @param  null|string $newTaxRegistrationType __BT-48-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-48, From BASIC WL__ Tax identification number
     * @return static
     */
    public function addDocumentBuyerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the buyer/customer party
     *
     * @param  null|string $newAddressLine1 __BT-50, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-51, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-163, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-53, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-52, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-55, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-54, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $buyerTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate();

        $buyerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $buyerTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the buyer/customer party
     *
     * @param  null|string $newAddressLine1 __BT-50, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-51, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-163, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-53, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-52, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-55, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-54, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the buyer/customer party
     *
     * @param  null|string $newType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-47, From MINIMUM__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-45, From EN 16931__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $buyerTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $buyerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $buyerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $buyerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the buyer/customer party
     *
     * @param  null|string $newType __BT-47-1, From MINIMUM__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-47, From MINIMUM__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-45, From EN 16931__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentBuyerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentBuyerLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     __BT-56, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-57, From EN 16931__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-115, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-58, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentBuyerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the buyer/customer party
     *
     * @param  null|string $newPersonName     __BT-56, From EN 16931__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-56-0, From EN 16931__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-57, From EN 16931__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-115, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-58, From EN 16931__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentBuyerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getApplicableHeaderTradeAgreement()
                ?->getBuyerTradeParty()
                ?->unsetDefinedTradeContact();
        }

        $buyerTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $buyerTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $buyerTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $buyerTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $buyerTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $buyerTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the buyer/customer party
     *
     * @param  null|string $newType __BT-49-1, From BASIC WL__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-49, From BASIC WL__ The party's electronic address
     * @return static
     */
    public function setDocumentBuyerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getBuyerTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $buyerUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getBuyerTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $buyerUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $buyerUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the buyer/customer party
     *
     * @param  null|string $newType __BT-49-1, From BASIC WL__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-49, From BASIC WL__ The party's electronic address
     * @return static
     */
    public function addDocumentBuyerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentBuyerCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the tax representative party
     *
     * @param  null|string $newName __BT-62, From BASIC WL__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentTaxRepresentativeName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the tax representative party
     *
     * @param  null|string $newName __BT-62, From BASIC WL__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentTaxRepresentativeName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentTaxRepresentativeName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the tax representative party
     *
     * @param  null|string $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentTaxRepresentativeId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentTaxRepresentativeId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newId __BT-X-116, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentTaxRepresentativeId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the tax representative party
     *
     * @param  null|string $newGlobalId     __BT-X-117, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentTaxRepresentativeGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the tax representative party
     *
     * @param  null|string $newGlobalId     __BT-X-117, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-117-1, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentTaxRepresentativeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the tax representative party
     *
     * @param  null|string $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-63, From BASIC WL__ Tax identification number
     * @return static
     */
    public function setDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentTaxRepresentativeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the tax representative party
     *
     * @param  null|string $newTaxRegistrationType __BT-63-0, From BASIC WL__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-63, From BASIC WL__ Tax identification number
     * @return static
     */
    public function addDocumentTaxRepresentativeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the tax representative party
     *
     * @param  null|string $newAddressLine1 __BT-64, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-65, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-164, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-67, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-66, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-69, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-68, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $taxRepresentativeTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate();

        $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $taxRepresentativeTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the tax representative party
     *
     * @param  null|string $newAddressLine1 __BT-64, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-65, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-164, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-67, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-66, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-69, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-68, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the tax representative party
     *
     * @param  null|string $newType __BT-X-118-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-118, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-119, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $taxRepresentativeTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $taxRepresentativeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $taxRepresentativeTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $taxRepresentativeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the tax representative party
     *
     * @param  null|string $newType __BT-X-118-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-118, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-119, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentTaxRepresentativeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentTaxRepresentativeLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the tax representative party
     *
     * @param  null|string $newPersonName     __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-122, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-123, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-124, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentTaxRepresentativeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the tax representative party
     *
     * @param  null|string $newPersonName     __BT-X-120, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-121, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-122, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-123, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-124, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentTaxRepresentativeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $taxRepresentativeTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $taxRepresentativeTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $taxRepresentativeTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $taxRepresentativeTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $taxRepresentativeTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $taxRepresentativeTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the tax representative party
     *
     * @param  null|string $newType __BT-X-125-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-125, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getSellerTaxRepresentativeTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $taxRepresentativeUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getSellerTaxRepresentativeTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $taxRepresentativeUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $taxRepresentativeUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the tax representative party
     *
     * @param  null|string $newType __BT-X-125-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-125, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentTaxRepresentativeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentTaxRepresentativeCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the product end-user party
     *
     * @param  null|string $newName __BT-X-128, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentProductEndUserName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the product end-user party
     *
     * @param  null|string $newName __BT-X-128, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentProductEndUserName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentProductEndUserName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the product end-user party
     *
     * @param  null|string $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentProductEndUserId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentProductEndUserId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newId __BT-X-126, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentProductEndUserId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the product end-user party
     *
     * @param  null|string $newGlobalId     __BT-X-127, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentProductEndUserGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the product end-user party
     *
     * @param  null|string $newGlobalId     __BT-X-127, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-127-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentProductEndUserGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the product end-user party
     *
     * @param  null|string $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-, From __ Tax identification number
     * @return static
     */
    public function setDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentProductEndUserTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the product end-user party
     *
     * @param  null|string $newTaxRegistrationType __BT-, From __ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-, From __ Tax identification number
     * @return static
     */
    public function addDocumentProductEndUserTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the product end-user party
     *
     * @param  null|string $newAddressLine1 __BT-X-397, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-398, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-399, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-396, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-400, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-401, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-402, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $productEndUserTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate();

        $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $productEndUserTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the product end-user party
     *
     * @param  null|string $newAddressLine1 __BT-X-397, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-398, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-399, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-396, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-400, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-401, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-402, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $this->setDocumentProductEndUserAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the product end-user party
     *
     * @param  null|string $newType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $productEndUserTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $productEndUserTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $productEndUserTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $productEndUserTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the product end-user party
     *
     * @param  null|string $newType __BT-X-129-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-129, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-130, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentProductEndUserLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentProductEndUserLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the product end-user party
     *
     * @param  null|string $newPersonName     __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-133, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-134, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-135, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentProductEndUserContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the product end-user party
     *
     * @param  null|string $newPersonName     __BT-X-131, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-132, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-133, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-134, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-135, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentProductEndUserContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $productEndUserTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $productEndUserTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $productEndUserTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $productEndUserTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $productEndUserTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $productEndUserTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the product end-user party
     *
     * @param  null|string $newType __BT-X-143-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-143, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentProductEndUserCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeAgreement()
            ?->getProductEndUserTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $productEndUserUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeAgreementWithCreate()
            ->getProductEndUserTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $productEndUserUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $productEndUserUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the product end-user party
     *
     * @param  null|string $newType __BT-X-143-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-143, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentProductEndUserCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentProductEndUserCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param  null|string $newName __BT-70, From BASIC WL__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName __BT-70, From BASIC WL__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentShipToName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentShipToId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId __BT-71, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-71-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-71-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-71-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-161, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-161-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-161, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the Ship-To party
     *
     * @param  null|string $newAddressLine1 __BT-75, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-76, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-165, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-78, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-77, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-80, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-79, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $shipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate();

        $shipToTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the Ship-To party
     *
     * @param  null|string $newAddressLine1 __BT-75, From BASIC WL__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-76, From BASIC WL__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-165, From BASIC WL__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-78, From BASIC WL__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-77, From BASIC WL__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-80, From BASIC WL__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-79, From BASIC WL__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $shipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $shipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $shipToTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $shipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-153-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-153, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-154, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentShipToLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-157, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-158, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-159, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     __BT-X-155, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-156, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-157, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-158, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-159, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $shipToTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $shipToTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $shipToTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $shipToTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $shipToTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $shipToTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-160, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-160-0, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $shipToUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $shipToUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $shipToUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-160, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-160-0, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentShipToCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName __BT-X-164, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName __BT-X-164, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentUltimateShipToName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentUltimateShipToId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId __BT-X-162, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-X-163, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-X-163, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-163-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-180, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-180-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-180, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 __BT-X-173, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-174, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-175, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-172, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-176, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-177, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-178, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $ultimateShipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate();

        $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 __BT-X-173, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-174, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-175, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-172, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-176, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-177, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-178, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $this->setDocumentUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $ultimateShipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $ultimateShipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $ultimateShipToTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $ultimateShipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-165-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-165, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-166, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentUltimateShipToLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-169, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-170, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-171, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     __BT-X-167, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-168, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-169, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-170, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-171, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $ultimateShipToTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $ultimateShipToTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $ultimateShipToTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $ultimateShipToTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $ultimateShipToTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $ultimateShipToTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-83, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-83-0, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $ultimateShipToUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $ultimateShipToUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $ultimateShipToUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-83, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-83-0, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentUltimateShipToCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the Ship-From party
     *
     * @param  null|string $newName __BT-X-183, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentShipFromName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the Ship-From party
     *
     * @param  null|string $newName __BT-X-183, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentShipFromName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentShipFromName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the Ship-From party
     *
     * @param  null|string $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentShipFromId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentShipFromId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newId __BT-X-181, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentShipFromId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-From party
     *
     * @param  null|string $newGlobalId     __BT-X-182, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentShipFromGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentShipFromGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Ship-From party
     *
     * @param  null|string $newGlobalId     __BT-X-182, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-182-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentShipFromGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-199, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentShipFromTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-From party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-199-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-199, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentShipFromTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the Ship-From party
     *
     * @param  null|string $newAddressLine1 __BT-X-192, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-193, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-194, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-191, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-195, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-196, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-197, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $shipFromTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate();

        $shipFromTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $shipFromTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the Ship-From party
     *
     * @param  null|string $newAddressLine1 __BT-X-192, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-193, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-194, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-191, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-195, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-196, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-197, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $this->setDocumentShipFromAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the Ship-From party
     *
     * @param  null|string $newType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $shipFromTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $shipFromTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $shipFromTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $shipFromTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the Ship-From party
     *
     * @param  null|string $newType __BT-X-184-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-184, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-185, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentShipFromLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentShipFromLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-188, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-189, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-190, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentShipFromContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the Ship-From party
     *
     * @param  null|string $newPersonName     __BT-X-186, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-187, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-188, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-189, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-190, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentShipFromContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $shipFromTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $shipFromTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $shipFromTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $shipFromTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $shipFromTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $shipFromTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the Ship-From party
     *
     * @param  null|string $newType __BT-X-199, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-199-0, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentShipFromCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeDelivery()
            ?->getShipFromTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $shipFromUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeDeliveryWithCreate()
            ->getShipFromTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $shipFromUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $shipFromUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the Ship-From party
     *
     * @param  null|string $newType __BT-X-199, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-199-0, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentShipFromCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentShipFromCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the Invoicer party
     *
     * @param  null|string $newName __BT-X-207, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentInvoicerName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the Invoicer party
     *
     * @param  null|string $newName __BT-X-207, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentInvoicerName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentInvoicerName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the Invoicer party
     *
     * @param  null|string $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentInvoicerId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentInvoicerId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newId __BT-X-205, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentInvoicerId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the Invoicer party
     *
     * @param  null|string $newGlobalId     __BT-X-206, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentInvoicerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentInvoicerGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Invoicer party
     *
     * @param  null|string $newGlobalId     __BT-X-206, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-206-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoicerGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-223, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentInvoicerTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicer party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-223-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-223, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentInvoicerTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param  null|string $newAddressLine1 __BT-X-216, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-217, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-218, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-215, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-219, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-220, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-221, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $invoicerTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate();

        $invoicerTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $invoicerTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the Invoicer party
     *
     * @param  null|string $newAddressLine1 __BT-X-216, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-217, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-218, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-215, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-219, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-220, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-221, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $this->setDocumentInvoicerAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the Invoicer party
     *
     * @param  null|string $newType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $invoicerTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $invoicerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $invoicerTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $invoicerTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the Invoicer party
     *
     * @param  null|string $newType __BT-X-208-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-208, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-209, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentInvoicerLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentInvoicerLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-212, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-213, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-214, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentInvoicerContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the Invoicer party
     *
     * @param  null|string $newPersonName     __BT-X-210, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-211, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-212, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-213, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-214, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoicerContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $invoicerTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $invoicerTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $invoicerTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $invoicerTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $invoicerTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $invoicerTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the Invoicer party
     *
     * @param  null|string $newType __BT-X-222-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-222, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentInvoicerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoicerTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $invoicerUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoicerTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $invoicerUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $invoicerUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the Invoicer party
     *
     * @param  null|string $newType __BT-X-222-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-222, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentInvoicerCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentInvoicerCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the Invoicee party
     *
     * @param  null|string $newName __BT-X-226, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentInvoiceeName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the Invoicee party
     *
     * @param  null|string $newName __BT-X-226, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentInvoiceeName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentInvoiceeName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the Invoicee party
     *
     * @param  null|string $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentInvoiceeId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentInvoiceeId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newId __BT-X-224, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentInvoiceeId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the Invoicee party
     *
     * @param  null|string $newGlobalId     __BT-X-225, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentInvoiceeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentInvoiceeGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Invoicee party
     *
     * @param  null|string $newGlobalId     __BT-X-225, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-225-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentInvoiceeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-242, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentInvoiceeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the Invoicee party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-242-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-242, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentInvoiceeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the Invoicee party
     *
     * @param  null|string $newAddressLine1 __BT-X-235, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-236, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-237, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-234, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-238, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-239, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-240, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $invoiceeTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate();

        $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $invoiceeTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the Invoicee party
     *
     * @param  null|string $newAddressLine1 __BT-X-235, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-236, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-237, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-234, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-238, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-239, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-240, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $this->setDocumentInvoiceeAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the Invoicee party
     *
     * @param  null|string $newType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $invoiceeTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $invoiceeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $invoiceeTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $invoiceeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the Invoicee party
     *
     * @param  null|string $newType __BT-X-227-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-227, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-228, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentInvoiceeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentInvoiceeLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-231, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-232, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-233, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentInvoiceeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the Invoicee party
     *
     * @param  null|string $newPersonName     __BT-X-229, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-230, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-231, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-232, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-233, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentInvoiceeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $invoiceeTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $invoiceeTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $invoiceeTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $invoiceeTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $invoiceeTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $invoiceeTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the Invoicee party
     *
     * @param  null|string $newType __BT-X-241-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-241, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentInvoiceeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getInvoiceeTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $invoiceeUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceeTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $invoiceeUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $invoiceeUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the Invoicee party
     *
     * @param  null|string $newType __BT-X-241-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-241, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentInvoiceeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentInvoiceeCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the Payee party
     *
     * @param  null|string $newName __BT-59, From BASIC WL__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPayeeName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the Payee party
     *
     * @param  null|string $newName __BT-59, From BASIC WL__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPayeeName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentPayeeName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the Payee party
     *
     * @param  null|string $newId __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPayeeId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentPayeeId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newId __BT-60, From BASIC WL__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPayeeId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the Payee party
     *
     * @param  null|string $newGlobalId     __BT-60-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-60-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentPayeeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentPayeeGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Payee party
     *
     * @param  null|string $newGlobalId     __BT-60-0, From BASIC WL__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-60-1, From BASIC WL__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentPayeeGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the Payee party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-257, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentPayeeTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the Payee party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-257-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-257, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentPayeeTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the Payee party
     *
     * @param  null|string $newAddressLine1 __BT-X-250, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-251, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-252, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-249, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-253, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-254, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-255, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $payeeTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate();

        $payeeTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $payeeTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an address to the Payee party
     *
     * @param  null|string $newAddressLine1 __BT-X-250, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT-X-251, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT-X-252, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT-X-249, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT-X-253, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT-X-254, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT-X-255, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the Payee party
     *
     * @param  null|string $newType __BT-61-1, From BASIC WL__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-61, From BASIC WL__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-243, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $payeeTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $payeeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $payeeTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $payeeTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the Payee party
     *
     * @param  null|string $newType __BT-61-1, From BASIC WL__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-61, From BASIC WL__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-243, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPayeeLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentPayeeLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the Payee party
     *
     * @param  null|string $newPersonName     __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-246, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-247, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-248, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $this->addDocumentPayeeContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the Payee party
     *
     * @param  null|string $newPersonName     __BT-X-244, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-245, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-246, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-247, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-248, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPayeeContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (
            InvoiceSuiteStringUtils::allIsNullOrEmpty([
                $newPersonName,
                $newDepartmentName,
                $newPhoneNumber,
                $newFaxNumber,
                $newEmailAddress,
            ])
        ) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([ $newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress, ])');
        }

        $payeeTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $payeeTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $payeeTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $payeeTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $payeeTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $payeeTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set communication information of the Payee party
     *
     * @param  null|string $newType __BT-X-256-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-256, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->getPayeeTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPayeeTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate()
            ->getURIIDWithCreate()
            ->setValue($newUri)
            ->setSchemeID($newType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the Payee party
     *
     * @param  null|string $newType __BT-X-256-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-256, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentPayeeCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentPayeeCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Payment mean
     *
     * @param  null|string $newTypeCode            __BT-81, From BASIC WL__ Expected or used means of payment expressed as a code
     * @param  null|string $newName                __BT-82, From EN 16931__ Expected or used means of payment expressed in text form
     * @param  null|string $newFinancialCardId     __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @param  null|string $newBuyerIban           __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param  null|string $newPayeeIban           __BT-84, From BASIC WL__ Payment account identifier
     * @param  null|string $newPayeeAccountName    __BT-85, From EN 16931__ Name of the payment account
     * @param  null|string $newPayeeProprietaryId  __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $newPayeeBic            __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param  null|string $newPaymentReference    __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @param  null|string $newMandate             __BT-89, From BASIC WL__ Identification of the mandate reference
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetSpecifiedTradeSettlementPaymentMeans();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Payment mean
     *
     * @param  null|string $newTypeCode            __BT-81, From BASIC WL__ Expected or used means of payment expressed as a code
     * @param  null|string $newName                __BT-82, From EN 16931__ Expected or used means of payment expressed in text form
     * @param  null|string $newFinancialCardId     __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @param  null|string $newBuyerIban           __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param  null|string $newPayeeIban           __BT-84, From BASIC WL__ Payment account identifier
     * @param  null|string $newPayeeAccountName    __BT-85, From EN 16931__ Name of the payment account
     * @param  null|string $newPayeeProprietaryId  __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $newPayeeBic            __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param  null|string $newPaymentReference    __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @param  null|string $newMandate             __BT-89, From BASIC WL__ Identification of the mandate reference
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)');
        }

        $paymentMean = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedTradeSettlementPaymentMeansWithCreate();

        $paymentMean->getTypeCodeWithCreate()->setValue($newTypeCode);

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $paymentMean->getInformationWithCreate()->setValue($newName);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFinancialCardId)) {
            $paymentMean
                ->getApplicableTradeSettlementFinancialCardWithCreate()
                ->getIDWithCreate()
                ->setValue($newFinancialCardId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFinancialCardHolder)) {
                $paymentMean
                    ->getApplicableTradeSettlementFinancialCardWithCreate()
                    ->getCardholderNameWithCreate()
                    ->setValue($newFinancialCardHolder);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newBuyerIban)) {
            $paymentMean
                ->getPayerPartyDebtorFinancialAccountWithCreate()
                ->getIBANIDWithCreate()
                ->setValue($newBuyerIban);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPayeeIban)) {
            $paymentMean
                ->getPayeePartyCreditorFinancialAccountWithCreate()
                ->getIBANIDWithCreate()
                ->setValue($newPayeeIban);

            if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPayeeAccountName)) {
                $paymentMean
                    ->getPayeePartyCreditorFinancialAccountWithCreate()
                    ->getAccountNameWithCreate()
                    ->setValue($newPayeeAccountName);
            }

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPayeeProprietaryId)) {
                $paymentMean
                    ->getPayeePartyCreditorFinancialAccountWithCreate()
                    ->getProprietaryIDWithCreate()
                    ->setValue($newPayeeProprietaryId);
            }

            if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPayeeBic)) {
                $paymentMean
                    ->getPayeeSpecifiedCreditorFinancialInstitutionWithCreate()
                    ->getBICIDWithCreate()
                    ->setValue($newPayeeBic);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPaymentReference)) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransactionWithCreate()
                ->getApplicableHeaderTradeSettlementWithCreate()
                ->getPaymentReferenceWithCreate()
                ->setValue($newPaymentReference);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newMandate)) {
            $this->addKeyValuePair('mandantefrompaymentmean', $newMandate);
            $this->updateMandates();
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          __BT-84, From BASIC WL__ Payment account identifier
     * @param  null|string $newPayeeAccountName   __BT-85, From EN 16931__ Name of the payment account
     * @param  null|string $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $newPayeeBic           __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param  null|string $newPaymentReference   __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Payment mean (as SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          __BT-84, From BASIC WL__ Payment account identifier
     * @param  null|string $newPayeeAccountName   __BT-85, From EN 16931__ Name of the payment account
     * @param  null|string $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $newPayeeBic           __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param  null|string $newPaymentReference   __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanAsCreditTransferSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_58->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          __BT-84, From BASIC WL__ Payment account identifier
     * @param  null|string $newPayeeAccountName   __BT-85, From EN 16931__ Name of the payment account
     * @param  null|string $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $newPayeeBic           __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param  null|string $newPaymentReference   __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Payment mean (as non-SEPA credit transfer, German: Überweisung)
     *
     * @param  null|string $newPayeeIban          __BT-84, From BASIC WL__ Payment account identifier
     * @param  null|string $newPayeeAccountName   __BT-85, From EN 16931__ Name of the payment account
     * @param  null|string $newPayeeProprietaryId __BT-84-0, From BASIC WL__ National account number (not for SEPA)
     * @param  null|string $newPayeeBic           __BT-86, From EN 16931__ Identifier of the payment service provider
     * @param  null|string $newPaymentReference   __BT-83, From BASIC WL__ Text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentMeanAsCreditTransferNoSepa(
        ?string $newPayeeIban = null,
        ?string $newPayeeAccountName = null,
        ?string $newPayeeProprietaryId = null,
        ?string $newPayeeBic = null,
        ?string $newPaymentReference = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_30->value,
            newPayeeIban: $newPayeeIban,
            newPayeeAccountName: $newPayeeAccountName,
            newPayeeProprietaryId: $newPayeeProprietaryId,
            newPayeeBic: $newPayeeBic,
            newPaymentReference: $newPaymentReference,
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param  null|string $newMandate   __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Payment mean (as SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param  null|string $newMandate   __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentMeanAsDirectDebitSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_59->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Payment mean (as non-SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param  null|string $newMandate   __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Payment mean (as non SEPA direct debit, German: Lastschrift)
     *
     * @param  null|string $newBuyerIban __BT-91, From BASIC WL__ Identifier of the account to be debited
     * @param  null|string $newMandate   __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentMeanAsDirectDebitNoSepa(
        ?string $newBuyerIban = null,
        ?string $newMandate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_49->value,
            newBuyerIban: $newBuyerIban,
            newMandate: $newMandate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @return static
     */
    public function setDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->setDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: $newFinancialCardId,
            newFinancialCardHolder: $newFinancialCardHolder
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Payment mean (as payment card)
     *
     * @param  null|string $newFinancialCardId     __BT-87, From EN 16931__ Primary account number (PAN) of the payment card
     * @param  null|string $newFinancialCardHolder __BT-88, From EN 16931__ Name of the payment card holder
     * @return static
     */
    public function addDocumentPaymentMeanAsPaymentCard(
        ?string $newFinancialCardId = null,
        ?string $newFinancialCardHolder = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this->addDocumentPaymentMean(
            newTypeCode: InvoiceSuiteCodelistPaymentMeans::UNTDID_4461_48->value,
            newFinancialCardId: $newFinancialCardId,
            newFinancialCardHolder: $newFinancialCardHolder
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Unique bank details of the payee or the seller
     *
     * @param  null|string $newId __BT-90, From BASIC WL__ Creditor identifier
     * @return static
     */
    public function setDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetCreditorReferenceID();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getCreditorReferenceIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Unique bank details of the payee or the seller
     *
     * @param  null|string $newId __BT-90, From BASIC WL__ Creditor identifier
     * @return static
     */
    public function addDocumentPaymentCreditorReferenceID(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->setDocumentPaymentCreditorReferenceID($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set a link to the invoice issued by the seller
     *
     * @param  null|string $newId __BT-83, From BASIC WL__ A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function setDocumentPaymentReference(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetPaymentReference();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getPaymentReferenceWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a link to the invoice issued by the seller
     *
     * @param  null|string $newId __BT-83, From BASIC WL__ A text value used to link the payment to the invoice issued by the seller
     * @return static
     */
    public function addDocumentPaymentReference(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->setDocumentPaymentReference($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set payment term
     *
     * @param  null|string            $newDescription __BT-20, From _BASIC WL__ Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     __BT-9, From BASIC WL__ Date by which payment is due
     * @param  null|string            $newMandate     __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return static
     */
    public function setDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetSpecifiedTradePaymentTerms();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)');
        }

        $this->addDocumentPaymentTerm(
            $newDescription,
            $newDueDate,
            $newMandate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add payment term
     *
     * @param  null|string            $newDescription __BT-20, From _BASIC WL__ Text description of the payment terms
     * @param  null|DateTimeInterface $newDueDate     __BT-9, From BASIC WL__ Date by which payment is due
     * @param  null|string            $newMandate     __BT-89, From BASIC WL__ Identification of the mandate reference
     * @return static
     */
    public function addDocumentPaymentTerm(
        ?string $newDescription = null,
        ?DateTimeInterface $newDueDate = null,
        ?string $newMandate = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getApplicableHeaderTradeSettlement()
                ?->unsetSpecifiedTradePaymentTerms();
        }

        $paymentTerm = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedTradePaymentTermsWithCreate();

        $paymentTerm->getDescriptionWithCreate()->setValue($newDescription);

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDueDate)) {
            $paymentTerm
                ->getDueDateDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newDueDate->format('Ymd'))
                ->setFormat('102');
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newMandate)) {
            $paymentTerm
                ->getDirectDebitMandateIDWithCreate()
                ->setValue($newMandate);
        }

        $this->updateMandates();

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set payment discount terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount      __BT-X-285, From EXTENDED__ Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  __BT-X-287, From EXTENDED__ Amount of the payment discount
     * @param  null|float             $newDiscountPercent __BT-X-286, From EXTENDED__ Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        __BT-X-282, From EXTENDED__ Due date reference date
     * @param  null|float             $newBasePeriod      __BT-X-283, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  __BT-X-284, From EXTENDED__ Maturity period (unit)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        $paymentTerms = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradePaymentTerms() ?? [];

        $lastPaymentTerm = end($paymentTerms);

        if (false === $lastPaymentTerm) {
            $this->traceMethodExit(__METHOD__);

            return $this;
        }

        $lastPaymentTerm->unsetApplicableTradePaymentDiscountTerms();

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newBaseAmount)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentDiscountTermsWithCreate()
                ->getBasisAmountWithCreate()
                ->setValue($newBaseAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newDiscountAmount)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentDiscountTermsWithCreate()
                ->getActualDiscountAmountWithCreate()
                ->setValue($newDiscountAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newDiscountPercent)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentDiscountTermsWithCreate()
                ->getCalculationPercentWithCreate()
                ->setValue($newDiscountPercent);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newBaseDate)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentDiscountTermsWithCreate()
                ->getBasisDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newBaseDate->format('Ymd'))
                ->setFormat('102');
        }

        if (
            !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newBasePeriod)
            && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newBasePeriodUnit)
        ) {
            $lastPaymentTerm
                ->getApplicableTradePaymentDiscountTermsWithCreate()
                ->getBasisPeriodMeasureWithCreate()
                ->setValue($newBasePeriod)
                ->setUnitCode($newBasePeriodUnit);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add payment discount terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount      __BT-X-285, From EXTENDED__ Base amount of the payment discount
     * @param  null|float             $newDiscountAmount  __BT-X-287, From EXTENDED__ Amount of the payment discount
     * @param  null|float             $newDiscountPercent __BT-X-286, From EXTENDED__ Percentage of the payment discount
     * @param  null|DateTimeInterface $newBaseDate        __BT-X-282, From EXTENDED__ Due date reference date
     * @param  null|float             $newBasePeriod      __BT-X-283, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit  __BT-X-284, From EXTENDED__ Maturity period (unit)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        $this->setDocumentPaymentDiscountTermsInLastPaymentTerm(
            $newBaseAmount,
            $newDiscountAmount,
            $newDiscountPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set payment penalty terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount     __BT-X-279, From EXTENDED__ Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  __BT-X-281, From EXTENDED__ Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent __BT-X-280, From EXTENDED__ Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       __BT-X-276, From EXTENDED__ Due date reference date
     * @param  null|float             $newBasePeriod     __BT-X-277, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit __BT-X-278, From EXTENDED__ Maturity period (unit)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        $paymentTerms = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradePaymentTerms() ?? [];

        $lastPaymentTerm = end($paymentTerms);

        if (false === $lastPaymentTerm) {
            $this->traceMethodExit(__METHOD__);

            return $this;
        }

        $lastPaymentTerm->unsetApplicableTradePaymentPenaltyTerms();

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newBaseAmount)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentPenaltyTermsWithCreate()
                ->getBasisAmountWithCreate()
                ->setValue($newBaseAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newPenaltyAmount)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentPenaltyTermsWithCreate()
                ->getActualPenaltyAmountWithCreate()
                ->setValue($newPenaltyAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newPenaltyPercent)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentPenaltyTermsWithCreate()
                ->getCalculationPercentWithCreate()
                ->setValue($newPenaltyPercent);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newBaseDate)) {
            $lastPaymentTerm
                ->getApplicableTradePaymentPenaltyTermsWithCreate()
                ->getBasisDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newBaseDate->format('Ymd'))
                ->setFormat('102');
        }

        if (
            !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newBasePeriod)
            && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newBasePeriodUnit)
        ) {
            $lastPaymentTerm
                ->getApplicableTradePaymentPenaltyTermsWithCreate()
                ->getBasisPeriodMeasureWithCreate()
                ->setValue($newBasePeriod)
                ->setUnitCode($newBasePeriodUnit);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add payment penalty terms in last added payment terms
     *
     * @param  null|float             $newBaseAmount     __BT-X-279, From EXTENDED__ Base amount of the payment penalty
     * @param  null|float             $newPenaltyAmount  __BT-X-281, From EXTENDED__ Amount of the payment penalty
     * @param  null|float             $newPenaltyPercent __BT-X-280, From EXTENDED__ Percentage of the payment penalty
     * @param  null|DateTimeInterface $newBaseDate       __BT-X-276, From EXTENDED__ Due date reference date
     * @param  null|float             $newBasePeriod     __BT-X-277, From EXTENDED__ Maturity period (basis)
     * @param  null|string            $newBasePeriodUnit __BT-X-278, From EXTENDED__ Maturity period (unit)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        $this->setDocumentPaymentPenaltyTermsInLastPaymentTerm(
            $newBaseAmount,
            $newPenaltyAmount,
            $newPenaltyPercent,
            $newBaseDate,
            $newBasePeriod,
            $newBasePeriodUnit
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Document Tax Breakdown
     *
     * @param  null|string            $newTaxCategory         __BT-118, From BASIC WL__ Coded description of the tax category
     * @param  null|string            $newTaxType             __BT-118-0, From BASIC WL__ Coded description of the tax type
     * @param  null|float             $newBasisAmount         __BT-116, From BASIC WL__ Tax base amount
     * @param  null|float             $newTaxAmount           __BT-117, From BASIC WL__ Tax total amount
     * @param  null|float             $newTaxPercent          __BT-119, From BASIC WL__ Tax Rate (Percentage)
     * @param  null|string            $newExemptionReason     __BT-120, From BASIC WL__ Reason for tax exemption (free text)
     * @param  null|string            $newExemptionReasonCode __BT-121, From BASIC WL__ Reason for tax exemption (Code)
     * @param  null|DateTimeInterface $newTaxDueDate          __BT-7-00, From EN 16931__ Date on which tax is due
     * @param  null|string            $newTaxDueCode          __BT-8, From BASIC WL__ Code for the date on which tax is due
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetApplicableTradeTax();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])');
        }

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Document Tax Breakdown
     *
     * @param  null|string            $newTaxCategory         __BT-118, From BASIC WL__ Coded description of the tax category
     * @param  null|string            $newTaxType             __BT-118-0, From BASIC WL__ Coded description of the tax type
     * @param  null|float             $newBasisAmount         __BT-116, From BASIC WL__ Tax base amount
     * @param  null|float             $newTaxAmount           __BT-117, From BASIC WL__ Tax total amount
     * @param  null|float             $newTaxPercent          __BT-119, From BASIC WL__ Tax Rate (Percentage)
     * @param  null|string            $newExemptionReason     __BT-120, From BASIC WL__ Reason for tax exemption (free text)
     * @param  null|string            $newExemptionReasonCode __BT-121, From BASIC WL__ Reason for tax exemption (Code)
     * @param  null|DateTimeInterface $newTaxDueDate          __BT-7-00, From EN 16931__ Date on which tax is due
     * @param  null|string            $newTaxDueCode          __BT-8, From BASIC WL__ Code for the date on which tax is due
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])');
        }

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newBasisAmount, $newTaxAmount])');
        }

        $applicableTradeTax = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToApplicableTradeTaxWithCreate();

        $applicableTradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $applicableTradeTax->getTypeCodeWithCreate()->setValue($newTaxType);
        $applicableTradeTax->getBasisAmountWithCreate()->setValue($newBasisAmount);
        $applicableTradeTax->getCalculatedAmountWithCreate()->setValue($newTaxAmount);

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxPercent)) {
            $applicableTradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newExemptionReason)) {
            $applicableTradeTax->getExemptionReasonWithCreate()->setValue($newExemptionReason);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newExemptionReasonCode)) {
            $applicableTradeTax->getExemptionReasonCodeWithCreate()->setValue($newExemptionReasonCode);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newTaxDueDate)) {
            $applicableTradeTax
                ->getTaxPointDateWithCreate()
                ->getDateStringWithCreate()
                ->setValue($newTaxDueDate->format('Ymd'))
                ->setFormat('102');
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTaxDueCode)) {
            $applicableTradeTax->getDueDateTypeCodeWithCreate()->setValue($newTaxDueCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Document Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           __BT-20-1/BT-21-1, From BASIC WL__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     __BT-92/BT-99, From BASIC WL__ Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount __BT-93/BT-100, From BASIC WL__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newTaxCategory               __BT-95, From BASIC WL__ Coded description of the tax category
     * @param  null|string $newTaxType                   __BT-95-0, From BASIC WL__ Coded description of the tax type
     * @param  null|float  $newTaxPercent                __BT-96, From BASIC WL__ Tax Rate (Percentage)
     * @param  null|string $newAllowanceChargeReason     __BT-98/BT-105, From BASIC WL__ Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode __BT-97/BT-104, From BASIC WL__ Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    __BT-94/BT-101, From BASIC WL__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetSpecifiedTradeAllowanceCharge();

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])');
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount)');
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

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Document Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           __BT-20-1/BT-21-1, From BASIC WL__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     __BT-92/BT-99, From BASIC WL__ Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount __BT-93/BT-100, From BASIC WL__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newTaxCategory               __BT-95, From BASIC WL__ Coded description of the tax category
     * @param  null|string $newTaxType                   __BT-95-0, From BASIC WL__ Coded description of the tax type
     * @param  null|float  $newTaxPercent                __BT-96, From BASIC WL__ Tax Rate (Percentage)
     * @param  null|string $newAllowanceChargeReason     __BT-98/BT-105, From BASIC WL__ Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode __BT-97/BT-104, From BASIC WL__ Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    __BT-94/BT-101, From BASIC WL__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWlWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])');
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount)');
        }

        $specifiedTradeAllowanceCharge = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedTradeAllowanceChargeWithCreate();

        $specifiedTradeAllowanceCharge
            ->getChargeIndicatorWithCreate()
            ->setIndicator($newChargeIndicator ?? false);

        $specifiedTradeAllowanceCharge
            ->getActualAmountWithCreate()
            ->setValue($newAllowanceChargeAmount);

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeBaseAmount)) {
            $specifiedTradeAllowanceCharge
                ->getBasisAmountWithCreate()
                ->setValue($newAllowanceChargeBaseAmount);
        }

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargePercent)) {
            $specifiedTradeAllowanceCharge
                ->getCalculationPercentWithCreate()
                ->setValue($newAllowanceChargePercent);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAllowanceChargeReason)) {
            $specifiedTradeAllowanceCharge
                ->getReasonWithCreate()
                ->setValue($newAllowanceChargeReason);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAllowanceChargeReasonCode)) {
            $specifiedTradeAllowanceCharge
                ->getReasonCodeWithCreate()
                ->setValue($newAllowanceChargeReasonCode);
        }

        $categoryTradeTax = $specifiedTradeAllowanceCharge->getCategoryTradeTaxWithCreate();

        $categoryTradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $categoryTradeTax->getTypeCodeWithCreate()->setValue($newTaxType);

        if (!InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxPercent)) {
            $categoryTradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount __BT-X-272, From EXTENDED__ Amount of the service fee
     * @param  null|string $newDescription  __BT-X-271, From EXTENDED__ Identification of the service fee
     * @param  null|string $newTaxCategory  __BT-X-273, From EXTENDED__ Coded description of the tax category
     * @param  null|string $newTaxType      __BT-X-273-0, From EXTENDED__ Coded description of the tax type
     * @param  null|float  $newTaxPercent   __BT-X-274, From EXTENDED__ Tax Rate (Percentage)
     * @return static
     */
    public function setDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetSpecifiedLogisticsServiceCharge();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription])');
        }

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])');
        }

        $this->addDocumentLogisticServiceCharge(
            $newChargeAmount,
            $newDescription,
            $newTaxCategory,
            $newTaxType,
            $newTaxPercent
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Document Logistic Service Charge
     *
     * @param  null|float  $newChargeAmount __BT-X-272, From EXTENDED__ Amount of the service fee
     * @param  null|string $newDescription  __BT-X-271, From EXTENDED__ Identification of the service fee
     * @param  null|string $newTaxCategory  __BT-X-273, From EXTENDED__ Coded description of the tax category
     * @param  null|string $newTaxType      __BT-X-273-0, From EXTENDED__ Coded description of the tax type
     * @param  null|float  $newTaxPercent   __BT-X-274, From EXTENDED__ Tax Rate (Percentage)
     * @return static
     */
    public function addDocumentLogisticServiceCharge(
        ?float $newChargeAmount = null,
        ?string $newDescription = null,
        ?string $newTaxCategory = null,
        ?string $newTaxType = null,
        ?float $newTaxPercent = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType, $newDescription])');
        }

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newChargeAmount])');
        }

        $logisticServiceCharge = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->addToSpecifiedLogisticsServiceChargeWithCreate();

        $logisticServiceCharge->getDescriptionWithCreate()->setValue($newDescription);
        $logisticServiceCharge->getAppliedAmountWithCreate()->setValue($newChargeAmount);
        $logisticServiceCharge->clearAppliedTradeTax();

        $appliedTradeTax = $logisticServiceCharge->addToAppliedTradeTaxWithCreate();
        $appliedTradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $appliedTradeTax->getTypeCodeWithCreate()->setValue($newTaxType);
        $appliedTradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Prepare the document-level summation (Sets all values to zero)
     *
     * @return static
     */
    public function prepareDocumentSummation(): static
    {
        $summation = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        if ($this->supportsAtLeastBasicWl()) {
            $summation->getLineTotalAmountWithCreate()->setValue(0.0);
        }

        if ($this->supportsAtLeastBasicWl()) {
            $summation->getChargeTotalAmountWithCreate()->setValue(0.0);
        }

        if ($this->supportsAtLeastBasicWl()) {
            $summation->getAllowanceTotalAmountWithCreate()->setValue(0.0);
        }

        if ($this->supportsAtLeastMinimum()) {
            $summation->getTaxBasisTotalAmountWithCreate()->setValue(0.0);
        }

        if ($this->supportsAtLeastEn16931()) {
            $summation->getRoundingAmountWithCreate()->setValue(0.0);
        }

        if ($this->supportsAtLeastMinimum()) {
            $summation->getGrandTotalAmountWithCreate()->setValue(0.0);
        }

        if ($this->supportsAtLeastBasicWl()) {
            $summation->getTotalPrepaidAmountWithCreate()->setValue(0.0);
        }

        if ($this->supportsAtLeastMinimum()) {
            $summation->getDuePayableAmountWithCreate()->setValue(0.0);
        }

        $invoiceCurrencyCode = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceCurrencyCode()
            ?->getValue();

        $taxCurrencyCode = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getTaxCurrencyCode()
            ?->getValue();

        $taxTotalAmount = $summation->clearTaxTotalAmount()->addToTaxTotalAmountWithCreate()->setValue(0);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($invoiceCurrencyCode)) {
            $taxTotalAmount->setCurrencyID($invoiceCurrencyCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($taxCurrencyCode)) {
            $taxTotalAmount = $summation->addToTaxTotalAmountWithCreate();
            $taxTotalAmount->setValue(0.0)->setCurrencyId($taxCurrencyCode);
        }

        return $this;
    }

    /**
     * Set the document summation
     *
     * @param  null|float $newNetAmount           __BT-106, From BASIC WL__ Sum of the net amounts of all invoice lines
     * @param  null|float $newChargeTotalAmount   __BT-108, From BASIC WL__ Sum of the charges
     * @param  null|float $newDiscountTotalAmount __BT-107, From BASIC WL__ Sum of the discounts
     * @param  null|float $newTaxBasisAmount      __BT-109, From MINIMUM__ Total invoice amount excluding sales tax
     * @param  null|float $newTaxTotalAmount      __BT-110, From MINIMUM__ Total amount of the invoice sales tax (in the invoice currency)
     * @param  null|float $newTaxTotalAmount2     __BT-111, From BASIC WL__ Total amount of the invoice sales tax (in the ledger currency)
     * @param  null|float $newGrossAmount         __BT-112, From MINIMUM__ Total invoice amount including sales tax
     * @param  null|float $newDueAmount           __BT-115, From MINIMUM__ Payment amount due
     * @param  null|float $newPrepaidAmount       __BT-113, From BASIC WL__ Prepayment amount
     * @param  null|float $newRoungingAmount      __BT-114, From EN16931__ Rounding amount
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getApplicableHeaderTradeSettlement()
            ?->unsetSpecifiedTradeSettlementHeaderMonetarySummation();

        if ($this->supportsNotAtLeastMinimumWithTrace(__METHOD__)) {
            return $this;
        }

        if ($this->supportsAtLeastBasicWl() && InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxBasisAmount, $newGrossAmount, $newDueAmount, $newNetAmount])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxBasisAmount, $newGrossAmount, $newDueAmount, $newNetAmount])');
        }

        if ($this->supportsAtLeastMinimum() && InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxBasisAmount, $newGrossAmount, $newDueAmount])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxBasisAmount, $newGrossAmount, $newDueAmount])');
        }

        $summation = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradeSettlementHeaderMonetarySummationWithCreate();

        $summation->getTaxBasisTotalAmountWithCreate()->setValue($newTaxBasisAmount);
        $summation->getGrandTotalAmountWithCreate()->setValue($newGrossAmount);
        $summation->getDuePayableAmountWithCreate()->setValue($newDueAmount);

        if ($this->supportsAtLeastBasicWl()) {
            $summation->getLineTotalAmountWithCreate()->setValue($newNetAmount);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newChargeTotalAmount)) {
            $summation->getChargeTotalAmountWithCreate()->setValue($newChargeTotalAmount);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newDiscountTotalAmount)) {
            $summation->getAllowanceTotalAmountWithCreate()->setValue($newDiscountTotalAmount);
        }

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newPrepaidAmount)) {
            $summation->getTotalPrepaidAmountWithCreate()->setValue($newPrepaidAmount);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newRoungingAmount)) {
            $summation->getRoundingAmountWithCreate()->setValue($newRoungingAmount);
        }

        $summation->clearTaxTotalAmount()->addToTaxTotalAmountWithCreate()->setValue($newTaxTotalAmount);

        if ($this->supportsAtLeastBasicWl() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxTotalAmount2)) {
            $summation->addToTaxTotalAmountWithCreate()->setValue($newTaxTotalAmount2);
        }

        $this->updateCurrencies();

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a new position to document
     *
     * @param  null|string $newPositionId           __BT-126, From BASIC__ Identification of the position
     * @param  null|string $newParentPositionId     __BT-X-304, From EXTENDED__ Identification of the parent position
     * @param  null|string $newLineStatusCode       __BT-X-7, From EXTENDED__ Indicates whether the invoice item contains prices that must be taken into account when calculating the invoice amount or whether only information is included
     * @param  null|string $newLineStatusReasonCode __BT-X-8, From EXTENDED__ Type to specify whether the invoice line is
     * @return static
     */
    public function addDocumentPosition(
        ?string $newPositionId = null,
        ?string $newParentPositionId = null,
        ?string $newLineStatusCode = null,
        ?string $newLineStatusReasonCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPositionId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPositionId)');
        }

        $positionLineDocument = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->addToIncludedSupplyChainTradeLineItemWithCreate()
            ->getAssociatedDocumentLineDocumentWithCreate();

        $positionLineDocument
            ->getLineIDWithCreate()
            ->setValue($newPositionId);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newParentPositionId)) {
            $positionLineDocument
                ->getParentLineIDWithCreate()
                ->setValue($newParentPositionId);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newLineStatusCode)) {
            $positionLineDocument
                ->getLineStatusCodeWithCreate()
                ->setValue($newLineStatusCode);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newLineStatusReasonCode)) {
            $positionLineDocument
                ->getLineStatusReasonCodeWithCreate()
                ->setValue($newLineStatusReasonCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set text information to latest added position
     *
     * @param  null|string $newContent     __BT-127, From BASIC__ Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode __BT-X-9, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode __BT-X-10, From EXTENDED__ Code for qualifying the free text for the invoice item
     * @return static
     */
    public function setDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getAssociatedDocumentLineDocument()
            ?->unsetIncludedNote();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)');
        }

        $this->addDocumentPositionNote(
            $newContent,
            $newContentCode,
            $newSubjectCode
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add text information to latest added position
     *
     * @param  null|string $newContent     __BT-127, From BASIC__ Text that contains unstructured information that is relevant to the invoice item
     * @param  null|string $newContentCode __BT-X-9, From EXTENDED__ Code to classify the content of the free text of the invoice
     * @param  null|string $newSubjectCode __BT-X-10, From EXTENDED__ Code for qualifying the free text for the invoice item
     * @return static
     */
    public function addDocumentPositionNote(
        ?string $newContent = null,
        ?string $newContentCode = null,
        ?string $newSubjectCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContent)');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getLatestIncludedSupplyChainTradeLineItem()
                ?->getAssociatedDocumentLineDocument()
                ?->unsetIncludedNote();
        }

        $positionNote = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getAssociatedDocumentLineDocumentWithCreate()
            ->addToIncludedNoteWithCreate();

        $positionNote->getContentWithCreate()->setValue($newContent);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newContentCode)) {
            $positionNote->getContentCodeWithCreate()->setValue($newContentCode);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubjectCode)) {
            $positionNote->getSubjectCodeWithCreate()->setValue($newSubjectCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add product details to latest added position
     *
     * @param  null|string $newProductId                 __BT-X-305, From EXTENDED__ ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName               __BT-153, From BASIC__ Name of the product (product name)
     * @param  null|string $newProductDescription        __BT-154, From EN 16931__ Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId           __BT-155, From EN 16931__ Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId            __BT-156, From EN 16931__ Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId           __BT-157, From BASIC__ Product global id
     * @param  null|string $newProductGlobalIdType       __BT-157-1, From BASIC__ Type of the product global id
     * @param  null|string $newProductIndustryId         __BT-X-309, From EXTENDED__ Id assigned by the industry
     * @param  null|string $newProductModelId            __BT-X-533, From EXTENDED__ Unique model identifier of the product
     * @param  null|string $newProductBatchId            __BT-X-534, From EXTENDED__ Batch (lot) identifier of the product
     * @param  null|string $newProductBrandName          __BT-X-535, From EXTENDED__ Brand name of the product
     * @param  null|string $newProductModelName          __BT-X-536, From EXTENDED__ Model name of the product
     * @param  null|string $newProductOriginTradeCountry __BT-159, From EN 16931__ Code indicating the country the goods came from
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->unsetSpecifiedTradeProduct();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductName)');
        }

        $positionProduct = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedTradeProductWithCreate();

        $positionProduct->getNameWithCreate()->setValue($newProductName);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductId)) {
            $positionProduct->getIDWithCreate()->setValue($newProductId);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductDescription)) {
            $positionProduct->getDescriptionWithCreate()->setValue($newProductDescription);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductSellerId)) {
            $positionProduct->getSellerAssignedIDWithCreate()->setValue($newProductSellerId);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductBuyerId)) {
            $positionProduct->getBuyerAssignedIDWithCreate()->setValue($newProductBuyerId);
        }

        if (!InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductGlobalIdType, $newProductGlobalId])) {
            $positionProduct->getGlobalIDWithCreate()->setValue($newProductGlobalId)->setSchemeID($newProductGlobalIdType);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductIndustryId)) {
            $positionProduct->getIndustryAssignedIDWithCreate()->setValue($newProductIndustryId);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductModelId)) {
            $positionProduct->getModelIDWithCreate()->setValue($newProductModelId);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductBatchId)) {
            $positionProduct->addOnceToBatchIDWithCreate()->setValue($newProductBatchId);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductBrandName)) {
            $positionProduct->getBrandNameWithCreate()->setValue($newProductBrandName);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductModelName)) {
            $positionProduct->getModelNameWithCreate()->setValue($newProductModelName);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductOriginTradeCountry)) {
            $positionProduct->getOriginTradeCountryWithCreate()->getIDWithCreate()->setValue($newProductOriginTradeCountry);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set product characteristics in latest added position
     *
     * @param  null|string $newProductCharacteristicDescription  __BT-160, From EN 16931__ Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        __BT-161, From EN 16931__ Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         __BT-X-11, From EXTENDED__ Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue __BT-X-12, From EXTENDED__ Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  __BT-X-12-0, From EXTENDED__ Unit of value of the characteristic
     * @return static
     */
    public function setDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        $positionProduct = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedTradeProduct();

        if (is_null($positionProduct)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($positionProduct)');
        }

        $positionProduct->unsetApplicableProductCharacteristic();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])');
        }

        $this->addDocumentPositionProductCharacteristic(
            $newProductCharacteristicDescription,
            $newProductCharacteristicValue,
            $newProductCharacteristicType,
            $newProductCharacteristicMeasureValue,
            $newProductCharacteristicMeasureUnit,
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add product characteristics in latest added position
     *
     * @param  null|string $newProductCharacteristicDescription  __BT-160, From EN 16931__ Name of the attribute or characteristic ("Colour")
     * @param  null|string $newProductCharacteristicValue        __BT-161, From EN 16931__ Value of the attribute or characteristic ("Red")
     * @param  null|string $newProductCharacteristicType         __BT-X-11, From EXTENDED__ Type (Code) of product characteristic
     * @param  null|float  $newProductCharacteristicMeasureValue __BT-X-12, From EXTENDED__ Value of the characteristic (numerical measured)
     * @param  null|string $newProductCharacteristicMeasureUnit  __BT-X-12-0, From EXTENDED__ Unit of value of the characteristic
     * @return static
     */
    public function addDocumentPositionProductCharacteristic(
        ?string $newProductCharacteristicDescription = null,
        ?string $newProductCharacteristicValue = null,
        ?string $newProductCharacteristicType = null,
        ?float $newProductCharacteristicMeasureValue = null,
        ?string $newProductCharacteristicMeasureUnit = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        $positionProduct = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedTradeProduct();

        if (is_null($positionProduct)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($positionProduct)');
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductCharacteristicDescription, $newProductCharacteristicValue])');
        }

        $positionProductCharacteristic = $positionProduct->addToApplicableProductCharacteristicWithCreate();
        $positionProductCharacteristic->getDescriptionWithCreate()->setValue($newProductCharacteristicDescription);
        $positionProductCharacteristic->getValueWithCreate()->setValue($newProductCharacteristicValue);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductCharacteristicType)) {
            $positionProductCharacteristic->getTypeCodeWithCreate()->setValue($newProductCharacteristicType);
        }

        if ($this->supportsAtLeastExtended() && (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductCharacteristicMeasureUnit) && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newProductCharacteristicMeasureValue))) {
            $positionProductCharacteristic
                ->getValueMeasureWithCreate()
                ->setValue($newProductCharacteristicMeasureValue)
                ->setUnitCode($newProductCharacteristicMeasureUnit);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set product classification in latest added position
     *
     * @param  null|string $newProductClassificationCode          __BT-158, From EN 16931__ Classification identifier
     * @param  null|string $newProductClassificationListId        __BT-158-1, From EN 16931__ Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId __BT-158-2, From EN 16931__ Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname __BT-X-138, From EXTENDED__ Name with which an article can be classified according to type or quality
     * @return static
     */
    public function setDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        $positionProduct = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedTradeProduct();

        if (is_null($positionProduct)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($positionProduct)');
        }

        $positionProduct->unsetDesignatedProductClassification();

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])');
        }

        $this->addDocumentPositionProductClassification(
            $newProductClassificationCode,
            $newProductClassificationListId,
            $newProductClassificationListVersionId,
            $newProductClassificationCodeClassname
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add product classification in latest added position
     *
     * @param  null|string $newProductClassificationCode          __BT-158, From EN 16931__ Classification identifier
     * @param  null|string $newProductClassificationListId        __BT-158-1, From EN 16931__ Identifier for the identification scheme of the item classification
     * @param  null|string $newProductClassificationListVersionId __BT-158-2, From EN 16931__ Version of the identification scheme
     * @param  null|string $newProductClassificationCodeClassname __BT-X-138, From EXTENDED__ Name with which an article can be classified according to type or quality
     * @return static
     */
    public function addDocumentPositionProductClassification(
        ?string $newProductClassificationCode = null,
        ?string $newProductClassificationListId = null,
        ?string $newProductClassificationListVersionId = null,
        ?string $newProductClassificationCodeClassname = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        $positionProduct = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedTradeProduct();

        if (is_null($positionProduct)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($positionProduct)');
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newProductClassificationCode, $newProductClassificationListId])');
        }

        $positionProductClassification = $positionProduct->addToDesignatedProductClassificationWithCreate();
        $positionProductClassification
            ->getClassCodeWithCreate()
            ->setValue($newProductClassificationCode)
            ->setListID($newProductClassificationListId)
            ->setListVersionID($newProductClassificationListVersionId);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductClassificationCodeClassname)) {
            $positionProductClassification->getClassNameWithCreate()->setValue($newProductClassificationCodeClassname);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set referenced product in latest added position
     *
     * @param  null|string $newProductId               __BT-X-301, From EXTENDED__ ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName             __BT-X-18, From EXTENDED__ Name of the product (product name)
     * @param  null|string $newProductDescription      __BT-X-19, From EXTENDED__ Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId         __BT-X-16, From EXTENDED__ Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId          __BT-X-17, From EXTENDED__ Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId         __BT-X-15, From EXTENDED__ Product global id
     * @param  null|string $newProductGlobalIdType     __BT-X-15-1, From EXTENDED__ Type of the product global id
     * @param  null|string $newProductIndustryId       __BT-X-309, From EXTENDED__ Id assigned by the industry
     * @param  null|float  $newProductUnitQuantity     __BT-X-20, From EXTENDED__ Quantity Quantity of the referenced product contained
     * @param  null|string $newProductUnitQuantityUnit __BT-X-20-1, From EXTENDED__ Unit code of the quantity of the referenced product contained
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        $positionProduct = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedTradeProduct();

        if (is_null($positionProduct)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($positionProduct)');
        }

        $positionProduct->unsetIncludedReferencedProduct();

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductName)');
        }

        $this->addDocumentPositionReferencedProduct(
            $newProductId,
            $newProductName,
            $newProductDescription,
            $newProductSellerId,
            $newProductBuyerId,
            $newProductGlobalId,
            $newProductGlobalIdType,
            $newProductIndustryId,
            $newProductUnitQuantity,
            $newProductUnitQuantityUnit
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add referenced product in latest added position
     *
     * @param  null|string $newProductId               __BT-X-308, From EXTENDED__ ID of the product (product id, Order-X interoperable)
     * @param  null|string $newProductName             __BT-X-18, From EXTENDED__ Name of the product (product name)
     * @param  null|string $newProductDescription      __BT-X-19, From EXTENDED__ Product description of the item, the item description makes it possible to describe the item
     * @param  null|string $newProductSellerId         __BT-X-16, From EXTENDED__ Identifier assigned to the product by the seller
     * @param  null|string $newProductBuyerId          __BT-X-17, From EXTENDED__ Identifier assigned to the product by the buyer
     * @param  null|string $newProductGlobalId         __BT-X-15, From EXTENDED__ Product global id
     * @param  null|string $newProductGlobalIdType     __BT-X-15-1, From EXTENDED__ Type of the product global id
     * @param  null|string $newProductIndustryId       __BT-X-309, From EXTENDED__ Id assigned by the industry
     * @param  null|float  $newProductUnitQuantity     __BT-X-20, From EXTENDED__ Quantity Quantity of the referenced product contained
     * @param  null|string $newProductUnitQuantityUnit __BT-X-20-1, From EXTENDED__ Unit code of the quantity of the referenced product contained
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        $positionProduct = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedTradeProduct();

        if (is_null($positionProduct)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($positionProduct)');
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductName)');
        }

        $positionReferencedProduct = $positionProduct->addToIncludedReferencedProductWithCreate();
        $positionReferencedProduct->getNameWithCreate()->setValue($newProductName);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductId)) {
            $positionReferencedProduct->getIDWithCreate()->setValue($newProductId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductDescription)) {
            $positionReferencedProduct->getDescriptionWithCreate()->setValue($newProductDescription);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductSellerId)) {
            $positionReferencedProduct->getSellerAssignedIDWithCreate()->setValue($newProductSellerId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductBuyerId)) {
            $positionReferencedProduct->getBuyerAssignedIDWithCreate()->setValue($newProductBuyerId);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductGlobalIdType) && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductGlobalId)) {
            $positionReferencedProduct->addOnceToGlobalIDWithCreate()->setValue($newProductGlobalId)->setSchemeID($newProductGlobalIdType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductIndustryId)) {
            $positionReferencedProduct->getIndustryAssignedIDWithCreate()->setValue($newProductIndustryId);
        }

        if (
            !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newProductUnitQuantity)
            && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newProductUnitQuantityUnit)
        ) {
            $positionReferencedProduct->getUnitQuantityWithCreate()->setValue($newProductUnitQuantity)->setUnitCode($newProductUnitQuantityUnit);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated seller's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-537, From EXTENDED__ Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-X-538, From EXTENDED__ Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-539, From EXTENDED__ Seller's order confirmation date
     * @return static
     */
    public function setDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetSellerOrderReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $sellerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->getSellerOrderReferencedDocumentWithCreate();

        $sellerOrderReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $sellerOrderReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $sellerOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an associated seller's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-537, From EXTENDED__ Seller's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-X-538, From EXTENDED__ Seller's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-539, From EXTENDED__ Seller's order confirmation date
     * @return static
     */
    public function addDocumentPositionSellerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionSellerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-21, From EXTENDED__ Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-132, From EN 16931__ Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-22, From EXTENDED__ Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetBuyerOrderReferencedDocument();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $buyerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->getBuyerOrderReferencedDocumentWithCreate();

        $buyerOrderReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $buyerOrderReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $buyerOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an associated buyer's order confirmation (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-21, From EXTENDED__ Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-132, From EN 16931__ Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-22, From EXTENDED__ Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionBuyerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionBuyerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-310, From EXTENDED__ Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-X-311, From EXTENDED__ Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-312, From EXTENDED__ Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetQuotationReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $quotationOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->getQuotationReferencedDocumentWithCreate();

        $quotationOrderReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $quotationOrderReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $quotationOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an associated quotation (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-310, From EXTENDED__ Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-X-311, From EXTENDED__ Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-312, From EXTENDED__ Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionQuotationReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionQuotationReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the associated contract (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-24, From EXTENDED__ Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-X-25, From EXTENDED__ Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-26, From EXTENDED__ Buyer's order confirmation date
     * @return static
     */
    public function setDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetContractReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $contractOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->getContractReferencedDocumentWithCreate();

        $contractOrderReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $contractOrderReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $contractOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an associated contract (line reference).
     *
     * @param  null|string            $newReferenceNumber     __BT-X-24, From EXTENDED__ Buyer's order confirmation number
     * @param  null|string            $newReferenceLineNumber __BT-X-25, From EXTENDED__ Buyer's order confirmation line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-26, From EXTENDED__ Buyer's order confirmation date
     * @return static
     */
    public function addDocumentPositionContractReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionContractReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional associated document (line reference)
     *
     * @param  null|string                 $newReferenceNumber        __BT-X-27, From EXTENDED__ Additional document number
     * @param  null|string                 $newReferenceLineNumber    __BT-X-29, From EXTENDED__ Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          __BT-X-33, From EXTENDED__ Additional document date
     * @param  null|string                 $newTypeCode               __BT-X-30, From EXTENDED__ Additional document type code
     * @param  null|string                 $newReferenceTypeCode      __BT-X-32, From EXTENDED__ Additional document reference-type code
     * @param  null|string                 $newDescription            __BT-X-299, From EXTENDED__ Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment __BT-X-31, From EXTENDED__ Additional document attachment
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetAdditionalReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber, $newTypeCode])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber, $newTypeCode])');
        }

        $this->addDocumentPositionAdditionalReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode,
            $newReferenceTypeCode,
            $newDescription,
            $newInvoiceSuiteAttachment
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional associated document (line reference)
     *
     * @param  null|string                 $newReferenceNumber        __BT-X-27, From EXTENDED__ Additional document number
     * @param  null|string                 $newReferenceLineNumber    __BT-X-29, From EXTENDED__ Additional document line number
     * @param  null|DateTimeInterface      $newReferenceDate          __BT-X-33, From EXTENDED__ Additional document date
     * @param  null|string                 $newTypeCode               __BT-X-30, From EXTENDED__ Additional document type code
     * @param  null|string                 $newReferenceTypeCode      __BT-X-32, From EXTENDED__ Additional document reference-type code
     * @param  null|string                 $newDescription            __BT-X-299, From EXTENDED__ Additional document description
     * @param  null|InvoiceSuiteAttachment $newInvoiceSuiteAttachment __BT-X-31, From EXTENDED__ Additional document attachment
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber, $newTypeCode])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newReferenceLineNumber, $newTypeCode])');
        }

        $additionalReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->addToAdditionalReferencedDocumentWithCreate();

        $additionalReference
            ->getIssuerAssignedIDWithCreate()
            ->setValue($newReferenceNumber);

        $additionalReference
            ->getLineIDWithCreate()
            ->setValue($newReferenceLineNumber);

        $additionalReference
            ->getTypeCodeWithCreate()
            ->setValue($newTypeCode);

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $additionalReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceTypeCode)) {
            $additionalReference
                ->getReferenceTypeCodeWithCreate()
                ->setValue($newReferenceTypeCode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $additionalReference
                ->getNameWithCreate()
                ->setValue($newDescription);
        }

        if (!is_null($newInvoiceSuiteAttachment)) {
            if ($newInvoiceSuiteAttachment->isBinaryAttachment()) {
                $additionalReference
                    ->getAttachmentBinaryObjectWithCreate()
                    ->setFilename($newInvoiceSuiteAttachment->getFilename())
                    ->setMimeCode($newInvoiceSuiteAttachment->getContentMimeType())
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }

            if ($newInvoiceSuiteAttachment->isUrlAttachment()) {
                $additionalReference
                    ->getURIIDWithCreate()
                    ->setValue($newInvoiceSuiteAttachment->getContent());
            }
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional ultimate customer order reference (line reference)
     *
     * @param  null|string            $newReferenceNumber     __BT-X-43, From EXTENDED__ Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber __BT-X-44, From EXTENDED__ Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-45, From EXTENDED__ Ultimate customer order date
     * @return static
     */
    public function setDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetUltimateCustomerOrderReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->addDocumentPositionUltimateCustomerOrderReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional ultimate customer order reference (line reference)
     *
     * @param  null|string            $newReferenceNumber     __BT-X-43, From EXTENDED__ Ultimate customer order number
     * @param  null|string            $newReferenceLineNumber __BT-X-44, From EXTENDED__ Ultimate customer order line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-45, From EXTENDED__ Ultimate customer order date
     * @return static
     */
    public function addDocumentPositionUltimateCustomerOrderReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $ultimateCustomerOrderReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->addToUltimateCustomerOrderReferencedDocumentWithCreate();

        $ultimateCustomerOrderReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $ultimateCustomerOrderReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $ultimateCustomerOrderReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber     __BT-X-86, From EXTENDED__ Shipping notification number
     * @param  null|string            $newReferenceLineNumber __BT-X-87, From EXTENDED__ Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-88, From EXTENDED__ Shipping notification date
     * @return static
     */
    public function setDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->unsetDespatchAdviceReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $despatchAdviceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getDespatchAdviceReferencedDocumentWithCreate();

        $despatchAdviceReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $despatchAdviceReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $despatchAdviceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional despatch advice reference
     *
     * @param  null|string            $newReferenceNumber     __BT-X-86, From EXTENDED__ Shipping notification number
     * @param  null|string            $newReferenceLineNumber __BT-X-87, From EXTENDED__ Shipping notification line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-88, From EXTENDED__ Shipping notification date
     * @return static
     */
    public function addDocumentPositionDespatchAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionDespatchAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber     __BT-X-89, From EXTENDED__ Receipt notification number
     * @param  null|string            $newReferenceLineNumber __BT-X-90, From EXTENDED__ Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-91, From EXTENDED__ Receipt notification date
     * @return static
     */
    public function setDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->unsetReceivingAdviceReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $receivingAdviceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getReceivingAdviceReferencedDocumentWithCreate();

        $receivingAdviceReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $receivingAdviceReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $receivingAdviceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional receiving advice reference
     *
     * @param  null|string            $newReferenceNumber     __BT-X-89, From EXTENDED__ Receipt notification number
     * @param  null|string            $newReferenceLineNumber __BT-X-90, From EXTENDED__ Receipt notification line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-91, From EXTENDED__ Receipt notification date
     * @return static
     */
    public function addDocumentPositionReceivingAdviceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionReceivingAdviceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional delivery note
     *
     * @param  null|string            $newReferenceNumber     __BT-X-92, From EXTENDED__ Delivery slip number
     * @param  null|string            $newReferenceLineNumber __BT-X-93, From EXTENDED__ Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-94, From EXTENDED__ Delivery slip date
     * @return static
     */
    public function setDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->unsetDeliveryNoteReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $deliveryNoteReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getDeliveryNoteReferencedDocumentWithCreate();

        $deliveryNoteReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $deliveryNoteReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $deliveryNoteReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional delivery note
     *
     * @param  null|string            $newReferenceNumber     __BT-X-92, From EXTENDED__ Delivery slip number
     * @param  null|string            $newReferenceLineNumber __BT-X-93, From EXTENDED__ Delivery slip line number
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-94, From EXTENDED__ Delivery slip date
     * @return static
     */
    public function addDocumentPositionDeliveryNoteReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionDeliveryNoteReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber     __BT-X-331, From EXTENDED__ Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber __BT-X-540, From EXTENDED__ Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-333, From EXTENDED__ Date of the previous invoice
     * @param  null|string            $newTypeCode            __BT-X-332, From EXTENDED__ Type code of previous invoice
     * @return static
     */
    public function setDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeSettlement()
            ?->unsetInvoiceReferencedDocument();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $invoiceReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeSettlementWithCreate()
            ->getInvoiceReferencedDocumentWithCreate();

        $invoiceReference->getLineIDWithCreate()->setValue($newReferenceLineNumber);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceNumber)) {
            $invoiceReference
                ->getIssuerAssignedIDWithCreate()
                ->setValue($newReferenceNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newTypeCode)) {
            $invoiceReference
                ->getTypeCodeWithCreate()
                ->setValue($newTypeCode);
        }

        if (!InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newReferenceDate)) {
            $invoiceReference
                ->getFormattedIssueDateTimeWithCreate()
                ->getDateTimeStringWithCreate()
                ->setValue($newReferenceDate->format('Ymd'))
                ->setFormat('102');
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional invoice document (reference to preceding invoice)
     *
     * @param  null|string            $newReferenceNumber     __BT-X-331, From EXTENDED__ Identification of an invoice previously sent
     * @param  null|string            $newReferenceLineNumber __BT-X-540, From EXTENDED__ Identification of an invoice line previously sent
     * @param  null|DateTimeInterface $newReferenceDate       __BT-X-333, From EXTENDED__ Date of the previous invoice
     * @param  null|string            $newTypeCode            __BT-X-332, From EXTENDED__ Type code of previous invoice
     * @return static
     */
    public function addDocumentPositionInvoiceReference(
        ?string $newReferenceNumber = null,
        ?string $newReferenceLineNumber = null,
        ?DateTimeInterface $newReferenceDate = null,
        ?string $newTypeCode = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceLineNumber)');
        }

        $this->setDocumentPositionInvoiceReference(
            $newReferenceNumber,
            $newReferenceLineNumber,
            $newReferenceDate,
            $newTypeCode
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set an additional object reference
     *
     * @param  null|string $newReferenceNumber   __BT-128, From EN 16931__ Object identification at the level on position-level
     * @param  null|string $newTypeCode          __BT-128-0, From EN 16931__ Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode __BT-128-1, From EN 16931__ Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     */
    public function setDocumentPositionAdditionalObjectReference(
        ?string $newReferenceNumber = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeSettlement()
            ?->unsetAdditionalReferencedDocument();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])');
        }

        $this->addDocumentPositionAdditionalObjectReference(
            $newReferenceNumber,
            $newTypeCode,
            $newReferenceTypeCode
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an additional object reference
     *
     * @param  null|string $newReferenceNumber   __BT-128, From EN 16931__ Object identification at the level on position-level
     * @param  null|string $newTypeCode          __BT-128-0, From EN 16931__ Labelling of the object identifier
     * @param  null|string $newReferenceTypeCode __BT-128-1, From EN 16931__ Schema identifier, Type of identifier for an item on which the invoice item is based
     * @return static
     */
    public function addDocumentPositionAdditionalObjectReference(
        ?string $newReferenceNumber = null,
        ?string $newTypeCode = null,
        ?string $newReferenceTypeCode = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newReferenceNumber, $newTypeCode])');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getLatestIncludedSupplyChainTradeLineItem()
                ?->getSpecifiedLineTradeSettlement()
                ?->unsetAdditionalReferencedDocument();
        }

        $additionalObjectReference = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeSettlementWithCreate()
            ->addToAdditionalReferencedDocumentWithCreate();

        $additionalObjectReference->getIssuerAssignedIDWithCreate()->setValue($newReferenceNumber);
        $additionalObjectReference->getTypeCodeWithCreate()->setValue($newTypeCode);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newReferenceTypeCode)) {
            $additionalObjectReference->getReferenceTypeCodeWithCreate()->setValue($newReferenceTypeCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the position's gross price
     *
     * @param  null|float  $newGrossPrice                  __BT-148, From BASIC__ Unit price excluding sales tax before deduction of the discount on the item price
     * @param  null|float  $newGrossPriceBasisQuantity     __BT-149-1, From BASIC__ Number of item units for which the price applies
     * @param  null|string $newGrossPriceBasisQuantityUnit __BT-150-1, From BASIC__ Unit code of the number of item units for which the price applies
     * @return static
     */
    public function setDocumentPositionGrossPrice(
        ?float $newGrossPrice = null,
        ?float $newGrossPriceBasisQuantity = null,
        ?string $newGrossPriceBasisQuantityUnit = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetGrossPriceProductTradePrice();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPrice)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPrice)');
        }

        $grossPrice = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->getGrossPriceProductTradePriceWithCreate();

        $grossPrice->getChargeAmountWithCreate()->setValue($newGrossPrice);

        if (
            !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPriceBasisQuantity)
            && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newGrossPriceBasisQuantityUnit)
        ) {
            $grossPrice->getBasisQuantityWithCreate()->setValue($newGrossPriceBasisQuantity)->setUnitCode($newGrossPriceBasisQuantityUnit);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set discount or charge to the gross price
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      __BT-147, From BASIC__ Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             __BT-147-02, From BASIC__ Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     __BT-X-34, From EXTENDED__ Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount __BT-X-35, From EXTENDED__ Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      __BT-X-36, From EXTENDED__ Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  __BT-X-313, From EXTENDED__ Reason code for discount or charge (free text)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        $grossPrice = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->getGrossPriceProductTradePrice();

        if (is_null($grossPrice)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($grossPrice)');
        }

        $grossPrice->unsetAppliedTradeAllowanceCharge();

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPriceAllowanceChargeAmount) || is_null($newIsCharge)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPriceAllowanceChargeAmount) || is_null($newIsCharge)');
        }

        $this->addDocumentPositionGrossPriceAllowanceCharge(
            $newGrossPriceAllowanceChargeAmount,
            $newIsCharge,
            $newGrossPriceAllowanceChargePercent,
            $newGrossPriceAllowanceChargeBasisAmount,
            $newGrossPriceAllowanceChargeReason,
            $newGrossPriceAllowanceChargeReasonCode
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add discount or charge to the gross price
     *
     * @param  null|float  $newGrossPriceAllowanceChargeAmount      __BT-147, From BASIC__ Discount amount or charge amount on the item price
     * @param  null|bool   $newIsCharge                             __BT-147-02, From BASIC__ Switch for charge/discount
     * @param  null|float  $newGrossPriceAllowanceChargePercent     __BT-X-34, From EXTENDED__ Discount or charge on the item price in percent
     * @param  null|float  $newGrossPriceAllowanceChargeBasisAmount __BT-X-35, From EXTENDED__ Base amount of the discount or charge
     * @param  null|string $newGrossPriceAllowanceChargeReason      __BT-X-36, From EXTENDED__ Reason for discount or charge (free text)
     * @param  null|string $newGrossPriceAllowanceChargeReasonCode  __BT-X-313, From EXTENDED__ Reason code for discount or charge (free text)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        $grossPrice = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->getGrossPriceProductTradePrice();

        if (is_null($grossPrice)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($grossPrice)');
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPriceAllowanceChargeAmount) || is_null($newIsCharge)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPriceAllowanceChargeAmount) || is_null($newIsCharge)');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $grossPrice->unsetAppliedTradeAllowanceCharge();
        }

        $allowanceCharge = $grossPrice->addToAppliedTradeAllowanceChargeWithCreate();
        $allowanceCharge->getActualAmountWithCreate()->setValue($newGrossPriceAllowanceChargeAmount);
        $allowanceCharge->getChargeIndicatorWithCreate()->setIndicator($newIsCharge);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPriceAllowanceChargePercent)) {
            $allowanceCharge->getCalculationPercentWithCreate()->setValue($newGrossPriceAllowanceChargePercent);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossPriceAllowanceChargeBasisAmount)) {
            $allowanceCharge->getBasisAmountWithCreate()->setValue($newGrossPriceAllowanceChargeBasisAmount);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newGrossPriceAllowanceChargeReason)) {
            $allowanceCharge->getReasonWithCreate()->setValue($newGrossPriceAllowanceChargeReason);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newGrossPriceAllowanceChargeReasonCode)) {
            $allowanceCharge->getReasonCodeWithCreate()->setValue($newGrossPriceAllowanceChargeReasonCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the position's net price
     *
     * @param  null|float  $newNetPrice                  __BT-146, From BASIC__ Unit price excluding sales tax after deduction of the discount on the item price
     * @param  null|float  $newNetPriceBasisQuantity     __BT-149, From BASIC__ Number of item units for which the price applies
     * @param  null|string $newNetPriceBasisQuantityUnit __BT-150, From BASIC__ Unit code of the number of item units for which the price applies
     * @return static
     */
    public function setDocumentPositionNetPrice(
        ?float $newNetPrice = null,
        ?float $newNetPriceBasisQuantity = null,
        ?string $newNetPriceBasisQuantityUnit = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->unsetNetPriceProductTradePrice();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newNetPrice)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newNetPrice)');
        }

        $netPrice = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeAgreementWithCreate()
            ->getNetPriceProductTradePriceWithCreate();

        $netPrice->getChargeAmountWithCreate()->setValue($newNetPrice);

        if (
            !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newNetPriceBasisQuantity)
            && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newNetPriceBasisQuantityUnit)
        ) {
            $netPrice->getBasisQuantityWithCreate()->setValue($newNetPriceBasisQuantity)->setUnitCode($newNetPriceBasisQuantityUnit);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the position's net price included tax
     *
     * @param  null|string $newTaxCategory         __BT-X-40, From EXTENDED__ Coded description of the tax category
     * @param  null|string $newTaxType             __BT-X-38, From EXTENDED__ Coded description of the tax type
     * @param  null|float  $newTaxAmount           __BT-X-37, From EXTENDED__ Tax total amount
     * @param  null|float  $newTaxPercent          __BT-X-42, From EXTENDED__ Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     __BT-X-39, From EXTENDED__ Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode __BT-X-41, From EXTENDED__ Reason for tax exemption (Code)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        $netPrice = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeAgreement()
            ?->getNetPriceProductTradePrice();

        if (is_null($netPrice)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'null', 'is_null($netPrice)');
        }

        $netPrice->unsetIncludedTradeTax();

        if (InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newTaxAmount])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteFloatUtils::oneIsNullOrEmpty([$newTaxPercent, $newTaxAmount])');
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])');
        }

        $tradeTax = $netPrice->getIncludedTradeTaxWithCreate();
        $tradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $tradeTax->getTypeCodeWithCreate()->setValue($newTaxType);
        $tradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);
        $tradeTax->getCalculatedAmountWithCreate()->setValue($newTaxAmount);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newExemptionReason)) {
            $tradeTax->getExemptionReasonWithCreate()->setValue($newExemptionReason);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newExemptionReasonCode)) {
            $tradeTax->getExemptionReasonCodeWithCreate()->setValue($newExemptionReasonCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the position's quantities
     *
     * @param  null|float  $newQuantity                   __BT-129, From BASIC__ Invoiced quantity
     * @param  null|string $newQuantityUnit               __BT-130, From BASIC__ Invoiced quantity unit
     * @param  null|float  $newChargeFreeQuantity         __BT-X-46, From EXTENDED__ Charge Free quantity
     * @param  null|string $newChargeFreeQuantityUnit     __BT-X-46-0, From EXTENDED__ Charge Free quantity unit
     * @param  null|float  $newPackageQuantity            __BT-X-47, From EXTENDED__ Package quantity
     * @param  null|string $newPackageQuantityUnit        __BT-X-47-0, From EXTENDED__ Package quantity unit
     * @param  null|float  $newPerPackageUnitQuantity     __BT-X-561, From EXTENDED__ Per Package unit quantity
     * @param  null|string $newPerPackageUnitQuantityUnit __BT-X-561-0, From EXTENDED__ Per Package unit quantity unit
     * @return static
     */
    public function setDocumentPositionQuantities(
        ?float $newQuantity = null,
        ?string $newQuantityUnit = null,
        ?float $newChargeFreeQuantity = null,
        ?string $newChargeFreeQuantityUnit = null,
        ?float $newPackageQuantity = null,
        ?string $newPackageQuantityUnit = null,
        ?float $newPerPackageUnitQuantity = null,
        ?string $newPerPackageUnitQuantityUnit = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->unsetBilledQuantity()
            ?->unsetChargeFreeQuantity()
            ?->unsetPackageQuantity()
            ?->unsetPerPackageUnitQuantity();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newQuantity)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newQuantity)');
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newQuantityUnit)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newQuantityUnit)');
        }

        $latestPosition = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate();

        $latestPosition
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getBilledQuantityWithCreate()
            ->setValue($newQuantity)
            ->setUnitCode($newQuantityUnit);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newChargeFreeQuantity) && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newChargeFreeQuantityUnit)) {
            $latestPosition
                ->getSpecifiedLineTradeDeliveryWithCreate()
                ->getChargeFreeQuantityWithCreate()
                ->setValue($newChargeFreeQuantity)
                ->setUnitCode($newChargeFreeQuantityUnit);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newPackageQuantity) && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPackageQuantityUnit)) {
            $latestPosition
                ->getSpecifiedLineTradeDeliveryWithCreate()
                ->getPackageQuantityWithCreate()
                ->setValue($newPackageQuantity)
                ->setUnitCode($newPackageQuantityUnit);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newPerPackageUnitQuantity) && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPerPackageUnitQuantityUnit)) {
            $latestPosition
                ->getSpecifiedLineTradeDeliveryWithCreate()
                ->getPerPackageUnitQuantityWithCreate()
                ->setValue($newPerPackageUnitQuantity)
                ->setUnitCode($newPerPackageUnitQuantityUnit);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the Ship-To party
     *
     * @param  null|string $newName __BT-X-50, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPositionShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the Ship-To party
     *
     * @param  null|string $newName __BT-X-50, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPositionShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentPositionShipToName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the Ship-To party
     *
     * @param  null|string $newId __BT-X-48, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPositionShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentPositionShipToId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newId __BT-X-48, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPositionShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToIDWithCreate()
            ->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-X-49, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-49-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentPositionShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-X-49, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-49-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentPositionShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-66-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-66, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentPositionShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-66-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-66, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentPositionShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $shipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate();

        $shipToTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $shipToTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $this->setDocumentPositionShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-51-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-51, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-52, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $shipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $shipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $shipToTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $shipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a legal information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-51-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-51, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-52, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPositionShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentPositionShipToLegalOrganisation($newType, $newId, $newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     __BT-X-54, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-54-1, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-55, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-56, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-57, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])');
        }

        $this->addDocumentPositionShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the Ship-To party
     *
     * @param  null|string $newPersonName     __BT-X-54, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT-X-54-1, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT-X-55, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT-X-56, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT-X-57, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPositionShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])');
        }

        $shipToTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $shipToTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $shipToTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $shipToTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $shipToTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $shipToTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add communication information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-65-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-65, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getShipToTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $shipToUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getShipToTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $shipToUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $shipToUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a communication information of the Ship-To party
     *
     * @param  null|string $newType __BT-X-65-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-65, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentPositionShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentPositionShipToCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the name of the ultimate Ship-To party
     *
     * @param  null|string $newName __BT-X-69, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function setDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetName();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->getNameWithCreate()
            ->setValue($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a name of the ultimate Ship-To party
     *
     * @param  null|string $newName __BT-X-69, From EXTENDED__ The full formal name under which the party is registered
     * @return static
     */
    public function addDocumentPositionUltimateShipToName(
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)');
        }

        $this->setDocumentPositionUltimateShipToName($newName);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the ID of the ultimate Ship-To party
     *
     * @param  null|string $newId __BT-X-67, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function setDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $this->addDocumentPositionUltimateShipToId($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newId __BT-X-67, From EXTENDED__ An identifier of the party. In many systems, identification is key information.
     * @return static
     */
    public function addDocumentPositionUltimateShipToId(
        ?string $newId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)');
        }

        $latestPosition = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate();

        $ultimateShipToTradeParty = $latestPosition
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate();

        $ultimateShipToTradeParty->addToIDWithCreate()->setValue($newId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Global ID of the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-X-68, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-68-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function setDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetGlobalID();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this->addDocumentPositionUltimateShipToGlobalId($newGlobalId, $newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an ID to the ultimate Ship-To party
     *
     * @param  null|string $newGlobalId     __BT-X-68, From EXTENDED__ A global identifier of the party
     * @param  null|string $newGlobalIdType __BT-X-68-0, From EXTENDED__ Type of the global identifier of the party
     * @return static
     */
    public function addDocumentPositionUltimateShipToGlobalId(
        ?string $newGlobalId = null,
        ?string $newGlobalIdType = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newGlobalId, $newGlobalIdType])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToGlobalIDWithCreate()
            ->setValue($newGlobalId)
            ->setSchemeID($newGlobalIdType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the Tax Registration of the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-84-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-84, From EXTENDED__ Tax identification number
     * @return static
     */
    public function setDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetSpecifiedTaxRegistration();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this->addDocumentPositionUltimateShipToTaxRegistration($newTaxRegistrationType, $newTaxRegistrationId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add an Tax Registration to the ultimate Ship-To party
     *
     * @param  null|string $newTaxRegistrationType __BT-X-84-0, From EXTENDED__ Type of tax identification number of the party (e.g. FC = Tax number or VA = Sales tax identification number).
     * @param  null|string $newTaxRegistrationId   __BT-X-84, From EXTENDED__ Tax identification number
     * @return static
     */
    public function addDocumentPositionUltimateShipToTaxRegistration(
        ?string $newTaxRegistrationType = null,
        ?string $newTaxRegistrationId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxRegistrationType, $newTaxRegistrationId])');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToSpecifiedTaxRegistrationWithCreate()
            ->getIDWithCreate()
            ->setValue($newTaxRegistrationId)
            ->setSchemeID($newTaxRegistrationType);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 __BT_X-77, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT_X-78, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT_X-79, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT_X-76, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT_X-80, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT_X-81, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT_X-82, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetPostalTradeAddress();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $ultimateShipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate();

        $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCountryIDWithCreate()->setValue($newCountryId);

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine1)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineOneWithCreate()->setValue($newAddressLine1);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine2)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineTwoWithCreate()->setValue($newAddressLine2);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAddressLine3)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getLineThreeWithCreate()->setValue($newAddressLine3);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPostcode)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getPostcodeCodeWithCreate()->setValue($newPostcode);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCity)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCityNameWithCreate()->setValue($newCity);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newSubDivision)) {
            $ultimateShipToTradeParty->getPostalTradeAddressWithCreate()->getCountrySubDivisionNameWithCreate()->setValue($newSubDivision);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a address of the ultimate Ship-To party
     *
     * @param  null|string $newAddressLine1 __BT_X-77, From EXTENDED__ The main line in the address. This is usually the street name and house number or the post office box.
     * @param  null|string $newAddressLine2 __BT_X-78, From EXTENDED__ Line 2 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newAddressLine3 __BT_X-79, From EXTENDED__ Line 3 of the address. This is an additional address line in an address that can be used to provide additional details in addition to the main line.
     * @param  null|string $newPostcode     __BT_X-76, From EXTENDED__ Zip code of the city or municipality in which the party's address is located
     * @param  null|string $newCity         __BT_X-80, From EXTENDED__ Name of the city or municipality in which the party's address is located
     * @param  null|string $newCountryId    __BT_X-81, From EXTENDED__ Country in which the party's address is located
     * @param  null|string $newSubDivision  __BT_X-82, From EXTENDED__ Region or federal state in which the party's address is located
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newCountryId)');
        }

        $this->setDocumentPositionUltimateShipToAddress(
            $newAddressLine1,
            $newAddressLine2,
            $newAddressLine3,
            $newPostcode,
            $newCity,
            $newCountryId,
            $newSubDivision
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-70-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-70, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-71, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function setDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetSpecifiedLegalOrganization();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $ultimateShipToTradeParty = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newId)) {
            $ultimateShipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getIDWithCreate()->setValue($newId);

            if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
                $ultimateShipToTradeParty->getSpecifiedLegalOrganization()->getID()->setSchemeID($newType);
            }
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newName)) {
            $ultimateShipToTradeParty->getSpecifiedLegalOrganizationWithCreate()->getTradingBusinessNameWithCreate()->setValue($newName);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the legal information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-70-0, From EXTENDED__ Type of the identification number of the legal registration of the party
     * @param  null|string $newId   __BT-X-70, From EXTENDED__ Identification number of the legal registration of the party
     * @param  null|string $newName __BT-X-71, From EXTENDED__ Name by which the party is known, if different from the party's name
     * @return static
     */
    public function addDocumentPositionUltimateShipToLegalOrganisation(
        ?string $newType = null,
        ?string $newId = null,
        ?string $newName = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newType, $newId, $newName])');
        }

        $this->setDocumentPositionUltimateShipToLegalOrganisation(
            $newType,
            $newId,
            $newName
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     __BT_X-72, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT_X-72-1, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT_X-73, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT_X-74, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT_X-75, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function setDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetDefinedTradeContact();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])');
        }

        $this->addDocumentPositionUltimateShipToContact(
            $newPersonName,
            $newDepartmentName,
            $newPhoneNumber,
            $newFaxNumber,
            $newEmailAddress
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add contact information of the ultimate Ship-To party
     *
     * @param  null|string $newPersonName     __BT_X-72, From EXTENDED__ Name of contact person or department or office for the contact point
     * @param  null|string $newDepartmentName __BT_X-72-1, From EXTENDED__ Name of the department for the contact point
     * @param  null|string $newPhoneNumber    __BT_X-73, From EXTENDED__ Telephone number for the contact point
     * @param  null|string $newFaxNumber      __BT_X-74, From EXTENDED__ Fax number of the contact point
     * @param  null|string $newEmailAddress   __BT_X-75, From EXTENDED__ E-Mail address of the contact point
     * @return static
     */
    public function addDocumentPositionUltimateShipToContact(
        ?string $newPersonName = null,
        ?string $newDepartmentName = null,
        ?string $newPhoneNumber = null,
        ?string $newFaxNumber = null,
        ?string $newEmailAddress = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'allIsNullOrEmpty', 'InvoiceSuiteStringUtils::allIsNullOrEmpty([$newPersonName, $newDepartmentName, $newPhoneNumber, $newFaxNumber, $newEmailAddress])');
        }

        $ultimateShipToTradeContact = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->addToDefinedTradeContactWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPersonName)) {
            $ultimateShipToTradeContact->getPersonNameWithCreate()->setValue($newPersonName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDepartmentName)) {
            $ultimateShipToTradeContact->getDepartmentNameWithCreate()->setValue($newDepartmentName);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newPhoneNumber)) {
            $ultimateShipToTradeContact->getTelephoneUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newPhoneNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newFaxNumber)) {
            $ultimateShipToTradeContact->getFaxUniversalCommunicationWithCreate()->getCompleteNumberWithCreate()->setValue($newFaxNumber);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newEmailAddress)) {
            $ultimateShipToTradeContact->getEmailURIUniversalCommunicationWithCreate()->getURIIDWithCreate()->setValue($newEmailAddress);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-75-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-75, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function setDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->getUltimateShipToTradeParty()
            ?->unsetURIUniversalCommunication();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $ultimateShipToUniversalCommunication = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getUltimateShipToTradePartyWithCreate()
            ->getURIUniversalCommunicationWithCreate();

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $ultimateShipToUniversalCommunication->getURIIDWithCreate()->setSchemeID($newType);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newUri)) {
            $ultimateShipToUniversalCommunication->getURIIDWithCreate()->setValue($newUri);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add communication information of the ultimate Ship-To party
     *
     * @param  null|string $newType __BT-X-75-0, From EXTENDED__ The type for the party's electronic address
     * @param  null|string $newUri  __BT-X-75, From EXTENDED__ The party's electronic address
     * @return static
     */
    public function addDocumentPositionUltimateShipToCommunication(
        ?string $newType = null,
        ?string $newUri = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newType, $newUri])');
        }

        $this->setDocumentPositionUltimateShipToCommunication($newType, $newUri);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the date of the delivery
     *
     * @param  null|DateTimeInterface $newDate __BT-X-85, From EXTENDED__
     * @return static
     */
    public function setDocumentPositionSupplyChainEvent(
        ?DateTimeInterface $newDate = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeDelivery()
            ?->unsetActualDeliverySupplyChainEvent();

        if ($this->supportsNotAtLeastExtendedWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDate)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'datetimeIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::datetimeIsNullOrEmpty($newDate)');
        }

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeDeliveryWithCreate()
            ->getActualDeliverySupplyChainEventWithCreate()
            ->getOccurrenceDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newDate->format('Ymd'))
            ->setFormat('102');

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the position's start and/or end date of the billing period
     *
     * @param  null|DateTimeInterface $newStartDate   __BT-134, From BASIC__ Start of the billing period
     * @param  null|DateTimeInterface $newEndDate     __BT-135, From BASIC__ End of the billing period
     * @param  null|string            $newDescription __BT-X-264, From EXTENDED__ Further information of the billing period (Obsolete)
     * @return static
     */
    public function setDocumentPositionBillingPeriod(
        ?DateTimeInterface $newStartDate = null,
        ?DateTimeInterface $newEndDate = null,
        ?string $newDescription = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeSettlement()
            ?->unsetBillingSpecifiedPeriod();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])');
        }

        $billingPeriod = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeSettlementWithCreate()
            ->getBillingSpecifiedPeriodWithCreate();

        $billingPeriod
            ->getStartDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newStartDate->format('Ymd'))
            ->setFormat('102');

        $billingPeriod
            ->getEndDateTimeWithCreate()
            ->getDateTimeStringWithCreate()
            ->setValue($newEndDate->format('Ymd'))
            ->setFormat('102');

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newDescription)) {
            $billingPeriod
                ->getDescriptionWithCreate()
                ->setValue($newDescription);
        }

        $this->traceMethodExit(__METHOD__);

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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteDateTimeUtils::oneIsNullOrEmpty([$newStartDate, $newEndDate])');
        }

        $this->setDocumentPositionBillingPeriod($newStartDate, $newEndDate, $newDescription);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the position's tax information
     *
     * @param  null|string $newTaxCategory         __BT-151, From BASIC__ Coded description of the tax category
     * @param  null|string $newTaxType             __BT-151-0, From BASIC__ Coded description of the tax type
     * @param  null|float  $newTaxAmount           __BT-X-95, From EXTENDED__ Tax total amount
     * @param  null|float  $newTaxPercent          __BT-152, From BASIC__ Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     __BT-X-96, From EXTENDED__ Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode __BT-X-97, From EXTENDED__ Reason for tax exemption (Code)
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeSettlement()
            ?->unsetApplicableTradeTax();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxPercent)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxPercent)');
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])');
        }

        $this->addDocumentPositionTax(
            $newTaxCategory,
            $newTaxType,
            $newTaxAmount,
            $newTaxPercent,
            $newExemptionReason,
            $newExemptionReasonCode
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a position's tax information
     *
     * @param  null|string $newTaxCategory         __BT-151, From BASIC__ Coded description of the tax category
     * @param  null|string $newTaxType             __BT-151-0, From BASIC__ Coded description of the tax type
     * @param  null|float  $newTaxAmount           __BT-X-95, From EXTENDED__ Tax total amount
     * @param  null|float  $newTaxPercent          __BT-152, From BASIC__ Tax Rate (Percentage)
     * @param  null|string $newExemptionReason     __BT-X-96, From EXTENDED__ Reason for tax exemption (free text)
     * @param  null|string $newExemptionReasonCode __BT-X-97, From EXTENDED__ Reason for tax exemption (Code)
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxPercent)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxPercent)');
        }

        if (InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])) {
            return $this->traceMethodEarlyExit(__METHOD__, 'oneIsNullOrEmpty', 'InvoiceSuiteStringUtils::oneIsNullOrEmpty([$newTaxCategory, $newTaxType])');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getLatestIncludedSupplyChainTradeLineItem()
                ?->getSpecifiedLineTradeSettlement()
                ?->unsetApplicableTradeTax();
        }

        $tradeTax = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeSettlementWithCreate()
            ->addToApplicableTradeTaxWithCreate();

        $tradeTax->getCategoryCodeWithCreate()->setValue($newTaxCategory);
        $tradeTax->getTypeCodeWithCreate()->setValue($newTaxType);
        $tradeTax->getRateApplicablePercentWithCreate()->setValue($newTaxPercent);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxAmount)) {
            $tradeTax->getCalculatedAmountWithCreate()->setValue($newTaxAmount);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newExemptionReason)) {
            $tradeTax->getExemptionReasonWithCreate()->setValue($newExemptionReason);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newExemptionReasonCode)) {
            $tradeTax->getExemptionReasonCodeWithCreate()->setValue($newExemptionReasonCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set Document position Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           __BG-27-0/BG-28-0, From BASIC__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     __BT-136/BT-141, From BASIC__ Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount __BT-137, From EN 16931__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     __BT-139/BT-144, From BASIC__ Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode __BT-140/BT-145, From BASIC__ Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    __BT-138, From EN 16931__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeSettlement()
            ?->unsetSpecifiedTradeAllowanceCharge();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount) || is_null($newChargeIndicator)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount) || is_null($newChargeIndicator)');
        }

        $this->addDocumentPositionAllowanceCharge(
            $newChargeIndicator,
            $newAllowanceChargeAmount,
            $newAllowanceChargeBaseAmount,
            $newAllowanceChargeReason,
            $newAllowanceChargeReasonCode,
            $newAllowanceChargePercent
        );

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add Document position Allowance/Charge
     *
     * @param  null|bool   $newChargeIndicator           __BG-27-0/BG-28-0, From BASIC__ Switch that indicates whether the following data refer to an surcharge or a discount, true means that this an charge
     * @param  null|float  $newAllowanceChargeAmount     __BT-136/BT-141, From BASIC__ Amount of the surcharge or discount
     * @param  null|float  $newAllowanceChargeBaseAmount __BT-137, From EN 16931__ The base amount that may be used in conjunction with the percentage of the surcharge or discount
     * @param  null|string $newAllowanceChargeReason     __BT-139/BT-144, From BASIC__ Reason given in text form for the surcharge or discount
     * @param  null|string $newAllowanceChargeReasonCode __BT-140/BT-145, From BASIC__ Reason given as a code for the surcharge or discount
     * @param  null|float  $newAllowanceChargePercent    __BT-138, From EN 16931__ Percentage that may be used, in conjunction with the document level allowance base amount, to calculate the document level allowance or charge amount. To state 20%, use value 20
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
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount) || is_null($newChargeIndicator)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeAmount) || is_null($newChargeIndicator)');
        }

        $allowanceCharge = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeSettlementWithCreate()
            ->addToSpecifiedTradeAllowanceChargeWithCreate();

        $allowanceCharge->getChargeIndicatorWithCreate()->setIndicator($newChargeIndicator);
        $allowanceCharge->getActualAmountWithCreate()->setValue($newAllowanceChargeAmount);

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargeBaseAmount)) {
            $allowanceCharge->getBasisAmountWithCreate()->setValue($newAllowanceChargeBaseAmount);
        }

        if ($this->supportsAtLeastEn16931() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newAllowanceChargePercent)) {
            $allowanceCharge->getCalculationPercentWithCreate()->setValue($newAllowanceChargePercent);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAllowanceChargeReason)) {
            $allowanceCharge->getReasonWithCreate()->setValue($newAllowanceChargeReason);
        }

        if (!InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAllowanceChargeReasonCode)) {
            $allowanceCharge->getReasonCodeWithCreate()->setValue($newAllowanceChargeReasonCode);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set the document position summation
     *
     * @param  null|float $newNetAmount           __BT-131, From BASIC__ Net amount
     * @param  null|float $newChargeTotalAmount   __BT-X-327, From EXTENDED__ Sum of the charges
     * @param  null|float $newDiscountTotalAmount __BT-X-328, From EXTENDED__ Sum of the discounts
     * @param  null|float $newTaxTotalAmount      __BT-X-329, From EXTENDED__ Total amount of the line (in the invoice currency)
     * @param  null|float $newGrossAmount         __BT-X-330, From EXTENDED__ Total invoice line amount including sales tax
     * @return static
     */
    public function setDocumentPositionSummation(
        ?float $newNetAmount = null,
        ?float $newChargeTotalAmount = null,
        ?float $newDiscountTotalAmount = null,
        ?float $newTaxTotalAmount = null,
        ?float $newGrossAmount = null,
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeSettlement()
            ?->unsetSpecifiedTradeSettlementLineMonetarySummation();

        if ($this->supportsNotAtLeastBasicWithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newNetAmount)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'floatIsNullOrEmpty', 'InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newNetAmount)');
        }

        $positionSummation = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeSettlementWithCreate()
            ->getSpecifiedTradeSettlementLineMonetarySummationWithCreate();

        $positionSummation->getLineTotalAmountWithCreate()->setValue($newNetAmount);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newChargeTotalAmount)) {
            $positionSummation->getChargeTotalAmountWithCreate()->setValue($newChargeTotalAmount);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newDiscountTotalAmount)) {
            $positionSummation->getAllowanceTotalAmountWithCreate()->setValue($newDiscountTotalAmount);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newTaxTotalAmount)) {
            $positionSummation->getTaxTotalAmountWithCreate()->setValue($newTaxTotalAmount);
        }

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteFloatUtils::floatIsNullOrEmpty($newGrossAmount)) {
            $positionSummation->getGrandTotalAmountWithCreate()->setValue($newGrossAmount);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Set a position's posting reference
     *
     * @param  null|string $newType      __BT-X-99, From EXTENDED__ Type of the posting reference
     * @param  null|string $newAccountId __BT-133, From EN 16931__ Posting reference of the byuer
     * @return static
     */
    public function setDocumentPositionPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransaction()
            ?->getLatestIncludedSupplyChainTradeLineItem()
            ?->getSpecifiedLineTradeSettlement()
            ?->unsetReceivableSpecifiedTradeAccountingAccount();

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)');
        }

        $this->addDocumentPositionPostingReference($newType, $newAccountId);

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Add a position's posting reference
     *
     * @param  null|string $newType      __BT-X-99, From EXTENDED__ Type of the posting reference
     * @param  null|string $newAccountId __BT-133, From EN 16931__ Posting reference of the byuer
     * @return static
     */
    public function addDocumentPositionPostingReference(
        ?string $newType = null,
        ?string $newAccountId = null
    ): static {
        $this->traceMethodEnter(__METHOD__);

        if ($this->supportsNotAtLeastEn16931WithTrace(__METHOD__)) {
            return $this;
        }

        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)) {
            return $this->traceMethodEarlyExit(__METHOD__, 'stringIsNullOrEmpty', 'InvoiceSuiteStringUtils::stringIsNullOrEmpty($newAccountId)');
        }

        if ($this->supportsNotAtLeastExtended()) {
            $this
                ->getCrossIndustryRootObject()
                ->getSupplyChainTradeTransaction()
                ?->getLatestIncludedSupplyChainTradeLineItem()
                ?->getSpecifiedLineTradeSettlement()
                ?->unsetReceivableSpecifiedTradeAccountingAccount();
        }

        $tradeAccountingAccount = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getLatestIncludedSupplyChainTradeLineItemWithCreate()
            ->getSpecifiedLineTradeSettlementWithCreate()
            ->addToReceivableSpecifiedTradeAccountingAccountWithCreate();

        $tradeAccountingAccount->getIDWithCreate()->setValue($newAccountId);

        if ($this->supportsAtLeastExtended() && !InvoiceSuiteStringUtils::stringIsNullOrEmpty($newType)) {
            $tradeAccountingAccount->getTypeCodeWithCreate()->setValue($newType);
        }

        $this->traceMethodExit(__METHOD__);

        return $this;
    }

    /**
     * Returns the root object as a CrossIndustryInvoiceType
     *
     * @return CrossIndustryInvoiceType
     */
    protected function getCrossIndustryRootObject(): CrossIndustryInvoiceType
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
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getInvoiceCurrencyCode()?->getValue();

        $taxCurrencyCode = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getTaxCurrencyCode()?->getValue();

        // Update summation

        $summation = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradeSettlementHeaderMonetarySummation();

        if (!is_null($summation)) {
            $taxTotalAmounts = $summation->getTaxTotalAmount();

            if (!is_null($taxTotalAmounts)) {
                $taxTotalAmount1 = $taxTotalAmounts[0] ?? null;
                $taxTotalAmount2 = $taxTotalAmounts[1] ?? null;

                if (!is_null($taxTotalAmount1)) {
                    $taxTotalAmount1->setCurrencyID($invoiceCurrencyCode);
                }

                if (!is_null($taxTotalAmount2)) {
                    $taxTotalAmount2->setCurrencyID($taxCurrencyCode);
                }
            }
        }

        return $this;
    }

    /**
     * Update Direct Debit Mandate
     *
     * @return static
     */
    private function updateMandates(): static
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($this->getKeyValuePair('mandantefrompaymentmean', ''))) {
            return $this;
        }

        $paymentTerms = $this
            ->getCrossIndustryRootObject()
            ->getSupplyChainTradeTransactionWithCreate()
            ->getApplicableHeaderTradeSettlementWithCreate()
            ->getSpecifiedTradePaymentTerms() ?? [];

        $paymentTerms = array_filter(
            $paymentTerms,
            static fn (TradePaymentTermsType $paymentTerm) => InvoiceSuiteStringUtils::stringIsNullOrEmpty(
                $paymentTerm->getDirectDebitMandateID()?->getValue()
            )
        );

        foreach ($paymentTerms as $paymentTerm) {
            $paymentTerm
                ->getDirectDebitMandateIDWithCreate()
                ->setValue($this->getKeyValuePair('mandantefrompaymentmean', ''));
        }

        return $this;
    }
}
