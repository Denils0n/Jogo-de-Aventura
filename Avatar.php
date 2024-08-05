<?php

  include "./models/Avatar.php";

  $avatar;

  function CriarAvatar($nome, $skin){

    global $avatar;

    $avatar = new Avatar($nome, $skin);
    echo var_dump($avatar)."<br><hr>";

  }


?>