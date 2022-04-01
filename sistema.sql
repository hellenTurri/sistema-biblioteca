-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 01/04/2022 às 23:16
-- Versão do servidor: 5.7.34
-- Versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `idlivro` int(11) NOT NULL,
  `nomelivro` varchar(40) NOT NULL,
  `autorlivro` varchar(40) NOT NULL,
  `descricaolivro` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`idlivro`, `nomelivro`, `autorlivro`, `descricaolivro`) VALUES
(20, 'O Milagre Da Manhã', 'Elrod,Ha', 'Conheça o método simples e eficaz que vai proporcionar a vida dos sonhos — antes das 8 horas da manhã!'),
(21, 'A Garota do Lago', 'Donlea,Charlie', 'Summit Lake, uma pequena cidade entre montanhas, é esse tipo de lugar, bucólico e com encantadoras casas dispostas à beira de um longo trecho de água intocada.'),
(22, 'O Poder da Ação', 'Vieira,Paulo', 'É comum sentir insatisfação em algum momento da vida, seja com o trabalho, com os estudos, com o corpo ou até com as pessoas que você convive.'),
(23, 'Mindset', 'Carol Dweck', 'Carol S. Dweck, professora de psicologia na Universidade Stanford e especialista internacional em sucesso e motivação, desenvolveu, ao longo de décadas de pesquisa...'),
(24, 'O Conto da Aia', 'Atwood,Margaret', 'Escrito em 1985, o romance distópico O conto da aia, da canadense Margaret Atwood, tornou-se um dos livros mais comentados em todo o mundo nos últimos meses...'),
(25, '1984', 'Orwell,George', 'Ao lado de “A Revolução dos Bichos”, o livro “1984” é um dos mais famosos de George Orwell.'),
(26, 'Minha História', 'Obama,Michelle', 'Um relato íntimo, poderoso e inspirador da ex-primeira-dama dos Estados Unidos.'),
(27, 'O Sol É Para Todos', 'LEE,HARPER', 'A nova edição revista de um dos maiores clássicos da literatura mundial Um livro emblemático sobre racismo e injustiça...');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE `reservas` (
  `idreserva` int(11) NOT NULL,
  `datareserva` date NOT NULL,
  `datadevolucao` date NOT NULL,
  `idlivro_livros` int(11) NOT NULL,
  `idusuario_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `reservas`
--

INSERT INTO `reservas` (`idreserva`, `datareserva`, `datadevolucao`, `idlivro_livros`, `idusuario_usuarios`) VALUES
(10, '2022-04-01', '2022-04-14', 21, 118),
(11, '2022-04-20', '2022-04-27', 20, 119),
(12, '2022-05-12', '2022-04-20', 27, 119);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `email`, `senha`, `nivel`) VALUES
(117, 'User Admin', 'useradmin@admin.com', 'admin123', 1),
(118, 'User Aluno', 'useraluno@aluno.com', 'aluno123', 0),
(119, 'User ALuno 2', 'useraluno2@aluno.com', 'aluno2123', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idlivro`);

--
-- Índices de tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idreserva`),
  ADD KEY `idlivro_livros` (`idlivro_livros`),
  ADD KEY `idusuario_usuarios` (`idusuario_usuarios`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `idlivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idlivro_livros`) REFERENCES `livros` (`idlivro`),
  ADD CONSTRAINT `reservas_ibfk_3` FOREIGN KEY (`idusuario_usuarios`) REFERENCES `usuarios` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
