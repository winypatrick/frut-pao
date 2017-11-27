USE frutapao;

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` INT AUTO_INCREMENT NOT NULL,
  `funcao` VARCHAR(40) NOT NULL,
  `salario` DOUBLE(7,2) NOT NULL,
	PRIMARY KEY (`id`)
);
 INSERT INTO categoria VALUES
  (NULL,'Responsavel',20000.00),
  (NULL,'Assistente',15000.00),
  (NULL,'Gerente',40000.00);
