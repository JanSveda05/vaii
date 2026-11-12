CREATE TABLE `categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL UNIQUE
) DEFAULT CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE `components` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `categoryId` INT NULL,
    `price` DECIMAL(10, 2) UNSIGNED NOT NULL,
    `manufacturer` VARCHAR(100) NOT NULL,
    `power_w` INT UNSIGNED DEFAULT 0,
    `image` VARCHAR(255) DEFAULT NULL,
    CONSTRAINT `fk_component_category` FOREIGN KEY (`categoryId`) REFERENCES `categories`(`id`) ON DELETE SET NULL
) DEFAULT CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci;


INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
    (1, 'Procesory', 'procesory'),
    (2, 'Základné dosky', 'zakladne-dosky'),
    (3, 'Grafické karty', 'graficke-karty'),
    (4, 'RAM', 'ram');


INSERT INTO `components` (`name`, `categoryId`, `price`, `manufacturer`, `power_w`, `image`) VALUES
    ('AMD Ryzen 9 9900X', 1, 373.90, 'AMD', 120, 'cpu.png'),
    ('ASROCK B650I LIGHTNING WIFI', 2, 154.90, 'ASROCK', 50, 'motherboard.png'),
    ('SAPPHIRE PURE AMD Radeon RX 9060 XT GAMING OC 16G', 3, 712.90, 'SAPPHIRE', 260, 'gpu.png'),
    ('Patriot Viper Venom 64 GB KIT DDR5 6000 MHz CL30', 4, 1290.90, 'Patriot', 30, 'memory.png');