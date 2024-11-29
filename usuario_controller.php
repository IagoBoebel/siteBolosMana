<?php 
// Requerendo os arquivos necessários
require "usuario_model.php";
require "usuario_service.php";
require "conexao.php";

// Verifica se a ação é 'create' para criação de novo usuário
if(isset($_GET['action']) && $_GET['action'] == 'create') {
    try {
        // Instancia o objeto Usuario e define os valores recebidos do formulário
        $usuario = new Usuario();
        $usuario->__set('nomeUsuario', $_POST['nomeUsuario']);
        $usuario->__set('telefoneUsuario', $_POST['telefoneUsuario']);
        $usuario->__set('emailUsuario', $_POST['emailUsuario']);
        $usuario->__set('senhaUsuario', md5($_POST['senhaUsuario'])); // Criptografando a senha
        $usuario->__set('CPFUsuario', $_POST['CPFUsuario']);
        $usuario->__set('ruaUsuario', $_POST['ruaUsuario']);
        $usuario->__set('numeroCasaUsuario', $_POST['numeroCasaUsuario']);
        $usuario->__set('CEPUsuario', $_POST['CEPUsuario']);
        $usuario->__set('nivelAcesso', $_POST['tipo_acesso']); // Tipo de acesso do usuário
        
        // Conecta ao banco de dados e insere os dados do usuário
        $conexao = new Conexao();
        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioService->inserir(); // Chama a função para inserir no banco
        
        // Redireciona para a página de criação de conta com sucesso
        header("Location: criar_nova_conta.php?criar_conta=sim");
    } catch (Exception $e) {
        // Caso ocorra erro, redireciona para a página com mensagem de falha
        header("Location: criar_nova_conta.php?criar_conta=nao");
    }
}
?>
