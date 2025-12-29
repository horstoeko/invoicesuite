<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Channel;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ChannelCode;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Value;
use JMS\Serializer\Annotation as JMS;

class CommunicationType
{
    use HandlesObjectFlags;

    /**
     * @var null|ChannelCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ChannelCode")
     * @JMS\Expose
     * @JMS\SerializedName("ChannelCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChannelCode", setter="setChannelCode")
     */
    private $channelCode;

    /**
     * @var null|Channel
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Channel")
     * @JMS\Expose
     * @JMS\SerializedName("Channel")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChannel", setter="setChannel")
     */
    private $channel;

    /**
     * @var null|Value
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\Value")
     * @JMS\Expose
     * @JMS\SerializedName("Value")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getValue", setter="setValue")
     */
    private $value;

    /**
     * @return null|ChannelCode
     */
    public function getChannelCode(): ?ChannelCode
    {
        return $this->channelCode;
    }

    /**
     * @return ChannelCode
     */
    public function getChannelCodeWithCreate(): ChannelCode
    {
        $this->channelCode = is_null($this->channelCode) ? new ChannelCode() : $this->channelCode;

        return $this->channelCode;
    }

    /**
     * @param  null|ChannelCode $channelCode
     * @return static
     */
    public function setChannelCode(?ChannelCode $channelCode = null): static
    {
        $this->channelCode = $channelCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChannelCode(): static
    {
        $this->channelCode = null;

        return $this;
    }

    /**
     * @return null|Channel
     */
    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    /**
     * @return Channel
     */
    public function getChannelWithCreate(): Channel
    {
        $this->channel = is_null($this->channel) ? new Channel() : $this->channel;

        return $this->channel;
    }

    /**
     * @param  null|Channel $channel
     * @return static
     */
    public function setChannel(?Channel $channel = null): static
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetChannel(): static
    {
        $this->channel = null;

        return $this;
    }

    /**
     * @return null|Value
     */
    public function getValue(): ?Value
    {
        return $this->value;
    }

    /**
     * @return Value
     */
    public function getValueWithCreate(): Value
    {
        $this->value = is_null($this->value) ? new Value() : $this->value;

        return $this->value;
    }

    /**
     * @param  null|Value $value
     * @return static
     */
    public function setValue(?Value $value = null): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetValue(): static
    {
        $this->value = null;

        return $this;
    }
}
