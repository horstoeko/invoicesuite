<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\zffx\models\ram;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType;
use JMS\Serializer\Annotation as JMS;

class ExchangedDocumentContextType
{
    use HandlesObjectFlags;

    /**
     * @var null|IndicatorType
     */
    #[JMS\Accessor(getter: 'getTestIndicator', setter: 'setTestIndicator')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('TestIndicator')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\udt\IndicatorType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $testIndicator;

    /**
     * @var null|DocumentContextParameterType
     */
    #[JMS\Accessor(getter: 'getBusinessProcessSpecifiedDocumentContextParameter', setter: 'setBusinessProcessSpecifiedDocumentContextParameter')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('BusinessProcessSpecifiedDocumentContextParameter')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\DocumentContextParameterType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $businessProcessSpecifiedDocumentContextParameter;

    /**
     * @var null|DocumentContextParameterType
     */
    #[JMS\Accessor(getter: 'getGuidelineSpecifiedDocumentContextParameter', setter: 'setGuidelineSpecifiedDocumentContextParameter')]
    #[JMS\Expose]
    #[JMS\Groups(['zffx'])]
    #[JMS\SerializedName('GuidelineSpecifiedDocumentContextParameter')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\zffx\models\ram\DocumentContextParameterType')]
    #[JMS\XmlElement(namespace: 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100', cdata: false)]
    private $guidelineSpecifiedDocumentContextParameter;

    /**
     * @return null|IndicatorType
     */
    public function getTestIndicator(): ?IndicatorType
    {
        return $this->testIndicator;
    }

    /**
     * @return IndicatorType
     */
    public function getTestIndicatorWithCreate(): IndicatorType
    {
        $this->testIndicator ??= new IndicatorType();

        return $this->testIndicator;
    }

    /**
     * @param  null|IndicatorType $testIndicator
     * @return static
     */
    public function setTestIndicator(
        ?IndicatorType $testIndicator = null
    ): static {
        $this->testIndicator = $testIndicator;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetTestIndicator(): static
    {
        $this->testIndicator = null;

        return $this;
    }

    /**
     * @return null|DocumentContextParameterType
     */
    public function getBusinessProcessSpecifiedDocumentContextParameter(): ?DocumentContextParameterType
    {
        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @return DocumentContextParameterType
     */
    public function getBusinessProcessSpecifiedDocumentContextParameterWithCreate(): DocumentContextParameterType
    {
        $this->businessProcessSpecifiedDocumentContextParameter ??= new DocumentContextParameterType();

        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @param  null|DocumentContextParameterType $businessProcessSpecifiedDocumentContextParameter
     * @return static
     */
    public function setBusinessProcessSpecifiedDocumentContextParameter(
        ?DocumentContextParameterType $businessProcessSpecifiedDocumentContextParameter = null,
    ): static {
        $this->businessProcessSpecifiedDocumentContextParameter = $businessProcessSpecifiedDocumentContextParameter;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBusinessProcessSpecifiedDocumentContextParameter(): static
    {
        $this->businessProcessSpecifiedDocumentContextParameter = null;

        return $this;
    }

    /**
     * @return null|DocumentContextParameterType
     */
    public function getGuidelineSpecifiedDocumentContextParameter(): ?DocumentContextParameterType
    {
        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @return DocumentContextParameterType
     */
    public function getGuidelineSpecifiedDocumentContextParameterWithCreate(): DocumentContextParameterType
    {
        $this->guidelineSpecifiedDocumentContextParameter ??= new DocumentContextParameterType();

        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @param  null|DocumentContextParameterType $guidelineSpecifiedDocumentContextParameter
     * @return static
     */
    public function setGuidelineSpecifiedDocumentContextParameter(
        ?DocumentContextParameterType $guidelineSpecifiedDocumentContextParameter = null,
    ): static {
        $this->guidelineSpecifiedDocumentContextParameter = $guidelineSpecifiedDocumentContextParameter;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetGuidelineSpecifiedDocumentContextParameter(): static
    {
        $this->guidelineSpecifiedDocumentContextParameter = null;

        return $this;
    }
}
