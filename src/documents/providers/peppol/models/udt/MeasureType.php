<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\udt;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cct\MeasureType as MeasureTypeBase;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

class MeasureType extends MeasureTypeBase
{
    use HandlesObjectFlags;

    /**
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getUnitCode', setter: 'setUnitCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('unitCode')]
    #[JMS\Type('string')]
    #[JMS\XmlAttribute]
    private $unitCode;

    /**
     * @return null|string
     */
    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    /**
     * @param  null|string $unitCode
     * @return static
     */
    public function setUnitCode(
        ?string $unitCode = null
    ): static {
        $this->unitCode = InvoiceSuiteStringUtils::asNullWhenEmpty($unitCode);

        return $this;
    }

    /**
     * @return static
     */
    public function unsetUnitCode(): static
    {
        $this->unitCode = null;

        return $this;
    }
}
