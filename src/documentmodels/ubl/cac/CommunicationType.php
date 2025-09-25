<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Channel;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ChannelCode;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Value;

class CommunicationType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChannelCode|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ChannelCode")
     * @JMS\Expose
     * @JMS\SerializedName("ChannelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChannelCode", setter="setChannelCode")
     */
    private $channelCode;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Channel|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Channel")
     * @JMS\Expose
     * @JMS\SerializedName("Channel")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChannel", setter="setChannel")
     */
    private $channel;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Value|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Value")
     * @JMS\Expose
     * @JMS\SerializedName("Value")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChannelCode|null
     */
    public function getChannelCode(): ?ChannelCode
    {
        return $this->channelCode;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChannelCode
     */
    public function getChannelCodeWithCreate(): ChannelCode
    {
        $this->channelCode = is_null($this->channelCode) ? new ChannelCode() : $this->channelCode;

        return $this->channelCode;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChannelCode|null $channelCode
     * @return self
     */
    public function setChannelCode(?ChannelCode $channelCode = null): self
    {
        $this->channelCode = $channelCode;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChannelCode(): self
    {
        $this->channelCode = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Channel|null
     */
    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Channel
     */
    public function getChannelWithCreate(): Channel
    {
        $this->channel = is_null($this->channel) ? new Channel() : $this->channel;

        return $this->channel;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Channel|null $channel
     * @return self
     */
    public function setChannel(?Channel $channel = null): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChannel(): self
    {
        $this->channel = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Value|null
     */
    public function getValue(): ?Value
    {
        return $this->value;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Value
     */
    public function getValueWithCreate(): Value
    {
        $this->value = is_null($this->value) ? new Value() : $this->value;

        return $this->value;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Value|null $value
     * @return self
     */
    public function setValue(?Value $value = null): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetValue(): self
    {
        $this->value = null;

        return $this;
    }
}
