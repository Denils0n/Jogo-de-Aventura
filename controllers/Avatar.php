<?php

  require_once "../models/Avatar.php";

  $avatar;

  function CriarAvatar($nome, $skin){

    

    $avatar = new Avatar($nome, $skin);
    echo var_dump($avatar)."<br><hr>";
    

  }


?>*/