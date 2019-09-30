<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers_log".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $summ
 * @property string $additional
 */
class CustomersLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'summ'], 'integer'],
            [['additional'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'summ' => 'Сумма',
            'additional' => 'Доп. инфо',
        ];
    }

    public function getSummOfBuys($id){
        return $this->find()->select('SUM(summ) as summ')->where(['id'=>$id])->all();
    }
}
