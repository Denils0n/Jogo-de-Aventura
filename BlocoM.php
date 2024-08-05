<?php

  class Bloco {

    public $id;
    public $nome;
    public $proximoBloco;
    public $tipo;
    public $avatar;

    // Construtor para inicializar o bloco
    public function __construct($nome, $id) {
      $this->id = $id;
      $this->nome = $nome;
      $this->proximoBloco = null;
      $this->tipo = 'normal';
      $this->avatar = false;
    }

    public function definirProximoBloco(Bloco $bloco) {
      $this->proximoBloco = $bloco;
    }

    // Sorteia o tipo do bloco de acordo com as porcentagens
    public function sortearTipo($tamanhoCaminho) {
      
      $percentuais = [
          'normal' => 50,
          'explosivo' => 20,
          'energia' => 20,
          'pontuacao' => 15,
      ];
      
      // Recalcula percentuais
      if ($tamanhoCaminho > 12) {
          $percentuais['normal'] = 40; 
          $percentuais['explosivo'] = 25;
          $percentuais['energia'] = 25;
          $percentuais['pontuacao'] = 10;
      }

      // Sorteia um número aleatório entre 0 e 100
      $sorteio = mt_rand(1, 100);

      // Determina o tipo com base no número sorteado
      $acumulado = 0;
      foreach ($percentuais as $tipo => $percentual) {
          $acumulado += $percentual;
          if ($sorteio <= $acumulado) {
              $this->tipo = $tipo;
              return;
          }
      }

      $this->tipo = 'normal';
    }

    // Exibe informações sobre o bloco e seus próximos blocos de forma recursiva
    public function exibirEstrutura($nivel = 0) {
      
      echo str_repeat('-', $nivel) . $this->nome . " (Tipo: " . $this->tipo . ")\n";
      echo "<br>";

      if ($this->proximoBloco !== null) {
          $this->proximoBloco->exibirEstrutura($nivel);
      }
    }

    /* public function sortBloco(){
      $index = rand(1,6); 
      return $index;
    } */

  }

?>