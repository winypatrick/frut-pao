USE frutapao;

CREATE TABLE IF NOT EXISTS `encomenda` (
  -- primary and foreign key
	`produto` int not null,
  `loja`    int not null,
  -- dados da encomenda
  `data_hora` datetime not null,
  `quantidade` int,
  -- index
  PRIMARY KEY (`produto`,`loja`),
  FOREIGN KEY (`produto`) REFERENCES armazem(`id`),
  FOREIGN KEY (`loja`) REFERENCES loja(`id`)
);

insert into encomenda values (1,1,'2017-11-11 11:40:12','100L')
