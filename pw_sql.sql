create database db_servico;

use db_servico;

create table tb_cliente(
nr_cpf char(11) primary key,
nm_cliente varchar(50),
nm_endereco varchar(50),
nr_telefone varchar(11),
nm_bairro varchar(50),
nm_cidade varchar(25),
nr_cep varchar(20)
);

create table tb_produto(
cd_produto int auto_increment primary key,
nm_produto varchar(50),
ds_produto longtext,
vl_produto decimal(10,2),
qt_estoque varchar(5)
);

create table tb_forncedor(
nr_cnpj char(14) primary key,
nm_fornecedor varchar(50),
nm_endereco varchar(50),
nr_telefone varchar(11),
nm_bairro varchar(50),
nm_cidade varchar(25),
nr_cep varchar(20)
);

CREATE TABLE tb_funcionario(
nr_cpf char(11) primary key,
nm_funcionario varchar(50) NOT NULL,
nm_endereco varchar(50) NOT NULL,
nr_telefone char(11),
nm_bairro varchar(50) NOT NULL,
nm_cidade varchar(50) NOT NULL,
nr_cep char(8) NOT NULL
);

CREATE TABLE tb_usuario(
  cd_usuario int auto_increment primary key,
  email varchar(30) NOT NULL,
  senha varchar(20) NOT NULL,
  tipo ENUM('comum', 'administrador') NOT NULL
);


insert into tb_usuario
(email, senha, tipo) values
('admin@teste', 'admin', 'administrador');

insert into tb_usuario
(email, senha, tipo) values
('teste@teste', 'teste', 'comum');

select * from tb_cliente;
select * from tb_usuario;