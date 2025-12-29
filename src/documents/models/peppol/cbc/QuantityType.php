<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cbc;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\udt\QuantityType as QuantityTypeBase;

class QuantityType extends QuantityTypeBase
{
    use HandlesObjectFlags;
}
