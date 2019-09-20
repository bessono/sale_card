<?php

namespace app\controllers;
use Yii;
use app\models\Customers;
use app\models\Cards;
use app\controllers\AccessControll;
use yii\filters\AccessControl;

class CustomersController extends \yii\web\Controller
{
     public function behaviors(){
        return [
            'access'=>[
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'roles'=>['manageCustomers'],
                    ]
                ]
            ]
        ];
    }

    public function actionAddForm()
    {
    	$model = new Customers();
    	$cardsModel = new Cards();
    	if($model->load(Yii::$app->request->post()) && $model->validate()){
    		$postCustomer = Yii::$app->request->post('Customers');
    		$postCardId = $postCustomer['card_id'];
    			if($cardsModel->cardIsFree($postCardId)){
    				if($model->save()){
    					Yii::$app->session->setFlash('success','Покупатель добавлен');
    				}
    				if($cardsModel->setCardAsUsed($postCardId)){
    					Yii::$app->session->setFlash('success','Карта привязана к пользователю');	
    				} else {
    					Yii::$app->session->setFlash('error','Ошибка привязки карты к пользователю');	
    				}
    			} else {
    				Yii::$app->session->setFlash('error','Эту карту нельзя использовать');
    			}
    		return $this->render('add-form',['model'=>$model]);	
    	} else {
    		return $this->render('add-form',['model'=>$model]);	
    	}
        
    }

}
