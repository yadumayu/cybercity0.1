-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 14 2023 г., 16:15
-- Версия сервера: 5.6.51
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
CREATE DATABASE IF NOT EXISTS `TestTaskDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `TestTaskDB`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `algebra` int(11) NOT NULL,
  `russian_language` int(11) NOT NULL,
  `Biology` int(11) NOT NULL,
  `Chemistry` int(11) NOT NULL,
  `History` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `surname`, `firstname`, `patronymic`, `dob`, `algebra`, `russian_language`, `Biology`, `Chemistry`, `History`) VALUES
(1, 'direktor', '$2y$10$o0YFaVXIdNDg/nRLmVxNROF6hOS2QONfK0y.C8PaKcRuGnlzZdVQ6', 'admin', '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(4, 'ilnur', '$2y$10$CR9I9velbReqFfXodS2bZ.tkWmjvVuizMvJ/M4CoCrLjcqde4.D42', 'student', 'Салахов', 'Илнур', 'Рамисович', '2002-09-23', 5, 3, 4, 4, 4),
(7, 'alex', '$2y$10$WW1B7oWkWo7DHxoGCbOqrObc6.3nQ7nVBVsKdVl.ReynR7DRRyQCm', 'student', 'Калинин', 'Александр', 'Константинович', '2001-08-10', 5, 2, 3, 3, 5),
(8, 'polina', '$2y$10$rcQyGHhaO3c6y69BjgNaCeB/48b6j3/5C6qLKOJY0x1drujpSqL7u', 'student', 'Андреева', 'Полина', '', '2001-05-09', 1, 2, 3, 4, 5);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
