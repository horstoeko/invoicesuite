<?php

declare(strict_types=1);

/**
 * This file is a part of horstoeko/invoicesuite
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace horstoeko\invoicesuite\documents\providers\zffx;

class InvoiceSuiteZfFxExtendedCtcFrProvider extends InvoiceSuiteZfFxExtendedProvider
{
    /**
     * {@inheritDoc}
     */
    public function getUniqueId(): string
    {
        return 'zffxextendedctcfr';
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'The EXTENDED-CTC-FR profile is the French extension of EN 16931. In CII and Factur-X it is implemented '
            . 'as a subset of the Factur-X EXTENDED profile with additional French business rules.';
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        $parameters = parent::getParameters();

        $parameters['ContextParameter'] = 'urn:cen.eu:en16931:2017#conformant#urn.cpro.gouv.fr:1p0:extended-ctc-fr';
        $parameters['AlternativeContextParameters'] = [];
        $parameters['BusinessProcess'] = '';

        return $parameters;
    }
}
