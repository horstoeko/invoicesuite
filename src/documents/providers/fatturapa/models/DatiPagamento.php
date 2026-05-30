<?php

declare(strict_types=1);

namespace horstoeko\invoicesuite\documents\providers\fatturapa\models;

use horstoeko\invoicesuite\concerns\HandlesObjectFlags;
use horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\CondizioniPagamento;
use JMS\Serializer\Annotation as JMS;

final class DatiPagamento
{
    use HandlesObjectFlags;

    /**
     * @translation-german Condizioni Zahlung
     */
    #[JMS\Accessor(getter: 'getCondizioniPagamento', setter: 'setCondizioniPagamento')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('CondizioniPagamento')]
    #[JMS\Type('enum<\'horstoeko\invoicesuite\documents\providers\fatturapa\models\Enum\CondizioniPagamento\',\'value\'>')]
    #[JMS\XmlElement(cdata: false)]
    private ?CondizioniPagamento $condizioniPagamento = null;

    /**
     * @translation-german Zahlungsdetail
     *
     * @var null|array<DettaglioPagamento>
     */
    #[JMS\Accessor(getter: 'getDettaglioPagamento', setter: 'setDettaglioPagamento')]
    #[JMS\Expose]
    #[JMS\Groups(['fatturapa'])]
    #[JMS\SerializedName('DettaglioPagamento')]
    #[JMS\Type('array<horstoeko\invoicesuite\documents\providers\fatturapa\models\DettaglioPagamento>')]
    #[JMS\XmlElement(cdata: false)]
    #[JMS\XmlList(inline: true, entry: 'DettaglioPagamento')]
    private ?array $dettaglioPagamento = null;

    /**
     * @translation-german Condizioni Zahlung
     *
     * @return null|CondizioniPagamento
     */
    public function getCondizioniPagamento(): ?CondizioniPagamento
    {
        return $this->condizioniPagamento;
    }

    /**
     * @translation-german Condizioni Zahlung
     *
     * @param  null|CondizioniPagamento $condizioniPagamento
     * @return static
     */
    public function setCondizioniPagamento(
        ?CondizioniPagamento $condizioniPagamento = null
    ): static {
        $this->condizioniPagamento = $condizioniPagamento;

        return $this;
    }

    /**
     * @translation-german Condizioni Zahlung
     *
     * @return static
     */
    public function unsetCondizioniPagamento(): static
    {
        $this->condizioniPagamento = null;

        return $this;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @return null|array<DettaglioPagamento>
     */
    public function getDettaglioPagamento(): ?array
    {
        return $this->dettaglioPagamento;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @param  null|array<DettaglioPagamento> $dettaglioPagamento
     * @return static
     */
    public function setDettaglioPagamento(
        ?array $dettaglioPagamento = null
    ): static {
        $this->dettaglioPagamento = $dettaglioPagamento;

        return $this;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @return static
     */
    public function unsetDettaglioPagamento(): static
    {
        $this->dettaglioPagamento = null;

        return $this;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @return static
     */
    public function clearDettaglioPagamento(): static
    {
        $this->dettaglioPagamento = [];

        return $this;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @param  DettaglioPagamento $dettaglioPagamento
     * @return static
     */
    public function addToDettaglioPagamento(
        DettaglioPagamento $dettaglioPagamento
    ): static {
        if (!is_array($this->dettaglioPagamento)) {
            $this->dettaglioPagamento = [];
        }

        $this->dettaglioPagamento[] = $dettaglioPagamento;

        return $this;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @return DettaglioPagamento
     */
    public function addToDettaglioPagamentoWithCreate(): DettaglioPagamento
    {
        $this->addToDettaglioPagamento($dettaglioPagamento = new DettaglioPagamento());

        return $dettaglioPagamento;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @param  DettaglioPagamento $dettaglioPagamento
     * @return static
     */
    public function addOnceToDettaglioPagamento(
        DettaglioPagamento $dettaglioPagamento
    ): static {
        if (!is_array($this->dettaglioPagamento)) {
            $this->dettaglioPagamento = [];
        }

        $this->dettaglioPagamento[0] = $dettaglioPagamento;

        return $this;
    }

    /**
     * @translation-german Zahlungsdetail
     *
     * @return DettaglioPagamento
     */
    public function addOnceToDettaglioPagamentoWithCreate(): DettaglioPagamento
    {
        if (!is_array($this->dettaglioPagamento)) {
            $this->dettaglioPagamento = [];
        }

        if ([] === $this->dettaglioPagamento) {
            $this->addOnceToDettaglioPagamento(new DettaglioPagamento());
        }

        return $this->dettaglioPagamento[0];
    }
}
