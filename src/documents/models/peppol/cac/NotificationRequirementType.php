<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\NotificationTypeCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PostEventNotificationDurationMeasure;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PreEventNotificationDurationMeasure;
use JMS\Serializer\Annotation as JMS;

class NotificationRequirementType
{
    use HandlesObjectFlags;

    /**
     * @var null|NotificationTypeCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\NotificationTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getNotificationTypeCode", setter="setNotificationTypeCode")
     */
    private $notificationTypeCode;

    /**
     * @var null|PostEventNotificationDurationMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PostEventNotificationDurationMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("PostEventNotificationDurationMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPostEventNotificationDurationMeasure", setter="setPostEventNotificationDurationMeasure")
     */
    private $postEventNotificationDurationMeasure;

    /**
     * @var null|PreEventNotificationDurationMeasure
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PreEventNotificationDurationMeasure")
     * @JMS\Expose
     * @JMS\SerializedName("PreEventNotificationDurationMeasure")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPreEventNotificationDurationMeasure", setter="setPreEventNotificationDurationMeasure")
     */
    private $preEventNotificationDurationMeasure;

    /**
     * @var null|array<NotifyParty>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\NotifyParty>")
     * @JMS\Expose
     * @JMS\SerializedName("NotifyParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotifyParty", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotifyParty", setter="setNotifyParty")
     */
    private $notifyParty;

    /**
     * @var null|array<NotificationPeriod>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\NotificationPeriod>")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotificationPeriod", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotificationPeriod", setter="setNotificationPeriod")
     */
    private $notificationPeriod;

    /**
     * @var null|array<NotificationLocation>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\NotificationLocation>")
     * @JMS\Expose
     * @JMS\SerializedName("NotificationLocation")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="NotificationLocation", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getNotificationLocation", setter="setNotificationLocation")
     */
    private $notificationLocation;

    /**
     * @return null|NotificationTypeCode
     */
    public function getNotificationTypeCode(): ?NotificationTypeCode
    {
        return $this->notificationTypeCode;
    }

    /**
     * @return NotificationTypeCode
     */
    public function getNotificationTypeCodeWithCreate(): NotificationTypeCode
    {
        $this->notificationTypeCode = is_null($this->notificationTypeCode) ? new NotificationTypeCode() : $this->notificationTypeCode;

        return $this->notificationTypeCode;
    }

    /**
     * @param  null|NotificationTypeCode $notificationTypeCode
     * @return static
     */
    public function setNotificationTypeCode(?NotificationTypeCode $notificationTypeCode = null): static
    {
        $this->notificationTypeCode = $notificationTypeCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotificationTypeCode(): static
    {
        $this->notificationTypeCode = null;

        return $this;
    }

    /**
     * @return null|PostEventNotificationDurationMeasure
     */
    public function getPostEventNotificationDurationMeasure(): ?PostEventNotificationDurationMeasure
    {
        return $this->postEventNotificationDurationMeasure;
    }

    /**
     * @return PostEventNotificationDurationMeasure
     */
    public function getPostEventNotificationDurationMeasureWithCreate(): PostEventNotificationDurationMeasure
    {
        $this->postEventNotificationDurationMeasure = is_null($this->postEventNotificationDurationMeasure) ? new PostEventNotificationDurationMeasure() : $this->postEventNotificationDurationMeasure;

        return $this->postEventNotificationDurationMeasure;
    }

    /**
     * @param  null|PostEventNotificationDurationMeasure $postEventNotificationDurationMeasure
     * @return static
     */
    public function setPostEventNotificationDurationMeasure(
        ?PostEventNotificationDurationMeasure $postEventNotificationDurationMeasure = null,
    ): static {
        $this->postEventNotificationDurationMeasure = $postEventNotificationDurationMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPostEventNotificationDurationMeasure(): static
    {
        $this->postEventNotificationDurationMeasure = null;

        return $this;
    }

    /**
     * @return null|PreEventNotificationDurationMeasure
     */
    public function getPreEventNotificationDurationMeasure(): ?PreEventNotificationDurationMeasure
    {
        return $this->preEventNotificationDurationMeasure;
    }

    /**
     * @return PreEventNotificationDurationMeasure
     */
    public function getPreEventNotificationDurationMeasureWithCreate(): PreEventNotificationDurationMeasure
    {
        $this->preEventNotificationDurationMeasure = is_null($this->preEventNotificationDurationMeasure) ? new PreEventNotificationDurationMeasure() : $this->preEventNotificationDurationMeasure;

        return $this->preEventNotificationDurationMeasure;
    }

    /**
     * @param  null|PreEventNotificationDurationMeasure $preEventNotificationDurationMeasure
     * @return static
     */
    public function setPreEventNotificationDurationMeasure(
        ?PreEventNotificationDurationMeasure $preEventNotificationDurationMeasure = null,
    ): static {
        $this->preEventNotificationDurationMeasure = $preEventNotificationDurationMeasure;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreEventNotificationDurationMeasure(): static
    {
        $this->preEventNotificationDurationMeasure = null;

        return $this;
    }

    /**
     * @return null|array<NotifyParty>
     */
    public function getNotifyParty(): ?array
    {
        return $this->notifyParty;
    }

    /**
     * @param  null|array<NotifyParty> $notifyParty
     * @return static
     */
    public function setNotifyParty(?array $notifyParty = null): static
    {
        $this->notifyParty = $notifyParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotifyParty(): static
    {
        $this->notifyParty = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNotifyParty(): static
    {
        $this->notifyParty = [];

        return $this;
    }

    /**
     * @return null|NotifyParty
     */
    public function firstNotifyParty(): ?NotifyParty
    {
        $notifyParty = $this->notifyParty ?? [];
        $notifyParty = reset($notifyParty);

        if (false === $notifyParty) {
            return null;
        }

        return $notifyParty;
    }

    /**
     * @return null|NotifyParty
     */
    public function lastNotifyParty(): ?NotifyParty
    {
        $notifyParty = $this->notifyParty ?? [];
        $notifyParty = end($notifyParty);

        if (false === $notifyParty) {
            return null;
        }

        return $notifyParty;
    }

    /**
     * @param  NotifyParty $notifyParty
     * @return static
     */
    public function addToNotifyParty(NotifyParty $notifyParty): static
    {
        $this->notifyParty[] = $notifyParty;

        return $this;
    }

    /**
     * @return NotifyParty
     */
    public function addToNotifyPartyWithCreate(): NotifyParty
    {
        $this->addTonotifyParty($notifyParty = new NotifyParty());

        return $notifyParty;
    }

    /**
     * @param  NotifyParty $notifyParty
     * @return static
     */
    public function addOnceToNotifyParty(NotifyParty $notifyParty): static
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        $this->notifyParty[0] = $notifyParty;

        return $this;
    }

    /**
     * @return NotifyParty
     */
    public function addOnceToNotifyPartyWithCreate(): NotifyParty
    {
        if (!is_array($this->notifyParty)) {
            $this->notifyParty = [];
        }

        if ([] === $this->notifyParty) {
            $this->addOnceTonotifyParty(new NotifyParty());
        }

        return $this->notifyParty[0];
    }

    /**
     * @return null|array<NotificationPeriod>
     */
    public function getNotificationPeriod(): ?array
    {
        return $this->notificationPeriod;
    }

    /**
     * @param  null|array<NotificationPeriod> $notificationPeriod
     * @return static
     */
    public function setNotificationPeriod(?array $notificationPeriod = null): static
    {
        $this->notificationPeriod = $notificationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotificationPeriod(): static
    {
        $this->notificationPeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNotificationPeriod(): static
    {
        $this->notificationPeriod = [];

        return $this;
    }

    /**
     * @return null|NotificationPeriod
     */
    public function firstNotificationPeriod(): ?NotificationPeriod
    {
        $notificationPeriod = $this->notificationPeriod ?? [];
        $notificationPeriod = reset($notificationPeriod);

        if (false === $notificationPeriod) {
            return null;
        }

        return $notificationPeriod;
    }

    /**
     * @return null|NotificationPeriod
     */
    public function lastNotificationPeriod(): ?NotificationPeriod
    {
        $notificationPeriod = $this->notificationPeriod ?? [];
        $notificationPeriod = end($notificationPeriod);

        if (false === $notificationPeriod) {
            return null;
        }

        return $notificationPeriod;
    }

    /**
     * @param  NotificationPeriod $notificationPeriod
     * @return static
     */
    public function addToNotificationPeriod(NotificationPeriod $notificationPeriod): static
    {
        $this->notificationPeriod[] = $notificationPeriod;

        return $this;
    }

    /**
     * @return NotificationPeriod
     */
    public function addToNotificationPeriodWithCreate(): NotificationPeriod
    {
        $this->addTonotificationPeriod($notificationPeriod = new NotificationPeriod());

        return $notificationPeriod;
    }

    /**
     * @param  NotificationPeriod $notificationPeriod
     * @return static
     */
    public function addOnceToNotificationPeriod(NotificationPeriod $notificationPeriod): static
    {
        if (!is_array($this->notificationPeriod)) {
            $this->notificationPeriod = [];
        }

        $this->notificationPeriod[0] = $notificationPeriod;

        return $this;
    }

    /**
     * @return NotificationPeriod
     */
    public function addOnceToNotificationPeriodWithCreate(): NotificationPeriod
    {
        if (!is_array($this->notificationPeriod)) {
            $this->notificationPeriod = [];
        }

        if ([] === $this->notificationPeriod) {
            $this->addOnceTonotificationPeriod(new NotificationPeriod());
        }

        return $this->notificationPeriod[0];
    }

    /**
     * @return null|array<NotificationLocation>
     */
    public function getNotificationLocation(): ?array
    {
        return $this->notificationLocation;
    }

    /**
     * @param  null|array<NotificationLocation> $notificationLocation
     * @return static
     */
    public function setNotificationLocation(?array $notificationLocation = null): static
    {
        $this->notificationLocation = $notificationLocation;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNotificationLocation(): static
    {
        $this->notificationLocation = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNotificationLocation(): static
    {
        $this->notificationLocation = [];

        return $this;
    }

    /**
     * @return null|NotificationLocation
     */
    public function firstNotificationLocation(): ?NotificationLocation
    {
        $notificationLocation = $this->notificationLocation ?? [];
        $notificationLocation = reset($notificationLocation);

        if (false === $notificationLocation) {
            return null;
        }

        return $notificationLocation;
    }

    /**
     * @return null|NotificationLocation
     */
    public function lastNotificationLocation(): ?NotificationLocation
    {
        $notificationLocation = $this->notificationLocation ?? [];
        $notificationLocation = end($notificationLocation);

        if (false === $notificationLocation) {
            return null;
        }

        return $notificationLocation;
    }

    /**
     * @param  NotificationLocation $notificationLocation
     * @return static
     */
    public function addToNotificationLocation(NotificationLocation $notificationLocation): static
    {
        $this->notificationLocation[] = $notificationLocation;

        return $this;
    }

    /**
     * @return NotificationLocation
     */
    public function addToNotificationLocationWithCreate(): NotificationLocation
    {
        $this->addTonotificationLocation($notificationLocation = new NotificationLocation());

        return $notificationLocation;
    }

    /**
     * @param  NotificationLocation $notificationLocation
     * @return static
     */
    public function addOnceToNotificationLocation(NotificationLocation $notificationLocation): static
    {
        if (!is_array($this->notificationLocation)) {
            $this->notificationLocation = [];
        }

        $this->notificationLocation[0] = $notificationLocation;

        return $this;
    }

    /**
     * @return NotificationLocation
     */
    public function addOnceToNotificationLocationWithCreate(): NotificationLocation
    {
        if (!is_array($this->notificationLocation)) {
            $this->notificationLocation = [];
        }

        if ([] === $this->notificationLocation) {
            $this->addOnceTonotificationLocation(new NotificationLocation());
        }

        return $this->notificationLocation[0];
    }
}
