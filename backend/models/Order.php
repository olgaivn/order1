<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id_order
 * @property string $date_order
 * @property integer $id_goods
 * @property integer $id_customer
 * @property string $status
 * @property integer $quantity
 *
 * @property Customer $idOrder
 * @property Goods $idOrder0
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_order', 'id_goods', 'id_customer', 'quantity'], 'required', 'message'=>'Поле обязательное для заполнения'],
			[['date_order'], 'date', 'format' => 'y-m-d H:i:s',
			'message'=>'Неверный формат даты'],
            [['date_order'], 'safe'],
            [['id_goods', 'id_customer', 'quantity'], 'integer', 'message'=>'Должно быть числовое значение'],
            [['status'], 'string', 'max' => 200],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_order' => 'id_customer']],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['id_order' => 'id_goods']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'date_order' => 'Дата заказа',
            'id_goods' => 'Id Товара',
            'id_customer' => 'Id Заказчика',
            'status' => 'Статус',
            'quantity' => 'Количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder()
    {
        return $this->hasOne(Customer::className(), ['id_customer' => 'id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder0()
    {
        return $this->hasOne(Goods::className(), ['id_goods' => 'id_order']);
    }
}
