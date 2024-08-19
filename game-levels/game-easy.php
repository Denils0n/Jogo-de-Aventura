<?php
session_start();
$name = $_POST['name'];
$skin = $_POST['skin'];
$nivel = $_POST['nivel'];

//echo $name . $skin;

require_once '../Poo/Classes/Game.php';

$game = new Game($name, $skin,$nivel);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/game.css">
    <title>Game</title>
</head>
<body>
    <div class="container">
        <h1>history linked list</h1>
        <div class="container-box-game">
            <div class="screen-game">
                <div class="cloud cloud-1">
                </div>
                <div class="cloud cloud-2">
                </div>
                <div class="container-characters">
                    <div class="container-life">
                        <?php

                            $life = $game->getAvatar()->getVida();
                            for ($i=1;$i<=$life;$i++){
                                echo '<image id="life-'.$i.'" src="../Imagens/Coracao/1_coracao_cheio_cut.png"/>';
                            }
                        ?>
                    </div>
                    <?php
                        //alterar depois
                        //echo ($game->getAvatar()->getNome());
                        
                        
                        //editar aqui layrton!!
                        // echo "<div style=\"background-image:url('../Imagens/Personagem/" . $game->getAvatar()->getSkin() . "'); width:100px; height:100px;\">";
                        // echo "</div>";

                        echo $game->getAvatar()->getVida();
                        // $a = $game->getCaminho()->exibirBlocos();

                        // for ($i = 0; $i < count($a); $i++) { 
                        //     echo $a[$i]->getTipo();
                        //     echo $a[$i]->getSkin();
                            
                        // }

                    ?>
                    <div class="box-character">
                        <?php
                            echo "<div class='character' style=\"background-image:url('../Imagens/Personagem/" . $game->getAvatar()->getSkin() . "');\"></div>";
                            // echo "<div class='character' style='background-image: url('../Imagens/Personagem/".$game->getAvatar()->getSkin().");'></div>";
                            // echo "../imagens/personagem/".$game->getAvatar()->getSkin();
                        ?>
                        <div class="container-btn-game">
                            <button class="jump" on></button>
                            <button class="jump"></button>
                            <button class="jump"></button>
                        </div>
                    </div>
                    <div class="floor">
                        <?php
                            $a = $game->getCaminho()->exibirBlocos();

                            for ($i = 0; $i < count($a); $i++) { 
                                echo $a[$i]->getTipo();
                                echo $a[$i]->getSkin()." ";
                                
                            }

                            // for ($i = 0; $i < count($a); $i++) { 
                            //     echo '<div class="bloco" style="width: 200px; height: 200px; background-image: url("../Imagens/Plataforma/");"></div>';
                            // }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>