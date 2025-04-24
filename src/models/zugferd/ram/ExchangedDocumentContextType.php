<?php

namespace horstoeko\invoicesuite\models\zugferd\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zugferd\udt\IndicatorType;

class ExchangedDocumentContextType
{
    /**
     * @var \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("TestIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTestIndicator", setter="setTestIndicator")
     */
    private $indicatorType;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\DocumentContextParameterType")
     * @JMS\Expose
     * @JMS\SerializedName("BusinessProcessSpecifiedDocumentContextParameter")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBusinessProcessSpecifiedDocumentContextParameter", setter="setBusinessProcessSpecifiedDocumentContextParameter")
     */
    private $businessProcessSpecifiedDocumentContextParameter;

    /**
     * @var \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\zugferd\entities\extended\ram\DocumentContextParameterType")
     * @JMS\Expose
     * @JMS\SerializedName("GuidelineSpecifiedDocumentContextParameter")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGuidelineSpecifiedDocumentContextParameter", setter="setGuidelineSpecifiedDocumentContextParameter")
     */
    private $guidelineSpecifiedDocumentContextParameter;

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType|null
     */
    public function getTestIndicator(): ?\horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
    {
        return $this->indicatorType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     */
    public function getTestIndicatorWithCreate(): \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
    {
        $this->indicatorType = is_null($this->indicatorType) ? new IndicatorType() : $this->indicatorType;

        return $this->indicatorType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\udt\IndicatorType
     * @return self
     */
    public function setTestIndicator(\horstoeko\invoicesuite\models\zugferd\udt\IndicatorType $indicatorType): self
    {
        $this->indicatorType = $indicatorType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType|null
     */
    public function getBusinessProcessSpecifiedDocumentContextParameter(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType {
        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     */
    public function getBusinessProcessSpecifiedDocumentContextParameterWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType {
        $this->businessProcessSpecifiedDocumentContextParameter = is_null($this->businessProcessSpecifiedDocumentContextParameter) ? new DocumentContextParameterType() : $this->businessProcessSpecifiedDocumentContextParameter;

        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     * @return self
     */
    public function setBusinessProcessSpecifiedDocumentContextParameter(
        \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType $documentContextParameterType,
    ): self {
        $this->businessProcessSpecifiedDocumentContextParameter = $documentContextParameterType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType|null
     */
    public function getGuidelineSpecifiedDocumentContextParameter(
    ): ?\horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType {
        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     */
    public function getGuidelineSpecifiedDocumentContextParameterWithCreate(
    ): \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType {
        $this->guidelineSpecifiedDocumentContextParameter = is_null($this->guidelineSpecifiedDocumentContextParameter) ? new DocumentContextParameterType() : $this->guidelineSpecifiedDocumentContextParameter;

        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType
     * @return self
     */
    public function setGuidelineSpecifiedDocumentContextParameter(
        \horstoeko\invoicesuite\models\zugferd\ram\DocumentContextParameterType $documentContextParameterType,
    ): self {
        $this->guidelineSpecifiedDocumentContextParameter = $documentContextParameterType;

        return $this;
    }
}
