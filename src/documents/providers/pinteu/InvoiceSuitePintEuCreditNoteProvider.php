<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\pinteu;

use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30CreditNoteProvider;

class InvoiceSuitePintEuCreditNoteProvider extends InvoiceSuitePeppol30CreditNoteProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'pinteucreditnote';
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Peppol PINT-EU Billing 1.0.1 (Credit Note)';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'CustomizationId' => 'urn:peppol:pint:billing-1@eu-1',
            'ProfileId' => 'urn:peppol:bis:billing',
            'AllowInvoiceDocumentReferenceDocumentType' => false,
            'AllowedDocumentTypes' => ['81', '83', '381', '396', '532'],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuitePintEuCreditNoteSerializerHandler::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuitePintEuCreditNoteProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuitePintEuCreditNoteProviderBuilder::class;
    }
}
