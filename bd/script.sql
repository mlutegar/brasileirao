create database if not exists brasileirao;
use brasileirao;

create table jogador(
    id int primary key auto_increment,
    nome varchar(250) not null,
    equipe varchar(250) not null, 
    idade int not null,
    create_at TIMESTAMP not null default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 