<?php
require "bolo.php";
require "bolo_service.php";
require "conexao.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';

try {
    // Instancia o objeto e define os valores
    $bolo = new Bolo();
    $bolo->__set('precoDoBolo', $_POST['preco_bolo']);
    $bolo->__set('nomeDoBolo', $_POST['nome_bolo']);
    $bolo->__set('descricaoDoBolo', $_POST['descricao_bolo']);
    $bolo->__set('saborDoBolo', $_POST['sabor_bolo']);
    $bolo->__set('imagemDoBolo', $_POST['imagem_bolo']);

    // Conecta e insere os dados
    $conexao = new Conexao();
    $boloService = new BoloService($conexao, $bolo);
    $boloService->inserir();

    // Redireciona para sucesso
    header('Location: administrador.php?inserido_com_sucesso');
} catch (Exception $e) {
    header('Location: administrador.php?erro_inserir');
}
?>

