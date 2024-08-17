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

        // Inicializa o contador no bloco inicial
        $this->avatar->incrementarContagem($this->caminho->getTipo());
        
        // Cria blocos iniciais
        $this->caminho->gerarCaminho(5);
    }

    public function mover($pulos) {
        $this->moverAvatar($pulos);
        $this->gerarBlocoSeNecessario();
    }

    private function moverAvatar($pulos) {
        
        if($this->avatar->getVida() <> 0){

            $this->avatar->andar($pulos);
            $this->blocoAtual = $this->avatar->getBlocoAtual();
            $this->avatar->setPontuacao(1);
            
            if ($this->blocoAtual !== null) { 
                
                echo "<b>". $this->blocoAtual->getTipo() ."</b><br>" ;
                $this->blocoAtual->setContagemBlocos($this->blocoAtual->getTipo());
    
                switch ($this->blocoAtual->getTipo()) {
                    case 'Normal':
                        $this->avatar->setPontuacao(1);
                        break;
                    case 'Explosao':
                        $this->avatar->setVida($this->avatar->getVida() - 1);
                        $this->blocoAtual->setExplosao();
                        $this->avatar->setPontuacao(-1);
                        break;
                    case 'Energia':
                        $this->avatar->setEnergia(1);
                        $this->avatar->setPontuacao(1);
                        break;
                    case 'Bonus':
                        $this->avatar->setPontuacao(2);
                        break;
                }
            } 
            $this->caminho->gerarCaminho($pulos);
            $this->getCaminho()->exibirBlocos(); 
            echo "Bloco atual do Avatar: Tipo: " . $this->getAvatar()->getBlocoAtual()->getTipo() . ", Skin: " . $this->getAvatar()->getBlocoAtual()->getSkin() . "<br>";
            echo "Vida " . $this->getAvatar()->getVida() . "<br>";
            echo $this->getAvatar()->getBlocoAtual()->getContagemBlocos();
            echo "<br>Pontuação: ".$this->getAvatar()->getPontuacao();


        }else{
            echo "Fim de Jogo<br>";
            echo $this->getAvatar()->getBlocoAtual()->getContagemBlocos();
            echo $this->avatar->getPontuacao();
            echo "<br>Pontuação: ".$this->getAvatar()->getPontuacao();
        }
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
