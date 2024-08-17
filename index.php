<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Game</title>
</head>
<body>
    <div class="container">
        <h1>history linked list</h1>
        <div class="container-box-game">
            <div class="container-btn" id="container-btn">
                <audio id="buttonSound" src="./sound/click.mp3" style="display: none;"></audio>
                <button class="btn-play" onclick="play()"></button>
                <button class="btn-rank" onclick="rank()"></button>
            </div>
            <div class="container-name-skin" id="container-name-skin">
                <form action="game-levels/levels.php" method="POST">
                    <div class="form">
                        <button type="button" class="btn-goBack" onclick="goBack()"></button>
                        <h2>Enter your name:</h2>
                        <input type="text" name="name"required>
                    </div>
                    <br>
                    <div class="characters">
                        <input type="radio" name="skin" class="skin-1" value="Milta_teste.png" required>
                        <input type="radio" name="skin" class="skin-2" value="Milta_Blue_teste.png" required>
                    </div>
                    <br>
                    <div class="container-btn-submit-form">
                        <input type="submit" value="" class="btn-play-2">
                    </div>
                </form>
            </div>
            <div class="container-rank" id="container-rank">
                <button class="btn-goBack-2" id="btn-goBack-2" onclick="goBack2()"></button>
                <div class="rank">
                    <div class="text-rank">
                        
                    </div>
                </div>
            </div>
            <div class="container-box-game-inner">
            </div>
        </div>
    </div>
    <script src="../script/script.js"></script>
</body>
</html>