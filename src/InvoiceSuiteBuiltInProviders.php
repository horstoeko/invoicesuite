<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite;

/**
 * Constants for all bundled document format providers.
 *
 * Note:
 * This class only contains the providers shipped with the library.
 * Custom/third-party providers must still be passed as string unique IDs.
 *
 * @category InvoiceSuite
 * @author   horstoeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 */
final class InvoiceSuiteBuiltInProviders
{
    /**
     * Provider unique ID for ZUGFeRD / Factur-X Minimum profile.
     *
     * @var string
     */
    public const ZFFX_MINIMUM = 'zffxminimum';

    /**
     * Provider unique ID for ZUGFeRD / Factur-X Basic WL profile.
     *
     * @var string
     */
    public const ZFFX_BASIC_WL = 'zffxbasicwl';

    /**
     * Provider unique ID for ZUGFeRD / Factur-X Basic profile.
     *
     * @var string
     */
    public const ZFFX_BASIC = 'zffxbasic';

    /**
     * Provider unique ID for ZUGFeRD / Factur-X Comfort profile.
     *
     * @var string
     */
    public const ZFFX_COMFORT = 'zffxcomfort';

    /**
     * Provider unique ID for ZUGFeRD / Factur-X Extended profile.
     *
     * @var string
     */
    public const ZFFX_EXTENDED = 'zffxextended';

    /**
     * Provider unique ID for XRechnung in CII syntax.
     *
     * @var string
     */
    public const XRECHNUNG_CII = 'xrechnungcii';

    /**
     * Provider unique ID for XRechnung UBL invoice documents.
     *
     * @var string
     */
    public const XRECHNUNG_UBL_INVOICE = 'xrechnungublinvoice';

    /**
     * Provider unique ID for XRechnung UBL credit note documents.
     *
     * @var string
     */
    public const XRECHNUNG_UBL_CREDIT_NOTE = 'xrechnungublcreditnote';

    /**
     * Provider unique ID for Peppol BIS Billing 3.0 invoice documents.
     *
     * @var string
     */
    public const PEPPOL_30_INVOICE = 'peppol30invoice';

    /**
     * Provider unique ID for Peppol BIS Billing 3.0 credit note documents.
     *
     * @var string
     */
    public const PEPPOL_30_CREDIT_NOTE = 'peppol30creditnote';

    /**
     * Provider unique ID for FatturaPA documents.
     *
     * @var string
     */
    public const FATTURA_PA = 'fatturapa';

    /**
     * Prevent instantiation.
     */
    private function __construct() {}

    /**
     * Returns all bundled provider unique IDs.
     *
     * @return array<int, string>
     */
    public static function all(): array
    {
        return [
            self::ZFFX_MINIMUM,
            self::ZFFX_BASIC_WL,
            self::ZFFX_BASIC,
            self::ZFFX_COMFORT,
            self::ZFFX_EXTENDED,
            self::XRECHNUNG_CII,
            self::XRECHNUNG_UBL_INVOICE,
            self::XRECHNUNG_UBL_CREDIT_NOTE,
            self::PEPPOL_30_INVOICE,
            self::PEPPOL_30_CREDIT_NOTE,
            self::FATTURA_PA,
        ];
    }
}
