Sistema de Gestão de Loja de Bolos - README

Descrição
Este projeto foi realizado para a disciplina de fundamentos da programação web da universidade PUC-PR para o curso análise e desenvolvimento de software.
Este projeto é um sistema de gestão de vendas de bolos, onde clientes podem realizar pedidos e escolher entre diferentes tipos de bolos com diversas opções de entrega. A aplicação é composta por um backend PHP e utiliza um banco de dados MySQL para armazenar informações sobre os clientes, produtos (bolos), entregas, pedidos e produtos nos pedidos.

O sistema oferece funcionalidades básicas de CRUD (Criar, Ler, Atualizar, Deletar) para os bolos, com possibilidade de visualização dos produtos e exclusão de registros.

Tecnologias
PHP: Linguagem utilizada para o backend.
MySQL: Banco de dados utilizado para armazenar as informações.
HTML: Para estruturação da página.
CSS: Para estilização da interface do usuário.
Estrutura do Banco de Dados
O banco de dados utilizado neste sistema chama-se bolos_da_mana. Ele contém as seguintes tabelas:

1. Cliente
A tabela cliente armazena as informações dos clientes que realizam pedidos no sistema.

CREATE TABLE cliente (
    id_cliente INT UNIQUE NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(40),
    telefone_cliente VARCHAR(11),
    cpf_cliente VARCHAR(11) UNIQUE,
    email_cliente VARCHAR(40),
    senha_cliente VARCHAR(100),
    rua VARCHAR(45),
    numero_casa VARCHAR(5),
    CEP VARCHAR(45)
    tipo_acesso TINYINT
);

2. Produto (Bolos)
A tabela produto armazena as informações dos bolos disponíveis para venda.

CREATE TABLE produto (
    id_produto INT NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
    nome_bolo VARCHAR(30),
    preco_bolo DECIMAL(10,2),
    sabor_bolo VARCHAR(45),
    descricao_bolo VARCHAR(100),
    imagem_bolo VARCHAR(255)
);

3. Entrega
A tabela entrega armazena as informações sobre as entregas realizadas, incluindo o tipo de entrega, o entregador e a previsão de entrega.

CREATE TABLE entrega (
    id_entrega INT NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
    tipo_entrega VARCHAR(10),
    hora_saida DATETIME,
    nome_entregador VARCHAR(45),
    previsao_entrega DATETIME
);

4. Pedidos
A tabela pedidos armazena os pedidos realizados pelos clientes, com referências ao cliente e ao tipo de entrega.

CREATE TABLE pedidos (
    id_pedidos INT NOT NULL UNIQUE PRIMARY KEY AUTO_INCREMENT,
    valor_pedido INT,
    entrega_pedido TINYINT,
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
    id_entrega INT NOT NULL,
    FOREIGN KEY (id_entrega) REFERENCES entrega(id_entrega)
);

5. Pedidos e Produtos
A tabela pedidos_produto associa os produtos aos pedidos, indicando a quantidade de cada produto no pedido.

CREATE TABLE pedidos_produto (
    id_pedidos INT NOT NULL,
    id_produto INT NOT NULL,
    quantidadePedido INT NOT NULL,
    PRIMARY KEY (id_pedidos, id_produto),
    FOREIGN KEY (id_pedidos) REFERENCES pedidos(id_pedidos),
    FOREIGN KEY (id_produto) REFERENCES produto(id_produto)
);

Inserções no Banco de Dados
A seguir, são apresentadas algumas inserções básicas para popular o banco de dados com dados de exemplo.

Inserindo Clientes

INSERT INTO cliente (nome_cliente, telefone_cliente, cpf_cliente, email_cliente, senha_cliente, rua, numero_casa, CEP, tipo_acesso) VALUES
('Iago Boebel', '47992189445', '12345678901', 'iago@gmail.com', MD5('senha123'), 'Rua Camara', '114', '88308-080', 1),
('Maria Souza', '47984561234', '23456789012', 'maria.souza@gmail.com', MD5('senha234'), 'Rua das Flores', '55', '88305-100', 2),
('Carlos Santos', '47991234567', '34567890123', 'carlos.santos@gmail.com', MD5('senha345'), 'Avenida Brasil', '300', '88307-150', 1);

Inserindo Produtos (Bolos)

INSERT INTO produto (nome_bolo, preco_bolo, sabor_bolo, descricao_bolo, imagem_bolo) VALUES
('Bolo de Chocolate', 50.00, 'Chocolate', 'Delicioso bolo de chocolate com cobertura', 'chocolate.jpg'),
('Bolo de Cenoura', 45.00, 'Cenoura', 'Bolo de cenoura com cobertura de chocolate', 'cenoura.jpg'),
('Bolo de Fubá', 40.00, 'Fubá', 'Bolo de fubá com erva doce', 'fuba.jpg'),
('Bolo de Limão', 55.00, 'Limão', 'Bolo de limão com recheio cremoso', 'limao.jpg'),
('Bolo de Maçã', 60.00, 'Maçã', 'Bolo de maçã com canela', 'maca.jpg'),
('Bolo de Morango', 70.00, 'Morango', 'Bolo de morango com chantilly', 'morango.jpg'),
('Bolo de Coco', 50.00, 'Coco', 'Bolo de coco com recheio de doce de leite', 'coco.jpg'),
('Bolo de Maracujá', 45.00, 'Maracujá', 'Bolo de maracujá com calda de maracujá', 'maracuja.jpg'),
('Bolo de Nozes', 75.00, 'Nozes', 'Bolo de nozes com cobertura de doce de leite', 'nozes.jpg'),
('Bolo de Abacaxi', 65.00, 'Abacaxi', 'Bolo de abacaxi com calda de abacaxi', 'abacaxi.jpg'),
('Bolo de Pera', 50.00, 'Pera', 'Bolo de pera com especiarias', 'pera.jpg'),
('Bolo de Banana', 45.00, 'Banana', 'Bolo de banana com nozes', 'banana.jpg'),
('Bolo de Laranja', 55.00, 'Laranja', 'Bolo de laranja com calda de laranja', 'laranja.jpg'),
('Bolo de Creme de Leite', 60.00, 'Creme de Leite', 'Bolo suave com creme de leite', 'creme_de_leite.jpg'),
('Bolo de Chocolate Branco', 65.00, 'Chocolate Branco', 'Bolo com recheio de chocolate branco e morangos', 'chocolate_branco.jpg');

Inserindo Entregas
INSERT INTO entrega (tipo_entrega, hora_saida, nome_entregador, previsao_entrega)
VALUES
('Motoboy', '2024-11-22 10:00:00', 'Carlos Silva', '2024-11-22 12:00:00'),
('Carro', '2024-11-22 11:00:00', 'Ana Paula', '2024-11-22 13:30:00');

Inserindo Pedidos
INSERT INTO pedidos (valor_pedido, entrega_pedido, id_cliente, id_entrega) VALUES
(100, 0, 1, 1),
(150, 1, 2, 2);

Inserindo Produtos nos Pedidos
INSERT INTO pedidos_produto (id_pedidos, id_produto, quantidadePedido) VALUES
(1, 1, 2),
(1, 2, 3),
(2, 1, 1);

Funcionalidades
Listar Bolos
A funcionalidade de listar bolos é uma das principais características deste sistema. Ela permite que o usuário visualize, de forma clara e organizada, todos os bolos disponíveis no catálogo da loja. Cada bolo é apresentado com informações essenciais como nome, preço, sabor, descrição detalhada e o link para sua imagem. O sistema foi projetado para garantir que a listagem seja dinâmica e facilmente atualizável, com a possibilidade de adicionar novos bolos ao catálogo com apenas alguns cliques.

Além disso, a listagem dos bolos é organizada de forma visualmente atraente e adaptável a diferentes dispositivos, utilizando princípios de design responsivo. Isso garante que, seja acessado de um computador, tablet ou smartphone, o usuário tenha uma boa experiência ao visualizar os bolo. A funcionalidade também permite que o sistema seja ampliado com a adição de categorias de bolos, como "Bolos de Aniversário", "Bolos Veganos" e "Bolos para Eventos", oferecendo uma navegação mais segmentada para os clientes.

Cadastro de Bolo
O sistema também oferece uma funcionalidade completa para cadastro de bolos. Através de um formulário de inserção, o administrador da loja pode adicionar novos bolos ao catálogo, informando detalhes como o nome, sabor, preço, uma descrição detalhada do bolo, e uma imagem que representa visualmente o produto. Este processo é feito de forma intuitiva, com campos de preenchimento obrigatório. A interface foi projetada para ser acessível, minimizando o tempo necessário para cadastrar novos produtos.

Exclusão de Bolo
A funcionalidade de exclusão de bolo é uma ferramenta importante para o gerenciamento dinâmico do catálogo de produtos. Cada bolo listado possui um botão de "Excluir" que permite ao usuário (no caso, o administrador) remover bolos que não estão mais disponíveis para venda ou que foram descontinuados por algum motivo. A ação de exclusão é realizada de forma segura, utilizando um formulário de método POST que garante que a exclusão seja confirmada no backend antes de ser efetivada. Para evitar exclusões acidentais, o sistema vai ser atualizado para poder incluir uma etapa de confirmação, onde o administrador deve confirmar a remoção antes que o bolo seja removido permanentemente do catálogo. Isso assegura que o processo seja controlado e que não haja perda de dados importantes inadvertidamente.

Edição de Bolo
A funcionalidade de edição de bolos permite ao administrador modificar informações de bolos já cadastrados, como nome, preço, sabor, descrição e imagem, garantindo que o catálogo de produtos esteja sempre atualizado. A atualização é feita através de um formulário de edição, com campos obrigatórios. Após a alteração, os dados no banco de dados são atualizados. Isso possibilita uma gestão dinâmica do catálogo, ajustando rapidamente os produtos conforme necessidades do administrador.

Gestão de Pedidos
O sistema também oferece uma funcionalidade de gestão de pedidos, permitindo que o administrador acompanhe todos os pedidos feitos pelos clientes. Cada pedido é registrado com informações detalhadas, como o nome do cliente, o bolo solicitado, a quantidade e o preço total.

