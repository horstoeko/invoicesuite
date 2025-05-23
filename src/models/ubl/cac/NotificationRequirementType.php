<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\NotificationTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\PostEventNotificationDurationMeasure;
use horstoeko\invoicesuite\models\ubl\cbc\PreEventNotificationDurationMeasure;

class NotificationRequirementType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\NotificationTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\NotificationTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNotificationTypeCode", setter="setNotificationTypeCode")
     */
    private $notificationTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PostEventNotificationDurationMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PostEventNotificationDurationMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("PostEventNotificationDurationMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostEventNotificationDurationMeasure", setter="setPostEventNotificationDurationMeasure")
     */
    private $postEventNotificationDurationMeasure;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PreEventNotificationDurationMeasure|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PreEventNotificationDurationMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("PreEventNotificationDurationMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreEventNotificationDurationMeasure", setter="setPreEventNotificationDurationMeasure")
     */
    private $preEventNotificationDurationMeasure;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\NotifyParty>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\NotifyParty>")
     * @JMS\Expose
     * @JMS\SerializedName("NotifyParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotifyParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotifyParty", setter="setNotifyParty")
     */
    private $notifyParty;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotificationPeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotificationPeriod", setter="setNotificationPeriod")
     */
    private $notificationPeriod;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\NotificationLocation>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\NotificationLocation>")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotificationLocation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotificationLocation", setter="setNotificationLocation")
     */
    private $notificationLocation;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NotificationTypeCode|null
     */
    public function getNotificationTypeCode(): ?NotificationTypeCode
    {
        return $this->notificationTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\NotificationTypeCode
     */
    public function getNotificationTypeCodeWithCreate(): NotificationTypeCode
    {
        $this->notificationTypeCode = is_null($this->notificationTypeCode) ? new NotificationTypeCode() : $this->notificationTypeCode;

        return $this->notificationTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\NotificationTypeCode|null $notificationTypeCode
     * @return self
     */
    public function setNotificationTypeCode(?NotificationTypeCode $notificationTypeCode = null): self
    {
        $this->notificationTypeCode = $notificationTypeCode;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PostEventNotificationDurationMeasure|null
     */
    public function getPostEventNotificationDurationMeasure(): ?PostEventNotificationDurationMeasure
    {
        return $this->postEventNotificationDurationMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PostEventNotificationDurationMeasure
     */
    public function getPostEventNotificationDurationMeasureWithCreate(): PostEventNotificationDurationMeasure
    {
        $this->postEventNotificationDurationMeasure = is_null($this->postEventNotificationDurationMeasure) ? new PostEventNotificationDurationMeasure() : $this->postEventNotificationDurationMeasure;

        return $this->postEventNotificationDurationMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PostEventNotificationDurationMeasure|null $postEventNotificationDurationMeasure
     * @return self
     */
    public function setPostEventNotificationDurationMeasure(
        ?PostEventNotificationDurationMeasure $postEventNotificationDurationMeasure = null,
    ): self {
        $this->postEventNotificationDurationMeasure = $postEventNotificationDurationMeasure;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PreEventNotificationDurationMeasure|null
     */
    public function getPreEventNotificationDurationMeasure(): ?PreEventNotificationDurationMeasure
    {
        return $this->preEventNotificationDurationMeasure;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PreEventNotificationDurationMeasure
     */
    public function getPreEventNotificationDurationMeasureWithCreate(): PreEventNotificationDurationMeasure
    {
        $this->preEventNotificationDurationMeasure = is_null($this->preEventNotificationDurationMeasure) ? new PreEventNotificationDurationMeasure() : $this->preEventNotificationDurationMeasure;

        return $this->preEventNotificationDurationMeasure;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PreEventNotificationDurationMeasure|null $preEventNotificationDurationMeasure
     * @return self
     */
    public function setPreEventNotificationDurationMeasure(
        ?PreEventNotificationDurationMeasure $preEventNotificationDurationMeasure = null,
    ): self {
        $this->preEventNotificationDurationMeasure = $preEventNotificationDurationMeasure;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\NotifyParty>|null
     */
    public function getNotifyParty(): ?array
    {
        return $this->notifyParty;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\NotifyParty>|null $notifyParty
     * @return self
     */
    public function setNotifyParty(?array $notifyParty = null): self
    {
        $this->notifyParty = $notifyParty;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNotifyParty(): self
    {
        $this->notifyParty = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotifyParty $notifyParty
     * @return self
     */
    public function addToNotifyParty(NotifyParty $notifyParty): self
    {
        $this->notifyParty[] = $notifyParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotifyParty
     */
    public function addToNotifyPartyWithCreate(): NotifyParty
    {
        $this->addTonotifyParty($notifyParty = new NotifyParty());

        return $notifyParty;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotifyParty $notifyParty
     * @return self
     */
    public function addOnceToNotifyParty(NotifyParty $notifyParty): self
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        $this->notifyParty[0] = $notifyParty;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotifyParty
     */
    public function addOnceToNotifyPartyWithCreate(): NotifyParty
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        if ($this->notifyParty === []) {
            $this->addOnceTonotifyParty(new NotifyParty());
        }

        return $this->notifyParty[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod>|null
     */
    public function getNotificationPeriod(): ?array
    {
        return $this->notificationPeriod;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod>|null $notificationPeriod
     * @return self
     */
    public function setNotificationPeriod(?array $notificationPeriod = null): self
    {
        $this->notificationPeriod = $notificationPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNotificationPeriod(): self
    {
        $this->notificationPeriod = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod $notificationPeriod
     * @return self
     */
    public function addToNotificationPeriod(NotificationPeriod $notificationPeriod): self
    {
        $this->notificationPeriod[] = $notificationPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod
     */
    public function addToNotificationPeriodWithCreate(): NotificationPeriod
    {
        $this->addTonotificationPeriod($notificationPeriod = new NotificationPeriod());

        return $notificationPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod $notificationPeriod
     * @return self
     */
    public function addOnceToNotificationPeriod(NotificationPeriod $notificationPeriod): self
    {
        if (!is_array($this->notificationPeriod)) {
            $this->notificationPeriod = [];
        }

        $this->notificationPeriod[0] = $notificationPeriod;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotificationPeriod
     */
    public function addOnceToNotificationPeriodWithCreate(): NotificationPeriod
    {
        if (!is_array($this->notificationPeriod)) {
            $this->notificationPeriod = [];
        }

        if ($this->notificationPeriod === []) {
            $this->addOnceTonotificationPeriod(new NotificationPeriod());
        }

        return $this->notificationPeriod[0];
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\NotificationLocation>|null
     */
    public function getNotificationLocation(): ?array
    {
        return $this->notificationLocation;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\NotificationLocation>|null $notificationLocation
     * @return self
     */
    public function setNotificationLocation(?array $notificationLocation = null): self
    {
        $this->notificationLocation = $notificationLocation;

        return $this;
    }

    /**
     * @return self
     */
    public function clearNotificationLocation(): self
    {
        $this->notificationLocation = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotificationLocation $notificationLocation
     * @return self
     */
    public function addToNotificationLocation(NotificationLocation $notificationLocation): self
    {
        $this->notificationLocation[] = $notificationLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotificationLocation
     */
    public function addToNotificationLocationWithCreate(): NotificationLocation
    {
        $this->addTonotificationLocation($notificationLocation = new NotificationLocation());

        return $notificationLocation;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\NotificationLocation $notificationLocation
     * @return self
     */
    public function addOnceToNotificationLocation(NotificationLocation $notificationLocation): self
    {
        if (!is_array($this->notificationLocation)) {
            $this->notificationLocation = [];
        }

        $this->notificationLocation[0] = $notificationLocation;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\NotificationLocation
     */
    public function addOnceToNotificationLocationWithCreate(): NotificationLocation
    {
        if (!is_array($this->notificationLocation)) {
            $this->notificationLocation = [];
        }

        if ($this->notificationLocation === []) {
            $this->addOnceTonotificationLocation(new NotificationLocation());
        }

        return $this->notificationLocation[0];
    }
}
