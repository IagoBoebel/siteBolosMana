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
        if ($stmt->rowCount() === 0) {
            throw new Exception('Falha na inserção do registro.');
        }
    } catch (Exception $e) {
        throw $e;
    }
    }
    public function recuperar() {
        $query = "SELECT * FROM `produto`";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }   
    public function atualizar($atr, $novo_atr) {
        try {
            $query = "UPDATE produto SET $atr = :novo_atr WHERE id_produto = :id_produto;";
            $stmt = $this->conexao->prepare($query);
            if (is_numeric($novo_atr)) {
                $stmt->bindValue(':novo_atr', (int)$novo_atr, PDO::PARAM_INT); // Força o tipo INT
            } else {
                $stmt->bindValue(':novo_atr', $novo_atr, PDO::PARAM_STR); // Assume string como padrão
            }
            $stmt->bindValue(':id_produto', $this->bolo->__get('idDoProduto'));
            $stmt->execute();
            if($stmt->rowCount() === 0) {
                throw new Exception('Não foi possível atualizar o registro');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function remover() {
        try {
            $query = "DELETE FROM produto WHERE id_produto = :id_produto";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_produto', $this->bolo->__get('idDoProduto'));
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                throw new Exception('Falha na remoção do registro.');
            }
        } catch (Exception $e) {
            throw $e;
        }       
    }   
}


?>