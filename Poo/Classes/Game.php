<?php

require_once 'Bloco.php';
require_once 'Avatar.php';

class Game {
    private $avatar;
    private $blocoInicial;
    private $blocoAtual;
    private $mostrarBlocos;
    private $estadoGeracaoBloco;

    public function __construct($nomeAvatar, $skinAvatar) {
        $this->avatar = new Avatar($nomeAvatar, $skinAvatar);

        // Cria 6 blocos iniciais
        $this->blocoInicial = new Bloco(rand(1, 4), "skin" . rand(1, 4) . ".png");
        $this->blocoAtual = $this->blocoInicial;
        $this->avatar->setBlocoAtual($this->blocoInicial);

        $this->mostrarBlocos = [$this->blocoInicial];
        $this->estadoGeracaoBloco = false;

        $this->criarBlocosIniciais(5); // Cria mais 5 blocos
    }

    public function __wakeup() {
        // Aqui você pode reconfigurar qualquer estado necessário após a deserialização
    }

    private function criarBlocosIniciais($quantidade) {
        $blocoAtual = $this->blocoInicial;
        for ($i = 0; $i < $quantidade; $i++) {
            $tipo = rand(1, 4);
            $skin = "skin" . rand(1, 4) . ".png";
            $novoBloco = new Bloco($tipo, $skin);
            $blocoAtual->encadearBloco($novoBloco);
            $blocoAtual = $novoBloco;
            $this->mostrarBlocos[] = $novoBloco;
        }
    }

    public function pressionarBotao() {
        $this->moverAvatar();
        $this->estadoGeracaoBloco = true;
    }

    private function moverAvatar() {
        $this->avatar->moverParaProximoBloco();
        if ($this->avatar->getBlocoAtual() === null) {
            $tipo = rand(1, 4);
            $skin = "skin" . rand(1, 4) . ".png";
            $novoBloco = new Bloco($tipo, $skin);
            $this->adicionarBloco($novoBloco);
            $this->avatar->setBlocoAtual($novoBloco);
        }
        $this->blocoAtual = $this->avatar->getBlocoAtual();
    }

    private function adicionarBloco($novoBloco) {
        $blocoAtual = $this->blocoInicial;
        while ($blocoAtual->getProximo() !== null) {
            $blocoAtual = $blocoAtual->getProximo();
        }
        $blocoAtual->encadearBloco($novoBloco);
        $this->mostrarBlocos[] = $novoBloco;
    }

    public function exibirBlocos() {
        foreach ($this->mostrarBlocos as $bloco) {
            echo "Tipo: " . $bloco->getTipo() . ", Skin: " . $bloco->getSkin() . "<br>";
        }
    }

    public function getAvatar() {
        return $this->avatar;
    }
}
?>
