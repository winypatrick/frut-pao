 
--
-- Database: `frut&pao`
--
CREATE DATABASE IF NOT EXISTS `frut&pao` ;
USE `frut&pao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `data_nascimento` varchar(10) DEFAULT NULL,
  `n_bi` int(20) DEFAULT NULL,
  `n_nif` int(20) DEFAULT NULL,
  `morada` varchar(40) DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `funcao` varchar(40) DEFAULT NULL,
  `contacto` varchar(20) DEFAULT NULL,
  `data_entrada` varchar(10) DEFAULT NULL,
  `data_saida` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_user`, `nome`, `data_nascimento`, `n_bi`, `n_nif`, `morada`, `sexo`, `funcao`, `contacto`, `data_entrada`, `data_saida`, `email`, `senha`, `foto`, `descricao`) VALUES
(8, 'terra system', '15-08-1994', 345678, 4356789, 'Universo', 'M', 'adim', '223442', '12-12-1999', NULL, 'terrasystem@universo.uni', '64877a4940895b627701dd0a21280fe8', 'basasdasd.png', 'tem de existir um admin para o systema poder funcionar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

DROP TABLE IF EXISTS `loja`;
CREATE TABLE IF NOT EXISTS `loja` (
  `id_lojja` int(11) NOT NULL AUTO_INCREMENT,
  `zona` varchar(50) DEFAULT NULL,
  `rua` varchar(40) DEFAULT NULL,
  `data_inaugoracao` varchar(10) DEFAULT NULL,
  `data_encerramento` varchar(10) DEFAULT NULL,
  `contacto` varchar(20) NOT NULL,
  `estado` smallint(6) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_lojja`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `maquina`
--

DROP TABLE IF EXISTS `maquina`;
CREATE TABLE IF NOT EXISTS `maquina` (
  `id_maquina` int(11) NOT NULL AUTO_INCREMENT,
  `hostmane` varchar(50) NOT NULL,
  `id_loja` int(11) NOT NULL,
  PRIMARY KEY (`id_maquina`),
  KEY `id_loja` (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `turno`;
CREATE TABLE IF NOT EXISTS `turno` (
  `id_loja` int(11) DEFAULT NULL,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_turno` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(11) DEFAULT NULL,
  `hora_entrada` varchar(11) DEFAULT NULL,
  `hora_saida` varchar(11) DEFAULT NULL,
  `periodo` varchar(2) DEFAULT NULL,
  `funcao_` varchar(15) DEFAULT NULL,
  `total_caixa` varchar(10) DEFAULT NULL,
  `congelado` varchar(200) DEFAULT NULL,
  `frescos_padaria` varchar(200) DEFAULT NULL,
  `stock_armazem` varchar(200) DEFAULT NULL,
  `caixa_equipamentos` varchar(200) DEFAULT NULL,
  `loja` varchar(12) NOT NULL,
  PRIMARY KEY (`id_turno`),
  KEY `id_loja` (`id_loja`),
  KEY `id_user` (`id_funcionario`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;



--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `maquina`
--
ALTER TABLE `maquina`
  ADD CONSTRAINT `maquina_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`id_lojja`);

--
-- Limitadores para a tabela `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`id_loja`) REFERENCES `loja` (`id_lojja`),
  ADD CONSTRAINT `turno_ibfk_2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id_user`);
COMMIT;
