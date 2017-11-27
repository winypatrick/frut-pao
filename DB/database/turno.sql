USE frutapao;

CREATE TABLE IF NOT EXISTS `turno` ( -- | funcionario |-----<trabalha>-----| loja |
	--index
	`funcionario` int(20) not null, -- id funcionario
	`loja` int(20) NOT NULL,-- id loja
	`data` date not null, -- pk turno time_in será tirado e permite a execusao de turnos duplos
	-- dados do turno
	`hora_in` time not null
  `hora_out` time , -- verificar se foi prenxido antes de fazer logout
	`periudo` smallint not null -- 1 sedo(8 hora), 2 tarde(14 hora)
  `funcao` ENUM('R','A') default 'A', -- o responsavel sempre será quem efetou login
	`total_caixa` double(2,3), -- verificar se foi prenxido antes de fazer logout
	-- relatorio do turno
	`congelados` text ,-- verificar se foi prenxido antes de fazer logout
	`Frescos_padaria` text ,-- verificar se foi prenxido antes de fazer logout
	`stock_armazem` text ,-- verificar se foi prenxido antes de fazer logout
	`caixa_equipamentos` text,-- verificar se foi prenxido antes de fazer logout
	PRIMARY KEY (`loja`,`funcionario`,`data_time`),
	--FOREIGN KEY (`loja`) REFERENCES loja(`id`),
  --FOREIGN KEY (`funcionario`) REFERENCES funcionario(`id`),
);
