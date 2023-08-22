-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql_db
-- Generation Time: Aug 22, 2023 at 11:02 AM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_17_103622_create_voters_table', 1),
(6, '2023_08_17_103650_create_polls_table', 1),
(7, '2023_08_17_103656_create_options_table', 1),
(8, '2023_08_17_103701_create_votes_table', 1),
(9, '2023_08_17_111922_add_is_admin_to_users_table', 1),
(10, '2023_08_18_114316_update_polls_table', 2),
(11, '2023_08_22_093232_add_timestamps_to_votes_table', 3);

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
(1, 1, 1, 'Rui Filipe Custódio Maurício', 'Mural 360º', 'propoe a pintura de um mural no dep6sito de agua do Sitio da Nazare alusivo aos grandes momentos da hist6ria da Nazare. Destaca tres momentos distintos que devem ser elencados no mural: em primeiro a Nazare como centro de peregrina9ao (Milagre de Nossa Senhora da Nazare e centro religioso), em segundo a Nazare ser a mais tipica praia portuguesa (7 saias e arte xavega) e, por ultimo, a referencia as ondas gigantes. A pintura do dep6sito de agua, visive! a qui16metros de distancia, constituiu um ato de reabilita9ao de um equipamento local publico, cuja a degrada9ao e crescente e visive! conseguindo, ap6s a interven9ao, potenciar o equipamento para uma marca de promocional do concelho.', '15000.00', 0, '2023-08-21 11:40:09', '2023-08-22 09:33:48'),
(2, 1, 2, 'Iuri Fidalgo Macatrao Bem', 'Requalificação do Espaço Exterior da Escola Profissional da Nazaré', 'Consiste na melhoria do espaço exterior do edificio da antiga escola primaria n.0 2 da Nazare, localizada na Avenida Circular Norte, que e, atualmente, um polo da Escola Profissional da Nazare (EPN). Na descri9ao da proposta consta que seja substituida a ilumina9ao existente por lampadas LED (ou semelhantes), que os caixotes do lixo fossem substituidos por ecopontos tomando o mais espa90 mais sustentavel e amigo do ambiente, a coloca9ao de um telheiro ( ou algo \nsemelhante) entre edificios para que fosse passive] os alunos transitarem sem apanharem chuva e, par ultimo, a coloca9ao de material desportivo no espa90 exterior (balizas, cestos \nde basquete e parede de escalada) na parte de tras do edificio.  ', '15000.00', 0, '2023-08-21 11:41:51', '2023-08-21 11:41:51'),
(3, 1, 3, 'Ricardo Jorge Almeida Rebelo', 'Equipamentos de prote9ao individual para Bombeiros', 'aquisi9ao de 20 fatos completos de prote9ao individual para interven9ao em incendios urbanos, estruturais e acidentes rodoviarios. Na proposta e referido que, a data, os equipamentos que a Associac;ao Humanitaria Bombeiros Voluntarios da Nazare detem nao estao em condic;5es de uso e, com isso, nao serem capazes de assegurar a seguranc;a de cada \noperacional envolvidos nas mais variadas a9oes de socorro.', '15000.00', 0, '2023-08-22 08:52:26', '2023-08-22 08:52:26'),
(4, 1, 4, 'Joaquim Paulo Vidinha Anastacio', 'Edição do Livro: 100 anos de histórias a preto e branco', 'Garantir a edição do referido livro, com data de publica9ao prevista para 3 de setembro de 2023, precisamente um ano antes do centenario do clube. 0 livro, justificado pelo centenario do clube, encontra-se ja em fase de produ9ao e tera entre 180 a 200 paginas e sera apresentado como edi9ao de autor. 0 livro contem, sobretudo, historias e episodios pitorescos, dados estatisticos e relatos de alguns dos momentos mais importantes da historia de um clube-fundador da Associa9ao de Futebol de Leiria e que representa o concelho e o distrito e os valores do desporto.', '7500.00', 0, '2023-08-22 08:55:44', '2023-08-22 10:11:21'),
(5, 1, 5, 'Cristina Alexandra Periquito Duarte', 'Contrução de Circuito de Manutenção Fisica e de Lazer na Natureza', 'criac;ao de uma zona de desportiva/lazer, da qual toda a comunidade local possa usufruir, aproveitando todas as infraestruturas criadas para o efeito. A zona escolhida para a implementac;ao deste projeto foi selecionada tendo em conta os criterios de proximidade a zonas verdes e ao Centro Escolar da Nazare, permitindo, assim, uma melhor otimizac;ao das infraestruturas. Sendo assim, foi definido como possivel local de implementa9ao, a zona verde nas traseiras do Lote 2 a 13 do Loteamento n.0 5/2000 de 28 de agosto de 2000, cedida a Camara Municipal da Nazare para integra9ao no dominio publico. Numa fase inicial, pretende-se a criac;ao de um circuito desportivo acompanhado de zonas de lazer, que possa ser utilizado por crian9as e adultos. Este devera ser construido com materiais reciclaveis, preservando, assim, o meio ambiente. Para a implementa<;ao do mesmo e necessaria a colabora9ao da Camara Municipal da Nazare atraves da c construc;ao do mesmo e da aquisi<;ao dos materiais.', '0.00', 1, '2023-08-22 08:57:49', '2023-08-22 10:18:58'),
(6, 1, 6, 'Ana Filipa Antunes Ganilho', 'Parque Infantil na Antiga Escola Primaria', 'Consiste na cria<;lio de um Parque Infantil na antiga Escola Primaria do Valado dos Frades (na zona frente do edificio, onde ja existe uma zona de exercicio). No documento consta que, e tendo em considerac;ao que o unico parque infantil do Valado se situa bastante longe do centro da vila, seria muito importante a criac;ao de um novo, no corac;ao da nossa terra.', '0.00', 0, '2023-08-22 08:59:10', '2023-08-22 09:35:00'),
(7, 1, 7, 'Rui Manuel Fragoeiro Tavares', 'Arranjo do Telhado do Clube Recreativo Beneficente Valadense', 'Refere que o telhado, atualmente, encontra-se com infiltrac;oes e e feito de fibrocimento, indicando, ainda, que chove dentro da sala de espetaculos e que, com isso, ira estragar o chao.', '0.00', 0, '2023-08-22 09:00:02', '2023-08-22 09:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Orçamento Participativo \'2023', 'O Orçamento Participativo é um mecanismo de democracia participada e participativa que permite aos cidadãos ter o poder de decisão direta sobre a utilização de dinheiros públicos na promoção das políticas públicas.', 'active', '2023-08-18 13:55:08', '2023-08-18 14:09:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'zumuha', 'zumuha@gmail.com', NULL, '$2y$10$k9tC1AW0btHyUZHQNq.esu/k8Mli1ZppzyV6hLNnS6ckpkE73sCn.', NULL, '2023-08-18 11:08:14', '2023-08-18 11:08:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` bigint UNSIGNED NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_voted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `id_number`, `name`, `table`, `has_voted`, `created_at`, `updated_at`) VALUES
(1, '11299253', 'NELSON', 'S', 1, NULL, '2023-08-22 10:18:58'),
(2, '12345678', 'MIRIAM', 'S', 0, NULL, '2023-08-22 09:33:48'),
(3, '87654321', 'ALEXANDRE', 'S', 0, NULL, '2023-08-22 10:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint UNSIGNED NOT NULL,
  `poll_id` bigint UNSIGNED NOT NULL,
  `voted_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `poll_id`, `voted_at`, `created_at`, `updated_at`) VALUES
(5, 1, '2023-08-22 10:18:58', '2023-08-22 10:18:58', '2023-08-22 10:18:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_project_number_unique` (`project_number`),
  ADD KEY `options_poll_id_foreign` (`poll_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `polls_singleton_unique` (`singleton`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voters_id_number_unique` (`id_number`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_poll_id_foreign` (`poll_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
