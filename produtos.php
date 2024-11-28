<?php 
$title = "produtos";
include 'header.php';
require "bolo.php";
require "bolo_service.php";
require "conexao.php";
?>

<section class="conteudo py-5">
    <div class="container">
        <h1 class="mb-4 text-center">Nossos Produtos</h1>
        <div class="row">
            <?php
            // Consulta para buscar produtos
            $bolos = new Bolo();
            $conexao = new Conexao();
            $boloService = new BoloService($conexao, $bolos);
            $array_produtos = $boloService->recuperar();

            if (!empty($array_produtos)) {
                foreach($array_produtos as $produto) { 
            ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo htmlspecialchars($produto->imagem_bolo); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($produto->nome_bolo); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($produto->nome_bolo); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($produto->descricao_bolo); ?></p>
                                <p class="card-text"><strong>Preço:</strong> R$ <?php echo number_format($produto->preco_bolo, 2, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } else { 
            ?>
                <p class="text-center">Nenhum produto disponível no momento.</p>
            <?php 
            }
            ?>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
