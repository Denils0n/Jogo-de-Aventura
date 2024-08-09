<?php 

require_once "Game.php";

// Cria um novo jogo com o avatar
$game = new Game("Denis", "teste.png");

// Exibe o caminho inicial com blocos
$game->getCaminho()->exibirBlocos();

// Simula pressionar o botão para mover o avatar e gerar novos blocos se necessário
echo "Bloco atual do Avatar: Tipo: " . $game->getAvatar()->getBlocoAtual()->getTipo() . ", Skin: " . $game->getAvatar()->getBlocoAtual()->getSkin() . "<br>";

$game->mover(3);
echo "Bloco atual do Avatar: Tipo: " . $game->getAvatar()->getPontuacao() . ", Skin: " . $game->getAvatar()->getBlocoAtual()->getSkin() . "<br>";


$game->getCaminho()->exibirBlocos();





?>
