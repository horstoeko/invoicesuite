<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\ubl\cbc\Description;
use JMS\Serializer\Annotation as JMS;

class AppealTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<Description>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var null|PresentationPeriod
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\PresentationPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PresentationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPresentationPeriod", setter="setPresentationPeriod")
     */
    private $presentationPeriod;

    /**
     * @var null|AppealInformationParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AppealInformationParty")
     * @JMS\Expose
     * @JMS\SerializedName("AppealInformationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAppealInformationParty", setter="setAppealInformationParty")
     */
    private $appealInformationParty;

    /**
     * @var null|AppealReceiverParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\AppealReceiverParty")
     * @JMS\Expose
     * @JMS\SerializedName("AppealReceiverParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAppealReceiverParty", setter="setAppealReceiverParty")
     */
    private $appealReceiverParty;

    /**
     * @var null|MediationParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\MediationParty")
     * @JMS\Expose
     * @JMS\SerializedName("MediationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMediationParty", setter="setMediationParty")
     */
    private $mediationParty;

    /**
     * @return null|array<Description>
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param  null|array<Description> $description
     * @return static
     */
    public function setDescription(?array $description = null): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDescription(): static
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDescription(): static
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return null|Description
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @return null|Description
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if (false === $description) {
            return null;
        }

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addToDescription(Description $description): static
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param  Description $description
     * @return static
     */
    public function addOnceToDescription(Description $description): static
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ([] === $this->description) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|PresentationPeriod
     */
    public function getPresentationPeriod(): ?PresentationPeriod
    {
        return $this->presentationPeriod;
    }

    /**
     * @return PresentationPeriod
     */
    public function getPresentationPeriodWithCreate(): PresentationPeriod
    {
        $this->presentationPeriod = is_null($this->presentationPeriod) ? new PresentationPeriod() : $this->presentationPeriod;

        return $this->presentationPeriod;
    }

    /**
     * @param  null|PresentationPeriod $presentationPeriod
     * @return static
     */
    public function setPresentationPeriod(?PresentationPeriod $presentationPeriod = null): static
    {
        $this->presentationPeriod = $presentationPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPresentationPeriod(): static
    {
        $this->presentationPeriod = null;

        return $this;
    }

    /**
     * @return null|AppealInformationParty
     */
    public function getAppealInformationParty(): ?AppealInformationParty
    {
        return $this->appealInformationParty;
    }

    /**
     * @return AppealInformationParty
     */
    public function getAppealInformationPartyWithCreate(): AppealInformationParty
    {
        $this->appealInformationParty = is_null($this->appealInformationParty) ? new AppealInformationParty() : $this->appealInformationParty;

        return $this->appealInformationParty;
    }

    /**
     * @param  null|AppealInformationParty $appealInformationParty
     * @return static
     */
    public function setAppealInformationParty(?AppealInformationParty $appealInformationParty = null): static
    {
        $this->appealInformationParty = $appealInformationParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAppealInformationParty(): static
    {
        $this->appealInformationParty = null;

        return $this;
    }

    /**
     * @return null|AppealReceiverParty
     */
    public function getAppealReceiverParty(): ?AppealReceiverParty
    {
        return $this->appealReceiverParty;
    }

    /**
     * @return AppealReceiverParty
     */
    public function getAppealReceiverPartyWithCreate(): AppealReceiverParty
    {
        $this->appealReceiverParty = is_null($this->appealReceiverParty) ? new AppealReceiverParty() : $this->appealReceiverParty;

        return $this->appealReceiverParty;
    }

    /**
     * @param  null|AppealReceiverParty $appealReceiverParty
     * @return static
     */
    public function setAppealReceiverParty(?AppealReceiverParty $appealReceiverParty = null): static
    {
        $this->appealReceiverParty = $appealReceiverParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAppealReceiverParty(): static
    {
        $this->appealReceiverParty = null;

        return $this;
    }

    /**
     * @return null|MediationParty
     */
    public function getMediationParty(): ?MediationParty
    {
        return $this->mediationParty;
    }

    /**
     * @return MediationParty
     */
    public function getMediationPartyWithCreate(): MediationParty
    {
        $this->mediationParty = is_null($this->mediationParty) ? new MediationParty() : $this->mediationParty;

        return $this->mediationParty;
    }

    /**
     * @param  null|MediationParty $mediationParty
     * @return static
     */
    public function setMediationParty(?MediationParty $mediationParty = null): static
    {
        $this->mediationParty = $mediationParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetMediationParty(): static
    {
        $this->mediationParty = null;

        return $this;
    }
}
