<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\BolloVirtuale;
use JMS\Serializer\Annotation as JMS;

final class DatiBollo
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     */
    #[JMS\Accessor(getter: 'getBolloVirtuale', setter: 'setBolloVirtuale')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('BolloVirtuale')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\BolloVirtuale\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?BolloVirtuale $bolloVirtuale = null;

    /**
     * @translation-german Betrag Bollo
     */
    #[JMS\Accessor(getter: 'getImportoBollo', setter: 'setImportoBollo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('ImportoBollo')]
    #[JMS\Type('fatturapa_decimal<2>')]
    #[JMS\XmlElement(cdata: false)]
    private ?float $importoBollo = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|BolloVirtuale
     */
    public function getBolloVirtuale(): ?BolloVirtuale
    {
        return $this->bolloVirtuale;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  null|BolloVirtuale $bolloVirtuale
     * @return static
     */
    public function setBolloVirtuale(
        ?BolloVirtuale $bolloVirtuale = null
    ): static {
        $this->bolloVirtuale = $bolloVirtuale;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetBolloVirtuale(): static
    {
        $this->bolloVirtuale = null;

        return $this;
    }

    /**
     * @translation-german Betrag Bollo
     *
     * @return null|float
     */
    public function getImportoBollo(): ?float
    {
        return $this->importoBollo;
    }

    /**
     * @translation-german Betrag Bollo
     *
     * @param  null|float $importoBollo
     * @return static
     */
    public function setImportoBollo(
        ?float $importoBollo = null
    ): static {
        $this->importoBollo = $importoBollo;

        return $this;
    }

    /**
     * @translation-german Betrag Bollo
     *
     * @return static
     */
    public function unsetImportoBollo(): static
    {
        $this->importoBollo = null;

        return $this;
    }
}
