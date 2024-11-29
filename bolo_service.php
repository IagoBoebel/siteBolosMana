<?php

// Classe responsável por gerenciar operações relacionadas ao bolo no banco de dados
class BoloService {

    private $conexao; // Conexão com o banco de dados
    private $bolo;    // Objeto Bolo

    // Construtor da classe que inicializa a conexão e o objeto Bolo
    public function __construct(Conexao $conexao, Bolo $bolo) {
        $this->conexao = $conexao->conectar();
        $this->bolo = $bolo;
    }

    // Método para inserir um novo bolo no banco de dados
    public function inserir() {
        try {
            $query = 'INSERT INTO produto (nome_bolo, preco_bolo, descricao_bolo, sabor_bolo, imagem_bolo) 
                      VALUES (:nome, :preco, :descricao, :sabor, :imagem);';
            $stmt = $this->conexao->prepare($query);

            // Vincula os valores das propriedades do bolo à consulta
            $stmt->bindValue(':nome', $this->bolo->__get('nomeDoBolo'));
            $stmt->bindValue(':preco', $this->bolo->__get('precoDoBolo'));
            $stmt->bindValue(':descricao', $this->bolo->__get('descricaoDoBolo'));
            $stmt->bindValue(':sabor', $this->bolo->__get('saborDoBolo'));
            $stmt->bindValue(':imagem', $this->bolo->__get('imagemDoBolo'));

            $stmt->execute();

            // Verifica se a inserção foi bem-sucedida
            if ($stmt->rowCount() === 0) {
                throw new Exception('Falha na inserção do registro.');
            }
        } catch (Exception $e) {
            // Lança a exceção para ser tratada em outro lugar
            throw $e;
        }
    }

    // Método para recuperar todos os bolos do banco de dados
    public function recuperar() {
        $query = "SELECT * FROM `produto`";  // Consulta para selecionar todos os registros
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        // Retorna todos os resultados como objetos
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para atualizar um atributo específico de um bolo no banco de dados
    public function atualizar($atr, $novo_atr) {
        try {
            $query = "UPDATE produto SET $atr = :novo_atr WHERE id_produto = :id_produto;";
            $stmt = $this->conexao->prepare($query);

            // Verifica o tipo do novo atributo para definir o tipo de parâmetro corretamente
            if (is_numeric($novo_atr)) {
                $stmt->bindValue(':novo_atr', (int)$novo_atr, PDO::PARAM_INT); // Converte para INT
            } else {
                $stmt->bindValue(':novo_atr', $novo_atr, PDO::PARAM_STR); // Assume string como padrão
            }

            $stmt->bindValue(':id_produto', $this->bolo->__get('idDoProduto'));
            $stmt->execute();

            // Verifica se a atualização foi bem-sucedida
            if ($stmt->rowCount() === 0) {
                throw new Exception('Não foi possível atualizar o registro');
            }
        } catch (Exception $e) {
            // Lança a exceção para ser tratada em outro lugar
            throw $e;
        }
    }

    // Método para remover um bolo do banco de dados
    public function remover() {
        try {
            $query = "DELETE FROM produto WHERE id_produto = :id_produto";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_produto', $this->bolo->__get('idDoProduto'));
            $stmt->execute();

            // Verifica se a remoção foi bem-sucedida
            if ($stmt->rowCount() === 0) {
                throw new Exception('Falha na remoção do registro.');
            }
        } catch (Exception $e) {
            // Lança a exceção para ser tratada em outro lugar
            throw $e;
        }
    }
}

?>
