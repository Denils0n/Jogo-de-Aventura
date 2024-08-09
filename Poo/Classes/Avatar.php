<?php

    class Avatar {
        private $nome;
        private $skin;
        private $vida;
        private $energia;
        private $pontuacao;
        private $blocoAtual;

        public function __construct($nome, $skin) {
            $this->nome = $nome;
            $this->skin = $skin;
            $this->vida = 3; // Valor padrão
            $this->energia = true; // Valor padrão
            $this->pontuacao = 0; // Valor padrão
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
            $this->pontuacao = $pontuacao;
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
                    } else {
                        break;
                    }
                }
            }
        }
    }


?>