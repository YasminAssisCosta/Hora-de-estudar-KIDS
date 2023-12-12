-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2023 às 22:22
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nome` varchar(125) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(125) NOT NULL,
  `curriculo` varchar(255) NOT NULL,
  `tipo` varchar(1) NOT NULL,
  `verificado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nome`, `email`, `senha`, `curriculo`, `tipo`, `verificado`) VALUES
(1, 'admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '0', 1),
(6, 'Admin Ajudante', 'adminAjudante@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '1', 1),
(7, 'ajudante2', 'ajude@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '1', 0),
(11, 'abacate', 'adminAjudante2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://fisica.net/passenaufrgs/provas/2023/ufrgs-2023-gabaritos.php', '1', 0),
(12, 'abacate', 'adminAjudante2@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://fisica.net/passenaufrgs/provas/2023/ufrgs-2023-gabaritos.php', '1', 0),
(13, 'abacate', 'adminAjudante3@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'https://fisica.net/passenaufrgs/provas/2023/ufrgs-2023-gabaritos.php', '1', 0),
(14, 'abacate', 'HarryPotter@gmail.com', '6add84506c86a658bc85038f91e35ce7', 'https://fisica.net/passenaufrgs/provas/2023/ufrgs-2023-gabaritos.php', '1', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

CREATE TABLE `tb_disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_disciplina`
--

INSERT INTO `tb_disciplina` (`id_disciplina`, `nome`, `imagem`) VALUES
(1, 'Português', 'ec16155b8cf9d4f75ffbc6c84df4a9d3.jpg'),
(2, 'Matemática', '233589e1d148e0a8453697aaa49b1f6b.jpg'),
(3, 'Ciências', '9a6ded5be3995d4eb035f6ac60da4441.jpg'),
(4, 'História', '8e664519a923b446089173243036b8e9.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_material`
--

CREATE TABLE `tb_material` (
  `id_material` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `id_nivel` int(10) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `link` varchar(5000) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `verificado` tinyint(1) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_material`
--

INSERT INTO `tb_material` (`id_material`, `titulo`, `id_nivel`, `descricao`, `imagem`, `link`, `id_admin`, `verificado`, `autor`, `id_disciplina`) VALUES
(16, 'Fonema ', 1, 'Nesta sessão será possivel desenvolver habilidades para identificar fonemas e sua representação por letras. ', 'd56ad84d43aeb5050d44c8ac84acd554.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/kzG7k7F5VOY?si=2NLuKFbEzVJu-JvW\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 1, 'Prof. Ana Paula Apaso ', 1),
(19, 'Vogais 1 ', 1, 'Nesta sessão será possivel desenvolver habilidades para identificar as vogais.', 'a43a5513ee55574d4b45c0762575a62e.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/fPnpu68PToA?si=-5AkYAuwwNOF8TCA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 1, 'Smile and Learn - Português', 1),
(24, 'Número de 1 a 10', 1, 'Neste vídeo, o monstro apresenta os números de 1 a 10 e explica tudo com divertidos exemplos ', '8b459ea1a2402848628d4171e69cd7d1.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Kp4XnRSYHy4?si=YuzOmFY23GUmdj3v\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 1, 'Smile and Learn - Português ', 2),
(25, 'Aprendendo a contar até 10', 1, 'este vídeo, o monstro apresenta os números de 1 a 10 e explica tudo com divertidos exemplos.', 'a60aed061ffcaa7825b0ba5d753910af.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Kp4XnRSYHy4?si=kPHR1JhQ3qp4Gr5Q\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 0, 'Smile and Learn! Português', 1),
(26, 'QUESTAO UM', 1, 'Neste vídeo educativo você poderá aprender detalhes muito divertidos e interessantes sobre todos os planetas do sistema solar. ', '9c9b6092e9f9ba2509bbffa309c817a5.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Kp4XnRSYHy4?si=YuzOmFY23GUmdj3v\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 0, 'Smile and Learn - Português ', 2),
(107, 'Contando pi', 1, 'Neste vídeo educativo você poderá aprender detalhes muito divertidos e interessantes sobre todos os planetas do sistema solar. ', '7a247303ac0af0aff35b7a7a98f9580b.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Kp4XnRSYHy4?si=YuzOmFY23GUmdj3v\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 0, 'Smile and Learn - Português ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mensagem`
--

CREATE TABLE `tb_mensagem` (
  `id_mensagem` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `mensagem` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_mensagem`
--

INSERT INTO `tb_mensagem` (`id_mensagem`, `id_usuario`, `assunto`, `mensagem`) VALUES
(1, 1, 'Muito Bom', 'Adore os quizzes'),
(2, 13, 'Adorei', 'Site muito bom para crianças, uso em minhas aulas'),
(5, 17, 'Bahh adorei', 'Minha filha adora usar esse site'),
(6, 21, 'Bom d+', 'Já indiquei para toda a familia'),
(7, 1, 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nivel`
--

CREATE TABLE `tb_nivel` (
  `id_nivel` int(11) NOT NULL,
  `nivel` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_nivel`
--

INSERT INTO `tb_nivel` (`id_nivel`, `nivel`) VALUES
(1, ' 1º ANO'),
(2, ' 2º ANO'),
(3, ' 3º ANO'),
(4, '4º ANO'),
(5, '5º ANO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao`
--

CREATE TABLE `tb_questao` (
  `id_questao` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `questao` varchar(255) NOT NULL,
  `imagem_questao` varchar(255) NOT NULL,
  `txt_op1` varchar(255) NOT NULL,
  `txt_op2` varchar(255) NOT NULL,
  `txt_op3` varchar(255) NOT NULL,
  `txt_op4` varchar(255) NOT NULL,
  `op_correto` varchar(255) NOT NULL,
  `verificado` tinyint(1) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_questao`
--

INSERT INTO `tb_questao` (`id_questao`, `id_material`, `questao`, `imagem_questao`, `txt_op1`, `txt_op2`, `txt_op3`, `txt_op4`, `op_correto`, `verificado`, `id_admin`) VALUES
(13, 16, 'Quantos fonemas tem a palavra vermelho.', '537b018ca15fd5e35b675364ba26a202.png', 'Um', 'Quatro', 'Cinco', 'Sete', 'Sete', 1, 1),
(14, 16, 'Quantos fonemas tem a palavra azul.', '35d0b4ecd373bfa3edf062c2d2ec8474.png', 'Dois', 'Quatro', 'Seis', 'Cinco', 'Quatro', 1, 1),
(15, 16, 'Quantos fonemas tem a palavra brilhar.', 'f421e09f71f2543feb9f68928de8597a.png', 'Dois', 'Um', 'Seis', 'Cinco', 'Seis', 1, 1),
(16, 16, 'Quantos fonemas tem a palavra tempo.', '1c4c2ef9e83dffe586089d46acd6e21c.png', 'Quatro  (4)', 'Dois  (2)', 'Seis  (6)', 'Cinco  (5)', 'Quatro  (4)', 1, 1),
(17, 16, 'Quantos fonemas tem a palavra chorei.', 'df7275dea88f2d1b90cc5119a0c46ff2.png', 'Três (3)', 'Cinco  (5)', 'Quatro (4)', 'Dois (2)', 'Cinco  (5)', 1, 1),
(18, 19, 'Quantos vogais tem a palavra banana.', '91d2a6d88220b0a7acbe1f8b7b5c6bac.png', 'Três (3)', 'Dois  (2)', 'Seis  (6)', 'Quatro (4)', 'Três (3)', 1, 1),
(19, 19, 'Quantos vogais tem a palavra bola?', 'b264fe07ad7c8e8c8155df1ea6aebc52.png', 'Dois (2)', 'Cinco  (5)', 'Quatro (4)', 'Sete (7)', 'Dois (2)', 1, 1),
(20, 19, 'Quantos vogais tem a palavra brincar?', '3869ba812ed0fb4a69e18f7dce1e372b.png', 'Três (3)', 'Dois  (2)', 'Seis  (6)', 'Cinco  (5)', 'Dois  (2)', 1, 1),
(21, 19, 'Quantos vogais tem a palavra leitor ?', 'daf0c78b586f0a48a041dacd3c486259.png', 'Um (1)', 'Três (3)', 'Seis  (6)', 'Dois (2)', 'Dois (2)', 1, 1),
(22, 19, 'Quantos vogais tem a palavra uva ?', '3561af947dff481603689885d0443be9.png', 'Três (3)', 'Cinco  (5)', 'Dois (2)', 'Quatro (4)', 'Dois (2)', 0, 1),
(23, 24, 'Quantas laranjas tem na imagem?', '43feff804476a69fccfd38c2e2f8121a.png', '5 (Cinco)', '4 (Quatro)', '3 (Três)', '2 (Dois)', '2 (Dois)', 1, 1),
(25, 24, 'Quantas bolas tem na imagem?', '315fad0287517eba5f2de013cd700b26.png', '5 (Cinco)', '4 (Quatro)', '3 (Três)', '2 (Dois)', '3 (Três)', 1, 1),
(26, 24, 'Quantas morangos tem na imagem?', 'e509f0b8433988e348aaa0b8f32da99f.png', '5 (Cinco)', '4 (Quatro)', '3 (Três)', '2 (Dois)', '4 (Quatro)', 1, 1),
(27, 24, 'Quais os números que faltam na sequencia?', 'cacd800a7d09c346f5a8fb868b259e1e.png', '6 e 7 ', '1 e 2', '4 e 5 ', '2 e 3', '4 e 5 ', 1, 1),
(28, 24, 'Quantas uvas tem na imagem?', 'c3708888c10b769e2ea5a719879665d2.png', '4', '5', '8', '7', '8', 0, 1),
(29, 25, '3+2', '78fc0c027048843a0caeab706ab32822.png', '6 e 7 ', '4 (Quatro)', '3', '7', '4 e 5 ', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_questao_usuario`
--

CREATE TABLE `tb_questao_usuario` (
  `id_questaoU` int(11) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_questao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_questao_usuario`
--

INSERT INTO `tb_questao_usuario` (`id_questaoU`, `resposta`, `id_usuario`, `id_questao`) VALUES
(102, 'Quatro', 1, 13),
(103, 'Quatro', 1, 14),
(104, 'Um', 1, 15),
(105, 'Cinco  (5)', 1, 16),
(106, 'Cinco  (5)', 1, 17),
(107, 'Um', 17, 13),
(108, 'Quatro', 17, 14),
(109, 'Seis', 17, 15),
(110, 'Seis  (6)', 17, 16),
(111, 'Dois (2)', 17, 17),
(112, 'Três (3)', 18, 18),
(113, 'Cinco  (5)', 18, 19),
(114, 'Dois  (2)', 18, 20),
(115, 'Três (3)', 18, 21),
(116, 'Quatro (4)', 18, 22),
(127, 'Quatro', 21, 13),
(128, 'Quatro', 21, 14),
(129, 'Um', 21, 15),
(130, 'Seis  (6)', 21, 16),
(131, 'Três (3)', 21, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome`, `email`, `senha`, `imagem`) VALUES
(1, 'HarryPotter', 'HarryPotter@gmail.com', '25f9e794323b453885f5181f1b624d0b', '27d43f0509cba00e6ce51407066772c2.jpg'),
(13, 'milena', 'milena@gmail.com', 'c6335734dbc0b1ded766421cfc611750', ''),
(14, '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(15, 'abacate', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(16, 'abacate', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(17, 'ana', 'ana@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '263a831b4ffd7c6ed7272097fbedab0b.png'),
(18, 'Milena Michels', 'michels@gmail.com', 'c6335734dbc0b1ded766421cfc611750', ''),
(19, 'Pessoa', 'pessoa@gmail.com', '324fcee994d84d21a49c229c3f68603a', ''),
(20, 'Diogo', 'diogo@gmail.com', '4badaee57fed5610012a296273158f5f', ''),
(21, 'abacate1', 'abacate1@gmail.com', '25f9e794323b453885f5181f1b624d0b', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Índices para tabela `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `ForeignKeyDisciplina` (`id_disciplina`),
  ADD KEY `ForeignKeyNivel` (`id_nivel`);

--
-- Índices para tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Índices para tabela `tb_nivel`
--
ALTER TABLE `tb_nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Índices para tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  ADD PRIMARY KEY (`id_questao`),
  ADD KEY `foreing_usuario` (`id_admin`);

--
-- Índices para tabela `tb_questao_usuario`
--
ALTER TABLE `tb_questao_usuario`
  ADD PRIMARY KEY (`id_questaoU`),
  ADD KEY `FKquestao` (`id_questao`),
  ADD KEY `FKusario` (`id_usuario`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_disciplina`
--
ALTER TABLE `tb_disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de tabela `tb_mensagem`
--
ALTER TABLE `tb_mensagem`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_nivel`
--
ALTER TABLE `tb_nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_questao`
--
ALTER TABLE `tb_questao`
  MODIFY `id_questao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_questao_usuario`
--
ALTER TABLE `tb_questao_usuario`
  MODIFY `id_questaoU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_material`
--
ALTER TABLE `tb_material`
  ADD CONSTRAINT `ForeignKeyDisciplina` FOREIGN KEY (`id_disciplina`) REFERENCES `tb_disciplina` (`id_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ForeignKeyNivel` FOREIGN KEY (`id_nivel`) REFERENCES `tb_nivel` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_questao_usuario`
--
ALTER TABLE `tb_questao_usuario`
  ADD CONSTRAINT `FKquestao` FOREIGN KEY (`id_questao`) REFERENCES `tb_questao` (`id_questao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKusario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
