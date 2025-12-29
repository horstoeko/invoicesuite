<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlRoot(name="BudgetAccountLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
 */
class BudgetAccountLine extends BudgetAccountLineType
{
    use HandlesObjectFlags;
}
