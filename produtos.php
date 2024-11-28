<?php 
$title = "Produtos";
include 'header.php';
//include 'produtos_controller.php'; // Arquivo que contém a conexão com o banco de dados
?>

<section class="conteudo py-5">
    <div class="container">
        <h1 class="mb-4 text-center">Nossos Produtos</h1>
        <div class="row">
            <?php
            // Consulta para buscar produtos
            $query = "SELECT * FROM produtos";
            $result = $conn->query($query);
            
            if ($result->num_rows > 0) {
              while ($produto = $result->fetch_assoc()) {
                   ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="<?php echo $produto['imagem']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($produto['nome']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                                <p class="card-text"><strong>Preço:</strong> R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>
                  <?php 
                }
            } else {
                echo "<p class='text-center'>Nenhum produto disponível no momento.</p>";
            }
            
            // Fecha a conexão
            $conn->close();
            ?>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
