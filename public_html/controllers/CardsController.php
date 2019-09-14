<?php

namespace app\controllers;
use Yii;
use app\models\Cards;
use app\controllers\AccsessControl;
use yii\filters\AccessControl;
class CardsController extends \yii\web\Controller
{


    public function behaviors(){
        return [
        'access' => [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['manageCards'],
                ],
            ],
        ],
    ];
    }

    public function actionIndex()
    {
    	$model = new Cards;
    	if($model->load(Yii::$app->request->post()) && $model->validate(['nomber'])){
    		return $this->render('index',['model'=>$model]);
    	} else {
        	return $this->render('index',['model'=>$model]);
        }
    }

    public function actionAddForm(){
    	$model = new Cards();
    	$post_data = Yii::$app->request->post('Cards');
    	if($model->load(Yii::$app->request->post()) && $model->validate(['nomber','valid','valid_to','circulation'])){
    		$model->valid_to = strtotime($post_data['valid_to']);
    		$model->used = 0;
    		$model->discount_percent = 0;
    		$model->discount_bonus = 0;
    		$model->save();

    		Yii::$app->session->setFlash('success','Карта № '.$model->nomber.'добавлена');
    		return $this->render('add-form',['model'=>$model]);
    	} else {
    		if($model->hasErrors()){
    			Yii::$app->session->setFlash('error','Ошибка в данных');
    			
    		}
    		
    		return $this->render('add-form',['model'=>$model]);
    	}
    }


    public function actionDeleteForm(){
    	$model = new Cards();
    	if(Yii::$app->request->post('Cards') !=null){
    		$cards = Yii::$app->request->post('Cards');
    		if($data = $model->cardIssue($cards['nomber'])){
    			return $this->render('delete-form',['model'=>$model,'data'=>$data]);
    		}	
    	}
    	return $this->render('delete-form',['model'=>$model,'data'=>'']);
    	
    }

    public function actionDelete(){
    	$model = new Cards();
    	$error = 'Не удалось Удалить карту';
    	if($model->dateCardById(Yii::$app->request->get('id'))){
    		$error = "Карта удалена";
    	}
    	Yii::$app->session->setFlash('error',$error);
    	return $this->render('delete-complite');
    }


    public function actionAddFileForm(){
        
        $nombers = array();
        if(Yii::$app->request->post('nombers') != null){
            $nombers = explode(PHP_EOL,Yii::$app->request->post('nombers'));
            $counter = 0;
            foreach($nombers as $item){
                if($item != ""){
                    $model = new Cards();
                    $counter += 1;
                    $model->nomber = trim($item);
                    $model->valid = 1;
                    $model->used = 0;
                    $model->valid_to = strtotime('01-01-2023 23:00:00');
                    $model->circulation = 1;
                    $model->discount_percent = 0;
                    $model->discount_bonus = 0;
                    $model->isNewRecord = true;
                    if($model->validate(['nomber'])) 
                        {
                            $model->save();
                        } 
                } 
            }
            Yii::$app->session->setFlash('success','Сохранение карт '.$counter.' выполнено успешно');
        } 
    	return $this->render('add-file-form');
    }

}
