-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 09 2017 г., 15:02
-- Версия сервера: 5.7.20-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `expand_db`
--
CREATE DATABASE IF NOT EXISTS `expand_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `expand_db`;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `applicants_list`
--
CREATE TABLE `applicants_list` (
`vacancy_id` int(11)
,`title` text
,`student_id` int(11)
,`fullname` tinytext
,`score` bigint(21)
);

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `state` enum('accepted','pending','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `student_id`, `vacancy_id`, `state`) VALUES
(1, 1, 1, 'pending'),
(2, 9, 1, 'pending');

-- --------------------------------------------------------

--
-- Структура таблицы `clusters`
--

CREATE TABLE `clusters` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `clusters`
--

INSERT INTO `clusters` (`id`, `title`) VALUES
(3, 'Biology'),
(2, 'Economy'),
(1, 'Information technology'),
(4, 'Math');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `companies`
--
CREATE TABLE `companies` (
`company_id` int(11)
,`company_name` tinytext
);

-- --------------------------------------------------------

--
-- Структура таблицы `practice_vacancies`
--

CREATE TABLE `practice_vacancies` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cluster_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `practice_vacancies`
--

INSERT INTO `practice_vacancies` (`id`, `company_id`, `title`, `content`, `deadline`, `cluster_id`) VALUES
(1, 2, 'Internship in position of assistant', 'You are to help the Great and Powerful Evil Genius in his glorious villainous day-to-day deals.', '2017-11-08 23:39:19', 2);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `score_table`
--
CREATE TABLE `score_table` (
`student_id` int(11)
,`fullname` tinytext
,`cluster_id` int(11)
,`cluster_name` varchar(50)
,`score` bigint(21)
);

-- --------------------------------------------------------

--
-- Структура таблицы `solutions`
--

CREATE TABLE `solutions` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `state` enum('accepted','pending','rejected') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `solutions`
--

INSERT INTO `solutions` (`id`, `task_id`, `student_id`, `state`, `content`, `created`) VALUES
(1, 1, 1, 'accepted', 'Login: perry, password:not_not', '2017-11-08 18:05:48'),
(2, 2, 3, 'accepted', 'It is not good idea at all. I advise to try to coquer the world', '2017-11-08 18:05:48'),
(3, 3, 1, 'accepted', 'Man, you are silly -- there will not be difference at all', '2017-11-08 18:05:48');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `solutions_list`
--
CREATE TABLE `solutions_list` (
`sol_id` int(11)
,`sol_state` enum('accepted','pending','rejected')
,`task_id` int(11)
,`task_title` text
,`cluster_id` int(11)
,`cluster_title` varchar(50)
,`student_id` int(11)
,`fullname` tinytext
);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('available','opened','closed') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `author_id`, `cluster_id`, `title`, `content`, `created`, `deadline`, `status`) VALUES
(1, 2, 1, 'Crack the platypus page in VK', 'Do it and get free excursion in our office', '2017-11-08 17:54:58', '2017-11-09 00:00:00', 'available'),
(2, 2, 2, 'Hot chocolate', 'Create a business plan for cafe, that sel hot chocolate', '2017-11-08 17:54:58', '2017-11-09 00:00:00', 'available'),
(3, 2, 1, 'Hack the world', 'Write a virus, that is reprograming all coffee machines in the world and making it make cappuccino instead of latte', '2017-11-08 17:54:58', '2019-03-17 00:00:00', 'available'),
(4, 12, 4, 'Internet tariff', 'Write the Internet tariff specification that will be profitable for both our company and the client.', '2017-11-09 06:03:47', '2017-11-09 06:03:47', 'available');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `tasks_list`
--
CREATE TABLE `tasks_list` (
`task_id` int(11)
,`task_title` text
,`cluster_id` int(11)
,`cluster_title` varchar(50)
,`company_id` int(11)
,`company_name` tinytext
);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_company` tinyint(1) DEFAULT '0',
  `cluster_id` int(11) DEFAULT NULL,
  `fullname` tinytext NOT NULL,
  `password` varchar(64) NOT NULL,
  `username` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_company`, `cluster_id`, `fullname`, `password`, `username`) VALUES
(1, 0, 1, 'Studentus ordinarius', '5eb0ff537c11392a78fa1b306ba48864661e1d4d2405aa9dbb7c1dcde9d6d6c8', 'Tor'),
(2, 1, NULL, 'Doofenshmirtz Evil Inc', '0322045b024b257dd6f5a52d1468e5a49ffec2f4de1a7a6de3a4e5d3fc1171f1', 'Doofenshmirtz'),
(3, 0, 2, 'Ben Roberts', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'BigB'),
(4, 0, 3, 'John Larionov', '0896b9ac23ae0c56b1f2267abb4f710efeb76d914e7824d9f770659ce19772cb', 'Sun_glasses'),
(5, 0, 3, 'Alex Peel', 'd6e0d34ef1637a38142f42ecbad8a1af5b9c24fbcb4949fce417d5b6816f9fe1', 'TwoTowers'),
(6, 0, 4, 'Lena Larionova', '0896b9ac23ae0c56b1f2267abb4f710efeb76d914e7824d9f770659ce19772cb', 'Oak'),
(7, 0, 4, 'Peter Pen', '7e5821f744b25c1ede3b388597a098c67e6b03f4171a00d2c1fd92e07e63af4b', 'UltraWinner'),
(8, 0, 1, 'Lev Trotskiy', '05be70060a6f5dc752972884d3e1256faba659f6f4bae0a40a14b6ef28adc84b', 'Lenin'),
(9, 0, 1, 'Sasha Pen', '2257d6ae96ee5367198320ac469ab91e06eca55a963f996e3804da1c2d5ebb7d', 'Sleepwalker'),
(10, 0, 2, 'Lemon Peel', 'a0d12b5efc1da9e3375819511013139c48060059adfd139ee306770e36f31c48', 'Dancer'),
(11, 0, 2, 'Alex Macey', 'b103ed4f56c0cea76b915970ac0803a32c79d754745033ade11d660e3487f3e2', 'DeadDancer'),
(12, 1, NULL, 'Green Point', '62c2493451ef1be0e5ed53ad4021232deef0820aed563d2785cdd3695687196c', 'Green_point'),
(13, 1, NULL, 'Root Inc.', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 'root');

-- --------------------------------------------------------

--
-- Структура для представления `applicants_list`
--
DROP TABLE IF EXISTS `applicants_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`expand_remote`@`%` SQL SECURITY DEFINER VIEW `applicants_list`  AS  select `applications`.`vacancy_id` AS `vacancy_id`,`practice_vacancies`.`title` AS `title`,`applications`.`student_id` AS `student_id`,`users`.`fullname` AS `fullname`,if(isnull(`score_table`.`score`),0,`score_table`.`score`) AS `score` from (((`practice_vacancies` left join `applications` on((`practice_vacancies`.`id` = `applications`.`vacancy_id`))) left join `users` on((`applications`.`student_id` = `users`.`id`))) left join `score_table` on((`users`.`id` = `score_table`.`student_id`))) group by `practice_vacancies`.`id`,`applications`.`student_id`,`score_table`.`student_id` ;

-- --------------------------------------------------------

--
-- Структура для представления `companies`
--
DROP TABLE IF EXISTS `companies`;

CREATE ALGORITHM=UNDEFINED DEFINER=`expand_remote`@`%` SQL SECURITY DEFINER VIEW `companies`  AS  select `users`.`id` AS `company_id`,`users`.`fullname` AS `company_name` from `users` where (`users`.`is_company` = 1) group by `users`.`id` ;

-- --------------------------------------------------------

--
-- Структура для представления `score_table`
--
DROP TABLE IF EXISTS `score_table`;

CREATE ALGORITHM=UNDEFINED DEFINER=`expand_remote`@`%` SQL SECURITY DEFINER VIEW `score_table`  AS  select `users`.`id` AS `student_id`,`users`.`fullname` AS `fullname`,`users`.`cluster_id` AS `cluster_id`,(select `clusters`.`title` from `clusters` where (`clusters`.`id` = `users`.`cluster_id`)) AS `cluster_name`,count(`solutions`.`student_id`) AS `score` from (`users` join `solutions`) where ((`users`.`id` = `solutions`.`student_id`) and (`solutions`.`state` = 'accepted')) group by `users`.`id` order by `score` desc ;

-- --------------------------------------------------------

--
-- Структура для представления `solutions_list`
--
DROP TABLE IF EXISTS `solutions_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`expand_remote`@`%` SQL SECURITY DEFINER VIEW `solutions_list`  AS  select `solutions`.`id` AS `sol_id`,`solutions`.`state` AS `sol_state`,`tasks`.`id` AS `task_id`,`tasks`.`title` AS `task_title`,`clusters`.`id` AS `cluster_id`,`clusters`.`title` AS `cluster_title`,`users`.`id` AS `student_id`,`users`.`fullname` AS `fullname` from (((`solutions` left join `tasks` on((`solutions`.`task_id` = `tasks`.`id`))) left join `clusters` on((`tasks`.`cluster_id` = `clusters`.`id`))) left join `users` on((`solutions`.`student_id` = `users`.`id`))) group by `solutions`.`id`,`tasks`.`id`,`clusters`.`id`,`users`.`id` ;

-- --------------------------------------------------------

--
-- Структура для представления `tasks_list`
--
DROP TABLE IF EXISTS `tasks_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`expand_remote`@`%` SQL SECURITY DEFINER VIEW `tasks_list`  AS  select `tasks`.`id` AS `task_id`,`tasks`.`title` AS `task_title`,`clusters`.`id` AS `cluster_id`,`clusters`.`title` AS `cluster_title`,`users`.`id` AS `company_id`,`users`.`fullname` AS `company_name` from ((`tasks` left join `clusters` on((`tasks`.`cluster_id` = `clusters`.`id`))) left join `users` on(((`users`.`is_company` = 1) and (`tasks`.`author_id` = `users`.`id`)))) group by `tasks`.`id`,`clusters`.`id`,`users`.`id` ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_id_unique` (`student_id`,`vacancy_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `vacancy_id` (`vacancy_id`);

--
-- Индексы таблицы `clusters`
--
ALTER TABLE `clusters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title_unique` (`title`);

--
-- Индексы таблицы `practice_vacancies`
--
ALTER TABLE `practice_vacancies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `practice_vacancies_title_content_unique` (`title`(100),`content`(100)),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `practice_vacancies_cluster_id__fk_2` (`cluster_id`);

--
-- Индексы таблицы `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tasks_title_content_unique` (`title`(100),`content`(100)),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `cluster_id` (`cluster_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_uindex` (`username`),
  ADD KEY `cluster_id` (`cluster_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `clusters`
--
ALTER TABLE `clusters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `practice_vacancies`
--
ALTER TABLE `practice_vacancies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ib_fk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_ib_fk_2` FOREIGN KEY (`vacancy_id`) REFERENCES `practice_vacancies` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `practice_vacancies`
--
ALTER TABLE `practice_vacancies`
  ADD CONSTRAINT `practice_vacancies_cluster_id__fk_2` FOREIGN KEY (`cluster_id`) REFERENCES `clusters` (`id`),
  ADD CONSTRAINT `practice_vacancies_ib_fk_1` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `solutions`
--
ALTER TABLE `solutions`
  ADD CONSTRAINT `solutions_ib_fk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solutions_ib_fk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ib_fk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_ib_fk_2` FOREIGN KEY (`cluster_id`) REFERENCES `clusters` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ib_fk` FOREIGN KEY (`cluster_id`) REFERENCES `clusters` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
