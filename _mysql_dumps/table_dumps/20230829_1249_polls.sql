-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Aug 29, 2023 at 11:48 AM
-- Server version: 8.0.33
-- PHP Version: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `singleton` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `singleton`) VALUES
(1, 'Orçamento Participativo \'2023', 'O Orçamento Participativo é um mecanismo de democracia participada e participativa que permite aos cidadãos ter o poder de decisão direta sobre a utilização de dinheiros públicos na promoção das políticas públicas.\r\n\r\nOs objetivos do Orçamento Participativo do Município da Nazaré são:\r\n- Incentivar o diálogo entre eleitos/as, técnicos/as municipais, cidadãos/ãs e o seu Concelho; Contribuir para a educação cívica, permitindo às/aos cidadãos/ãs aliar as suas preocupações pessoais ao bem comum;\r\n- Aumentar a transparência da atividade da autarquia e o nível de responsabilização dos/as eleitos/as e da estrutura municipal;\r\n- Ser mais transversal e inclusivo nas suas diversas vertentes, de forma a captar a participação de grupos de população tradicionalmente mais afastados deste tipo de processos de cidadania ativa, nomeadamente, jovens, seniores e migrantes;\r\n- Aprofundar e desenvolver a intervenção da Câmara Municipal da Nazaré juntos dos/as cidadãos/ãs, designadamente em articulação com as Juntas de Freguesia.', 'active', '2023-08-29 09:17:53', '2023-08-29 11:26:25', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `polls_singleton_unique` (`singleton`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
