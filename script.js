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
    const URL = window.location.search;
    if(URL.includes("?inserido_com_sucesso")) {
        alert('Bolo inserido com sucesso');
    } if (URL.includes('?erro_inserir') || URL.includes('?erro_conexao')) {
        alert('Não foi possível inserir o registro, tente novamente.')

    }
}


window.onload = function() {
    ativarLink();
    alertasInsercao();
};