USE frutapao;

-- avaiação
-- 1. Mau
-- 2. Insuficiente
-- 3. Suficiente
-- 4. Bom
-- 5. Muito Bom
-- Elementos de avaliacao tecnica
--   `caixa`
--   `limpeza`
--   `Atemdimento`
--   `Reposicao`
--   `Team_work` (trabalho em equipa)
--   `charcutaria`
-- Elementos da avaliacao interpessoal
--   `flexibilidade`
--   `autonomia`
--   `autoridade`
--   `pontualidade e assuidade
--   `honestidade`
--   `pro_actividade`
--   `responsabilidade`
--   `uniforme`
--   `PROperacionairo` (presença nas reunioes operacionais)

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int auto_increment not null,
  `elemento` varchar(30) not null,
  `nota` ENUM('1','2','3','4','5','6'),
  `obs` text,
  `t_ava` int,
  `funcionario` int,
  PRIMARY KEY ('id'),
--  FOREIGN KEY ('t_ava') REFERENCES t_avaliacao('id'),
--  FOREIGN KEY ('funcionario') REFERENCES funcionario('id')
);
insert into avaliacao values(null,'caixa',4,'bla bla bla',1,1);
-- CREATE TABLE IF NOT EXISTS `avaliacao` (
--   `id` int auto_increment not null,
--   -- grupo avaliacao tecnica
--   `caixa` ENUM('1','2','3','4','5') NOT NULL,
--   `limpeza` ENUM('1','2','3','4','5') NOT NULL,
--   `Atemdimento` ENUM('1','2','3','4','5') NOT NULL,
--   `Reposicao` ENUM('1','2','3','4','5') NOT NULL,
--   `Team_work` ENUM('1','2','3','4','5') NOT NULL,-- trabalho em equipa
--   `charcutaria` ENUM('1','2','3','4','5') NOT NULL,
--   -- grupo avaliacao interpessoal
--   `flexibilidade` ENUM('1','2','3','4','5') NOT NULL,
--   `autonomia` ENUM('1','2','3','4','5') NOT NULL,
--   `autoridade` ENUM('1','2','3','4','5') NOT NULL,
--   `pontualidade` ENUM('1','2','3','4','5') NOT NULL, -- e assuidade
--   `honestidade` ENUM('1','2','3','4','5') NOT NULL,
--   `pro_actividade` ENUM('1','2','3','4','5') NOT NULL,
--   `responsabilidade` ENUM('1','2','3','4','5') NOT NULL,
--   `uniforme` ENUM('1','2','3','4','5') NOT NULL,
--   `PROperacionairo` ENUM('1','2','3','4','5') NOT NULL,-- presença nas reunioes operacionais
--   `obs` text,
--   `funcionario` int,
--   -- index
--   primary key (`id`)
-- );
