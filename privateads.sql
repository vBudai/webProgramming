-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 14 2022 г., 21:43
-- Версия сервера: 5.7.33-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `privateads`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ad`
--

CREATE TABLE `ad` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'ID объявления',
  `id_user` int(10) UNSIGNED NOT NULL COMMENT 'ID пользователя',
  `title` varchar(255) NOT NULL COMMENT 'Название',
  `information` text COMMENT 'Описание объявления',
  `img` text COMMENT 'Изображение',
  `creationTime` datetime NOT NULL COMMENT 'Время создания объявления',
  `price` int(10) UNSIGNED NOT NULL COMMENT 'Цена товара'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Объявление';

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID сообщения',
  `id_ad` int(10) UNSIGNED NOT NULL COMMENT 'ID объявления',
  `id_user` int(10) UNSIGNED NOT NULL COMMENT 'ID пользователя',
  `messageText` text NOT NULL COMMENT 'Текст сообщения',
  `sendTime` datetime NOT NULL COMMENT 'Время отправки сообщения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Сообщения под объявлением';

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'ID пользователя',
  `firstName` varchar(255) NOT NULL COMMENT 'Имя',
  `lastName` varchar(255) NOT NULL COMMENT 'Фамилия',
  `md5Password` varchar(255) NOT NULL COMMENT 'Пароль',
  `isAdmin` int(10) UNSIGNED DEFAULT '0' COMMENT 'Является ли пользователь администратором',
  `phoneNumber` varchar(11) NOT NULL COMMENT 'Номер телефона (логин)',
  `email` varchar(255) NOT NULL COMMENT 'Почта'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `md5Password`, `isAdmin`, `phoneNumber`, `email`) VALUES
(1, 'Владислав', 'Будай', '201cb962ac59075b964b07152d234b71', 1, '79123456789', 'qwert@gmail.com'),
(2, 'Анатолий', 'Шаратов', '202cb962ac59075b964b07152d234b70', 0, '79987654321', 'trewq@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID объявления';

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID сообщения';

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя', AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `ad` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
