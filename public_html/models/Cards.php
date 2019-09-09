<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property int $id
 * @property string $nomber
 * @property int $valid
 * @property int $valid_to
 * @property int $used
 * @property int $circulation
 * @property int $discount_percent
 * @property int $discount_bonus
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomber','valid_to','circulation'],'required'],
            [['valid'],'required'],
            [['nomber'], 'unique'],
            [['used', 'circulation', 'discount_percent', 'discount_bonus'], 'integer'],
            [['nomber'], 'string', 'max' => 25],

        ];
    }

    public function cardIssue($nomber){
        return $this->find()->where(['nomber'=>$nomber])->one();
    }

    public function dateCardById($id){
        $card = $this->find()->where(['id'=>$id])->one();
        return $card->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomber' => 'Номер',
            'valid' => 'Действительна',
            'valid_to' => 'Срок действия',
            'used' => 'В использовании',
            'circulation' => 'Номер выпуска',
            'discount_percent' => 'Проыент скидки',
            'discount_bonus' => 'Бонус',
        ];
    }
}
