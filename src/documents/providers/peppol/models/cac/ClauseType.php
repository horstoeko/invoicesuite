<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Content;
use horstoeko\invoicesuite\documents\providers\peppol\models\cbc\ID;
use horstoeko\invoicesuite\utils\InvoiceSuiteArrayUtils;
use JMS\Serializer\Annotation as JMS;

class ClauseType
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
     * @var null|array<Content>
     */
    #[JMS\Accessor(getter: 'getContent', setter: 'setContent')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Content')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cbc\Content>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Content', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2')]
    private $content;

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
     * @return null|array<Content>
     */
    public function getContent(): ?array
    {
        return $this->content;
    }

    /**
     * @param  null|array<Content> $content
     * @return static
     */
    public function setContent(
        ?array $content = null
    ): static {
        $this->content = $content;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetContent(): static
    {
        $this->content = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearContent(): static
    {
        $this->content = [];

        return $this;
    }

    /**
     * @return null|Content
     */
    public function firstContent(): ?Content
    {
        $content = $this->content ?? [];
        $content = reset($content);

        if (false === $content) {
            return null;
        }

        return $content;
    }

    /**
     * @return null|Content
     */
    public function lastContent(): ?Content
    {
        $content = $this->content ?? [];
        $content = end($content);

        if (false === $content) {
            return null;
        }

        return $content;
    }

    /**
     * @param  Content $content
     * @return static
     */
    public function addToContent(
        Content $content
    ): static {
        $this->content[] = $content;

        return $this;
    }

    /**
     * @return Content
     */
    public function addToContentWithCreate(): Content
    {
        $this->addToContent($content = new Content());

        return $content;
    }

    /**
     * @param  Content $content
     * @return static
     */
    public function addOnceToContent(
        Content $content
    ): static {
        if (!InvoiceSuiteArrayUtils::is($this->content)) {
            $this->content = [];
        }

        $this->content[0] = $content;

        return $this;
    }

    /**
     * @return Content
     */
    public function addOnceToContentWithCreate(): Content
    {
        if (!InvoiceSuiteArrayUtils::is($this->content)) {
            $this->content = [];
        }

        if ([] === $this->content) {
            $this->addOnceToContent(new Content());
        }

        return $this->content[0];
    }
}
