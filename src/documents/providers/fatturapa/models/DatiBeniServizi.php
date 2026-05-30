<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use JMS\Serializer\Annotation as JMS;

final class DatiBeniServizi
{
    use HandlesObjectFlags;

    /**
     * @translation-german Detail Positionen
     *
     * @var null|array<DettaglioLinee>
     */
    #[JMS\Accessor(getter: 'getDettaglioLinee', setter: 'setDettaglioLinee')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DettaglioLinee')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DettaglioLinee>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DettaglioLinee')]
    private ?array $dettaglioLinee = null;

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @var null|array<DatiRiepilogo>
     */
    #[JMS\Accessor(getter: 'getDatiRiepilogo', setter: 'setDatiRiepilogo')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DatiRiepilogo')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DatiRiepilogo>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DatiRiepilogo')]
    private ?array $datiRiepilogo = null;

    /**
     * @translation-german Detail Positionen
     *
     * @return null|array<DettaglioLinee>
     */
    public function getDettaglioLinee(): ?array
    {
        return $this->dettaglioLinee;
    }

    /**
     * @translation-german Detail Positionen
     *
     * @param  null|array<DettaglioLinee> $dettaglioLinee
     * @return static
     */
    public function setDettaglioLinee(
        ?array $dettaglioLinee = null
    ): static {
        $this->dettaglioLinee = $dettaglioLinee;

        return $this;
    }

    /**
     * @translation-german Detail Positionen
     *
     * @return static
     */
    public function unsetDettaglioLinee(): static
    {
        $this->dettaglioLinee = null;

        return $this;
    }

    /**
     * @translation-german Detail Positionen
     *
     * @return static
     */
    public function clearDettaglioLinee(): static
    {
        $this->dettaglioLinee = [];

        return $this;
    }

    /**
     * @translation-german Detail Positionen
     *
     * @param  DettaglioLinee $dettaglioLinee
     * @return static
     */
    public function addToDettaglioLinee(
        DettaglioLinee $dettaglioLinee
    ): static {
        if (!is_array($this->dettaglioLinee)) {
            $this->dettaglioLinee = [];
        }

        $this->dettaglioLinee[] = $dettaglioLinee;

        return $this;
    }

    /**
     * @translation-german Detail Positionen
     *
     * @return DettaglioLinee
     */
    public function addToDettaglioLineeWithCreate(): DettaglioLinee
    {
        $this->addToDettaglioLinee($dettaglioLinee = new DettaglioLinee());

        return $dettaglioLinee;
    }

    /**
     * @translation-german Detail Positionen
     *
     * @param  DettaglioLinee $dettaglioLinee
     * @return static
     */
    public function addOnceToDettaglioLinee(
        DettaglioLinee $dettaglioLinee
    ): static {
        if (!is_array($this->dettaglioLinee)) {
            $this->dettaglioLinee = [];
        }

        $this->dettaglioLinee[0] = $dettaglioLinee;

        return $this;
    }

    /**
     * @translation-german Detail Positionen
     *
     * @return DettaglioLinee
     */
    public function addOnceToDettaglioLineeWithCreate(): DettaglioLinee
    {
        if (!is_array($this->dettaglioLinee)) {
            $this->dettaglioLinee = [];
        }

        if ([] === $this->dettaglioLinee) {
            $this->addOnceToDettaglioLinee(new DettaglioLinee());
        }

        return $this->dettaglioLinee[0];
    }

    /**
     * @return null|DettaglioLinee
     */
    public function getLatestDettaglioLinee(): ?DettaglioLinee
    {
        $dettaglioLinees = $this->getDettaglioLinee() ?? [];
        $dettaglioLinee = end($dettaglioLinees);

        if (false === $dettaglioLinee) {
            return null;
        }

        return $dettaglioLinee;
    }

    /**
     * @return DettaglioLinee
     */
    public function getLatestDettaglioLineeWithCreate(): DettaglioLinee
    {
        if (is_null($dettaglioLinee = $this->getLatestDettaglioLinee())) {
            $dettaglioLinee = $this->addToDettaglioLineeWithCreate();
        }

        return $dettaglioLinee;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @return null|array<DatiRiepilogo>
     */
    public function getDatiRiepilogo(): ?array
    {
        return $this->datiRiepilogo;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @param  null|array<DatiRiepilogo> $datiRiepilogo
     * @return static
     */
    public function setDatiRiepilogo(
        ?array $datiRiepilogo = null
    ): static {
        $this->datiRiepilogo = $datiRiepilogo;

        return $this;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @return static
     */
    public function unsetDatiRiepilogo(): static
    {
        $this->datiRiepilogo = null;

        return $this;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @return static
     */
    public function clearDatiRiepilogo(): static
    {
        $this->datiRiepilogo = [];

        return $this;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @param  DatiRiepilogo $datiRiepilogo
     * @return static
     */
    public function addToDatiRiepilogo(
        DatiRiepilogo $datiRiepilogo
    ): static {
        if (!is_array($this->datiRiepilogo)) {
            $this->datiRiepilogo = [];
        }

        $this->datiRiepilogo[] = $datiRiepilogo;

        return $this;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @return DatiRiepilogo
     */
    public function addToDatiRiepilogoWithCreate(): DatiRiepilogo
    {
        $this->addToDatiRiepilogo($datiRiepilogo = new DatiRiepilogo());

        return $datiRiepilogo;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @param  DatiRiepilogo $datiRiepilogo
     * @return static
     */
    public function addOnceToDatiRiepilogo(
        DatiRiepilogo $datiRiepilogo
    ): static {
        if (!is_array($this->datiRiepilogo)) {
            $this->datiRiepilogo = [];
        }

        $this->datiRiepilogo[0] = $datiRiepilogo;

        return $this;
    }

    /**
     * @translation-german Angaben Zusammenfassung
     *
     * @return DatiRiepilogo
     */
    public function addOnceToDatiRiepilogoWithCreate(): DatiRiepilogo
    {
        if (!is_array($this->datiRiepilogo)) {
            $this->datiRiepilogo = [];
        }

        if ([] === $this->datiRiepilogo) {
            $this->addOnceToDatiRiepilogo(new DatiRiepilogo());
        }

        return $this->datiRiepilogo[0];
    }
}
