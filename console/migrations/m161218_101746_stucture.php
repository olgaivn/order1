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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id_customer`, `name_company`, `head`, `phone`, `address`) VALUES
(1, 'ПАО Дива', 'Ильин Андрей Павлович', '89233456787', 'г.Новосибирск ул.Некрасова, 4'),
(2, 'ООО Дом чудес', 'Ульянова Галина Петровна', '89613453456', 'г. Кемерово ул.Гоголя, 452 '),
(3, ' НАО Сладкофф', 'Васильва Римма Аркадьевна', '89452342454', 'г.Иркутск ул.Ленина, 34'),
(4, 'НАО Кондитер', 'Толмачев Д.П.', '89231145733', 'г.Пермь , ул.Лесная, 32'),
(5, 'ООО Вкусный', 'Орлова О.Л.', '83251354343', 'г. Омск , ул. Кирова, 34'),
(6, 'ООО Вкус детства', 'Владимиров Владимир Владимирович', '84326547578', 'г. Омск , ул. Фрунзе,34'),
(33, 'ООО Солнце', 'Новгороднева Оксана Юрьевна', '89543423523', 'г.Обь , ул. Новая'),
(34, 'ООО Денек', 'Искров  Игорь Владимирович', '89342567869', 'г. Мирный, ул. Ленина, 23'),
(35, 'шршп', 'ррре', '98798', 'лшршгр'),
(36, 'рлгрпщг', 'рагна', '7687', 'аенан'),
(37, 'гпркг', 'ороорр', '8877', 'лорлот'),
(38, 'hugeruigyg', 'kfhgd', '876853gt', 'reerr'),
(39, 'knbd', 'dhdf', 'dfhdf', 'fdshsd'),
(40, 'knbd', 'dhdf', '89798798', 'fdshsd'),
(41, 'dfghsd', 'nbjd', '9887', 'klhjh'),
(42, 'gbjh', 'hg', '87687', 'jgyjg'),
(43, 'gbjh', 'hg', '87687899999999999999', 'jgyjg'),
(44, 'gbjh', 'hg', '8768', 'jgyjg'),
(45, 'kfhbkfsd', 'ihfgrdfh', '89679835', 'uhgsudf');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id_goods` int(11) NOT NULL,
  `name_goods` varchar(200) NOT NULL,
  `date_manufacture` date NOT NULL,
  `shelf_life` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_goods`, `name_goods`, `date_manufacture`, `shelf_life`) VALUES
(1, 'Торт Вишня', '2016-10-01', 3),
(2, 'Торт Сказка', '2016-09-01', 3),
(3, 'Пирожное Лакомка  ', '2016-10-03', 2),
(4, 'Пирожное Чудо', '2016-08-09', 2),
(5, 'Пирожное Опера', '2016-12-05', 2),
(6, 'Торт Пиковая дама', '2016-09-05', 2),
(7, 'Торт Наполеон', '2016-11-08', 2),
(8, 'Пирожное Новогоднее', '2016-10-10', 2);

-- --------------------------------------------------------

--
-- 
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

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id_order`, `date_order`, `id_goodss`, `id_customers`, `status`, `quantity`) VALUES
(1, '2016-12-02 17:00:00', 2, 11, '1', 34),
(2, '2016-11-30 17:00:00', 2, 3, '1', 200),
(3, '2016-12-01 17:00:00', 4, 3, '1', 200),
(4, '2016-12-09 09:17:02', 4, 3, '1', 3653),
(5, '2016-12-11 09:18:17', 4, 3, '1', 53),
(6, '2016-12-12 09:21:42', 4, 4, '1', 563),
(7, '2016-12-18 13:49:50', 8, 8, '0', 786);

-- --------------------------------------------------------

--


--
--


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
--

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--


--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_goods` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `goods` (`id_goods`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;");
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
