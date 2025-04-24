<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IndicatorType;

class ExchangedDocumentContextType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("TestIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTestIndicator", setter="setTestIndicator")
     */
    private $testIndicator;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType")
     * @JMS\Expose
     * @JMS\SerializedName("BusinessProcessSpecifiedDocumentContextParameter")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBusinessProcessSpecifiedDocumentContextParameter", setter="setBusinessProcessSpecifiedDocumentContextParameter")
     */
    private $businessProcessSpecifiedDocumentContextParameter;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType")
     * @JMS\Expose
     * @JMS\SerializedName("GuidelineSpecifiedDocumentContextParameter")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGuidelineSpecifiedDocumentContextParameter", setter="setGuidelineSpecifiedDocumentContextParameter")
     */
    private $guidelineSpecifiedDocumentContextParameter;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType|null
     */
    public function getTestIndicator(): ?IndicatorType
    {
        return $this->testIndicator;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     */
    public function getTestIndicatorWithCreate(): IndicatorType
    {
        $this->testIndicator = is_null($this->testIndicator) ? new IndicatorType() : $this->testIndicator;

        return $this->testIndicator;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType $testIndicator
     * @return self
     */
    public function setTestIndicator(IndicatorType $testIndicator): self
    {
        $this->testIndicator = $testIndicator;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType|null
     */
    public function getBusinessProcessSpecifiedDocumentContextParameter(): ?DocumentContextParameterType
    {
        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     */
    public function getBusinessProcessSpecifiedDocumentContextParameterWithCreate(): DocumentContextParameterType
    {
        $this->businessProcessSpecifiedDocumentContextParameter = is_null($this->businessProcessSpecifiedDocumentContextParameter) ? new DocumentContextParameterType() : $this->businessProcessSpecifiedDocumentContextParameter;

        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType $businessProcessSpecifiedDocumentContextParameter
     * @return self
     */
    public function setBusinessProcessSpecifiedDocumentContextParameter(
        DocumentContextParameterType $businessProcessSpecifiedDocumentContextParameter,
    ): self {
        $this->businessProcessSpecifiedDocumentContextParameter = $businessProcessSpecifiedDocumentContextParameter;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType|null
     */
    public function getGuidelineSpecifiedDocumentContextParameter(): ?DocumentContextParameterType
    {
        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     */
    public function getGuidelineSpecifiedDocumentContextParameterWithCreate(): DocumentContextParameterType
    {
        $this->guidelineSpecifiedDocumentContextParameter = is_null($this->guidelineSpecifiedDocumentContextParameter) ? new DocumentContextParameterType() : $this->guidelineSpecifiedDocumentContextParameter;

        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType $guidelineSpecifiedDocumentContextParameter
     * @return self
     */
    public function setGuidelineSpecifiedDocumentContextParameter(
        DocumentContextParameterType $guidelineSpecifiedDocumentContextParameter,
    ): self {
        $this->guidelineSpecifiedDocumentContextParameter = $guidelineSpecifiedDocumentContextParameter;

        return $this;
    }
}
