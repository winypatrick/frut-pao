use frutapao;

CREATE TABLE IF NOT EXISTS `loja` (
	`id` INT AUTO_INCREMENT NOT NULL,
  `zona` VARCHAR(50) NOT NULL,
	`rua` varchar(40) not null,
  `data_inaugoracao` date not null,
	`contacto` varchar(20) not null,
	`estado` smallint default 1, --1 activo, 0 - fechado
  primary key (`id`)
);

INSERT INTO loja VALUES
(null,'fazenda','2017-10-20','rua 10 fazenda',2234567,1),
(null,'Achada Santo Antonio','2017-10-25','rua Abreu Abril',2642323,1),
(null,'São Domingos','2017-11-10','rua Dixida Cabral',2093412,1),
(null,'Latada','2015-11-15','rua Campo Baixo',2093412,0);
