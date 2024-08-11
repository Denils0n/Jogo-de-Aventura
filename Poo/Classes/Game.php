<?php

require_once 'Bloco.php';
require_once 'Avatar.php';

class Game {
    private $avatar;
    private $caminho;
    private $blocoAtual;

    public function __construct($nomeAvatar, $skinAvatar) {
        $this->avatar = new Avatar($nomeAvatar, $skinAvatar);

        $this->caminho = new Bloco(1, "skin" . rand(1, 4) . ".png");
        $this->blocoAtual = $this->caminho;
        $this->avatar->setBlocoAtual($this->caminho);
        
        // Cria blocos iniciais
        $this->caminho->gerarCaminho(5);
    }

    public function mover($pulos) {
        $this->moverAvatar($pulos);
        $this->gerarBlocoSeNecessario();
    }

    private function moverAvatar($pulos) {
        $this->avatar->andar($pulos);
        $this->blocoAtual = $this->avatar->getBlocoAtual();

        if ($this->blocoAtual !== null) { 
            switch ($this->blocoAtual->getTipo()) {
                case 'Normal':
                    $this->avatar->setPontuacao($this->avatar->getPontuacao() + 1);
                    break;
                case 'Explosao':
                    $this->avatar->setVida($this->avatar->getVida() - 1);
                    $this->blocoAtual->setExplosao();
                    break;
                case 'Energia':
                    $this->avatar->setEnergia(true);
                    break;
                case 'Bonus':
                    $this->avatar->setPontuacao($this->avatar->getPontuacao() + 2);
                    break;
            }
        }
        $this->caminho->gerarCaminho($pulos);
    }

    private function gerarBlocoSeNecessario() {
        if ($this->avatar->getBlocoAtual() === null) {
            $tipo = sortear();
            $skin = "skin" . $tipo . ".png";
            $novoBloco = new Bloco($tipo, $skin);
            $this->adicionarBloco($novoBloco);
            $this->avatar->setBlocoAtual($novoBloco);
        }
    }

    private function adicionarBloco($novoBloco) {
        $blocoAtual = $this->caminho;
        while ($blocoAtual->getProximo() !== null) {
            $blocoAtual = $blocoAtual->getProximo();
        }
        $blocoAtual->encadearBloco($novoBloco);
    }

    public function exibirBlocos() {
        $this->caminho->exibirBlocos();
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getCaminho() {
        return $this->caminho;
    }


    
}
?>
