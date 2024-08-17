<?php 

require_once "Game.php";

// Cria um novo jogo com o avatar
$game = new Game("Denis", "teste.png");

// Exibe o caminho inicial com blocos
$game->getCaminho()->exibirBlocos();

echo "Vida " . $game->getAvatar()->getVida() . "<br>";
echo "<hr>";

$arrayPulos = [1,2,1,1,2,1,2];
for( $i = 0; $i < count($arrayPulos); $i++ ) {
    
    echo "<br> Salto: ". $i ;
    
    if($game->getAvatar()->getEnergia() > 1){
        echo "<br> Pulos: 3<br>";
        $game->mover(3);
    }else{
        echo "<br> Pulos: ". $arrayPulos[$i] ."<br>";
        $game->mover($arrayPulos[$i]);
    }
    echo "<hr>";

}


?>
