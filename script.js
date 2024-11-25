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
        window.location.href = "administrador.php";
    } else if (URL.includes('?erro_inserir')) {
        alert('Não foi possível inserir o registro, tente novamente.');
        window.location.href = "administrador.php";
    } else if(URL.includes("?excluido_com_sucesso")) {
        alert('Bolo excluido com sucesso');
        window.location.href = "administrador.php";
    } else if (URL.includes('?erro_excluir')) {
        alert('Não foi possível excluir o registro, tente novamente.');
        window.location.href = "administrador.php";
    } else if(URL.includes("?atualizado_com_sucesso")) {
        alert('Bolo atualizado com sucesso');
        window.location.href = "administrador.php";
    } else if (URL.includes('?erro_atualizar')) {
        alert('Não foi possível atualizar o registro, tente novamente.');
        window.location.href = "administrador.php";
    }
}
window.onload = function() {
    ativarLink();
    alertasInsercao();
}
