<?php
    class Usuario {
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
        
        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    
    }

?>