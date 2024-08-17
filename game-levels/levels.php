<?php
$name = $_POST['name'];
$skin = $_POST['skin'];

// echo $name . $skin;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Game</title>
</head>
<body>
    <div class="container">
        <h1>history linked list</h1>
        <div class="container-box-game">
            <div class="container-play" id="container-play" style="visibility:visible;transform:scale(1);">
                <div class="inline-box">
                    <form action="../index.php">
                        <button class="btn-goBack" type="submit"></button>
                    </form>
                    <h2>choose difficulty</h2>
                </div>
                <form action="game-easy.php">
                    <button class="easy-btn" type="submit"></button>
                </form>
                <form action="game-normal.php">
                    <button class="medium-btn" type="submit"></button>
                </form>
                <form action="game-hard.php">
                    <button class="hard-btn" type="submit"></button>
                </form>
            </div>
            <div class="container-box-game-inner">

            </div>
        </div>
    </div>
</body>
</html>