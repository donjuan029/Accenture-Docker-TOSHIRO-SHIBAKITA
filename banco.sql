CREATE TABLE dados (
    aluno_id INT PRIMARY KEY,        -- Identificador único do aluno
    nome VARCHAR(50) NOT NULL,       -- Nome do aluno
    sobrenome VARCHAR(50) NOT NULL,  -- Sobrenome do aluno
    endereco VARCHAR(150),           -- Endereço do aluno
    cidade VARCHAR(50),              -- Cidade do aluno
    host VARCHAR(50)                 -- Host de origem do registro
);