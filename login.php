<?php 
$title = "Entrar";
include 'header.php';
session_start();
?>

<section class="conteudo container">
    <div class="row">
        <!-- Card de login -->
        <div class="card d-flex flex-column justify-content-center align-items-center mt-5 border-0">
            
            <!-- Formulário de login -->
            <form class="col-4 p-4 bg-secondary form" method="post" action="valida_login.php">
                <!-- Campo de E-mail -->
                <label class="form-label" for="email">E-mail</label><br>
                <input class="form-control" type="email" placeholder="Digite Seu Email" name="email" required>
                <br>

                <!-- Campo de Senha -->
                <label class="form-label" for="senha">Senha</label><br>
                <input class="form-control" type="password" placeholder="Digite Sua Senha" name="senha" required>
                <br>

                <!-- Botões de Ação -->
                <div class="d-flex justify-content-between">
                    <!-- Botão de login -->
                    <button class="btn btn-info" type="submit">Entrar</button>
                    <!-- Botão para criar nova conta -->
                    <button class="btn btn-info" onclick="criarNovaConta()" type="button">Criar nova conta</button>
                </div>    
            </form>

            <!-- Exibição de mensagens de erro -->
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
                <div class="col-4 text-danger d-flex flex-column align-items-center">
                    <p class="justify-content-center" style="padding-left: 0;">Faça login antes de acessar</p>
                </div>
            <?php } ?>

            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
                <div class="col-4 text-danger d-flex flex-column align-items-center">
                    <p class="justify-content-center" style="padding-left: 0;">Usuário ou senha inválidos</p>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
