<?php
$acao = 'read';
require 'bolo_controller.php';

if ($acao == 'read') {
    echo '
    <div class="container">
        <h1 class="my-4">Lista de Bolos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bolo</th>
                    <th>Preço</th>
                    <th>Sabor</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>';

    foreach($bolos as $bolo) {
        echo "
            <tr>
                <td>{$bolo->id_produto}</td>
                <td>{$bolo->nome_bolo}</td>
                <td>{$bolo->preco_bolo}</td>
                <td>{$bolo->sabor_bolo}</td>
                <td>{$bolo->descricao_bolo}</td>
                <td><img src='{$bolo->imagem_bolo}' alt='Imagem do Bolo' width='50'></td>
                <td>
                    <form action='bolo_controller.php?acao=delete' method='post' style='display:inline;'>
                        <input type='hidden' name='id_para_excluir' value='{$bolo->id_produto}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Excluir</button>
                    </form>
                </td>
            </tr>";
    }
}
?>
