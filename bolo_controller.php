<?php
require "bolo.php";
require "bolo_service.php";
require "conexao.php";

if(isset($_GET['acao']) && $_GET['acao'] == 'create') {
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
} else if($acao == 'read') {
    $bolo = new Bolo();
    $conexao = new Conexao();
    $boloService = new BoloService($conexao, $bolo);
    $bolos = $boloService->recuperar();
} else if(isset($_GET['acao']) && $_GET['acao'] == 'update') {
    try {
        $id = $_POST['id_para_atualizar'];
        $atr = $_POST['atributo'];
        $novo_atr = $_POST['novo_atributo'];
        $bolo = new Bolo();
        $bolo->__set('idDoProduto', $id);
        $conexao = new Conexao();
        $boloService = new BoloService($conexao, $bolo);
        $boloService->atualizar($atr, $novo_atr);
        header('Location: administrador.php?atualizado_com_sucesso');
    } catch (Exception $e) {
        header('Location: administrador.php?erro_atualizar');
    } 
} else if(isset($_GET['acao']) && $_GET['acao'] == 'delete') {
    try {
        $id = $_POST['id_para_excluir'];
        $bolo = new Bolo();
        $bolo->__set('idDoProduto', $id);
        $conexao = new Conexao();
        $boloService = new BoloService($conexao, $bolo);
        $boloService->remover();
        header('Location: administrador.php?excluido_com_sucesso');
    } catch (Exception $e) {
        header('Location: administrador.php?erro_excluir');
    } 

}
?>

