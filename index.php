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
                <button class="btn-play" onclick="play()"></button>
                <button class="btn-rank" onclick="rank()"></button>
                <!-- <button>tessssteeeee</button> -->
            </div>
            <div class="container-play" id="container-play">
                <div class="inline-box">
                    <button class="btn-goBack" onclick="goBack()"></button>
                    <h2>choose difficulty</h2>
                </div>
                <button class="easy-btn" onclick="easyBtn()"></button>
                <button class="medium-btn" onclick="mediumBtm()"></button>
                <button class="hard-btn" onclick="hardBtn()"></button>
            </div>
            <div class="container-rank" id="container-rank">
                <button class="btn-goBack-2" id="btn-goBack-2" onclick="goBack2()"></button>
                <div class="rank"></div>
            </div>
            <div class="container-box-game-inner">
            </div>
        </div>
    </div>
    <script src="../script/script.js"></script>
</body>
</html>