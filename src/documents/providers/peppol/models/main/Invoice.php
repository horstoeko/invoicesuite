<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\main;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

#[JMS\XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', prefix: 'cac')]
#[JMS\XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', prefix: 'cbc')]
#[JMS\XmlNamespace(uri: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2', prefix: 'cec')]
#[JMS\XmlRoot(name: 'Invoice', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:Invoice-2')]
class Invoice extends InvoiceType
{
    use HandlesObjectFlags;
}
