CREATE DATABASE sisDisponibilidade charset 'utf8';
CREATE table remedio (
	id int AUTO_INCREMENT,
    nome varchar(50),
    descricao varchar(200),
    PRIMARY KEY (id)
);
CREATE table posto (
	id int AUTO_INCREMENT,
    nome varchar(50),
    endereco varchar(100),
    telefone varchar(50),
    PRIMARY KEY (id)
);
CREATE table cidadao (
	id int AUTO_INCREMENT,
    nome varchar(50),
    telefone varchar(50),
    idade int,
    cartaoSus boolean,
    numeroSus int,
    PRIMARY KEY (id)
);
