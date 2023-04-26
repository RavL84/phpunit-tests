<?php
namespace Raul\Leilao\Tests\Service;

use Raul\Leilao\Model\Lance;
use Raul\Leilao\Model\Leilao; 
use Raul\Leilao\Model\Usuario;
use Raul\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

/**
 * Description of AvaliadorTest
 *
 * @author raul
 */
class AvaliadorTest extends TestCase {

    public function testAvaliadorDeveencontrarOMaiorValorEmOrdemCrescente() {
// Arrange - Given
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 1500));
        $leilao->recebeLance(new Lance($joao, 2000));

//Act - When
        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $maiorValor = $avaliador->getMaiorValor();

// Assert - Then
//        $this->assertEquals(2000.00, $maiorValor);
        self::assertEquals(2000.00, $maiorValor);
    }
    
    public function testAvaliadorDeveEncontrarOMaiorValorEmOrdemDecrescente() {
// Arrange - Given
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 1500));

//Act - When
        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $maiorValor = $avaliador->getMaiorValor();

// Assert - Then
//        $this->assertEquals(2000.00, $maiorValor);
        self::assertEquals(2000.00, $maiorValor);
    }
    
    
    public function testAvaliadorDeveEncontrarOMenorValorEmOrdemCrescente() {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($maria, 1500));
        $leilao->recebeLance(new Lance($joao, 2000));
        
        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $menoValor = $avaliador->getMenorValor();
        self::assertEquals(1500.00, $menoValor);
    }
    
    public function testAvaliadorDeveEncontrarOMenorValorEmOrdemDecrescente() {
        $leilao = new Leilao('Fiat 147 0KM');

        $maria = new Usuario('Maria');
        $joao = new Usuario('João');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($maria, 1500));
        
        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $menoValor = $avaliador->getMenorValor();
        self::assertEquals(1500.00, $menoValor);
    }

    

}

