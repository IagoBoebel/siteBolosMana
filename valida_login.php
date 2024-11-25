<?php
    session_start();
    // Armazena se está autenticado, nome, senha e nível de acesso
    $autenticacao = false;
    $usuario_id = null;
    $nivel_acesso = null;

    // Controle do nível de acesso
    $niveis_de_acesso = array(1 => 'Administrativo', 2 => 'Usuário');
    
    // Array com usuarios do sistema
    $usuarios = array(
		array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'nivel_acesso' => 1),
		array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'nivel_acesso' => 1),
		array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'nivel_acesso' => 2),
		array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'nivel_acesso' => 2),
	);

    // Percorre o array para autenticar
    foreach($usuarios as $user) {
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
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