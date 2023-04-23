-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2023 г., 16:56
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `book_releaseyear_relations`
--

CREATE TABLE `book_releaseyear_relations` (
  `book_id` int(11) NOT NULL,
  `book_releaseyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `book_releaseyear_relations`
--

INSERT INTO `book_releaseyear_relations` (`book_id`, `book_releaseyear`) VALUES
(1, 17),
(3, 15),
(4, 9),
(5, 3),
(6, 4),
(7, 6),
(8, 7),
(9, 8),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 2),
(16, 2),
(17, 5),
(18, 16),
(19, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book_releaseyear_relations`
--
ALTER TABLE `book_releaseyear_relations`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `book_releaseyear` (`book_releaseyear`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book_releaseyear_relations`
--
ALTER TABLE `book_releaseyear_relations`
  ADD CONSTRAINT `book_releaseyear_relations_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_releaseyear_relations_ibfk_2` FOREIGN KEY (`book_releaseyear`) REFERENCES `releaseyear_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
