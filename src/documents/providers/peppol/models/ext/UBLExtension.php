<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\ext;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

#[JMS\XmlRoot(name: 'UBLExtension', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2')]
class UBLExtension extends UBLExtensionType
{
    use HandlesObjectFlags;
}
