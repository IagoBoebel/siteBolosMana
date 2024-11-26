function ativarLink() {
    var pagAtual = document.title.toLowerCase();
    var linksMenu = document.querySelectorAll(".nav-link");

    linksMenu.forEach(function(link) {
        var textoLink = link.textContent.toLowerCase();
        if (pagAtual == textoLink) {
            link.classList.add('active');
        } else {
            link.classList.remove('active')
        }     
    });
};


// Função para criar alertas do CRUD de bolos
function alertasInsercao() {
    const URL = decodeURIComponent(window.location.search);
    let mensagem = "";
    let destino = "administrador.php"; // Destino padrão
    console.log("URL:", URL);
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

    if (mensagem) {
        alert(mensagem);
        window.location.href = destino;
    }
}
window.onload = function() {
    alertasInsercao();
    ativarLink();
    
}

function criarNovaConta() {
    window.location.href = "criar_nova_conta.php";
}