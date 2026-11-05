CREATE TABLE `components` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `category` VARCHAR(50) NOT NULL,
    `price` DECIMAL(10, 2) UNSIGNED NOT NULL,
    `manufacturer` VARCHAR(100) NOT NULL,
    `power_w` INT UNSIGNED DEFAULT 0,
    `image` VARCHAR(255) DEFAULT NULL
) DEFAULT CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `components` (`name`, `category`, `price`, `manufacturer`, `power_w`, `image`) VALUES
('AMD Ryzen 9 9900X', 'Procesor', 373.90, 'AMD', 120, "cpu.png"),
('ASROCK B650I LIGHTNING WIFI', 'Základná doska', 154.90, 'ASROCK', 50, "motherboard.png"),
('SAPPHIRE PURE AMD Radeon RX 9060 XT GAMING OC 16G', 'Grafická karta', 712.90, 'SAPPHIRE', 260, "gpu.png"),
('Patriot Viper Venom 64 GB KIT DDR5 6000 MHz CL30', 'RAM', 1290.90, 'Patriot', 30, "memory.png");