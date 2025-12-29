<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\InstructionID;
use horstoeko\invoicesuite\documents\models\peppol\cbc\PaidAmount;
use JMS\Serializer\Annotation as JMS;

class PaymentType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var null|PaidAmount
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\PaidAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PaidAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaidAmount", setter="setPaidAmount")
     */
    private $paidAmount;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("ReceivedDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReceivedDate", setter="setReceivedDate")
     */
    private $receivedDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date")
     * @JMS\Expose
     * @JMS\SerializedName("PaidDate")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaidDate", setter="setPaidDate")
     */
    private $paidDate;

    /**
     * @var null|DateTimeInterface
     * @JMS\Groups({"ubl"})
     * @JMS\Type("GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time")
     * @JMS\Expose
     * @JMS\SerializedName("PaidTime")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPaidTime", setter="setPaidTime")
     */
    private $paidTime;

    /**
     * @var null|InstructionID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\InstructionID")
     * @JMS\Expose
     * @JMS\SerializedName("InstructionID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInstructionID", setter="setInstructionID")
     */
    private $instructionID;

    /**
     * @return null|ID
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(?ID $iD = null): static
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetID(): static
    {
        $this->iD = null;

        return $this;
    }

    /**
     * @return null|PaidAmount
     */
    public function getPaidAmount(): ?PaidAmount
    {
        return $this->paidAmount;
    }

    /**
     * @return PaidAmount
     */
    public function getPaidAmountWithCreate(): PaidAmount
    {
        $this->paidAmount = is_null($this->paidAmount) ? new PaidAmount() : $this->paidAmount;

        return $this->paidAmount;
    }

    /**
     * @param  null|PaidAmount $paidAmount
     * @return static
     */
    public function setPaidAmount(?PaidAmount $paidAmount = null): static
    {
        $this->paidAmount = $paidAmount;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaidAmount(): static
    {
        $this->paidAmount = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getReceivedDate(): ?DateTimeInterface
    {
        return $this->receivedDate;
    }

    /**
     * @param  null|DateTimeInterface $receivedDate
     * @return static
     */
    public function setReceivedDate(?DateTimeInterface $receivedDate = null): static
    {
        $this->receivedDate = $receivedDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReceivedDate(): static
    {
        $this->receivedDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getPaidDate(): ?DateTimeInterface
    {
        return $this->paidDate;
    }

    /**
     * @param  null|DateTimeInterface $paidDate
     * @return static
     */
    public function setPaidDate(?DateTimeInterface $paidDate = null): static
    {
        $this->paidDate = $paidDate;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaidDate(): static
    {
        $this->paidDate = null;

        return $this;
    }

    /**
     * @return null|DateTimeInterface
     */
    public function getPaidTime(): ?DateTimeInterface
    {
        return $this->paidTime;
    }

    /**
     * @param  null|DateTimeInterface $paidTime
     * @return static
     */
    public function setPaidTime(?DateTimeInterface $paidTime = null): static
    {
        $this->paidTime = $paidTime;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPaidTime(): static
    {
        $this->paidTime = null;

        return $this;
    }

    /**
     * @return null|InstructionID
     */
    public function getInstructionID(): ?InstructionID
    {
        return $this->instructionID;
    }

    /**
     * @return InstructionID
     */
    public function getInstructionIDWithCreate(): InstructionID
    {
        $this->instructionID = is_null($this->instructionID) ? new InstructionID() : $this->instructionID;

        return $this->instructionID;
    }

    /**
     * @param  null|InstructionID $instructionID
     * @return static
     */
    public function setInstructionID(?InstructionID $instructionID = null): static
    {
        $this->instructionID = $instructionID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInstructionID(): static
    {
        $this->instructionID = null;

        return $this;
    }
}
