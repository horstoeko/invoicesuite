<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cbc;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

#[JMS\XmlRoot(name: 'EmbeddedDocumentBinaryObject', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
class EmbeddedDocumentBinaryObject extends EmbeddedDocumentBinaryObjectType
{
    use HandlesObjectFlags;
}
