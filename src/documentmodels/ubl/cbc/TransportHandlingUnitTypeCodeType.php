<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\udt\CodeType;

class TransportHandlingUnitTypeCodeType extends CodeType
{
    use HandlesObjectFlags;
}
