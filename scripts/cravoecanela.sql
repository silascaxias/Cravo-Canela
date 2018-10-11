-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Set-2018 às 06:08
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cravoecanela`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_couple`
--

CREATE TABLE `tb_couple` (
  `couple_id` int(11) NOT NULL,
  `couple_nome` varchar(50) NOT NULL,
  `couple_tell` bigint(14) NOT NULL,
  `couple_email` varchar(50) NOT NULL,
  `couple_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_couple`
--

INSERT INTO `tb_couple` (`couple_id`, `couple_nome`, `couple_tell`, `couple_email`, `couple_date`) VALUES
(3, 'Robert e Gabriele', 19991210699, 'robert.conchal@gmail.com', '2018-09-10 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_couple_files`
--

CREATE TABLE `tb_couple_files` (
  `couple_File_Id` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `File_nome` varchar(200) NOT NULL,
  `Couple_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_couple_files`
--

INSERT INTO `tb_couple_files` (`couple_File_Id`, `Titulo`, `File_nome`, `Couple_Id`) VALUES
(17, 'Imagem inserida pelo Relator', '5b91c4d4b73e2.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lista`
--

CREATE TABLE `tb_lista` (
  `id_tb_lista` int(11) NOT NULL,
  `couple_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_lista`
--

INSERT INTO `tb_lista` (`id_tb_lista`, `couple_id`) VALUES
(1, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lista_produto`
--

CREATE TABLE `tb_lista_produto` (
  `id_lista` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `descript_product` varchar(100) NOT NULL,
  `price_product` double(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `descript_product`, `price_product`) VALUES
(30, 'Microondaas', 9.99),
(33, ' tv', 9.99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_product_files`
--

CREATE TABLE `tb_product_files` (
  `product_File_Id` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `File_nome` varchar(200) NOT NULL,
  `product_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_product_files`
--

INSERT INTO `tb_product_files` (`product_File_Id`, `Titulo`, `File_nome`, `product_Id`) VALUES
(21, 'Imagem inserida pelo Relator', '5b91c4de5a6fc.jpg', 30),
(24, 'Imagem inserida pelo Relator', '5b933ad64f124.jpg', 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_profiles`
--

CREATE TABLE `tb_profiles` (
  `Profile_Id` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_profiles`
--

INSERT INTO `tb_profiles` (`Profile_Id`, `Description`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `User_Id` int(11) NOT NULL,
  `user_nome` varchar(45) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(80) CHARACTER SET utf8 NOT NULL,
  `user_senha` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Profile_Id` int(11) NOT NULL,
  `Last_Activity` datetime DEFAULT NULL,
  `Session` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`User_Id`, `user_nome`, `user_email`, `user_senha`, `Profile_Id`, `Last_Activity`, `Session`) VALUES
(51, 'robert', 'robert.conchal@gmail.com', '$2a$08$2sGQinTFe3GF/YqAYQ66auL9o6HeFCQryHdqUDvuEVN0J1vdhimii', 1, '2018-09-08 00:55:54', 'q8q9oknli1b9jgqlbale6224nb'),
(63, 'admin', 'admin@admin.com', '$2a$08$tvNQwKfm68dx6sLh/Qsz5eAOfgvdCS65lkhZ5CoE1tHItc3o7cINq', 1, '2018-09-06 19:13:06', 'ph189pb5bjfqi3jsojquinh3t8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user_files`
--

CREATE TABLE `tb_user_files` (
  `User_File_Id` int(11) NOT NULL,
  `Titulo` varchar(45) NOT NULL,
  `File_nome` varchar(200) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_user_files`
--

INSERT INTO `tb_user_files` (`User_File_Id`, `Titulo`, `File_nome`, `User_Id`) VALUES
(7, 'Imagem inserida pelo Relator', '5b8f165044593.jpg', 63);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_couple`
--
ALTER TABLE `tb_couple`
  ADD PRIMARY KEY (`couple_id`);

--
-- Indexes for table `tb_couple_files`
--
ALTER TABLE `tb_couple_files`
  ADD PRIMARY KEY (`couple_File_Id`),
  ADD KEY `fk_couple_file` (`Couple_Id`);

--
-- Indexes for table `tb_lista`
--
ALTER TABLE `tb_lista`
  ADD PRIMARY KEY (`id_tb_lista`),
  ADD KEY `fk_couple` (`couple_id`);

--
-- Indexes for table `tb_lista_produto`
--
ALTER TABLE `tb_lista_produto`
  ADD KEY `fk_lista` (`id_lista`),
  ADD KEY `fk_produto` (`id_produto`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_product_files`
--
ALTER TABLE `tb_product_files`
  ADD PRIMARY KEY (`product_File_Id`),
  ADD KEY `fk_product_file` (`product_Id`);

--
-- Indexes for table `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD PRIMARY KEY (`Profile_Id`),
  ADD UNIQUE KEY `Description_UNIQUE` (`Description`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `FK_TB_USER_TB_PROFILES_idx` (`Profile_Id`);

--
-- Indexes for table `tb_user_files`
--
ALTER TABLE `tb_user_files`
  ADD PRIMARY KEY (`User_File_Id`),
  ADD KEY `fk_user_file` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_couple`
--
ALTER TABLE `tb_couple`
  MODIFY `couple_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_couple_files`
--
ALTER TABLE `tb_couple_files`
  MODIFY `couple_File_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_lista`
--
ALTER TABLE `tb_lista`
  MODIFY `id_tb_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_product_files`
--
ALTER TABLE `tb_product_files`
  MODIFY `product_File_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_profiles`
--
ALTER TABLE `tb_profiles`
  MODIFY `Profile_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_user_files`
--
ALTER TABLE `tb_user_files`
  MODIFY `User_File_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_couple_files`
--
ALTER TABLE `tb_couple_files`
  ADD CONSTRAINT `fk_couple_file` FOREIGN KEY (`Couple_Id`) REFERENCES `tb_couple` (`couple_id`);

--
-- Limitadores para a tabela `tb_lista`
--
ALTER TABLE `tb_lista`
  ADD CONSTRAINT `fk_couple` FOREIGN KEY (`couple_id`) REFERENCES `tb_couple` (`couple_id`);

--
-- Limitadores para a tabela `tb_lista_produto`
--
ALTER TABLE `tb_lista_produto`
  ADD CONSTRAINT `fk_lista` FOREIGN KEY (`id_lista`) REFERENCES `tb_lista` (`id_tb_lista`),
  ADD CONSTRAINT `fk_produto` FOREIGN KEY (`id_produto`) REFERENCES `tb_product` (`id_product`);

--
-- Limitadores para a tabela `tb_product_files`
--
ALTER TABLE `tb_product_files`
  ADD CONSTRAINT `fk_product_file` FOREIGN KEY (`product_Id`) REFERENCES `tb_product` (`id_product`);

--
-- Limitadores para a tabela `tb_user_files`
--
ALTER TABLE `tb_user_files`
  ADD CONSTRAINT `fk_user_file` FOREIGN KEY (`User_Id`) REFERENCES `tb_user` (`User_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
