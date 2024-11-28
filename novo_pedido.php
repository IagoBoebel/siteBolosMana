<?php 
$title = "Novo Pedido";
include 'pedido_service.php';
include 'conexao.php';
include 'pedido_model.php';
?>     

<div class="container">
        <h1 style="text-align: left">Preencha seu Pedido:</h1>
        <section class="row">
            <form id="formularioPedido" method="post" action="pedido_controller.php?pedido=create" class="container p-4 border rounded shadow-lg bg-light mb-5">
                <h2 class="text-center mb-4">Novo Pedido</h2>

                <!-- Produto -->
                <div class="mb-3">
                    <label for="produto" class="form-label">Produto:</label>
                    <select id="idBolo" name="idBolo" class="form-select" required>
                        <option value="">Selecione um Produto</option>
                        <!-- PHP para listar produtos -->
                        <?php
                        $pedido = new Pedido();
                        $conexao = new Conexao();
                        $pedidos = new pedidoService($conexao, $pedido);
                        $produtos = $pedidos->produtosParaPedir();
                        foreach($produtos as $produto) {
                        $id = $produto['id_produto'];
                        $nome = $produto['nome_bolo'];
                        echo "<option value='{$id}'>{$nome}</option>";
                    }
                        
                        ?>
                    </select>
                </div>

                <!-- Quantidade -->
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade:</label>
                    <input id="quantidadeItens" type="number" name="quantidadeItens" class="form-control" placeholder="Informe a quantidade" min="1" required>
                </div>

                <!-- Tipo de Entrega -->
                <div class="mb-3">
                    <label for="tipo_entrega" class="form-label">Tipo de Entrega:</label>
                    <select id="tipo_entrega" name="tipo_entrega" class="form-select" required>
                        <option value="">Selecione o Tipo de Entrega</option>
                        <option value="0">Retirada</option>
                        <option value="1">Entrega</option>
                    </select>
                </div>

                <!-- CPF -->
                <div class="mb-3">
                    <label for="CPF" class="form-label">Digite seu CPF:</label>
                    <input id="CPF" type="text" name="CPF" class="form-control" placeholder="Digite APENAS números" required>
                </div>

                <!-- Botão de Envio -->
                <div class="d-grid">
                    <button id="botaoSubmit" type="submit" class="btn btn-primary">Finalizar Pedido</button>
                </div>
            </form>

            
        </section>
    </div>