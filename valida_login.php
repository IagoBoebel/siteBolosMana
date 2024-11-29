<?php
    // Inclusão de arquivos necessários para a conexão e manipulação de dados
    include "usuario_service.php";
    include "conexao.php";
    include "usuario_model.php";

    // Inicia a sessão para armazenar as variáveis de autenticação
    session_start();
    
    // Variáveis de controle de autenticação e nível de acesso
    $autenticacao = false;
    $usuario_id = null;
    $nivel_acesso = null;
    
    // Array com os níveis de acesso
    $niveis_de_acesso = array(1 => 'Administrativo', 2 => 'Usuário');

    // Criação de objetos necessários
    $usuario = new Usuario();
    $conexao = new Conexao();
    $usuario_service = new UsuarioService($conexao, $usuario);

    // Recupera todos os usuários cadastrados
    $usuarios = $usuario_service->recuperar();

    // Percorre o array de usuários para autenticar o usuário
    foreach ($usuarios as $user) {
        // Verifica se o email e a senha coincidem com os dados informados
        if ($user['email_cliente'] == $_POST['email'] && $user['senha_cliente'] == md5($_POST['senha'])) {
            $autenticacao = true;
            $usuario_id = $user['id'];
            $nivel_acesso = $user['tipo_acesso'];
        }
    }

    // Se a autenticação for bem-sucedida, armazena as variáveis de sessão e redireciona para a página principal
    if ($autenticacao) {
        $_SESSION['autenticacao'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['nivel_acesso'] = $nivel_acesso;
        header('Location: index.php');
    } else {
        // Caso a autenticação falhe, armazena a falha na sessão e redireciona para a página de login com erro
        $_SESSION['autenticacao'] = "NAO";
        header('Location: login.php?login=erro');
    }
?>
