<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\main;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot(name="CreditNote", namespace="urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", prefix="cac")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", prefix="cbc")
 * @JMS\XmlNamespace(uri="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2", prefix="cec")
 */
class CreditNote extends CreditNoteType
{
    use HandlesObjectFlags;
}
