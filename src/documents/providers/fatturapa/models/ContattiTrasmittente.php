<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

final class ContattiTrasmittente
{
    use HandlesObjectFlags;

    /**
     * @translation-german Telefon
     */
    #[JMS\Accessor(getter: 'getTelefono', setter: 'setTelefono')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Telefono')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $telefono = null;

    /**
     * @translation-german E-Mail
     */
    #[JMS\Accessor(getter: 'getEmail', setter: 'setEmail')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Email')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $email = null;

    /**
     * @translation-german Telefon
     *
     * @return null|string
     */
    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    /**
     * @translation-german Telefon
     *
     * @param  null|string $telefono
     * @return static
     */
    public function setTelefono(
        ?string $telefono = null
    ): static {
        $this->telefono = InvoiceSuiteStringUtils::asNullWhenEmpty($telefono);

        return $this;
    }

    /**
     * @translation-german Telefon
     *
     * @return static
     */
    public function unsetTelefono(): static
    {
        $this->telefono = null;

        return $this;
    }

    /**
     * @translation-german E-Mail
     *
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @translation-german E-Mail
     *
     * @param  null|string $email
     * @return static
     */
    public function setEmail(
        ?string $email = null
    ): static {
        $this->email = InvoiceSuiteStringUtils::asNullWhenEmpty($email);

        return $this;
    }

    /**
     * @translation-german E-Mail
     *
     * @return static
     */
    public function unsetEmail(): static
    {
        $this->email = null;

        return $this;
    }
}
