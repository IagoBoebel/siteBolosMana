<?php
    // Definição da classe Usuario
    class Usuario {
        // Atributos privados da classe
        private $idUsuario;
        private $nomeUsuario;
        private $telefoneUsuario;
        private $emailUsuario;
        private $senhaUsuario;
        private $CPFUsuario;
        private $ruaUsuario;
        private $numeroCasaUsuario;
        private $CEPUsuario;
        private $nivelAcesso;
        
        // Método mágico __get para obter o valor de um atributo
        public function __get($atributo) {
            return $this->$atributo; // Retorna o valor do atributo desejado
        }

        // Método mágico __set para definir o valor de um atributo
        public function __set($atributo, $valor) {
            $this->$atributo = $valor; // Define o valor do atributo
        }
    }
?>
