-- Schema for Areja’s Boarding House Management System (bootstrap)

-- Users table (Laravel default + role)
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'tenant',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_index` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Rooms table
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `capacity` int unsigned NOT NULL DEFAULT 2,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rooms_number_unique` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed admin user (password: "password")
INSERT INTO `users` (`name`,`email`,`password`,`role`,`created_at`,`updated_at`) VALUES
('Admin','admin@example.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','admin',NOW(),NOW())
ON DUPLICATE KEY UPDATE `role`='admin';

-- Optionally seed your email as admin too
INSERT INTO `users` (`name`,`email`,`password`,`role`,`created_at`,`updated_at`) VALUES
('Admin','jcpbooc@addu.edu.ph','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','admin',NOW(),NOW())
ON DUPLICATE KEY UPDATE `role`='admin';

-- Seed 8 rooms
INSERT INTO `rooms` (`number`,`type`,`rate`,`capacity`,`status`,`created_at`,`updated_at`) VALUES
('R01','standard',0,2,'available',NOW(),NOW()),
('R02','standard',0,2,'available',NOW(),NOW()),
('R03','standard',0,2,'reserved',NOW(),NOW()),
('R04','standard',0,2,'occupied',NOW(),NOW()),
('R05','standard',0,2,'available',NOW(),NOW()),
('R06','standard',0,2,'available',NOW(),NOW()),
('R07','standard',0,2,'reserved',NOW(),NOW()),
('R08','standard',0,2,'occupied',NOW(),NOW())
ON DUPLICATE KEY UPDATE `status`=VALUES(`status`), `updated_at`=NOW();
