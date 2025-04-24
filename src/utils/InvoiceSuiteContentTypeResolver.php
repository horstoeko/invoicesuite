<?php

namespace horstoeko\invoicesuite\utils;

use RuntimeException;
use Throwable;
use SimpleXMLElement;

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
     *Test that $fromContent is a valid XML
     *
     * @param string $fromContent
     * @return bool
     */
    private static function isValidXml(string $fromContent): bool
    {
        $prevUseInternalErrors = \libxml_use_internal_errors(true);

        try {
            libxml_clear_errors();

            new SimpleXMLElement($fromContent);

            if (libxml_get_last_error()) {
                throw new RuntimeException();
            }

            return true;
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
    private static function isValidJson(string $fromContent): bool
    {
        try {
            json_decode($fromContent, false, 512, JSON_THROW_ON_ERROR);
            return true;
        } catch (Throwable $throwable) {
            return false;
        }
    }
}
