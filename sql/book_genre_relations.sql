-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2023 г., 16:53
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
-- Структура таблицы `book_genre_relations`
--

CREATE TABLE `book_genre_relations` (
  `book_id` int(11) NOT NULL,
  `book_genres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `book_genre_relations`
--

INSERT INTO `book_genre_relations` (`book_id`, `book_genres`) VALUES
(1, 4),
(1, 5),
(1, 10),
(1, 11),
(3, 1),
(3, 3),
(3, 6),
(3, 7),
(3, 9),
(3, 12),
(4, 1),
(4, 3),
(4, 6),
(4, 7),
(4, 9),
(4, 12),
(5, 1),
(5, 3),
(5, 6),
(5, 7),
(5, 9),
(5, 12),
(6, 1),
(6, 3),
(6, 6),
(6, 7),
(6, 9),
(6, 12),
(7, 1),
(7, 3),
(7, 6),
(7, 7),
(7, 9),
(7, 12),
(8, 1),
(8, 3),
(8, 6),
(8, 7),
(8, 9),
(8, 12),
(9, 1),
(9, 3),
(9, 6),
(9, 7),
(9, 9),
(9, 12),
(10, 1),
(10, 3),
(10, 6),
(10, 7),
(10, 9),
(10, 12),
(11, 1),
(11, 3),
(11, 6),
(11, 7),
(11, 9),
(11, 12),
(12, 1),
(12, 3),
(12, 6),
(12, 7),
(12, 9),
(12, 12),
(13, 1),
(13, 3),
(13, 6),
(13, 7),
(13, 9),
(13, 12),
(14, 1),
(14, 3),
(14, 6),
(14, 7),
(14, 9),
(14, 12),
(15, 1),
(15, 6),
(15, 7),
(15, 12),
(16, 7),
(16, 12),
(17, 1),
(17, 4),
(17, 6),
(17, 7),
(17, 10),
(17, 12),
(18, 2),
(18, 8),
(19, 7),
(19, 12);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `book_genre_relations`
--
ALTER TABLE `book_genre_relations`
  ADD KEY `book_id` (`book_id`),
  ADD KEY `book_genres` (`book_genres`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book_genre_relations`
--
ALTER TABLE `book_genre_relations`
  ADD CONSTRAINT `book_genre_relations_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_genre_relations_ibfk_2` FOREIGN KEY (`book_genres`) REFERENCES `genres_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
