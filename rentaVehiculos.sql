-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla rentavehiculos.categories: ~0 rows (aproximadamente)
DELETE FROM `categories`;
INSERT INTO `categories` (`id`, `model`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Camioneta 4x4', 'L5 ideal para viajes en familia', '2022-10-02 11:15:52', '2022-10-02 20:53:11'),
	(2, 'rgrwefew', 'nosep0', '2022-10-02 12:24:28', '2022-10-02 12:24:28');

-- Volcando datos para la tabla rentavehiculos.clients: ~0 rows (aproximadamente)
DELETE FROM `clients`;

-- Volcando datos para la tabla rentavehiculos.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

-- Volcando datos para la tabla rentavehiculos.migrations: ~0 rows (aproximadamente)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_10_02_015052_create_categories_table', 1),
	(6, '2022_10_02_015123_create_vehicles_table', 1),
	(7, '2022_10_02_015150_create_clients_table', 1),
	(8, '2022_10_02_015211_create_rents_table', 1);

-- Volcando datos para la tabla rentavehiculos.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;

-- Volcando datos para la tabla rentavehiculos.personal_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `personal_access_tokens`;

-- Volcando datos para la tabla rentavehiculos.rents: ~0 rows (aproximadamente)
DELETE FROM `rents`;

-- Volcando datos para la tabla rentavehiculos.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Jose', 'c2-jose@hotmail.com', NULL, '$2y$10$uKi/0Q85XmcITLCMAOAfNeNWK9T5DVTBDsGjNrnkUIUjB.zd2C0zm', 1, NULL, '2022-10-02 06:55:22', '2022-10-02 06:55:22');

-- Volcando datos para la tabla rentavehiculos.vehicles: ~0 rows (aproximadamente)
DELETE FROM `vehicles`;
INSERT INTO `vehicles` (`id`, `placa`, `marca`, `nro_asientos`, `anio`, `tipo`, `recorrido`, `aire_acondicionado`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'w1w22', 'etrt', '5', '40150', 'fe', 233, 'si', 1, 1, '2022-10-02 17:38:22', '2022-10-02 17:38:22'),
	(2, 'css', 'cscs', '12', '2000', 'fe', 233, 'si', 1, 1, '2022-10-02 17:36:22', '2022-10-02 17:36:22'),
	(3, 'ABC123', 'effe', '6', '2022', 'rehrh', 1141, 'si', 1, 1, '2022-10-02 23:08:26', '2022-10-02 23:10:21');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
