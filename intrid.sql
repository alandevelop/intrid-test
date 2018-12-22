-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 22 2018 г., 15:00
-- Версия сервера: 5.6.41
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `intrid`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1545458975),
('m130524_201442_init', 1545458981);

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `length` int(1) NOT NULL,
  `width` int(1) NOT NULL,
  `height` int(1) NOT NULL,
  `code` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `offers`
--

INSERT INTO `offers` (`id`, `product_id`, `length`, `width`, `height`, `code`, `price`) VALUES
(1, 1, 1, 4, 2, 5354278, 43),
(2, 1, 5, 3, 2, 4644345, 72),
(3, 1, 5, 2, 3, 567567, 63),
(4, 1, 4, 3, 2, 56756435, 74),
(7, 1, 4, 4, 5, 452668, 17),
(8, 1, 3, 2, 2, 27788, 42),
(9, 2, 2, 3, 2, 34535, 75),
(10, 2, 1, 3, 4, 46434843, 34),
(11, 2, 4, 3, 2, 456467, 69),
(12, 2, 5, 2, 4, 6546537, 86),
(13, 2, 1, 5, 1, 6544373, 36),
(14, 2, 2, 2, 5, 54644, 11),
(15, 2, 5, 2, 5, 4566, 14),
(16, 2, 3, 3, 2, 456456, 66),
(17, 3, 4, 4, 1, 97897, 38),
(18, 3, 2, 2, 2, 3737365, 58),
(19, 3, 4, 3, 3, 2345673, 37),
(20, 3, 5, 1, 4, 6575673, 24),
(21, 3, 3, 3, 1, 45632, 25),
(22, 3, 4, 3, 2, 546044848, 64),
(23, 4, 1, 4, 2, 234572, 53),
(24, 4, 5, 3, 5, 645333, 46),
(25, 4, 3, 3, 1, 467889, 843),
(26, 4, 5, 1, 1, 426222, 234),
(27, 4, 4, 2, 3, 92272475, 98),
(28, 4, 1, 4, 1, 567276, 83),
(29, 5, 1, 2, 3, 45632, 27),
(30, 5, 1, 3, 3, 63456, 63),
(31, 5, 3, 1, 3, 564654, 35),
(32, 4, 1, 2, 1, 89235673, 83),
(33, 5, 4, 5, 4, 456245643, 99),
(34, 5, 1, 5, 3, 54622, 37),
(36, 6, 4, 4, 1, 765744, 71),
(37, 5, 5, 2, 3, 265732, 55),
(38, 5, 5, 3, 3, 246522, 84),
(39, 5, 4, 4, 5, 45689, 95),
(40, 5, 1, 3, 2, 245642, 36),
(41, 6, 5, 4, 4, 456333, 45),
(42, 6, 1, 2, 5, 45688, 66),
(43, 6, 4, 2, 3, 45633, 47),
(44, 6, 2, 2, 2, 45633, 83),
(45, 6, 2, 2, 4, 36544, 72),
(49, 8, 2, 2, 2, 22, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`) VALUES
(1, 'Коробка зеленая'),
(2, 'Коробка красная'),
(3, 'Коробка желтая'),
(4, 'Коробка синяя'),
(5, 'Коробка черная'),
(6, 'Коробка белая'),
(8, 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'h0VtBj2Un623vwgF-tLCKJxcau7Rhc_b', '$2y$13$KBTSILIneAGmeJV0KI0OYuQ/U8s5wq5PmzrDfkQJs3YsTmJyZq/e2', NULL, 'admin@admin.com', 10, 1545459150, 1545459150);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
