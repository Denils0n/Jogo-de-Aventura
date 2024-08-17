<?php

    class Avatar {
        private $nome;
        private $skin;
        private $vida;
        private $energia;
        private $pontuacao;
        private $blocoAtual;

        private $contagemBlocos = [
            'Normal' => 0,
            'Explosao' => 0,
            'Energia' => 0,
            'Bonus' => 0,
            'Explosivo' => 0,
        ];


        public function __construct($nome, $skin) {
            $this->nome = $nome;
            $this->skin = $skin;
            $this->vida = 3; 
            $this->energia = true; 
            $this->pontuacao = 1; // contando a primeira posição
            $this->blocoAtual = null;
            
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getSkin() {
            return $this->skin;
        }

        public function setSkin($skin) {
            $this->skin = $skin;
        }

        public function getVida() {
            return $this->vida;
        }

        public function setVida($vida) {
            $this->vida = $vida;
        }

        public function getEnergia() {

            return $this->energia;
        }

        public function setEnergia($energia) {
            $this->energia = $energia;
        }

        public function getPontuacao() {
            return $this->pontuacao;
        }

        public function setPontuacao($pontuacao) {
            $this->pontuacao = $this->pontuacao + $pontuacao;
        }

        public function getBlocoAtual() {
            return $this->blocoAtual;
        }

        public function setBlocoAtual($blocoAtual) {
            $this->blocoAtual = $blocoAtual;
        }

        public function andar($pulos) {
            for ($i = 0; $i < $pulos; $i++) {
                if ($this->blocoAtual !== null) {
                    $proximoBloco = $this->blocoAtual->getProximo();
                    if ($proximoBloco !== null) {
                        $this->blocoAtual = $proximoBloco;   
                        if($i == $pulos) {
                            echo "<i>localPulo:</i>". $this->blocoAtual->setContagemBlocos($this->blocoAtual->getTipo()) ."<br>";
                            $this->setPontuacao(1);
                        }                        
                    } else {
                        break;
                    }
                }
            }
            // Incrementar a contagem do tipo de bloco
            $this->incrementarContagem($this->blocoAtual->getTipo());
        }
    
        public function getContagemBlocos() {

            echo "<br>-------------------------------CONTAGEM BLOCOS----------------------------------";
            echo "<br>Normal: " . $this->contagemBlocos["Normal"];
            echo "<br>Explosivo: " . $this->contagemBlocos["Explosivo"];
            echo "<br>Energia: " . $this->contagemBlocos["Energia"];
            echo "<br>Bonus: " . $this->contagemBlocos["Bonus"];
            echo "<br>Explosao: " . $this->contagemBlocos["Explosao"] . "<br>";
            echo "--------------------------------------------------------------------------------<br>";

            //return var_dump($this->contagemBlocos);
        }
    
        public function incrementarContagem($tipo) {
            switch ($tipo) {
                case 'Normal':
                    $this->contagemBlocos["Normal"]++;
                    break;
                case 'Explosao':
                    $this->contagemBlocos["Explosao"]++;
                    break;
                case 'Energia':
                    $this->contagemBlocos["Energia"]++;
                    break;
                case 'Bonus':
                    $this->contagemBlocos["Bonus"]++;
                    break;
            }
        }

    }


?>