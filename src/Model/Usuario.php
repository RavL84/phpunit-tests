<?php
namespace Raul\Leilao\Model;
/**
 * Description of Usuario
 *
 * @author raul
 */
class Usuario {
    private string $nome;
    
    public function __construct(string $nome) {
        $this->nome = $nome;
    }
    
    public function getNome(): string {
        return $this->nome;
    }
}
