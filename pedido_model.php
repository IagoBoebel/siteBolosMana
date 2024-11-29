<?php 
// Definindo a classe Pedido
class Pedido {
    // Declaração de atributos privados
    private $quantidadeItens;
    private $idBolo;
    private $idEntregador;
    private $idPedido;
    private $cpfCliente;
    private $valorPedido;
    private $entregaPedido;

    // Método mágico __get para acessar os atributos da classe
    public function __get($atributo) {
        return $this->$atributo;
    }

    // Método mágico __set para definir valores nos atributos da classe
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}
?>
