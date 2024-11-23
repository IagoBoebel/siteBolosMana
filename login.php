<?php 
$title = "Entrar";
include 'header.php';
session_start();
?>
<section class="conteudo container">
        <div class="row">
            <div class=" col-12 card d-flex justify-content-center align-items-center mt-5 border-0">
            <form class=" col-4 p-4 bg-secondary border form" method="post" action="valida_login.php">
                <label class="form-label" for="email">E-mail</label><br>
                <input class="form-control" type="email" placeholder="Digite Seu Email" name="email">
                <br>
                <label class="form-label" for="senha">Senha</label><br>
                <input class="form-control"type="password" placeholder="Digite Sua Senha" name="senha">
                <br>
                <button class="btn btn-info" type="submit">Entrar</button>
            </form>
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                <div style="text-align: center" class="col-4 text-danger">
                <p>Faça login antes de acessar</p>
                </div>
            <?php } ?>
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                <div style="text-align: center" class="col-4 text-danger">
                <p>Usuario ou senha inválidos</p>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
<?php
include 'footer.php';
?>