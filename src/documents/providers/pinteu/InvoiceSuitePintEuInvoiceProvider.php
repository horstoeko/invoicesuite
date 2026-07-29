<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\pinteu;

use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30InvoiceProvider;

class InvoiceSuitePintEuInvoiceProvider extends InvoiceSuitePeppol30InvoiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'pinteuinvoice';
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Peppol PINT-EU Billing 1.0.1 (Invoice)';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'CustomizationId' => 'urn:peppol:pint:billing-1@eu-1',
            'ProfileId' => 'urn:peppol:bis:billing',
            'AllowBillingReferenceDocumentType' => false,
            'AllowedDocumentTypes' => [
                '71',
                '80',
                '82',
                '84',
                '102',
                '218',
                '219',
                '331',
                '380',
                '382',
                '383',
                '386',
                '388',
                '393',
                '395',
                '480',
                '553',
                '575',
                '623',
                '780',
                '817',
                '870',
                '875',
                '876',
                '877',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuitePintEuInvoiceSerializerHandler::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuitePintEuInvoiceProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuitePintEuInvoiceProviderBuilder::class;
    }
}
