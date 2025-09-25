<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Description;

class AppealTermsType
{
    use HandlesObjectFlags;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Description", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\PresentationPeriod|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\PresentationPeriod")
     * @JMS\Expose
     * @JMS\SerializedName("PresentationPeriod")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPresentationPeriod", setter="setPresentationPeriod")
     */
    private $presentationPeriod;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealInformationParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\AppealInformationParty")
     * @JMS\Expose
     * @JMS\SerializedName("AppealInformationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAppealInformationParty", setter="setAppealInformationParty")
     */
    private $appealInformationParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealReceiverParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\AppealReceiverParty")
     * @JMS\Expose
     * @JMS\SerializedName("AppealReceiverParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAppealReceiverParty", setter="setAppealReceiverParty")
     */
    private $appealReceiverParty;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\MediationParty|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\MediationParty")
     * @JMS\Expose
     * @JMS\SerializedName("MediationParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getMediationParty", setter="setMediationParty")
     */
    private $mediationParty;

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null
     */
    public function getDescription(): ?array
    {
        return $this->description;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cbc\Description>|null $description
     * @return self
     */
    public function setDescription(?array $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearDescription(): self
    {
        $this->description = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function firstDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = reset($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description|null
     */
    public function lastDescription(): ?Description
    {
        $description = $this->description ?? [];
        $description = end($description);

        if ($description === false) {
            return null;
        }

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addToDescription(Description $description): self
    {
        $this->description[] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addToDescriptionWithCreate(): Description
    {
        $this->addTodescription($description = new Description());

        return $description;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description $description
     * @return self
     */
    public function addOnceToDescription(Description $description): self
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        $this->description[0] = $description;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Description
     */
    public function addOnceToDescriptionWithCreate(): Description
    {
        if (!is_array($this->description)) {
            $this->description = [];
        }

        if ($this->description === []) {
            $this->addOnceTodescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PresentationPeriod|null
     */
    public function getPresentationPeriod(): ?PresentationPeriod
    {
        return $this->presentationPeriod;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\PresentationPeriod
     */
    public function getPresentationPeriodWithCreate(): PresentationPeriod
    {
        $this->presentationPeriod = is_null($this->presentationPeriod) ? new PresentationPeriod() : $this->presentationPeriod;

        return $this->presentationPeriod;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\PresentationPeriod|null $presentationPeriod
     * @return self
     */
    public function setPresentationPeriod(?PresentationPeriod $presentationPeriod = null): self
    {
        $this->presentationPeriod = $presentationPeriod;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPresentationPeriod(): self
    {
        $this->presentationPeriod = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealInformationParty|null
     */
    public function getAppealInformationParty(): ?AppealInformationParty
    {
        return $this->appealInformationParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealInformationParty
     */
    public function getAppealInformationPartyWithCreate(): AppealInformationParty
    {
        $this->appealInformationParty = is_null($this->appealInformationParty) ? new AppealInformationParty() : $this->appealInformationParty;

        return $this->appealInformationParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealInformationParty|null $appealInformationParty
     * @return self
     */
    public function setAppealInformationParty(?AppealInformationParty $appealInformationParty = null): self
    {
        $this->appealInformationParty = $appealInformationParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAppealInformationParty(): self
    {
        $this->appealInformationParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealReceiverParty|null
     */
    public function getAppealReceiverParty(): ?AppealReceiverParty
    {
        return $this->appealReceiverParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealReceiverParty
     */
    public function getAppealReceiverPartyWithCreate(): AppealReceiverParty
    {
        $this->appealReceiverParty = is_null($this->appealReceiverParty) ? new AppealReceiverParty() : $this->appealReceiverParty;

        return $this->appealReceiverParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\AppealReceiverParty|null $appealReceiverParty
     * @return self
     */
    public function setAppealReceiverParty(?AppealReceiverParty $appealReceiverParty = null): self
    {
        $this->appealReceiverParty = $appealReceiverParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAppealReceiverParty(): self
    {
        $this->appealReceiverParty = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MediationParty|null
     */
    public function getMediationParty(): ?MediationParty
    {
        return $this->mediationParty;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\MediationParty
     */
    public function getMediationPartyWithCreate(): MediationParty
    {
        $this->mediationParty = is_null($this->mediationParty) ? new MediationParty() : $this->mediationParty;

        return $this->mediationParty;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\MediationParty|null $mediationParty
     * @return self
     */
    public function setMediationParty(?MediationParty $mediationParty = null): self
    {
        $this->mediationParty = $mediationParty;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetMediationParty(): self
    {
        $this->mediationParty = null;

        return $this;
    }
}
