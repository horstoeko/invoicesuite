<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cbc;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\udt\IdentifierType;

class ConsumptionReportIDType extends IdentifierType
{
    use HandlesObjectFlags;
}
