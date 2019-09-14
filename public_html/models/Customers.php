<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $customer_name
 * @property string $customer_phone
 * @property string $card_id
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */

    public function getCountCustomers(){
        return $this->find()->count();
    }

    public function rules()
    {
        return [
            [['customer_name', 'customer_phone', 'card_id'], 'required'],
            [['customer_name'], 'string', 'max' => 250],
            [['customer_phone', 'card_id'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_name' => 'Фамилия Имя покупателя',
            'customer_phone' => 'Телефон покупателя',
            'card_id' => 'Номер карты',
        ];
    }
}
