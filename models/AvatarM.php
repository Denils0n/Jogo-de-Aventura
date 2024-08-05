<?php

  class Avatar {
    
    public $nome;
    public $skin;
    public $caminho;

    // Construtor para inicializar o bloco
    public function __construct($nome, $skin) {
      $this->nome = $nome;
      $this->skin = $skin;
      $this->caminho = null;
    }

    

  }
  


?>