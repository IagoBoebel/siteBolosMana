<?php 
$title = "Administrador";
include 'header.php';
require_once "validar_acesso.php";
?> 
<script>
function botaoCreate() {
    fetch('inserir_bolo.php') // Faz a requisição ao servidor
        .then(response => response.text()) // Obtém o conteúdo como texto
        .then(data => {
            document.getElementById('crud').innerHTML = data; // Insere o conteúdo no elemento
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error));
}
function botaoRead() {
    fetch('visualizar_bolos.php') // Faz a requisição ao servidor
        .then(response => response.text()) // Obtém o conteúdo como texto
        .then(data => {
            document.getElementById('crud').innerHTML = data; // Insere o conteúdo no elemento
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error));
}
function botaoUpdate() {
    fetch('atualizar_bolos.php') // Faz a requisição ao servidor
        .then(response => response.text()) // Obtém o conteúdo como texto
        .then(data => {
            document.getElementById('crud').innerHTML = data; // Insere o conteúdo no elemento
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error));
}function botaoDelete() {
    fetch('remover_bolo.php')    // Faz a requisição ao servidor
        .then(response => response.text()) // Obtém o conteúdo como texto
        .then(data => {
            document.getElementById('crud').innerHTML = data; // Insere o conteúdo no elemento
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error));
}
</script>
 

<div class="container">
    <div class="row my-4">
        <div class="col-12">
            <button id="create" onclick="botaoCreate()" class="btn btn-secondary">Adicionar novo Bolo</button>
            <button id="read" onclick="botaoRead()" class="btn btn-secondary">Visualizar Bolos</button>
            <button id="update" onclick="botaoUpdate()" class="btn btn-secondary">Atualizar Bolo</button>
            <button id="remove" onclick="botaoDelete()" class="btn btn-secondary">Remover Bolo</button>
        </div>
    </div>
</div>
<section id="crud" class="container">

</section>

        
<?php
include 'footer.php';
?>