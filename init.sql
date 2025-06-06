CREATE DATABASE IF NOT EXISTS startup_db;
USE startup_db;

CREATE TABLE IF NOT EXISTS contato (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    datahora DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Inserts iniciais (opcional)
INSERT INTO contato (nome, email, mensagem) VALUES
('João Silva', 'joao@email.com', 'Mensagem de teste 1'),
('Maria Souza', 'maria@email.com', 'Mensagem de teste 2');
