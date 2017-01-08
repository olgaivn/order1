<?php

use yii\db\Migration;

class m161218_101746_stucture extends Migration
{
    public function up()
    {$this->execute (
 "CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(11) NOT NULL,
  `name_company` varchar(200) NOT NULL,
  `head` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id_customer`, `name_company`, `head`, `phone`, `address`) VALUES
(55, 'ughrkfgr', 'hkjehkjt', '78678', 'hhgshfg'),
(56, 'gf', 'uhiug8887', '8789', 'kjhkughu'),
(57, 'gf', 'uhiug8887', '8789', 'kjhkughu');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id_goods` int(11) NOT NULL,
  `name_goods` varchar(200) NOT NULL,
  `date_manufacture` date NOT NULL,
  `shelf_life` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_goods`, `name_goods`, `date_manufacture`, `shelf_life`) VALUES
(1, 'Торт Вишня', '2016-12-31', 3),
(2, 'Торт Сказка', '2016-09-01', 3),
(3, 'Пирожное Лакомка  ', '2016-10-03', 2),
(4, 'Пирожное Чудо', '2016-08-09', 2),
(5, 'Пирожное Опера', '2016-12-05', 2),
(6, 'Торт Пиковая дама', '2016-09-05', 3),
(7, 'Торт Наполеон', '2016-11-08', 2),
(8, 'Пирожное Новогоднее', '2016-12-23', 2),
(9, 'Торт Диво', '2016-12-22', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1482418202),
('m130524_201442_init', 1482418206),
('m161218_101746_stucture', 1482418839);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_goodss` int(11) NOT NULL,
  `id_customers` int(11) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'order', 'pf8dS-LJpY9ugKc6kSHQ_FeAgviNHAQ-', '$2y$13$/PKnGf3GrwIcX3V9Y18wKeOpcyGZcshXfqJq6iROVVUaReRdP4xgq', NULL, 'order@mail.ru', 10, 1482419310, 1482419310);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_goods`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_goodss` (`id_goodss`,`id_customers`),
  ADD KEY `id_customers` (`id_customers`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_goods` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_customers`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_goodss`) REFERENCES `goods` (`id_goods`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

");
    }


    public function down()
    {
        echo "m161218_101746_stucture cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
