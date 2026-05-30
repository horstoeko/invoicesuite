<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

final class RappresentanteFiscale
{
    use HandlesObjectFlags;

    /**
     * @translation-german Stammdaten
     */
    #[JMS\Accessor(getter: 'getDatiAnagrafici', setter: 'setDatiAnagrafici')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiAnagrafici')]
    #[JMS\Type('horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiAnagraficiRappresentante')]
    #[JMS\XmlElement(cdata: false)]
    private ?DatiAnagraficiRappresentante $datiAnagrafici = null;

    /**
     * @translation-german Stammdaten
     *
     * @return null|DatiAnagraficiRappresentante
     */
    public function getDatiAnagrafici(): ?DatiAnagraficiRappresentante
    {
        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @return DatiAnagraficiRappresentante
     */
    public function getDatiAnagraficiWithCreate(): DatiAnagraficiRappresentante
    {
        $this->datiAnagrafici ??= new DatiAnagraficiRappresentante();

        return $this->datiAnagrafici;
    }

    /**
     * @translation-german Stammdaten
     *
     * @param  null|DatiAnagraficiRappresentante $datiAnagrafici
     * @return static
     */
    public function setDatiAnagrafici(
        ?DatiAnagraficiRappresentante $datiAnagrafici = null
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
