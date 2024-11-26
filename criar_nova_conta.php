<?php 
$title = "Nova Conta";
include 'header.php';
?>      
    <section class="conteudo">
        <div class="container">
        <h1 style="text-align: left">Preencha seu cadastro:</h1>
        <section class="row">
        <form id="formularioCadastro" method="post" action="usuario_controller.php?action=create" class="container p-4 border rounded shadow-lg bg-light mb-5">
    <h2 class="text-center mb-4">Cadastro de Nova Conta</h2>

    <!-- Nome Completo -->
    <div class="mb-3">
        <label for="nomeUsuario" class="form-label">Nome Completo:</label>
        <input id="nomeUsuario" type="text" name="nomeUsuario" placeholder="Digite seu nome completo" class="form-control" required>
    </div>

    <!-- Telefone -->
    <div class="mb-3">
        <label for="telefoneUsuario" class="form-label">Telefone:</label>
        <input id="telefoneUsuario" type="tel" name="telefoneUsuario" placeholder="(XX) XXXXX-XXXX" class="form-control" required>
    </div>

    <!-- E-mail -->
    <div class="mb-3">
        <label for="emailUsuario" class="form-label">E-mail:</label>
        <input id="emailUsuario" type="email" name="emailUsuario" placeholder="Digite seu e-mail" class="form-control" required>
    </div>

    <!-- Senha -->
    <div class="mb-3">
        <label for="senhaUsuario" class="form-label">Senha:</label>
        <input id="senhaUsuario" type="password" name="senhaUsuario" placeholder="Digite uma senha" class="form-control" required minlength="8" title="A senha deve ter pelo menos 8 caracteres.">
    </div>

    <!-- CPF -->
    <div class="mb-3">
        <label for="CPFUsuario" class="form-label">CPF:</label>
        <input id="CPFUsuario" type="text" name="CPFUsuario" placeholder="Digite seu CPF" class="form-control" required>
    </div>

    <!-- Rua -->
    <div class="mb-3">
        <label for="ruaUsuario" class="form-label">Rua:</label>
        <input id="ruaUsuario" type="text" name="ruaUsuario" placeholder="Digite o nome da sua rua" class="form-control" required>
    </div>

    <!-- Número da Casa -->
    <div class="mb-3">
        <label for="numeroCasaUsuario" class="form-label">Número da Casa:</label>
        <input id="numeroCasaUsuario" type="number" name="numeroCasaUsuario" placeholder="Digite o número da sua casa" class="form-control" required>
    </div>

    <!-- CEP -->
    <div class="mb-3">
        <label for="CEPUsuario" class="form-label">CEP:</label>
        <input id="CEPUsuario" type="text" name="CEPUsuario" placeholder="Digite seu CEP" class="form-control">
    </div>

    <!-- Botão de envio -->
    <div class="d-grid">
        <button id="botaoSubmit" type="submit" class="btn btn-primary">Criar Conta</button>
    </div>
</form>


        
        </section>
        </div>
    </section>
<?php
include 'footer.php';
?>