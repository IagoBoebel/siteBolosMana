<?php
$acao = 'read';
require 'bolo_controller.php';
?>
<section class="row">
    <section class="col-12">
        <table class="table">
            <tr>
                <th>
                    ID
                </th>            
                <th>
                    Bolo
                </th>

                <th>
                    Preço
                </th>

                <th>
                    Sabor
                </th>
                <th>
                    Descrição
                </th>
                <th>
                    Imagem
                </th>
            </tr>
            <?php
            foreach($bolos as $bolo) {
                echo "<tr> <td> {$bolo->id_produto} </td>  <td> {$bolo->nome_bolo} </td> <td> {$bolo->preco_bolo} </td> <td> {$bolo->sabor_bolo} </td> <td> {$bolo->descricao_bolo} </td> <td> {$bolo->imagem_bolo} </td> </tr>";
            }
            ?>
        </table>
    </section>
</section>

