<?php 
// Define o título da página e inclui os arquivos necessários para o funcionamento
$title = "Novo Pedido";
include 'pedido_service.php';  // Inclui o serviço de pedido
include 'conexao.php';  // Inclui a conexão com o banco de dados
include 'pedido_model.php';  // Inclui o modelo de pedido
?>     

<div class="container">
    <!-- Título principal -->
    <h1 style="text-align: left">Preencha seu Pedido:</h1>
    <section class="row">
        <!-- Formulário para inserção do pedido -->
        <form id="formularioPedido" method="post" action="pedido_controller.php?pedido=create" class="container p-4 border rounded shadow-lg bg-light mb-5">
            <h2 class="text-center mb-4">Novo Pedido</h2>

            <!-- Seção de seleção do Produto -->
            <div class="mb-3">
                <label for="produto" class="form-label">Produto:</label>
                <select id="idBolo" name="idBolo" class="form-select" required>
                    <option value="">Selecione um Produto</option>
                    <!-- PHP para listar produtos disponíveis -->
                    <?php
                    $pedido = new Pedido();  // Cria uma nova instância do pedido
                    $conexao = new Conexao();  // Cria uma nova instância de conexão
                    $pedidos = new pedidoService($conexao, $pedido);  // Cria um serviço de pedido com a conexão e o modelo de pedido
                    $produtos = $pedidos->produtosParaPedir();  // Obtém a lista de produtos disponíveis
                    foreach($produtos as $produto) {  // Itera sobre os produtos para exibi-los no select
                        $id = $produto['id_produto'];
                        $nome = $produto['nome_bolo'];
                        echo "<option value='{$id}'>{$nome}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Seção de quantidade -->
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input id="quantidadeItens" type="number" name="quantidadeItens" class="form-control" placeholder="Informe a quantidade" min="1" required>
            </div>

            <!-- Seção de tipo de entrega -->
            <div class="mb-3">
                <label for="tipo_entrega" class="form-label">Tipo de Entrega:</label>
                <select id="tipo_entrega" name="tipo_entrega" class="form-select" required>
                    <option value="">Selecione o Tipo de Entrega</option>
                    <option value="0">Retirada</option>
                    <option value="1">Entrega</option>
                </select>
            </div>

            <!-- Seção de CPF -->
            <div class="mb-3">
                <label for="CPF" class="form-label">Digite seu CPF:</label>
                <input id="CPF" type="text" name="CPF" class="form-control" placeholder="Digite APENAS números" required>
            </div>

            <!-- Botão para finalizar o pedido -->
            <div class="d-grid">
                <button id="botaoSubmit" type="submit" class="btn btn-primary">Finalizar Pedido</button>
            </div>
        </form>
    </section>
</div>
