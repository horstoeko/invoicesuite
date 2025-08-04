<?php

namespace horstoeko\invoicesuite\utils;

use DOMDocument;
use Throwable;

/**
 * class representing tools for getting the content type
 *
 * @category InvoiceSuite
 * @package  InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @link     https://github.com/horstoeko/invoicesuite
 */
class InvoiceSuiteContentTypeResolver
{
    /**
     * Result type for JSON
     */
    public const JSON = "json";

    /**
     * Result type for XML
     */
    public const XML = "xml";

    /**
     * Get content type. Returns "xml" or "json" or null
     *
     * @param string $fromContent
     * @return null|string
     */
    public static function resolveContentType(string $fromContent): ?string
    {
        if (static::isValidJson($fromContent)) {
            return static::JSON;
        }

        if (static::isValidXml($fromContent)) {
            return static::XML;
        }

        return null;
    }

    /**
     * Test that $fromContent is a valid XML
     * 
     * @param string $fromContent
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
            $success = $doc->loadXML($fromContent, LIBXML_NOERROR | LIBXML_NOWARNING);
            return $success;
        } catch (Throwable $throwable) {
            return false;
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($prevUseInternalErrors);
        }
    }

    /**
     * Test that $fromContent is a valid JSON
     *
     * @param string $fromContent
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
        } catch (Throwable $throwable) {
            return false;
        }
    }
}
