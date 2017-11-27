USE frutapao;

CREATE TABLE IF NOT EXISTS `t_avalicao` (
  `id` int AUTO_INCREMENT not null,
  `tipo` varchar(30) not null,
  PRIMARY KEY ('id')
);

insert into t_avaliacao values (null,'Avaliacao Interpessoal'),(null,'Avaliação tecnicas');
