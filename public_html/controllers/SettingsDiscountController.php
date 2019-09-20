<?php

namespace app\controllers;

use Yii;
use app\controllers\AccsessControl;
use yii\filters\AccessControl;
use app\models\SettingsDiscount;

class SettingsDiscountController extends \yii\web\Controller
{

    public function behaviors(){
        return [
            'access'=>[
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'roles'=>['manageDiscount'],
                    ]
                ]
            ]
        ];
    }

    public function actionEditForm()
    {
    	$model = new SettingsDiscount();
    	
    	if($model->load(Yii::$app->request->post()) && $model->validate()){
    		if($model->updateData($model)){
    			Yii::$app->session->setFlash('success','Данные сохранены');
    		} else {
    			Yii::$app->session->setFlash('error','Ошибка сохранениея, обратитесь к разработчику');
    		}
    	}
    	$current_settings = $model->getSettings();
    	return $this->render('edit-form',['model'=>$model,'current_settings'=>$current_settings]);
    }

}
