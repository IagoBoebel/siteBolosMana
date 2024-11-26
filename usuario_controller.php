<?php 
require "usuario_model.php";
require "usuario_service.php";
require "conexao.php";


if(isset($_GET['action']) && $_GET['action'] == 'create') {
    try {
        // Instancia o objeto e define os valores
        $usuario = new Usuario();
        $usuario->__set('nomeUsuario', $_POST['nomeUsuario']);
        $usuario->__set('telefoneUsuario', $_POST['telefoneUsuario']);
        $usuario->__set('emailUsuario', $_POST['emailUsuario']);
        $usuario->__set('senhaUsuario', $_POST['senhaUsuario']);
        $usuario->__set('CPFUsuario', $_POST['CPFUsuario']);
        $usuario->__set('ruaUsuario', $_POST['ruaUsuario']);
        $usuario->__set('numeroCasaUsuario', $_POST['numeroCasaUsuario']);
        $usuario->__set('CEPUsuario', $_POST['CEPUsuario']);
        
        // Conecta e insere os dados
        $conexao = new Conexao();
        $usuarioService = new UsuarioService($conexao, $usuario);
        $usuarioService->inserir();
        header("Location: criar_nova_conta.php?criar_conta=sim");
    } catch (Exception $e) {
        header("Location: criar_nova_conta.php?criar_conta=nao");
    }

}




?>