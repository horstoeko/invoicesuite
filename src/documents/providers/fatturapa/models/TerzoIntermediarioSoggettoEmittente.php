<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

final class TerzoIntermediarioSoggettoEmittente
{
    use HandlesObjectFlags;

    /**
     * @translation-german Stammdaten
     */
    #[JMS\Accessor(getter: 'getDatiAnagrafici', setter: 'setDatiAnagrafici')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiAnagrafici')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiAnagraficiTerzoIntermediario')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiAnagraficiTerzoIntermediario $datiAnagrafici = null;

    /**
     * @translation-german Stammdaten
     *
     * @return null|DatiAnagraficiTerzoIntermediario
     */
    public function getDatiAnagrafici(): ?DatiAnagraficiTerzoIntermediario
    {
        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @return DatiAnagraficiTerzoIntermediario
     */
    public function getDatiAnagraficiWithCreate(): DatiAnagraficiTerzoIntermediario
    {
        $this->datiAnagrafici ??= new DatiAnagraficiTerzoIntermediario();

        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @param  null|DatiAnagraficiTerzoIntermediario $datiAnagrafici
     * @return static
     */
    public function setDatiAnagrafici(
        ?DatiAnagraficiTerzoIntermediario $datiAnagrafici = null
    ): static {
        $this->datiAnagrafici = $datiAnagrafici;

        return $this;
    }

    /**
     * @translation-german Stammdaten
     *
     * @return static
     */
    public function unsetDatiAnagrafici(): static
    {
        $this->datiAnagrafici = null;

        return $this;
    }
}
