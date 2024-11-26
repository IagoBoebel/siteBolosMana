<?php 
$title = "Entrar";
include 'header.php';
session_start();
?>
<section class="conteudo container">
        <div class="row">
            <div class=" card d-flex flex-column justify-content-center align-items-center mt-5 border-0">
            <form class=" col-4 p-4 bg-secondary form" method="post" action="valida_login.php">
                <label class="form-label" for="email">E-mail</label><br>
                <input class="form-control" type="email" placeholder="Digite Seu Email" name="email">
                <br>
                <label class="form-label" for="senha">Senha</label><br>
                <input class="form-control"type="password" placeholder="Digite Sua Senha" name="senha">
                <br>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-info" type="submit">Entrar</button>
                    <button class="btn btn-info" onclick="criarNovaConta()" type="button">Criar nova conta</button>
                </div>    
            </form>
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                <div class="col-4 text-danger d-flex flex-column align-items-center">
                    <p class="justify-content-center" style="padding-left: 0;">Faça login antes de acessar</p>
                </div>
            <?php } ?>
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                <div class="col-4 text-danger d-flex flex-column align-items-center">
                    <p class="justify-content-center" style="padding-left: 0;">Usuario ou senha inválidos</p>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
<?php
include 'footer.php';
?>