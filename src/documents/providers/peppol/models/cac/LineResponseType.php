<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\peppol\models\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class LineResponseType
{
    use HandlesObjectFlags;

    /**
     * @var null|LineReference
     */
    #[JMS\Accessor(getter: 'getLineReference', setter: 'setLineReference')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('LineReference')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\peppol\models\cac\LineReference')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    private $lineReference;

    /**
     * @var null|array<Response>
     */
    #[JMS\Accessor(getter: 'getResponse', setter: 'setResponse')]
    #[JMS\Expose]
    #[JMS\Groups(['ubl'])]
    #[JMS\SerializedName('Response')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\peppol\models\cac\Response>')]
    #[JMS\XmlElement(namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2', cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'Response', namespace: 'urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2')]
    private $response;

    /**
     * @return null|LineReference
     */
    public function getLineReference(): ?LineReference
    {
        return $this->lineReference;
    }

    /**
     * @return LineReference
     */
    public function getLineReferenceWithCreate(): LineReference
    {
        $this->lineReference ??= new LineReference();

        return $this->lineReference;
    }

    /**
     * @param  null|LineReference $lineReference
     * @return static
     */
    public function setLineReference(
        ?LineReference $lineReference = null
    ): static {
        $this->lineReference = $lineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineReference(): static
    {
        $this->lineReference = null;

        return $this;
    }

    /**
     * @return null|array<Response>
     */
    public function getResponse(): ?array
    {
        return $this->response;
    }

    /**
     * @param  null|array<Response> $response
     * @return static
     */
    public function setResponse(
        ?array $response = null
    ): static {
        $this->response = $response;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetResponse(): static
    {
        $this->response = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearResponse(): static
    {
        $this->response = [];

        return $this;
    }

    /**
     * @return null|Response
     */
    public function firstResponse(): ?Response
    {
        $response = $this->response ?? [];
        $response = reset($response);

        if (false === $response) {
            return null;
        }

        return $response;
    }

    /**
     * @return null|Response
     */
    public function lastResponse(): ?Response
    {
        $response = $this->response ?? [];
        $response = end($response);

        if (false === $response) {
            return null;
        }

        return $response;
    }

    /**
     * @param  Response $response
     * @return static
     */
    public function addToResponse(
        Response $response
    ): static {
        $this->response[] = $response;

        return $this;
    }

    /**
     * @return Response
     */
    public function addToResponseWithCreate(): Response
    {
        $this->addToResponse($response = new Response());

        return $response;
    }

    /**
     * @param  Response $response
     * @return static
     */
    public function addOnceToResponse(
        Response $response
    ): static {
        if (!is_array($this->response)) {
            $this->response = [];
        }

        $this->response[0] = $response;

        return $this;
    }

    /**
     * @return Response
     */
    public function addOnceToResponseWithCreate(): Response
    {
        if (!is_array($this->response)) {
            $this->response = [];
        }

        if ([] === $this->response) {
            $this->addOnceToResponse(new Response());
        }

        return $this->response[0];
    }
}
