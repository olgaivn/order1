<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id_customer
 * @property string $name_company
 * @property string $head
 * @property string $phone
 * @property string $address
 *
 * @property Order $order
 * @property Goods[] $idOrders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_company', 'head', 'phone', 'address'], 'required','message'=>'Поле обязательное для заполнения'],
            [['name_company', 'head', 'address'], 'string', 'max' => 200],
            [['phone'], 'number', 'message'=>'Введите числовое значение'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Номер заказчика',
            'name_company' => 'Название компании',
            'head' => 'Руководитель',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id_order' => 'id_customer']);
    }

    
}
