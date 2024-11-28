<?php 
    class Pedido {
        private $quantidadeItens;
        private $idBolo;
        private $idEntregador;
        private $idPedido;
        private $cpfCliente;
        private $valorPedido;
        private $entregaPedido;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }


?>