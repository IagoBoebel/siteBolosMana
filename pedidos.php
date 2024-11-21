<?php 
$title = "Pedidos";
include 'header.php';
?>      
        <section class="conteudo">
            <h1 style="text-align: left">Faça seu pedido:</h1>
            <section>
                <form id="formularioPedido" method="get" action="formAction.html">
                    <div class="itemFormulario">
                        <label for="nome">Nome:</label>
                        <br>                  
                        <input id="nome" type="text" name="nome" placeholder="Digite Seu Nome" required>        
                        <br>
                    </div>
                    <div class="itemFormulario">
                        <label for="telefone">Telefone:</label>
                        <br>
                        <input id="telefone" type="tel" name="telefone" placeholder="Digite Seu Telefone" required>
                        <br>
                    </div>
                        <div class="itemFormulario">
                        <label for="cep">Endereço:</label>
                        <br>
                        <input id="cep" type="text" name="endereco" placeholder="Digite Seu Endereço Completo" required>
                        <br>
                    </div>
                    
                    <div class="itemFormulario">
                    <label for="sabor">Escolha um sabor:</label>
                        <br>
                        <select id="sabor" name="sabor" required>
                            <option value="Chocolate">Chocolate</option>
                            <option value="Cereja">Cereja</option>
                            <option value="Baunilha">Baunilha</option>
                            <option value="Frutas">Frutas Frescas</option>
                            <option value="Morango">Morango</option>
                        </select>
                        <br>
                    </div>
                    <div class="itemFormulario">
                        <label>Você irá retirar o bolo na loja?</label>
                        <br>
                        <label for="retiradaNao">Sim</label>
                        <input id="retiradaNao" type="radio" name="retirada" value="Sim" required>
                        <br>
                        <label for="retiradaSim">Não</label>
                        <input id="retiradaSim" type="radio" name="retirada" value="Nao">
                        <br>
                        <input id="botaoSubmit" type="submit">
                    </div>
                </form>
            
            </section>
        
        </section>
<?php
include 'footer.php';
?>