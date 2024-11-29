<section class="row">
    <section class="col-8">
        <!-- Título da seção -->
        <h1>Inserir bolo</h1>

        <!-- Formulário para inserção de um novo bolo -->
        <form class="form" action="bolo_controller.php?acao=create" method="post">
            
            <!-- Campo para o nome do bolo -->
            <label class="form-label">Nome do Bolo:</label>
            <input type="text" class="form-control" placeholder="Digite o nome do bolo" name="nome_bolo" required>
            <br>

            <!-- Campo para o preço do bolo -->
            <label class="form-label">Preço do Bolo:</label>
            <input type="text" class="form-control" placeholder="Digite o preço do bolo" name="preco_bolo" required>
            <br>

            <!-- Campo para o sabor do bolo -->
            <label class="form-label">Sabor do Bolo:</label>
            <input type="text" class="form-control" placeholder="Digite o sabor do bolo" name="sabor_bolo" required>
            <br>

            <!-- Campo para a descrição do bolo -->
            <label class="form-label">Descrição do Bolo:</label>
            <input type="text" class="form-control" placeholder="Digite a descrição do bolo" name="descricao_bolo">
            <br>

            <!-- Campo para a imagem do bolo -->
            <label class="form-label">Imagem do Bolo:</label>
            <input type="text" class="form-control" placeholder="Adicione uma imagem para o bolo" name="imagem_bolo">
            <br>

            <!-- Botão para adicionar o bolo -->
            <button class="btn btn-success my-3" type="submit">Adicionar</button>
        </form>
    </section>
</section>
