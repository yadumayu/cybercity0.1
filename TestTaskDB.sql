-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2024 г., 20:48
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `TestTaskDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `algebra` int NOT NULL DEFAULT '0',
  `russian_language` int NOT NULL DEFAULT '0',
  `Biology` int NOT NULL DEFAULT '0',
  `Chemistry` int NOT NULL DEFAULT '0',
  `History` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `surname`, `firstname`, `patronymic`, `dob`, `algebra`, `russian_language`, `Biology`, `Chemistry`, `History`) VALUES
(1, 'direktor', '$2y$10$o0YFaVXIdNDg/nRLmVxNROF6hOS2QONfK0y.C8PaKcRuGnlzZdVQ6', 'admin', '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(4, 'ilnur', '$2y$10$CR9I9velbReqFfXodS2bZ.tkWmjvVuizMvJ/M4CoCrLjcqde4.D42', 'student', 'Салахов', 'Илнур', 'Рамисович', '2002-09-23', 5, 3, 4, 4, 4),
(7, 'alex', '$2y$10$WW1B7oWkWo7DHxoGCbOqrObc6.3nQ7nVBVsKdVl.ReynR7DRRyQCm', 'student', 'Калинин', 'Александр', 'Константинович', '2001-08-10', 5, 2, 3, 3, 5),
(8, 'polina', '$2y$10$rcQyGHhaO3c6y69BjgNaCeB/48b6j3/5C6qLKOJY0x1drujpSqL7u', 'student', 'Андреева', 'Полина', '', '2001-05-09', 1, 2, 3, 4, 5),
(9, 'sasha', '$2y$10$4.arXdDHe8QByjZ92ZyOPu7zBVseZ2.1LT9w5rQiMr.jWui42cshO', 'student', 'shelemetev', 'sasha', 'olegovich', '2004-02-19', 0, 0, 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
