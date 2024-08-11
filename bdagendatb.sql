CREATE DATABASE bdagendatb;
use bdagendatb;


CREATE TABLE tbusuario (
    cod INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    imagem VARCHAR(255)
);
		
CREATE TABLE tbamigos (
    cod INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    datanasc DATE NOT NULL,
    tel VARCHAR(20) NOT NULL,
    usuario_cod INT,
    FOREIGN KEY (usuario_cod) REFERENCES tbusuario(cod)
);

CREATE TABLE tbcomercio (
    cod INT AUTO_INCREMENT PRIMARY KEY,
    contato VARCHAR(255) NOT NULL,
    empresa VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    usuario_cod INT,
    FOREIGN KEY (usuario_cod) REFERENCES tbusuario(cod)
);


select * from tbusuario;
select * from tbamigos;
select * from tbcomercio;	

