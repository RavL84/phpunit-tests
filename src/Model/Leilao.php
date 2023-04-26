<?php
namespace Raul\Leilao\Model;

/**
 * Description of Leilao
 *
 * @author raul
 */
class Leilao {
    private array $lances;
    private string $descricao;
    
    public function __construct(string $descricao) {
        $this->descricao = $descricao;
        $this->lances = [];
    }
    
    public function recebeLance(Lance $lance) {
        $this->lances[] = $lance;
    }
    
    public function getLances(): array {
        return $this->lances;
    }
    
    
}
