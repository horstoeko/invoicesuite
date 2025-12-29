<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class BillingReferenceType
{
    use HandlesObjectFlags;

    /**
     * @var null|InvoiceDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\InvoiceDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("InvoiceDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getInvoiceDocumentReference", setter="setInvoiceDocumentReference")
     */
    private $invoiceDocumentReference;

    /**
     * @var null|SelfBilledInvoiceDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SelfBilledInvoiceDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("SelfBilledInvoiceDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSelfBilledInvoiceDocumentReference", setter="setSelfBilledInvoiceDocumentReference")
     */
    private $selfBilledInvoiceDocumentReference;

    /**
     * @var null|CreditNoteDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\CreditNoteDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("CreditNoteDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCreditNoteDocumentReference", setter="setCreditNoteDocumentReference")
     */
    private $creditNoteDocumentReference;

    /**
     * @var null|SelfBilledCreditNoteDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\SelfBilledCreditNoteDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("SelfBilledCreditNoteDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSelfBilledCreditNoteDocumentReference", setter="setSelfBilledCreditNoteDocumentReference")
     */
    private $selfBilledCreditNoteDocumentReference;

    /**
     * @var null|DebitNoteDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\DebitNoteDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("DebitNoteDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getDebitNoteDocumentReference", setter="setDebitNoteDocumentReference")
     */
    private $debitNoteDocumentReference;

    /**
     * @var null|ReminderDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\ReminderDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("ReminderDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getReminderDocumentReference", setter="setReminderDocumentReference")
     */
    private $reminderDocumentReference;

    /**
     * @var null|AdditionalDocumentReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\AdditionalDocumentReference")
     * @JMS\Expose
     * @JMS\SerializedName("AdditionalDocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAdditionalDocumentReference", setter="setAdditionalDocumentReference")
     */
    private $additionalDocumentReference;

    /**
     * @var null|array<BillingReferenceLine>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\BillingReferenceLine>")
     * @JMS\Expose
     * @JMS\SerializedName("BillingReferenceLine")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BillingReferenceLine", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBillingReferenceLine", setter="setBillingReferenceLine")
     */
    private $billingReferenceLine;

    /**
     * @return null|InvoiceDocumentReference
     */
    public function getInvoiceDocumentReference(): ?InvoiceDocumentReference
    {
        return $this->invoiceDocumentReference;
    }

    /**
     * @return InvoiceDocumentReference
     */
    public function getInvoiceDocumentReferenceWithCreate(): InvoiceDocumentReference
    {
        $this->invoiceDocumentReference = is_null($this->invoiceDocumentReference) ? new InvoiceDocumentReference() : $this->invoiceDocumentReference;

        return $this->invoiceDocumentReference;
    }

    /**
     * @param  null|InvoiceDocumentReference $invoiceDocumentReference
     * @return static
     */
    public function setInvoiceDocumentReference(?InvoiceDocumentReference $invoiceDocumentReference = null): static
    {
        $this->invoiceDocumentReference = $invoiceDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetInvoiceDocumentReference(): static
    {
        $this->invoiceDocumentReference = null;

        return $this;
    }

    /**
     * @return null|SelfBilledInvoiceDocumentReference
     */
    public function getSelfBilledInvoiceDocumentReference(): ?SelfBilledInvoiceDocumentReference
    {
        return $this->selfBilledInvoiceDocumentReference;
    }

    /**
     * @return SelfBilledInvoiceDocumentReference
     */
    public function getSelfBilledInvoiceDocumentReferenceWithCreate(): SelfBilledInvoiceDocumentReference
    {
        $this->selfBilledInvoiceDocumentReference = is_null($this->selfBilledInvoiceDocumentReference) ? new SelfBilledInvoiceDocumentReference() : $this->selfBilledInvoiceDocumentReference;

        return $this->selfBilledInvoiceDocumentReference;
    }

    /**
     * @param  null|SelfBilledInvoiceDocumentReference $selfBilledInvoiceDocumentReference
     * @return static
     */
    public function setSelfBilledInvoiceDocumentReference(
        ?SelfBilledInvoiceDocumentReference $selfBilledInvoiceDocumentReference = null,
    ): static {
        $this->selfBilledInvoiceDocumentReference = $selfBilledInvoiceDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSelfBilledInvoiceDocumentReference(): static
    {
        $this->selfBilledInvoiceDocumentReference = null;

        return $this;
    }

    /**
     * @return null|CreditNoteDocumentReference
     */
    public function getCreditNoteDocumentReference(): ?CreditNoteDocumentReference
    {
        return $this->creditNoteDocumentReference;
    }

    /**
     * @return CreditNoteDocumentReference
     */
    public function getCreditNoteDocumentReferenceWithCreate(): CreditNoteDocumentReference
    {
        $this->creditNoteDocumentReference = is_null($this->creditNoteDocumentReference) ? new CreditNoteDocumentReference() : $this->creditNoteDocumentReference;

        return $this->creditNoteDocumentReference;
    }

    /**
     * @param  null|CreditNoteDocumentReference $creditNoteDocumentReference
     * @return static
     */
    public function setCreditNoteDocumentReference(
        ?CreditNoteDocumentReference $creditNoteDocumentReference = null,
    ): static {
        $this->creditNoteDocumentReference = $creditNoteDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCreditNoteDocumentReference(): static
    {
        $this->creditNoteDocumentReference = null;

        return $this;
    }

    /**
     * @return null|SelfBilledCreditNoteDocumentReference
     */
    public function getSelfBilledCreditNoteDocumentReference(): ?SelfBilledCreditNoteDocumentReference
    {
        return $this->selfBilledCreditNoteDocumentReference;
    }

    /**
     * @return SelfBilledCreditNoteDocumentReference
     */
    public function getSelfBilledCreditNoteDocumentReferenceWithCreate(): SelfBilledCreditNoteDocumentReference
    {
        $this->selfBilledCreditNoteDocumentReference = is_null($this->selfBilledCreditNoteDocumentReference) ? new SelfBilledCreditNoteDocumentReference() : $this->selfBilledCreditNoteDocumentReference;

        return $this->selfBilledCreditNoteDocumentReference;
    }

    /**
     * @param  null|SelfBilledCreditNoteDocumentReference $selfBilledCreditNoteDocumentReference
     * @return static
     */
    public function setSelfBilledCreditNoteDocumentReference(
        ?SelfBilledCreditNoteDocumentReference $selfBilledCreditNoteDocumentReference = null,
    ): static {
        $this->selfBilledCreditNoteDocumentReference = $selfBilledCreditNoteDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSelfBilledCreditNoteDocumentReference(): static
    {
        $this->selfBilledCreditNoteDocumentReference = null;

        return $this;
    }

    /**
     * @return null|DebitNoteDocumentReference
     */
    public function getDebitNoteDocumentReference(): ?DebitNoteDocumentReference
    {
        return $this->debitNoteDocumentReference;
    }

    /**
     * @return DebitNoteDocumentReference
     */
    public function getDebitNoteDocumentReferenceWithCreate(): DebitNoteDocumentReference
    {
        $this->debitNoteDocumentReference = is_null($this->debitNoteDocumentReference) ? new DebitNoteDocumentReference() : $this->debitNoteDocumentReference;

        return $this->debitNoteDocumentReference;
    }

    /**
     * @param  null|DebitNoteDocumentReference $debitNoteDocumentReference
     * @return static
     */
    public function setDebitNoteDocumentReference(
        ?DebitNoteDocumentReference $debitNoteDocumentReference = null,
    ): static {
        $this->debitNoteDocumentReference = $debitNoteDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDebitNoteDocumentReference(): static
    {
        $this->debitNoteDocumentReference = null;

        return $this;
    }

    /**
     * @return null|ReminderDocumentReference
     */
    public function getReminderDocumentReference(): ?ReminderDocumentReference
    {
        return $this->reminderDocumentReference;
    }

    /**
     * @return ReminderDocumentReference
     */
    public function getReminderDocumentReferenceWithCreate(): ReminderDocumentReference
    {
        $this->reminderDocumentReference = is_null($this->reminderDocumentReference) ? new ReminderDocumentReference() : $this->reminderDocumentReference;

        return $this->reminderDocumentReference;
    }

    /**
     * @param  null|ReminderDocumentReference $reminderDocumentReference
     * @return static
     */
    public function setReminderDocumentReference(?ReminderDocumentReference $reminderDocumentReference = null): static
    {
        $this->reminderDocumentReference = $reminderDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetReminderDocumentReference(): static
    {
        $this->reminderDocumentReference = null;

        return $this;
    }

    /**
     * @return null|AdditionalDocumentReference
     */
    public function getAdditionalDocumentReference(): ?AdditionalDocumentReference
    {
        return $this->additionalDocumentReference;
    }

    /**
     * @return AdditionalDocumentReference
     */
    public function getAdditionalDocumentReferenceWithCreate(): AdditionalDocumentReference
    {
        $this->additionalDocumentReference = is_null($this->additionalDocumentReference) ? new AdditionalDocumentReference() : $this->additionalDocumentReference;

        return $this->additionalDocumentReference;
    }

    /**
     * @param  null|AdditionalDocumentReference $additionalDocumentReference
     * @return static
     */
    public function setAdditionalDocumentReference(
        ?AdditionalDocumentReference $additionalDocumentReference = null,
    ): static {
        $this->additionalDocumentReference = $additionalDocumentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAdditionalDocumentReference(): static
    {
        $this->additionalDocumentReference = null;

        return $this;
    }

    /**
     * @return null|array<BillingReferenceLine>
     */
    public function getBillingReferenceLine(): ?array
    {
        return $this->billingReferenceLine;
    }

    /**
     * @param  null|array<BillingReferenceLine> $billingReferenceLine
     * @return static
     */
    public function setBillingReferenceLine(?array $billingReferenceLine = null): static
    {
        $this->billingReferenceLine = $billingReferenceLine;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBillingReferenceLine(): static
    {
        $this->billingReferenceLine = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBillingReferenceLine(): static
    {
        $this->billingReferenceLine = [];

        return $this;
    }

    /**
     * @return null|BillingReferenceLine
     */
    public function firstBillingReferenceLine(): ?BillingReferenceLine
    {
        $billingReferenceLine = $this->billingReferenceLine ?? [];
        $billingReferenceLine = reset($billingReferenceLine);

        if (false === $billingReferenceLine) {
            return null;
        }

        return $billingReferenceLine;
    }

    /**
     * @return null|BillingReferenceLine
     */
    public function lastBillingReferenceLine(): ?BillingReferenceLine
    {
        $billingReferenceLine = $this->billingReferenceLine ?? [];
        $billingReferenceLine = end($billingReferenceLine);

        if (false === $billingReferenceLine) {
            return null;
        }

        return $billingReferenceLine;
    }

    /**
     * @param  BillingReferenceLine $billingReferenceLine
     * @return static
     */
    public function addToBillingReferenceLine(BillingReferenceLine $billingReferenceLine): static
    {
        $this->billingReferenceLine[] = $billingReferenceLine;

        return $this;
    }

    /**
     * @return BillingReferenceLine
     */
    public function addToBillingReferenceLineWithCreate(): BillingReferenceLine
    {
        $this->addTobillingReferenceLine($billingReferenceLine = new BillingReferenceLine());

        return $billingReferenceLine;
    }

    /**
     * @param  BillingReferenceLine $billingReferenceLine
     * @return static
     */
    public function addOnceToBillingReferenceLine(BillingReferenceLine $billingReferenceLine): static
    {
        if (!is_array($this->billingReferenceLine)) {
            $this->billingReferenceLine = [];
        }

        $this->billingReferenceLine[0] = $billingReferenceLine;

        return $this;
    }

    /**
     * @return BillingReferenceLine
     */
    public function addOnceToBillingReferenceLineWithCreate(): BillingReferenceLine
    {
        if (!is_array($this->billingReferenceLine)) {
            $this->billingReferenceLine = [];
        }

        if ([] === $this->billingReferenceLine) {
            $this->addOnceTobillingReferenceLine(new BillingReferenceLine());
        }

        return $this->billingReferenceLine[0];
    }
}
