<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models\xmldsig;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

/**
 * @translation-german-untranslated
 */
class SPKIDataType
{
    use HandlesObjectFlags;

    /**
     * @translation-german-untranslated
     *
     * @var null|string
     */
    #[JMS\Accessor(getter: 'getSPKISexp', setter: 'setSPKISexp')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('SPKISexp')]
    #[JMS\Type('string')]
    #[JMS\XmlElement(cdata: false)]
    private ?string $sPKISexp = null;

    /**
     * @translation-german-untranslated
     *
     * @return null|string
     */
    public function getSPKISexp(): ?string
    {
        return $this->sPKISexp;
    }

    /**
     * @translation-german-untranslated
     *
     * @param  string $sPKISexp
     * @return static
     */
    public function setSPKISexp(
        ?string $sPKISexp = null
    ): static {
        $this->sPKISexp = $sPKISexp;

        return $this;
    }

    /**
     * @translation-german-untranslated
     *
     * @return static
     */
    public function unsetSPKISexp(): static
    {
        $this->sPKISexp = null;

        return $this;
    }
}
