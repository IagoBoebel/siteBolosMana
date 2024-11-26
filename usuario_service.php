<?php

class UsuarioService {

    private $conexao;
    private $usuario;
    
    public function __construct(Conexao $conexao, Usuario $usuario) {
        $this->conexao = $conexao->conectar();
        $this->usuario = $usuario;
    }
        
    
    public function inserir() {
        try {
            $query = "INSERT INTO cliente (cpf_cliente, cep_cliente, email_cliente, nome_cliente, numero_casa_cliente, rua_cliente, senha_cliente, telefone_cliente)
                        VALUES (:cpf, :cep, :email, :nome, :numero, :rua, :senha, :telefone);";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':cpf', $this->usuario->__get('CPFUsuario'));
            $stmt->bindValue(':cep', $this->usuario->__get('CEPUsuario'));
            $stmt->bindValue(':email', $this->usuario->__get('emailUsuario'));
            $stmt->bindValue(':nome', $this->usuario->__get('nomeUsuario'));
            $stmt->bindValue(':numero', $this->usuario->__get('numeroCasaUsuario'));
            $stmt->bindValue(':rua', $this->usuario->__get('ruaUsuario'));
            $stmt->bindValue(':senha', $this->usuario->__get('senhaUsuario'));
            $stmt->bindValue(':telefone', $this->usuario->__get('telefoneUsuario'));
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
            throw new Exception('Falha na inserção do registro.');
        }
    } catch (Exception $e) {
        throw $e;
    }
    }
    public function recuperar() {
        try {
            $query = "SELECT email_cliente, nome_cliente, id_cliente, senha_cliente, nivel_de_acesso FROM cliente;";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw $e;
    }
    }
    /*   
    public function atualizar($atr, $novo_atr) {
        try {
            if($stmt->rowCount() === 0) {
                throw new Exception('Não foi possível atualizar o registro');
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function remover() {
        try {
            
            if ($stmt->rowCount() === 0) {
                throw new Exception('Falha na remoção do registro.');
            }
        } catch (Exception $e) {
            throw $e;
        }       
    }   */
}


?>