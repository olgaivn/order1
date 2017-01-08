<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id_goods
 * @property string $name_goods
 * @property string $date_manufacture
 * @property integer $shelf_life
 *
 * @property Order[] $orders
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_goods', 'date_manufacture', 'shelf_life'], 'required', 'message'=>'Поле обязательно для заполнения'],
            [['date_manufacture'], 'safe'],
            [['shelf_life'], 'integer', 'message'=>'Должно быть числовое значение'],
            [['name_goods'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
      return [
            'id_goods' => 'Номер товара',
            'name_goods' => 'Название товара',
            'date_manufacture' => 'Дата производства(ГГГГ-ММ-ЧЧ)',
            'shelf_life' => 'Срок годности, дней',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_goodss' => 'id_goods']);
    }
}
