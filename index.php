<?php

  include "./controllers/caminho.php";
  include "./controllers/Avatar.php";

  CriarAvatar("sisi","azul");
  CriarCaminho(20);

  $i = 0;
  while($i < 5){
    sortear();
    $i++;
  }
  

?>