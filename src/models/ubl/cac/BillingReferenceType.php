<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class BillingReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\InvoiceDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\InvoiceDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvoiceDocumentReference", setter="setInvoiceDocumentReference")
     */
    private $invoiceDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SelfBilledInvoiceDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SelfBilledInvoiceDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("SelfBilledInvoiceDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSelfBilledInvoiceDocumentReference", setter="setSelfBilledInvoiceDocumentReference")
     */
    private $selfBilledInvoiceDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\CreditNoteDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\CreditNoteDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CreditNoteDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCreditNoteDocumentReference", setter="setCreditNoteDocumentReference")
     */
    private $creditNoteDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\SelfBilledCreditNoteDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\SelfBilledCreditNoteDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("SelfBilledCreditNoteDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSelfBilledCreditNoteDocumentReference", setter="setSelfBilledCreditNoteDocumentReference")
     */
    private $selfBilledCreditNoteDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\DebitNoteDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\DebitNoteDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("DebitNoteDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDebitNoteDocumentReference", setter="setDebitNoteDocumentReference")
     */
    private $debitNoteDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\ReminderDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\ReminderDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ReminderDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReminderDocumentReference", setter="setReminderDocumentReference")
     */
    private $reminderDocumentReference;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdditionalDocumentReference", setter="setAdditionalDocumentReference")
     */
    private $additionalDocumentReference;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine>")
     * @JMS\Expose
     * @JMS\SerializedName("BillingReferenceLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BillingReferenceLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBillingReferenceLine", setter="setBillingReferenceLine")
     */
    private $billingReferenceLine;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvoiceDocumentReference|null
     */
    public function getInvoiceDocumentReference(): ?InvoiceDocumentReference
    {
        return $this->invoiceDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\InvoiceDocumentReference
     */
    public function getInvoiceDocumentReferenceWithCreate(): InvoiceDocumentReference
    {
        $this->invoiceDocumentReference = is_null($this->invoiceDocumentReference) ? new InvoiceDocumentReference() : $this->invoiceDocumentReference;

        return $this->invoiceDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\InvoiceDocumentReference|null $invoiceDocumentReference
     * @return self
     */
    public function setInvoiceDocumentReference(?InvoiceDocumentReference $invoiceDocumentReference = null): self
    {
        $this->invoiceDocumentReference = $invoiceDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetInvoiceDocumentReference(): self
    {
        $this->invoiceDocumentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SelfBilledInvoiceDocumentReference|null
     */
    public function getSelfBilledInvoiceDocumentReference(): ?SelfBilledInvoiceDocumentReference
    {
        return $this->selfBilledInvoiceDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SelfBilledInvoiceDocumentReference
     */
    public function getSelfBilledInvoiceDocumentReferenceWithCreate(): SelfBilledInvoiceDocumentReference
    {
        $this->selfBilledInvoiceDocumentReference = is_null($this->selfBilledInvoiceDocumentReference) ? new SelfBilledInvoiceDocumentReference() : $this->selfBilledInvoiceDocumentReference;

        return $this->selfBilledInvoiceDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SelfBilledInvoiceDocumentReference|null $selfBilledInvoiceDocumentReference
     * @return self
     */
    public function setSelfBilledInvoiceDocumentReference(
        ?SelfBilledInvoiceDocumentReference $selfBilledInvoiceDocumentReference = null,
    ): self {
        $this->selfBilledInvoiceDocumentReference = $selfBilledInvoiceDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSelfBilledInvoiceDocumentReference(): self
    {
        $this->selfBilledInvoiceDocumentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CreditNoteDocumentReference|null
     */
    public function getCreditNoteDocumentReference(): ?CreditNoteDocumentReference
    {
        return $this->creditNoteDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\CreditNoteDocumentReference
     */
    public function getCreditNoteDocumentReferenceWithCreate(): CreditNoteDocumentReference
    {
        $this->creditNoteDocumentReference = is_null($this->creditNoteDocumentReference) ? new CreditNoteDocumentReference() : $this->creditNoteDocumentReference;

        return $this->creditNoteDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\CreditNoteDocumentReference|null $creditNoteDocumentReference
     * @return self
     */
    public function setCreditNoteDocumentReference(
        ?CreditNoteDocumentReference $creditNoteDocumentReference = null,
    ): self {
        $this->creditNoteDocumentReference = $creditNoteDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetCreditNoteDocumentReference(): self
    {
        $this->creditNoteDocumentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SelfBilledCreditNoteDocumentReference|null
     */
    public function getSelfBilledCreditNoteDocumentReference(): ?SelfBilledCreditNoteDocumentReference
    {
        return $this->selfBilledCreditNoteDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\SelfBilledCreditNoteDocumentReference
     */
    public function getSelfBilledCreditNoteDocumentReferenceWithCreate(): SelfBilledCreditNoteDocumentReference
    {
        $this->selfBilledCreditNoteDocumentReference = is_null($this->selfBilledCreditNoteDocumentReference) ? new SelfBilledCreditNoteDocumentReference() : $this->selfBilledCreditNoteDocumentReference;

        return $this->selfBilledCreditNoteDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\SelfBilledCreditNoteDocumentReference|null $selfBilledCreditNoteDocumentReference
     * @return self
     */
    public function setSelfBilledCreditNoteDocumentReference(
        ?SelfBilledCreditNoteDocumentReference $selfBilledCreditNoteDocumentReference = null,
    ): self {
        $this->selfBilledCreditNoteDocumentReference = $selfBilledCreditNoteDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetSelfBilledCreditNoteDocumentReference(): self
    {
        $this->selfBilledCreditNoteDocumentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DebitNoteDocumentReference|null
     */
    public function getDebitNoteDocumentReference(): ?DebitNoteDocumentReference
    {
        return $this->debitNoteDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\DebitNoteDocumentReference
     */
    public function getDebitNoteDocumentReferenceWithCreate(): DebitNoteDocumentReference
    {
        $this->debitNoteDocumentReference = is_null($this->debitNoteDocumentReference) ? new DebitNoteDocumentReference() : $this->debitNoteDocumentReference;

        return $this->debitNoteDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\DebitNoteDocumentReference|null $debitNoteDocumentReference
     * @return self
     */
    public function setDebitNoteDocumentReference(
        ?DebitNoteDocumentReference $debitNoteDocumentReference = null,
    ): self {
        $this->debitNoteDocumentReference = $debitNoteDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetDebitNoteDocumentReference(): self
    {
        $this->debitNoteDocumentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReminderDocumentReference|null
     */
    public function getReminderDocumentReference(): ?ReminderDocumentReference
    {
        return $this->reminderDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\ReminderDocumentReference
     */
    public function getReminderDocumentReferenceWithCreate(): ReminderDocumentReference
    {
        $this->reminderDocumentReference = is_null($this->reminderDocumentReference) ? new ReminderDocumentReference() : $this->reminderDocumentReference;

        return $this->reminderDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\ReminderDocumentReference|null $reminderDocumentReference
     * @return self
     */
    public function setReminderDocumentReference(?ReminderDocumentReference $reminderDocumentReference = null): self
    {
        $this->reminderDocumentReference = $reminderDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetReminderDocumentReference(): self
    {
        $this->reminderDocumentReference = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference|null
     */
    public function getAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        return $this->additionalDocumentReference;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference
     */
    public function getAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        $this->additionalDocumentReference = is_null($this->additionalDocumentReference) ? new AdditionalDocumentReference() : $this->additionalDocumentReference;

        return $this->additionalDocumentReference;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\AdditionalDocumentReference|null $additionalDocumentReference
     * @return self
     */
    public function setAdditionalDocumentReference(
        ?AdditionalDocumentReference $additionalDocumentReference = null,
    ): self {
        $this->additionalDocumentReference = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAdditionalDocumentReference(): self
    {
        $this->additionalDocumentReference = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine>|null
     */
    public function getBillingReferenceLine(): ?array
    {
        return $this->billingReferenceLine;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine>|null $billingReferenceLine
     * @return self
     */
    public function setBillingReferenceLine(?array $billingReferenceLine = null): self
    {
        $this->billingReferenceLine = $billingReferenceLine;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetBillingReferenceLine(): self
    {
        $this->billingReferenceLine = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearBillingReferenceLine(): self
    {
        $this->billingReferenceLine = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine $billingReferenceLine
     * @return self
     */
    public function addToBillingReferenceLine(BillingReferenceLine $billingReferenceLine): self
    {
        $this->billingReferenceLine[] = $billingReferenceLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine
     */
    public function addToBillingReferenceLineWithCreate(): BillingReferenceLine
    {
        $this->addTobillingReferenceLine($billingReferenceLine = new BillingReferenceLine());

        return $billingReferenceLine;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine $billingReferenceLine
     * @return self
     */
    public function addOnceToBillingReferenceLine(BillingReferenceLine $billingReferenceLine): self
    {
        if (!is_array($this->billingReferenceLine)) {
            $this->billingReferenceLine = [];
        }

        $this->billingReferenceLine[0] = $billingReferenceLine;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cac\BillingReferenceLine
     */
    public function addOnceToBillingReferenceLineWithCreate(): BillingReferenceLine
    {
        if (!is_array($this->billingReferenceLine)) {
            $this->billingReferenceLine = [];
        }

        if ($this->billingReferenceLine === []) {
            $this->addOnceTobillingReferenceLine(new BillingReferenceLine());
        }

        return $this->billingReferenceLine[0];
    }
}
