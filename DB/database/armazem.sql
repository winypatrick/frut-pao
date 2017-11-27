use frutapao;

CREATE TABLE IF NOT EXISTS `armazem` (
	`id` INT AUTO_INCREMENT NOT NULL,
  `zona` VARCHAR(50) NOT NULL,
	`rua` varchar(40) not null,
  `data_inaugoracao` date not null,
	`contacto` varchar(20) not null,
	`estado` smallint default 1, --1 activo, 0 - fechado
  primary key (`id`)
);

INSERT INTO armazem VALUES
(null,'latada','campo baxu','1994-11-11',2613431,0),
(null,'fazenda','avenida fazenda','1994-07-11',2613221,1);
