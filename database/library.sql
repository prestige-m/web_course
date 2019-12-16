-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Дек 16 2019 г., 02:20
-- Версия сервера: 8.0.18
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `middle_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`, `surname`, `middle_name`) VALUES
(1, 'Джоан', 'Роулінг', NULL),
(2, 'Джонатан', 'Свіфт', NULL),
(3, 'Оскар', 'Вайлд', NULL),
(4, 'Джозеф', 'Конрад', NULL),
(5, 'Джон', 'Роналд Руел Толкін', NULL),
(6, 'Анджей', 'Сапковський', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` varchar(80) NOT NULL,
  `name` varchar(150) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `amount` int(11) NOT NULL DEFAULT '1',
  `image_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'no-image.png',
  PRIMARY KEY (`id`),
  KEY `publisher_id` (`publisher_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name`, `genre_id`, `publisher_id`, `year`, `pages`, `price`, `amount`, `image_name`) VALUES
('978-617-12-0499-7', 'Відьмак. Останнє бажання', 9, 5, 2016, 288, '0.00', 1, '978-617-12-0499-7.jpg'),
('978-617-585-031-2', 'Портрет Доріана Ґрея', 5, 1, 2018, 320, '110.00', 43, '1.jpg'),
('978-617-585-124-1', 'Фантастичні звірі і де їх шукати', 9, 1, 2017, 288, '186.00', 10, '2.png'),
('978-617-664-081-3', 'Серце пітьми', 5, 2, 2015, 160, '116.00', 8, '3.jpg'),
('978-617-664-082-0', 'Гобіт, або Туди і звідти\r\n', 9, 2, 2015, 384, '174.00', 63, '4.jpg'),
('978-617-664-093-6', 'Падіння Артура', 9, 2, 2016, 256, '198.00', 11, '5.jpg'),
('978-966-7047-43-6', 'Мандри Ґуллівера', 10, 1, 2015, 384, '130.00', 24, '6.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `book_author`
--

DROP TABLE IF EXISTS `book_author`;
CREATE TABLE IF NOT EXISTS `book_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` varchar(80) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id` (`author_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_author`
--

INSERT INTO `book_author` (`id`, `book_id`, `author_id`) VALUES
(2, '978-966-7047-43-6', 2),
(3, '978-617-585-031-2', 3),
(4, '978-617-585-124-1', 1),
(5, '978-617-664-081-3', 4),
(6, '978-617-664-093-6', 5),
(7, '978-617-664-082-0', 5),
(33, '978-617-12-0499-7', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `book_reservation`
--

DROP TABLE IF EXISTS `book_reservation`;
CREATE TABLE IF NOT EXISTS `book_reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `books` json NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `book_reservation`
--

INSERT INTO `book_reservation` (`id`, `customer_id`, `books`, `order_date`, `status`) VALUES
(2, 5, '[{\"id\": \"978-617-664-082-0\", \"name\": \"Гобіт, або Туди і звідти\\r\\n\", \"year\": \"2015\", \"pages\": \"384\", \"price\": \"174.00\", \"amount\": \"63\", \"genre_name\": \"Фентезі\", \"author_name\": \"Джон\", \"author_midname\": null, \"author_surname\": \"Роналд Руел Толкін\", \"publisher_name\": \"Астролябія\"}, {\"id\": \"978-617-664-093-6\", \"name\": \"Падіння Артура\", \"year\": \"2016\", \"pages\": \"256\", \"price\": \"198.00\", \"amount\": \"11\", \"genre_name\": \"Фентезі\", \"author_name\": \"Джон\", \"author_midname\": null, \"author_surname\": \"Роналд Руел Толкін\", \"publisher_name\": \"Астролябія\"}, {\"id\": \"978-966-7047-43-6\", \"name\": \"Мандри Ґуллівера\", \"year\": \"2015\", \"pages\": \"384\", \"price\": \"130.00\", \"amount\": \"24\", \"genre_name\": \"Сатира\", \"author_name\": \"Джонатан\", \"author_midname\": null, \"author_surname\": \"Свіфт\", \"publisher_name\": \"А-ба-ба-га-ла-ма-га\"}]', '2019-12-09 22:19:44', 1),
(7, 5, '[{\"id\": \"978-966-7047-43-6\", \"name\": \"Мандри Ґуллівера\", \"year\": \"2015\", \"pages\": \"384\", \"price\": \"130.00\", \"amount\": \"24\", \"genre_id\": \"10\", \"author_id\": \"2\", \"genre_name\": \"Сатира\", \"author_name\": \"Джонатан\", \"publisher_id\": \"1\", \"author_midname\": null, \"author_surname\": \"Свіфт\", \"publisher_name\": \"А-ба-ба-га-ла-ма-га\"}]', '2019-12-16 00:52:06', 1),
(8, 5, '[{\"id\": \"978-966-7047-43-6\", \"name\": \"Мандри Ґуллівера\", \"year\": \"2015\", \"pages\": \"384\", \"price\": \"130.00\", \"amount\": \"24\", \"genre_id\": \"10\", \"author_id\": \"2\", \"genre_name\": \"Сатира\", \"author_name\": \"Джонатан\", \"publisher_id\": \"1\", \"author_midname\": null, \"author_surname\": \"Свіфт\", \"publisher_name\": \"А-ба-ба-га-ла-ма-га\"}]', '2019-12-16 02:47:53', 1),
(9, 5, '[{\"id\": \"978-617-585-124-1\", \"name\": \"Фантастичні звірі і де їх шукати\", \"year\": \"2017\", \"pages\": \"288\", \"price\": \"186.00\", \"amount\": \"10\", \"genre_id\": \"9\", \"author_id\": \"1\", \"genre_name\": \"Фентезі\", \"author_name\": \"Джоан\", \"publisher_id\": \"1\", \"author_midname\": null, \"author_surname\": \"Роулінг\", \"publisher_name\": \"А-ба-ба-га-ла-ма-га\"}, {\"id\": \"978-966-7047-43-6\", \"name\": \"Мандри Ґуллівера\", \"year\": \"2015\", \"pages\": \"384\", \"price\": \"130.00\", \"amount\": \"24\", \"genre_id\": \"10\", \"author_id\": \"2\", \"genre_name\": \"Сатира\", \"author_name\": \"Джонатан\", \"publisher_id\": \"1\", \"author_midname\": null, \"author_surname\": \"Свіфт\", \"publisher_name\": \"А-ба-ба-га-ла-ма-га\"}, {\"id\": \"978-617-585-031-2\", \"name\": \"Портрет Доріана Ґрея\", \"year\": \"2018\", \"pages\": \"320\", \"price\": \"110.00\", \"amount\": \"43\", \"genre_id\": \"5\", \"author_id\": \"3\", \"genre_name\": \"Роман\", \"author_name\": \"Оскар\", \"publisher_id\": \"1\", \"author_midname\": null, \"author_surname\": \"Вайлд\", \"publisher_name\": \"А-ба-ба-га-ла-ма-га\"}, {\"id\": \"978-617-664-081-3\", \"name\": \"Серце пітьми\", \"year\": \"2015\", \"pages\": \"160\", \"price\": \"116.00\", \"amount\": \"8\", \"genre_id\": \"5\", \"author_id\": \"4\", \"genre_name\": \"Роман\", \"author_name\": \"Джозеф\", \"publisher_id\": \"2\", \"author_midname\": null, \"author_surname\": \"Конрад\", \"publisher_name\": \"Астролябія\"}, {\"id\": \"978-617-664-093-6\", \"name\": \"Падіння Артура\", \"year\": \"2016\", \"pages\": \"256\", \"price\": \"198.00\", \"amount\": \"11\", \"genre_id\": \"9\", \"author_id\": \"5\", \"genre_name\": \"Фентезі\", \"author_name\": \"Джон\", \"publisher_id\": \"2\", \"author_midname\": null, \"author_surname\": \"Роналд Руел Толкін\", \"publisher_name\": \"Астролябія\"}, {\"id\": \"978-617-664-082-0\", \"name\": \"Гобіт, або Туди і звідти\\r\\n\", \"year\": \"2015\", \"pages\": \"384\", \"price\": \"174.00\", \"amount\": \"63\", \"genre_id\": \"9\", \"author_id\": \"5\", \"genre_name\": \"Фентезі\", \"author_name\": \"Джон\", \"publisher_id\": \"2\", \"author_midname\": null, \"author_surname\": \"Роналд Руел Толкін\", \"publisher_name\": \"Астролябія\"}]', '2019-12-16 02:49:59', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Київ'),
(2, 'Львів'),
(3, 'Харків'),
(4, 'Вінниця'),
(5, 'Дніпро'),
(6, 'Житомир'),
(7, 'Запоріжжя'),
(8, 'Івано-Франківськ'),
(9, 'Кропивницький'),
(10, 'Луганськ'),
(11, 'Луцьк'),
(12, 'Миколаїв'),
(13, 'Одеса'),
(14, 'Полтава'),
(15, 'Рівне'),
(16, 'Суми'),
(17, 'Тернопіль'),
(18, 'Ужгород'),
(19, 'Донецьк'),
(20, 'Херсон'),
(21, 'Хмельницький'),
(22, 'Черкаси'),
(23, 'Чернівці'),
(24, 'Чернігів');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `photo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'default_avatar.png',
  `role_id` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `email`, `password`, `name`, `surname`, `middle_name`, `phone`, `photo`, `role_id`) VALUES
(1, 'user@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Андрій', 'Глущенко', 'Васильович', '380671704709', 'default_avatar.png', 2),
(5, 'admin@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Володимир', 'Шевченко', 'Володимирович', '380901115566', 'user5_avatar.jpg', 1),
(8, 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Сергій', 'Кривоніжка', 'Артемович', '0996001188', 'user8_avatar.jpg', 2),
(12, 'volod@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'qqqqq', 'qqqqq', 'qqqqq', '0667643200', 'default_avatar.png', 2),
(13, 'volod1@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'qqqqqq', 'wwwww', 'fdsfddsf', '0997775544', 'user13_avatar.jpg', 2),
(14, 'test1@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'qqqqq', 'qqqqqq', 'qqqqqqqq', '0995884477', 'default_avatar.png', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Казки'),
(2, 'Вірші'),
(3, 'Оповідання'),
(4, 'Повість'),
(5, 'Роман'),
(6, 'Драматургія'),
(7, 'Енциклопедія'),
(9, 'Фентезі'),
(10, 'Сатира');

-- --------------------------------------------------------

--
-- Структура таблицы `publisher`
--

DROP TABLE IF EXISTS `publisher`;
CREATE TABLE IF NOT EXISTS `publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `city_id`) VALUES
(1, 'А-ба-ба-га-ла-ма-га', 1),
(2, 'Астролябія', 2),
(3, 'Веселка', 1),
(4, 'Зелений Пес', 1),
(5, 'Клуб Сімейного Дозвілля', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `book_author_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_author_ibfk_3` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `book_reservation`
--
ALTER TABLE `book_reservation`
  ADD CONSTRAINT `book_reservation_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
