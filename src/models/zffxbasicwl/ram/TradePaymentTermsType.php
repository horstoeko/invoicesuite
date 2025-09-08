<?php

namespace horstoeko\invoicesuite\models\zffxbasicwl\ram;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType;
use horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType;
use horstoeko\invoicesuite\models\zffxbasicwl\udt\TextType;

class TradePaymentTermsType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasicwl\udt\TextType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasicwl\udt\TextType")
     * @JMS\Expose
     * @JMS\SerializedName("Description")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDescription", setter="setDescription")
     */
    private $description;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType")
     * @JMS\Expose
     * @JMS\SerializedName("DueDateDateTime")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDueDateDateTime", setter="setDueDateDateTime")
     */
    private $dueDateDateTime;

    /**
     * @var \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType|null
     * @JMS\Groups({"zffx"})
     * @JMS\Type("horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType")
     * @JMS\Expose
     * @JMS\SerializedName("DirectDebitMandateID")
     * @JMS\XmlElement(namespace="urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100", cdata=false)
     * @JMS\Accessor(getter="getDirectDebitMandateID", setter="setDirectDebitMandateID")
     */
    private $directDebitMandateID;

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\TextType|null
     */
    public function getDescription(): ?TextType
    {
        return $this->description;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\TextType
     */
    public function getDescriptionWithCreate(): TextType
    {
        $this->description = is_null($this->description) ? new TextType() : $this->description;

        return $this->description;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasicwl\udt\TextType|null $description
     * @return self
     */
    public function setDescription(?TextType $description = null): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDescription(): self
    {
        $this->description = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType|null
     */
    public function getDueDateDateTime(): ?DateTimeType
    {
        return $this->dueDateDateTime;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType
     */
    public function getDueDateDateTimeWithCreate(): DateTimeType
    {
        $this->dueDateDateTime = is_null($this->dueDateDateTime) ? new DateTimeType() : $this->dueDateDateTime;

        return $this->dueDateDateTime;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasicwl\udt\DateTimeType|null $dueDateDateTime
     * @return self
     */
    public function setDueDateDateTime(?DateTimeType $dueDateDateTime = null): self
    {
        $this->dueDateDateTime = $dueDateDateTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDueDateDateTime(): self
    {
        $this->dueDateDateTime = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType|null
     */
    public function getDirectDebitMandateID(): ?IDType
    {
        return $this->directDebitMandateID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType
     */
    public function getDirectDebitMandateIDWithCreate(): IDType
    {
        $this->directDebitMandateID = is_null($this->directDebitMandateID) ? new IDType() : $this->directDebitMandateID;

        return $this->directDebitMandateID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\zffxbasicwl\udt\IDType|null $directDebitMandateID
     * @return self
     */
    public function setDirectDebitMandateID(?IDType $directDebitMandateID = null): self
    {
        $this->directDebitMandateID = $directDebitMandateID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDirectDebitMandateID(): self
    {
        $this->directDebitMandateID = null;

        return $this;
    }
}
