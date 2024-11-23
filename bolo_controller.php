<?php
require "bolo.php";
require "bolo_service.php";
require "conexao.php";

echo '<pre>';
print_r($_POST);
echo '</pre>';

$bolo = new Bolo();
$bolo->__set('precoDoBolo', $_POST['preco_bolo']);
$bolo->__set('nomeDoBolo', $_POST['nome_bolo']);
$bolo->__set('descricaoDoBolo', $_POST['descricao_bolo']);
$bolo->__set('saborDoBolo', $_POST['sabor_bolo']);
$bolo->__set('imagemDoBolo', $_POST['imagem_bolo']);



$conexao = new Conexao();

$boloService = new BoloService($conexao, $bolo);
$boloService->inserir();


?>

