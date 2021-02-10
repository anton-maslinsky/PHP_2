-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2021 г., 23:10
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`, `qty`) VALUES
(31, 'bb3mmh4gla9btaoab9ldh5fj2890hgr0', 1, 10),
(32, 'bb3mmh4gla9btaoab9ldh5fj2890hgr0', 2, 1),
(33, 'j0sblcvlt2n8e9p1m00tppp4914q0u17', 2, 1),
(34, 'j0sblcvlt2n8e9p1m00tppp4914q0u17', 3, 2),
(37, 'jkfcebmg5fls22htm56sn22q9em98q4o', 2, 1),
(38, 'jkfcebmg5fls22htm56sn22q9em98q4o', 3, 2),
(39, 'srcj4bfalql5alsjterm8vff56abvi9s', 1, 1),
(40, 'mv9vbf1rl4blelmma5c2stlvh7hmiest', 2, 1),
(41, 'mv9vbf1rl4blelmma5c2stlvh7hmiest', 3, 1),
(42, 'mv9vbf1rl4blelmma5c2stlvh7hmiest', 6, 1),
(43, 'mv9vbf1rl4blelmma5c2stlvh7hmiest', 5, 1),
(44, 'e3ealt8us8t7c7qcdttqm25e0b8f5mlb', 1, 1),
(45, 'e3ealt8us8t7c7qcdttqm25e0b8f5mlb', 2, 1),
(46, 'u9th8cnne8eko0c6r01k0i1ok5teu79u', 5, 1),
(47, 'u9th8cnne8eko0c6r01k0i1ok5teu79u', 6, 1),
(48, '10ll1eahrts54stt7rm8csn35qohoai4', 1, 1),
(49, '2asgr2ibqudcel3tjdpi3l0vbiulvckj', 3, 1),
(50, '2asgr2ibqudcel3tjdpi3l0vbiulvckj', 4, 1),
(51, 'h9c6b2514kutkolvtha35rltubc0i2sr', 1, 1),
(52, '2asgr2ibqudcel3tjdpi3l0vbiulvckj', 1, 1),
(53, '2asgr2ibqudcel3tjdpi3l0vbiulvckj', 2, 2),
(54, '1a9ggsmui3d5hmnsvptrd10hh6gnu90u', 1, 1),
(55, 't2lqrvi9fbh0j6ecc2o4qb7seh25989s', 11, 2),
(56, 't2lqrvi9fbh0j6ecc2o4qb7seh25989s', 10, 1),
(57, 't2lqrvi9fbh0j6ecc2o4qb7seh25989s', 12, 3),
(58, 'kn4lc94d4vmpks0cb1uc84taevheh60m', 1, 1),
(59, 'kn4lc94d4vmpks0cb1uc84taevheh60m', 2, 1),
(60, 'kn4lc94d4vmpks0cb1uc84taevheh60m', 3, 1),
(61, 'gj1hg2ij19ie397p47444s507jo36382', 5, 1),
(62, 'gj1hg2ij19ie397p47444s507jo36382', 6, 1),
(63, 'gj1hg2ij19ie397p47444s507jo36382', 4, 1),
(64, 'tese3d3g1c8jiht3vmacq5bbrej2harv', 11, 1),
(65, 'tese3d3g1c8jiht3vmacq5bbrej2harv', 5, 1),
(66, 'tese3d3g1c8jiht3vmacq5bbrej2harv', 7, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `phone`, `email`, `session_id`, `status`) VALUES
(1, 'Сергей', '812-999-0088', 'sergey@mail.ru', 'kn4lc94d4vmpks0cb1uc84taevheh60m', 'completed'),
(2, 'Татьяна', '921-777-1300', 'tanya@mail.ru', 'gj1hg2ij19ie397p47444s507jo36382', 'inWork'),
(3, 'Юля', '922-344-5587', 'julia@ya.ru', 'tese3d3g1c8jiht3vmacq5bbrej2harv', 'inWork');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Футболка', 'Футболка мужская. Белая с рисунком', 350, 'product_1.png'),
(2, 'Блузка', 'Блузка красная. Шёлковая.', 1900, 'product_2.png'),
(3, 'Куртка', 'Куртка мужская. Осень - зима', 2890, 'product_3.png'),
(4, 'Платье', 'Платье летнее', 1300, 'product_4.png'),
(5, 'Платье', 'Платье офисное', 1980, 'product_5.png'),
(6, 'Пиджак', 'Пиджак мужской. Серый.', 3450, 'product_6.png'),
(7, 'Штаны', 'Штаны подростковые', 1200, 'product_7.png'),
(8, 'Кофта', 'Кофта мужская с капюшоном', 990, 'product_8.png'),
(9, 'Пиджак', 'Пиджак мужской. Серый.', 3450, 'product_6.png'),
(10, 'Блузка', 'Блузка красная. Шёлковая.', 1900, 'product_2.png'),
(11, 'Платье', 'Платье летнее', 1300, 'product_4.png'),
(12, 'Штаны', 'Штаны подростковые', 1200, 'product_7.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$5AASCffuhoGoK1GnRVGTquO5u9hLj87sVC7ubEMuECkXm.2Z1uYv6', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
