-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.3.15-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for schoolauto
CREATE DATABASE IF NOT EXISTS `schoolauto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `schoolauto`;

-- Dumping structure for table schoolauto.categoriaproduto
CREATE TABLE IF NOT EXISTS `categoriaproduto` (
  `idCategoria` int(2) NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.categoriaproduto: ~0 rows (approximately)
/*!40000 ALTER TABLE `categoriaproduto` DISABLE KEYS */;
INSERT INTO `categoriaproduto` (`idCategoria`, `nomeCategoria`) VALUES
	(5, 'Bar');
/*!40000 ALTER TABLE `categoriaproduto` ENABLE KEYS */;

-- Dumping structure for table schoolauto.consumorefeicao
CREATE TABLE IF NOT EXISTS `consumorefeicao` (
  `idConsumo` int(11) NOT NULL,
  `numProcesso` int(8) unsigned NOT NULL,
  `idRefeicao` int(11) DEFAULT NULL,
  `dataConsumo` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idConsumo`),
  KEY `Consumo_Utilizador` (`numProcesso`),
  KEY `Consumo_Refeicao` (`idRefeicao`),
  CONSTRAINT `Consumo_Refeicao` FOREIGN KEY (`idRefeicao`) REFERENCES `refeicao` (`idRefeicao`),
  CONSTRAINT `Consumo_Utilizador` FOREIGN KEY (`numProcesso`) REFERENCES `users` (`numProcesso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.consumorefeicao: ~0 rows (approximately)
/*!40000 ALTER TABLE `consumorefeicao` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumorefeicao` ENABLE KEYS */;

-- Dumping structure for table schoolauto.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table schoolauto.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table schoolauto.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
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

-- Dumping structure for table schoolauto.operacao
CREATE TABLE IF NOT EXISTS `operacao` (
  `idOperacao` int(10) NOT NULL AUTO_INCREMENT,
  `valorOperacao` decimal(4,2) NOT NULL DEFAULT 0.00,
  `dataOperacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nomeOperacao` varchar(50) NOT NULL DEFAULT '0',
  `idProduto` int(4) NOT NULL DEFAULT 0,
  `idUtilizador` bigint(20) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`idOperacao`),
  KEY `operacao_produto` (`idProduto`),
  KEY `idUtilizador` (`idUtilizador`),
  CONSTRAINT `operacao_produto` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`),
  CONSTRAINT `utilizador_operacao` FOREIGN KEY (`idUtilizador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.operacao: ~1 rows (approximately)
/*!40000 ALTER TABLE `operacao` DISABLE KEYS */;
INSERT INTO `operacao` (`idOperacao`, `valorOperacao`, `dataOperacao`, `nomeOperacao`, `idProduto`, `idUtilizador`) VALUES
	(1, 10.00, '2020-03-09 10:26:07', 'Carregamento', 1, 10),
	(2, -0.70, '2020-03-09 10:27:00', 'Bar', 2, 10);
/*!40000 ALTER TABLE `operacao` ENABLE KEYS */;

-- Dumping structure for table schoolauto.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `idUser` bigint(20) unsigned NOT NULL,
  `Admin` int(11) DEFAULT NULL,
  `SAE` int(11) DEFAULT NULL,
  `AcessoBar` int(11) DEFAULT NULL,
  `AcessoCantina` int(11) DEFAULT NULL,
  `AcessoBiblioteca` int(11) DEFAULT NULL,
  `AcessoPortaria` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_permission` (`idUser`),
  CONSTRAINT `user_permission` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.permission: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`ID`, `idUser`, `Admin`, `SAE`, `AcessoBar`, `AcessoCantina`, `AcessoBiblioteca`, `AcessoPortaria`) VALUES
	(1, 10, 1, 1, 1, 1, 1, 1);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;

-- Dumping structure for table schoolauto.portaria
CREATE TABLE IF NOT EXISTS `portaria` (
  `idRegisto` bigint(20) NOT NULL,
  `numProcesso` int(8) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `valor` int(1) NOT NULL,
  PRIMARY KEY (`idRegisto`),
  KEY `portaria_numProcesso` (`numProcesso`),
  CONSTRAINT `portaria_numProcesso` FOREIGN KEY (`numProcesso`) REFERENCES `users` (`numProcesso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.portaria: ~0 rows (approximately)
/*!40000 ALTER TABLE `portaria` DISABLE KEYS */;
/*!40000 ALTER TABLE `portaria` ENABLE KEYS */;

-- Dumping structure for table schoolauto.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` int(4) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(50) DEFAULT NULL,
  `precoProduto` decimal(4,2) DEFAULT NULL,
  `idCategoria` int(2) DEFAULT NULL,
  PRIMARY KEY (`idProduto`),
  KEY `produto_categoria` (`idCategoria`),
  CONSTRAINT `produto_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoriaproduto` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.produto: ~2 rows (approximately)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idProduto`, `nomeProduto`, `precoProduto`, `idCategoria`) VALUES
	(1, 'Chá', 0.45, 5),
	(2, 'Croissant c/Chocolate', 0.60, 5),
	(9999, 'Outro', NULL, NULL);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Dumping structure for table schoolauto.refeicao
CREATE TABLE IF NOT EXISTS `refeicao` (
  `idRefeicao` int(10) NOT NULL AUTO_INCREMENT,
  `dataRefeicao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `precoRefeicao` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idRefeicao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table schoolauto.refeicao: ~0 rows (approximately)
/*!40000 ALTER TABLE `refeicao` DISABLE KEYS */;
/*!40000 ALTER TABLE `refeicao` ENABLE KEYS */;

-- Dumping structure for table schoolauto.tipoutilizador
CREATE TABLE IF NOT EXISTS `tipoutilizador` (
  `tipoUtilizador` int(2) NOT NULL AUTO_INCREMENT,
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
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numCartao` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `tipoUtilizador` int(2) NOT NULL DEFAULT 0,
  `numProcesso` int(8) unsigned NOT NULL DEFAULT 0,
  `saldo` decimal(10,2) DEFAULT 0.00,
  `pin` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_fotografia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uiColor` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `numProcesso` (`numProcesso`),
  UNIQUE KEY `path_fotografia` (`path_fotografia`),
  KEY `numCartao` (`numCartao`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table schoolauto.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`, `numCartao`, `tipoUtilizador`, `numProcesso`, `saldo`, `pin`, `path_fotografia`, `remember_token`, `uiColor`) VALUES
	(6, 'Administrador', 'sae@etpsico.pt', NULL, '$2y$10$LP0RZUyeuLiSpR8lK08T2O6bI54GhgRujOsaxnS9NTHsj0pDO675i', NULL, NULL, '0', 1, 0, 0.00, '$2y$10$Ac4LNTTt0RS7.aAZoSOQXuP4DGvm7I9jP0ghGB2TPc3gNhjBgipfq', NULL, NULL, NULL),
	(7, 'Catarina Lucas', 'catarina.lucas@etpsico.pt', NULL, '$2y$10$Yf4gWzGHeC6DtqnRXlEQSeuLtB0BN.fuLCtNjuCuyZpyvNzV0y9iC', NULL, NULL, '0', 2, 21234569, 0.00, '$2y$10$qa/ux6jexqF38QBwkxEGsuY2dqN/LS4iAM0B42OQ4fKdvb7teQEHG', 'http://www.etpsico.pt/media/formandos/14/catarina_lucas.jpg', NULL, NULL),
	(8, 'testes', 'testesa@etpsico.pt', NULL, '$2y$10$yDsZaeNJHwXOfwIl/M/gaOJRikruYfLFqPAoPtt6BYhV2Ni4dQaLu', NULL, NULL, '0', 1, 9999999, 0.00, '$2y$10$aB7c4GbiimNwJFmOXBFuUuQAImJsgFc3T3m18Vi4geZK2QBODZO6u', NULL, NULL, NULL),
	(10, 'David Castanheira Simões', '17gpsi7@etpsico.pt', NULL, '$2y$10$LKiDDcIK4lnTDWIn4n/PoOyDhYrho/Q5GDBvkISFPa.9g34DeqaH6', NULL, NULL, '0002723976', 1, 20202, 9.30, '$2y$10$l4MCMp75s800v1Bk/iap6u7bRnIpZnQXduP02JgmCKdHjx7c26brm', NULL, NULL, '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
