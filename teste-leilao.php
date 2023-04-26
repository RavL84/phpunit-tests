<?php
require './vendor/autoload.php';

use Raul\Leilao\Model\Leilao;
use Raul\Leilao\Model\Usuario;
use Raul\Leilao\Model\Lance;
use Raul\Leilao\Service\Avaliador;

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
$valorEsperado = 2000.00;

if($valorEsperado === $maiorValor){
    echo 'Teste OK';
} else {
    echo 'Falha no teste';
}

    