<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\dto;

use horstoeko\invoicesuite\exceptions\InvoiceSuiteInvalidArgumentException;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use horstoeko\invoicesuite\utils\InvoiceSuiteAttachment;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

/**
 * Handle invoice DTO attachments during JSON serialization and deserialization.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteDocumentDTOSerializerAttachmentHandler implements SubscribingHandlerInterface
{
    /**
     * Register both JSON directions for invoice attachments.
     *
     * @return list<array{direction: 1|2, format: string, type: string, method: string}>
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => InvoiceSuiteAttachment::class,
                'method' => 'serializeAttachment',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => InvoiceSuiteAttachment::class,
                'method' => 'deserializeAttachment',
            ],
        ];
    }

    /**
     * Serialize a URL or embedded file attachment.
     *
     * @param  JsonSerializationVisitor                                                $visitor
     * @param  InvoiceSuiteAttachment                                                  $attachment
     * @return array{filename: false|string, contentBase64: string}|array{url: string}
     */
    public function serializeAttachment(
        JsonSerializationVisitor $visitor,
        InvoiceSuiteAttachment $attachment
    ): array {
        return $attachment->isUrlAttachment()
            ? ['url' => $attachment->getRawContent()]
            : ['filename' => $attachment->getFilename(), 'contentBase64' => $attachment->getContent()];
    }

    /**
     * Reconstruct an attachment from the decoded JSON value.
     *
     * @param  JsonDeserializationVisitor $visitor
     * @param  mixed                      $attachmentData
     * @return InvoiceSuiteAttachment
     *
     * @throws InvoiceSuiteInvalidArgumentException
     */
    public function deserializeAttachment(
        JsonDeserializationVisitor $visitor,
        mixed $attachmentData
    ): InvoiceSuiteAttachment {
        if (InvoiceSuiteArrayUtils::is($attachmentData) && InvoiceSuiteStringUtils::is($attachmentData['url'] ?? null)) {
            return InvoiceSuiteAttachment::fromUrl($attachmentData['url']);
        }

        if (InvoiceSuiteArrayUtils::is($attachmentData) && InvoiceSuiteStringUtils::is($attachmentData['filename'] ?? null) && InvoiceSuiteStringUtils::is($attachmentData['contentBase64'] ?? null)) {
            return InvoiceSuiteAttachment::fromBase64String($attachmentData['contentBase64'], $attachmentData['filename']);
        }

        throw new InvoiceSuiteInvalidArgumentException('Invalid attachment in invoice DTO JSON');
    }
}
