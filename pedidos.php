<?php 
$title = "Pedidos"; 
include 'header.php'; 
require_once "validar_acesso.php"; 
include 'pedido_service.php'; 
include 'conexao.php'; 
include 'pedido_model.php'; 
?>      

<script>
    // Função que carrega o conteúdo da página de novo pedido
    function botaoNovoPedido() {
        fetch('novo_pedido.php') // Faz a requisição ao servidor
            .then(response => response.text()) // Obtém o conteúdo como texto
            .then(data => {
                document.getElementById('pdido').innerHTML = data; // Insere o conteúdo no elemento com id 'pdido'
            })
            .catch(error => console.error('Erro ao carregar o conteúdo:', error)); // Caso haja erro, exibe mensagem no console
    }

    // Função que carrega o status do pedido
    function botaoAcompanharPedido() {
        fetch('pedido_controller.php?pedido=status') // Faz a requisição ao servidor
            .then(response => response.text()) // Obtém o conteúdo como texto
            .then(data => {
                document.getElementById('pdido').innerHTML = data; // Insere o conteúdo no elemento com id 'pdido'
            })
            .catch(error => console.error('Erro ao carregar o conteúdo:', error)); // Caso haja erro, exibe mensagem no console
    }
</script>

<section class="conteudo">
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <!-- Botões para criar um novo pedido ou acompanhar um pedido -->
                <button id="create_pdido" onclick="botaoNovoPedido()" class="btn btn-success">Novo</button>
                <button id="read_pdido" onclick="botaoAcompanharPedido()" class="btn btn-secondary">Acompanhar Pedido</button>
            </div>
        </div>
    </div>

    <section id="pdido" class="container">
        <!-- Verifica se o status é 'deletado' e exibe mensagem de sucesso -->
        <?php if ($_GET['status'] === 'deletado') { ?>
            <div class='alert alert-success'>Pedido excluído com sucesso!</div>
        <?php } ?> 

        <!-- Verifica se o status é 'erro' e exibe mensagem de erro -->
        <?php if ($_GET['status'] === 'erro') { ?>
            <div class='alert alert-danger'>Erro ao excluir o pedido.</div>
        <?php } ?>

        <!-- Verifica o status 'sim' e exibe mensagem de sucesso ao realizar o pedido -->
        <?php if(isset($_GET['status']) && $_GET['status'] == 'sim') { ?>
            <div class="text-success d-flex flex-column align-items-center bg-white p-4 border border-3 mb-4">
                <p class="justify-content-center">Pedido realizado com sucesso!</p>
            </div>
        <?php } ?>

        <!-- Verifica o status 'nao' e exibe mensagem de erro ao realizar o pedido -->
        <?php if(isset($_GET['status']) && $_GET['status'] == 'nao') { ?>
            <div class="text-danger d-flex flex-column align-items-center bg-white p-4 border border-3 mb-4">
                <p class="justify-content-center">Erro ao realizar o pedido. Tente novamente.</p>
            </div>
        <?php } ?>
    </section>
</section>

<?php 
include 'footer.php'; 
?>
