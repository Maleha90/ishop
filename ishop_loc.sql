-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 25 2021 г., 05:55
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ishop.loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `title`) VALUES
(1, 'Жакет'),
(2, 'Лонгслив'),
(3, 'Блузка'),
(4, 'Платье'),
(5, 'Костюм');

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_product`
--

CREATE TABLE `attribute_product` (
  `attr_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `attribute_product`
--

INSERT INTO `attribute_product` (`attr_id`, `product_id`) VALUES
(1, 4),
(1, 40),
(1, 41),
(2, 1),
(2, 2),
(2, 3),
(2, 15),
(2, 16),
(2, 17),
(2, 20),
(2, 21),
(2, 22),
(2, 40),
(2, 41),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 26),
(4, 10),
(4, 27),
(4, 28),
(4, 33),
(4, 40),
(5, 11),
(5, 12),
(5, 16),
(5, 22),
(5, 33),
(5, 40),
(6, 22),
(6, 29),
(6, 30),
(6, 31),
(6, 32),
(6, 33),
(6, 41),
(7, 16),
(7, 22),
(8, 40),
(8, 44),
(9, 14),
(10, 4),
(10, 5),
(10, 13),
(11, 7),
(11, 8),
(11, 10),
(12, 1),
(14, 3),
(16, 1),
(16, 4),
(16, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `attr_group_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attr_group_id`) VALUES
(1, 'Для праздников', 1),
(2, 'Повседневные', 4),
(3, 'Для работы', 1),
(4, 'Строгий', 5),
(5, 'Спортивный', 2),
(6, 'На замке', 2),
(7, 'На пуговицах', 2),
(8, 'Длинным рукавом', 3),
(9, 'Коротким рукавом', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'brand_no_image.jpg',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `title`, `alias`, `img`, `description`) VALUES
(1, 'Dress', 'Платье', 'g1.jpg', 'Платья разных размеров'),
(2, 'Blouse', 'Блузка', 'g3.jpg', 'Блузки для любого праздника'),
(3, 'Costume', 'Костюм', 'g4.jpg', 'Костюмы на прогулку'),
(4, 'Jacket', 'Жакет', 'm5.jpg', 'На работу в стильных жакетах'),
(5, 'Longsleeve ', 'Лонгслив', 'm4.jpg', 'Отличный выбор лонгсливов');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parent_id` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`) VALUES
(1, 'Man', 'man', 0, 'Man', 'Man'),
(2, 'Woman', 'woman', 0, 'Woman', 'Woman'),
(5, 'Dress', 'dress', 2, 'Dress', 'Dress'),
(6, 'Blouse', 'blouse', 2, 'Blouse', 'Blouse'),
(9, 'Costume', 'costume', 2, 'Costume', 'Costume'),
(10, 'Jacket', 'jacket', 1, 'Jacket', 'Jacket'),
(15, 'Longsleeve', 'longsleeve', 1, 'Longsleeve', 'Longsleeve'),
(16, 'Jacket', 'jacket-woman', 2, 'Jacket', 'Jacket'),
(24, 'Test', 'test', 0, 'Test', 'Test');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol_left` varchar(10) NOT NULL,
  `symbol_right` varchar(10) NOT NULL,
  `value` float(15,2) NOT NULL,
  `base` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `symbol_left`, `symbol_right`, `value`, `base`) VALUES
(1, 'Рубль', 'RUB', '', ' руб.', 50.30, '0'),
(2, 'Доллар', 'USD', '$ ', '', 1.00, '1'),
(3, 'Евро', 'EUR', '€ ', '', 0.88, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `img`) VALUES
(1, 11, 's1.jpg'),
(2, 11, 's2.jpg'),
(3, 11, 's3.jpg'),
(4, 11, 's4.jpg'),
(5, 11, 's11.jpg'),
(6, 1, 'w1.jpg'),
(7, 1, 'w2.jpg'),
(8, 1, 'w3.jpg'),
(9, 1, 'w4.jpg'),
(13, 42, 'e369bac220e7077d1b41420c0f072dcd.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `modification`
--

INSERT INTO `modification` (`id`, `product_id`, `title`, `price`) VALUES
(1, 1, 'XS', 30),
(2, 1, 'S', 28),
(3, 2, 'M', 30),
(4, 3, 'L', 31),
(5, 4, 'XL', 8),
(6, 5, 'XS', 7),
(7, 6, 'S', 10),
(8, 6, 'M', 12),
(9, 4, 'L', 10),
(10, 5, 'XL', 12),
(11, 7, 'XS', 30),
(12, 7, 'S', 28),
(13, 8, 'M', 30),
(14, 8, 'L', 31),
(15, 9, 'XL', 8),
(16, 9, 'XS', 7),
(17, 10, 'S', 10),
(18, 11, 'M', 12),
(19, 12, 'L', 10),
(20, 12, 'XL', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `date`, `update_at`, `currency`, `note`) VALUES
(13, 6, '0', '2021-08-08 04:02:16', '2021-08-16 06:08:17', 'USD', ''),
(16, 6, '0', '2021-08-08 04:09:50', NULL, 'USD', ''),
(17, 6, '0', '2021-08-08 04:12:39', NULL, 'USD', ''),
(18, 1, '0', '2021-08-15 12:44:10', NULL, 'RUB', 'Заказ для меня!');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int UNSIGNED NOT NULL,
  `order_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`, `title`, `price`) VALUES
(7, 13, 4, 2, 'Jacket-blue (XL)', 8),
(8, 13, 11, 2, 'Longsleeve -orange (M)', 12),
(11, 16, 10, 1, 'Costume-black', 50),
(12, 17, 8, 1, 'Jacket-gray', 25),
(13, 18, 8, 1, 'Jacket-gray', 1257.5);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int UNSIGNED NOT NULL,
  `category_id` tinyint UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `old_price` float NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `hit` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `title`, `alias`, `content`, `price`, `old_price`, `status`, `keywords`, `description`, `img`, `hit`) VALUES
(1, 5, 'Dress-red', 'dress-red', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                                                         ', 30, 0, '1', NULL, NULL, 'g1.jpg', '1'),
(2, 5, 'Dress-burgundy', 'dress-burgundy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 28, 0, '1', NULL, NULL, 'g2.jpg', '0'),
(3, 5, 'Dress-blue', 'dress-blue', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 32, 40, '1', NULL, NULL, 'g5.jpg', '0'),
(4, 16, 'Jacket-blue', 'jacket-blue', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 17, 0, '1', NULL, NULL, 'g6.jpg', '1'),
(5, 10, 'Jacket-black-yellow', 'jacket-m-black-yellow', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 20, 0, '1', NULL, NULL, 'm2.jpg', '0'),
(6, 10, 'Jacket-burgundy', 'jacket-m-burgundy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 30, 35, '1', NULL, NULL, 'm3.jpg', '0'),
(7, 10, 'Jacket-black', 'jacket-m-black', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 26, 28, '1', NULL, NULL, 'm6.jpg', '0'),
(8, 10, 'Jacket-gray', 'jacket-m-grey', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 25, 0, '1', NULL, NULL, 'm5.jpg', '1'),
(9, 6, 'Blouse-blue', 'blouse-blue', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n', 12, 15, '1', '', '', 'g3.jpg', '0'),
(10, 9, 'Costume-black', 'costume-black', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 50, 0, '1', NULL, NULL, 'g4.jpg', '1'),
(11, 15, 'Longsleeve -orange', 'longsleeve-m-orange', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 15, 0, '1', NULL, NULL, 'm4.jpg', '1'),
(12, 15, 'Longsleeve-blue', 'longsleeve-m-blue', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla.</p>\r\n\r\n                                            ', 10, 0, '1', NULL, NULL, 'm1.jpg', '0'),
(13, 7, 'Часы 2', 'chasy-2', NULL, 105, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(14, 7, 'Часы 3', 'chasy-3', NULL, 110, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(15, 7, 'Часы 4', 'chasy-4', NULL, 115, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(16, 7, 'Часы 5', 'chasy-5', NULL, 115, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(17, 7, 'Часы 6', 'chasy-6', NULL, 120, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(20, 7, 'Часы 7', 'chasy-7', NULL, 120, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(21, 7, 'Часы 8', 'chasy-8', NULL, 120, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(22, 7, 'Часы 9', 'chasy-9', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(23, 7, 'Часы 10', 'chasy-10', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(24, 7, 'Часы 11', 'chasy-11', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(25, 7, 'Часы 12', 'chasy-12', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(26, 7, 'Часы 13', 'chasy-13', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(27, 7, 'Часы 14', 'chasy-14', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(28, 7, 'Часы 15', 'chasy-15', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(29, 7, 'Часы 16', 'chasy-16', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(30, 7, 'Часы 17', 'chasy-17', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(31, 7, 'Часы 18', 'chasy-18', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(32, 7, 'Часы 19', 'chasy-19', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(33, 7, 'Часы 20', 'chasy-20', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `related_product`
--

CREATE TABLE `related_product` (
  `product_id` int UNSIGNED NOT NULL,
  `related_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `related_product`
--

INSERT INTO `related_product` (`product_id`, `related_id`) VALUES
(1, 2),
(1, 3),
(5, 1),
(5, 4),
(5, 6),
(5, 7),
(5, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `address`, `role`) VALUES
(1, 'Admin', '$2y$10$v0k9FZGT88V.ZEY9Sx0one7vR6v8i7T5AT0nc/6HGAtUrItes6NIO', '1@1.com', 'Admin', 'RUS', 'admin'),
(5, 'User', '$2y$10$70UNumludRD9siVg5aFImOW3rLUlyBafo.9SHJr6R2E1qd6BQQ6JW', '2@1.com', 'User', 'RUS', 'user'),
(6, 'Dima', '$2y$10$6fVMr2OUuuNlSuETXqgiO.SC6HwT36dEuMEREhS1Wp.4gdZcsO7Oa', 'maleha90@mail.ru', 'Dima', 'RUS', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`attr_id`,`product_id`);

--
-- Индексы таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`),
  ADD KEY `attr_group_id` (`attr_group_id`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `hit` (`hit`);

--
-- Индексы таблицы `related_product`
--
ALTER TABLE `related_product`
  ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
