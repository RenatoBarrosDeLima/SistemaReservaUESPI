-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 18-Jan-2017 às 17:46
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BANCORESERVA`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `CAMPUS`
--

CREATE TABLE `CAMPUS` (
  `codCampus` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `codCity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `CAMPUS`
--

INSERT INTO `CAMPUS` (`codCampus`, `nome`, `codCity`) VALUES
(0, '0', 0),
(1, 'POETA TORQUATO NETO', 1),
(2, 'CLÓVIS MOURA', 1),
(6, 'DRA. JOSEFINA DEMES', 3),
(7, 'DEP. JESUALDO CAVALCANTI BARROS', 11),
(8, 'PROF. ALEXANDRE ALVES DE OLIVEIRA', 2),
(9, 'BARROS ARAÚJO', 4),
(10, 'DOM JOSÉ VÁSQUEZ DIAZ', 10),
(11, 'PROF. ANTONIO GIOVANNI ALVES DE SOUSA', 5),
(12, 'HERÓIS DO JENIPAPO', 6),
(13, 'POSSIDÔNIO QUEIROZ', 7),
(14, 'PROF. ARISTON DIAS LIMA', 8),
(15, 'CAMPUS DE URUÇUÍ', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `CENTRO`
--

CREATE TABLE `CENTRO` (
  `codCentro` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `codCamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `CENTRO`
--

INSERT INTO `CENTRO` (`codCentro`, `nome`, `codCamp`) VALUES
(0, '0', 0),
(1, 'CTU', 1),
(2, 'CCN', 1),
(3, 'CCHL', 1),
(4, 'CCE', 1),
(6, 'CCHL', 2),
(7, 'CCN', 2),
(8, 'CCA', 1),
(9, 'CCECA', 1),
(10, 'CCSA', 1),
(11, 'CCN', 6),
(12, 'CCE', 11),
(13, 'CCE', 9),
(14, 'CCS', 1),
(15, 'xxxxxxxx', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `CIDADE`
--

CREATE TABLE `CIDADE` (
  `codCity` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `CIDADE`
--

INSERT INTO `CIDADE` (`codCity`, `nome`) VALUES
(0, '0'),
(1, 'Teresina'),
(2, 'Parnaiba'),
(3, 'Floriano'),
(4, 'Picos'),
(5, 'Piripiri'),
(6, 'Campo Maior'),
(7, 'Oeiras'),
(8, 'São Raimundo Nonato'),
(9, 'Uruçuí'),
(10, 'Bom Jesus'),
(11, 'Corrente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `COORDENACAO`
--

CREATE TABLE `COORDENACAO` (
  `codCoord` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `codCentro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `COORDENACAO`
--

INSERT INTO `COORDENACAO` (`codCoord`, `nome`, `codCentro`) VALUES
(0, '0', 0),
(1, 'Bacharelado em Ciência da Computação', 1),
(2, 'Letra Portugues', 3),
(4, 'Química', 7),
(5, 'Bacharelado em Engenharia Cívil', 7),
(6, 'Bacharelado em Engenharia Elétrica', 1),
(7, 'Engenharia Agronômica', 8),
(8, 'Zootecnia', 8),
(9, 'Letras Inglês', 3),
(10, 'Letra Espanhol', 3),
(11, 'Licenciatura Plena em História', 3),
(12, 'Licenciatura em Matemática', 2),
(13, 'Licenciatura em Ciências Biológicas', 2),
(14, 'Bacharelado em Ciências Biológicas', 2),
(15, 'Licenciatura em Química', 2),
(16, 'Bacharelado em Biblioteconomia', 10),
(17, 'Bacharelado em Administração', 10),
(18, 'Bacharelado em Fisioterapia', 14),
(19, 'Bacharelado em Medicina', 14),
(20, 'Licenciatura em Pedagogia', 6),
(21, 'Licenciatura em História', 6),
(22, 'Licenciatura em Ciências Biológicas', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `COORD_PROFESSOR`
--

CREATE TABLE `COORD_PROFESSOR` (
  `codCoord` int(11) NOT NULL,
  `codProf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `EQUIPAMENTO`
--

CREATE TABLE `EQUIPAMENTO` (
  `codEquip` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `tombo` varchar(15) NOT NULL,
  `dataAquisicao` varchar(15) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `codCoord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `EQUIPAMENTO`
--

INSERT INTO `EQUIPAMENTO` (`codEquip`, `nome`, `tombo`, `dataAquisicao`, `modelo`, `marca`, `cor`, `codCoord`) VALUES
(21, 'Trasparencia', '1234', '2016-12-30', 'gf23', 'epson', 'preto', 1),
(22, 'Data Show', '1001', '2000-12-01', 't1-0001', 'Phillco', 'Preto', 1),
(23, 'Notebook', '1002', '2000-12-02', 't1-0002', 'Dell', 'Preto', 1),
(24, 'Retropojetor', '1003', '2000-12-03', 't1-0001', 'Toshiba', 'Cinza', 11),
(25, 'Compasso', '1004', '2010-06-01', 't1-0001', 'aaaaaaa', 'amarelo', 12),
(26, 'Calculadora', '5001', '2010-06-05', 't1-0010', 'Hp', 'Branco', 12),
(27, 'Data Show', '1044', '2016-06-01', 't1-0040', 'Samsung', 'Preto', 11),
(28, 'Micro System', '1032', '2013-06-01', 't1-0076', 'Philips', 'Preto', 9),
(29, 'DVD', '1030', '2004-06-01', 't1-2001', 'CCE', 'Cinza', 9),
(30, 'Data Show', '2030', '2013-10-01', 't2-2001', 'Positivo', 'Preto', 6),
(31, 'Data Show', '2004', '2013-10-04', 't2-4003', 'Phillco', 'Branco', 15),
(32, 'Notebook', '2006', '2014-10-01', 't2-4000', 'Samsung', 'Preto', 6),
(33, 'Data Show', '4400', '2015-10-23', 't1-2055', 'Epson', 'Branco', 9),
(34, 'Notebook', '3009', '2014-10-11', 't5-1002', 'Positivo', 'Preto', 9),
(35, 'Notebook', '6001', '2014-03-07', 't6-4321', 'Lenovo', 'Branco', 15),
(36, 'Notebook', '3095', '2014-03-19', 't4-0932', 'Dell', 'Preto', 11),
(37, 'Notebook', '4002', '2016-03-07', 't4-0987', 'Apple', 'Branco', 12),
(38, 'Data Show', '4321', '2014-03-07', 't3-8754', 'Epson', 'Branco', 12),
(39, 'Data Show', '6875', '2016-03-07', 't5-9823', 'HP', 'Branco', 1),
(40, 'Filmadora', 'd7230', '20/07/2010', 'x420', 'Samsung', 'Cinza', 1),
(41, 'Notebook', '1526', '26/09/2013', 'ty543', 'Dell', 'Preto', 2),
(42, 'DataShow', '6392', '13/11/2014', 'ts432', 'Philco', 'Preto', 2),
(43, 'DVD', '8432', '21/06/2015', 'hs436', 'Philllips', 'Cinza', 2),
(44, 'DVD', '2031', '11/12/2015', 'hs876', 'Toshiba', 'Cinza', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `EQUIP_PROF`
--

CREATE TABLE `EQUIP_PROF` (
  `codEquip` int(11) NOT NULL,
  `codProf` int(11) NOT NULL,
  `dataEmp` date NOT NULL,
  `dataDev` varchar(10) DEFAULT NULL,
  `horaEmp` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `EQUIP_PROF`
--

INSERT INTO `EQUIP_PROF` (`codEquip`, `codProf`, `dataEmp`, `dataDev`, `horaEmp`, `status`) VALUES
(21, 55555, '2016-11-21', NULL, 1, 1),
(21, 55555, '2017-02-15', NULL, 6, 1),
(22, 55555, '2017-03-08', NULL, 5, 1),
(22, 1049903, '2016-07-22', NULL, 2, 1),
(23, 55555, '2017-01-07', NULL, 3, 1),
(23, 55555, '2017-01-23', NULL, 5, 1),
(23, 55555, '2017-02-14', NULL, 3, 1),
(23, 55555, '2017-05-26', NULL, 4, 1),
(39, 55555, '2017-09-22', NULL, 1, 1),
(39, 1049903, '2017-03-29', NULL, 4, 1),
(40, 55555, '2017-01-28', NULL, 3, 1),
(40, 1050333, '0000-00-00', NULL, 0, 0),
(41, 0, '0000-00-00', NULL, 0, 0),
(41, 15100, '2017-03-27', NULL, 4, 1),
(42, 0, '0000-00-00', NULL, 0, 0),
(43, 0, '0000-00-00', NULL, 0, 0),
(43, 15100, '2017-03-27', NULL, 4, 1),
(43, 15100, '2017-04-15', NULL, 6, 1),
(44, 0, '0000-00-00', NULL, 0, 0),
(44, 15100, '2017-03-27', NULL, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `LABORATORIO`
--

CREATE TABLE `LABORATORIO` (
  `codLab` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `setor` int(11) NOT NULL,
  `sala` int(11) NOT NULL,
  `codCoord` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `LABORATORIO`
--

INSERT INTO `LABORATORIO` (`codLab`, `nome`, `setor`, `sala`, `codCoord`) VALUES
(10, 'LABRA', 10, 3, 1),
(11, 'LABIRAS', 10, 4, 1),
(12, 'OPALA', 10, 5, 1),
(13, 'LABORATORIO CENTRA', 10, 6, 1),
(14, 'LAB INFORMATICA', 7, 3, 2),
(15, 'SALA DE ESTUDO', 7, 4, 2),
(16, 'LABORATORIO DE ARTES', 7, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `LAB_PROF`
--

CREATE TABLE `LAB_PROF` (
  `codLab` int(11) NOT NULL,
  `codProf` int(11) NOT NULL,
  `dataEmp` date NOT NULL,
  `dataDev` date DEFAULT NULL,
  `horaEmp` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `LAB_PROF`
--

INSERT INTO `LAB_PROF` (`codLab`, `codProf`, `dataEmp`, `dataDev`, `horaEmp`, `status`) VALUES
(10, 0, '0000-00-00', NULL, 0, 0),
(11, 0, '0000-00-00', NULL, 0, 0),
(12, 0, '0000-00-00', NULL, 0, 0),
(13, 0, '0000-00-00', NULL, 0, 0),
(14, 0, '0000-00-00', NULL, 0, 0),
(14, 15100, '2017-01-26', NULL, 2, 1),
(15, 0, '0000-00-00', NULL, 0, 0),
(15, 15100, '2017-01-26', NULL, 2, 1),
(16, 0, '0000-00-00', NULL, 0, 0),
(16, 15100, '2017-06-18', NULL, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `PROFESSOR`
--

CREATE TABLE `PROFESSOR` (
  `codProf` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `codCoord` int(11) NOT NULL,
  `funcao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `PROFESSOR`
--

INSERT INTO `PROFESSOR` (`codProf`, `nome`, `email`, `endereco`, `telefone`, `senha`, `codCoord`, `funcao`) VALUES
(0, '', '', '', 0, NULL, 0, 0),
(15100, 'Marcia Ribeiro Feitosa', 'marcia@uespi', 'Bueno Aires', 3333333, '11111', 2, 0),
(55555, 'Daniele Pereira Gonzaga', 'daniele@uespi', 'Poty Velho', 5555, '5555', 1, 0),
(1049903, 'Ramon', 'ramon@net', 'Santa Fé', 81772617, '1234', 1, 1),
(1050333, 'Kenad Wanderson', 'kenadWanderson@uespi', 'Infernin', 9999, '4444', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CAMPUS`
--
ALTER TABLE `CAMPUS`
  ADD PRIMARY KEY (`codCampus`),
  ADD KEY `FK_codCity` (`codCity`);

--
-- Indexes for table `CENTRO`
--
ALTER TABLE `CENTRO`
  ADD PRIMARY KEY (`codCentro`),
  ADD KEY `FK_codCamp` (`codCamp`);

--
-- Indexes for table `CIDADE`
--
ALTER TABLE `CIDADE`
  ADD PRIMARY KEY (`codCity`);

--
-- Indexes for table `COORDENACAO`
--
ALTER TABLE `COORDENACAO`
  ADD PRIMARY KEY (`codCoord`),
  ADD KEY `FK_codCentro` (`codCentro`);

--
-- Indexes for table `COORD_PROFESSOR`
--
ALTER TABLE `COORD_PROFESSOR`
  ADD PRIMARY KEY (`codCoord`,`codProf`),
  ADD KEY `FK_professor_coord` (`codProf`);

--
-- Indexes for table `EQUIPAMENTO`
--
ALTER TABLE `EQUIPAMENTO`
  ADD PRIMARY KEY (`codEquip`),
  ADD KEY `FK_equip_coord` (`codCoord`);

--
-- Indexes for table `EQUIP_PROF`
--
ALTER TABLE `EQUIP_PROF`
  ADD PRIMARY KEY (`codEquip`,`codProf`,`dataEmp`,`horaEmp`),
  ADD KEY `FK_prof_equip` (`codProf`);

--
-- Indexes for table `LABORATORIO`
--
ALTER TABLE `LABORATORIO`
  ADD PRIMARY KEY (`codLab`),
  ADD KEY `FK_codCoord` (`codCoord`);

--
-- Indexes for table `LAB_PROF`
--
ALTER TABLE `LAB_PROF`
  ADD PRIMARY KEY (`codLab`,`codProf`,`dataEmp`),
  ADD KEY `FK_prof_lab` (`codProf`);

--
-- Indexes for table `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  ADD PRIMARY KEY (`codProf`),
  ADD KEY `FK_cod_prof_coord` (`codCoord`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CAMPUS`
--
ALTER TABLE `CAMPUS`
  MODIFY `codCampus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `CENTRO`
--
ALTER TABLE `CENTRO`
  MODIFY `codCentro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `CIDADE`
--
ALTER TABLE `CIDADE`
  MODIFY `codCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `COORDENACAO`
--
ALTER TABLE `COORDENACAO`
  MODIFY `codCoord` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `EQUIPAMENTO`
--
ALTER TABLE `EQUIPAMENTO`
  MODIFY `codEquip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `LABORATORIO`
--
ALTER TABLE `LABORATORIO`
  MODIFY `codLab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `CAMPUS`
--
ALTER TABLE `CAMPUS`
  ADD CONSTRAINT `FK_codCity` FOREIGN KEY (`codCity`) REFERENCES `CIDADE` (`codCity`);

--
-- Limitadores para a tabela `CENTRO`
--
ALTER TABLE `CENTRO`
  ADD CONSTRAINT `FK_codCamp` FOREIGN KEY (`codCamp`) REFERENCES `CAMPUS` (`codCampus`);

--
-- Limitadores para a tabela `COORDENACAO`
--
ALTER TABLE `COORDENACAO`
  ADD CONSTRAINT `FK_codCentro` FOREIGN KEY (`codCentro`) REFERENCES `CENTRO` (`codCentro`);

--
-- Limitadores para a tabela `COORD_PROFESSOR`
--
ALTER TABLE `COORD_PROFESSOR`
  ADD CONSTRAINT `FK_coord_professor` FOREIGN KEY (`codCoord`) REFERENCES `COORDENACAO` (`codCoord`),
  ADD CONSTRAINT `FK_professor_coord` FOREIGN KEY (`codProf`) REFERENCES `PROFESSOR` (`codProf`);

--
-- Limitadores para a tabela `EQUIPAMENTO`
--
ALTER TABLE `EQUIPAMENTO`
  ADD CONSTRAINT `FK_equip_coord` FOREIGN KEY (`codCoord`) REFERENCES `COORDENACAO` (`codCoord`);

--
-- Limitadores para a tabela `EQUIP_PROF`
--
ALTER TABLE `EQUIP_PROF`
  ADD CONSTRAINT `fk_prof_equip` FOREIGN KEY (`codEquip`) REFERENCES `EQUIPAMENTO` (`codEquip`),
  ADD CONSTRAINT `fk_prof_equipamento` FOREIGN KEY (`codProf`) REFERENCES `PROFESSOR` (`codProf`);

--
-- Limitadores para a tabela `LABORATORIO`
--
ALTER TABLE `LABORATORIO`
  ADD CONSTRAINT `FK_codCoord` FOREIGN KEY (`codCoord`) REFERENCES `COORDENACAO` (`codCoord`);

--
-- Limitadores para a tabela `LAB_PROF`
--
ALTER TABLE `LAB_PROF`
  ADD CONSTRAINT `FK_lab_prof` FOREIGN KEY (`codLab`) REFERENCES `LABORATORIO` (`codLab`),
  ADD CONSTRAINT `FK_prof_lab` FOREIGN KEY (`codProf`) REFERENCES `PROFESSOR` (`codProf`);

--
-- Limitadores para a tabela `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  ADD CONSTRAINT `FK_cod_prof_coord` FOREIGN KEY (`codCoord`) REFERENCES `COORDENACAO` (`codCoord`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
