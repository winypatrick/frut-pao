USE frutapao;

CREATE TABLE IF NOT EXISTS `maquina` (
	`id` int AUTO_INCREMENT not null,
  `hostmane` varchar(50) not null,
  `usuario` varchar(20) not null,
  `loja` int,
	`armazem` int,
  primary key (`id`),
--  foreign key (`loja`) references loja(`id`),
--  foreign key (`armazem`) references armazem(`id`)
);

INSERT INTO loja values (null,'terrasystem','ailton',1),
(null,'kitty','coyas',2);
