<?php 
$title = "Pedidos";
include 'header.php';
include 'pedido_service.php';
include 'conexao.php';
include 'pedido_model.php';
?>      

<script>
function botaoNovoPedido() {
    fetch('novo_pedido.php') // Faz a requisição ao servidor
        .then(response => response.text()) // Obtém o conteúdo como texto
        .then(data => {
            document.getElementById('pdido').innerHTML = data; // Insere o conteúdo no elemento
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error));
}
function botaoAcompanharPedido() {
    fetch('pedido_controller.php?pedido=status') // Faz a requisição ao servidor
        .then(response => response.text()) // Obtém o conteúdo como texto
        .then(data => {
            document.getElementById('pdido').innerHTML = data; // Insere o conteúdo no elemento
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error));
}
</script>
<section class="conteudo">
<div class="container">
    <div class="row my-4">
        <div class="col-12">
            <button id="create_pdido" onclick="botaoNovoPedido()" class="btn btn-success">Novo</button>
            <button id="read_pdido" onclick="botaoAcompanharPedido()" class="btn btn-secondary">Acompanhar Pedido</button>
        </div>
    </div>
</div>
<section id="pdido" class="container">

</section>
         <!-- Mensagens de Sucesso ou Erro -->
         <?php if(isset($_GET['status']) && $_GET['status'] == 'sim') { ?>
                <div class="text-success d-flex flex-column align-items-center bg-white p-4 border border-3 mb-4">
                    <p class="justify-content-center">Pedido realizado com sucesso!</p>
                </div>
            <?php } ?>
            <?php if(isset($_GET['status']) && $_GET['status'] == 'nao') { ?>
                <div class="text-danger d-flex flex-column align-items-center bg-white p-4 border border-3 mb-4">
                    <p class="justify-content-center">Erro ao realizar o pedido. Tente novamente.</p>
                </div>
            <?php } ?>
</section>
<?php
include 'footer.php';
?>
