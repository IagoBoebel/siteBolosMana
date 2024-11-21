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

window.onload = function() {
    ativarLink();
};