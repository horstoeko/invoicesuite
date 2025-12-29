<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cbc;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\udt\QuantityType;

class ConsignmentQuantityType extends QuantityType
{
    use HandlesObjectFlags;
}
