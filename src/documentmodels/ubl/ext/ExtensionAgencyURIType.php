<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\ext;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\udt\IdentifierType;

class ExtensionAgencyURIType extends IdentifierType
{
    use HandlesObjectFlags;
}
