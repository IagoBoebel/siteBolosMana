
<section class="row">
    <section class="col-8">
        <h1>Editar um bolo</h1>
        <form class="form" action="controllers/bolo_controller.php?acao=update" method="post">
            <label class="form-label">ID do Bolo:</label>
            <input type="text" class="form-control" placeholder="Digite o ID do bolo que deve ser editado" name="id_para_atualizar" required>
            <br>
            <label for="atributo"class="form-label">Selecione a informação que deve ser alterada</label>
            <select class="form-control" name="atributo" id="atributo" require>
                <option value="nome_bolo">Nome</option>
                <option value="preco_bolo">Preço</option> 
                <option value="descricao_bolo">Descrição</option>
                <option value="sabor_bolo">Sabor</option>
                <option value="imagem_bolo">Imagem</option>
            </select>
            <br>
            <label for="novo_atributo" class="form-label">Digite a nova informação</label>
            <input type="text" class="form-control" id="novo_atributo" name="novo_atributo" required>
            <button class="btn btn-success my-3" type="submit">Atualizar</button>
        </form>
    </section>
</section>


