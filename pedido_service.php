<?php

class PedidoService {
    private $conexao;
    private $pedido;

    public function __construct(Conexao $conexao, Pedido $pedido) {
        $this->conexao = $conexao->conectar();
        $this->pedido = $pedido;
    }

    public function registrarPedido() {
        try {
            // Recuperar ID cliente
            $cpf_cliente = $this->pedido->__get('cpfCliente');
            $queryIDCliente = "SELECT id_cliente FROM cliente WHERE cpf_cliente = :CPF";
            $stmtCliente = $this->conexao->prepare($queryIDCliente);
            $stmtCliente->bindValue(':CPF', $cpf_cliente);
            $stmtCliente->execute();
            $id_cliente = $stmtCliente->fetchColumn();

            // Inserção na tabela `pedidos`
            $queryPedido = "INSERT INTO pedidos (entrega_pedido, id_cliente, valor_pedido, id_entrega) 
                            VALUES (:entrega_pedido, :id_cliente, :valor_pedido, :id_entrega)";
            $stmtPedido = $this->conexao->prepare($queryPedido);
            $stmtPedido->bindValue(':entrega_pedido', $this->pedido->__get('entregaPedido'));
            $stmtPedido->bindValue(':id_cliente', $id_cliente);
            $stmtPedido->bindValue(':valor_pedido', $this->pedido->__get('valorPedido'));
            $stmtPedido->bindValue(':id_entrega', $this->pedido->__get('idEntregador'));
            $stmtPedido->execute();

            // Recuperar o ID do pedido inserido
            $id_pedido = $this->conexao->lastInsertId();

            // Inserção na tabela `pedidos_produto`
            $queryPedidosProduto = "INSERT INTO pedidos_produto (id_pedidos, id_produto, quantidadePedido) 
                                    VALUES (:id_pedidos, :id_produto, :quantidade)";
            $stmtProduto = $this->conexao->prepare($queryPedidosProduto);
            $stmtProduto->bindValue(':id_pedidos', $id_pedido);
            $stmtProduto->bindValue(':id_produto', $this->pedido->__get('idProduto'));
            $stmtProduto->bindValue(':quantidade', $this->pedido->__get('quantidadeItens'));
            $stmtProduto->execute();

            $_SESSION['id'] = $id_cliente;


        } catch (Exception $e) {
            throw new Exception("Erro ao registrar o pedido: " . $e->getMessage());
        }
    }

    public function produtosParaPedir() {
        try {
            $query = "SELECT id_produto, nome_bolo FROM produto;";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function dadosPedido() {
        $id_cliente = $_SESSION['id'];
        $query = "SELECT 
        cliente.nome_cliente, 
        cliente.telefone_cliente, 
        cliente.rua, 
        cliente.numero_casa, 
        cliente.CEP, 
        pedidos.valor_pedido, 
        pedidos.entrega_pedido, 
        pedidos_produto.quantidadePedido, 
        produto.nome_bolo, 
        produto.preco_bolo
        FROM 
        cliente
        INNER JOIN 
        pedidos ON cliente.id_cliente = pedidos.id_cliente
        INNER JOIN 
        pedidos_produto ON pedidos.id_pedidos = pedidos_produto.id_pedidos
        INNER JOIN 
        produto ON pedidos_produto.id_produto = produto.id_produto;";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
