<?php

namespace Raul\Leilao\Service;

use Raul\Leilao\Model\Leilao;
use Raul\Leilao\Model\Lance;


/**
 * Description of Avaliador
 *
 * @author raul
 */
class Avaliador {

    private float $maiorValor = -INF;
    private float $menoValor = INF;
    private array $maioresLaces = [] ;
    
    public function avalia(Leilao $leilao): void {
        foreach ($leilao->getLances() as $lance) {
            if ($lance->getValor() > $this->maiorValor) {
                $this->maiorValor = $lance->getValor();
            }
            
            if ($lance->getValor() < $this->menoValor) {
                $this->menoValor = $lance->getValor();
            }
            
//          Implementa uma ordenação nos lances do leilão.
            $lances = $leilao->getLances();

            usort($lances, function (Lance $lance1, Lance $lance2) {
                return ($lance1->getValor() - $lance2->getValor()); 
            });
             
            $this->maioresLaces = array_slice($lances, 0, 3);
            
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
    
    public function getMaioresLances(): array {
        return $this->maioresLaces;
    }

}
