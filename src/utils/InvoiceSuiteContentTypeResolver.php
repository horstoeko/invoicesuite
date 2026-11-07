<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\utils;

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
    public static function resolveContentType(
        string $fromContent
    ): ?InvoiceSuiteContentType {
        if (InvoiceSuiteStringUtils::isJsonString($fromContent)) {
            return InvoiceSuiteContentType::JSON;
        }

        if (InvoiceSuiteStringUtils::isXmlString($fromContent)) {
            return InvoiceSuiteContentType::XML;
        }

        return null;
    }
}
