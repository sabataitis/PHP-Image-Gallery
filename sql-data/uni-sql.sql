SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

--
-- Database: `nuotrauku_galerija`
--
CREATE DATABASE IF NOT EXISTS `unidb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `unidb`;

-- Sukuriama vartotoju lentele

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `desc` varchar(255),
  `registration_date` datetime
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
ADD FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

-- iterpia roles
INSERT INTO `roles` (`name`)
VALUES ('Not set'), ('Admin');

CREATE TABLE `photos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `category_id` bigint(11) NOT NULL DEFAULT 1,
  `user_id` int(11) not null,
  `file_name` varchar(100) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categories` (
  `id` bigint(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
   `category_name` varchar(100) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- iterpia kategorijas
INSERT INTO `categories` (`category_name`)
VALUES  ('Not set'), ('Technology'), ('Travel');

ALTER TABLE `photos`
ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION;

ALTER TABLE `photos`
ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- vienam is pridetu vartotoju priskiriam role administratorius, taip suteikiant jam privilegijas keisti puslapi kur id =1, galima pakeisti
update users set `role_id` = '2'
where `id` = '1'











