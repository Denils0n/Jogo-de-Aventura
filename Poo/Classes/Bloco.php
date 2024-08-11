<?php

class Bloco {
    private $tipo;
    private $skin;
    private $proximo;

    private static $contagemBlocos = array(
        "energia" => 0,
        "pontuacao" => 0,
        "explosivo" => 0,
        "explosao" => 0,
        "blocos" => 0,
        "normal" => 0,
        "total" => 0
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
        
        $this->tipo = $tipo;
        self::$contagemBlocos["total"]++;
        
        switch ($tipo) {
            case 'Energia':
                self::$contagemBlocos["energia"]++;
                break;
            case 'Normal':
                self::$contagemBlocos["normal"]++;
                break;
            case 'Explosao':
                self::$contagemBlocos["explosivo"]++;
                break;
            case 'Bonus':
                self::$contagemBlocos["pontuacao"]++;
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
        self::$contagemBlocos["explosao"]++;
    }

    public function getContagemBlocos() {
        
        echo "<br>------------CONATGEM BLOCOS-----------<br>";
        echo " Total blocos: " . self::$contagemBlocos["total"] ."<br>";
        echo " blocos energia: " . self::$contagemBlocos["energia"] ."<br>";
        echo " blocos explosivo: " . self::$contagemBlocos["explosivo"] ."<br>";
        echo " blocos bonus: " . self::$contagemBlocos["pontuacao"] ."<br>";
        echo " blocos normal: " . self::$contagemBlocos["normal"] ."<br>";
        echo " blocos explodidos: " . self::$contagemBlocos["explosao"] ."<br>";
        echo "-------------------------------------------";
        //return $this->contagemBlocos;
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
