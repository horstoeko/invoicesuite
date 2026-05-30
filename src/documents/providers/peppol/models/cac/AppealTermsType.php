<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use JMS\Serializer\Annotation as JMS;

class AppealTermsType
{
    use HandlesObjectFlags;

    /**
     * @var null|array<Description>
     */
    #[JMS\Accessor(getter: 'getDescription', setter: 'setDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Description')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Description', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $description;

    /**
     * @var null|PresentationPeriod
     */
    #[JMS\Accessor(getter: 'getPresentationPeriod', setter: 'setPresentationPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PresentationPeriod')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PresentationPeriod')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $presentationPeriod;

    /**
     * @var null|AppealInformationParty
     */
    #[JMS\Accessor(getter: 'getAppealInformationParty', setter: 'setAppealInformationParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AppealInformationParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AppealInformationParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $appealInformationParty;

    /**
     * @var null|AppealReceiverParty
     */
    #[JMS\Accessor(getter: 'getAppealReceiverParty', setter: 'setAppealReceiverParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AppealReceiverParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\AppealReceiverParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $appealReceiverParty;

    /**
     * @var null|MediationParty
     */
    #[JMS\Accessor(getter: 'getMediationParty', setter: 'setMediationParty')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('MediationParty')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\MediationParty')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
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
    public function setDescription(
        ?array $description = null
    ): static {
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
    public function addToDescription(
        Description $description
    ): static {
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
    public function addOnceToDescription(
        Description $description
    ): static {
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
        $this->presentationPeriod ??= new PresentationPeriod();

        return $this->presentationPeriod;
    }

    /**
     * @param  null|PresentationPeriod $presentationPeriod
     * @return static
     */
    public function setPresentationPeriod(
        ?PresentationPeriod $presentationPeriod = null
    ): static {
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
        $this->appealInformationParty ??= new AppealInformationParty();

        return $this->appealInformationParty;
    }

    /**
     * @param  null|AppealInformationParty $appealInformationParty
     * @return static
     */
    public function setAppealInformationParty(
        ?AppealInformationParty $appealInformationParty = null
    ): static {
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
        $this->appealReceiverParty ??= new AppealReceiverParty();

        return $this->appealReceiverParty;
    }

    /**
     * @param  null|AppealReceiverParty $appealReceiverParty
     * @return static
     */
    public function setAppealReceiverParty(
        ?AppealReceiverParty $appealReceiverParty = null
    ): static {
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
        $this->mediationParty ??= new MediationParty();

        return $this->mediationParty;
    }

    /**
     * @param  null|MediationParty $mediationParty
     * @return static
     */
    public function setMediationParty(
        ?MediationParty $mediationParty = null
    ): static {
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
