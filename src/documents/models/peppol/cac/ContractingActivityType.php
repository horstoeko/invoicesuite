<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ActivityType;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ActivityTypeCode;
use JMS\Serializer\Annotation as JMS;

class ContractingActivityType
{
    use HandlesObjectFlags;

    /**
     * @var null|ActivityTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ActivityTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityTypeCode", setter="setActivityTypeCode")
     */
    private $activityTypeCode;

    /**
     * @var null|ActivityType
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ActivityType")
     * @JMS\Expose
     * @JMS\SerializedName("ActivityType")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getActivityType", setter="setActivityType")
     */
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
        $this->activityTypeCode = is_null($this->activityTypeCode) ? new ActivityTypeCode() : $this->activityTypeCode;

        return $this->activityTypeCode;
    }

    /**
     * @param  null|ActivityTypeCode $activityTypeCode
     * @return static
     */
    public function setActivityTypeCode(?ActivityTypeCode $activityTypeCode = null): static
    {
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
        $this->activityType = is_null($this->activityType) ? new ActivityType() : $this->activityType;

        return $this->activityType;
    }

    /**
     * @param  null|ActivityType $activityType
     * @return static
     */
    public function setActivityType(?ActivityType $activityType = null): static
    {
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
