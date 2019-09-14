<?php

namespace app\controllers;

class SettingsDiscountController extends \yii\web\Controller
{
    public function actionEditForm()
    {
        return $this->render('edit-form');
    }

}
