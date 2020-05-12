-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.0.19 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for schoolauto
CREATE DATABASE IF NOT EXISTS `schoolauto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `schoolauto`;

-- Dumping structure for table schoolauto.categoriaproduto
CREATE TABLE IF NOT EXISTS `categoriaproduto` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.categoriaproduto: ~3 rows (approximately)
/*!40000 ALTER TABLE `categoriaproduto` DISABLE KEYS */;
INSERT INTO `categoriaproduto` (`idCategoria`, `nomeCategoria`) VALUES
	(1, 'Bar'),
	(5, '---'),
	(6, 'Senhas');
/*!40000 ALTER TABLE `categoriaproduto` ENABLE KEYS */;

-- Dumping structure for table schoolauto.consumorefeicao
CREATE TABLE IF NOT EXISTS `consumorefeicao` (
  `idConsumo` int NOT NULL AUTO_INCREMENT,
  `numProcesso` int unsigned NOT NULL,
  `dataConsumo` timestamp NULL DEFAULT NULL,
  `dataSenha` datetime NOT NULL,
  PRIMARY KEY (`idConsumo`),
  KEY `Consumo_Utilizador` (`numProcesso`),
  CONSTRAINT `Consumo_Utilizador` FOREIGN KEY (`numProcesso`) REFERENCES `users` (`numProcesso`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.consumorefeicao: ~8 rows (approximately)
/*!40000 ALTER TABLE `consumorefeicao` DISABLE KEYS */;
INSERT INTO `consumorefeicao` (`idConsumo`, `numProcesso`, `dataConsumo`, `dataSenha`) VALUES
	(142, 20202, NULL, '2020-05-13 00:00:00'),
	(143, 20202, NULL, '2020-05-14 00:00:00'),
	(144, 20202, NULL, '2020-05-15 00:00:00'),
	(145, 20202, NULL, '2020-05-18 00:00:00'),
	(146, 20202, NULL, '2020-05-19 00:00:00'),
	(147, 20202, NULL, '2020-05-20 00:00:00'),
	(148, 20202, NULL, '2020-05-21 00:00:00');
/*!40000 ALTER TABLE `consumorefeicao` ENABLE KEYS */;

-- Dumping structure for table schoolauto.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table schoolauto.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table schoolauto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table schoolauto.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_06_145500_autenticacao', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table schoolauto.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `numProcesso` int unsigned NOT NULL DEFAULT '9999999',
  `tipoNotificacao` int DEFAULT NULL,
  `visibilidade` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `notification_user` (`numProcesso`),
  CONSTRAINT `notification_user` FOREIGN KEY (`numProcesso`) REFERENCES `users` (`numProcesso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table schoolauto.notification: ~3 rows (approximately)
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`id`, `content`, `date`, `numProcesso`, `tipoNotificacao`, `visibilidade`) VALUES
	(1, 'Isto é um exemplo de sugestão', '2020-05-12', 21234569, 1, 1),
	(5, ' Isto é um aviso', '2020-05-12', 20202, 2, 1),
	(6, 'Isto é um erro ', '2020-05-12', 20202, 3, 1),
	(7, 'O numero de cartão 5 não está associado a nenhum utilizador!', NULL, 9999999, 4, 1),
	(8, 'O numero de cartão 214514 não está associado a nenhum utilizador!', NULL, 9999999, 4, 1),
	(9, ' asdjkhadsfjkhadjfbhjdfbadsfdsfdsffddsfjsadhjfhdsajhjhjkkjhd', NULL, 20202, 1, 1),
	(10, 'O numero de cartão 0002723976 não está associado a nenhum utilizador!', NULL, 9999999, 4, 1);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;

-- Dumping structure for table schoolauto.operacao
CREATE TABLE IF NOT EXISTS `operacao` (
  `idOperacao` int NOT NULL AUTO_INCREMENT,
  `valorOperacao` decimal(65,2) NOT NULL DEFAULT '0.00',
  `dataOperacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quantidade` int NOT NULL DEFAULT '1',
  `nomeOperacao` varchar(50) NOT NULL DEFAULT '0',
  `idProduto` int NOT NULL DEFAULT '0',
  `idUtilizador` bigint unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idOperacao`),
  KEY `operacao_produto` (`idProduto`),
  KEY `idUtilizador` (`idUtilizador`),
  CONSTRAINT `operacao_produto` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`id`),
  CONSTRAINT `utilizador_operacao` FOREIGN KEY (`idUtilizador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.operacao: ~22 rows (approximately)
/*!40000 ALTER TABLE `operacao` DISABLE KEYS */;
INSERT INTO `operacao` (`idOperacao`, `valorOperacao`, `dataOperacao`, `quantidade`, `nomeOperacao`, `idProduto`, `idUtilizador`) VALUES
	(1, 20000.00, '2020-05-06 14:07:28', 1, 'Carregamento', 12, 10),
	(12, -43.60, '2020-05-06 14:01:08', 1, 'Compra', 9, 10),
	(13, -38.11, '2020-05-06 14:01:08', 1, 'Compra', 1, 10),
	(14, -43.60, '2020-05-06 14:02:41', 1, 'Compra', 9, 10),
	(15, -38.11, '2020-05-06 14:02:41', 1, 'Compra', 1, 10),
	(16, -140.44, '2020-05-06 14:02:41', 2, 'Compra', 2, 10),
	(17, -95.61, '2020-05-06 14:02:41', 1, 'Compra', 3, 10),
	(18, -56.61, '2020-05-06 14:02:41', 1, 'Compra', 7, 10),
	(19, -43.71, '2020-05-06 14:02:41', 1, 'Compra', 16, 10),
	(20, -155.78, '2020-05-06 14:04:49', 2, 'Compra', 11, 10),
	(21, -87.42, '2020-05-06 14:04:49', 2, 'Compra', 16, 10),
	(22, -169.10, '2020-05-06 14:04:49', 2, 'Compra', 10, 10),
	(23, -131.20, '2020-05-06 14:04:49', 2, 'Compra', 17, 10),
	(24, -113.22, '2020-05-06 14:04:49', 2, 'Compra', 7, 10),
	(25, 0.00, '2020-05-06 14:05:30', 5, 'Compra', 1, 10),
	(27, -2.50, '2020-05-06 22:29:12', 1, 'Compra de senha', 101, 10),
	(28, -2.50, '2020-05-06 22:29:12', 1, 'Compra de senha', 101, 10),
	(29, -2.50, '2020-05-06 22:29:12', 1, 'Compra de senha', 101, 10),
	(30, -2.50, '2020-05-06 22:29:12', 1, 'Compra de senha', 101, 10),
	(31, -2.50, '2020-05-06 22:29:12', 1, 'Compra de senha', 101, 10),
	(32, -2.50, '2020-05-06 22:29:12', 1, 'Compra de senha', 101, 10),
	(33, -2.50, '2020-05-06 22:29:12', 1, 'Compra de senha', 101, 10),
	(34, -2.50, '2020-05-07 17:14:12', 1, 'Compra de senha', 101, 10),
	(35, -2.50, '2020-05-08 13:33:10', 1, 'Compra de senha', 101, 10),
	(36, -2.50, '2020-05-12 14:55:57', 1, 'Compra de senha', 101, 10),
	(37, -2.50, '2020-05-12 14:55:57', 1, 'Compra de senha', 101, 10),
	(38, -2.50, '2020-05-12 14:55:57', 1, 'Compra de senha', 101, 10),
	(39, -2.50, '2020-05-12 14:55:57', 1, 'Compra de senha', 101, 10),
	(40, -2.50, '2020-05-12 14:55:57', 1, 'Compra de senha', 101, 10),
	(41, -2.50, '2020-05-12 14:55:57', 1, 'Compra de senha', 101, 10),
	(42, -2.50, '2020-05-12 14:55:57', 1, 'Compra de senha', 101, 10);
/*!40000 ALTER TABLE `operacao` ENABLE KEYS */;

-- Dumping structure for table schoolauto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table schoolauto.password_resets: ~2 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('catarina.lucas@etpsico.pt', '$2y$10$hlAUfjntDHorUVZ/H9b/9u0whZXIZxax7iZkuxJqqmKGsyXm0lx/C', '2020-01-17 17:26:20'),
	('17gpsi7@etpsico.pt', '$2y$10$1kw2SXmpJVtoowNQZYNP..7IVVuVLJZ4jvotBHAlx.x3y2YiWVhGi', '2020-02-06 19:59:01');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table schoolauto.permission
CREATE TABLE IF NOT EXISTS `permission` (
  `ID` bigint NOT NULL AUTO_INCREMENT,
  `idUser` bigint unsigned NOT NULL,
  `Admin` int DEFAULT NULL,
  `SAE` int DEFAULT NULL,
  `AcessoBar` int DEFAULT NULL,
  `AcessoCantina` int DEFAULT NULL,
  `AcessoBiblioteca` int DEFAULT NULL,
  `AcessoPortaria` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_permission` (`idUser`),
  CONSTRAINT `user_permission` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.permission: ~1 rows (approximately)
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`ID`, `idUser`, `Admin`, `SAE`, `AcessoBar`, `AcessoCantina`, `AcessoBiblioteca`, `AcessoPortaria`) VALUES
	(1, 10, 1, 1, 1, 1, 1, 1),
	(2, 7, 0, 0, 1, 0, 0, 0),
	(3, 100000, 0, 0, 0, 0, 0, 1),
	(4, 100003, 0, 0, 0, 1, 0, 0);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;

-- Dumping structure for table schoolauto.portaria
CREATE TABLE IF NOT EXISTS `portaria` (
  `idRegisto` bigint NOT NULL AUTO_INCREMENT,
  `numCartao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` int NOT NULL,
  PRIMARY KEY (`idRegisto`),
  KEY `numCartao` (`numCartao`),
  CONSTRAINT `portaria_ibfk_1` FOREIGN KEY (`numCartao`) REFERENCES `users` (`numCartao`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.portaria: ~8 rows (approximately)
/*!40000 ALTER TABLE `portaria` DISABLE KEYS */;
INSERT INTO `portaria` (`idRegisto`, `numCartao`, `time`, `valor`) VALUES
	(1, '2', '2020-05-10 01:31:16', 1),
	(2, '2', '2020-05-10 01:31:45', 2),
	(3, '2', '2020-05-10 01:31:55', 2),
	(4, '2', '2020-05-10 01:32:01', 2),
	(5, '2', '2020-05-10 01:37:10', 1),
	(6, '2', '2020-05-10 01:37:16', 2),
	(7, '2', '2020-05-10 01:37:28', 1),
	(9, '2', '2020-05-11 16:24:40', 2);
/*!40000 ALTER TABLE `portaria` ENABLE KEYS */;

-- Dumping structure for table schoolauto.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(50) DEFAULT NULL,
  `precoProduto` decimal(4,2) DEFAULT NULL,
  `ordem` decimal(4,2) DEFAULT NULL,
  `idCategoria` int DEFAULT NULL,
  `visibilidade` int DEFAULT NULL,
  `Nopagina` int DEFAULT NULL,
  `VezesVendido` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_categoria` (`idCategoria`),
  CONSTRAINT `produto_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoriaproduto` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.produtos: ~17 rows (approximately)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nomeProduto`, `precoProduto`, `ordem`, `idCategoria`, `visibilidade`, `Nopagina`, `VezesVendido`) VALUES
	(1, 'nulla', 0.00, 77.00, 1, 1, 6, 62),
	(2, 'tortor', 70.22, 54.00, 1, 1, 9, 26),
	(3, 'sit', 95.61, 66.00, 1, 1, 11, 63),
	(4, 'adipiscing', 33.84, 82.00, 1, 1, 10, 75),
	(5, 'integer', 37.14, 79.00, 1, 1, 10, 41),
	(6, 'dapibus', 54.83, 65.00, 1, 1, 6, 10),
	(7, 'nibh', 56.61, 78.00, 1, 1, 9, 25),
	(8, 'justo', 53.28, 59.00, 1, 1, 5, 94),
	(9, 'lectus', 43.60, 54.00, 1, 1, 8, 102),
	(10, 'diam', 84.55, 24.00, 1, 1, 7, 53),
	(11, 'rhoncus', 77.89, 50.00, 1, 1, 7, 83),
	(12, 'metus', 29.01, 52.00, 1, 1, 5, 82),
	(13, 'mi', 18.49, 52.00, 1, 1, 3, 39),
	(14, 'sapien', 40.45, 67.00, 1, 1, 6, 10),
	(15, 'non', 14.08, 25.00, 1, 1, 3, 44),
	(16, 'pede', 43.71, 28.00, 1, 1, 8, 74),
	(17, 'integer', 65.60, 21.00, 1, 1, 10, 42),
	(101, 'Senha', 0.00, NULL, 6, NULL, NULL, NULL);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Dumping structure for table schoolauto.tipoutilizador
CREATE TABLE IF NOT EXISTS `tipoutilizador` (
  `tipoUtilizador` int NOT NULL AUTO_INCREMENT,
  `nomeTipoUtilizador` varchar(20) NOT NULL DEFAULT '0',
  `permAdmin` varchar(1) DEFAULT NULL,
  `permSA` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tipoUtilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.tipoutilizador: ~6 rows (approximately)
/*!40000 ALTER TABLE `tipoutilizador` DISABLE KEYS */;
INSERT INTO `tipoutilizador` (`tipoUtilizador`, `nomeTipoUtilizador`, `permAdmin`, `permSA`) VALUES
	(1, 'Administrador', '1', '1'),
	(2, 'Professor', NULL, NULL),
	(3, 'Aluno', '', NULL),
	(4, 'Pessoal Não Docente', NULL, NULL),
	(5, 'AcessoBar', NULL, NULL),
	(6, 'Secretaria', NULL, '1');
/*!40000 ALTER TABLE `tipoutilizador` ENABLE KEYS */;

-- Dumping structure for table schoolauto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numCartao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `tipoUtilizador` int NOT NULL DEFAULT '0',
  `numProcesso` int unsigned NOT NULL DEFAULT '0',
  `saldo` decimal(10,2) DEFAULT '0.00',
  `pin` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_fotografia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uiColor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'azure',
  `isencaoSenha` int DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `numProcesso` (`numProcesso`),
  UNIQUE KEY `path_fotografia` (`path_fotografia`),
  KEY `numCartao` (`numCartao`)
) ENGINE=InnoDB AUTO_INCREMENT=100004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table schoolauto.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`, `numCartao`, `tipoUtilizador`, `numProcesso`, `saldo`, `pin`, `path_fotografia`, `remember_token`, `uiColor`, `isencaoSenha`) VALUES
	(6, 'Administrador', 'sae@etpsico.pt', NULL, '$2y$10$LP0RZUyeuLiSpR8lK08T2O6bI54GhgRujOsaxnS9NTHsj0pDO675i', NULL, NULL, '0', 1, 0, 20000.00, '$2y$10$Ac4LNTTt0RS7.aAZoSOQXuP4DGvm7I9jP0ghGB2TPc3gNhjBgipfq', NULL, NULL, 'red', 0),
	(7, 'Catarina Lucas', 'catarina.lucas@etpsico.pt', NULL, '$2y$10$Yf4gWzGHeC6DtqnRXlEQSeuLtB0BN.fuLCtNjuCuyZpyvNzV0y9iC', NULL, NULL, '2', 2, 21234569, 0.00, '$2y$10$qa/ux6jexqF38QBwkxEGsuY2dqN/LS4iAM0B42OQ4fKdvb7teQEHG', 'http://www.etpsico.pt/media/formandos/14/catarina_lucas.jpg', NULL, 'red', 0),
	(8, 'testes', 'testesa@etpsico.pt', NULL, '$2y$10$yDsZaeNJHwXOfwIl/M/gaOJRikruYfLFqPAoPtt6BYhV2Ni4dQaLu', NULL, NULL, '0', 2, 9999999, 0.00, '$2y$10$aB7c4GbiimNwJFmOXBFuUuQAImJsgFc3T3m18Vi4geZK2QBODZO6u', NULL, NULL, 'red', 0),
	(10, 'David Castanheira Simões', '17gpsi7@etpsico.pt', NULL, '$2y$10$LKiDDcIK4lnTDWIn4n/PoOyDhYrho/Q5GDBvkISFPa.9g34DeqaH6', NULL, NULL, '0002723976', 1, 20202, 18575.55, '$2y$10$l4MCMp75s800v1Bk/iap6u7bRnIpZnQXduP02JgmCKdHjx7c26brm', 'http://www.etpsico.pt/media/alunos/94/david_sim_es.jpg', NULL, 'red', 0),
	(100000, 'Acesso Portaria', 'ap@etpsico.pt', NULL, '$2y$10$FRKbUBZ0JMyMqcRDclhCduB/nn.zSPhBNJkmzpRwBl7dfTBkAQXtG', NULL, NULL, '3', 0, 999992, 0.00, '$2y$10$Ga40Y1tCYTGqqGamSLzPzeKzo.wjYln/5Sm/HanU/L8SXE22R3g66', NULL, NULL, 'azure', 0),
	(100003, 'Acesso Cantina', 'ac@etpsico.pt', NULL, '$2y$10$6e6bWLUjDBsXzqJh4QDbKegPrYlFdktJbpW8uS5ZuTPZ8E2vyBs6W', NULL, NULL, '4', 0, 999993, 0.00, '$2y$10$d3PNbgKlQ638ZTWsvVb5.O6nG6p6eu03K9aE8lrPp4.prW2K21ybe', NULL, NULL, 'azure', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
