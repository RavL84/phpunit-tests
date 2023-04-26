<?php

namespace Raul\Leilao\Service;

use Raul\Leilao\Model\Leilao;

/**
 * Description of Avaliador
 *
 * @author raul
 */
class Avaliador {

    private float $maiorValor = -INF;
    private float $menoValor = INF;

    public function avalia(Leilao $leilao): void {
        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            } 
            
            if ($lance->getValor() < $this->menoValor) {
                $this->menoValor =$lance->getValor();
            }
        }
//        $lances = $leilao->getLances();
//        $ultimoLance = $lances[count($lances) - 1];
//        $this->maiorValor = $ultimoLance->getValor();
    }

    public function getMaiorValor(): float {
        return $this->maiorValor;
    }
    
    public function getMenorValor(): float {
        return $this->menoValor;
    }

}
