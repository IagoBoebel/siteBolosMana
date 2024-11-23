<?php
    class Bolo {
        private $precoDoBolo;
        private $nomeDoBolo;
        private $descricaoDoBolo;
        private $saborDoBolo;
        private $imagemDoBolo;
        private $idDoProduto;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    
    }

?>