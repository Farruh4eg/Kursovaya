-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 20 2023 г., 16:55
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
-- Структура таблицы `releaseyear_table`
--

CREATE TABLE `releaseyear_table` (
  `id` int(11) NOT NULL,
  `releaseyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `releaseyear_table`
--

INSERT INTO `releaseyear_table` (`id`, `releaseyear`) VALUES
(1, 1925),
(2, 1949),
(3, 1965),
(4, 1969),
(5, 1974),
(6, 1976),
(7, 1981),
(8, 1984),
(9, 1997),
(10, 1998),
(11, 1999),
(12, 2000),
(13, 2003),
(14, 2005),
(15, 2007),
(16, 2011),
(17, 2018);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `releaseyear_table`
--
ALTER TABLE `releaseyear_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `releaseyear_table`
--
ALTER TABLE `releaseyear_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
