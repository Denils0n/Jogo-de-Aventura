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
    public function __construct($tipo) {
        if ($tipo === 1) {
            $this->setTipo("Normal");
            $sking_caminho = "../../Imagens/Plataforma/Piso_normal.png";
            $this->skin = $sking_caminho;
        }elseif ($tipo === 2) {
            $this->setTipo("Explosao");
            $sking_caminho = "../../Imagens/Plataforma/Piso_bomba.png";
            $this->skin = $sking_caminho;
        
        }elseif ($tipo === 3) {
            $this->setTipo("Energia");
            $sking_caminho = "../../Imagens/Plataforma/Piso_raio.png";
            $this->skin = $sking_caminho;
        
        }elseif ($tipo === 4) {
            $this->setTipo("Bonus");
            $sking_caminho = "../../Imagens/Plataforma/Piso_bonus.png";
            $this->skin = $sking_caminho;
        
        }else {
            $this->setTipo("desconhecido");
        }


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

    public function getArray(){
        return self::$contagemBlocos;
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

        //return self::$contagemBlocos;
    }


    public function getContagemCaminho() {
        return self::$contagemBlocos["todosBlocosGerados"];
    }




    public function exibirBlocos() {
        $blocoAtual = $this;
        $html = ""; // String para armazenar o HTML gerado
    
        while ($blocoAtual !== null) {
            // Adiciona a imagem do bloco ao HTML
            $html .= '<img src="' . $blocoAtual->skin . '" alt="' . $blocoAtual->tipo . '">';
            $blocoAtual = $blocoAtual->getProximo(); // Move para o próximo bloco
        }
    
        echo $html; // Exibe o HTML gerado
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
            $novoBloco = new Bloco($tipo);
            $blocoAtual->encadearBloco($novoBloco);
            $blocoAtual = $novoBloco;
        }
    }

    private function sorteio() {
        
        return 2;
        /* $d= rand(1, 100);

        if ($d <= 50) {
            return 1;
        }elseif ($d > 50 && $d <= 80) {
            return 2;
        }elseif ($d > 80 && $d <= 90) {
            return 3;
        }elseif ($d > 90 && $d <= 100) {
            return 4;
        } */


    }


    public function finalizarNivel($nome, $nivel) {

        $nomeArquivo = "./Niveis/{$nome}_{$nivel}.csv";
        $arquivo = fopen($nomeArquivo, 'w');

        foreach (self::$contagemBlocos as $chave=>$valor) {

            fputcsv($arquivo, [$chave, $valor]);
        }

        fputcsv($arquivo, ["-------------------------------------------"]);
        fclose($arquivo);

    }

    public function getScore($nome, $nivel){

        $nomeArquivo = "./Niveis/{$nome}_{$nivel}.csv";

        if (!file_exists($nomeArquivo)) {
            return "Arquivo não encontrado: {$nomeArquivo}";
        }

        $arquivo = fopen($nomeArquivo, 'r');

        while (($linha = fgetcsv($arquivo)) !== false) {
            if ($linha[0] === "-------------------------------------------") {
                continue;
            }

            $dados[$linha[0]] = $linha[1];
        }

        fclose($arquivo);
        return $dados;

    }

}




?>
