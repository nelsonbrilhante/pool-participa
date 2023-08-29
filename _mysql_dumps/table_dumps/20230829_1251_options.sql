-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Aug 29, 2023 at 11:51 AM
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
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint UNSIGNED NOT NULL,
  `poll_id` bigint UNSIGNED NOT NULL,
  `project_number` bigint UNSIGNED NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `vote_count` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `poll_id`, `project_number`, `owner`, `theme`, `description`, `amount`, `vote_count`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Andreia Catarina Martins Neto', 'Centro de Artes de Amor', 'Recuperação da antiga casa do \"enfermeiro Serra\", reconversão do edifício principal em espaço amplo onde se possam apresentar eventos culturais (exposições, apresentações de livros, demostrações de dança, concertos intimistas, Workshops e aulas comunitárias). Criação de casas de banho publicas (preparadas para pessoas com mobilidade reduzida). Criação de acessos ao edifício principal para pessoas com mobilidade reduzida. Adaptação do antigo lagar e anexos da casa para instalação de museu ou biblioteca.', '208999.68', 0, '2023-08-29 09:18:07', '2023-08-29 11:28:43'),
(2, 1, 2, 'Miguel Xavier Rodrigues', 'Espaços desportivos Urbanização Vale de Lobo', 'Requalificação dos campos desportivos. Para o campo superior, alteração do piso e das balizas. Colocação de barreiras de proteção na parte superior da bancada. Requalificação do espaço envolvente (pintar paredes). Para o campo inferior, colocação de um campo de ténis. Colocação de uma rede protetora à volta do campo. Recuperação do espaço envolvente (pintar paredes).', '120000.00', 0, '2023-08-29 09:18:22', '2023-08-29 11:29:39'),
(3, 1, 3, 'Joana Rita Roque Fernandes', 'Pequenos Grandes Embaixadores', 'Com este projeto, através do desenvolvimento de jogos didáticos e lúdicos, pretendo transmitir o sentimento de pertença às crianças que frequentam as instituições de ensino do território da União das Freguesias, assim como despertar nelas a curiosidade pela sua terra e pelas suas origens.\r\nFazer com que se sintam integradas e informadas e que adquiram orgulho e sentimento de identidade pela sua terra e pelas suas gentes.\r\nEste é um projeto que vem, de alguma forma, desafiar as crianças a conhecerem melhor aquilo que lhes pertence, as suas histórias, lendas, tradições e património, proporcionando momentos de partilha e fortalecendo os laços familiares e da amizade, bem como promover a aproximação com as gerações mais velhas, o entusiasmo em aprender e o seu sucesso escolar, de forma a se tornarem embaixadores do futuro da sua terra', '10885.50', 0, '2023-08-29 11:31:12', '2023-08-29 11:31:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_project_number_unique` (`project_number`),
  ADD KEY `options_poll_id_foreign` (`poll_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
