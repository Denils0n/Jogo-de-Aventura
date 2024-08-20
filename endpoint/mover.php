<?php
session_start();

// Incluir a classe Game
require_once '../Poo/Classes/Game.php';

// Debug: Mostrar o ID da sessão e o conteúdo da sessão
echo 'ID da Sessão: ' . session_id() . '<br>';
echo 'Conteúdo da Sessão:<br>';
echo '<pre>' . print_r($_SESSION, true) . '</pre>';

// Verificar se o objeto Game está na sessão
if (isset($_SESSION['game']) && $_SESSION['game'] instanceof Game) {
    $game = $_SESSION['game'];
    $pulos = isset($_POST['pulos']) ? intval($_POST['pulos']) : 0;
    $game->mover($pulos);
    echo "Método mover chamado com pulos: $pulos<br>";
} else {
    echo "Instância do Game não encontrada na sessão.<br>";
}
?>
