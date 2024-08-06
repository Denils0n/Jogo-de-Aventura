<?php

class Bloco {
    private $tipo;
    private $skin;
    private $proximo;

    // Construtor
    public function __construct($tipo, $skin) {
        $this->tipo = $tipo;
        $this->skin = $skin;
        $this->proximo = null;
    }

    // Getters e Setters
    public function getTipo() {
        switch ($this->tipo) {
            case 1: return "Normal";
            case 2: return "Explosao";
            case 3: return "Energia";
            case 4: return "Bonus";
        }
    }

    public function getSkin() {
        return $this->skin;
    }

    public function getProximo() {
        return $this->proximo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setSkin($skin) {
        $this->skin = $skin;
    }

    public function setProximo($proximo) {
        $this->proximo = $proximo;
    }

    public function encadearBloco($bloco) {
        $this->proximo = $bloco;
    }

    public function adicionarBloco($tipo, $skin) {
        $novoBloco = new Bloco($tipo, $skin);
        $blocoAtual = $this;
        while ($blocoAtual->getProximo() !== null) {
            $blocoAtual = $blocoAtual->getProximo();
        }
        $blocoAtual->encadearBloco($novoBloco);
    }

    public function exibirBlocos() {
        $blocoAtual = $this;
        while ($blocoAtual !== null) {
            echo "Tipo: " . $blocoAtual->getTipo() . ", Skin: " . $blocoAtual->getSkin() . "<br>";
            $blocoAtual = $blocoAtual->getProximo();
        }
    }

    public function criarBlocosAleatorios($quantidade) {
        $blocoAtual = $this;
        for ($i = 0; $i < $quantidade; $i++) {
            $tipo = rand(1, 4);
            $skin = "skin" . rand(1, 4) . ".png";
            $novoBloco = new Bloco($tipo, $skin);
            $blocoAtual->encadearBloco($novoBloco);
            $blocoAtual = $novoBloco;
        }
    }
}


?>
