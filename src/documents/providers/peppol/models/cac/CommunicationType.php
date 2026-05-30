<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Channel;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChannelCode;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Value;
use JMS\Serializer\Annotation as JMS;

class CommunicationType
{
    use HandlesObjectFlags;

    /**
     * @var null|ChannelCode
     */
    #[JMS\Accessor(getter: 'getChannelCode', setter: 'setChannelCode')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ChannelCode')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ChannelCode')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $channelCode;

    /**
     * @var null|Channel
     */
    #[JMS\Accessor(getter: 'getChannel', setter: 'setChannel')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Channel')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Channel')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $channel;

    /**
     * @var null|Value
     */
    #[JMS\Accessor(getter: 'getValue', setter: 'setValue')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Value')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Value')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->channelCode ??= new ChannelCode();

        return $this->channelCode;
    }

    /**
     * @param  null|ChannelCode $channelCode
     * @return static
     */
    public function setChannelCode(
        ?ChannelCode $channelCode = null
    ): static {
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
        $this->channel ??= new Channel();

        return $this->channel;
    }

    /**
     * @param  null|Channel $channel
     * @return static
     */
    public function setChannel(
        ?Channel $channel = null
    ): static {
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
        $this->value ??= new Value();

        return $this->value;
    }

    /**
     * @param  null|Value $value
     * @return static
     */
    public function setValue(
        ?Value $value = null
    ): static {
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
