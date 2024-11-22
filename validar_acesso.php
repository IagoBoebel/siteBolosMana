<?php
  session_start();
  if(!isset($_SESSION['autenticacao']) || $_SESSION['autenticacao'] != 'SIM') {
    header('Location: login.php?login=erro2');
  }
?>