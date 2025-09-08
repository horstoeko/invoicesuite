<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\ID;
use horstoeko\invoicesuite\models\ubl\cbc\InstructionID;
use horstoeko\invoicesuite\models\ubl\cbc\PaidAmount;

class PaymentType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\PaidAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\PaidAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PaidAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaidAmount", setter="setPaidAmount")
     */
    private $paidAmount;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedDate", setter="setReceivedDate")
     */
    private $receivedDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("PaidDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaidDate", setter="setPaidDate")
     */
    private $paidDate;

    /**
     * @var \DateTimeInterface|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("PaidTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaidTime", setter="setPaidTime")
     */
    private $paidTime;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\InstructionID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\InstructionID")
     * @JMS\Expose
     * @JMS\SerializedName("InstructionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInstructionID", setter="setInstructionID")
     */
    private $instructionID;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetID(): self
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaidAmount|null
     */
    public function getPaidAmount(): ?PaidAmount
    {
        return $this->paidAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\PaidAmount
     */
    public function getPaidAmountWithCreate(): PaidAmount
    {
        $this->paidAmount = is_null($this->paidAmount) ? new PaidAmount() : $this->paidAmount;

        return $this->paidAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\PaidAmount|null $paidAmount
     * @return self
     */
    public function setPaidAmount(?PaidAmount $paidAmount = null): self
    {
        $this->paidAmount = $paidAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaidAmount(): self
    {
        $this->paidAmount = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getReceivedDate(): ?\DateTimeInterface
    {
        return $this->receivedDate;
    }

    /**
     * @param \DateTimeInterface|null $receivedDate
     * @return self
     */
    public function setReceivedDate(?\DateTimeInterface $receivedDate = null): self
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReceivedDate(): self
    {
        $this->receivedDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPaidDate(): ?\DateTimeInterface
    {
        return $this->paidDate;
    }

    /**
     * @param \DateTimeInterface|null $paidDate
     * @return self
     */
    public function setPaidDate(?\DateTimeInterface $paidDate = null): self
    {
        $this->paidDate = $paidDate;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaidDate(): self
    {
        $this->paidDate = null;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getPaidTime(): ?\DateTimeInterface
    {
        return $this->paidTime;
    }

    /**
     * @param \DateTimeInterface|null $paidTime
     * @return self
     */
    public function setPaidTime(?\DateTimeInterface $paidTime = null): self
    {
        $this->paidTime = $paidTime;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPaidTime(): self
    {
        $this->paidTime = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InstructionID|null
     */
    public function getInstructionID(): ?InstructionID
    {
        return $this->instructionID;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\InstructionID
     */
    public function getInstructionIDWithCreate(): InstructionID
    {
        $this->instructionID = is_null($this->instructionID) ? new InstructionID() : $this->instructionID;

        return $this->instructionID;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\InstructionID|null $instructionID
     * @return self
     */
    public function setInstructionID(?InstructionID $instructionID = null): self
    {
        $this->instructionID = $instructionID;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInstructionID(): self
    {
        $this->instructionID = null;

        return $this;
    }
}
