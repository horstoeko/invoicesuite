<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

#[JMS\XmlRoot(name: 'QualificationResolution', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
class QualificationResolution extends QualificationResolutionType
{
    use HandlesObjectFlags;
}
