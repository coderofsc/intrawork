-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 06 2019 г., 14:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.4.42

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `intrawork_etalon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `area` int(11) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `descr` text NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `position` int(11) DEFAULT '0',
  `bgcolor` varchar(7) DEFAULT NULL,
  `icon` varchar(32) NOT NULL DEFAULT 'fa-circle',
  `count_demands` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `grp` (`parent_id`),
  KEY `area` (`area`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `module_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`,`owner_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `legal` int(11) NOT NULL DEFAULT '1',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `opf` varchar(128) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `icq` varchar(32) NOT NULL DEFAULT '',
  `skype` varchar(64) NOT NULL DEFAULT '',
  `site` varchar(256) NOT NULL DEFAULT '',
  `legal_address` varchar(512) NOT NULL,
  `address` varchar(512) NOT NULL,
  `bank_account` varchar(64) NOT NULL,
  `bank_offset_account` varchar(64) NOT NULL,
  `bank_name` varchar(256) NOT NULL,
  `bank_inn` varchar(64) NOT NULL,
  `bank_kpp` varchar(64) NOT NULL,
  `bank_bik` varchar(64) NOT NULL,
  `face_name` varchar(32) NOT NULL,
  `face_surname` varchar(32) NOT NULL,
  `face_patronymic` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_mobile` varchar(128) NOT NULL,
  `phone_ext` varchar(128) NOT NULL,
  `descr` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`legal`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`),
  KEY `type_id` (`type_id`),
  KEY `user_id` (`user_id`),
  KEY `public` (`public`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `contacts_types`
--

CREATE TABLE IF NOT EXISTS `contacts_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_user_id` int(11) NOT NULL DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `descr` varchar(1024) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`create_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `demands`
--

CREATE TABLE IF NOT EXISTS `demands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '1',
  `project_id` int(11) NOT NULL DEFAULT '0',
  `branch` varchar(40) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `activity_date` timestamp NULL DEFAULT NULL,
  `activity_eid` int(11) NOT NULL DEFAULT '0',
  `deadline_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` text NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `work` tinyint(4) DEFAULT NULL,
  `eu_eid` int(11) NOT NULL DEFAULT '0',
  `ru_eid` int(11) NOT NULL DEFAULT '0',
  `criticality` int(11) DEFAULT '1',
  `contact_id` int(11) NOT NULL DEFAULT '0',
  `archive` tinyint(4) NOT NULL DEFAULT '0',
  `required_time` int(11) NOT NULL DEFAULT '0',
  `count_messages` int(11) NOT NULL DEFAULT '0',
  `mb_id` int(11) NOT NULL DEFAULT '0',
  `notice_auto_complete` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `percent_complete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `work` (`work`,`eu_eid`),
  KEY `cat` (`cat_id`),
  KEY `prioritet` (`priority`),
  KEY `status` (`status`),
  KEY `executor` (`eu_eid`),
  KEY `responsible` (`ru_eid`),
  KEY `parent_id` (`parent_id`),
  KEY `branch` (`branch`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`),
  KEY `contact` (`contact_id`),
  KEY `type_id` (`type_id`),
  KEY `project_id` (`project_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `demands`
--

INSERT INTO `demands` (`id`, `parent_id`, `type_id`, `project_id`, `branch`, `position`, `create_date`, `delete_user_id`, `delete_date`, `activity_date`, `activity_eid`, `deadline_date`, `title`, `cat_id`, `priority`, `status`, `work`, `eu_eid`, `ru_eid`, `criticality`, `contact_id`, `archive`, `required_time`, `count_messages`, `mb_id`, `notice_auto_complete`, `percent_complete`) VALUES
(1, 0, 1, 0, '73b4a51787456a60692317bd0113619bf2c236a2', 0, '2019-02-06 14:37:19', 0, NULL, '2019-02-06 14:43:11', 1, '0000-00-00 00:00:00', 'Указать верное имя и фамилию', 0, 100, 5, NULL, 1, 0, 1, 0, 0, 1800, 1, 0, '0000-00-00 00:00:00', 0),
(2, 0, 1, 0, '87092d4ff2683712cc8290ab3a591b5f762d3e43', 0, '2019-02-06 14:42:37', 0, NULL, '2019-02-06 14:43:33', 1, '0000-00-00 00:00:00', 'Добавить в систему коллег', 0, 100, 5, NULL, 1, 0, 1, 0, 0, 10800, 1, 0, '0000-00-00 00:00:00', 0),
(3, 0, 1, 0, 'd6b276d2e0982dcbf23a4ead67ceaca553624d00', 0, '2019-02-06 14:46:27', 0, NULL, '2019-02-06 14:46:27', 1, '0000-00-00 00:00:00', 'Создать категории задач', 0, 100, 1, NULL, 1, 0, 1, 0, 0, 18000, 1, 0, '0000-00-00 00:00:00', 0);

--
-- Триггеры `demands`
--
DROP TRIGGER IF EXISTS `tr_demands_insert_after`;
DELIMITER //
CREATE TRIGGER `tr_demands_insert_after` AFTER INSERT ON `demands`
 FOR EACH ROW BEGIN 
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0), NEW.id,'status',NEW.status, 0);

IF( NEW.eu_eid !=0 )
THEN
INSERT INTO demands_history_exec( demand_id, eu_eid,
STATUS )
VALUES (
NEW.id, NEW.eu_eid, NEW.status
);

INSERT IGNORE INTO `demands_members`
SET `demand_id` = NEW.id,
`eid` = NEW.eu_eid;

END IF ;

IF( NEW.ru_eid !=0 ) THEN INSERT IGNORE INTO `demands_members`
SET `demand_id` = NEW.id,
`eid` = NEW.ru_eid;

END IF ;

IF( NEW.cat_id !=0 ) THEN UPDATE categories SET count_demands = ( count_demands +1 ) WHERE id = NEW.cat_id;

END IF ;

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_demands_insert_before`;
DELIMITER //
CREATE TRIGGER `tr_demands_insert_before` BEFORE INSERT ON `demands`
 FOR EACH ROW BEGIN
IF (NEW.status = 2) /*В работе*/
THEN
SET NEW.work = 1;
END IF;

IF (NEW.parent_id != 0)
THEN
SET NEW.branch = (SELECT branch FROM demands WHERE id = NEW.parent_id);
ELSE
SET NEW.branch = SHA1(CONCAT(RAND(),SHA1(UNIX_TIMESTAMP(NOW()))));
END IF;

SET NEW.activity_date = NOW();
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_demands_update_after`;
DELIMITER //
CREATE TRIGGER `tr_demands_update_after` AFTER UPDATE ON `demands`
 FOR EACH ROW BEGIN

IF (NEW.status != OLD.status OR NEW.eu_eid != OLD.eu_eid)
THEN
SET @lastest_event_id:=0;
SET @lastest_event_open_time:=0;
SELECT d_e_h.id, UNIX_TIMESTAMP(d_e_h.open_time) INTO @lastest_event_id, @lastest_event_open_time FROM `demands_history_exec` d_e_h WHERE d_e_h.demand_id=NEW.id order by d_e_h.id DESC LIMIT 1;
UPDATE demands_history_exec SET close_time = NOW(), elapsed_time=UNIX_TIMESTAMP(NOW())-@lastest_event_open_time WHERE id = @lastest_event_id;
INSERT INTO demands_history_exec (demand_id,eu_eid, status) VALUES(NEW.id,NEW.eu_eid, NEW.status);
END IF;


IF (NEW.status!=OLD.status)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0), NEW.id,'status',NEW.status, OLD.status);
END IF;

IF (NEW.priority != OLD.priority)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'priority',NEW.priority, OLD.priority);
END IF;

IF (NEW.eu_eid != OLD.eu_eid)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'eu_eid',NEW.eu_eid, OLD.eu_eid);
REPLACE INTO `demands_members` SET `demand_id` = NEW.id, `eid` = NEW.eu_eid;
END IF;

IF (NEW.ru_eid != OLD.ru_eid)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'ru_eid',NEW.ru_eid, OLD.ru_eid);
REPLACE INTO `demands_members` SET `demand_id` = NEW.id, `eid` = NEW.ru_eid;
END IF;

IF (NEW.cat_id != OLD.cat_id)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'cat_id',NEW.cat_id, OLD.cat_id);

IF (NEW.cat_id != 0)
THEN
UPDATE categories SET count_demands=(count_demands+1) WHERE id=NEW.cat_id;
END IF;

IF (OLD.cat_id != 0)
THEN
UPDATE categories SET count_demands=(count_demands-1) WHERE id=OLD.cat_id;
END IF;


END IF;

IF (NEW.criticality != OLD.criticality)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'criticality',NEW.criticality, OLD.criticality);
END IF;

IF (NEW.required_time != OLD.required_time)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'required_time',NEW.required_time, OLD.required_time);
END IF;

IF (NEW.contact_id != OLD.contact_id)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'contact_id',NEW.contact_id, OLD.contact_id);
END IF;

IF (NEW.type_id != OLD.type_id)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'type_id',NEW.type_id, OLD.type_id);
END IF;

IF (NEW.deadline_date != OLD.deadline_date)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'deadline_date',UNIX_TIMESTAMP(NEW.deadline_date), UNIX_TIMESTAMP(OLD.deadline_date));
END IF;

IF (NEW.percent_complete != OLD.percent_complete)
THEN
INSERT INTO demands_history (user_id, demand_id,`column`,new_value, old_value) VALUES(IFNULL(@USER_ID,0),NEW.id,'percent_complete',NEW.percent_complete, OLD.percent_complete);
END IF;





END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_demands_update_before`;
DELIMITER //
CREATE TRIGGER `tr_demands_update_before` BEFORE UPDATE ON `demands`
 FOR EACH ROW BEGIN
IF (NEW.status = 2) /*В работе*/
THEN
SET NEW.work = 1;
ELSE
SET NEW.work = NULL;
END IF;

SET NEW.activity_date = NOW();
SET NEW.activity_eid = IFNULL(@USER_EID,0);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `demands_filters`
--

CREATE TABLE IF NOT EXISTS `demands_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `conditions` text NOT NULL,
  `sort` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `demands_history`
--

CREATE TABLE IF NOT EXISTS `demands_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `event_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `demand_id` int(11) NOT NULL,
  `column` varchar(32) NOT NULL,
  `new_value` int(11) NOT NULL,
  `old_value` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `demand_id` (`demand_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `demands_history`
--

INSERT INTO `demands_history` (`id`, `user_id`, `event_time`, `demand_id`, `column`, `new_value`, `old_value`) VALUES
(1, 1, '2019-02-06 14:37:19', 1, 'status', 1, 0),
(2, 1, '2019-02-06 14:38:15', 1, 'status', 2, 1),
(3, 1, '2019-02-06 14:38:15', 1, 'required_time', 1800, 0),
(4, 1, '2019-02-06 14:39:14', 1, 'status', 5, 2),
(5, 1, '2019-02-06 14:39:18', 1, 'status', 2, 5),
(6, 1, '2019-02-06 14:42:37', 2, 'status', 1, 0),
(7, 1, '2019-02-06 14:43:11', 1, 'status', 5, 2),
(8, 1, '2019-02-06 14:43:11', 2, 'status', 2, 1),
(9, 1, '2019-02-06 14:43:11', 2, 'required_time', 10800, 0),
(10, 1, '2019-02-06 14:43:33', 2, 'status', 5, 2),
(11, 1, '2019-02-06 14:46:27', 3, 'status', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `demands_history_exec`
--

CREATE TABLE IF NOT EXISTS `demands_history_exec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demand_id` int(11) NOT NULL,
  `open_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `close_time` timestamp NULL DEFAULT NULL,
  `elapsed_time` int(11) DEFAULT NULL,
  `eu_eid` int(11) NOT NULL,
  `ru_eid` int(11) NOT NULL DEFAULT '0' COMMENT 'пока не задействованна',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `demand_id` (`demand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `demands_history_exec`
--

INSERT INTO `demands_history_exec` (`id`, `demand_id`, `open_time`, `close_time`, `elapsed_time`, `eu_eid`, `ru_eid`, `status`) VALUES
(1, 1, '2019-02-06 14:37:19', '2019-02-06 14:38:15', 56, 1, 0, 1),
(2, 1, '2019-02-06 14:38:15', '2019-02-06 14:39:14', 59, 1, 0, 2),
(3, 1, '2019-02-06 14:39:14', '2019-02-06 14:39:18', 4, 1, 0, 5),
(4, 1, '2019-02-06 14:39:18', '2019-02-06 14:43:11', 233, 1, 0, 2),
(5, 2, '2019-02-06 14:42:37', '2019-02-06 14:43:11', 34, 1, 0, 1),
(6, 1, '2019-02-06 14:43:11', NULL, NULL, 1, 0, 5),
(7, 2, '2019-02-06 14:43:11', '2019-02-06 14:43:33', 22, 1, 0, 2),
(8, 2, '2019-02-06 14:43:33', NULL, NULL, 1, 0, 5),
(9, 3, '2019-02-06 14:46:27', NULL, NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `demands_members`
--

CREATE TABLE IF NOT EXISTS `demands_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eid` int(11) NOT NULL,
  `demand_id` int(11) NOT NULL,
  `count_messages` int(11) NOT NULL DEFAULT '0',
  `tracking` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `eid_2` (`eid`,`demand_id`),
  KEY `eid` (`eid`,`demand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `demands_members`
--

INSERT INTO `demands_members` (`id`, `create_date`, `eid`, `demand_id`, `count_messages`, `tracking`) VALUES
(2, '2019-02-06 14:37:19', 1, 1, 1, 1),
(4, '2019-02-06 14:42:37', 1, 2, 1, 1),
(6, '2019-02-06 14:46:27', 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `demands_messages`
--

CREATE TABLE IF NOT EXISTS `demands_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `style` varchar(16) NOT NULL DEFAULT '',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `demand_id` int(11) NOT NULL,
  `from_mb_id` int(11) NOT NULL DEFAULT '0',
  `from_eid` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `message` longtext NOT NULL,
  `first` tinyint(4) NOT NULL DEFAULT '0',
  `to_eid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `demand_id` (`demand_id`),
  KEY `eid` (`from_eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `demands_messages`
--

INSERT INTO `demands_messages` (`id`, `status`, `style`, `create_date`, `demand_id`, `from_mb_id`, `from_eid`, `title`, `message`, `first`, `to_eid`) VALUES
(1, 0, '', '2019-02-06 14:37:19', 1, 0, 1, 'Указать верное имя и фамилию', '<body>\r\nДетально заполнить данные профиля и идзменить данные для входа (e-mail и пароль)\r\n</body>\r\n\r\n', 1, 1),
(2, 0, '', '2019-02-06 14:42:37', 2, 0, 1, 'Добавить в систему коллег', '<body>\r\nПри необходимости, перед добавлением пользователей, создать роли (Настройки/Роли)\r\n</body>\r\n\r', 1, 1),
(3, 0, '', '2019-02-06 14:46:27', 3, 0, 1, 'Создать категории задач', '<body>\r\nОпределить какие виды задач будут решаться и по возможность разбить их на категории\r\n</body>\r\n\r', 1, 1);

--
-- Триггеры `demands_messages`
--
DROP TRIGGER IF EXISTS `tr_insert_after`;
DELIMITER //
CREATE TRIGGER `tr_insert_after` AFTER INSERT ON `demands_messages`
 FOR EACH ROW BEGIN
IF (NEW.from_eid != 0)
THEN
/*INSERT IGNORE*/
REPLACE INTO `demands_members` SET `demand_id` = NEW.demand_id, `eid` = NEW.from_eid;
UPDATE demands_members SET count_messages=(count_messages+1) WHERE demand_id = NEW.demand_id AND `eid` = NEW.from_eid;
UPDATE email_addresses SET count_demands=(count_demands+1) WHERE id=NEW.from_eid;
END IF;

UPDATE demands SET count_messages=(count_messages+1) WHERE id = NEW.demand_id;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `demands_messages_copies`
--

CREATE TABLE IF NOT EXISTS `demands_messages_copies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `demand_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `demand_id` (`demand_id`,`message_id`,`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `demands_types`
--

CREATE TABLE IF NOT EXISTS `demands_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_user_id` int(11) NOT NULL DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `create_user_id` int(11) NOT NULL,
  `default` tinyint(4) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL,
  `auto_complete` int(11) NOT NULL DEFAULT '0',
  `auto_complete_status` int(11) NOT NULL DEFAULT '0',
  `auto_complete_notice` int(11) NOT NULL DEFAULT '0',
  `auto_prolong` int(11) NOT NULL DEFAULT '0',
  `type` varchar(16) NOT NULL DEFAULT 'default',
  `descr` varchar(1024) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`create_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `demands_types`
--

INSERT INTO `demands_types` (`id`, `create_date`, `delete_user_id`, `delete_date`, `create_user_id`, `default`, `name`, `auto_complete`, `auto_complete_status`, `auto_complete_notice`, `auto_prolong`, `type`, `descr`) VALUES
(1, '2019-02-06 14:35:27', 0, NULL, 0, 0, 'Задача', 0, 5, 0, 0, 'primary', '');

-- --------------------------------------------------------

--
-- Структура таблицы `demands_types_ts_m`
--

CREATE TABLE IF NOT EXISTS `demands_types_ts_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `ord` int(11) NOT NULL DEFAULT '0',
  `active_role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_id` (`type_id`,`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `demands_types_ts_m`
--

INSERT INTO `demands_types_ts_m` (`id`, `type_id`, `status_id`, `ord`, `active_role`) VALUES
(1, 1, 1, 0, 1),
(2, 1, 2, 1, 2),
(3, 1, 4, 2, 0),
(4, 1, 8, 3, 0),
(5, 1, 7, 4, 3),
(6, 1, 5, 5, 0),
(7, 1, 3, 6, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `demands_types_ts_s`
--

CREATE TABLE IF NOT EXISTS `demands_types_ts_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `m_status_id` int(11) NOT NULL,
  `s_status_id` int(11) NOT NULL,
  `ord` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_id` (`type_id`,`m_status_id`,`s_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `demands_types_ts_s`
--

INSERT INTO `demands_types_ts_s` (`id`, `type_id`, `m_status_id`, `s_status_id`, `ord`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 1, 2, 1),
(3, 1, 1, 4, 2),
(4, 1, 2, 2, 0),
(5, 1, 2, 5, 1),
(6, 1, 2, 3, 2),
(7, 1, 4, 2, 0),
(8, 1, 4, 4, 1),
(9, 1, 8, 8, 0),
(10, 1, 7, 7, 0),
(11, 1, 7, 3, 1),
(12, 1, 5, 2, 0),
(13, 1, 5, 5, 1),
(14, 1, 5, 3, 2),
(15, 1, 3, 2, 0),
(16, 1, 3, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `area` int(11) NOT NULL DEFAULT '0',
  `name` text NOT NULL,
  `descr` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area` (`area`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `email_addresses`
--

CREATE TABLE IF NOT EXISTS `email_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(128) NOT NULL,
  `count_demands` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `email_addresses`
--

INSERT INTO `email_addresses` (`id`, `create_date`, `email`, `count_demands`) VALUES
(1, '2019-02-06 14:02:26', 'admin@admin.com', 3),
(2, '2019-02-06 14:18:02', 'asfsadf@adfasdf.ru', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_eid` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `object_name` varchar(128) DEFAULT NULL,
  `crud` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_eid` (`user_eid`,`owner_id`,`crud`),
  KEY `object_id` (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id`, `create_date`, `user_eid`, `owner`, `owner_id`, `object_id`, `object_name`, `crud`) VALUES
(1, '2019-02-06 14:18:02', 1, 0, 512, 2, '1 2', 8),
(2, '2019-02-06 14:19:58', 1, 0, 512, 2, '1 2', 4),
(3, '2019-02-06 14:20:52', 1, 0, 256, 1, 'Администратор системы', 8),
(4, '2019-02-06 14:27:11', 1, 0, 256, 1, 'Администратор системы', 2),
(5, '2019-02-06 14:35:27', 1, 0, 32768, 1, 'Задача', 8),
(6, '2019-02-06 14:37:19', 1, 1, 0, 1, 'Указать верное имя и фамилию', 8),
(7, '2019-02-06 14:38:15', 1, 1, 0, 1, 'Указать верное имя и фамилию', 2),
(8, '2019-02-06 14:39:14', 1, 1, 0, 1, 'Указать верное имя и фамилию', 2),
(9, '2019-02-06 14:39:18', 1, 1, 0, 1, 'Указать верное имя и фамилию', 2),
(10, '2019-02-06 14:42:37', 1, 1, 0, 2, 'Добавить в систему коллег', 8),
(11, '2019-02-06 14:43:11', 1, 1, 0, 2, 'Добавить в систему коллег', 2),
(12, '2019-02-06 14:43:33', 1, 1, 0, 2, 'Добавить в систему коллег', 2),
(13, '2019-02-06 14:46:27', 1, 1, 0, 3, 'Создать категории задач', 8),
(14, '2019-02-06 14:48:40', 1, 0, 64, 1, 'Добро пожаловать в Интраворк', 8),
(15, '2019-02-06 14:49:30', 1, 0, 512, 1, 'Горохов Борис', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`,`module_id`,`object_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `storage_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `storage_id` (`storage_id`,`folder_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `files_folders`
--

CREATE TABLE IF NOT EXISTS `files_folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `public` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `private` (`public`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Папки файлов' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `file_storage`
--

CREATE TABLE IF NOT EXISTS `file_storage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `owner_hash` varchar(40) NOT NULL,
  `user_eid` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(256) NOT NULL,
  `ext` varchar(16) NOT NULL,
  `mimetype` varchar(64) NOT NULL,
  `size` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `root` varchar(32) DEFAULT NULL,
  `dir` varchar(16) NOT NULL,
  `filename` varchar(40) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT '0',
  `used` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ext` (`ext`),
  KEY `hash` (`hash`),
  KEY `thumb` (`thumb`),
  KEY `owner` (`owner`,`owner_hash`,`user_eid`),
  KEY `used` (`used`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `mailbots`
--

CREATE TABLE IF NOT EXISTS `mailbots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL DEFAULT '0',
  `demand_type_id` int(11) NOT NULL DEFAULT '1',
  `protocol` int(11) NOT NULL DEFAULT '0',
  `server` varchar(128) NOT NULL,
  `port` int(11) NOT NULL DEFAULT '110',
  `login` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `descr` varchar(512) NOT NULL,
  `confirm` tinyint(4) NOT NULL DEFAULT '1',
  `from_unknown` tinyint(4) NOT NULL DEFAULT '1',
  `master` tinyint(4) NOT NULL DEFAULT '0',
  `footer` tinyint(4) NOT NULL DEFAULT '1',
  `count_in` int(11) NOT NULL DEFAULT '0',
  `count_out` int(11) NOT NULL DEFAULT '0',
  `regex` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `mailman_messages`
--

CREATE TABLE IF NOT EXISTS `mailman_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL DEFAULT '0',
  `subject` varchar(64) NOT NULL,
  `message` text NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `from_mb_id` int(11) NOT NULL DEFAULT '0',
  `from_eid` int(11) DEFAULT NULL,
  `json_ar_attach` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `mailman_messages`
--

INSERT INTO `mailman_messages` (`id`, `create_date`, `type`, `subject`, `message`, `event_id`, `from_mb_id`, `from_eid`, `json_ar_attach`) VALUES
(1, '2019-02-06 14:18:02', 0, 'Горохов Б. создал объект "Пользователь"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> создал объект &mdash; пользователь «<a href="http://app.intrawork.loc/users/view/2/">1 2</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Имя</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">2</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Фамилия</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">1</td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Электропочта</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">asfsadf@adfasdf.ru</td>\r\n                    </tr>\r\n                                                                                                                </tbody>\r\n</table>\r\n', 1, 0, 1, NULL),
(2, '2019-02-06 14:19:58', 0, 'Горохов Б. удалил объект "Пользователь"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> удалил объект &mdash; пользователь «<a href="http://app.intrawork.loc/users/view/2/">1 2</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Имя</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">2</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Фамилия</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">1</td>\r\n                    </tr>\r\n                                                                                                                                        </tbody>\r\n</table>\r\n\r\n', 1, 0, 1, NULL),
(3, '2019-02-06 14:20:52', 0, 'Горохов Б. создал объект "Роль"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> создал объект &mdash; роль «<a href="http://app.intrawork.loc/roles/view/1/">Администратор системы</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Название</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Администратор системы</td>\r\n                    </tr>\r\n                                        </tbody>\r\n</table>\r\n', 1, 0, 1, NULL),
(4, '2019-02-06 14:35:28', 0, 'Горохов Б. создал объект "Тип заявки"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> создал объект &mdash; тип заявки «<a href="http://app.intrawork.loc/demands/types/view/1/">Задача</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Название</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Задача</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Тип</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">primary</td>\r\n                    </tr>\r\n                                                                </tbody>\r\n</table>\r\n', 1, 0, 1, NULL),
(5, '2019-02-06 14:37:19', 0, 'Горохов Б. создал объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> создал объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/1/">Указать верное имя и фамилию</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                                <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Заголовок</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Указать верное имя и фамилию</td>\r\n                    </tr>\r\n                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Категория</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Неразобранное </td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Исполнитель</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Горохов Б.</td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Тип заявки</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Задача</td>\r\n                    </tr>\r\n                                                                <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Приоритет</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Низкий (100)</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Критичность</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Низкая</td>\r\n                    </tr>\r\n                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Требуется часов</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Не указано</td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Почтовый бот</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Без значения</td>\r\n                    </tr>\r\n                                        </tbody>\r\n</table>\r\n', 1, 0, 1, NULL),
(6, '2019-02-06 14:37:19', 0, '[#1]: Указать верное имя и фамилию', '\r\n<body>\r\nДетально заполнить данные <a href="http://app.intrawork.loc/users/edit/1/" target="">профиля&nbsp;</a>\r\n</body>\r\n\r\r\n\r\n<br/>\r\n<blockquote type="cite">\r\n    \r\n</blockquote>\r\n\r\n<br/>\r\n<div style="color: #a1a1a1; font-size:12px;">\r\n<hr style="margin-bottom:6px;height:1px;border:none;color:#cfcfcf;background-color:#cfcfcf;"/>\r\n<strong>Детали заявки</strong><br/>\r\nКод заявки: 1<br/>\r\nКатегория: Неразобранное <br/>\r\n    Ссылка: <a href="http://app.intrawork.loc/demands/view/1/">http://app.intrawork.loc/demands/view/1/</a>\r\n</div>\r\n', 2, 0, 1, '[]'),
(7, '2019-02-06 14:38:15', 0, 'Горохов Б. изменил объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> изменил объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/1/">Указать верное имя и фамилию</a>»\r\n<br/><br/>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Старое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Статус</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">В работе</td>\r\n                            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Новая</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Требуется часов</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">30 минут</td>\r\n                            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Не указано</td>\r\n                    </tr>\r\n                </tbody>\r\n</table>\r\n\r\n\r\n\r\n', 1, 0, 1, NULL),
(8, '2019-02-06 14:39:14', 0, 'Горохов Б. изменил объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> изменил объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/1/"></a>»\r\n<br/><br/>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Старое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Статус</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Пауза</td>\r\n                            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">В работе</td>\r\n                    </tr>\r\n                </tbody>\r\n</table>\r\n\r\n\r\n\r\n', 1, 0, 1, NULL),
(9, '2019-02-06 14:39:18', 0, 'Горохов Б. изменил объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> изменил объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/1/"></a>»\r\n<br/><br/>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Старое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Статус</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">В работе</td>\r\n                            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Пауза</td>\r\n                    </tr>\r\n                </tbody>\r\n</table>\r\n\r\n\r\n\r\n', 1, 0, 1, NULL),
(10, '2019-02-06 14:42:37', 0, 'Горохов Б. создал объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> создал объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/2/">Добавить в систему коллег</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                                <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Заголовок</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Добавить в систему коллег</td>\r\n                    </tr>\r\n                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Категория</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Неразобранное </td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Исполнитель</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Горохов Б.</td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Тип заявки</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Задача</td>\r\n                    </tr>\r\n                                                                <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Приоритет</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Низкий (100)</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Критичность</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Низкая</td>\r\n                    </tr>\r\n                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Требуется часов</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Не указано</td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Почтовый бот</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Без значения</td>\r\n                    </tr>\r\n                                        </tbody>\r\n</table>\r\n', 1, 0, 1, NULL),
(11, '2019-02-06 14:42:37', 0, '[#2]: Добавить в систему коллег', '\r\n<body>\r\nПри необходимости, перед добавлением пользователей, создать роли (Настройки/Роли)\r\n</body>\r\n\r\r\n\r\n<br/>\r\n<blockquote type="cite">\r\n    \r\n</blockquote>\r\n\r\n<br/>\r\n<div style="color: #a1a1a1; font-size:12px;">\r\n<hr style="margin-bottom:6px;height:1px;border:none;color:#cfcfcf;background-color:#cfcfcf;"/>\r\n<strong>Детали заявки</strong><br/>\r\nКод заявки: 2<br/>\r\nКатегория: Неразобранное <br/>\r\n    Ссылка: <a href="http://app.intrawork.loc/demands/view/2/">http://app.intrawork.loc/demands/view/2/</a>\r\n</div>\r\n', 2, 0, 1, '[]'),
(12, '2019-02-06 14:43:11', 0, 'Горохов Б. изменил объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> изменил объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/2/">Добавить в систему коллег</a>»\r\n<br/><br/>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Старое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Статус</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">В работе</td>\r\n                            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Новая</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Требуется часов</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">3 часа</td>\r\n                            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Не указано</td>\r\n                    </tr>\r\n                </tbody>\r\n</table>\r\n\r\n\r\n\r\n', 1, 0, 1, NULL),
(13, '2019-02-06 14:43:33', 0, 'Горохов Б. изменил объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> изменил объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/2/"></a>»\r\n<br/><br/>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Старое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Статус</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Пауза</td>\r\n                            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">В работе</td>\r\n                    </tr>\r\n                </tbody>\r\n</table>\r\n\r\n\r\n\r\n', 1, 0, 1, NULL),
(14, '2019-02-06 14:46:27', 0, 'Горохов Б. создал объект "Заявка"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> создал объект &mdash; заявка «<a href="http://app.intrawork.loc/demands/view/3/">Создать категории задач</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                                <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Заголовок</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Создать категории задач</td>\r\n                    </tr>\r\n                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Категория</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Неразобранное </td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Исполнитель</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Горохов Б.</td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Тип заявки</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Задача</td>\r\n                    </tr>\r\n                                                                <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Приоритет</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Низкий (100)</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Критичность</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Низкая</td>\r\n                    </tr>\r\n                                                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Требуется часов</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">5 часов</td>\r\n                    </tr>\r\n                                        <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Почтовый бот</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Без значения</td>\r\n                    </tr>\r\n                                        </tbody>\r\n</table>\r\n', 1, 0, 1, NULL),
(15, '2019-02-06 14:46:27', 0, '[#3]: Создать категории задач', '\r\n<body>\r\nОпределить какие виды задач будут решаться и по возможность разбить их на категории\r\n</body>\r\n\r\r\n\r\n<br/>\r\n<blockquote type="cite">\r\n    \r\n</blockquote>\r\n\r\n<br/>\r\n<div style="color: #a1a1a1; font-size:12px;">\r\n<hr style="margin-bottom:6px;height:1px;border:none;color:#cfcfcf;background-color:#cfcfcf;"/>\r\n<strong>Детали заявки</strong><br/>\r\nКод заявки: 3<br/>\r\nКатегория: Неразобранное <br/>\r\n    Ссылка: <a href="http://app.intrawork.loc/demands/view/3/">http://app.intrawork.loc/demands/view/3/</a>\r\n</div>\r\n', 2, 0, 1, '[]'),
(16, '2019-02-06 14:48:40', 0, 'Горохов Б. создал объект "Новость"', '<p>Пользователь <a href="http://app.intrawork.loc/users/view/1/">Горохов Б.</a> создал объект &mdash; новость «<a href="http://app.intrawork.loc/news/view/1/">Добро пожаловать в Интраворк</a>»</p>\r\n\r\n<table border="0" style="border-collapse: collapse; border-spacing: 0; width:100%; max-width:800px;">\r\n    <thead>\r\n    <tr>\r\n        <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Свойство</th>\r\n                    <th style="font-size:14px; text-align:left; padding: 8px; vertical-align: top;">Новое значение</th>\r\n            </tr>\r\n    </thead>\r\n    <tbody>\r\n                    <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Заголовок</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Добро пожаловать в Интраворк</td>\r\n                    </tr>\r\n                            <tr>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Текст новости</td>\r\n            <td style="font-size:14px; border-top: 1px solid #dddddd; padding: 8px; vertical-align: top;">Приятной работы...</td>\r\n                    </tr>\r\n                </tbody>\r\n</table>\r\n', 1, 0, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mailman_recipients`
--

CREATE TABLE IF NOT EXISTS `mailman_recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `to_eid` int(11) NOT NULL,
  `json_ar_e_copies` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `message_id` (`message_id`,`to_eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `mailman_recipients`
--

INSERT INTO `mailman_recipients` (`id`, `message_id`, `to_eid`, `json_ar_e_copies`) VALUES
(1, 6, 1, '[]'),
(2, 11, 1, '[]'),
(3, 15, 1, '[]');

-- --------------------------------------------------------

--
-- Структура таблицы `mrooms`
--

CREATE TABLE IF NOT EXISTS `mrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `area` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `rflags` int(11) NOT NULL DEFAULT '0',
  `descr` varchar(1024) NOT NULL,
  `bgcolor` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `mrooms_reservations`
--

CREATE TABLE IF NOT EXISTS `mrooms_reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `mroom_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `descr` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `area` (`mroom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `force_view` tinyint(4) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `news` text NOT NULL,
  `publish` tinyint(4) NOT NULL DEFAULT '1',
  `publish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`),
  KEY `force_view` (`force_view`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `force_view`, `create_date`, `delete_user_id`, `delete_date`, `user_id`, `title`, `news`, `publish`, `publish_date`) VALUES
(1, 0, '2019-02-06 14:48:40', 0, NULL, 1, 'Добро пожаловать в Интраворк', 'Приятной работы', 1, '2019-02-06 14:47:00');

-- --------------------------------------------------------

--
-- Структура таблицы `news_view`
--

CREATE TABLE IF NOT EXISTS `news_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `news_view`
--

INSERT INTO `news_view` (`id`, `create_date`, `user_id`, `news_id`) VALUES
(1, '2019-02-06 14:48:52', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `descr` text,
  PRIMARY KEY (`id`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `descr` text,
  PRIMARY KEY (`id`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `projects_versions`
--

CREATE TABLE IF NOT EXISTS `projects_versions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `version_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `project_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `descr` varchar(512) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `version_date` (`version_date`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `query_forgot_password`
--

CREATE TABLE IF NOT EXISTS `query_forgot_password` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `magic` text NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` datetime NOT NULL,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `descr` varchar(512) DEFAULT NULL,
  `filter` tinyint(4) NOT NULL DEFAULT '0',
  `filter_data` varchar(1024) NOT NULL DEFAULT '',
  `limited_setting` tinyint(4) NOT NULL DEFAULT '0',
  `project_member` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `create_date`, `delete_user_id`, `delete_date`, `name`, `descr`, `filter`, `filter_data`, `limited_setting`, `project_member`) VALUES
(1, '2019-02-06 17:20:52', 0, NULL, 'Администратор системы', '', 0, 'a:0:{}', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `roles_crud_categories`
--

CREATE TABLE IF NOT EXISTS `roles_crud_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `crud` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`,`object_id`,`crud`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `roles_crud_categories`
--

INSERT INTO `roles_crud_categories` (`id`, `role_id`, `object_id`, `crud`) VALUES
(1, 1, 0, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `roles_crud_module`
--

CREATE TABLE IF NOT EXISTS `roles_crud_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `crud` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`,`object_id`,`crud`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `roles_crud_module`
--

INSERT INTO `roles_crud_module` (`id`, `role_id`, `object_id`, `crud`) VALUES
(30, 1, 65536, 15),
(29, 1, 32768, 15),
(28, 1, 16384, 15),
(27, 1, 8192, 15),
(26, 1, 1024, 15),
(25, 1, 512, 15),
(24, 1, 256, 15),
(23, 1, 128, 15),
(22, 1, 64, 15),
(21, 1, 32, 15),
(20, 1, 16, 15),
(19, 1, 8, 15),
(18, 1, 4, 14),
(17, 1, 2, 15),
(16, 1, 1, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cdate` int(11) NOT NULL,
  `udate` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_author` (`sender_id`),
  KEY `id_recipient` (`recipient_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `thread_messages`
--

CREATE TABLE IF NOT EXISTS `thread_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cdate` int(11) NOT NULL,
  `message` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_thread` (`thread_id`,`cdate`),
  KEY `id_author` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `thread_messages_union`
--

CREATE TABLE IF NOT EXISTS `thread_messages_union` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_thread` (`thread_id`,`user_id`),
  KEY `id_m` (`message_id`),
  KEY `read` (`read`),
  KEY `user_id` (`user_id`,`read`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `thread_union`
--

CREATE TABLE IF NOT EXISTS `thread_union` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_thead` (`thread_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `demand_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_eid` (`user_id`,`demand_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `trash`
--
CREATE TABLE IF NOT EXISTS `trash` (
`id` varchar(40)
,`module_id` bigint(20)
,`delete_date` timestamp
,`delete_user_id` int(11)
,`object_id` int(11)
,`object_name` text
,`description` char(0)
,`extra_data` char(0)
);
-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `super_admin` tinyint(4) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_user_id` int(11) DEFAULT '0',
  `delete_date` timestamp NULL DEFAULT NULL,
  `activity_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `password` text,
  `name` varchar(64) DEFAULT NULL,
  `patronymic` varchar(64) NOT NULL,
  `surname` varchar(64) DEFAULT NULL,
  `phone` varchar(64) NOT NULL DEFAULT '',
  `phone_mobile` varchar(255) NOT NULL,
  `phone_ext` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `birthday` int(11) DEFAULT NULL,
  `avatar_storage_id` int(11) NOT NULL DEFAULT '0',
  `eid` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL DEFAULT '0',
  `icq` int(11) DEFAULT NULL,
  `skype` text,
  `dprt_id` int(11) DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  `descr` text,
  `session_lifetime` int(11) NOT NULL DEFAULT '0',
  `session_id` varchar(32) DEFAULT NULL,
  `session_state` text,
  `current_url` varchar(512) DEFAULT NULL,
  `lang` varchar(2) NOT NULL DEFAULT 'ru',
  `exec_notice` tinyint(4) NOT NULL DEFAULT '1',
  `exec_notice_weekdays` set('1','2','3','4','5','6','7') NOT NULL DEFAULT '1,2,3,4,5',
  `exec_notice_time` int(11) NOT NULL DEFAULT '8',
  `price_per_hour` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `area` (`super_admin`),
  KEY `dprt` (`dprt_id`),
  KEY `post` (`post_id`),
  KEY `eid` (`eid`),
  KEY `delete_date` (`delete_date`),
  KEY `delete_user_id` (`delete_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `super_admin`, `create_date`, `delete_user_id`, `delete_date`, `activity_date`, `password`, `name`, `patronymic`, `surname`, `phone`, `phone_mobile`, `phone_ext`, `room`, `birthday`, `avatar_storage_id`, `eid`, `contact_id`, `icq`, `skype`, `dprt_id`, `post_id`, `descr`, `session_lifetime`, `session_id`, `session_state`, `current_url`, `lang`, `exec_notice`, `exec_notice_weekdays`, `exec_notice_time`, `price_per_hour`) VALUES
(1, 1, '2019-02-06 14:02:26', 0, NULL, '2019-02-06 14:51:44', '579686611e10a4ca00f24e28ea0e59e06ab0f98a', 'Борис', '', 'Горохов', '', '', '', '', NULL, 0, 1, 0, 0, '', 0, 0, '', 0, 'jhtitq58cvo41b04l117r3n5q6', 'a:2:{s:4:"sort";a:8:{s:5:"users";a:2:{s:2:"by";s:13:"activity_date";s:3:"dir";s:4:"desc";}s:7:"demands";a:2:{s:3:"dir";s:4:"desc";s:2:"by";s:18:"work_activity_date";}s:0:"";a:2:{s:3:"dir";s:4:"desc";s:2:"by";s:9:"took_time";}s:4:"news";a:2:{s:2:"by";s:12:"publish_date";s:3:"dir";s:4:"desc";}s:19:"mrooms/reservations";a:2:{s:2:"by";s:8:"remaning";s:3:"dir";s:4:"desc";}s:8:"contacts";a:2:{s:2:"by";s:11:"create_date";s:3:"dir";s:3:"asc";}s:8:"projects";a:2:{s:2:"by";s:4:"name";s:3:"dir";s:3:"asc";}s:13:"demands/types";a:2:{s:2:"by";s:4:"name";s:3:"dir";s:3:"asc";}}s:13:"next_redirect";a:14:{s:11:"departments";i:0;s:5:"posts";i:1;s:5:"users";i:1;s:6:"mrooms";i:1;s:5:"roles";i:1;s:7:"demands";i:2;s:7:"clients";i:2;s:10:"categories";i:0;s:8:"mailbots";i:1;s:4:"news";i:1;s:19:"mrooms/reservations";i:1;s:14:"contacts/types";i:1;s:8:"contacts";i:1;s:13:"demands/types";i:1;}}', 'demands/', 'ru', 1, '1,2,3,4,5', 8, 0),
(2, 0, '2019-02-06 14:18:02', 1, '2019-02-06 14:19:58', '2019-02-06 14:19:20', '579686611e10a4ca00f24e28ea0e59e06ab0f98a', '2', '', '1', '', '', '', '', NULL, 0, 2, 0, 0, '', 0, 0, '', 0, 'jhtitq58cvo41b04l117r3n5q6', 'a:2:{s:4:"sort";a:7:{s:5:"users";a:2:{s:2:"by";s:13:"activity_date";s:3:"dir";s:4:"desc";}s:7:"demands";a:2:{s:3:"dir";s:4:"desc";s:2:"by";s:18:"work_activity_date";}s:0:"";a:2:{s:3:"dir";s:4:"desc";s:2:"by";s:9:"took_time";}s:4:"news";a:2:{s:2:"by";s:12:"publish_date";s:3:"dir";s:4:"desc";}s:19:"mrooms/reservations";a:2:{s:2:"by";s:8:"remaning";s:3:"dir";s:4:"desc";}s:8:"contacts";a:2:{s:2:"by";s:11:"create_date";s:3:"dir";s:3:"asc";}s:8:"projects";a:2:{s:2:"by";s:4:"name";s:3:"dir";s:3:"asc";}}s:13:"next_redirect";a:13:{s:11:"departments";i:0;s:5:"posts";i:1;s:5:"users";i:1;s:6:"mrooms";i:1;s:5:"roles";i:1;s:7:"demands";i:2;s:7:"clients";i:2;s:10:"categories";i:0;s:8:"mailbots";i:1;s:4:"news";i:1;s:19:"mrooms/reservations";i:1;s:14:"contacts/types";i:1;s:8:"contacts";i:1;}}', 'demands/?cnd[eu_eid]=2&cnd[status][]=1&cnd[status][]=2&cnd[status][]=5', 'ru', 1, '1,2,3,4,5', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_notification_crud_categories`
--

CREATE TABLE IF NOT EXISTS `users_notification_crud_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `crud` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`object_id`,`crud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users_notification_crud_module`
--

CREATE TABLE IF NOT EXISTS `users_notification_crud_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `crud` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`object_id`,`crud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users_roles`
--

CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Структура для представления `trash`
--
DROP TABLE IF EXISTS `trash`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trash` AS select sha(concat(`source`.`id`,'-',1)) AS `id`,1 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`name` AS `object_name`,'' AS `description`,'' AS `extra_data` from `categories` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',2)) AS `id`,2 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,concat_ws(' ',`source`.`face_surname`,`source`.`face_name`,`source`.`face_patronymic`,concat_ws(' ',if((`source`.`opf` <> ''),`source`.`opf`,NULL),concat('«',`source`.`company`,'»'))) AS `object_name`,'' AS `description`,'' AS `extra_data` from `contacts` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',4)) AS `id`,4 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`title` AS `object_name`,'' AS `description`,'' AS `extra_data` from `demands` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',8)) AS `id`,8 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`name` AS `object_name`,'' AS `description`,'' AS `extra_data` from `departments` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',1024)) AS `id`,1024 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`name` AS `object_name`,'' AS `description`,'' AS `extra_data` from `mailbots` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',16)) AS `id`,16 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`name` AS `object_name`,'' AS `description`,'' AS `extra_data` from `mrooms` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',64)) AS `id`,64 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`title` AS `object_name`,'' AS `description`,'' AS `extra_data` from `news` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',128)) AS `id`,128 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`name` AS `object_name`,'' AS `description`,'' AS `extra_data` from `posts` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',256)) AS `id`,256 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,`source`.`name` AS `object_name`,'' AS `description`,'' AS `extra_data` from `roles` `source` where (`source`.`delete_date` is not null) union select sha(concat(`source`.`id`,'-',512)) AS `id`,512 AS `module_id`,`source`.`delete_date` AS `delete_date`,`source`.`delete_user_id` AS `delete_user_id`,`source`.`id` AS `object_id`,concat_ws(' ',`source`.`surname`,`source`.`name`,`source`.`patronymic`) AS `object_name`,'' AS `description`,'' AS `extra_data` from `users` `source` where (`source`.`delete_date` is not null);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
