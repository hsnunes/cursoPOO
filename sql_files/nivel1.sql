create table estado (
	id integer PRIMARY KEY NOT NULL,
	sigla char(2),
	nome varchar(255)
);
create table cidade (
	id integer PRIMARY KEY NOT NULL,
	nome varchar(255),
	id_estado INTEGER REFERENCES estado (id)
);
create table pessoa (
	id integer PRIMARY key NOT null,
    nome varchar(200),
    endereco varchar(255),
    bairro varchar(100),
    telefone varchar(15),
    email varchar(255),
    id_cidade integer references cidade(id)
);