<?php
// Inclusão dos arquivos necessários
require "bolo.php";
require "bolo_service.php";
require "conexao.php";

// Verifica se a ação recebida via GET é 'create'
if (isset($_GET['acao']) && $_GET['acao'] == 'create') {
    try {
        // Instancia o objeto Bolo e define seus atributos com base nos dados do formulário
        $bolo = new Bolo();
        $bolo->__set('precoDoBolo', $_POST['preco_bolo']);
        $bolo->__set('nomeDoBolo', $_POST['nome_bolo']);
        $bolo->__set('descricaoDoBolo', $_POST['descricao_bolo']);
        $bolo->__set('saborDoBolo', $_POST['sabor_bolo']);
        $bolo->__set('imagemDoBolo', $_POST['imagem_bolo']);

        // Cria uma conexão e insere os dados no banco
        $conexao = new Conexao();
        $boloService = new BoloService($conexao, $bolo);
        $boloService->inserir();

        // Redireciona para a página de administrador com uma mensagem de sucesso
        header('Location: administrador.php?inserido_com_sucesso');
    } catch (Exception $e) {
        // Redireciona para a página de administrador com mensagem de erro
        header('Location: administrador.php?erro_inserir');
    }
}
// Verifica se a ação é 'read'
else if ($acao == 'read') {
    // Recupera a lista de bolos
    $bolo = new Bolo();
    $conexao = new Conexao();
    $boloService = new BoloService($conexao, $bolo);
    $bolos = $boloService->recuperar();
}
// Verifica se a ação é 'update'
else if (isset($_GET['acao']) && $_GET['acao'] == 'update') {
    try {
        // Obtém os dados do formulário para atualizar o bolo
        $id = $_POST['id_para_atualizar'];
        $atr = $_POST['atributo'];
        $novo_atr = $_POST['novo_atributo'];

        // Instancia o objeto Bolo com o ID fornecido
        $bolo = new Bolo();
        $bolo->__set('idDoProduto', $id);
        
        // Atualiza o atributo específico no banco de dados
        $conexao = new Conexao();
        $boloService = new BoloService($conexao, $bolo);
        $boloService->atualizar($atr, $novo_atr);

        // Redireciona para a página de administrador com mensagem de sucesso
        header('Location: administrador.php?atualizado_com_sucesso');
    } catch (Exception $e) {
        // Redireciona para a página de administrador com mensagem de erro
        header('Location: administrador.php?erro_atualizar');
    }
}
// Verifica se a ação é 'delete'
else if (isset($_GET['acao']) && $_GET['acao'] == 'delete') {
    try {
        // Obtém o ID do bolo a ser excluído
        $id = $_POST['id_para_excluir'];
        
        // Instancia o objeto Bolo e define o ID
        $bolo = new Bolo();
        $bolo->__set('idDoProduto', $id);
        
        // Remove o bolo do banco de dados
        $conexao = new Conexao();
        $boloService = new BoloService($conexao, $bolo);
        $boloService->remover();

        // Redireciona para a página de administrador com mensagem de sucesso
        header('Location: administrador.php?excluido_com_sucesso');
    } catch (Exception $e) {
        // Redireciona para a página de administrador com mensagem de erro
        header('Location: administrador.php?erro_excluir');
    }
}
?>
