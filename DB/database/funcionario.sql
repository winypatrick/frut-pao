USE frutapao;

CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` INT auto_increment NOT NULL,
	`bi` INT(20) NOT NULL,
	`nif` INT(20) NOT NULL,
	`nome` VARCHAR(50) NOT NULL,
	`data_nascimento` DATE NOT NULL,
	`data_entrada` DATE NOT NULL,-- a data em que foi contratada
	`data_saida` DATE, -- a data em que deixou de trabalhar na fruta e pao
	`contato` VARCHAR(20) NOT NULL,
	`funcao` INT, -- referenci a tabela categoria( contem as funções dos funcionarios)
  `morada` varchar(40) NOT NULL,
	`obs` text,-- UMA BREVE  descridao do funcionario
  `sexo` ENUM('M','F') DEFAULT 'F',
	`foto` VARCHAR(50),
  -- dados do login
  `email` varchar(50), -- NÃO OBRIGATORIO equivale ao username
	`senha` varchar(255), -- NÃO OBRIGATORIO
	PRIMARY KEY (`id`),
--  FOREIGN KEY (`funcao`) REFERENCES categoria(`id`)
);

INSERT INTO funcionario VALUES
(null,123465,122334456,'Ailton Mendes Duarte','1994-08-15','2017-10-20',null,9335986,  3,'adidas.coyas@gmail.com',md5('terrasystem'),
'Latada','tamanho media, estudante','M',null),
(null,123312,1231313,'Veronica Tavares Duarte','1997-03-20','2016-12-2',null,9127654,2,'veronicaduarte@hotmail.com',null,'Pensamento',
'alta, estudante','F',null),
(null,13223,232323,'Arivelto Tavares Duarte','1997-11-11','2015-09-09',null,9120987,1,'ariveltotavares@gmail.com',md5('terra'),'calabaceira',
'bla bla bla','M',null);
