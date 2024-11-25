<?php
$acao = 'read';
require 'bolo_controller.php';
?>

<section class="row">
    <section class="col-8">
        <h1>Excluir um Bolo</h1>
        <form class="form" action="bolo_controller.php?acao=delete" method="post">
            <label for="id_para_escluir"class="form-label">Selecione o ID e o Bolo para excluir</label>
            <select class="form-control" name="id_para_excluir" id="id_para_excluir">
                <?php
                foreach($bolos as $bolo) {
                    echo "<option value='{$bolo->id_produto}'>{$bolo->id_produto} - {$bolo->nome_bolo}</option>";
                    }
                ?>
            </select>
            <br>
            <button class="btn btn-danger my-3" type="submit">Excluir</button>
        </form>
    </section>
</section>

