<?php

namespace horstoeko\invoicesuite\documentmodels\ubl\cac;

use JMS\Serializer\Annotation as JMS;
use horstoeko\invoicesuite\concerns\HandlesObjectFlags;

class LineResponseType
{
    use HandlesObjectFlags;

    /**
     * @var \horstoeko\invoicesuite\documentmodels\ubl\cac\LineReference|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documentmodels\ubl\cac\LineReference")
     * @JMS\Expose
     * @JMS\SerializedName("LineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineReference", setter="setLineReference")
     */
    private $lineReference;

    /**
     * @var array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Response>|null
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documentmodels\ubl\cac\Response>")
     * @JMS\Expose
     * @JMS\SerializedName("Response")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Response", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getResponse", setter="setResponse")
     */
    private $response;

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LineReference|null
     */
    public function getLineReference(): ?LineReference
    {
        return $this->lineReference;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\LineReference
     */
    public function getLineReferenceWithCreate(): LineReference
    {
        $this->lineReference = is_null($this->lineReference) ? new LineReference() : $this->lineReference;

        return $this->lineReference;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\LineReference|null $lineReference
     * @return self
     */
    public function setLineReference(?LineReference $lineReference = null): self
    {
        $this->lineReference = $lineReference;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetLineReference(): self
    {
        $this->lineReference = null;

        return $this;
    }

    /**
     * @return array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Response>|null
     */
    public function getResponse(): ?array
    {
        return $this->response;
    }

    /**
     * @param array<\horstoeko\invoicesuite\documentmodels\ubl\cac\Response>|null $response
     * @return self
     */
    public function setResponse(?array $response = null): self
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return self
     */
    public function unsetResponse(): self
    {
        $this->response = null;

        return $this;
    }

    /**
     * @return self
     */
    public function clearResponse(): self
    {
        $this->response = [];

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Response|null
     */
    public function firstResponse(): ?Response
    {
        $response = $this->response ?? [];
        $response = reset($response);

        if ($response === false) {
            return null;
        }

        return $response;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Response|null
     */
    public function lastResponse(): ?Response
    {
        $response = $this->response ?? [];
        $response = end($response);

        if ($response === false) {
            return null;
        }

        return $response;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Response $response
     * @return self
     */
    public function addToResponse(Response $response): self
    {
        $this->response[] = $response;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Response
     */
    public function addToResponseWithCreate(): Response
    {
        $this->addToresponse($response = new Response());

        return $response;
    }

    /**
     * @param \horstoeko\invoicesuite\documentmodels\ubl\cac\Response $response
     * @return self
     */
    public function addOnceToResponse(Response $response): self
    {
        if (!is_array($this->response)) {
            $this->response = [];
        }

        $this->response[0] = $response;

        return $this;
    }

    /**
     * @return \horstoeko\invoicesuite\documentmodels\ubl\cac\Response
     */
    public function addOnceToResponseWithCreate(): Response
    {
        if (!is_array($this->response)) {
            $this->response = [];
        }

        if ($this->response === []) {
            $this->addOnceToresponse(new Response());
        }

        return $this->response[0];
    }
}
