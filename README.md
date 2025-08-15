A padaria Bumba meu Pão precisa organizar seus cadastros e movimentações básicas 
(produtos, categorias, clientes e pedidos). Nós recebemos uma base PHP com operações 
CRUD (Create, Read, Update, Delete) e um script SQL inicial. A missão é se reunir em 
equipes de 4 estudantes (Hisabel, João Miguel, Rafael Almeida e Rafael Sonni)e transformar 
esse esqueleto em um mini‑sistema funcional, aplicando boas práticas de organização de código, 
segurança e usabilidade.

//SCRIPT SQL
CREATE DATABASE crud_padaria;

USE crud_padaria;

CREATE TABLE usuarios(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha_hash VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE produtos (
    id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade_estoque INT NOT NULL,
    
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE table clientes (
    id_cliente INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(255)
    
);

CREATE TABLE pedidos(
    id_pedido INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    quantidade INT NOT NULL,
    data_pedido DATETIME NOT NULL,
    status VARCHAR(50) NOT NULL,
    
    id_cliente INT NOT NULL,
    id_produto INT NOT NULL,
    
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
 );
