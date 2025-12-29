<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\main;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot(name="Invoice", namespace="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", prefix="cac")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", prefix="cbc")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", prefix="cec")
 */
class Invoice extends InvoiceType
{
    use HandlesObjectFlags;
}
