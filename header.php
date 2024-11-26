<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?=$title?></title>
        <link rel="stylesheet" href="styles.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="d-flex flex-column min-vh-100">
        <?php session_start();?>
        <header class="capa">
            <div class="logo container">
                <h1>Bolos da Mana
                </h1>
            </div>
        </header>
        <nav style="padding:0" class="navbar navbar-expand-lg navegacao">
    <div class="container d-flex position-relative">
        <!-- Botão Toggle para dispositivos menores -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navegação -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos.php">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nossa_historia.php">Nossa História</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedidos.php">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="localizacao.php">Localização</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Entrar</a>
                </li>
                <?php if ($_SESSION['nivel_acesso'] == '1') { ?>
                    <li class="nav-item">
                        <a class="nav-link " href="administrador.php">Administrador</a>
                    </li>
                <?php } ?>
            </ul>
        </div>

        
        
    </div>
    <!-- Botão "Sair" -->
        <?php if ($_SESSION['autenticacao'] == 'SIM') { ?>
            <button class="btn btn-danger position-absolute" style="right: 2em;">
                <a href="logoff.php" style="text-decoration: none; background-color: transparent; display: inline-block;">Sair</a>
            </button>
        <?php } ?>
</nav>

        <main class="flex-grow-1">