-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 06:38 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broteronews`
--
DROP DATABASE IF EXISTS `broteronews`;

CREATE DATABASE IF NOT EXISTS `broteronews` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `broteronews`;

-- --------------------------------------------------------

--
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `acesso` varchar(50) NOT NULL,
  `l_acesso` varchar(50) NOT NULL,
  `color` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acesso`
--

INSERT INTO `acesso` (`id`, `acesso`, `l_acesso`, `color`) VALUES
(1, 'Membro', 'Membro', 'blue'),
(2, 'Editor', 'Editor', 'green'),
(3, 'Admin', 'Administrador', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Esab'),
(2, 'Futebol');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `sku` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `mensagem` text NOT NULL,
  `Confirmed` varchar(20) NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`sku`, `id`, `user`, `mensagem`, `Confirmed`) VALUES
(4, 1, 'manito', 'testing this so', 'No'),
(5, 2, 'manito', 'O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text,
  `desshort` varchar(45) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `autor` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `s_noticia` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descricao`, `desshort`, `categoria`, `imagem`, `autor`, `data`, `s_noticia`) VALUES
(1, 'Cristiano Ronaldo Eleito Melhor do Mundo Pela FiFa', '', '', '', 'assets/img/thebest.jpg', 'manito', '2017-02-17', 1),
(2, 'adasdas', '<p>dasdasdasda</p>', 'sdasdasdasdasdas', '', 'assets/img/636019280413876055163786416_Anon .jpg', 'manito', '2017-02-17', 0),
(3, 'Manitoooooo', '<p>dasdasdasda</p>', 'sdasdasdasdasdas', '', 'assets/img/678317.jpg', 'manito', '2017-02-17', 0),
(4, 'Manitoooooo esteve aqui na area', '<p>dasdasdasda</p>', 'sdasdasdasdasdas', '', 'assets/img/03102002176104.jpg', 'manito', '2017-02-17', 1),
(10, 'asdas', '<p>asdasda</p>', 'asdasda', '', 'assets/img/win98logo.png', 'manito', '2017-02-17', 0),
(14, 'Magusto na nossa escola', '<p>No dia 11 de novembro, comemorou-se na nossa escola com muita alegria, o dia de S. Martinho. Na aula de Expressão Dramática, fize- ram-se cartuchos com folhas de jornal carimbados com formas de castanhas e um cartaz com provérbios alusivos aoDia Logo de manhã, cortaram-se as castanhas. que aguardavam a hora certa de serem colocadas no assador. Entretanto, colocou-se o cartaz no átrio da Escola e embelezou-se o espaço envolvente com ouriços das castanhas, cestos com os cartuchos preparados para as castanhas quentinhas, folhas e ramos secos de árvores e sobretudo, como entusiasmo de todos. Fez-se a fogueira com caruma e carvão e, a já tudo pronto, colocaram-se as castanhas, sal e o cheirinho começou a pairar no ar e as castanhas começaram a estalar! Foi com grande satisfação que se fez uma roda à volta do assador e se degustaram as primeiras castanhas quentinhas. &nbsp;<br></p>', 'No dia 11 de novembro, comemorou-se o dia de ', '', 'assets/img/magusto.PNG', 'manito', '0000-00-00', 0),
(15, 'asassasa', '<p>asasasassa</p>', 'saasasassa', '', 'assets/img/Capturar2.PNG', 'manito', '0000-00-00', 0),
(16, 'TESTE DATE', '<p>TESTE DATATATA</p>', 'TESTE DATA', '', 'assets/img/cidz5pvwcaa3xw9.jpg', 'manito', '2017-02-23', 0),
(13, 'Robótica: equipas da Brotero em 2º e 4º lugar', '<p>O concurso de robótica BotOlympics, organizado pelo Clube de Robótica da Universidade de Coimbra, decorreu nos dias 17, 18, 19 e 22 de Fevereiro de 2017, no Departamento de Engenharia Electrotécnica e de Computadores da Faculdade de Ciências e Tecnologia da Universidade de Coimbra. A Brotero, através do Clube PRODE, participou com duas equipas no torneio para alunos do ensino secundário, entre um conjunto de equipas de outras escolas de Coimbra, Condeixa-a-Nova e Figueira da Foz. A equipa PRODE A, constituída pelos alunos do 12º ano, João Pedro da Fonseca Santiago, Leandro Gabriel Marques Correia, Mariana Alexandra Sanches Ferreira e Nuno André da Silva Marques, obteve o 2º lugar. A equipa PRODE One, constituída pelos alunos do 12º ano, Carolina Inês Marques, José Pedro Tomás Lopes, Pedro Vicente Monteiro Serrano, e pelo aluno do 10º ano, Samuel dos Santos Carinhas, estabeleceu-se em 4º lugar. O 1º lugar foi alcançado por uma equipa da Escola Secundária José Falcão e o 3º lugar por uma equipa do Agrupamento de Escolas de Condeixa-a-Nova. Todos os alunos da Brotero estão de parabéns, não só pelos resultados alcançados, mas principalmente pelo empenho demonstrado, pelo espírito de grupo e até pela generosidade demonstrada ao apoiar outras equipas.<br></p>', 'A Brotero, através do Clube PRODE, participou', '', 'assets/img/Capturar444.PNG', 'manito', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `previlegios` int(11) NOT NULL DEFAULT '1',
  `img` text NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `nascimento` date NOT NULL,
  `since` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `visibility` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `nome`, `previlegios`, `img`, `sexo`, `nascimento`, `since`, `estado`, `visibility`) VALUES
(1, 'manito', 'mtjmt2@hotmail.com', '15c00bd44df43821911916e60a7f16010b7ee679', 'Tiago Ramos', 3, 'assets/img-perfil/399445caracal.jpg', 'masculino', '1998-05-25', '2016-04-25', 1, 1),
(2, 'Alex', 'agcseabra@gmail.com', '15c00bd44df43821911916e60a7f16010b7ee679', 'Alexandre Seabra', 2, '', 'masculino', '0000-00-00', '0000-00-00', 1, 1),
(4, 'ricardotesting', 'teste@manito.com', '53c32627c12fb8cb235ffb488c8d9ead5fce9fb0', 'Ricardo', 1, 'assets/img-perfil/2091065caracal.jpg', 'masculino', '0000-00-00', '0000-00-00', 1, 1),
(5, 'justtt', 'just@hotmail.com', '448aefb2982836057072a84a163833d14d598dd5', 'heybroo', 1, '', 'masculino', '0000-00-00', '0000-00-00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria` (`categoria`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
