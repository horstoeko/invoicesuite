<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\peppolselfbilling;

use horstoeko\invoicesuite\documents\providers\peppol\InvoiceSuitePeppol30InvoiceProvider;
use z4kn4fein\SemVer\Version;

class InvoiceSuitePeppol30SelfBillingInvoiceProvider extends InvoiceSuitePeppol30InvoiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'peppol30selfbillinginvoice';
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Peppol BIS Self-Billing 3.0 - March 2026 Hotfix Release (Invoice)';
    }

    /**
     * {@inheritDoc}
     */
    public function getVersion(): Version
    {
        return Version::create(1, 0, 0);
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'CustomizationId' => 'urn:cen.eu:en16931:2017#compliant#urn:fdc:peppol.eu:2017:poacc:selfbilling:3.0',
            'ProfileId' => 'urn:fdc:peppol.eu:2017:poacc:selfbilling:01:1.0',
            'AllowBillingReferenceDocumentType' => false,
            'AllowedDocumentTypes' => ['389', '527'],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializerHandlers(): array
    {
        return [
            InvoiceSuitePeppol30SelfBillingInvoiceSerializerHandler::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getReaderClassName(): string
    {
        return InvoiceSuitePeppol30SelfBillingInvoiceProviderReader::class;
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderClassName(): string
    {
        return InvoiceSuitePeppol30SelfBillingInvoiceProviderBuilder::class;
    }
}
