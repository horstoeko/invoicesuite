<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Content;
use horstoeko\invoicesuite\documents\models\peppol\cbc\ID;
use JMS\Serializer\Annotation as JMS;

class ClauseType
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
     * @var null|array<Content>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Content>")
     * @JMS\Expose
     * @JMS\SerializedName("Content")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Content", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getContent", setter="setContent")
     */
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
    public function setContent(?array $content = null): static
    {
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
    public function addToContent(Content $content): static
    {
        $this->content[] = $content;

        return $this;
    }

    /**
     * @return Content
     */
    public function addToContentWithCreate(): Content
    {
        $this->addTocontent($content = new Content());

        return $content;
    }

    /**
     * @param  Content $content
     * @return static
     */
    public function addOnceToContent(Content $content): static
    {
        if (!is_array($this->content)) {
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
        if (!is_array($this->content)) {
            $this->content = [];
        }

        if ([] === $this->content) {
            $this->addOnceTocontent(new Content());
        }

        return $this->content[0];
    }
}
