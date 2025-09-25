<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cbc;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\udt\MeasureType as MeasureTypeBase;

class MeasureType extends MeasureTypeBase
{
    use HandlesObjectFlags;
}
