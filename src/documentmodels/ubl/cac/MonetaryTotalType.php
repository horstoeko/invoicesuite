<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\AllowanceTotalAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeTotalAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\LineExtensionAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAlternativeAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableRoundingAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\PrepaidAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExclusiveAmount;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxInclusiveAmount;

class MonetaryTotalType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineExtensionAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\LineExtensionAmount")
     * @JMS\Expose
     * @JMS\SerializedName("LineExtensionAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineExtensionAmount", setter="setLineExtensionAmount")
     */
    private $lineExtensionAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExclusiveAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExclusiveAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxExclusiveAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxExclusiveAmount", setter="setTaxExclusiveAmount")
     */
    private $taxExclusiveAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxInclusiveAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxInclusiveAmount")
     * @JMS\Expose
     * @JMS\SerializedName("TaxInclusiveAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getTaxInclusiveAmount", setter="setTaxInclusiveAmount")
     */
    private $taxInclusiveAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\AllowanceTotalAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\AllowanceTotalAmount")
     * @JMS\Expose
     * @JMS\SerializedName("AllowanceTotalAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAllowanceTotalAmount", setter="setAllowanceTotalAmount")
     */
    private $allowanceTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeTotalAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeTotalAmount")
     * @JMS\Expose
     * @JMS\SerializedName("ChargeTotalAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getChargeTotalAmount", setter="setChargeTotalAmount")
     */
    private $chargeTotalAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrepaidAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PrepaidAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PrepaidAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPrepaidAmount", setter="setPrepaidAmount")
     */
    private $prepaidAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableRoundingAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableRoundingAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PayableRoundingAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayableRoundingAmount", setter="setPayableRoundingAmount")
     */
    private $payableRoundingAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PayableAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayableAmount", setter="setPayableAmount")
     */
    private $payableAmount;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAlternativeAmount|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAlternativeAmount")
     * @JMS\Expose
     * @JMS\SerializedName("PayableAlternativeAmount")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPayableAlternativeAmount", setter="setPayableAlternativeAmount")
     */
    private $payableAlternativeAmount;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineExtensionAmount|null
     */
    public function getLineExtensionAmount(): ?LineExtensionAmount
    {
        return $this->lineExtensionAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineExtensionAmount
     */
    public function getLineExtensionAmountWithCreate(): LineExtensionAmount
    {
        $this->lineExtensionAmount = is_null($this->lineExtensionAmount) ? new LineExtensionAmount() : $this->lineExtensionAmount;

        return $this->lineExtensionAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\LineExtensionAmount|null $lineExtensionAmount
     * @return self
     */
    public function setLineExtensionAmount(?LineExtensionAmount $lineExtensionAmount = null): self
    {
        $this->lineExtensionAmount = $lineExtensionAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineExtensionAmount(): self
    {
        $this->lineExtensionAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExclusiveAmount|null
     */
    public function getTaxExclusiveAmount(): ?TaxExclusiveAmount
    {
        return $this->taxExclusiveAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExclusiveAmount
     */
    public function getTaxExclusiveAmountWithCreate(): TaxExclusiveAmount
    {
        $this->taxExclusiveAmount = is_null($this->taxExclusiveAmount) ? new TaxExclusiveAmount() : $this->taxExclusiveAmount;

        return $this->taxExclusiveAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxExclusiveAmount|null $taxExclusiveAmount
     * @return self
     */
    public function setTaxExclusiveAmount(?TaxExclusiveAmount $taxExclusiveAmount = null): self
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxExclusiveAmount(): self
    {
        $this->taxExclusiveAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxInclusiveAmount|null
     */
    public function getTaxInclusiveAmount(): ?TaxInclusiveAmount
    {
        return $this->taxInclusiveAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxInclusiveAmount
     */
    public function getTaxInclusiveAmountWithCreate(): TaxInclusiveAmount
    {
        $this->taxInclusiveAmount = is_null($this->taxInclusiveAmount) ? new TaxInclusiveAmount() : $this->taxInclusiveAmount;

        return $this->taxInclusiveAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\TaxInclusiveAmount|null $taxInclusiveAmount
     * @return self
     */
    public function setTaxInclusiveAmount(?TaxInclusiveAmount $taxInclusiveAmount = null): self
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetTaxInclusiveAmount(): self
    {
        $this->taxInclusiveAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AllowanceTotalAmount|null
     */
    public function getAllowanceTotalAmount(): ?AllowanceTotalAmount
    {
        return $this->allowanceTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\AllowanceTotalAmount
     */
    public function getAllowanceTotalAmountWithCreate(): AllowanceTotalAmount
    {
        $this->allowanceTotalAmount = is_null($this->allowanceTotalAmount) ? new AllowanceTotalAmount() : $this->allowanceTotalAmount;

        return $this->allowanceTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\AllowanceTotalAmount|null $allowanceTotalAmount
     * @return self
     */
    public function setAllowanceTotalAmount(?AllowanceTotalAmount $allowanceTotalAmount = null): self
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetAllowanceTotalAmount(): self
    {
        $this->allowanceTotalAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeTotalAmount|null
     */
    public function getChargeTotalAmount(): ?ChargeTotalAmount
    {
        return $this->chargeTotalAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeTotalAmount
     */
    public function getChargeTotalAmountWithCreate(): ChargeTotalAmount
    {
        $this->chargeTotalAmount = is_null($this->chargeTotalAmount) ? new ChargeTotalAmount() : $this->chargeTotalAmount;

        return $this->chargeTotalAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\ChargeTotalAmount|null $chargeTotalAmount
     * @return self
     */
    public function setChargeTotalAmount(?ChargeTotalAmount $chargeTotalAmount = null): self
    {
        $this->chargeTotalAmount = $chargeTotalAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetChargeTotalAmount(): self
    {
        $this->chargeTotalAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrepaidAmount|null
     */
    public function getPrepaidAmount(): ?PrepaidAmount
    {
        return $this->prepaidAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrepaidAmount
     */
    public function getPrepaidAmountWithCreate(): PrepaidAmount
    {
        $this->prepaidAmount = is_null($this->prepaidAmount) ? new PrepaidAmount() : $this->prepaidAmount;

        return $this->prepaidAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PrepaidAmount|null $prepaidAmount
     * @return self
     */
    public function setPrepaidAmount(?PrepaidAmount $prepaidAmount = null): self
    {
        $this->prepaidAmount = $prepaidAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPrepaidAmount(): self
    {
        $this->prepaidAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableRoundingAmount|null
     */
    public function getPayableRoundingAmount(): ?PayableRoundingAmount
    {
        return $this->payableRoundingAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableRoundingAmount
     */
    public function getPayableRoundingAmountWithCreate(): PayableRoundingAmount
    {
        $this->payableRoundingAmount = is_null($this->payableRoundingAmount) ? new PayableRoundingAmount() : $this->payableRoundingAmount;

        return $this->payableRoundingAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableRoundingAmount|null $payableRoundingAmount
     * @return self
     */
    public function setPayableRoundingAmount(?PayableRoundingAmount $payableRoundingAmount = null): self
    {
        $this->payableRoundingAmount = $payableRoundingAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayableRoundingAmount(): self
    {
        $this->payableRoundingAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAmount|null
     */
    public function getPayableAmount(): ?PayableAmount
    {
        return $this->payableAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAmount
     */
    public function getPayableAmountWithCreate(): PayableAmount
    {
        $this->payableAmount = is_null($this->payableAmount) ? new PayableAmount() : $this->payableAmount;

        return $this->payableAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAmount|null $payableAmount
     * @return self
     */
    public function setPayableAmount(?PayableAmount $payableAmount = null): self
    {
        $this->payableAmount = $payableAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayableAmount(): self
    {
        $this->payableAmount = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAlternativeAmount|null
     */
    public function getPayableAlternativeAmount(): ?PayableAlternativeAmount
    {
        return $this->payableAlternativeAmount;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAlternativeAmount
     */
    public function getPayableAlternativeAmountWithCreate(): PayableAlternativeAmount
    {
        $this->payableAlternativeAmount = is_null($this->payableAlternativeAmount) ? new PayableAlternativeAmount() : $this->payableAlternativeAmount;

        return $this->payableAlternativeAmount;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\PayableAlternativeAmount|null $payableAlternativeAmount
     * @return self
     */
    public function setPayableAlternativeAmount(?PayableAlternativeAmount $payableAlternativeAmount = null): self
    {
        $this->payableAlternativeAmount = $payableAlternativeAmount;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPayableAlternativeAmount(): self
    {
        $this->payableAlternativeAmount = null;

        return $this;
    }
}
