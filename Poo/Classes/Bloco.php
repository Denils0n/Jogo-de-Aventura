<?php

class Bloco {
    private $tipo;
    private $skin;
    private $proximo;

    private static $contagemBlocos = array(
        "blocosEnergia" => 0,
        "blocosPontuacao" => 0,
        "blocosExplosivos" => 0,
        "blocosExplodidos" => 0,
        "blocosNormais" => 0,
        "todosBlocosGerados" => 0,
        "todosBlocosSorteados" => 0
    );


    // Construtor
    public function __construct($tipo, $skin) {
        if ($tipo === 1) {
            $this->setTipo("Normal");
        }elseif ($tipo === 2) {
            $this->setTipo("Explosao");
        }elseif ($tipo === 3) {
            $this->setTipo("Energia");
        }elseif ($tipo === 4) {
            $this->setTipo("Bonus");
        }else {
            $this->setTipo("desconhecido");
        }
        $this->skin = $skin;
        $this->proximo = null;
    }

    // Getters e Setters
    public function getTipo() {
        return $this->tipo;
    }

    public function getSkin() {
        return $this->skin;
    }

    public function getProximo() {
        return $this->proximo;
    }

    public function setTipo($tipo) {

        self::$contagemBlocos["todosBlocosGerados"]++;
        $this->tipo = $tipo;
    }
    
    public function setContagemBlocos($tipo) {
        
        self::$contagemBlocos["todosBlocosSorteados"]++;
        
        switch ($tipo) {
            case 'Energia':
                self::$contagemBlocos["blocosEnergia"]++;
                break;
            case 'Normal':
                self::$contagemBlocos["blocosNormais"]++;
                break;
            case 'Explosao':
                self::$contagemBlocos["blocosExplosivos"]++;
                break;
            case 'Bonus':
                self::$contagemBlocos["blocosPontuacao"]++;
                break;
        } 
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

    public function setExplosao() {
        self::$contagemBlocos["blocosExplodidos"]++;
        self::$contagemBlocos["blocosExplosivos"]--;
    }

    public function getContagemBlocos() {
        
        echo "<br>------------CONATGEM BLOCOS-----------<br>";
        echo " Tamanho Caminho: " . self::$contagemBlocos["todosBlocosGerados"] ."<br>";
        echo " Total Blocos Percorridos: " . self::$contagemBlocos["todosBlocosSorteados"] ."<br>";
        echo " blocos energia: " . self::$contagemBlocos["blocosEnergia"] ."<br>";
        echo " blocos explosivo: " . self::$contagemBlocos["blocosExplosivos"] ."<br>";
        echo " blocos bonus: " . self::$contagemBlocos["blocosPontuacao"] ."<br>";
        echo " blocos normal: " . self::$contagemBlocos["blocosNormais"] ."<br>";
        echo " blocos explodidos: " . self::$contagemBlocos["blocosExplodidos"] ."<br>";
        echo "-------------------------------------------";
    }


    public function exibirBlocos() {
        $blocoAtual = $this;
        while ($blocoAtual !== null) {
            echo "Tipo: " . $blocoAtual->getTipo() . ", Skin: " . $blocoAtual->getSkin() . "<br>";
            $blocoAtual = $blocoAtual->getProximo();
        }
    }

    // Modificado para adicionar blocos sem limpar a cadeia existente
    public function gerarCaminho($quantidade) {
        $blocoAtual = $this;
        // Encontra o último bloco da cadeia existente
        while ($blocoAtual->getProximo() !== null) {
            $blocoAtual = $blocoAtual->getProximo();
        }
        // Adiciona novos blocos ao final da cadeia
        for ($i = 0; $i < $quantidade; $i++) {
            $tipo = $this->sorteio();
            $skin = "skin" . rand(1, 4) . ".png";
            $novoBloco = new Bloco($tipo, $skin);
            $blocoAtual->encadearBloco($novoBloco);
            $blocoAtual = $novoBloco;
        }
    }

    private function sorteio() {
        
        $d= rand(1, 100);

        if ($d <= 50) {
            return 1;
        }elseif ($d > 50 && $d <= 80) {
            return 2;
        }elseif ($d > 80 && $d <= 90) {
            return 3;
        }elseif ($d > 90 && $d <= 100) {
            return 4;
        }


    }


}


?>
