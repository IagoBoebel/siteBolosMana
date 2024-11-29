<?php
  session_start();
  
  // Verifica se a sessão de autenticação está presente e válida
  if (!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] != 'SIM') {
    header('Location: login.php?login=erro2'); // Redireciona para o login caso não esteja autenticado
  }
?>
