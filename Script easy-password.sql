/* Script easy passowrd */

drop database `easy-password`;

create database `easy-password`
default character set utf8
default collate utf8_general_ci;

create table usuario(
	usuario_id int not null auto_increment,
    nickname varchar(100) default 'Sem nome',
    login varchar(100) not null unique,
    senha varchar(100) not null,
    
    primary key(usuario_id)
);

create table senha(
	senha_id int not null auto_increment,
    senha_usu varchar(100),
    usuario_id int not null,
    alterado int(1) default 0,
    
    primary key(senha_id),
    foreign key(usuario_id) references usuario (usuario_id)
);

create table categoria(
	categoria_id int not null auto_increment,
    nome_categoria varchar(100),
    usuario_id int,
    
    primary key(categoria_id),
    foreign key(usuario_id) references usuario (usuario_id)
);

create table cat_sen(
    cat_sen_id int not null auto_increment primary key,
	categoria_id int not null,
    senha_id int not null,
    
   foreign key(categoria_id) references categoria (categoria_id),
   foreign key(senha_id) references senha (senha_id)
);

insert into categoria (nome_categoria)
values ('Sem categoria');
                
				
select * from senha;

select * from cat_sen;

select * from categoria;

select * from usuario;