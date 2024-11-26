<?php
    include "usuario_service.php";
    include "conexao.php";
    include "usuario_model.php";

    session_start();
    // Armazena se está autenticado, nome, senha e nível de acesso
    $autenticacao = false;
    $usuario_id = null;
    $nivel_acesso = null;
    // Controle do nível de acesso
    $niveis_de_acesso = array(1 => 'Administrativo', 2 => 'Usuário');
    


    // Array com usuarios do sistema
    $usuario = new Usuario();
   
    $conexao = new Conexao();
    
    $usuario_service = new UsuarioService($conexao, $usuario);
    
    $usuarios = $usuario_service->recuperar();
    // Percorre o array para autenticar
    foreach($usuarios as $user) {
        if($user['email_cliente'] == $_POST['email'] && $user['senha_cliente'] == $_POST['senha']) {
            $autenticacao = true;
            $usuario_id = $user['id'];
            $nivel_acesso = $user['nivel_acesso'];
        }
    }

    // Identifica se usuario está autenticado
    if ($autenticacao) {
        $_SESSION['autenticacao'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['nivel_acesso'] = $nivel_acesso;
        header('Location: index.php');
    } else {
        $_SESSION['autenticacao'] = "NAO";
        header('Location: login.php?login=erro');
    }

?>