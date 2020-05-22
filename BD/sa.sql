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
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.consumorefeicao: ~11 rows (approximately)
/*!40000 ALTER TABLE `consumorefeicao` DISABLE KEYS */;
INSERT INTO `consumorefeicao` (`idConsumo`, `numProcesso`, `dataConsumo`, `dataSenha`) VALUES
	(164, 20202, NULL, '2020-05-20 00:00:00'),
	(165, 20202, NULL, '2020-05-21 00:00:00'),
	(166, 20202, NULL, '2020-05-22 00:00:00'),
	(167, 20202, NULL, '2020-05-25 00:00:00'),
	(169, 20202, NULL, '2020-05-27 00:00:00'),
	(170, 20202, NULL, '2020-05-28 00:00:00');
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
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `numProcesso` int unsigned NOT NULL DEFAULT '9999999',
  `tipoNotificacao` int DEFAULT NULL,
  `visibilidade` int DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `notification_user` (`numProcesso`),
  CONSTRAINT `notification_user` FOREIGN KEY (`numProcesso`) REFERENCES `users` (`numProcesso`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table schoolauto.notification: ~6 rows (approximately)
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`id`, `content`, `date`, `numProcesso`, `tipoNotificacao`, `visibilidade`) VALUES
	(1, 'Isto é um exemplo de sugestão', '2020-05-12 00:00:00', 21234569, 1, 1),
	(5, ' Isto é um aviso', '2020-05-12 00:00:00', 20202, 2, 0),
	(6, 'Isto é um erro ', '2020-05-12 00:00:00', 20202, 3, 1),
	(7, 'O numero de cartão 5 não está associado a nenhum utilizador!', '2020-05-13 10:11:12', 9999999, 4, 1),
	(8, 'O numero de cartão 214514 não está associado a nenhum utilizador!', '2020-05-13 10:11:13', 9999999, 4, 1),
	(29, ' O dashboard não está a funcionar corretamente!', '2020-05-13 22:59:20', 20202, 1, 1),
	(30, ' O dashboard nao está a funcionar corretamente.', '2020-05-14 15:26:27', 20202, 2, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.operacao: ~20 rows (approximately)
/*!40000 ALTER TABLE `operacao` DISABLE KEYS */;
INSERT INTO `operacao` (`idOperacao`, `valorOperacao`, `dataOperacao`, `quantidade`, `nomeOperacao`, `idProduto`, `idUtilizador`) VALUES
	(43, -2.50, '2020-05-13 11:31:37', 1, 'Compra de senha', 101, 10),
	(44, -2.50, '2020-05-13 11:32:11', 1, 'Compra de senha', 101, 10),
	(45, -2.50, '2020-05-13 11:35:20', 1, 'Compra de senha', 101, 10),
	(46, -2.50, '2020-05-13 11:35:20', 1, 'Compra de senha', 101, 10),
	(47, -0.60, '2020-05-13 12:01:15', 1, 'Compra', 8, 10),
	(48, -2.50, '2020-05-13 16:36:23', 1, 'Compra de senha', 101, 10),
	(49, 2.50, '2020-05-13 16:36:28', 1, 'Anulação de Senha', 101, 10),
	(50, 2.50, '2020-05-13 16:36:31', 1, 'Anulação de Senha', 101, 10),
	(51, -2.50, '2020-05-13 22:53:03', 1, 'Compra de senha', 101, 10),
	(52, -2.50, '2020-05-13 22:53:03', 1, 'Compra de senha', 101, 10),
	(53, -2.50, '2020-05-13 22:53:03', 1, 'Compra de senha', 101, 10),
	(54, 2.50, '2020-05-13 22:53:24', 1, 'Anulação de Senha', 101, 10),
	(55, -0.65, '2020-05-14 13:34:51', 1, 'Compra', 11, 10),
	(56, -0.60, '2020-05-14 15:40:07', 1, 'Compra', 8, 10),
	(57, -2.50, '2020-05-18 14:54:57', 1, 'Compra de senha', 101, 10),
	(58, -2.50, '2020-05-18 14:55:04', 1, 'Compra de senha', 101, 10),
	(59, -2.50, '2020-05-18 14:55:07', 1, 'Compra de senha', 101, 10),
	(60, -2.50, '2020-05-18 14:55:07', 1, 'Compra de senha', 101, 10),
	(61, -2.50, '2020-05-18 14:55:07', 1, 'Compra de senha', 101, 10),
	(62, -2.50, '2020-05-18 14:55:07', 1, 'Compra de senha', 101, 10),
	(63, -2.50, '2020-05-19 15:28:17', 1, 'Compra de senha', 101, 10),
	(64, 2.50, '2020-05-19 15:28:29', 1, 'Anulação de Senha', 101, 10),
	(65, -2.50, '2020-05-19 15:29:32', 1, 'Compra de senha', 101, 10),
	(66, -2.50, '2020-05-19 15:29:32', 1, 'Compra de senha', 101, 10),
	(67, -2.50, '2020-05-19 15:29:32', 1, 'Compra de senha', 101, 10),
	(68, -2.50, '2020-05-19 15:29:32', 1, 'Compra de senha', 101, 10),
	(69, -2.50, '2020-05-19 15:29:32', 1, 'Compra de senha', 101, 10),
	(70, -2.50, '2020-05-19 15:29:32', 1, 'Compra de senha', 101, 10),
	(71, -2.50, '2020-05-19 15:29:32', 1, 'Compra de senha', 101, 10),
	(72, 2.50, '2020-05-19 15:30:02', 1, 'Anulação de Senha', 101, 10);
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

-- Dumping data for table schoolauto.permission: ~4 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.portaria: ~13 rows (approximately)
/*!40000 ALTER TABLE `portaria` DISABLE KEYS */;
INSERT INTO `portaria` (`idRegisto`, `numCartao`, `time`, `valor`) VALUES
	(15, '0002723976', '2020-05-13 11:48:23', 1),
	(16, '0002723976', '2020-05-13 11:48:40', 2),
	(17, '0002723976', '2020-05-13 11:49:15', 1),
	(18, '0002723976', '2020-05-13 11:49:21', 2),
	(19, '0002723976', '2020-05-13 11:52:04', 1),
	(20, '2', '2020-05-13 11:52:43', 1),
	(21, '0002723976', '2020-05-13 23:04:05', 2),
	(22, '0002723976', '2020-05-13 23:05:32', 1),
	(23, '0002723976', '2020-05-14 15:32:45', 2),
	(24, '0002723976', '2020-05-14 15:32:52', 1),
	(25, '0002723976', '2020-05-14 15:36:06', 2),
	(26, '0002723976', '2020-05-14 15:39:28', 1),
	(27, '0002723976', '2020-05-17 23:10:34', 2),
	(28, '2', '2020-05-19 14:57:23', 2),
	(29, '2', '2020-05-19 14:58:23', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.produtos: ~21 rows (approximately)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nomeProduto`, `precoProduto`, `ordem`, `idCategoria`, `visibilidade`, `Nopagina`, `VezesVendido`) VALUES
	(1, 'Halls', 1.00, 77.00, 1, 1, 6, 62),
	(2, 'Pães de Leite', 0.80, 54.00, 1, 1, 9, 26),
	(3, 'Banana', 1.00, 66.00, 1, 1, 11, 63),
	(4, 'Laranja', 0.50, 82.00, 1, 1, 10, 75),
	(5, 'Maçã', 1.00, 79.00, 1, 1, 10, 41),
	(6, 'Sande c/ Manteiga', 0.30, 65.00, 1, 1, 6, 10),
	(7, 'Compal Grande', 0.80, 78.00, 1, 1, 9, 25),
	(8, 'Compal', 0.60, 59.00, 1, 1, 5, 96),
	(9, 'Leite c/ Café', 0.80, 54.00, 1, 1, 8, 102),
	(10, 'Café', 0.80, 24.00, 1, 1, 7, 53),
	(11, 'Bolos', 0.65, 50.00, 1, 1, 7, 84),
	(12, 'Santal', 0.80, 52.00, 1, 1, 5, 82),
	(13, 'Sumo Natural', 0.80, 52.00, 1, 1, 3, 39),
	(14, 'Bolachas Maria', 1.00, 67.00, 1, 1, 6, 10),
	(15, 'Barra Cereais', 1.00, 25.00, 1, 1, 3, 44),
	(16, 'Torradas', 0.80, 28.00, 1, 1, 2, 74),
	(17, 'Garrafa de água', 0.50, 21.00, 1, 1, 2, 42),
	(18, 'Leite', 0.50, 25.00, 1, 1, 2, 4),
	(19, 'Croisaint', 1.00, 2.00, 1, 0, 2, 32),
	(20, 'Kinder Bueno', 0.80, 32.00, 1, 1, 2, 34),
	(101, 'Senha', 0.00, NULL, 6, NULL, NULL, NULL),
	(10000, 'Teste', 5.00, 83.00, 1, 0, 15, NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=100008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table schoolauto.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`, `numCartao`, `tipoUtilizador`, `numProcesso`, `saldo`, `pin`, `path_fotografia`, `remember_token`, `uiColor`, `isencaoSenha`) VALUES
	(6, 'Administrador', 'sae@etpsico.pt', NULL, '$2y$10$LP0RZUyeuLiSpR8lK08T2O6bI54GhgRujOsaxnS9NTHsj0pDO675i', NULL, NULL, '0', 1, 0, 20000.00, '$2y$10$Ac4LNTTt0RS7.aAZoSOQXuP4DGvm7I9jP0ghGB2TPc3gNhjBgipfq', NULL, NULL, 'red', 0),
	(7, 'Catarina Lucas', 'catarina.lucas@etpsico.pt', NULL, '$2y$10$Yf4gWzGHeC6DtqnRXlEQSeuLtB0BN.fuLCtNjuCuyZpyvNzV0y9iC', NULL, NULL, '2', 2, 21234569, 0.00, '$2y$10$qa/ux6jexqF38QBwkxEGsuY2dqN/LS4iAM0B42OQ4fKdvb7teQEHG', 'http://www.etpsico.pt/media/formandos/14/catarina_lucas.jpg', NULL, 'red', 0),
	(8, 'testes', 'testesa@etpsico.pt', NULL, '$2y$10$yDsZaeNJHwXOfwIl/M/gaOJRikruYfLFqPAoPtt6BYhV2Ni4dQaLu', NULL, NULL, '0', 2, 9999999, 0.00, '$2y$10$aB7c4GbiimNwJFmOXBFuUuQAImJsgFc3T3m18Vi4geZK2QBODZO6u', NULL, NULL, 'red', 0),
	(10, 'David Castanheira Simões', '17gpsi7@etpsico.pt', NULL, '$2y$10$LKiDDcIK4lnTDWIn4n/PoOyDhYrho/Q5GDBvkISFPa.9g34DeqaH6', NULL, NULL, '0002723976', 1, 20202, 5.65, '$2y$10$l4MCMp75s800v1Bk/iap6u7bRnIpZnQXduP02JgmCKdHjx7c26brm', 'http://www.etpsico.pt/media/alunos/94/david_sim_es.jpg', NULL, 'orange', 0),
	(100000, 'Acesso Portaria', 'ap@etpsico.pt', NULL, '$2y$10$FRKbUBZ0JMyMqcRDclhCduB/nn.zSPhBNJkmzpRwBl7dfTBkAQXtG', NULL, NULL, '3', 0, 999992, 0.00, '$2y$10$Ga40Y1tCYTGqqGamSLzPzeKzo.wjYln/5Sm/HanU/L8SXE22R3g66', NULL, NULL, 'green', 0),
	(100003, 'Acesso Cantina', 'ac@etpsico.pt', NULL, '$2y$10$6e6bWLUjDBsXzqJh4QDbKegPrYlFdktJbpW8uS5ZuTPZ8E2vyBs6W', NULL, NULL, '4', 0, 999993, 0.00, '$2y$10$d3PNbgKlQ638ZTWsvVb5.O6nG6p6eu03K9aE8lrPp4.prW2K21ybe', NULL, NULL, 'azure', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
