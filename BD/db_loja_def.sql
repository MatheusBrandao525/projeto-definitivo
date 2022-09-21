create database db_loja_def
default character set utf8
default collate utf8_general_ci;

use db_loja_def;


create table tbl_categoria
(
id_categoria int primary key auto_increment,
nome_categoria varchar(30)
)
default charset utf8mb4;


create table tbl_produto
(
id_produto int primary key auto_increment,
nome_produto varchar(48) not null,
descricao text not null,
id_categoria int not null,
imagen_produto varchar(84) not null,
qnt_estoque int not null,
vl_produto decimal(6,2) not null,
constraint fk_cat foreign key(id_categoria) references tbl_categoria(id_categoria)
)
default charset utf8mb4;

select * from tbl_produto;

update tbl_produto
set imagen_produto = 'camisa_social.jpg'
where id_produto = 8;

insert into tbl_categoria
values(default,'Masculino'),
(default,'Feminino'),
(default,'Calçados'),
(default,'Relojoaria'),
(default,'Joalheria');

insert into tbl_produto
values(default,'camisa social masculina','lorem ipslum silor amet, lorem dolro ipslum amet lorem lorem ipsum silor dameto.','3','camisa_social','10','69.90');

select * from tbl_produto;


select 	* from tbl_categoria;

create view vw_produtos
as select
	tbl_produto.id_produto,
    tbl_produto.imagen_produto,
    tbl_produto.nome_produto,
    tbl_categoria.nome_categoria,
    tbl_produto.qnt_estoque,
    tbl_produto.descricao,
    tbl_produto.vl_produto
from tbl_produto inner join tbl_categoria
	on tbl_produto.id_categoria = tbl_categoria.id_categoria;


select nome_produto, imagen_produto, descricao, qnt_estoque, vl_produto  from vw_produtos;

create table tbl_usuario
(
id_usuario int primary key auto_increment,
nome_usuario varchar (18) not null,
sobrenome varchar (18) not null,
ds_email varchar (30) not null,
ds_senha varchar (8) not null,
ds_status boolean not null,
ds_endereco varchar (80) not null,
ds_cidade varchar (24) not null,
no_cep char(9) not null
) default charset utf8mb4;

create table tbl_venda(
id_venda int(11) primary key auto_increment,
no_ticket varchar(13) not null,
id_usuario int(11) not null,
id_produto int(11) not null,
qnt_produto int(11) not null,
vlr_produto decimal(10,2) not null,
vlr_total_produto decimal(10,2) generated always as ((qnt_produto * vlr_produto)) virtual,
dt_venda date not null
) default charset=utf8mb4;


insert into tbl_usuario
values(default,'Matheus Felipe', 'Brandão','mafe123silva@gmail.com', 'exagon10',1, 'Br 429 km 91','Sao Francisco do Guapore','76935-000');

select * from tbl_usuario;

