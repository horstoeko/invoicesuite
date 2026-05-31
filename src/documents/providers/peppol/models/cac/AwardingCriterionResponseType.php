<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AwardingCriterionDescription;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AwardingCriterionID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Description;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity;
use JMS\Serializer\Annotation as JMS;

class AwardingCriterionResponseType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|AwardingCriterionID
     */
    #[JMS\Accessor(getter: 'getAwardingCriterionID', setter: 'setAwardingCriterionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AwardingCriterionID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AwardingCriterionID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $awardingCriterionID;

    /**
     * @var null|array<AwardingCriterionDescription>
     */
    #[JMS\Accessor(getter: 'getAwardingCriterionDescription', setter: 'setAwardingCriterionDescription')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('AwardingCriterionDescription')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\AwardingCriterionDescription>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'AwardingCriterionDescription', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $awardingCriterionDescription;

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
     * @var null|Quantity
     */
    #[JMS\Accessor(getter: 'getQuantity', setter: 'setQuantity')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Quantity')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Quantity')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $quantity;

    /**
     * @var null|Amount
     */
    #[JMS\Accessor(getter: 'getAmount', setter: 'setAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Amount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Amount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $amount;

    /**
     * @var null|array<SubordinateAwardingCriterionResponse>
     */
    #[JMS\Accessor(getter: 'getSubordinateAwardingCriterionResponse', setter: 'setSubordinateAwardingCriterionResponse')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('SubordinateAwardingCriterionResponse')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\SubordinateAwardingCriterionResponse>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'SubordinateAwardingCriterionResponse', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $subordinateAwardingCriterionResponse;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|AwardingCriterionID
     */
    public function getAwardingCriterionID(): ?AwardingCriterionID
    {
        return $this->awardingCriterionID;
    }

    /**
     * @return AwardingCriterionID
     */
    public function getAwardingCriterionIDWithCreate(): AwardingCriterionID
    {
        $this->awardingCriterionID ??= new AwardingCriterionID();

        return $this->awardingCriterionID;
    }

    /**
     * @param  null|AwardingCriterionID $awardingCriterionID
     * @return static
     */
    public function setAwardingCriterionID(
        ?AwardingCriterionID $awardingCriterionID = null
    ): static {
        $this->awardingCriterionID = $awardingCriterionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardingCriterionID(): static
    {
        $this->awardingCriterionID = null;

        return $this;
    }

    /**
     * @return null|array<AwardingCriterionDescription>
     */
    public function getAwardingCriterionDescription(): ?array
    {
        return $this->awardingCriterionDescription;
    }

    /**
     * @param  null|array<AwardingCriterionDescription> $awardingCriterionDescription
     * @return static
     */
    public function setAwardingCriterionDescription(
        ?array $awardingCriterionDescription = null
    ): static {
        $this->awardingCriterionDescription = $awardingCriterionDescription;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAwardingCriterionDescription(): static
    {
        $this->awardingCriterionDescription = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearAwardingCriterionDescription(): static
    {
        $this->awardingCriterionDescription = [];

        return $this;
    }

    /**
     * @return null|AwardingCriterionDescription
     */
    public function firstAwardingCriterionDescription(): ?AwardingCriterionDescription
    {
        $awardingCriterionDescription = $this->awardingCriterionDescription ?? [];
        $awardingCriterionDescription = reset($awardingCriterionDescription);

        if (false === $awardingCriterionDescription) {
            return null;
        }

        return $awardingCriterionDescription;
    }

    /**
     * @return null|AwardingCriterionDescription
     */
    public function lastAwardingCriterionDescription(): ?AwardingCriterionDescription
    {
        $awardingCriterionDescription = $this->awardingCriterionDescription ?? [];
        $awardingCriterionDescription = end($awardingCriterionDescription);

        if (false === $awardingCriterionDescription) {
            return null;
        }

        return $awardingCriterionDescription;
    }

    /**
     * @param  AwardingCriterionDescription $awardingCriterionDescription
     * @return static
     */
    public function addToAwardingCriterionDescription(
        AwardingCriterionDescription $awardingCriterionDescription,
    ): static {
        $this->awardingCriterionDescription[] = $awardingCriterionDescription;

        return $this;
    }

    /**
     * @return AwardingCriterionDescription
     */
    public function addToAwardingCriterionDescriptionWithCreate(): AwardingCriterionDescription
    {
        $this->addToAwardingCriterionDescription($awardingCriterionDescription = new AwardingCriterionDescription());

        return $awardingCriterionDescription;
    }

    /**
     * @param  AwardingCriterionDescription $awardingCriterionDescription
     * @return static
     */
    public function addOnceToAwardingCriterionDescription(
        AwardingCriterionDescription $awardingCriterionDescription,
    ): static {
        if (!is_array($this->awardingCriterionDescription)) {
            $this->awardingCriterionDescription = [];
        }

        $this->awardingCriterionDescription[0] = $awardingCriterionDescription;

        return $this;
    }

    /**
     * @return AwardingCriterionDescription
     */
    public function addOnceToAwardingCriterionDescriptionWithCreate(): AwardingCriterionDescription
    {
        if (!is_array($this->awardingCriterionDescription)) {
            $this->awardingCriterionDescription = [];
        }

        if ([] === $this->awardingCriterionDescription) {
            $this->addOnceToAwardingCriterionDescription(new AwardingCriterionDescription());
        }

        return $this->awardingCriterionDescription[0];
    }

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
        $this->addToDescription($description = new Description());

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
            $this->addOnceToDescription(new Description());
        }

        return $this->description[0];
    }

    /**
     * @return null|Quantity
     */
    public function getQuantity(): ?Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Quantity
     */
    public function getQuantityWithCreate(): Quantity
    {
        $this->quantity ??= new Quantity();

        return $this->quantity;
    }

    /**
     * @param  null|Quantity $quantity
     * @return static
     */
    public function setQuantity(
        ?Quantity $quantity = null
    ): static {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuantity(): static
    {
        $this->quantity = null;

        return $this;
    }

    /**
     * @return null|Amount
     */
    public function getAmount(): ?Amount
    {
        return $this->amount;
    }

    /**
     * @return Amount
     */
    public function getAmountWithCreate(): Amount
    {
        $this->amount ??= new Amount();

        return $this->amount;
    }

    /**
     * @param  null|Amount $amount
     * @return static
     */
    public function setAmount(
        ?Amount $amount = null
    ): static {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAmount(): static
    {
        $this->amount = null;

        return $this;
    }

    /**
     * @return null|array<SubordinateAwardingCriterionResponse>
     */
    public function getSubordinateAwardingCriterionResponse(): ?array
    {
        return $this->subordinateAwardingCriterionResponse;
    }

    /**
     * @param  null|array<SubordinateAwardingCriterionResponse> $subordinateAwardingCriterionResponse
     * @return static
     */
    public function setSubordinateAwardingCriterionResponse(
        ?array $subordinateAwardingCriterionResponse = null
    ): static {
        $this->subordinateAwardingCriterionResponse = $subordinateAwardingCriterionResponse;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubordinateAwardingCriterionResponse(): static
    {
        $this->subordinateAwardingCriterionResponse = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSubordinateAwardingCriterionResponse(): static
    {
        $this->subordinateAwardingCriterionResponse = [];

        return $this;
    }

    /**
     * @return null|SubordinateAwardingCriterionResponse
     */
    public function firstSubordinateAwardingCriterionResponse(): ?SubordinateAwardingCriterionResponse
    {
        $subordinateAwardingCriterionResponse = $this->subordinateAwardingCriterionResponse ?? [];
        $subordinateAwardingCriterionResponse = reset($subordinateAwardingCriterionResponse);

        if (false === $subordinateAwardingCriterionResponse) {
            return null;
        }

        return $subordinateAwardingCriterionResponse;
    }

    /**
     * @return null|SubordinateAwardingCriterionResponse
     */
    public function lastSubordinateAwardingCriterionResponse(): ?SubordinateAwardingCriterionResponse
    {
        $subordinateAwardingCriterionResponse = $this->subordinateAwardingCriterionResponse ?? [];
        $subordinateAwardingCriterionResponse = end($subordinateAwardingCriterionResponse);

        if (false === $subordinateAwardingCriterionResponse) {
            return null;
        }

        return $subordinateAwardingCriterionResponse;
    }

    /**
     * @param  SubordinateAwardingCriterionResponse $subordinateAwardingCriterionResponse
     * @return static
     */
    public function addToSubordinateAwardingCriterionResponse(
        SubordinateAwardingCriterionResponse $subordinateAwardingCriterionResponse,
    ): static {
        $this->subordinateAwardingCriterionResponse[] = $subordinateAwardingCriterionResponse;

        return $this;
    }

    /**
     * @return SubordinateAwardingCriterionResponse
     */
    public function addToSubordinateAwardingCriterionResponseWithCreate(): SubordinateAwardingCriterionResponse
    {
        $this->addToSubordinateAwardingCriterionResponse($subordinateAwardingCriterionResponse = new SubordinateAwardingCriterionResponse());

        return $subordinateAwardingCriterionResponse;
    }

    /**
     * @param  SubordinateAwardingCriterionResponse $subordinateAwardingCriterionResponse
     * @return static
     */
    public function addOnceToSubordinateAwardingCriterionResponse(
        SubordinateAwardingCriterionResponse $subordinateAwardingCriterionResponse,
    ): static {
        if (!is_array($this->subordinateAwardingCriterionResponse)) {
            $this->subordinateAwardingCriterionResponse = [];
        }

        $this->subordinateAwardingCriterionResponse[0] = $subordinateAwardingCriterionResponse;

        return $this;
    }

    /**
     * @return SubordinateAwardingCriterionResponse
     */
    public function addOnceToSubordinateAwardingCriterionResponseWithCreate(): SubordinateAwardingCriterionResponse
    {
        if (!is_array($this->subordinateAwardingCriterionResponse)) {
            $this->subordinateAwardingCriterionResponse = [];
        }

        if ([] === $this->subordinateAwardingCriterionResponse) {
            $this->addOnceToSubordinateAwardingCriterionResponse(new SubordinateAwardingCriterionResponse());
        }

        return $this->subordinateAwardingCriterionResponse[0];
    }
}
