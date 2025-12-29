<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\AccountID;
use JMS\Serializer\Annotation as JMS;

class CreditAccountType
{
    use HandlesObjectFlags;

    /**
     * @var null|AccountID
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\AccountID")
     * @JMS\Expose
     * @JMS\SerializedName("AccountID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getAccountID", setter="setAccountID")
     */
    private $accountID;

    /**
     * @return null|AccountID
     */
    public function getAccountID(): ?AccountID
    {
        return $this->accountID;
    }

    /**
     * @return AccountID
     */
    public function getAccountIDWithCreate(): AccountID
    {
        $this->accountID = is_null($this->accountID) ? new AccountID() : $this->accountID;

        return $this->accountID;
    }

    /**
     * @param  null|AccountID $accountID
     * @return static
     */
    public function setAccountID(?AccountID $accountID = null): static
    {
        $this->accountID = $accountID;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetAccountID(): static
    {
        $this->accountID = null;

        return $this;
    }
}
