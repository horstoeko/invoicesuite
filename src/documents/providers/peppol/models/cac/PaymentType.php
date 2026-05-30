<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use DateTimeInterface;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InstructionID;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaidAmount;
use JMS\Serializer\Annotation as JMS;

class PaymentType
{
    use HandlesObjectFlags;

    /**
     * @var null|ID
     */
    #[JMS\Accessor(getter: 'getID', setter: 'setID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $iD;

    /**
     * @var null|PaidAmount
     */
    #[JMS\Accessor(getter: 'getPaidAmount', setter: 'setPaidAmount')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaidAmount')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\PaidAmount')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paidAmount;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getReceivedDate', setter: 'setReceivedDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('ReceivedDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $receivedDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getPaidDate', setter: 'setPaidDate')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaidDate')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Date')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paidDate;

    /**
     * @var null|DateTimeInterface
     */
    #[JMS\Accessor(getter: 'getPaidTime', setter: 'setPaidTime')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('PaidTime')]
    #[JMS\Type('GoetasWebservices\Xsd\XsdToPhp\XMLSchema\Time')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $paidTime;

    /**
     * @var null|InstructionID
     */
    #[JMS\Accessor(getter: 'getInstructionID', setter: 'setInstructionID')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('InstructionID')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\InstructionID')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
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
        $this->iD ??= new ID();

        return $this->iD;
    }

    /**
     * @param  null|ID $iD
     * @return static
     */
    public function setID(
        ?ID $iD = null
    ): static {
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
        $this->paidAmount ??= new PaidAmount();

        return $this->paidAmount;
    }

    /**
     * @param  null|PaidAmount $paidAmount
     * @return static
     */
    public function setPaidAmount(
        ?PaidAmount $paidAmount = null
    ): static {
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
    public function setReceivedDate(
        ?DateTimeInterface $receivedDate = null
    ): static {
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
    public function setPaidDate(
        ?DateTimeInterface $paidDate = null
    ): static {
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
    public function setPaidTime(
        ?DateTimeInterface $paidTime = null
    ): static {
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
        $this->instructionID ??= new InstructionID();

        return $this->instructionID;
    }

    /**
     * @param  null|InstructionID $instructionID
     * @return static
     */
    public function setInstructionID(
        ?InstructionID $instructionID = null
    ): static {
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
