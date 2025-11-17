<?php

/**
 * This file is a part of horstoeko/invoicesuite.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\codelists;

/**
 * Class representing list of duty or tax or fee category codes
 * Name of list: UNTDID 5305 Duty or tax or fee category code
 *
 * @category InvoiceSuite
 * @author   HorstOeko <horstoeko@erling.com.de>
 * @license  https://opensource.org/licenses/MIT MIT
 * @see      https://github.com/horstoeko/invoicesuite
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.5305
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.5305_3/download/UNTDID_5305_3.json
 */
enum InvoiceSuiteCodelistDutyTaxFeeCategories: string
{
    /**
     * Canary Islands general indirect tax (L)
     *
     * Canary Islands general indirect tax
     */
    case CANARY_ISLANDS_GENERAL_INDIRECT_TAX = 'L';

    /**
     * Duty paid by supplier (C)
     *
     * Duty paid by supplier
     */
    case DUTY_PAID_BY_SUPPLIER = 'C';

    /**
     * Exempt for resale (AB)
     *
     * Exempt for resale
     */
    case EXEMPT_FOR_RESALE = 'AB';

    /**
     * Exempt from tax (E)
     *
     * Exempt from tax
     */
    case EXEMPT_FROM_TAX = 'E';

    /**
     * Free export item, tax not charged (G)
     *
     * Free export item, tax not charged
     */
    case FREE_EXPORT_ITEM_TAX_NOT_CHARGED = 'G';

    /**
     * Higher rate (H)
     *
     * Higher rate
     */
    case HIGHER_RATE = 'H';

    /**
     * Lower rate (AA)
     *
     * Lower rate
     */
    case LOWER_RATE = 'AA';

    /**
     * Mixed tax rate (A)
     *
     * Mixed tax rate
     */
    case MIXED_TAX_RATE = 'A';

    /**
     * Services outside scope of tax (O)
     *
     * Services outside scope of tax
     */
    case SERVICES_OUTSIDE_SCOPE_OF_TAX = 'O';

    /**
     * Standard rate (S)
     *
     * Standard rate
     */
    case STANDARD_RATE = 'S';

    /**
     * Tax for production, services and importation in Ceuta and Melilla (M)
     *
     * Tax for production, services and importation in Ceuta and Melilla
     */
    case TAX_FOR_PRODUCTION_SERVICES_AND_IMPORTATION_IN_CEUTA_AND_MELILLA = 'M';

    /**
     * Transferred (VAT) (B)
     *
     * Transferred (VAT)
     */
    case TRANSFERRED_VAT = 'B';

    /**
     * Value Added Tax (VAT) due from a previous invoice (AD)
     *
     * Value Added Tax (VAT) due from a previous invoice
     */
    case VALUE_ADDED_TAX_VAT_DUE_FROM_A_PREVIOUS_INVOICE = 'AD';

    /**
     * Value Added Tax (VAT) margin scheme - collector’s items and antiques (J)
     *
     * Value Added Tax (VAT) margin scheme - collector’s items and antiques
     */
    case VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_COLLECTORS_ITEMS_AND_ANTIQUES = 'J';

    /**
     * Value Added Tax (VAT) margin scheme - second-hand goods (F)
     *
     * Value Added Tax (VAT) margin scheme - second-hand goods
     */
    case VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_SECONDHAND_GOODS = 'F';

    /**
     * Value Added Tax (VAT) margin scheme - travel agents (D)
     *
     * Value Added Tax (VAT) margin scheme - travel agents
     */
    case VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_TRAVEL_AGENTS = 'D';

    /**
     * Value Added Tax (VAT) margin scheme - works of art Margin scheme — Works
     * of art (I)
     *
     * Value Added Tax (VAT) margin scheme - works of art Margin scheme — Works
     * of art
     */
    case VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_WORKS_OF_ART_MARGIN_SCHEME_WORKS_OF_ART = 'I';

    /**
     * Value Added Tax (VAT) not now due for payment (AC)
     *
     * Value Added Tax (VAT) not now due for payment
     */
    case VALUE_ADDED_TAX_VAT_NOT_NOW_DUE_FOR_PAYMENT = 'AC';

    /**
     * VAT exempt for EEA intra-community supply of goods and services (K)
     *
     * VAT exempt for EEA intra-community supply of goods and services
     */
    case VAT_EXEMPT_FOR_EEA_INTRACOMMUNITY_SUPPLY_OF_GOODS_AND_SERVICES = 'K';

    /**
     * VAT Reverse Charge (AE)
     *
     * VAT Reverse Charge
     */
    case VAT_REVERSE_CHARGE = 'AE';

    /**
     * Zero rated goods (Z)
     *
     * Zero rated goods
     */
    case ZERO_RATED_GOODS = 'Z';

    /**
     * Returns the caption of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistDutyTaxFeeCategories::CANARY_ISLANDS_GENERAL_INDIRECT_TAX => 'Canary Islands general indirect tax',
            InvoiceSuiteCodelistDutyTaxFeeCategories::DUTY_PAID_BY_SUPPLIER => 'Duty paid by supplier',
            InvoiceSuiteCodelistDutyTaxFeeCategories::EXEMPT_FOR_RESALE => 'Exempt for resale',
            InvoiceSuiteCodelistDutyTaxFeeCategories::EXEMPT_FROM_TAX => 'Exempt from tax',
            InvoiceSuiteCodelistDutyTaxFeeCategories::FREE_EXPORT_ITEM_TAX_NOT_CHARGED => 'Free export item, tax not charged',
            InvoiceSuiteCodelistDutyTaxFeeCategories::HIGHER_RATE => 'Higher rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::LOWER_RATE => 'Lower rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::MIXED_TAX_RATE => 'Mixed tax rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::SERVICES_OUTSIDE_SCOPE_OF_TAX => 'Services outside scope of tax',
            InvoiceSuiteCodelistDutyTaxFeeCategories::STANDARD_RATE => 'Standard rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::TAX_FOR_PRODUCTION_SERVICES_AND_IMPORTATION_IN_CEUTA_AND_MELILLA => 'Tax for production, services and importation in Ceuta and Melilla',
            InvoiceSuiteCodelistDutyTaxFeeCategories::TRANSFERRED_VAT => 'Transferred (VAT)',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_DUE_FROM_A_PREVIOUS_INVOICE => 'Value Added Tax (VAT) due from a previous invoice',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_COLLECTORS_ITEMS_AND_ANTIQUES => 'Value Added Tax (VAT) margin scheme - collector’s items and antiques',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_SECONDHAND_GOODS => 'Value Added Tax (VAT) margin scheme - second-hand goods',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_TRAVEL_AGENTS => 'Value Added Tax (VAT) margin scheme - travel agents',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_WORKS_OF_ART_MARGIN_SCHEME_WORKS_OF_ART => 'Value Added Tax (VAT) margin scheme - works of art Margin scheme — Works of art',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_NOT_NOW_DUE_FOR_PAYMENT => 'Value Added Tax (VAT) not now due for payment',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VAT_EXEMPT_FOR_EEA_INTRACOMMUNITY_SUPPLY_OF_GOODS_AND_SERVICES => 'VAT exempt for EEA intra-community supply of goods and services',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VAT_REVERSE_CHARGE => 'VAT Reverse Charge',
            InvoiceSuiteCodelistDutyTaxFeeCategories::ZERO_RATED_GOODS => 'Zero rated goods',
        };
    }

    /**
     * Returns the description of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getDescription(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistDutyTaxFeeCategories::CANARY_ISLANDS_GENERAL_INDIRECT_TAX => 'Canary Islands general indirect tax',
            InvoiceSuiteCodelistDutyTaxFeeCategories::DUTY_PAID_BY_SUPPLIER => 'Duty paid by supplier',
            InvoiceSuiteCodelistDutyTaxFeeCategories::EXEMPT_FOR_RESALE => 'Exempt for resale',
            InvoiceSuiteCodelistDutyTaxFeeCategories::EXEMPT_FROM_TAX => 'Exempt from tax',
            InvoiceSuiteCodelistDutyTaxFeeCategories::FREE_EXPORT_ITEM_TAX_NOT_CHARGED => 'Free export item, tax not charged',
            InvoiceSuiteCodelistDutyTaxFeeCategories::HIGHER_RATE => 'Higher rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::LOWER_RATE => 'Lower rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::MIXED_TAX_RATE => 'Mixed tax rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::SERVICES_OUTSIDE_SCOPE_OF_TAX => 'Services outside scope of tax',
            InvoiceSuiteCodelistDutyTaxFeeCategories::STANDARD_RATE => 'Standard rate',
            InvoiceSuiteCodelistDutyTaxFeeCategories::TAX_FOR_PRODUCTION_SERVICES_AND_IMPORTATION_IN_CEUTA_AND_MELILLA => 'Tax for production, services and importation in Ceuta and Melilla',
            InvoiceSuiteCodelistDutyTaxFeeCategories::TRANSFERRED_VAT => 'Transferred (VAT)',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_DUE_FROM_A_PREVIOUS_INVOICE => 'Value Added Tax (VAT) due from a previous invoice',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_COLLECTORS_ITEMS_AND_ANTIQUES => 'Value Added Tax (VAT) margin scheme - collector’s items and antiques',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_SECONDHAND_GOODS => 'Value Added Tax (VAT) margin scheme - second-hand goods',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_TRAVEL_AGENTS => 'Value Added Tax (VAT) margin scheme - travel agents',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_MARGIN_SCHEME_WORKS_OF_ART_MARGIN_SCHEME_WORKS_OF_ART => 'Value Added Tax (VAT) margin scheme - works of art Margin scheme — Works of art',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VALUE_ADDED_TAX_VAT_NOT_NOW_DUE_FOR_PAYMENT => 'Value Added Tax (VAT) not now due for payment',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VAT_EXEMPT_FOR_EEA_INTRACOMMUNITY_SUPPLY_OF_GOODS_AND_SERVICES => 'VAT exempt for EEA intra-community supply of goods and services',
            InvoiceSuiteCodelistDutyTaxFeeCategories::VAT_REVERSE_CHARGE => 'VAT Reverse Charge',
            InvoiceSuiteCodelistDutyTaxFeeCategories::ZERO_RATED_GOODS => 'Zero rated goods',
        };
    }

    /**
     * Returns the URLs where the data are hosted
     *
     * @return array<int,string>
     * @codeCoverageIgnore
     */
    final public static function getHomepageUrls(): array
    {
        return [
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.5305',
        ];
    }

    /**
     * Returns the URLs from where the data was downloaded
     *
     * @return array<int,string>
     * @codeCoverageIgnore
     */
    final public static function getDownloadUrls(): array
    {
        return [
            'https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.5305_3/download/UNTDID_5305_3.json',
        ];
    }

    /**
     * Returns the ISO formatted date on which this enum was generated
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public static function getCreatedAt(): string
    {
        return '2025-08-30T00:35:49+02:00';
    }
}
