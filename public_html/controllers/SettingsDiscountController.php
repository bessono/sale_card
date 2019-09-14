<?php

namespace app\controllers;
use app\models\SettingsDiscount;

class SettingsDiscountController extends \yii\web\Controller
{
    public function actionEditForm()
    {
    	$model = new SettingsDiscount();
        return $this->render('edit-form',['model'=>$model]);
    }

}
