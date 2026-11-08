<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Exception\RuntimeException as JMSSerializerRuntimeException;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\HandlerRegistryInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
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
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                    InvoiceSuiteAttachment::class,
                    'json',
                    static fn (JsonSerializationVisitor $visitor, InvoiceSuiteAttachment $attachment): array => $attachment->isUrlAttachment()
                        ? ['url' => $attachment->getRawContent()]
                        : ['filename' => $attachment->getFilename(), 'contentBase64' => $attachment->getContent()]
                );
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                    InvoiceSuiteAttachment::class,
                    'json',
                    static function (JsonDeserializationVisitor $visitor, mixed $data): InvoiceSuiteAttachment {
                        if (InvoiceSuiteArrayUtils::is($data) && InvoiceSuiteStringUtils::is($data['url'] ?? null)) {
                            return InvoiceSuiteAttachment::fromUrl($data['url']);
                        }

                        if (InvoiceSuiteArrayUtils::is($data) && InvoiceSuiteStringUtils::is($data['filename'] ?? null) && InvoiceSuiteStringUtils::is($data['contentBase64'] ?? null)) {
                            return InvoiceSuiteAttachment::fromBase64String($data['contentBase64'], $data['filename']);
                        }

                        throw new InvoiceSuiteInvalidArgumentException('Invalid attachment in invoice DTO JSON');
                    }
                );
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
     * @param  string                        $json The JSON representation of the DTO
     * @return InvoiceSuiteDocumentHeaderDTO The reconstructed document DTO
     *
     * @throws InvoiceSuiteInvalidArgumentException If the document or an attachment is invalid
     * @throws JMSSerializerRuntimeException
     */
    public function deserialize(string $json): InvoiceSuiteDocumentHeaderDTO
    {
        $document = $this->serializer->deserialize($json, InvoiceSuiteDocumentHeaderDTO::class, 'json');

        if (!$document instanceof InvoiceSuiteDocumentHeaderDTO) {
            throw new InvoiceSuiteInvalidArgumentException('Expected an invoice DTO in JSON');
        }

        return $document;
    }
}
