<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings_discount".
 *
 * @property double $first_step
 * @property double $first_discount_percent
 * @property double $second_step
 * @property double $second_discount_percent
 * @property double $third_step
 * @property double $third_discount_percent
 * @property double $bonus_discount_percent
 */
class SettingsDiscount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings_discount';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_step', 'first_discount_percent', 'second_step', 'second_discount_percent', 'third_step', 'third_discount_percent', 'bonus_discount_percent'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'first_step' => 'First Step',
            'first_discount_percent' => 'First Discount Percent',
            'second_step' => 'Second Step',
            'second_discount_percent' => 'Second Discount Percent',
            'third_step' => 'Third Step',
            'third_discount_percent' => 'Third Discount Percent',
            'bonus_discount_percent' => 'Bonus Discount Percent',
        ];
    }
}
