<?php
    // Classe Bolo que representa os atributos e métodos relacionados a um bolo
    class Bolo {
        // Atributos privados que definem as características do bolo
        private $precoDoBolo;      // Preço do bolo
        private $nomeDoBolo;       // Nome do bolo
        private $descricaoDoBolo;  // Descrição do bolo
        private $saborDoBolo;      // Sabor do bolo
        private $imagemDoBolo;     // Caminho ou nome da imagem do bolo
        private $idDoProduto;      // ID do produto no banco de dados

        // Método mágico __get para acessar os atributos privados
        public function __get($atributo) {
            return $this->$atributo; // Retorna o valor do atributo solicitado
        }

        // Método mágico __set para definir os atributos privados
        public function __set($atributo, $valor) {
            $this->$atributo = $valor; // Define o valor para o atributo solicitado
        }
    }

?>
