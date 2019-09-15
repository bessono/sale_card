<?php

namespace app\controllers;
use app\models\SettingsDiscount;
use Yii;


class SettingsDiscountController extends \yii\web\Controller
{
    public function actionEditForm()
    {
    	$model = new SettingsDiscount();
    	$current_settings = $model->getSettings();
    	if($model->load(Yii::$app->request->post()) && $model->validate()){
    		if($model->updateData($model)){
    			Yii::$app->session->setFlash('success','Данные сохранены');
    		} else {
    			Yii::$app->session->setFlash('error','Ошибка сохранениея, обратитесь к разработчику');
    		}
    	}
    	return $this->render('edit-form',['model'=>$model,'current_settings'=>$current_settings]);
    }

}
