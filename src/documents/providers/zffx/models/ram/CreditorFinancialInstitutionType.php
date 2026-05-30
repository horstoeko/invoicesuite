<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use JMS\Serializer\Annotation as JMS;

class CreditorFinancialInstitutionType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getBICID', setter: 'setBICID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BICID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $bICID;

    /**
     * @return null|IDType
     */
    public function getBICID(): ?IDType
    {
        return $this->bICID;
    }

    /**
     * @return IDType
     */
    public function getBICIDWithCreate(): IDType
    {
        $this->bICID ??= new IDType();

        return $this->bICID;
    }

    /**
     * @param  null|IDType $bICID
     * @return static
     */
    public function setBICID(
        ?IDType $bICID = null
    ): static {
        $this->bICID = $bICID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBICID(): static
    {
        $this->bICID = null;

        return $this;
    }
}
