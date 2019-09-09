<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "managers".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $access_token
 * @property string $auth_key
 * @property int $banned
 * @property string $email
 */
class Managers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */



    public static function tableName()
    {
        return 'managers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password','email'], 'required'],
            [['banned'], 'integer'],
            [['email'],'email'],
            [['username', 'password', 'access_token', 'auth_key', 'email'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
            'banned' => 'Banned',
            'email' => 'Електронная почта',
        ];
    }

    public static function addNewManager($model){
            $model->access_token = md5(rand(1000,98878).'-'.rand(20,1000));
            $model->auth_key = md5(rand(1000,98878)."key".rand(1000,2000));
            $model->password = md5($model->password);
            $model->save(false);

            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('seller');
            $auth->assign($authorRole, $model->getId($model->username));
    }

    public function getId($username)
    {
        $objId = $this->find(['id'])->where(['username'=>$username])->one();
        return $objId->id;
    }



    public function getAllSellers()
    {
        $query = $this->find(['id','username','ban'])->select(['id','username','banned','email']);
        $provider = new ActiveDataProvider([
            'query'=>$query,
        ]);
        return $provider;
    }

    public function deleteManagerById($id){
        $manager = $this->find()->where(['id'=>$id])->one();
        $manager->delete();
    }

    public function updatePassword($id,$password){
        $password = $this->makePassword($password);
        $manager = $this->find()->where(['id'=>$id])->one();
        $manager->password = $password;
        $manager->save();
    }

    public function updateManagerData($new_data){
        $manager = $this->find()->where(['id'=>$new_data->id])->one();
        $manager->username = $new_data->username;
        $manager->email = $new_data->email;
        $manager->save();
    }

    private function makePassword($password){
        return md5($password);
    }

    public function getUserById($id){
        $manager = $this->find()->where(['id'=>$id])->one();
        return  $manager;
    }
}
