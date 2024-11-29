<?php
// Incluindo os arquivos necessários para o funcionamento
require "pedido_model.php";
require "pedido_service.php";
require "conexao.php";

// Inicia a sessão
session_start();

// Verifica se a requisição é para criar um pedido
if (isset($_GET['pedido']) && $_GET['pedido'] === 'create') {
    try {
        // Gera um ID de entregador aleatório
        $idEntregador = rand(1, 15);
        
        // Criação do objeto Pedido e atribuição dos dados do formulário
        $pedido = new Pedido();
        $pedido->__set('quantidadeItens', $_POST['quantidadeItens']);
        $pedido->__set('idProduto', $_POST['idBolo']);
        $pedido->__set('entregaPedido', $_POST['tipo_entrega']);
        $pedido->__set('idEntregador', $idEntregador);
        $pedido->__set('cpfCliente', $_POST['CPF']);

        // Conexão com o banco de dados e serviço de pedido
        $conexao = new Conexao();
        $pedidoService = new PedidoService($conexao, $pedido);
        $pedidoService->registrarPedido();

        // Redireciona para a página de pedidos com status "sim"
        header("Location: pedidos.php?status=sim");
    } catch (Exception $e) {
        // Em caso de erro, redireciona com status "nao"
        header("Location: pedidos.php?status=nao");
    }

} else if (isset($_GET['pedido']) && $_GET['pedido'] === 'status') {
    try {
        // Criação do objeto Pedido, Conexao e PedidoService
        $pedido = new Pedido();
        $conexao = new Conexao();
        $pedidoService = new PedidoService($conexao, $pedido);
        
        // Obtém os dados do pedido
        $pedidoAtual = $pedidoService->dadosPedido();

        // Inicializa as variáveis
        $retirada = '';
        $nomeCliente = '';
        $boloQuantidades = [];  // Array para armazenar bolos e suas quantidades
        $valorTotal = 0;

        // Processa os dados do pedido
        foreach($pedidoAtual as $pedido) {
            if ($nomeCliente === '') {
                $nomeCliente = $pedido['nome_cliente'];
                $retirada = ($pedido['entrega_pedido'] == 0) ? 'sim' : 'não'; // Verifica se a retirada é "sim"
            }

            // Adiciona o bolo ao array, somando a quantidade se o bolo já existir no array
            if (isset($boloQuantidades[$pedido['nome_bolo']])) {
                $boloQuantidades[$pedido['nome_bolo']] += $pedido['quantidadePedido'];
            } else {
                $boloQuantidades[$pedido['nome_bolo']] = $pedido['quantidadePedido'];
            }
            $valorTotal += $pedido['valor_pedido']; // Soma o valor total
        }

        // Exibe as informações do pedido
        echo '
        <div class="container">
            <h1 style="text-align: left">Aqui está o resumo de seu pedido:</h1>
            <section class="row">
                <p><strong>Nome do Cliente:</strong> ' . $nomeCliente . '</p>
                <p><strong>Telefone:</strong> ' . $pedido['telefone_cliente'] . '</p>
                <p><strong>Endereço:</strong> ' . $pedido['rua'] . ', ' . $pedido['numero_casa'] . ' - ' . $pedido['CEP'] . '</p>
                <p><strong>Valor do Pedido:</strong> R$ ' . number_format($valorTotal, 2, ',', '.') . '</p>';

        // Exibe a lista de bolos e suas quantidades
        $boloList = [];
        foreach ($boloQuantidades as $bolo => $quantidade) {
            $boloList[] = "<p><strong>" . $bolo . ": </strong>" . $quantidade . "</p><br>";
        }
        echo implode($boloList);

        echo '
                <p><strong>Retirada:</strong> ' . $retirada . '</p>
            </section>
        </div>
        ';
        // Formulário para excluir o pedido
        echo '
        <form method="GET" action="pedido_controller.php?pedido=delete">
            <input type="hidden" name="pedido" value="delete">
            <input type="hidden" name="id_pedido" value="">
            <button type="submit" class="btn btn-danger mb-5">Excluir Pedido</button>
        </form>
        ';

    } catch (Exception $e) {
        // Redireciona em caso de erro
        header("Location: pedidos.php?status=nao");
    }
} else if (isset($_GET['pedido']) && $_GET['pedido'] === 'delete') {
    try {
        // Criação do objeto Pedido, Conexao e PedidoService
        $pedido = new Pedido();
        $conexao = new Conexao();
        $pedidoService = new PedidoService($conexao, $pedido);

        // Obtém o ID do pedido a ser excluído
        $idExclusao = $_SESSION['id'];
        $pedidoService->excluirPedidosPorCliente($idExclusao);

        // Redireciona para a página de pedidos com status "deletado"
        header("Location: pedidos.php?status=deletado");
    } catch (Exception $e) {
        // Redireciona em caso de erro
        header("Location: pedidos.php?status=erro");
    }
}
?>
