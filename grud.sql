-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 09 2017 г., 19:29
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grud`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `patronymic` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `role` varchar(256) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `lastname`, `firstname`, `patronymic`, `email`, `role`) VALUES
(1, 'DivMan', '$2y$10$DXBfN4yJrMdxuMR8YHEz0ulYoMVZtpj7pZoDooAbsesqpfAgplEoC', 'Кахаров', 'Дмитрий', 'Борисович', 'dkakharov@yandex.ru', 'admin'),
(8, 'Nataha', '$2y$10$z9NA8bYfhZLRFF.to2H2NuomMu.ClTPCCDTc7qKFa1xJ1Cg1BTqpK', 'Ивасельева', 'Наталья', 'Антоновна', 'nataha111@yandex.ru', 'user'),
(9, 'Abricos', '$2y$10$uZPBh742NreE38XyDdKUkOlwmAXDSt6Hh1tqBO4SmGNed1NJufqHW', 'Петренко', 'Илья', 'Сергеевич', 'abric@yandex.ru', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
