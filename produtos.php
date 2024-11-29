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
            // Criando objetos das classes necessárias
            $bolos = new Bolo(); // Instancia a classe Bolo
            $conexao = new Conexao(); // Instancia a classe Conexao
            $boloService = new BoloService($conexao, $bolos); // Instancia o serviço BoloService, passando a conexão e o objeto Bolo

            // Recupera os produtos
            $array_produtos = $boloService->recuperar();

            // Verifica se existem produtos na lista
            if (!empty($array_produtos)) {
                // Itera sobre cada produto e exibe as informações
                foreach($array_produtos as $produto) { 
            ?>
                    <!-- Exibe os produtos em cards -->
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <!-- Exibe a imagem do bolo -->
                            <img src="<?php echo htmlspecialchars($produto->imagem_bolo); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($produto->nome_bolo); ?>">
                            <div class="card-body">
                                <!-- Exibe o nome do bolo -->
                                <h5 class="card-title"><?php echo htmlspecialchars($produto->nome_bolo); ?></h5>
                                <!-- Exibe a descrição do bolo -->
                                <p class="card-text"><?php echo htmlspecialchars($produto->descricao_bolo); ?></p>
                                <!-- Exibe o preço formatado -->
                                <p class="card-text"><strong>Preço:</strong> R$ <?php echo number_format($produto->preco_bolo, 2, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } else { 
            ?>
                <!-- Mensagem caso não haja produtos disponíveis -->
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
