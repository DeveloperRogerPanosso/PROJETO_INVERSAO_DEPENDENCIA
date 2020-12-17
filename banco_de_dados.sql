CREATE DATABASE IF NOT EXISTS crm;

USE crm;

CREATE TABLE IF NOT EXISTS usuarios (
	id integer(11) not null AUTO INCREMENT PRIMARY_KEY,
	nome varchar(100) not null,
	datacadastro date
);