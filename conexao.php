<?php
    // Classe Conexao que gerencia a conexão com o banco de dados
    class Conexao {
        // Propriedades privadas para armazenar as credenciais de conexão
        private $host = 'localhost';      // Endereço do servidor de banco de dados
        private $dbname = 'bolos_da_mana'; // Nome do banco de dados
        private $user = 'root';           // Usuário do banco de dados
        private $pass = 'nova_senha';     // Senha do banco de dados

        // Método que cria e retorna a conexão com o banco de dados
        public function conectar() {
            try {
                // Criação da conexão utilizando PDO (PHP Data Objects)
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname", // DSN (Data Source Name)
                    $this->user,                                   // Usuário
                    $this->pass                                    // Senha
                );

                // Configura o modo de erro para exceções para facilitar o tratamento de erros
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Retorna a conexão estabelecida
                return $conexao;

            } catch (PDOException $e) {
                // Exibe uma mensagem de erro caso a conexão falhe
                echo 'Erro de conexão: ' . $e->getMessage();
            }
        }
    }
?>
