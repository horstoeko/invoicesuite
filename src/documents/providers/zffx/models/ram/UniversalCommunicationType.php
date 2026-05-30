<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class UniversalCommunicationType
{
    use HandlesObjectFlags;

    /**
     * @var null|IDType
     */
    #[JMS\Accessor(getter: 'getURIID', setter: 'setURIID')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('URIID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IDType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $uRIID;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getCompleteNumber', setter: 'setCompleteNumber')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('CompleteNumber')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $completeNumber;

    /**
     * @return null|IDType
     */
    public function getURIID(): ?IDType
    {
        return $this->uRIID;
    }

    /**
     * @return IDType
     */
    public function getURIIDWithCreate(): IDType
    {
        $this->uRIID ??= new IDType();

        return $this->uRIID;
    }

    /**
     * @param  null|IDType $uRIID
     * @return static
     */
    public function setURIID(
        ?IDType $uRIID = null
    ): static {
        $this->uRIID = $uRIID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetURIID(): static
    {
        $this->uRIID = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getCompleteNumber(): ?TextType
    {
        return $this->completeNumber;
    }

    /**
     * @return TextType
     */
    public function getCompleteNumberWithCreate(): TextType
    {
        $this->completeNumber ??= new TextType();

        return $this->completeNumber;
    }

    /**
     * @param  null|TextType $completeNumber
     * @return static
     */
    public function setCompleteNumber(
        ?TextType $completeNumber = null
    ): static {
        $this->completeNumber = $completeNumber;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCompleteNumber(): static
    {
        $this->completeNumber = null;

        return $this;
    }
}
