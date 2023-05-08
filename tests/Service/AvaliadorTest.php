<?php

namespace Raul\Leilao\Tests\Service;

use Raul\Leilao\Model\Lance;
use Raul\Leilao\Model\Leilao;
use Raul\Leilao\Model\Usuario;
use Raul\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

/**
 * Description of AvaliadorTest
 * Arrange - Given
 * Act - When
 * Assert - Then 
 * 
 * Um método de teste pode aceitar argumentos arbitrários. 
 * Esses argumentos devem ser fornecidos por um método provedor de dados (provider() no Exemplo 4.5). 
 * O método do provedor de dados a ser usado é especificado usando a anotação @dataProvider.

 * @author raul
 */
class AvaliadorTest extends TestCase {
    
    private Avaliador $leiloeiro;
    
//    Esse método é responsável por executar determinada ação antes de qualquer teste começar.
    public function setUp(): void {
        $this->leiloeiro = new Avaliador();
    }

    /**
     *  @dataProvider leilaoEmOrdemCrescente
     *  @dataProvider leilaoEmOrdemDecrescente
     *  @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveencontrarOMaiorValorEmOrdemCrescente(Leilao $leilao) {
        $this->leiloeiro->avalia($leilao);
        
        $maiorValor = $this->leiloeiro->getMaiorValor();
        self::assertEquals(2000.00, $maiorValor);
    }

    /**
     *  @dataProvider leilaoEmOrdemCrescente
     *  @dataProvider leilaoEmOrdemDecrescente
     *  @dataProvider leilaoEmOrdemAleatoria
     */
    public function testAvaliadorDeveEncontrarOMaiorValorEmOrdemDecrescente(Leilao $leilao) {
        $this->leiloeiro->avalia($leilao);
        
        $maiorValor = $this->leiloeiro->getMaiorValor();
        self::assertEquals(2000.00, $maiorValor);
    }

    /**
     *  @dataProvider leilaoEmOrdemCrescente
     */
    public function testAvaliadorDeveEncontrarOMenorValorEmOrdemCrescente(Leilao $leilao) {
        $this->leiloeiro->avalia($leilao);

        $menoValor = $this->leiloeiro->getMenorValor();
        self::assertEquals(1000.00, $menoValor);
    }

    /**
     *  @dataProvider leilaoEmOrdemDecrescente
     */
    public function testAvaliadorDeveEncontrarOMenorValorEmOrdemDecrescente(Leilao $leilao) {
        $this->leiloeiro->avalia($leilao);
        
        $menoValor = $this->leiloeiro->getMenorValor();
        self::assertEquals(1000.00, $menoValor);
    }

    /**
     *  @dataProvider leilaoEmOrdemCrescente
     */
    public function testAvalidorDeveBuscarOsTresMaioresLances(Leilao $leilao) {
        $this->leiloeiro->avalia($leilao);

        $maioresLances = $this->leiloeiro->getMaioresLances();
        static::assertCount(3, $maioresLances);
        static::assertEquals(1000, $maioresLances[0]->getValor());
        static::assertEquals(1500, $maioresLances[1]->getValor());
        static::assertEquals(1700, $maioresLances[2]->getValor());
        
    }

//    -------------------DADOS----------------------
//    Foram separados e utilizados usando o @dataProvider
    public static function leilaoEmOrdemCrescente() {
        $leilao = new Leilao("Opala 97");

        $Marcos = new Usuario("Marcos");
        $maria = new Usuario("Maria");
        $ana = new Usuario("Ana");
        $Pamela = new Usuario("Pamela");

        $leilao->recebeLance(new Lance($maria, 1000));
        $leilao->recebeLance(new Lance($ana, 1500));
        $leilao->recebeLance(new Lance($Pamela, 1700));
        $leilao->recebeLance(new Lance($Marcos, 2000));

        return [
            [$leilao]
        ];
    }

    public static function leilaoEmOrdemDecrescente() {
        $leilao = new Leilao("Opala 97");

        $Marcos = new Usuario("Marcos");
        $maria = new Usuario("Maria");
        $ana = new Usuario("Ana");
        $Pamela = new Usuario("Pamela");

        $leilao->recebeLance(new Lance($Marcos, 2000));
        $leilao->recebeLance(new Lance($Pamela, 1700));
        $leilao->recebeLance(new Lance($ana, 1500));
        $leilao->recebeLance(new Lance($maria, 1000));

        return [
            [$leilao]
        ];
    }

    public static function leilaoEmOrdemAleatoria() {
        $leilao = new Leilao("Opala 97");

        $Marcos = new Usuario("Marcos");
        $maria = new Usuario("Maria");
        $ana = new Usuario("Ana");
        $Pamela = new Usuario("Pamela");

        $leilao->recebeLance(new Lance($Pamela, 1700));
        $leilao->recebeLance(new Lance($Marcos, 2000));
        $leilao->recebeLance(new Lance($maria, 1000));
        $leilao->recebeLance(new Lance($ana, 1500));

        return [
            [$leilao]
        ];
    }
    
// Antigo @dataProvider
//    public function entregaLeiloes() {
//        return [
//            [$this->leilaoEmOrdemCrescente()],
//            [$this->leilaoEmOrdemDecrescente()],
//            [$this->leilaoEmOrdemAleatoria()],
//        ];
//    }
}
