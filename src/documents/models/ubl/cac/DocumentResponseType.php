<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\ubl\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

class DocumentResponseType
{
    use HandlesObjectFlags;

    /**
     * @var null|Response
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\Response")
     * @JMS\Expose
     * @JMS\SerializedName("Response")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getResponse", setter="setResponse")
     */
    private $response;

    /**
     * @var null|array<DocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @var null|IssuerParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\IssuerParty")
     * @JMS\Expose
     * @JMS\SerializedName("IssuerParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getIssuerParty", setter="setIssuerParty")
     */
    private $issuerParty;

    /**
     * @var null|RecipientParty
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\ubl\cac\RecipientParty")
     * @JMS\Expose
     * @JMS\SerializedName("RecipientParty")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getRecipientParty", setter="setRecipientParty")
     */
    private $recipientParty;

    /**
     * @var null|array<LineResponse>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\ubl\cac\LineResponse>")
     * @JMS\Expose
     * @JMS\SerializedName("LineResponse")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="LineResponse", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getLineResponse", setter="setLineResponse")
     */
    private $lineResponse;

    /**
     * @return null|Response
     */
    public function getResponse(): ?Response
    {
        return $this->response;
    }

    /**
     * @return Response
     */
    public function getResponseWithCreate(): Response
    {
        $this->response = is_null($this->response) ? new Response() : $this->response;

        return $this->response;
    }

    /**
     * @param  null|Response $response
     * @return static
     */
    public function setResponse(?Response $response = null): static
    {
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
     * @return null|array<DocumentReference>
     */
    public function getDocumentReference(): ?array
    {
        return $this->documentReference;
    }

    /**
     * @param  null|array<DocumentReference> $documentReference
     * @return static
     */
    public function setDocumentReference(?array $documentReference = null): static
    {
        $this->documentReference = $documentReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetDocumentReference(): static
    {
        $this->documentReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearDocumentReference(): static
    {
        $this->documentReference = [];

        return $this;
    }

    /**
     * @return null|DocumentReference
     */
    public function firstDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = reset($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @return null|DocumentReference
     */
    public function lastDocumentReference(): ?DocumentReference
    {
        $documentReference = $this->documentReference ?? [];
        $documentReference = end($documentReference);

        if (false === $documentReference) {
            return null;
        }

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addToDocumentReference(DocumentReference $documentReference): static
    {
        $this->documentReference[] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addToDocumentReferenceWithCreate(): DocumentReference
    {
        $this->addTodocumentReference($documentReference = new DocumentReference());

        return $documentReference;
    }

    /**
     * @param  DocumentReference $documentReference
     * @return static
     */
    public function addOnceToDocumentReference(DocumentReference $documentReference): static
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        $this->documentReference[0] = $documentReference;

        return $this;
    }

    /**
     * @return DocumentReference
     */
    public function addOnceToDocumentReferenceWithCreate(): DocumentReference
    {
        if (!is_array($this->documentReference)) {
            $this->documentReference = [];
        }

        if ([] === $this->documentReference) {
            $this->addOnceTodocumentReference(new DocumentReference());
        }

        return $this->documentReference[0];
    }

    /**
     * @return null|IssuerParty
     */
    public function getIssuerParty(): ?IssuerParty
    {
        return $this->issuerParty;
    }

    /**
     * @return IssuerParty
     */
    public function getIssuerPartyWithCreate(): IssuerParty
    {
        $this->issuerParty = is_null($this->issuerParty) ? new IssuerParty() : $this->issuerParty;

        return $this->issuerParty;
    }

    /**
     * @param  null|IssuerParty $issuerParty
     * @return static
     */
    public function setIssuerParty(?IssuerParty $issuerParty = null): static
    {
        $this->issuerParty = $issuerParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetIssuerParty(): static
    {
        $this->issuerParty = null;

        return $this;
    }

    /**
     * @return null|RecipientParty
     */
    public function getRecipientParty(): ?RecipientParty
    {
        return $this->recipientParty;
    }

    /**
     * @return RecipientParty
     */
    public function getRecipientPartyWithCreate(): RecipientParty
    {
        $this->recipientParty = is_null($this->recipientParty) ? new RecipientParty() : $this->recipientParty;

        return $this->recipientParty;
    }

    /**
     * @param  null|RecipientParty $recipientParty
     * @return static
     */
    public function setRecipientParty(?RecipientParty $recipientParty = null): static
    {
        $this->recipientParty = $recipientParty;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetRecipientParty(): static
    {
        $this->recipientParty = null;

        return $this;
    }

    /**
     * @return null|array<LineResponse>
     */
    public function getLineResponse(): ?array
    {
        return $this->lineResponse;
    }

    /**
     * @param  null|array<LineResponse> $lineResponse
     * @return static
     */
    public function setLineResponse(?array $lineResponse = null): static
    {
        $this->lineResponse = $lineResponse;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineResponse(): static
    {
        $this->lineResponse = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearLineResponse(): static
    {
        $this->lineResponse = [];

        return $this;
    }

    /**
     * @return null|LineResponse
     */
    public function firstLineResponse(): ?LineResponse
    {
        $lineResponse = $this->lineResponse ?? [];
        $lineResponse = reset($lineResponse);

        if (false === $lineResponse) {
            return null;
        }

        return $lineResponse;
    }

    /**
     * @return null|LineResponse
     */
    public function lastLineResponse(): ?LineResponse
    {
        $lineResponse = $this->lineResponse ?? [];
        $lineResponse = end($lineResponse);

        if (false === $lineResponse) {
            return null;
        }

        return $lineResponse;
    }

    /**
     * @param  LineResponse $lineResponse
     * @return static
     */
    public function addToLineResponse(LineResponse $lineResponse): static
    {
        $this->lineResponse[] = $lineResponse;

        return $this;
    }

    /**
     * @return LineResponse
     */
    public function addToLineResponseWithCreate(): LineResponse
    {
        $this->addTolineResponse($lineResponse = new LineResponse());

        return $lineResponse;
    }

    /**
     * @param  LineResponse $lineResponse
     * @return static
     */
    public function addOnceToLineResponse(LineResponse $lineResponse): static
    {
        if (!is_array($this->lineResponse)) {
            $this->lineResponse = [];
        }

        $this->lineResponse[0] = $lineResponse;

        return $this;
    }

    /**
     * @return LineResponse
     */
    public function addOnceToLineResponseWithCreate(): LineResponse
    {
        if (!is_array($this->lineResponse)) {
            $this->lineResponse = [];
        }

        if ([] === $this->lineResponse) {
            $this->addOnceTolineResponse(new LineResponse());
        }

        return $this->lineResponse[0];
    }
}
