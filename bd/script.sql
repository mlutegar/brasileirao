create database if not exists brasileirao;
use brasileirao;

create or replace table jogador(
    id int primary key auto_increment,
    nome varchar(250) not null,
    equipe varchar(250) not null, 
    idade int not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

alter table jogador add column foto text not null default "imagens\\avatar.png" after nome;

create or replace table login(
    id int primary key auto_increment,
    email varchar(250) not null unique,
    senha varchar(255) not null,
    created_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login(email,senha) values('admin@cbf.com.br', md5('admin@123'));