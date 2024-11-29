<?php 
// Definindo o título da página
$title = "Administrador";

// Incluindo o arquivo de cabeçalho da página
include 'header.php';

// Requerindo o arquivo que valida o acesso do usuário
require_once "validar_acesso.php";
?> 

<script>
// Função para carregar o formulário de inserção de bolo via AJAX
function botaoCreate() {
    fetch('inserir_bolo.php') // Faz uma requisição para o arquivo 'inserir_bolo.php'
        .then(response => response.text()) // Converte a resposta para texto
        .then(data => {
            document.getElementById('crud').innerHTML = data; // Insere o conteúdo no elemento com ID 'crud'
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error)); // Exibe um erro no console, se ocorrer
}

// Função para carregar a visualização dos bolos via AJAX
function botaoRead() {
    fetch('visualizar_bolos.php') // Faz uma requisição para o arquivo 'visualizar_bolos.php'
        .then(response => response.text()) // Converte a resposta para texto
        .then(data => {
            document.getElementById('crud').innerHTML = data; // Insere o conteúdo no elemento com ID 'crud'
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error)); // Exibe um erro no console, se ocorrer
}

// Função para carregar o formulário de atualização de bolos via AJAX
function botaoUpdate() {
    fetch('atualizar_bolos.php') // Faz uma requisição para o arquivo 'atualizar_bolos.php'
        .then(response => response.text()) // Converte a resposta para texto
        .then(data => {
            document.getElementById('crud').innerHTML = data; // Insere o conteúdo no elemento com ID 'crud'
        })
        .catch(error => console.error('Erro ao carregar o conteúdo:', error)); // Exibe um erro no console, se ocorrer
}
</script>
 

<div class="container">
    <div class="row my-4">
        <div class="col-12">
            <!-- Botão para adicionar um novo bolo -->
            <button id="create" onclick="botaoCreate()" class="btn btn-success">Inserir Bolo</button>
            
            <!-- Botão para visualizar os bolos -->
            <button id="read" onclick="botaoRead()" class="btn btn-secondary">Listar Bolos</button>
            
            <!-- Botão para atualizar os bolos -->
            <button id="update" onclick="botaoUpdate()" class="btn btn-secondary">Editar Bolo</button>
        </div>
    </div>
</div>

<!-- Seção onde será exibido o conteúdo dinâmico carregado pelas funções AJAX -->
<section id="crud" class="container"></section>

<?php
// Incluindo o rodapé da página
include 'footer.php';
?>
