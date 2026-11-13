<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use JMS\Serializer\Exception\RuntimeException as JMSSerializerRuntimeException;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

/**
 * Serialize invoice DTOs to JSON independently of the invoice format.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentDTOSerializer
{
    /**
     * The JMS serializer configured for invoice DTOs.
     *
     * @var SerializerInterface
     */
    private readonly SerializerInterface $serializer;

    /**
     * Configure JSON handling for invoice attachments.
     */
    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()
            ->addDefaultHandlers()
            ->configureHandlers(static function (HandlerRegistryInterface $registry): void {
                $registry->registerSubscribingHandler(new InvoiceSuiteDocumentDTOSerializerAttachmentHandler());
            })
            ->build();
    }

    /**
     * Serialize a document DTO to JSON.
     *
     * @param  InvoiceSuiteDocumentHeaderDTO $document The document DTO
     * @return string                        The JSON representation of the DTO
     *
     * @throws JMSSerializerRuntimeException
     */
    public function serialize(InvoiceSuiteDocumentHeaderDTO $document): string
    {
        return $this->serializer->serialize($document, 'json', SerializationContext::create()->setSerializeNull(true));
    }

    /**
     * Reconstruct a document DTO from JSON.
     *
     * @param  string                        $document The JSON representation of the DTO
     * @return InvoiceSuiteDocumentHeaderDTO The reconstructed document DTO
     *
     * @throws InvoiceSuiteInvalidArgumentException If the document or an attachment is invalid
     * @throws JMSSerializerRuntimeException
     */
    public function deserialize(string $document): InvoiceSuiteDocumentHeaderDTO
    {
        $document = $this->serializer->deserialize($document, InvoiceSuiteDocumentHeaderDTO::class, 'json');

        if (!$document instanceof InvoiceSuiteDocumentHeaderDTO) {
            throw new InvoiceSuiteInvalidArgumentException('Expected an invoice DTO in JSON');
        }

        return $document;
    }
}
