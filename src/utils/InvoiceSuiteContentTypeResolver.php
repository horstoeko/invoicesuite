<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

use DOMDocument;
use Throwable;

/**
 * class representing tools for getting the content type
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteContentTypeResolver
{
    /**
     * Get content type of a given content
     *
     * @param  string                       $fromContent
     * @return null|InvoiceSuiteContentType
     */
    public static function resolveContentType(string $fromContent): ?InvoiceSuiteContentType
    {
        if (static::isValidJson($fromContent)) {
            return InvoiceSuiteContentType::JSON;
        }

        if (static::isValidXml($fromContent)) {
            return InvoiceSuiteContentType::XML;
        }

        return null;
    }

    /**
     * Test that $fromContent is a valid XML
     *
     * @param  string $fromContent
     * @return bool
     */
    protected static function isValidXml(string $fromContent): bool
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($fromContent)) {
            return false;
        }

        $prevUseInternalErrors = \libxml_use_internal_errors(true);

        try {
            libxml_clear_errors();
            $doc = new DOMDocument();

            return $doc->loadXML($fromContent, LIBXML_NOERROR | LIBXML_NOWARNING);
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }
    }

    /**
     * Test that $fromContent is a valid JSON
     *
     * @param  string $fromContent
     * @return bool
     */
    protected static function isValidJson(string $fromContent): bool
    {
        if (InvoiceSuiteStringUtils::stringIsNullOrEmpty($fromContent)) {
            return false;
        }

        try {
            $jsonDecoded = json_decode($fromContent, false, 512, JSON_THROW_ON_ERROR);

            return is_object($jsonDecoded) || is_array($jsonDecoded);
        } catch (Throwable) {
            return false;
        }
    }
}
