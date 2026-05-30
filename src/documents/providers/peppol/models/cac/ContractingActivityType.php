<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActivityType;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActivityTypeCode;
use JMS\Serializer\Annotation as JMS;

class ContractingActivityType
{
    use HandlesObjectFlags;

    /**
     * @var null|ActivityTypeCode
     */
    #[JMS\Accessor(getter: 'getActivityTypeCode', setter: 'setActivityTypeCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActivityTypeCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActivityTypeCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $activityTypeCode;

    /**
     * @var null|ActivityType
     */
    #[JMS\Accessor(getter: 'getActivityType', setter: 'setActivityType')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ActivityType')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ActivityType')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $activityType;

    /**
     * @return null|ActivityTypeCode
     */
    public function getActivityTypeCode(): ?ActivityTypeCode
    {
        return $this->activityTypeCode;
    }

    /**
     * @return ActivityTypeCode
     */
    public function getActivityTypeCodeWithCreate(): ActivityTypeCode
    {
        $this->activityTypeCode ??= new ActivityTypeCode();

        return $this->activityTypeCode;
    }

    /**
     * @param  null|ActivityTypeCode $activityTypeCode
     * @return static
     */
    public function setActivityTypeCode(
        ?ActivityTypeCode $activityTypeCode = null
    ): static {
        $this->activityTypeCode = $activityTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActivityTypeCode(): static
    {
        $this->activityTypeCode = null;

        return $this;
    }

    /**
     * @return null|ActivityType
     */
    public function getActivityType(): ?ActivityType
    {
        return $this->activityType;
    }

    /**
     * @return ActivityType
     */
    public function getActivityTypeWithCreate(): ActivityType
    {
        $this->activityType ??= new ActivityType();

        return $this->activityType;
    }

    /**
     * @param  null|ActivityType $activityType
     * @return static
     */
    public function setActivityType(
        ?ActivityType $activityType = null
    ): static {
        $this->activityType = $activityType;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetActivityType(): static
    {
        $this->activityType = null;

        return $this;
    }
}
