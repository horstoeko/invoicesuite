<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cct\TextType as TextTypeBase;

class TextType extends TextTypeBase
{
    use HandlesObjectFlags;
}
