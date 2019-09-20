<?php

namespace app\controllers;

use Yii;
use app\models\Managers;
use app\controllers\AccsessControl;
use yii\filters\AccessControl;

class ManagersController extends \yii\web\Controller
{

    public function behaviors(){
        return [
            'access'=>[
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'roles'=>['manageManagers'],
                    ]
                ]
            ]
        ];
    }

    public function actionAddForm()
    {
    	$model = new Managers();

        if($model->load(\Yii::$app->request->post()) && $model->validate(['username','password','email'])){
       		if(Yii::$app->request->post('password') === Yii::$app->request->post('re_password')){
        	Managers::addNewManager($model);
        	return $this->actionDeleteForm();
            }
        } else {
        	
        	return $this->render('add_form',['model'=>$model]);

        }
    }

    public function actionUpdate(){
        $id = intval(Yii::$app->request->get('id'));
        $model = new Managers();
        $manager = $model->getUserById($id);
        if($manager->load(Yii::$app->request->post()) && $manager->validate(['username','email'])){
            if($manager->password !== "" && $manager->password === Yii::$app->request->post('repassword')){
                $model->updatePassword($manager->id,$manager->password);
            }
                $model->updateManagerData($manager);
                return $this->actionDeleteForm();
        } else {
            return $this->render('edit_form',['model'=>$manager]);
        }
    }

    public function actionDeleteForm()
    {
    	$model = new Managers();
    	$provider = $model->getAllSellers();
    	return $this->render('delete_form',['model'=>$model,'provider'=>$provider]);
    }

    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $model = new Managers();
        $model->deleteManagerById($id);
        return $this->actionDeleteForm();
    }

}
