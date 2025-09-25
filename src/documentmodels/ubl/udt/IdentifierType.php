<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\udt;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cct\IdentifierType as IdentifierTypeBase;

class IdentifierType extends IdentifierTypeBase
{
    use HandlesObjectFlags;
}
