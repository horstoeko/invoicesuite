<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\FormatoTrasmissione;
use horstoeko\invoicesuite\utils\InvoiceSuiteStringUtils;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\XmlNamespace(uri="http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2")
 * @JMS\XmlNamespace(uri="http://www.w3.org/2001/XMLSchema-instance", prefix="xsi")
 * @JMS\XmlRoot("FatturaElettronica")
 */
final class FatturaElettronica
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getSchemaLocation", setter="setSchemaLocation")
     * @JMS\SerializedName("schemaLocation")
     * @JMS\XmlAttribute(namespace="http://www.w3.org/2001/XMLSchema-instance")
     */
    private ?string $schemaLocation = 'http://ivaservizi.agenziaentrate.gov.it/docs/xsd/fatture/v1.2 http://www.fatturapa.gov.it/export/fatturazione/sdi/fatturapa/v1.2/Schema_del_file_xml_FatturaPA_versione_1.2.xsd';

    /**
     * @translation-german Rechnungs-Header
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaHeader")
     * @JMS\Accessor(getter="getFatturaElettronicaHeader", setter="setFatturaElettronicaHeader")
     * @JMS\SerializedName("FatturaElettronicaHeader")
     * @JMS\XmlElement(cdata=false)
     */
    private ?FatturaElettronicaHeader $fatturaElettronicaHeader = null;

    /**
     * @translation-german Rechnungs-Body
     *
     * @var null|array<FatturaElettronicaBody>
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("array<horstoeko\invoicesuite\documents\providers\fatturapa\models\FatturaElettronicaBody>")
     * @JMS\Accessor(getter="getFatturaElettronicaBody", setter="setFatturaElettronicaBody")
     * @JMS\SerializedName("FatturaElettronicaBody")
     * @JMS\XmlElement(cdata=false)
     * @JMS\XmlList(inline=true, entry="FatturaElettronicaBody")
     */
    private ?array $fatturaElettronicaBody = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("mixed")
     * @JMS\Accessor(getter="getSignature", setter="setSignature")
     * @JMS\SerializedName("Signature")
     * @JMS\XmlElement(cdata=false)
     */
    private mixed $signature = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("enum<'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\FormatoTrasmissione','value'>")
     * @JMS\Accessor(getter="getVersione", setter="setVersione")
     * @JMS\SerializedName("versione")
     * @JMS\XmlAttribute
     */
    private ?FormatoTrasmissione $versione = null;

    /**
     * @translation-german-untranslated
     *
     * @JMS\Expose
     * @JMS\Groups({"fatturapa"})
     * @JMS\Type("string")
     * @JMS\Accessor(getter="getSistemaEmittente", setter="setSistemaEmittente")
     * @JMS\SerializedName("SistemaEmittente")
     * @JMS\XmlAttribute
     */
    private ?string $sistemaEmittente = null;

    /**
     * Schema location
     *
     * @return string
     */
    public function getSchemaLocation(): string
    {
        return $this->schemaLocation;
    }

    /**
     * Schema location
     *
     * @param  string $schemaLocation
     * @return static
     */
    public function setSchemaLocation(string $schemaLocation): static
    {
        $this->schemaLocation = InvoiceSuiteStringUtils::asNullWhenEmpty($schemaLocation);

        return $this;
    }

    /**
     * @translation-german Rechnungs-Header
     *
     * @return null|FatturaElettronicaHeader
     */
    public function getFatturaElettronicaHeader(): ?FatturaElettronicaHeader
    {
        return $this->fatturaElettronicaHeader;
    }

    /**
     * @translation-german Rechnungs-Header
     *
     * @return FatturaElettronicaHeader
     */
    public function getFatturaElettronicaHeaderWithCreate(): FatturaElettronicaHeader
    {
        $this->fatturaElettronicaHeader = is_null($this->fatturaElettronicaHeader) ? new FatturaElettronicaHeader() : $this->fatturaElettronicaHeader;

        return $this->fatturaElettronicaHeader;
    }

    /**
     * @translation-german Rechnungs-Header
     *
     * @param  null|FatturaElettronicaHeader $fatturaElettronicaHeader
     * @return static
     */
    public function setFatturaElettronicaHeader(?FatturaElettronicaHeader $fatturaElettronicaHeader = null): static
    {
        $this->fatturaElettronicaHeader = $fatturaElettronicaHeader;

        return $this;
    }

    /**
     * @translation-german Rechnungs-Header
     *
     * @return static
     */
    public function unsetFatturaElettronicaHeader(): static
    {
        $this->fatturaElettronicaHeader = null;

        return $this;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @return null|array<FatturaElettronicaBody>
     */
    public function getFatturaElettronicaBody(): ?array
    {
        return $this->fatturaElettronicaBody;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @param  null|array<FatturaElettronicaBody> $fatturaElettronicaBody
     * @return static
     */
    public function setFatturaElettronicaBody(?array $fatturaElettronicaBody = null): static
    {
        $this->fatturaElettronicaBody = $fatturaElettronicaBody;

        return $this;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @return static
     */
    public function unsetFatturaElettronicaBody(): static
    {
        $this->fatturaElettronicaBody = null;

        return $this;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @return static
     */
    public function clearFatturaElettronicaBody(): static
    {
        $this->fatturaElettronicaBody = [];

        return $this;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @param  FatturaElettronicaBody $fatturaElettronicaBody
     * @return static
     */
    public function addToFatturaElettronicaBody(FatturaElettronicaBody $fatturaElettronicaBody): static
    {
        if (!is_array($this->fatturaElettronicaBody)) {
            $this->fatturaElettronicaBody = [];
        }

        $this->fatturaElettronicaBody[] = $fatturaElettronicaBody;

        return $this;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @return FatturaElettronicaBody
     */
    public function addToFatturaElettronicaBodyWithCreate(): FatturaElettronicaBody
    {
        $this->addToFatturaElettronicaBody($fatturaElettronicaBody = new FatturaElettronicaBody());

        return $fatturaElettronicaBody;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @param  FatturaElettronicaBody $fatturaElettronicaBody
     * @return static
     */
    public function addOnceToFatturaElettronicaBody(FatturaElettronicaBody $fatturaElettronicaBody): static
    {
        if (!is_array($this->fatturaElettronicaBody)) {
            $this->fatturaElettronicaBody = [];
        }

        $this->fatturaElettronicaBody[0] = $fatturaElettronicaBody;

        return $this;
    }

    /**
     * @translation-german Rechnungs-Body
     *
     * @return FatturaElettronicaBody
     */
    public function addOnceToFatturaElettronicaBodyWithCreate(): FatturaElettronicaBody
    {
        if (!is_array($this->fatturaElettronicaBody)) {
            $this->fatturaElettronicaBody = [];
        }

        if ([] === $this->fatturaElettronicaBody) {
            $this->addOnceToFatturaElettronicaBody(new FatturaElettronicaBody());
        }

        return $this->fatturaElettronicaBody[0];
    }

    /**
     * Get the first existing Body
     *
     * @translation-german Erster Rechnungs-Body
     *
     * @return null|FatturaElettronicaBody
     */
    public function getFirstFatturaElettronicaBody(): ?FatturaElettronicaBody
    {
        if (!is_array($this->fatturaElettronicaBody)) {
            return null;
        }

        $firstBody = reset($this->fatturaElettronicaBody);

        if (false === $firstBody) {
            return null;
        }

        return $firstBody;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|mixed $signature
     * @return static
     */
    public function setSignature($signature = null): static
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSignature(): static
    {
        $this->signature = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|FormatoTrasmissione
     */
    public function getVersione(): ?FormatoTrasmissione
    {
        return $this->versione;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|FormatoTrasmissione $versione
     * @return static
     */
    public function setVersione(?FormatoTrasmissione $versione = null): static
    {
        $this->versione = $versione;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetVersione(): static
    {
        $this->versione = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getSistemaEmittente(): ?string
    {
        return $this->sistemaEmittente;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|string $sistemaEmittente
     * @return static
     */
    public function setSistemaEmittente(?string $sistemaEmittente = null): static
    {
        $this->sistemaEmittente = InvoiceSuiteStringUtils::asNullWhenEmpty($sistemaEmittente);

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSistemaEmittente(): static
    {
        $this->sistemaEmittente = null;

        return $this;
    }
}
