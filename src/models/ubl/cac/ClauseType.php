<?php

namespace horstoeko\invoicesuite\models\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\models\ubl\cbc\Content;
use horstoeko\invoicesuite\models\ubl\cbc\ID;

class ClauseType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\models\ubl\cbc\ID")
     * @JMS\Expose
     * @JMS\SerializedName("ID")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getID", setter="setID")
     */
    private $iD;

    /**
     * @var array<\horstoeko\invoicesuite\models\ubl\cbc\Content>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\models\ubl\cbc\Content>")
     * @JMS\Expose
     * @JMS\SerializedName("Content")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Content", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getContent", setter="setContent")
     */
    private $content;

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID|null
     */
    public function getID(): ?ID
    {
        return $this->iD;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\ID
     */
    public function getIDWithCreate(): ID
    {
        $this->iD = is_null($this->iD) ? new ID() : $this->iD;

        return $this->iD;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\ID|null $iD
     * @return self
     */
    public function setID(?ID $iD = null): self
    {
        $this->iD = $iD;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\models\ubl\cbc\Content>|null
     */
    public function getContent(): ?array
    {
        return $this->content;
    }

    /**
     * @param array<\horstoeko\invoicesuite\models\ubl\cbc\Content>|null $content
     * @return self
     */
    public function setContent(?array $content = null): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return self
     */
    public function clearContent(): self
    {
        $this->content = [];

        return $this;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Content $content
     * @return self
     */
    public function addToContent(Content $content): self
    {
        $this->content[] = $content;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Content
     */
    public function addToContentWithCreate(): Content
    {
        $this->addTocontent($content = new Content());

        return $content;
    }

    /**
     * @param \horstoeko\invoicesuite\models\ubl\cbc\Content $content
     * @return self
     */
    public function addOnceToContent(Content $content): self
    {
        if (!is_array($this->content)) {
            $this->content = [];
        }

        $this->content[0] = $content;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\models\ubl\cbc\Content
     */
    public function addOnceToContentWithCreate(): Content
    {
        if (!is_array($this->content)) {
            $this->content = [];
        }

        if ($this->content === []) {
            $this->addOnceTocontent(new Content());
        }

        return $this->content[0];
    }
}
