<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType;
use JMS\Serializer\Annotation as JMS;

class ProductClassificationType
{
    use HandlesObjectFlags;

    /**
     * @var null|CodeType
     */
    #[JMS\Accessor(getter: 'getClassCode', setter: 'setClassCode')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ClassCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\CodeType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $classCode;

    /**
     * @var null|TextType
     */
    #[JMS\Accessor(getter: 'getClassName', setter: 'setClassName')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('ClassName')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\TextType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $className;

    /**
     * @return null|CodeType
     */
    public function getClassCode(): ?CodeType
    {
        return $this->classCode;
    }

    /**
     * @return CodeType
     */
    public function getClassCodeWithCreate(): CodeType
    {
        $this->classCode ??= new CodeType();

        return $this->classCode;
    }

    /**
     * @param  null|CodeType $classCode
     * @return static
     */
    public function setClassCode(
        ?CodeType $classCode = null
    ): static {
        $this->classCode = $classCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetClassCode(): static
    {
        $this->classCode = null;

        return $this;
    }

    /**
     * @return null|TextType
     */
    public function getClassName(): ?TextType
    {
        return $this->className;
    }

    /**
     * @return TextType
     */
    public function getClassNameWithCreate(): TextType
    {
        $this->className ??= new TextType();

        return $this->className;
    }

    /**
     * @param  null|TextType $className
     * @return static
     */
    public function setClassName(
        ?TextType $className = null
    ): static {
        $this->className = $className;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetClassName(): static
    {
        $this->className = null;

        return $this;
    }
}
