-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 31 2014 г., 20:03
-- Версия сервера: 5.5.37-log
-- Версия PHP: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `Students`
--

-- --------------------------------------------------------

--
-- Структура таблицы `human`
--

CREATE TABLE IF NOT EXISTS `human` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(40) NOT NULL,
  `id_prediction` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_prediction` (`id_prediction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `Menu`
--

CREATE TABLE IF NOT EXISTS `Menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Menu` varchar(100) NOT NULL,
  `Url` varchar(100) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `Menu`
--

INSERT INTO `Menu` (`ID`, `Menu`, `Url`, `id_parent`) VALUES
(1, 'Меню 1', '', 0),
(2, 'Меню 2', '', 0),
(3, 'Меню 3', '', 0),
(4, 'Меню 4', '', 0),
(5, 'Меню 5', '', 0),
(6, 'Подменю 1.1', '', 1),
(7, 'Подменю 1.2', '', 1),
(8, 'Подменю 2.1', '', 2),
(9, 'Подменю 2.2', '', 2),
(10, 'Подменю 3.1', '', 3),
(11, 'Подменю 3.2', '', 3),
(12, 'Подменю 4.1', '', 4),
(13, 'Подменю 4.2', '', 4),
(14, 'Подменю 5.1', '', 5),
(15, 'Подменю 5.2', '', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `prediction`
--

CREATE TABLE IF NOT EXISTS `prediction` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `prediction` varchar(200) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `prediction`
--

INSERT INTO `prediction` (`ID`, `prediction`, `url`) VALUES
(1, ', Today, a great evening to see a horror movie.', 'img/cinema.png'),
(5, ', Beware of zombies, otherwise you will not survive this night.', 'img/frankenstein.png'),
(8, ', That night, you''re lucky to meet with a horrible witch.\n\n', 'img/witchbroomicon.png'),
(9, ', On this night, you have a chance to see the ghost.', 'img/ghosticon.png'),
(10, ', Cemetery worst place for tonight.', 'img/graveyardripicon.png'),
(11, ', Death will overtake you, faster than you think.', 'img/skullcrossbonesicon.png'),
(12, ', Today you will meet the crazy black cat.', 'img/crazy.png'),
(13, ', In this terrible night, you get a sweet lollipop.', 'img/spiral.png'),
(14, ', You''re in luck, today you meet a friendly ghost.', 'img/shy.png'),
(15, ', This huge spider , will  bite you at this night.', 'img/spider.png'),
(16, ', Mummies come for you at night.', 'img/mummy.png'),
(17, ', Find a person in this hat, and  get to know him.', 'img/witchhaticon.png'),
(18, ', You already bought outfit for Halloween?', 'img/bag.png'),
(19, ', Today there is a fear of bats.', 'img/batsmoonicon.png'),
(20, ', This hat has decided that now you will not get sweets.', 'img/hat.png'),
(21, ', Be attentively,  con zombies come.', 'img/zombie.png'),
(22, ', In this terrible night, you will hear loud cries.', 'img/scream.png');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `human`
--
ALTER TABLE `human`
  ADD CONSTRAINT `human_ibfk_1` FOREIGN KEY (`id_prediction`) REFERENCES `prediction` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
