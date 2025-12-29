<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\models\peppol\cac;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\models\peppol\cbc\Note;
use horstoeko\invoicesuite\documents\models\peppol\cbc\SubstitutionStatusCode;
use JMS\Serializer\Annotation as JMS;

class OrderLineType
{
    use HandlesObjectFlags;

    /**
     * @var null|SubstitutionStatusCode
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cbc\SubstitutionStatusCode")
     * @JMS\Expose
     * @JMS\SerializedName("SubstitutionStatusCode")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\Accessor(getter="getSubstitutionStatusCode", setter="setSubstitutionStatusCode")
     */
    private $substitutionStatusCode;

    /**
     * @var null|array<Note>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cbc\Note>")
     * @JMS\Expose
     * @JMS\SerializedName("Note")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="Note", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2")
     * @JMS\Accessor(getter="getNote", setter="setNote")
     */
    private $note;

    /**
     * @var null|LineItem
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\LineItem")
     * @JMS\Expose
     * @JMS\SerializedName("LineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getLineItem", setter="setLineItem")
     */
    private $lineItem;

    /**
     * @var null|array<SellerProposedSubstituteLineItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SellerProposedSubstituteLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("SellerProposedSubstituteLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SellerProposedSubstituteLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSellerProposedSubstituteLineItem", setter="setSellerProposedSubstituteLineItem")
     */
    private $sellerProposedSubstituteLineItem;

    /**
     * @var null|array<SellerSubstitutedLineItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\SellerSubstitutedLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("SellerSubstitutedLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="SellerSubstitutedLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getSellerSubstitutedLineItem", setter="setSellerSubstitutedLineItem")
     */
    private $sellerSubstitutedLineItem;

    /**
     * @var null|array<BuyerProposedSubstituteLineItem>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\BuyerProposedSubstituteLineItem>")
     * @JMS\Expose
     * @JMS\SerializedName("BuyerProposedSubstituteLineItem")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="BuyerProposedSubstituteLineItem", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getBuyerProposedSubstituteLineItem", setter="setBuyerProposedSubstituteLineItem")
     */
    private $buyerProposedSubstituteLineItem;

    /**
     * @var null|CatalogueLineReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\CatalogueLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("CatalogueLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getCatalogueLineReference", setter="setCatalogueLineReference")
     */
    private $catalogueLineReference;

    /**
     * @var null|QuotationLineReference
     * @JMS\Groups({"ubl"})
     * @JMS\Type("horstoeko\invoicesuite\documents\models\peppol\cac\QuotationLineReference")
     * @JMS\Expose
     * @JMS\SerializedName("QuotationLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\Accessor(getter="getQuotationLineReference", setter="setQuotationLineReference")
     */
    private $quotationLineReference;

    /**
     * @var null|array<OrderLineReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\OrderLineReference>")
     * @JMS\Expose
     * @JMS\SerializedName("OrderLineReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="OrderLineReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getOrderLineReference", setter="setOrderLineReference")
     */
    private $orderLineReference;

    /**
     * @var null|array<DocumentReference>
     * @JMS\Groups({"ubl"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\models\peppol\cac\DocumentReference>")
     * @JMS\Expose
     * @JMS\SerializedName("DocumentReference")
     * @JMS\XmlElement(namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2", cdata=false)
     * @JMS\XmlList(inline=true, entry="DocumentReference", namespace="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2")
     * @JMS\Accessor(getter="getDocumentReference", setter="setDocumentReference")
     */
    private $documentReference;

    /**
     * @return null|SubstitutionStatusCode
     */
    public function getSubstitutionStatusCode(): ?SubstitutionStatusCode
    {
        return $this->substitutionStatusCode;
    }

    /**
     * @return SubstitutionStatusCode
     */
    public function getSubstitutionStatusCodeWithCreate(): SubstitutionStatusCode
    {
        $this->substitutionStatusCode = is_null($this->substitutionStatusCode) ? new SubstitutionStatusCode() : $this->substitutionStatusCode;

        return $this->substitutionStatusCode;
    }

    /**
     * @param  null|SubstitutionStatusCode $substitutionStatusCode
     * @return static
     */
    public function setSubstitutionStatusCode(?SubstitutionStatusCode $substitutionStatusCode = null): static
    {
        $this->substitutionStatusCode = $substitutionStatusCode;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSubstitutionStatusCode(): static
    {
        $this->substitutionStatusCode = null;

        return $this;
    }

    /**
     * @return null|array<Note>
     */
    public function getNote(): ?array
    {
        return $this->note;
    }

    /**
     * @param  null|array<Note> $note
     * @return static
     */
    public function setNote(?array $note = null): static
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetNote(): static
    {
        $this->note = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearNote(): static
    {
        $this->note = [];

        return $this;
    }

    /**
     * @return null|Note
     */
    public function firstNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = reset($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @return null|Note
     */
    public function lastNote(): ?Note
    {
        $note = $this->note ?? [];
        $note = end($note);

        if (false === $note) {
            return null;
        }

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addToNote(Note $note): static
    {
        $this->note[] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addToNoteWithCreate(): Note
    {
        $this->addTonote($note = new Note());

        return $note;
    }

    /**
     * @param  Note   $note
     * @return static
     */
    public function addOnceToNote(Note $note): static
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        $this->note[0] = $note;

        return $this;
    }

    /**
     * @return Note
     */
    public function addOnceToNoteWithCreate(): Note
    {
        if (!is_array($this->note)) {
            $this->note = [];
        }

        if ([] === $this->note) {
            $this->addOnceTonote(new Note());
        }

        return $this->note[0];
    }

    /**
     * @return null|LineItem
     */
    public function getLineItem(): ?LineItem
    {
        return $this->lineItem;
    }

    /**
     * @return LineItem
     */
    public function getLineItemWithCreate(): LineItem
    {
        $this->lineItem = is_null($this->lineItem) ? new LineItem() : $this->lineItem;

        return $this->lineItem;
    }

    /**
     * @param  null|LineItem $lineItem
     * @return static
     */
    public function setLineItem(?LineItem $lineItem = null): static
    {
        $this->lineItem = $lineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetLineItem(): static
    {
        $this->lineItem = null;

        return $this;
    }

    /**
     * @return null|array<SellerProposedSubstituteLineItem>
     */
    public function getSellerProposedSubstituteLineItem(): ?array
    {
        return $this->sellerProposedSubstituteLineItem;
    }

    /**
     * @param  null|array<SellerProposedSubstituteLineItem> $sellerProposedSubstituteLineItem
     * @return static
     */
    public function setSellerProposedSubstituteLineItem(?array $sellerProposedSubstituteLineItem = null): static
    {
        $this->sellerProposedSubstituteLineItem = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerProposedSubstituteLineItem(): static
    {
        $this->sellerProposedSubstituteLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSellerProposedSubstituteLineItem(): static
    {
        $this->sellerProposedSubstituteLineItem = [];

        return $this;
    }

    /**
     * @return null|SellerProposedSubstituteLineItem
     */
    public function firstSellerProposedSubstituteLineItem(): ?SellerProposedSubstituteLineItem
    {
        $sellerProposedSubstituteLineItem = $this->sellerProposedSubstituteLineItem ?? [];
        $sellerProposedSubstituteLineItem = reset($sellerProposedSubstituteLineItem);

        if (false === $sellerProposedSubstituteLineItem) {
            return null;
        }

        return $sellerProposedSubstituteLineItem;
    }

    /**
     * @return null|SellerProposedSubstituteLineItem
     */
    public function lastSellerProposedSubstituteLineItem(): ?SellerProposedSubstituteLineItem
    {
        $sellerProposedSubstituteLineItem = $this->sellerProposedSubstituteLineItem ?? [];
        $sellerProposedSubstituteLineItem = end($sellerProposedSubstituteLineItem);

        if (false === $sellerProposedSubstituteLineItem) {
            return null;
        }

        return $sellerProposedSubstituteLineItem;
    }

    /**
     * @param  SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem
     * @return static
     */
    public function addToSellerProposedSubstituteLineItem(
        SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem,
    ): static {
        $this->sellerProposedSubstituteLineItem[] = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return SellerProposedSubstituteLineItem
     */
    public function addToSellerProposedSubstituteLineItemWithCreate(): SellerProposedSubstituteLineItem
    {
        $this->addTosellerProposedSubstituteLineItem($sellerProposedSubstituteLineItem = new SellerProposedSubstituteLineItem());

        return $sellerProposedSubstituteLineItem;
    }

    /**
     * @param  SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem
     * @return static
     */
    public function addOnceToSellerProposedSubstituteLineItem(
        SellerProposedSubstituteLineItem $sellerProposedSubstituteLineItem,
    ): static {
        if (!is_array($this->sellerProposedSubstituteLineItem)) {
            $this->sellerProposedSubstituteLineItem = [];
        }

        $this->sellerProposedSubstituteLineItem[0] = $sellerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return SellerProposedSubstituteLineItem
     */
    public function addOnceToSellerProposedSubstituteLineItemWithCreate(): SellerProposedSubstituteLineItem
    {
        if (!is_array($this->sellerProposedSubstituteLineItem)) {
            $this->sellerProposedSubstituteLineItem = [];
        }

        if ([] === $this->sellerProposedSubstituteLineItem) {
            $this->addOnceTosellerProposedSubstituteLineItem(new SellerProposedSubstituteLineItem());
        }

        return $this->sellerProposedSubstituteLineItem[0];
    }

    /**
     * @return null|array<SellerSubstitutedLineItem>
     */
    public function getSellerSubstitutedLineItem(): ?array
    {
        return $this->sellerSubstitutedLineItem;
    }

    /**
     * @param  null|array<SellerSubstitutedLineItem> $sellerSubstitutedLineItem
     * @return static
     */
    public function setSellerSubstitutedLineItem(?array $sellerSubstitutedLineItem = null): static
    {
        $this->sellerSubstitutedLineItem = $sellerSubstitutedLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetSellerSubstitutedLineItem(): static
    {
        $this->sellerSubstitutedLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearSellerSubstitutedLineItem(): static
    {
        $this->sellerSubstitutedLineItem = [];

        return $this;
    }

    /**
     * @return null|SellerSubstitutedLineItem
     */
    public function firstSellerSubstitutedLineItem(): ?SellerSubstitutedLineItem
    {
        $sellerSubstitutedLineItem = $this->sellerSubstitutedLineItem ?? [];
        $sellerSubstitutedLineItem = reset($sellerSubstitutedLineItem);

        if (false === $sellerSubstitutedLineItem) {
            return null;
        }

        return $sellerSubstitutedLineItem;
    }

    /**
     * @return null|SellerSubstitutedLineItem
     */
    public function lastSellerSubstitutedLineItem(): ?SellerSubstitutedLineItem
    {
        $sellerSubstitutedLineItem = $this->sellerSubstitutedLineItem ?? [];
        $sellerSubstitutedLineItem = end($sellerSubstitutedLineItem);

        if (false === $sellerSubstitutedLineItem) {
            return null;
        }

        return $sellerSubstitutedLineItem;
    }

    /**
     * @param  SellerSubstitutedLineItem $sellerSubstitutedLineItem
     * @return static
     */
    public function addToSellerSubstitutedLineItem(SellerSubstitutedLineItem $sellerSubstitutedLineItem): static
    {
        $this->sellerSubstitutedLineItem[] = $sellerSubstitutedLineItem;

        return $this;
    }

    /**
     * @return SellerSubstitutedLineItem
     */
    public function addToSellerSubstitutedLineItemWithCreate(): SellerSubstitutedLineItem
    {
        $this->addTosellerSubstitutedLineItem($sellerSubstitutedLineItem = new SellerSubstitutedLineItem());

        return $sellerSubstitutedLineItem;
    }

    /**
     * @param  SellerSubstitutedLineItem $sellerSubstitutedLineItem
     * @return static
     */
    public function addOnceToSellerSubstitutedLineItem(SellerSubstitutedLineItem $sellerSubstitutedLineItem): static
    {
        if (!is_array($this->sellerSubstitutedLineItem)) {
            $this->sellerSubstitutedLineItem = [];
        }

        $this->sellerSubstitutedLineItem[0] = $sellerSubstitutedLineItem;

        return $this;
    }

    /**
     * @return SellerSubstitutedLineItem
     */
    public function addOnceToSellerSubstitutedLineItemWithCreate(): SellerSubstitutedLineItem
    {
        if (!is_array($this->sellerSubstitutedLineItem)) {
            $this->sellerSubstitutedLineItem = [];
        }

        if ([] === $this->sellerSubstitutedLineItem) {
            $this->addOnceTosellerSubstitutedLineItem(new SellerSubstitutedLineItem());
        }

        return $this->sellerSubstitutedLineItem[0];
    }

    /**
     * @return null|array<BuyerProposedSubstituteLineItem>
     */
    public function getBuyerProposedSubstituteLineItem(): ?array
    {
        return $this->buyerProposedSubstituteLineItem;
    }

    /**
     * @param  null|array<BuyerProposedSubstituteLineItem> $buyerProposedSubstituteLineItem
     * @return static
     */
    public function setBuyerProposedSubstituteLineItem(?array $buyerProposedSubstituteLineItem = null): static
    {
        $this->buyerProposedSubstituteLineItem = $buyerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetBuyerProposedSubstituteLineItem(): static
    {
        $this->buyerProposedSubstituteLineItem = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearBuyerProposedSubstituteLineItem(): static
    {
        $this->buyerProposedSubstituteLineItem = [];

        return $this;
    }

    /**
     * @return null|BuyerProposedSubstituteLineItem
     */
    public function firstBuyerProposedSubstituteLineItem(): ?BuyerProposedSubstituteLineItem
    {
        $buyerProposedSubstituteLineItem = $this->buyerProposedSubstituteLineItem ?? [];
        $buyerProposedSubstituteLineItem = reset($buyerProposedSubstituteLineItem);

        if (false === $buyerProposedSubstituteLineItem) {
            return null;
        }

        return $buyerProposedSubstituteLineItem;
    }

    /**
     * @return null|BuyerProposedSubstituteLineItem
     */
    public function lastBuyerProposedSubstituteLineItem(): ?BuyerProposedSubstituteLineItem
    {
        $buyerProposedSubstituteLineItem = $this->buyerProposedSubstituteLineItem ?? [];
        $buyerProposedSubstituteLineItem = end($buyerProposedSubstituteLineItem);

        if (false === $buyerProposedSubstituteLineItem) {
            return null;
        }

        return $buyerProposedSubstituteLineItem;
    }

    /**
     * @param  BuyerProposedSubstituteLineItem $buyerProposedSubstituteLineItem
     * @return static
     */
    public function addToBuyerProposedSubstituteLineItem(
        BuyerProposedSubstituteLineItem $buyerProposedSubstituteLineItem,
    ): static {
        $this->buyerProposedSubstituteLineItem[] = $buyerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return BuyerProposedSubstituteLineItem
     */
    public function addToBuyerProposedSubstituteLineItemWithCreate(): BuyerProposedSubstituteLineItem
    {
        $this->addTobuyerProposedSubstituteLineItem($buyerProposedSubstituteLineItem = new BuyerProposedSubstituteLineItem());

        return $buyerProposedSubstituteLineItem;
    }

    /**
     * @param  BuyerProposedSubstituteLineItem $buyerProposedSubstituteLineItem
     * @return static
     */
    public function addOnceToBuyerProposedSubstituteLineItem(
        BuyerProposedSubstituteLineItem $buyerProposedSubstituteLineItem,
    ): static {
        if (!is_array($this->buyerProposedSubstituteLineItem)) {
            $this->buyerProposedSubstituteLineItem = [];
        }

        $this->buyerProposedSubstituteLineItem[0] = $buyerProposedSubstituteLineItem;

        return $this;
    }

    /**
     * @return BuyerProposedSubstituteLineItem
     */
    public function addOnceToBuyerProposedSubstituteLineItemWithCreate(): BuyerProposedSubstituteLineItem
    {
        if (!is_array($this->buyerProposedSubstituteLineItem)) {
            $this->buyerProposedSubstituteLineItem = [];
        }

        if ([] === $this->buyerProposedSubstituteLineItem) {
            $this->addOnceTobuyerProposedSubstituteLineItem(new BuyerProposedSubstituteLineItem());
        }

        return $this->buyerProposedSubstituteLineItem[0];
    }

    /**
     * @return null|CatalogueLineReference
     */
    public function getCatalogueLineReference(): ?CatalogueLineReference
    {
        return $this->catalogueLineReference;
    }

    /**
     * @return CatalogueLineReference
     */
    public function getCatalogueLineReferenceWithCreate(): CatalogueLineReference
    {
        $this->catalogueLineReference = is_null($this->catalogueLineReference) ? new CatalogueLineReference() : $this->catalogueLineReference;

        return $this->catalogueLineReference;
    }

    /**
     * @param  null|CatalogueLineReference $catalogueLineReference
     * @return static
     */
    public function setCatalogueLineReference(?CatalogueLineReference $catalogueLineReference = null): static
    {
        $this->catalogueLineReference = $catalogueLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetCatalogueLineReference(): static
    {
        $this->catalogueLineReference = null;

        return $this;
    }

    /**
     * @return null|QuotationLineReference
     */
    public function getQuotationLineReference(): ?QuotationLineReference
    {
        return $this->quotationLineReference;
    }

    /**
     * @return QuotationLineReference
     */
    public function getQuotationLineReferenceWithCreate(): QuotationLineReference
    {
        $this->quotationLineReference = is_null($this->quotationLineReference) ? new QuotationLineReference() : $this->quotationLineReference;

        return $this->quotationLineReference;
    }

    /**
     * @param  null|QuotationLineReference $quotationLineReference
     * @return static
     */
    public function setQuotationLineReference(?QuotationLineReference $quotationLineReference = null): static
    {
        $this->quotationLineReference = $quotationLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetQuotationLineReference(): static
    {
        $this->quotationLineReference = null;

        return $this;
    }

    /**
     * @return null|array<OrderLineReference>
     */
    public function getOrderLineReference(): ?array
    {
        return $this->orderLineReference;
    }

    /**
     * @param  null|array<OrderLineReference> $orderLineReference
     * @return static
     */
    public function setOrderLineReference(?array $orderLineReference = null): static
    {
        $this->orderLineReference = $orderLineReference;

        return $this;
    }

    /**
     * @return static
     */
    public function unsetOrderLineReference(): static
    {
        $this->orderLineReference = null;

        return $this;
    }

    /**
     * @return static
     */
    public function clearOrderLineReference(): static
    {
        $this->orderLineReference = [];

        return $this;
    }

    /**
     * @return null|OrderLineReference
     */
    public function firstOrderLineReference(): ?OrderLineReference
    {
        $orderLineReference = $this->orderLineReference ?? [];
        $orderLineReference = reset($orderLineReference);

        if (false === $orderLineReference) {
            return null;
        }

        return $orderLineReference;
    }

    /**
     * @return null|OrderLineReference
     */
    public function lastOrderLineReference(): ?OrderLineReference
    {
        $orderLineReference = $this->orderLineReference ?? [];
        $orderLineReference = end($orderLineReference);

        if (false === $orderLineReference) {
            return null;
        }

        return $orderLineReference;
    }

    /**
     * @param  OrderLineReference $orderLineReference
     * @return static
     */
    public function addToOrderLineReference(OrderLineReference $orderLineReference): static
    {
        $this->orderLineReference[] = $orderLineReference;

        return $this;
    }

    /**
     * @return OrderLineReference
     */
    public function addToOrderLineReferenceWithCreate(): OrderLineReference
    {
        $this->addToorderLineReference($orderLineReference = new OrderLineReference());

        return $orderLineReference;
    }

    /**
     * @param  OrderLineReference $orderLineReference
     * @return static
     */
    public function addOnceToOrderLineReference(OrderLineReference $orderLineReference): static
    {
        if (!is_array($this->orderLineReference)) {
            $this->orderLineReference = [];
        }

        $this->orderLineReference[0] = $orderLineReference;

        return $this;
    }

    /**
     * @return OrderLineReference
     */
    public function addOnceToOrderLineReferenceWithCreate(): OrderLineReference
    {
        if (!is_array($this->orderLineReference)) {
            $this->orderLineReference = [];
        }

        if ([] === $this->orderLineReference) {
            $this->addOnceToorderLineReference(new OrderLineReference());
        }

        return $this->orderLineReference[0];
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
}
