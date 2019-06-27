-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2019 às 16:32
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `catequese2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `local` varchar(50) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idCatequista` int(11) NOT NULL,
  `idSacramento` int(11) NOT NULL,
  `falta` int(11) DEFAULT NULL,
  `presenca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nome`, `matricula`, `local`, `telefone`, `email`, `idCatequista`, `idSacramento`, `falta`, `presenca`) VALUES
(15, 'Darcio Ferreira Almeida', '11111', 'Igreja Nossa Senhora Aparecida', '77989899876', 'darcio.ferreiradfa@gmail.com', 3, 4, 25, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `catequista`
--

CREATE TABLE `catequista` (
  `idCatequista` int(11) NOT NULL,
  `nomeC` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `local` varchar(50) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `idSacramento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `catequista`
--

INSERT INTO `catequista` (`idCatequista`, `nomeC`, `cpf`, `local`, `telefone`, `email`, `idSacramento`) VALUES
(3, 'Natalice Ferreira da ConceiÃ§Ã£o', '09087373879', 'Igreja Menino Jesus', '', 'naty@gmaisl.com', 4),
(17, 'Jose alves', '112.122.222-22', 'Igreja da Matriz', '', '', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `codLog` int(11) DEFAULT NULL,
  `idUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`nome`, `senha`, `codLog`, `idUsu`) VALUES
('admin', '123', 2, 2),
('darcio', '123', 1, 12),
('Erick', '123', 1, 13),
('Tamires', '123', 1, 14),
('Jose', '1234', 1, 15),
('paulo', '123', 1, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sacramento`
--

CREATE TABLE `sacramento` (
  `idSacramento` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sacramento`
--

INSERT INTO `sacramento` (`idSacramento`, `descricao`) VALUES
(4, 'CRISMA'),
(6, 'EUCARISTIA I'),
(14, 'EUCARISTIA');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `fk_catequista` (`idCatequista`),
  ADD KEY `fk2_sacramento` (`idSacramento`);

--
-- Índices para tabela `catequista`
--
ALTER TABLE `catequista`
  ADD PRIMARY KEY (`idCatequista`),
  ADD KEY `fk_sacramento` (`idSacramento`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idUsu`);

--
-- Índices para tabela `sacramento`
--
ALTER TABLE `sacramento`
  ADD PRIMARY KEY (`idSacramento`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `catequista`
--
ALTER TABLE `catequista`
  MODIFY `idCatequista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `sacramento`
--
ALTER TABLE `sacramento`
  MODIFY `idSacramento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk2_sacramento` FOREIGN KEY (`idSacramento`) REFERENCES `sacramento` (`idSacramento`),
  ADD CONSTRAINT `fk_catequista` FOREIGN KEY (`idCatequista`) REFERENCES `catequista` (`idCatequista`);

--
-- Limitadores para a tabela `catequista`
--
ALTER TABLE `catequista`
  ADD CONSTRAINT `fk_sacramento` FOREIGN KEY (`idSacramento`) REFERENCES `sacramento` (`idSacramento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
