<?php 
$title = "Administrador";
include 'header.php';
require_once "validar_acesso.php";
?>         
        <section class="container">
            <section class="row">
                <section class="col-6">
                <h1>Inserir novo bolo</h1>
                <form class="form" action="bolo_controller.php" method="post">
                    <label class="form-label">Nome do Bolo:</label>
                    <input type="text" class="form-control" placeholder="Digite o nome do bolo" name="nome_bolo" required>
                    <br>
                    <label class="form-label">Preço do Bolo:</label>
                    <input type="text" class="form-control" placeholder="Digite o preço do bolo" name="preco_bolo" required>
                    <br>
                    <label class="form-label">Sabor do Bolo:</label>
                    <input type="text" class="form-control" placeholder="Digite o sabor do bolo" name="sabor_bolo" required>
                    <br>
                    <label class="form-label">Descrição do Bolo:</label>
                    <input type="text" class="form-control" placeholder="Digite o descrição do bolo" name="descricao_bolo">
                    <br>
                    <label class="form-label">Imagem do Bolo:</label>
                    <input type="text" class="form-control" placeholder="Adicione uma imagem para o bolo" name="imagem_bolo">
                    <button class="btn btn-success my-3" type="submit">Adicionar</button>
                </form>
                </section>
            </section>
        </section>
<?php
include 'footer.php';
?>