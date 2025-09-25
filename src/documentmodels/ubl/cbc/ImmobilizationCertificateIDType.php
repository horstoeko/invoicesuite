<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\udt\IdentifierType;

class ImmobilizationCertificateIDType extends IdentifierType
{
    use HandlesObjectFlags;
}
