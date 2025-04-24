<?php

namespace horstoeko\invoicesuite\models\zffx\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\models\zffx\udt\IndicatorType;

class ExchangedDocumentContextType
{
    /**
     * @var \horstoeko\invoicesuite\models\zffx\udt\IndicatorType
     * @JMS\Groups({"zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\udt\IndicatorType")
     * @JMS\Expose
     * @JMS\SerializedName("TestIndicator")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getTestIndicator", setter="setTestIndicator")
     */
    private $indicatorType;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType")
     * @JMS\Expose
     * @JMS\SerializedName("BusinessProcessSpecifiedDocumentContextParameter")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getBusinessProcessSpecifiedDocumentContextParameter", setter="setBusinessProcessSpecifiedDocumentContextParameter")
     */
    private $businessProcessSpecifiedDocumentContextParameter;

    /**
     * @var \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType
     * @JMS\Groups({"zffxminimum", "zffxbasic", "zffxbasicwl", "zffxen16931", "zffxextended"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType")
     * @JMS\Expose
     * @JMS\SerializedName("GuidelineSpecifiedDocumentContextParameter")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getGuidelineSpecifiedDocumentContextParameter", setter="setGuidelineSpecifiedDocumentContextParameter")
     */
    private $guidelineSpecifiedDocumentContextParameter;

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IndicatorType|null
     */
    public function getTestIndicator(): ?IndicatorType
    {
        return $this->indicatorType;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\udt\IndicatorType
     */
    public function getTestIndicatorWithCreate(): IndicatorType
    {
        $this->indicatorType = is_null($this->indicatorType) ? new IndicatorType() : $this->indicatorType;

        return $this->indicatorType;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\udt\IndicatorType $indicatorType
     * @return self
     */
    public function setTestIndicator(IndicatorType $indicatorType): self
    {
        $this->indicatorType = $indicatorType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType|null
     */
    public function getBusinessProcessSpecifiedDocumentContextParameter(): ?DocumentContextParameterType
    {
        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType
     */
    public function getBusinessProcessSpecifiedDocumentContextParameterWithCreate(): DocumentContextParameterType
    {
        $this->businessProcessSpecifiedDocumentContextParameter = is_null($this->businessProcessSpecifiedDocumentContextParameter) ? new DocumentContextParameterType() : $this->businessProcessSpecifiedDocumentContextParameter;

        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType $documentContextParameterType
     * @return self
     */
    public function setBusinessProcessSpecifiedDocumentContextParameter(
        DocumentContextParameterType $documentContextParameterType,
    ): self {
        $this->businessProcessSpecifiedDocumentContextParameter = $documentContextParameterType;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType|null
     */
    public function getGuidelineSpecifiedDocumentContextParameter(): ?DocumentContextParameterType
    {
        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType
     */
    public function getGuidelineSpecifiedDocumentContextParameterWithCreate(): DocumentContextParameterType
    {
        $this->guidelineSpecifiedDocumentContextParameter = is_null($this->guidelineSpecifiedDocumentContextParameter) ? new DocumentContextParameterType() : $this->guidelineSpecifiedDocumentContextParameter;

        return $this->guidelineSpecifiedDocumentContextParameter;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffx\ram\DocumentContextParameterType $documentContextParameterType
     * @return self
     */
    public function setGuidelineSpecifiedDocumentContextParameter(
        DocumentContextParameterType $documentContextParameterType,
    ): self {
        $this->guidelineSpecifiedDocumentContextParameter = $documentContextParameterType;

        return $this;
    }
}
