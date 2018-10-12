-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 12 2018 г., 11:48
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` datetime NOT NULL,
  `modify_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `country`, `status`, `created_at`, `modify_at`) VALUES
(1, 'Evander', 'bej0j88@yandex.ru', 'Georgia', 'published', '0000-00-00 00:00:00', '2018-10-11 15:17:20'),
(2, 'McGreg13', 'mcgreg@mail.ru', 'Malasiya', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'McGreg', 'akbars@mail.ru', 'Kazan', 'draft', '0000-00-00 00:00:00', '2018-10-11 07:22:57'),
(4, 'JanaNews', 'janeAir@mail.ru', 'Great Britain ', 'draft', '0000-00-00 00:00:00', '2018-10-11 19:16:25'),
(5, 'Egor', 'egor@mail.ru', 'Germany', 'published', '0000-00-00 00:00:00', '2018-10-11 11:20:44'),
(6, 'ustas-alex', 'ustas@mail.ru', 'Argentina123', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Dmitriy', 'dmitriy@mail.ru', 'Holland', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'ustas', 'ustas@mail.ru', 'Argentina', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'new name233', 'new2@mail.ru', 'Russia', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'olivia', 'ol@mail.com', 'USA', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Alexey', 'ustas@mail.ru', 'Argentina', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Alexey678', 'al@mail.ru', 'Cuba', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'UpHala', 'doiteasy@mail.ru', 'India', 'draft', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Hello World', 'hello-world@gmail.com', 'Russia', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Hello Dolly!', 'dolly@mail.ru', 'Afganistan', 'published', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'Aleximus123', 'sfinks134@gmail.com', 'Gondvanna', 'draft', '2018-10-11 15:12:03', '2018-10-11 15:12:50'),
(110, '', '', '', 'draft', '2018-10-11 22:09:14', '0000-00-00 00:00:00'),
(111, 'Alexey123', 'sfinks134@gmail.com', 'Uganda', 'published', '2018-10-11 22:09:14', '2018-10-11 22:13:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
