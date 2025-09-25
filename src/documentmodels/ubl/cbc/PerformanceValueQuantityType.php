<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\udt\QuantityType;

class PerformanceValueQuantityType extends QuantityType
{
    use HandlesObjectFlags;
}
