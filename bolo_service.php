<?php

class BoloService {

    private $conexao;
    private $bolo;
    
    public function __construct(Conexao $conexao, Bolo $bolo) {
        $this->conexao = $conexao->conectar();
        $this->bolo = $bolo;
    }
        
    
    public function inserir() {
        try {
            $query = 'INSERT INTO produto (nome_bolo, preco_bolo, descricao_bolo, sabor_bolo, imagem_bolo) 
                      VALUES (:nome, :preco, :descricao, :sabor, :imagem);';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $this->bolo->__get('nomeDoBolo'));
            $stmt->bindValue(':preco', $this->bolo->__get('precoDoBolo'));
            $stmt->bindValue(':descricao', $this->bolo->__get('descricaoDoBolo'));
            $stmt->bindValue(':sabor', $this->bolo->__get('saborDoBolo'));
            $stmt->bindValue(':imagem', $this->bolo->__get('imagemDoBolo'));
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao inserir: ' . $e->getMessage();
        }
    }
    public function recuperar() {

    }
    public function atualizar() {

    }
    public function remover() {

    }
}

?>