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
 * @see      https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.5305_3
 * @see      https://www.xrepository.de/api/xrepository/urn:xoev-de:kosit:codeliste:untdid.5305_3/download/UNTDID_5305_3.json
 */
enum InvoiceSuiteCodelistVatCategoryCodes: string
{
    /**
     * Canary Islands general indirect tax (L)
     *
     * Impuesto General Indirecto Canario (IGIC) is an indirect tax levied on
     * goods and services supplied in the Canary Islands (Spain) by traders and
     * professionals, as well as on import of goods.
     */
    case CANA_ISLA_GENE_INDI_TAX = 'L';

    /**
     * Duty paid by supplier (C)
     *
     * Duty associated with shipment of goods is paid by the supplier; customer
     * receives goods with duty paid.
     */
    case DUTY_PAID_BY_SUPP = 'C';

    /**
     * Exempt for resale (AB)
     *
     * A tax category code indicating the item is tax exempt when the item is
     * bought for future resale.
     */
    case EXEM_FOR_RESA = 'AB';

    /**
     * Exempt from tax (E)
     *
     * Code specifying that taxes are not applicable.
     */
    case EXEM_FROM_TAX = 'E';

    /**
     * Free export item, tax not charged (G)
     *
     * Code specifying that the item is free export and taxes are not charged.
     */
    case FREE_EXPO_ITEM_TAX_NOT_CHAR = 'G';

    /**
     * Higher rate (H)
     *
     * Code specifying a higher rate of duty or tax or fee.
     */
    case HIGH_RATE = 'H';

    /**
     * Lower rate (AA)
     *
     * Tax rate is lower than standard rate.
     */
    case LOWE_RATE = 'AA';

    /**
     * Mixed tax rate (A)
     *
     * Code specifying that the rate is based on mixed tax.
     */
    case MIXE_TAX_RATE = 'A';

    /**
     * Services outside scope of tax (O)
     *
     * Code specifying that taxes are not applicable to the services.
     */
    case SERV_OUTS_SCOP_OF_TAX = 'O';

    /**
     * Standard rate (S)
     *
     * Code specifying the standard rate.
     */
    case STAN_RATE = 'S';

    /**
     * Tax for production, services and importation in Ceuta and Melilla (M)
     *
     * Impuesto sobre la Producción, los Servicios y la Importación (IPSI) is an
     * indirect municipal tax, levied on the production, processing and import of
     * all kinds of movable tangible property, the supply of services and the
     * transfer of immovable property located in the cities of Ceuta and Melilla.
     */
    case TAX_FOR_PROD_SERV_AND_IMPO_IN_CEUT_AND_MELI = 'M';

    /**
     * Transferred (VAT) (B)
     *
     * VAT not to be paid to the issuer of the invoice but directly to relevant
     * tax authority.
     */
    case TRAN_VAT = 'B';

    /**
     * Value Added Tax (VAT) due from a previous invoice (AD)
     *
     * A code to indicate that the Value Added Tax (VAT) amount of a previous
     * invoice is to be paid.
     */
    case VALU_ADDE_TAX_VAT_DUE_FROM_A_PREV_INVO = 'AD';

    /**
     * Value Added Tax (VAT) margin scheme - collector’s items and antiques (J)
     *
     * Indication that the VAT margin scheme for collector’s items and antiques
     * is applied.
     */
    case VALU_ADDE_TAX_VAT_MARG_SCHE_COLL_ITEM_AND_ANTI = 'J';

    /**
     * Value Added Tax (VAT) margin scheme - second-hand goods (F)
     *
     * Indication that the VAT margin scheme for second-hand goods is applied.
     */
    case VALU_ADDE_TAX_VAT_MARG_SCHE_SECO_GOOD = 'F';

    /**
     * Value Added Tax (VAT) margin scheme - travel agents (D)
     *
     * Indication that the VAT margin scheme for travel agents is applied.
     */
    case VALU_ADDE_TAX_VAT_MARG_SCHE_TRAV_AGEN = 'D';

    /**
     * Value Added Tax (VAT) margin scheme - works of art Margin scheme — Works
     * of art (I)
     *
     * Indication that the VAT margin scheme for works of art is applied.
     */
    case VALU_ADDE_TAX_VAT_MARG_SCHE_WORK_OF_ART_MARG_SCHE_WORK_OF_ART = 'I';

    /**
     * Value Added Tax (VAT) not now due for payment (AC)
     *
     * A code to indicate that the Value Added Tax (VAT) amount which is due on
     * the current invoice is to be paid on receipt of a separate VAT payment
     * request.
     */
    case VALU_ADDE_TAX_VAT_NOT_NOW_DUE_FOR_PAYM = 'AC';

    /**
     * VAT exempt for EEA intra-community supply of goods and services (K)
     *
     * A tax category code indicating the item is VAT exempt due to an
     * intra-community supply in the European Economic Area.
     */
    case VAT_EXEM_FOR_EEA_INTR_SUPP_OF_GOOD_AND_SERV = 'K';

    /**
     * VAT Reverse Charge (AE)
     *
     * Code specifying that the standard VAT rate is levied from the invoicee.
     */
    case VAT_REVE_CHAR = 'AE';

    /**
     * Zero rated goods (Z)
     *
     * Code specifying that the goods are at a zero rate.
     */
    case ZERO_RATE_GOOD = 'Z';

    /**
     * Returns the caption of the code
     *
     * @return string
     * @codeCoverageIgnore
     */
    final public function getCaption(): string
    {
        return match ($this) {
            InvoiceSuiteCodelistVatCategoryCodes::CANA_ISLA_GENE_INDI_TAX => 'Canary Islands general indirect tax',
            InvoiceSuiteCodelistVatCategoryCodes::DUTY_PAID_BY_SUPP => 'Duty paid by supplier',
            InvoiceSuiteCodelistVatCategoryCodes::EXEM_FOR_RESA => 'Exempt for resale',
            InvoiceSuiteCodelistVatCategoryCodes::EXEM_FROM_TAX => 'Exempt from tax',
            InvoiceSuiteCodelistVatCategoryCodes::FREE_EXPO_ITEM_TAX_NOT_CHAR => 'Free export item, tax not charged',
            InvoiceSuiteCodelistVatCategoryCodes::HIGH_RATE => 'Higher rate',
            InvoiceSuiteCodelistVatCategoryCodes::LOWE_RATE => 'Lower rate',
            InvoiceSuiteCodelistVatCategoryCodes::MIXE_TAX_RATE => 'Mixed tax rate',
            InvoiceSuiteCodelistVatCategoryCodes::SERV_OUTS_SCOP_OF_TAX => 'Services outside scope of tax',
            InvoiceSuiteCodelistVatCategoryCodes::STAN_RATE => 'Standard rate',
            InvoiceSuiteCodelistVatCategoryCodes::TAX_FOR_PROD_SERV_AND_IMPO_IN_CEUT_AND_MELI => 'Tax for production, services and importation in Ceuta and Melilla',
            InvoiceSuiteCodelistVatCategoryCodes::TRAN_VAT => 'Transferred (VAT)',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_DUE_FROM_A_PREV_INVO => 'Value Added Tax (VAT) due from a previous invoice',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_COLL_ITEM_AND_ANTI => 'Value Added Tax (VAT) margin scheme - collector’s items and antiques',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_SECO_GOOD => 'Value Added Tax (VAT) margin scheme - second-hand goods',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_TRAV_AGEN => 'Value Added Tax (VAT) margin scheme - travel agents',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_WORK_OF_ART_MARG_SCHE_WORK_OF_ART => 'Value Added Tax (VAT) margin scheme - works of art Margin scheme — Works of art',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_NOT_NOW_DUE_FOR_PAYM => 'Value Added Tax (VAT) not now due for payment',
            InvoiceSuiteCodelistVatCategoryCodes::VAT_EXEM_FOR_EEA_INTR_SUPP_OF_GOOD_AND_SERV => 'VAT exempt for EEA intra-community supply of goods and services',
            InvoiceSuiteCodelistVatCategoryCodes::VAT_REVE_CHAR => 'VAT Reverse Charge',
            InvoiceSuiteCodelistVatCategoryCodes::ZERO_RATE_GOOD => 'Zero rated goods',
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
            InvoiceSuiteCodelistVatCategoryCodes::CANA_ISLA_GENE_INDI_TAX => 'Impuesto General Indirecto Canario (IGIC) is an indirect tax levied on goods and services supplied in the Canary Islands (Spain) by traders and professionals, as well as on import of goods.',
            InvoiceSuiteCodelistVatCategoryCodes::DUTY_PAID_BY_SUPP => 'Duty associated with shipment of goods is paid by the supplier; customer receives goods with duty paid.',
            InvoiceSuiteCodelistVatCategoryCodes::EXEM_FOR_RESA => 'A tax category code indicating the item is tax exempt when the item is bought for future resale.',
            InvoiceSuiteCodelistVatCategoryCodes::EXEM_FROM_TAX => 'Code specifying that taxes are not applicable.',
            InvoiceSuiteCodelistVatCategoryCodes::FREE_EXPO_ITEM_TAX_NOT_CHAR => 'Code specifying that the item is free export and taxes are not charged.',
            InvoiceSuiteCodelistVatCategoryCodes::HIGH_RATE => 'Code specifying a higher rate of duty or tax or fee.',
            InvoiceSuiteCodelistVatCategoryCodes::LOWE_RATE => 'Tax rate is lower than standard rate.',
            InvoiceSuiteCodelistVatCategoryCodes::MIXE_TAX_RATE => 'Code specifying that the rate is based on mixed tax.',
            InvoiceSuiteCodelistVatCategoryCodes::SERV_OUTS_SCOP_OF_TAX => 'Code specifying that taxes are not applicable to the services.',
            InvoiceSuiteCodelistVatCategoryCodes::STAN_RATE => 'Code specifying the standard rate.',
            InvoiceSuiteCodelistVatCategoryCodes::TAX_FOR_PROD_SERV_AND_IMPO_IN_CEUT_AND_MELI => 'Impuesto sobre la Producción, los Servicios y la Importación (IPSI) is an indirect municipal tax, levied on the production, processing and import of all kinds of movable tangible property, the supply of services and the transfer of immovable property located in the cities of Ceuta and Melilla.',
            InvoiceSuiteCodelistVatCategoryCodes::TRAN_VAT => 'VAT not to be paid to the issuer of the invoice but directly to relevant tax authority.',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_DUE_FROM_A_PREV_INVO => 'A code to indicate that the Value Added Tax (VAT) amount of a previous invoice is to be paid.',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_COLL_ITEM_AND_ANTI => 'Indication that the VAT margin scheme for collector’s items and antiques is applied.',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_SECO_GOOD => 'Indication that the VAT margin scheme for second-hand goods is applied.',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_TRAV_AGEN => 'Indication that the VAT margin scheme for travel agents is applied.',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_MARG_SCHE_WORK_OF_ART_MARG_SCHE_WORK_OF_ART => 'Indication that the VAT margin scheme for works of art is applied.',
            InvoiceSuiteCodelistVatCategoryCodes::VALU_ADDE_TAX_VAT_NOT_NOW_DUE_FOR_PAYM => 'A code to indicate that the Value Added Tax (VAT) amount which is due on the current invoice is to be paid on receipt of a separate VAT payment request.',
            InvoiceSuiteCodelistVatCategoryCodes::VAT_EXEM_FOR_EEA_INTR_SUPP_OF_GOOD_AND_SERV => 'A tax category code indicating the item is VAT exempt due to an intra-community supply in the European Economic Area.',
            InvoiceSuiteCodelistVatCategoryCodes::VAT_REVE_CHAR => 'Code specifying that the standard VAT rate is levied from the invoicee.',
            InvoiceSuiteCodelistVatCategoryCodes::ZERO_RATE_GOOD => 'Code specifying that the goods are at a zero rate.',
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
            'https://www.xrepository.de/details/urn:xoev-de:kosit:codeliste:untdid.5305_3',
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
        return '2025-08-30T00:35:50+02:00';
    }
}
