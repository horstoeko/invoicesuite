<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\tests\testcases\documentdto;

use DateTime;
use DateTimeInterface;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAddressDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteAllowanceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteCommunicationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteContactDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDateRangeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentDtoSerializer;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentHeaderDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteDocumentPositionDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteIdDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteMeasureDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteNoteDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteOrganisationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePartyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentMeanDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDiscountDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePaymentTermPenaltyDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePeriodDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceGrossDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitePriceNetDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductCharacteristicDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductClassificationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteProjectDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteQuantityDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceDocumentLineExtDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteReferenceProductDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteServiceChargeDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSpecifiedAdvancePaymentDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteSummationDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuitesummationLineDTO;
use horstoeko\invoicesuite\documents\dto\InvoiceSuiteTaxDTO;
use horstoeko\invoicesuite\tests\TestCase;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteFileUtils;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use JsonSerializable;

final class InvoiceSuiteDocumentDtoSerializerTest extends TestCase
{
    /**
     * @var array<class-string<JsonSerializable>, JsonSerializable>
     */
    private array $dtoFixtures;

    private InvoiceSuiteDocumentDtoSerializer $documentSerializer;

    private SerializerInterface $serializer;

    /**
     * {@inheritDoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->dtoFixtures = $this->createDtoFixtures();
        $this->documentSerializer = new InvoiceSuiteDocumentDtoSerializer();

        // The public serializer accepts document headers. Test each DTO with the same JMS configuration.
        $this->serializer = $this->getPrivatePropertyFromObject($this->documentSerializer, 'serializer')->getValue($this->documentSerializer);
    }

    public function testSerializeAddressDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteAddressDTO::class);
    }

    public function testDeserializeAddressDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteAddressDTO::class);
    }

    public function testSerializeAllowanceChargeDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteAllowanceChargeDTO::class);
    }

    public function testDeserializeAllowanceChargeDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteAllowanceChargeDTO::class);
    }

    public function testSerializeCommunicationDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteCommunicationDTO::class);
    }

    public function testDeserializeCommunicationDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteCommunicationDTO::class);
    }

    public function testSerializeContactDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteContactDTO::class);
    }

    public function testDeserializeContactDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteContactDTO::class);
    }

    public function testSerializeDateRangeDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteDateRangeDTO::class);
    }

    public function testDeserializeDateRangeDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteDateRangeDTO::class);
    }

    public function testSerializeDocumentHeaderDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteDocumentHeaderDTO::class);
    }

    public function testDeserializeDocumentHeaderDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteDocumentHeaderDTO::class);
    }

    public function testSerializeDocumentPositionDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteDocumentPositionDTO::class);
    }

    public function testDeserializeDocumentPositionDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteDocumentPositionDTO::class);
    }

    public function testSerializeIdDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteIdDTO::class);
    }

    public function testDeserializeIdDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteIdDTO::class);
    }

    public function testSerializeMeasureDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteMeasureDTO::class);
    }

    public function testDeserializeMeasureDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteMeasureDTO::class);
    }

    public function testSerializeNoteDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteNoteDTO::class);
    }

    public function testDeserializeNoteDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteNoteDTO::class);
    }

    public function testSerializeOrganisationDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteOrganisationDTO::class);
    }

    public function testDeserializeOrganisationDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteOrganisationDTO::class);
    }

    public function testSerializePartyDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePartyDTO::class);
    }

    public function testDeserializePartyDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePartyDTO::class);
    }

    public function testSerializePaymentMeanDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePaymentMeanDTO::class);
    }

    public function testDeserializePaymentMeanDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePaymentMeanDTO::class);
    }

    public function testSerializePaymentTermDiscountDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePaymentTermDiscountDTO::class);
    }

    public function testDeserializePaymentTermDiscountDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePaymentTermDiscountDTO::class);
    }

    public function testSerializePaymentTermDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePaymentTermDTO::class);
    }

    public function testDeserializePaymentTermDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePaymentTermDTO::class);
    }

    public function testSerializePaymentTermPenaltyDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePaymentTermPenaltyDTO::class);
    }

    public function testDeserializePaymentTermPenaltyDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePaymentTermPenaltyDTO::class);
    }

    public function testSerializePeriodDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePeriodDTO::class);
    }

    public function testDeserializePeriodDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePeriodDTO::class);
    }

    public function testSerializePriceDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePriceDTO::class);
    }

    public function testDeserializePriceDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePriceDTO::class);
    }

    public function testSerializePriceGrossDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePriceGrossDTO::class);
    }

    public function testDeserializePriceGrossDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePriceGrossDTO::class);
    }

    public function testSerializePriceNetDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitePriceNetDTO::class);
    }

    public function testDeserializePriceNetDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitePriceNetDTO::class);
    }

    public function testSerializeProductCharacteristicDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteProductCharacteristicDTO::class);
    }

    public function testDeserializeProductCharacteristicDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteProductCharacteristicDTO::class);
    }

    public function testSerializeProductClassificationDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteProductClassificationDTO::class);
    }

    public function testDeserializeProductClassificationDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteProductClassificationDTO::class);
    }

    public function testSerializeProductDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteProductDTO::class);
    }

    public function testDeserializeProductDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteProductDTO::class);
    }

    public function testSerializeProjectDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteProjectDTO::class);
    }

    public function testDeserializeProjectDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteProjectDTO::class);
    }

    public function testSerializeQuantityDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteQuantityDTO::class);
    }

    public function testDeserializeQuantityDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteQuantityDTO::class);
    }

    public function testSerializeReferenceDocumentDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteReferenceDocumentDTO::class);
    }

    public function testDeserializeReferenceDocumentDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteReferenceDocumentDTO::class);
    }

    public function testSerializeReferenceDocumentExtDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteReferenceDocumentExtDTO::class);
    }

    public function testDeserializeReferenceDocumentExtDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteReferenceDocumentExtDTO::class);
    }

    public function testSerializeReferenceDocumentLineDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteReferenceDocumentLineDTO::class);
    }

    public function testDeserializeReferenceDocumentLineDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteReferenceDocumentLineDTO::class);
    }

    public function testSerializeReferenceDocumentLineExtDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteReferenceDocumentLineExtDTO::class);
    }

    public function testDeserializeReferenceDocumentLineExtDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteReferenceDocumentLineExtDTO::class);
    }

    public function testSerializeReferenceProductDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteReferenceProductDTO::class);
    }

    public function testDeserializeReferenceProductDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteReferenceProductDTO::class);
    }

    public function testSerializeServiceChargeDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteServiceChargeDTO::class);
    }

    public function testDeserializeServiceChargeDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteServiceChargeDTO::class);
    }

    public function testSerializeSpecifiedAdvancePaymentDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteSpecifiedAdvancePaymentDTO::class);
    }

    public function testDeserializeSpecifiedAdvancePaymentDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteSpecifiedAdvancePaymentDTO::class);
    }

    public function testSerializeSummationDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteSummationDTO::class);
    }

    public function testDeserializeSummationDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteSummationDTO::class);
    }

    public function testSerializeSummationLineDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuitesummationLineDTO::class);
    }

    public function testDeserializeSummationLineDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuitesummationLineDTO::class);
    }

    public function testSerializeTaxDTO(): void
    {
        $this->assertSerializeDto(InvoiceSuiteTaxDTO::class);
    }

    public function testDeserializeTaxDTO(): void
    {
        $this->assertDeserializeDto(InvoiceSuiteTaxDTO::class);
    }

    public function testCompleteInvoiceJsonRoundtrip(): void
    {
        $document = $this->dtoFixtures[InvoiceSuiteDocumentHeaderDTO::class];

        $this->assertInstanceOf(InvoiceSuiteDocumentHeaderDTO::class, $document);

        $expectedJsonValues = $this->normalizeJsonValue($document);
        $json = $this->documentSerializer->serialize($document);
        $decodedJson = json_decode($json, true, flags: JSON_THROW_ON_ERROR);

        $this->assertSame($expectedJsonValues, $this->normalizeJsonValue($decodedJson));

        $restoredDocument = $this->documentSerializer->deserialize($json);

        $this->assertEquals($document, $restoredDocument);
        $this->assertSame($expectedJsonValues, $this->normalizeJsonValue($restoredDocument));
        $this->assertSame($json, $this->documentSerializer->serialize($restoredDocument));
    }

    /**
     * Compare JMS output with the DTO's expected JSON values.
     *
     * @param class-string<JsonSerializable> $dtoClass The DTO to serialize
     */
    private function assertSerializeDto(string $dtoClass): void
    {
        $dto = $this->dtoFixtures[$dtoClass];
        $json = $this->serializer->serialize($dto, 'json', SerializationContext::create()->setSerializeNull(true));
        $decodedJson = json_decode($json, true, flags: JSON_THROW_ON_ERROR);

        $this->assertSame($this->normalizeJsonValue($dto), $this->normalizeJsonValue($decodedJson));
    }

    /**
     * Build input JSON from the fixture independently of JMS serialization and compare the restored DTO.
     *
     * @param class-string<JsonSerializable> $dtoClass The DTO to deserialize
     */
    private function assertDeserializeDto(string $dtoClass): void
    {
        $expectedDto = $this->dtoFixtures[$dtoClass];
        $expectedJsonValues = $this->normalizeJsonValue($expectedDto);
        $json = json_encode($expectedJsonValues, JSON_THROW_ON_ERROR | JSON_PRESERVE_ZERO_FRACTION);

        $restoredDto = $this->serializer->deserialize($json, $dtoClass, 'json');

        $this->assertInstanceOf($dtoClass, $restoredDto);
        $this->assertEquals($expectedDto, $restoredDto);
        $this->assertSame($expectedJsonValues, $this->normalizeJsonValue($restoredDto));
    }

    /**
     * Derive JSON values from the DTO data and sort object keys for comparison.
     *
     * @param  mixed $value An original DTO value or a decoded JSON value
     * @return mixed The comparable JSON value
     */
    private function normalizeJsonValue(mixed $value): mixed
    {
        if ($value instanceof DateTimeInterface) {
            return $value->format('Y-m-d\TH:i:s.uP');
        }

        if ($value instanceof InvoiceSuiteAttachment) {
            return $value->isUrlAttachment()
                ? ['url' => $value->getRawContent()]
                : ['contentBase64' => base64_encode($value->getRawContent()), 'filename' => $value->getFilename()];
        }

        if ($value instanceof JsonSerializable) {
            $value = $value->jsonSerialize();
        }

        if (InvoiceSuiteArrayUtils::is($value)) {
            ksort($value);

            return InvoiceSuiteArrayUtils::map($this->normalizeJsonValue(...), $value);
        }

        return $value;
    }

    /**
     * Build populated DTOs for the individual tests and the complete invoice.
     *
     * @return array<class-string<JsonSerializable>, JsonSerializable>
     */
    private function createDtoFixtures(): array
    {
        $invoiceDate = new DateTime('2026-01-02T09:15:00.123456+01:00');
        $deliveryDate = new DateTime('2026-01-05T10:30:00.654321+01:00');
        $dueDate = new DateTime('2026-01-31T00:00:00.000000+01:00');

        $address = new InvoiceSuiteAddressDTO('Main Street 12', 'Building B', 'Second floor', '10115', 'Berlin', 'DE', 'BE');
        $contact = new InvoiceSuiteContactDTO('Alex Meyer', 'Accounting', '+49305550100', '+49305550101', 'billing@example.org');
        $id = new InvoiceSuiteIdDTO('DE123456789', 'VA');
        $communication = new InvoiceSuiteCommunicationDTO('billing@example.org', 'EM');
        $organisation = new InvoiceSuiteOrganisationDTO('HRB12345', '0088', 'Example GmbH');
        $party = new InvoiceSuitePartyDTO(
            names: ['Example GmbH', 'Example Trading'],
            descriptions: ['Wholesale supplier'],
            roleCodes: ['SE'],
            ids: [new InvoiceSuiteIdDTO('SELLER-01', '91')],
            globalIds: [new InvoiceSuiteIdDTO('4000001000005', '0088')],
            taxRegistrations: [$id],
            addresses: [$address],
            legalOrganisations: [$organisation],
            contacts: [$contact],
            communications: [$communication]
        );

        $dateRange = new InvoiceSuiteDateRangeDTO($invoiceDate, $deliveryDate, 'Billing period');
        $note = new InvoiceSuiteNoteDTO('Deliver to the goods entrance.', 'DEL', 'AAI');
        $period = new InvoiceSuitePeriodDTO(10.0, 'DAY');
        $discountTerm = new InvoiceSuitePaymentTermDiscountDTO(100.0, 2.0, 2.0, $invoiceDate, $period);
        $penaltyTerm = new InvoiceSuitePaymentTermPenaltyDTO(100.0, 1.5, 1.5, $dueDate, new InvoiceSuitePeriodDTO(5.0, 'DAY'));
        $paymentTerm = new InvoiceSuitePaymentTermDTO('Due within 30 days', $dueDate, [$discountTerm], [$penaltyTerm], 'MANDATE-1');
        $paymentMean = new InvoiceSuitePaymentMeanDTO(
            typeCode: '58',
            name: 'Credit transfer',
            financialCardId: '1234567890',
            financialCardHolder: 'Alex Meyer',
            buyerIban: 'DE89370400440532013000',
            payeeIban: 'DE12500105170648489890',
            payeeAccountName: 'Example GmbH',
            payeeProprietaryId: 'PAYEE-01',
            payeeBic: 'INGDDEFFXXX',
            paymentReference: 'PAY-01',
            mandate: 'MANDATE-1',
            buyerAccountName: 'Buyer AG'
        );
        $project = new InvoiceSuiteProjectDTO('PR-2026-01', 'Warehouse refit');

        $referenceDocument = new InvoiceSuiteReferenceDocumentDTO('REF-001', $invoiceDate);
        $referenceDocumentLine = new InvoiceSuiteReferenceDocumentLineDTO('ORDER-004', '3', $deliveryDate);
        $pdfContent = InvoiceSuiteFileUtils::getContentFromFile(__DIR__ . '/../../assets/pdf_plain.pdf');
        $referenceDocumentExt = new InvoiceSuiteReferenceDocumentExtDTO(
            'ATTACHMENT-001',
            $deliveryDate,
            '916',
            'ABZ',
            'PDF specification',
            InvoiceSuiteAttachment::fromBase64String(base64_encode($pdfContent), 'pdf_plain.pdf')
        );
        $referenceDocumentLineExt = new InvoiceSuiteReferenceDocumentLineExtDTO(
            'ATTACHMENT-002',
            '7',
            $deliveryDate,
            '916',
            'ABZ',
            'Online specification',
            InvoiceSuiteAttachment::fromUrl('https://example.org/specification.pdf')
        );

        $tax = new InvoiceSuiteTaxDTO('S', 'VAT', 100.0, 19.0, 19.0, 'Tax note', 'VATEX-EU-132', $dueDate, '5');
        $allowanceCharge = new InvoiceSuiteAllowanceChargeDTO(false, 5.0, 100.0, 5.0, 'S', 'VAT', 19.0, 'Volume discount', '95');
        $serviceCharge = new InvoiceSuiteServiceChargeDTO(4.25, 'Handling', 'S', 'VAT', 19.0);
        $advancePayment = new InvoiceSuiteSpecifiedAdvancePaymentDTO(20.0, $invoiceDate, [$tax], $referenceDocumentExt);
        $summation = new InvoiceSuiteSummationDTO(100.0, 4.25, 5.0, 99.25, 18.86, 20.0, 118.11, 98.12, 20.0, 0.01);
        $summationLine = new InvoiceSuitesummationLineDTO(100.0, 4.25, 5.0, 18.86, 118.11);

        $quantity = new InvoiceSuiteQuantityDTO(2.0, 'C62');
        $price = new InvoiceSuitePriceDTO(50.0, $quantity);
        $grossPrice = new InvoiceSuitePriceGrossDTO(55.0, $quantity, [$allowanceCharge]);
        $netPrice = new InvoiceSuitePriceNetDTO(50.0, $quantity, [$tax]);
        $measure = new InvoiceSuiteMeasureDTO(2.5, 'KGM');
        $characteristic = new InvoiceSuiteProductCharacteristicDTO('Weight', '2.5', 'MASS', $measure);
        $classification = new InvoiceSuiteProductClassificationDTO('24102004', 'Storage rack', 'TST', '1.0');
        $referenceProduct = new InvoiceSuiteReferenceProductDTO(
            'COMPONENT-1',
            'Mounting kit',
            'Includes screws',
            'SELLER-KIT',
            'BUYER-KIT',
            new InvoiceSuiteIdDTO('4000001000029', '0160'),
            'IND-KIT',
            new InvoiceSuiteQuantityDTO(4.0, 'C62')
        );
        $product = new InvoiceSuiteProductDTO(
            id: 'PRODUCT-1',
            name: 'Storage rack',
            description: 'Galvanized steel',
            sellerId: 'SELLER-RACK',
            buyerId: 'BUYER-RACK',
            globalId: new InvoiceSuiteIdDTO('4000001000012', '0160'),
            industryId: 'IND-RACK',
            modelId: 'MODEL-1',
            batchId: 'BATCH-42',
            brandName: 'Example',
            modelName: 'Rack XL',
            originTradeCountry: 'DE',
            characteristics: [$characteristic],
            classifications: [$classification],
            referenceProducts: [$referenceProduct]
        );
        $position = new InvoiceSuiteDocumentPositionDTO(
            lineId: '1',
            parentLineId: '0',
            lineStatus: 'A',
            lineStatusReason: 'Confirmed',
            note: [$note],
            product: $product,
            sellerOrderReferences: [(clone $referenceDocumentLine)->setReferenceNumber('LINE-SELLER-ORDER')],
            buyerOrderReferences: [$referenceDocumentLine],
            quotationReferences: [(clone $referenceDocumentLine)->setReferenceNumber('LINE-QUOTE')],
            contractReferences: [(clone $referenceDocumentLine)->setReferenceNumber('LINE-CONTRACT')],
            additionalReferences: [$referenceDocumentLineExt],
            ultimateCustomerOrderReferences: [(clone $referenceDocumentLine)->setReferenceNumber('LINE-END-CUSTOMER')],
            despatchAdviceReferences: [(clone $referenceDocumentLine)->setReferenceNumber('LINE-DESPATCH')],
            receivingAdviceReferences: [(clone $referenceDocumentLine)->setReferenceNumber('LINE-RECEIPT')],
            deliveryNoteReferences: [(clone $referenceDocumentLine)->setReferenceNumber('LINE-DELIVERY')],
            invoiceReferences: [(clone $referenceDocumentLineExt)->setReferenceNumber('LINE-INVOICE')],
            additionalObjectReferences: [$referenceDocumentExt],
            grossPrice: $grossPrice,
            netPrice: $netPrice,
            quantityBilled: $quantity,
            quantityChargeFree: new InvoiceSuiteQuantityDTO(0.0, 'C62'),
            quantityPackage: new InvoiceSuiteQuantityDTO(1.0, 'XBX'),
            quantityPerPackage: new InvoiceSuiteQuantityDTO(2.0, 'C62'),
            shipToParty: (clone $party)->addName('Warehouse'),
            ultimateShipToParty: (clone $party)->addName('Final warehouse'),
            supplyChainEvents: [$deliveryDate],
            billingPeriods: [$dateRange],
            postingReferences: [new InvoiceSuiteIdDTO('LINE-POSTING', '91')],
            taxes: [$tax],
            allowanceCharges: [$allowanceCharge],
            summation: $summationLine
        );
        $document = new InvoiceSuiteDocumentHeaderDTO(
            number: 'INV-2026-001',
            type: '380',
            description: 'Storage rack invoice',
            language: 'en',
            date: $invoiceDate,
            completeDate: $deliveryDate,
            supplyChainEvents: [$invoiceDate, $deliveryDate],
            currency: 'EUR',
            taxCurrency: 'USD',
            isCopy: false,
            isTest: true,
            notes: [$note, new InvoiceSuiteNoteDTO('Thank you.', 'TXT', 'AAI')],
            billingPeriods: [$dateRange],
            postingReferences: [new InvoiceSuiteIdDTO('POSTING-01', '91')],
            sellerOrderReferences: [(clone $referenceDocument)->setReferenceNumber('SELLER-ORDER')],
            buyerOrderReferences: [$referenceDocument],
            quotationReferences: [(clone $referenceDocument)->setReferenceNumber('QUOTE')],
            contractReferences: [(clone $referenceDocument)->setReferenceNumber('CONTRACT')],
            additionalReferences: [$referenceDocumentExt],
            invoiceReferences: [(clone $referenceDocumentExt)->setReferenceNumber('PREVIOUS-INVOICE')],
            projectReferences: [$project],
            ultimateCustomerOrderReferences: [(clone $referenceDocument)->setReferenceNumber('END-CUSTOMER-ORDER')],
            despatchAdviceReferences: [(clone $referenceDocument)->setReferenceNumber('DESPATCH')],
            receivingAdviceReferences: [(clone $referenceDocument)->setReferenceNumber('RECEIPT')],
            deliveryNoteReferences: [(clone $referenceDocument)->setReferenceNumber('DELIVERY')],
            sellerParty: $party,
            buyerParty: (clone $party)->addName('Buyer AG'),
            sellerTaxRepresentativeParty: (clone $party)->addName('Seller tax representative'),
            buyerTaxRepresentativeParty: (clone $party)->addName('Buyer tax representative'),
            salesAgentParty: (clone $party)->addName('Sales agent'),
            buyerAgentParty: (clone $party)->addName('Buyer agent'),
            productEndUserParty: (clone $party)->addName('End user'),
            shipToParty: (clone $party)->addName('Ship to'),
            ultimateShipToParty: (clone $party)->addName('Ultimate ship to'),
            shipFromParty: (clone $party)->addName('Ship from'),
            invoicerParty: (clone $party)->addName('Invoicer'),
            invoiceeParty: (clone $party)->addName('Invoicee'),
            payeeParty: (clone $party)->addName('Payee'),
            payerParty: (clone $party)->addName('Payer'),
            paymentMeans: [$paymentMean],
            paymentTerms: [$paymentTerm],
            creditorReferences: [new InvoiceSuiteIdDTO('CREDITOR-01', '91')],
            paymentReferences: [new InvoiceSuiteIdDTO('PAYMENT-01', '91')],
            buyerReferences: [new InvoiceSuiteIdDTO('BUYER-REF-01', '92')],
            positions: [$position, (clone $position)->setLineId('2')],
            deliveryTerms: [new InvoiceSuiteIdDTO('DAP', 'INCOTERMS')],
            taxes: [$tax],
            allowanceCharges: [$allowanceCharge],
            serviceCharges: [$serviceCharge],
            summations: [$summation],
            specifiedAdvancePayments: [$advancePayment]
        );

        return [
            InvoiceSuiteAddressDTO::class => $address,
            InvoiceSuiteAllowanceChargeDTO::class => $allowanceCharge,
            InvoiceSuiteCommunicationDTO::class => $communication,
            InvoiceSuiteContactDTO::class => $contact,
            InvoiceSuiteDateRangeDTO::class => $dateRange,
            InvoiceSuiteDocumentHeaderDTO::class => $document,
            InvoiceSuiteDocumentPositionDTO::class => $position,
            InvoiceSuiteIdDTO::class => $id,
            InvoiceSuiteMeasureDTO::class => $measure,
            InvoiceSuiteNoteDTO::class => $note,
            InvoiceSuiteOrganisationDTO::class => $organisation,
            InvoiceSuitePartyDTO::class => $party,
            InvoiceSuitePaymentMeanDTO::class => $paymentMean,
            InvoiceSuitePaymentTermDTO::class => $paymentTerm,
            InvoiceSuitePaymentTermDiscountDTO::class => $discountTerm,
            InvoiceSuitePaymentTermPenaltyDTO::class => $penaltyTerm,
            InvoiceSuitePeriodDTO::class => $period,
            InvoiceSuitePriceDTO::class => $price,
            InvoiceSuitePriceGrossDTO::class => $grossPrice,
            InvoiceSuitePriceNetDTO::class => $netPrice,
            InvoiceSuiteProductCharacteristicDTO::class => $characteristic,
            InvoiceSuiteProductClassificationDTO::class => $classification,
            InvoiceSuiteProductDTO::class => $product,
            InvoiceSuiteProjectDTO::class => $project,
            InvoiceSuiteQuantityDTO::class => $quantity,
            InvoiceSuiteReferenceDocumentDTO::class => $referenceDocument,
            InvoiceSuiteReferenceDocumentExtDTO::class => $referenceDocumentExt,
            InvoiceSuiteReferenceDocumentLineDTO::class => $referenceDocumentLine,
            InvoiceSuiteReferenceDocumentLineExtDTO::class => $referenceDocumentLineExt,
            InvoiceSuiteReferenceProductDTO::class => $referenceProduct,
            InvoiceSuiteServiceChargeDTO::class => $serviceCharge,
            InvoiceSuiteSpecifiedAdvancePaymentDTO::class => $advancePayment,
            InvoiceSuiteSummationDTO::class => $summation,
            InvoiceSuitesummationLineDTO::class => $summationLine,
            InvoiceSuiteTaxDTO::class => $tax,
        ];
    }
}
