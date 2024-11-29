// Função para ativar o link correspondente ao título da página no menu
function ativarLink() {
    var pagAtual = document.title.toLowerCase(); // Obtém o título da página atual
    var linksMenu = document.querySelectorAll(".nav-link"); // Seleciona todos os links de navegação

    // Itera sobre os links do menu
    linksMenu.forEach(function(link) {
        var textoLink = link.textContent.toLowerCase(); // Obtém o texto de cada link
        // Verifica se o texto do link é igual ao título da página atual
        if (pagAtual == textoLink) {
            link.classList.add('active'); // Adiciona a classe 'active' ao link
        } else {
            link.classList.remove('active'); // Remove a classe 'active' do link
        }     
    });
};

// Função para criar alertas baseados na URL (para mostrar mensagens de sucesso/erro no CRUD)
function alertasInsercao() {
    const URL = decodeURIComponent(window.location.search); // Decodifica a URL para extrair parâmetros de query string
    let mensagem = "";
    let destino = "administrador.php"; // Destino padrão após exibir o alerta
    console.log("URL:", URL); // Log da URL para debug

    // Verifica a URL e define a mensagem apropriada
    if (URL.includes("?inserido_com_sucesso")) {
        mensagem = "Bolo inserido com sucesso";
    } else if (URL.includes("?erro_inserir")) {
        mensagem = "Não foi possível inserir o registro, tente novamente.";
    } else if (URL.includes("?excluido_com_sucesso")) {
        mensagem = "Bolo excluído com sucesso";
    } else if (URL.includes("?erro_excluir")) {
        mensagem = "Não foi possível excluir o registro, tente novamente.";
    } else if (URL.includes("?atualizado_com_sucesso")) {
        mensagem = "Bolo atualizado com sucesso";
    } else if (URL.includes("?erro_atualizar")) {
        mensagem = "Não foi possível atualizar o registro, tente novamente.";
    } else if (URL.includes("?sucesso_criar_conta")) {
        mensagem = "Parabéns, sua conta foi criada com sucesso.";
    } else if (URL.includes("?falha_criar_conta")) {
        mensagem = "Não foi possível criar a conta, tente novamente.";
    }

    // Se houver uma mensagem, exibe o alerta e redireciona
    if (mensagem) {
        alert(mensagem); // Exibe o alerta
        window.location.href = destino; // Redireciona para o destino
    }
}

// Função chamada ao carregar a página, executando os alertas e ativando o link no menu
window.onload = function() {
    alertasInsercao(); // Exibe os alertas baseados na URL
    ativarLink(); // Ativa o link no menu correspondente à página
}

// Função para redirecionar o usuário para a página de criação de nova conta
function criarNovaConta() {
    window.location.href = "criar_nova_conta.php"; // Redireciona para a página de criação de conta
}
