<?php
require "pedido_model.php";
require "pedido_service.php";
require "conexao.php";

session_start();

if (isset($_GET['pedido']) && $_GET['pedido'] === 'create') {
    try {
        $idEntregador = rand(1, 15);
        
        $pedido = new Pedido();
        $pedido->__set('quantidadeItens', $_POST['quantidadeItens']);
        
        $pedido->__set('idProduto', $_POST['idBolo']);
        $pedido->__set('entregaPedido', $_POST['tipo_entrega']);
        $pedido->__set('idEntregador', $idEntregador);
        $pedido->__set('cpfCliente', $_POST['CPF']);
        $pedido->__set('valorPedido', 100);

        $conexao = new Conexao();
        $pedidoService = new PedidoService($conexao, $pedido);
        $pedidoService->registrarPedido();
        header("Location: pedidos.php?status=sim");
    } catch (Exception $e) {
        header("Location: pedidos.php?status=nao");
    }

} else if (isset($_GET['pedido']) && $_GET['pedido'] === 'status') {
    try {
        $pedido = new Pedido();
        $conexao = new Conexao();
        $pedidoService = new PedidoService($conexao, $pedido);
        $pedidoAtual = $pedidoService->dadosPedido();

        // Inicializando as variáveis fora do loop
        $retirada = '';
        $nomeCliente = '';
        $boloQuantidades = []; // Array para armazenar bolos e suas quantidades

        foreach($pedidoAtual as $pedido) {
            // Definindo o nome do cliente e a retirada (esse dado deve ser o mesmo para todos os itens do pedido)
            if ($nomeCliente === '') {
                $nomeCliente = $pedido['nome_cliente'];
                $retirada = ($pedido['entrega_pedido'] == 0) ? 'sim' : 'não'; // Verificando se a retirada é "sim"
            }

            // Adiciona o bolo ao array, somando a quantidade se o bolo já existir no array
            if (isset($boloQuantidades[$pedido['nome_bolo']])) {
                $boloQuantidades[$pedido['nome_bolo']] += $pedido['quantidadePedido'];
            } else {
                $boloQuantidades[$pedido['nome_bolo']] = $pedido['quantidadePedido'];
            }
        }

        // HTML para exibição do pedido
        echo '
        <div class="container">
            <h1 style="text-align: left">Aqui está o resumo de seu pedido:</h1>
            <section class="row">
                <!-- Informações do Pedido -->
                <div class="mb-3">
                    <p><strong>Nome do Cliente:</strong> ' . $nomeCliente . '</p>
                    <p><strong>Telefone:</strong> ' . $pedido['telefone_cliente'] . '</p>
                    <p><strong>Endereço:</strong> ' . $pedido['rua'] . ', ' . $pedido['numero_casa'] . ' - ' . $pedido['CEP'] . '</p>
                    <p><strong>Valor do Pedido:</strong> R$ ' . number_format($pedido['valor_pedido'], 2, ',', '.') . '</p>';

        // Exibindo a lista de bolos e suas quantidades
        echo '<p><strong>Bolos:</strong> ';
        $boloList = [];
        foreach ($boloQuantidades as $bolo => $quantidade) {
            $boloList[] = $bolo . " " . $quantidade;
        }
        echo implode(", ", $boloList) . '</p>';

        echo '
                    <p><strong>Retirada:</strong> ' . $retirada . '</p>
                </div>
            </section>
        </div>
        ';
    } catch (Exception $e) {
        // Redireciona em caso de erro
        header("Location: pedidos.php?status=nao");
    }
}



?>
