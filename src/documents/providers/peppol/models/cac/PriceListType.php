<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\StatusCode;
use JMS\Serializer\Annotation as JMS;

class PriceListType
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
     * @var null|StatusCode
     */
    #[JMS\Accessor(getter: 'getStatusCode', setter: 'setStatusCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('StatusCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\StatusCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $statusCode;

    /**
     * @var null|array<ValidityPeriod>
     */
    #[JMS\Accessor(getter: 'getValidityPeriod', setter: 'setValidityPeriod')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ValidityPeriod')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\ValidityPeriod>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'ValidityPeriod', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $validityPeriod;

    /**
     * @var null|PreviousPriceList
     */
    #[JMS\Accessor(getter: 'getPreviousPriceList', setter: 'setPreviousPriceList')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PreviousPriceList')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\PreviousPriceList')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $previousPriceList;

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
     * @return null|StatusCode
     */
    public function getStatusCode(): ?StatusCode
    {
        return $this->statusCode;
    }

    /**
     * @return StatusCode
     */
    public function getStatusCodeWithCreate(): StatusCode
    {
        $this->statusCode ??= new StatusCode();

        return $this->statusCode;
    }

    /**
     * @param  null|StatusCode $statusCode
     * @return static
     */
    public function setStatusCode(
        ?StatusCode $statusCode = null
    ): static {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetStatusCode(): static
    {
        $this->statusCode = null;

        return $this;
    }

    /**
     * @return null|array<ValidityPeriod>
     */
    public function getValidityPeriod(): ?array
    {
        return $this->validityPeriod;
    }

    /**
     * @param  null|array<ValidityPeriod> $validityPeriod
     * @return static
     */
    public function setValidityPeriod(
        ?array $validityPeriod = null
    ): static {
        $this->validityPeriod = $validityPeriod;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValidityPeriod(): static
    {
        $this->validityPeriod = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearValidityPeriod(): static
    {
        $this->validityPeriod = [];

        return $this;
    }

    /**
     * @return null|ValidityPeriod
     */
    public function firstValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = reset($validityPeriod);

        if (false === $validityPeriod) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @return null|ValidityPeriod
     */
    public function lastValidityPeriod(): ?ValidityPeriod
    {
        $validityPeriod = $this->validityPeriod ?? [];
        $validityPeriod = end($validityPeriod);

        if (false === $validityPeriod) {
            return null;
        }

        return $validityPeriod;
    }

    /**
     * @param  ValidityPeriod $validityPeriod
     * @return static
     */
    public function addToValidityPeriod(
        ValidityPeriod $validityPeriod
    ): static {
        $this->validityPeriod[] = $validityPeriod;

        return $this;
    }

    /**
     * @return ValidityPeriod
     */
    public function addToValidityPeriodWithCreate(): ValidityPeriod
    {
        $this->addTovalidityPeriod($validityPeriod = new ValidityPeriod());

        return $validityPeriod;
    }

    /**
     * @param  ValidityPeriod $validityPeriod
     * @return static
     */
    public function addOnceToValidityPeriod(
        ValidityPeriod $validityPeriod
    ): static {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        $this->validityPeriod[0] = $validityPeriod;

        return $this;
    }

    /**
     * @return ValidityPeriod
     */
    public function addOnceToValidityPeriodWithCreate(): ValidityPeriod
    {
        if (!is_array($this->validityPeriod)) {
            $this->validityPeriod = [];
        }

        if ([] === $this->validityPeriod) {
            $this->addOnceTovalidityPeriod(new ValidityPeriod());
        }

        return $this->validityPeriod[0];
    }

    /**
     * @return null|PreviousPriceList
     */
    public function getPreviousPriceList(): ?PreviousPriceList
    {
        return $this->previousPriceList;
    }

    /**
     * @return PreviousPriceList
     */
    public function getPreviousPriceListWithCreate(): PreviousPriceList
    {
        $this->previousPriceList ??= new PreviousPriceList();

        return $this->previousPriceList;
    }

    /**
     * @param  null|PreviousPriceList $previousPriceList
     * @return static
     */
    public function setPreviousPriceList(
        ?PreviousPriceList $previousPriceList = null
    ): static {
        $this->previousPriceList = $previousPriceList;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPreviousPriceList(): static
    {
        $this->previousPriceList = null;

        return $this;
    }
}
