<?php

  include "./models/bloco.php";
  include "./controllers/Avatar.php";

  $blocos = [];
  $indice = 0;
  $tamanho = 0;
  
  
  function CriarCaminho($tamanhoMaximo){
    
    global $blocos;
    global $tamanho;
    global $avatar;


    $tamanho = $tamanhoMaximo;

    // Cria e adiciona blocos ao array
    for ($i = 0; $i < $tamanhoMaximo; $i++) {
        $nomeBloco = "Bloco " . ($i + 1);
        $bloco = new Bloco($nomeBloco, $i);
        $blocos[] = $bloco;
    }
  
    // Conecta os blocos
    for ($i = 0; $i < $tamanhoMaximo - 1; $i++) {
        $blocos[$i]->definirProximoBloco($blocos[$i + 1]);
    }
  
    // Primeiro e último bloco como 'normal'
    $blocos[0]->tipo = 'normal';
    $blocos[$tamanhoMaximo - 1]->tipo = 'normal';

    $blocos[0]->avatar = true;
  
    // Sorteia o tipo para os blocos intermediários
    for ($i = 1; $i < $tamanhoMaximo - 1; $i++) {
        $blocos[$i]->sortearTipo($tamanhoMaximo);
    }
  

    echo "<br>".$avatar->nome."<br>";
    exibirCaminho();

  }

  function exibirCaminho(){

    global $blocos;
    global $tamanho;


    for ($i=0; $i < $tamanho; $i++) { 
      
      if(($i+2) > $tamanho){
        echo  "'Id': (".$blocos[$i]->id.")  | 'Tipo': (".$blocos[$i]->tipo.")     | 'Proximo': (".$blocos[0]->id.") ";
      }else{
        echo  "'Id': (".$blocos[$i]->id.")  | 'Tipo': (".$blocos[$i]->tipo.")     | 'Proximo': (".$blocos[$i+1]->id.") ";
      }

      if($blocos[$i]->avatar){
        echo " | 'Avatar'";
      }

      echo ";<br>";

    }

  }


  function sortear(){

    global $blocos;
    global $indice;
    
    $indice = rand(1,6); 

    echo "index: ".$indice;
    echo "<br>";

    moverAvatar();
      //return $index;
  }

  function moverAvatar(){

    global $blocos;
    global $indice;
    global $avatar;



    $blocos[$indice]->avatar = true;

    exibirCaminho();

  }


?>