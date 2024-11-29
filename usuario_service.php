<?php

class UsuarioService {

    private $conexao;
    private $usuario;
    
    // Construtor da classe, recebe objetos de Conexao e Usuario
    public function __construct(Conexao $conexao, Usuario $usuario) {
        $this->conexao = $conexao->conectar(); // Conecta ao banco de dados
        $this->usuario = $usuario; // Atribui o objeto Usuario
    }
        
    // Função para inserir um novo usuário no banco de dados
    public function inserir() {
        try {
            // Query SQL para inserir dados na tabela cliente
            $query = "INSERT INTO cliente (cpf_cliente, CEP, email_cliente, nome_cliente, numero_casa, rua, senha_cliente, telefone_cliente, tipo_acesso)
                        VALUES (:cpf, :cep, :email, :nome, :numero, :rua, :senha, :telefone, :tipo_acesso);";
            
            // Prepara a consulta
            $stmt = $this->conexao->prepare($query);
            
            // Faz o binding dos valores dos atributos de Usuario aos parâmetros da query
            $stmt->bindValue(':tipo_acesso', $this->usuario->__get('nivelAcesso')); 
            $stmt->bindValue(':cpf', $this->usuario->__get('CPFUsuario'));
            $stmt->bindValue(':cep', $this->usuario->__get('CEPUsuario'));
            $stmt->bindValue(':email', $this->usuario->__get('emailUsuario'));
            $stmt->bindValue(':nome', $this->usuario->__get('nomeUsuario'));
            $stmt->bindValue(':numero', $this->usuario->__get('numeroCasaUsuario'));
            $stmt->bindValue(':rua', $this->usuario->__get('ruaUsuario'));
            $stmt->bindValue(':senha', $this->usuario->__get('senhaUsuario'));
            $stmt->bindValue(':telefone', $this->usuario->__get('telefoneUsuario'));
            
            // Executa a consulta
            $stmt->execute();
            
            // Verifica se nenhuma linha foi afetada, indicando falha na inserção
            if ($stmt->rowCount() === 0) {
                throw new Exception('Falha na inserção do registro.');
            }
        } catch (Exception $e) {
            // Lança a exceção para ser tratada em outro lugar
            throw $e;
        }
    }

    // Função para recuperar dados dos usuários
    public function recuperar() {
        try {
            // Query SQL para recuperar informações dos clientes
            $query = "SELECT email_cliente, nome_cliente, id_cliente, senha_cliente, tipo_acesso FROM cliente;";
            
            // Prepara a consulta
            $stmt = $this->conexao->prepare($query);
            
            // Executa a consulta
            $stmt->execute();
            
            // Retorna todos os resultados como um array associativo
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            // Lança a exceção para ser tratada em outro lugar
            throw $e;
        }
    }
}
?>
