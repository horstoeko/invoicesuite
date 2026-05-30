<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoScontoMaggiorazione;
use JMS\Serializer\Annotation as JMS;

final class ScontoMaggiorazione
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getTipo', setter: 'setTipo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Tipo')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\TipoScontoMaggiorazione\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?TipoScontoMaggiorazione $tipo = null;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getPercentuale', setter: 'setPercentuale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Percentuale')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $percentuale = null;

    /**
     * @translation-german Betrag
     */
    #[JMS\Accessor(getter: 'getImporto', setter: 'setImporto')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('Importo')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $importo = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|TipoScontoMaggiorazione
     */
    public function getTipo(): ?TipoScontoMaggiorazione
    {
        return $this->tipo;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|TipoScontoMaggiorazione $tipo
     * @return static
     */
    public function setTipo(
        ?TipoScontoMaggiorazione $tipo = null
    ): static {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetTipo(): static
    {
        $this->tipo = null;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return null|float
     */
    public function getPercentuale(): ?float
    {
        return $this->percentuale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|float $percentuale
     * @return static
     */
    public function setPercentuale(
        ?float $percentuale = null
    ): static {
        $this->percentuale = $percentuale;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetPercentuale(): static
    {
        $this->percentuale = null;

        return $this;
    }

    /**
     * @translation-german Betrag
     *
     * @return null|float
     */
    public function getImporto(): ?float
    {
        return $this->importo;
    }

    /**
     * @translation-german Betrag
     *
     * @param  null|float $importo
     * @return static
     */
    public function setImporto(
        ?float $importo = null
    ): static {
        $this->importo = $importo;

        return $this;
    }

    /**
     * @translation-german Betrag
     *
     * @return static
     */
    public function unsetImporto(): static
    {
        $this->importo = null;

        return $this;
    }
}
