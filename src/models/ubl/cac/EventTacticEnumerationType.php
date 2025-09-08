<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ConsumerIncentiveTacticTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\DisplayTacticTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\FeatureTacticTypeCode;
use horstoeko\invoicesuite\models\ubl\cbc\TradeItemPackingLabelingTypeCode;

class EventTacticEnumerationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ConsumerIncentiveTacticTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ConsumerIncentiveTacticTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("ConsumerIncentiveTacticTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getConsumerIncentiveTacticTypeCode", setter="setConsumerIncentiveTacticTypeCode")
     */
    private $consumerIncentiveTacticTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\DisplayTacticTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\DisplayTacticTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("DisplayTacticTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDisplayTacticTypeCode", setter="setDisplayTacticTypeCode")
     */
    private $displayTacticTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\FeatureTacticTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\FeatureTacticTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("FeatureTacticTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getFeatureTacticTypeCode", setter="setFeatureTacticTypeCode")
     */
    private $featureTacticTypeCode;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\TradeItemPackingLabelingTypeCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\TradeItemPackingLabelingTypeCode")
     * @JMS\Expose
     * @JMS\SerializedName("TradeItemPackingLabelingTypeCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTradeItemPackingLabelingTypeCode", setter="setTradeItemPackingLabelingTypeCode")
     */
    private $tradeItemPackingLabelingTypeCode;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumerIncentiveTacticTypeCode|null
     */
    public function getConsumerIncentiveTacticTypeCode(): ?ConsumerIncentiveTacticTypeCode
    {
        return $this->consumerIncentiveTacticTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ConsumerIncentiveTacticTypeCode
     */
    public function getConsumerIncentiveTacticTypeCodeWithCreate(): ConsumerIncentiveTacticTypeCode
    {
        $this->consumerIncentiveTacticTypeCode = is_null($this->consumerIncentiveTacticTypeCode) ? new ConsumerIncentiveTacticTypeCode() : $this->consumerIncentiveTacticTypeCode;

        return $this->consumerIncentiveTacticTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ConsumerIncentiveTacticTypeCode|null $consumerIncentiveTacticTypeCode
     * @return self
     */
    public function setConsumerIncentiveTacticTypeCode(
        ?ConsumerIncentiveTacticTypeCode $consumerIncentiveTacticTypeCode = null,
    ): self {
        $this->consumerIncentiveTacticTypeCode = $consumerIncentiveTacticTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetConsumerIncentiveTacticTypeCode(): self
    {
        $this->consumerIncentiveTacticTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DisplayTacticTypeCode|null
     */
    public function getDisplayTacticTypeCode(): ?DisplayTacticTypeCode
    {
        return $this->displayTacticTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\DisplayTacticTypeCode
     */
    public function getDisplayTacticTypeCodeWithCreate(): DisplayTacticTypeCode
    {
        $this->displayTacticTypeCode = is_null($this->displayTacticTypeCode) ? new DisplayTacticTypeCode() : $this->displayTacticTypeCode;

        return $this->displayTacticTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\DisplayTacticTypeCode|null $displayTacticTypeCode
     * @return self
     */
    public function setDisplayTacticTypeCode(?DisplayTacticTypeCode $displayTacticTypeCode = null): self
    {
        $this->displayTacticTypeCode = $displayTacticTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDisplayTacticTypeCode(): self
    {
        $this->displayTacticTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FeatureTacticTypeCode|null
     */
    public function getFeatureTacticTypeCode(): ?FeatureTacticTypeCode
    {
        return $this->featureTacticTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\FeatureTacticTypeCode
     */
    public function getFeatureTacticTypeCodeWithCreate(): FeatureTacticTypeCode
    {
        $this->featureTacticTypeCode = is_null($this->featureTacticTypeCode) ? new FeatureTacticTypeCode() : $this->featureTacticTypeCode;

        return $this->featureTacticTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\FeatureTacticTypeCode|null $featureTacticTypeCode
     * @return self
     */
    public function setFeatureTacticTypeCode(?FeatureTacticTypeCode $featureTacticTypeCode = null): self
    {
        $this->featureTacticTypeCode = $featureTacticTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetFeatureTacticTypeCode(): self
    {
        $this->featureTacticTypeCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TradeItemPackingLabelingTypeCode|null
     */
    public function getTradeItemPackingLabelingTypeCode(): ?TradeItemPackingLabelingTypeCode
    {
        return $this->tradeItemPackingLabelingTypeCode;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\TradeItemPackingLabelingTypeCode
     */
    public function getTradeItemPackingLabelingTypeCodeWithCreate(): TradeItemPackingLabelingTypeCode
    {
        $this->tradeItemPackingLabelingTypeCode = is_null($this->tradeItemPackingLabelingTypeCode) ? new TradeItemPackingLabelingTypeCode() : $this->tradeItemPackingLabelingTypeCode;

        return $this->tradeItemPackingLabelingTypeCode;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\TradeItemPackingLabelingTypeCode|null $tradeItemPackingLabelingTypeCode
     * @return self
     */
    public function setTradeItemPackingLabelingTypeCode(
        ?TradeItemPackingLabelingTypeCode $tradeItemPackingLabelingTypeCode = null,
    ): self {
        $this->tradeItemPackingLabelingTypeCode = $tradeItemPackingLabelingTypeCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTradeItemPackingLabelingTypeCode(): self
    {
        $this->tradeItemPackingLabelingTypeCode = null;

        return $this;
    }
}
