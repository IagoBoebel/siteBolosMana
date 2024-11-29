<?php

// Inicia a sessão
session_start();

// Destroi a sessão para encerrar o login do usuário
session_destroy();

// Redireciona para a página inicial (index.php)
header('Location: index.php');

?>
