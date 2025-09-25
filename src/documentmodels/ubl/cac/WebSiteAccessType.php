<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Login;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\Password;
use horstoeko\invoicesuite\documentmodels\ubl\cbc\URI;

class WebSiteAccessType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\URI")
     * @JMS\Expose
     * @JMS\SerializedName("URI")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getURI", setter="setURI")
     */
    private $uRI;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Password|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Password")
     * @JMS\Expose
     * @JMS\SerializedName("Password")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getPassword", setter="setPassword")
     */
    private $password;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cbc\Login|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cbc\Login")
     * @JMS\Expose
     * @JMS\SerializedName("Login")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLogin", setter="setLogin")
     */
    private $login;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null
     */
    public function getURI(): ?URI
    {
        return $this->uRI;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI
     */
    public function getURIWithCreate(): URI
    {
        $this->uRI = is_null($this->uRI) ? new URI() : $this->uRI;

        return $this->uRI;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\URI|null $uRI
     * @return self
     */
    public function setURI(?URI $uRI = null): self
    {
        $this->uRI = $uRI;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetURI(): self
    {
        $this->uRI = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Password|null
     */
    public function getPassword(): ?Password
    {
        return $this->password;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Password
     */
    public function getPasswordWithCreate(): Password
    {
        $this->password = is_null($this->password) ? new Password() : $this->password;

        return $this->password;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Password|null $password
     * @return self
     */
    public function setPassword(?Password $password = null): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetPassword(): self
    {
        $this->password = null;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Login|null
     */
    public function getLogin(): ?Login
    {
        return $this->login;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cbc\Login
     */
    public function getLoginWithCreate(): Login
    {
        $this->login = is_null($this->login) ? new Login() : $this->login;

        return $this->login;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cbc\Login|null $login
     * @return self
     */
    public function setLogin(?Login $login = null): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLogin(): self
    {
        $this->login = null;

        return $this;
    }
}
