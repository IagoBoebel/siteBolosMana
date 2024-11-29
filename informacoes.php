<?php 
    // Define o título da página e inclui o cabeçalho
    $title = "Informações";
    include 'header.php'; 
?>

<section class="conteudo">
    <div class="container">
        <!-- Título da seção -->
        <h1>Contato e Localização</h1>
        
        <!-- Seção de contato -->
        <h2>Fale Conosco</h2>
        <p>Quer saber mais sobre nossos bolos ou tem alguma dúvida? Entre em contato pelos nossos canais de atendimento abaixo:</p>
        <ul>
            <li><strong>Telefone:</strong> (11) 1234-5678</li>
            <li><strong>E-mail:</strong> contato@lojadebolos.com.br</li>
            <li><strong>Horário de atendimento:</strong> Segunda a Sexta, das 9h às 18h</li>
        </ul>

        <!-- Seção de localização -->
        <h2>Onde Estamos</h2>
        <p>Visite nossa loja física e experimente nossas delícias pessoalmente. Estamos localizados no coração da cidade:</p>
        <address>
            Rua dos Bolos, 123<br>
            Bairro Confeitaria, Cidade Doce - SP<br>
            CEP: 01234-567
        </address>
        
        <!-- Mapa integrado -->
        <div class="mapa mb-5">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345093747!2d144.9537363155049!3d-37.81720997975159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577c6b5a9a47b0a!2sSample%20Location!5e0!3m2!1sen!2sbr!4v1634735035067!5m2!1sen!2sbr" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </div>
</section>

<?php
    // Inclui o rodapé
    include 'footer.php'; 
?>
