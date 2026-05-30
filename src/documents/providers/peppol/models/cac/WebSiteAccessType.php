<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Login;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Password;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\URI;
use JMS\Serializer\Annotation as JMS;

class WebSiteAccessType
{
    use HandlesObjectFlags;

    /**
     * @var null|URI
     */
    #[JMS\Accessor(getter: 'getURI', setter: 'setURI')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('URI')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\URI')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $uRI;

    /**
     * @var null|Password
     */
    #[JMS\Accessor(getter: 'getPassword', setter: 'setPassword')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Password')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Password')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $password;

    /**
     * @var null|Login
     */
    #[JMS\Accessor(getter: 'getLogin', setter: 'setLogin')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Login')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Login')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    private $login;

    /**
     * @return null|URI
     */
    public function getURI(): ?URI
    {
        return $this->uRI;
    }

    /**
     * @return URI
     */
    public function getURIWithCreate(): URI
    {
        $this->uRI ??= new URI();

        return $this->uRI;
    }

    /**
     * @param  null|URI $uRI
     * @return static
     */
    public function setURI(
        ?URI $uRI = null
    ): static {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetURI(): static
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @return null|Password
     */
    public function getPassword(): ?Password
    {
        return $this->password;
    }

    /**
     * @return Password
     */
    public function getPasswordWithCreate(): Password
    {
        $this->password ??= new Password();

        return $this->password;
    }

    /**
     * @param  null|Password $password
     * @return static
     */
    public function setPassword(
        ?Password $password = null
    ): static {
        $this->password = $password;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetPassword(): static
    {
        $this->password = null;

        return $this;
    }

    /**
     * @return null|Login
     */
    public function getLogin(): ?Login
    {
        return $this->login;
    }

    /**
     * @return Login
     */
    public function getLoginWithCreate(): Login
    {
        $this->login ??= new Login();

        return $this->login;
    }

    /**
     * @param  null|Login $login
     * @return static
     */
    public function setLogin(
        ?Login $login = null
    ): static {
        $this->login = $login;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLogin(): static
    {
        $this->login = null;

        return $this;
    }
}
