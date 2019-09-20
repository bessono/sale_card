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

    public function getSettings(){
        return $this->find()->select(['*'])->one();
    }

    public function updateData($model){
        $settings = $this->find()->one();
        $settings->first_step = $model->first_step;
        $settings->first_discount_percent = $model->first_discount_percent;
        $settings->second_step = $model->second_step;
        $settings->second_discount_percent = $model->second_discount_percent;
        $settings->third_step = $model->third_step;
        $settings->third_discount_percent = $model->third_discount_percent;
        $settings->bonus_discount_percent = $model->bonus_discount_percent;
        return $settings->update();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_step', 'first_discount_percent', 'second_step', 'second_discount_percent', 'third_step', 'third_discount_percent', 'bonus_discount_percent'], 'number'],
            [['first_step', 'first_discount_percent', 'second_step', 'second_discount_percent', 'third_step', 'third_discount_percent', 'bonus_discount_percent'], 'required'],
            [['first_discount_percent', 'second_discount_percent','third_discount_percent', 'bonus_discount_percent'],'number', 'max'=>100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'first_step' => 'Первый порог',
            'first_discount_percent' => 'Процент скидки до первого порога',
            'second_step' => 'Второй порог',
            'second_discount_percent' => 'Процент скидки второго порога',
            'third_step' => 'Третий порог',
            'third_discount_percent' => 'Процент скидки третьего порога',
            'bonus_discount_percent' => 'Отчисления в бонусы с покупки (в виде процента)',
        ];
    }
}
