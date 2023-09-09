-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Сен 09 2023 г., 08:02
-- Версия сервера: 5.7.34
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `job1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cauriers`
--

CREATE TABLE `cauriers` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cauriers`
--

INSERT INTO `cauriers` (`id`, `fio`) VALUES
(1, 'Петров В.В.'),
(2, 'Сидоров А.Н.'),
(3, 'Третьяк А.Н.'),
(4, 'Борисов В.К.'),
(5, 'Белов А.И.'),
(6, 'Нуркаев Д.В.'),
(7, 'Сафин Р.Р.'),
(8, 'Тарасов Е.Е.'),
(9, 'Баширов И.В.'),
(10, 'Лапук А.И.');

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `amount_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `city`, `amount_of_days`) VALUES
(1, 'Санкт-Петербург', 2),
(2, 'Уфа', 2),
(3, 'Нижний Новгород', 1),
(4, 'Владимир', 4),
(5, 'Кострома', 5),
(6, 'Екатеринбург', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date_of_departure` date NOT NULL,
  `arrival_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `fio`, `city`, `date_of_departure`, `arrival_date`, `return_date`) VALUES
(37, 'Баширов И.В.', 'Санкт-Петербург', '2023-04-28', '2023-04-30', '2023-05-02'),
(38, 'Лапук А.И.', 'Владимир', '2023-02-02', '2023-02-06', '2023-02-10'),
(41, 'Белов А.И.', 'Санкт-Петербург', '2023-09-04', '2023-09-06', '2023-09-08'),
(42, 'Петров В.В.', 'Санкт-Петербург', '2023-08-08', '2023-08-10', '2023-08-12'),
(48, 'Нуркаев Д.В.', 'Владимир', '2023-07-14', '2023-07-18', '2023-07-22'),
(50, 'Нуркаев Д.В.', 'Владимир', '2023-07-06', '2023-07-10', '2023-07-14'),
(61, 'Борисов В.К.', 'Кострома', '2023-03-03', '2023-03-08', '2023-03-13'),
(62, 'Борисов В.К.', 'Санкт-Петербург', '2023-02-02', '2023-02-04', '2023-02-06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cauriers`
--
ALTER TABLE `cauriers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cauriers`
--
ALTER TABLE `cauriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
