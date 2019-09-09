<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = new ActiveForm();
$form->begin();
	echo $form->field($model,'id')->hiddenInput(['value'=>$model->id])->label('');
	echo $form->field($model,'username')->textInput(['value'=>$model->username])->label('Имя пользователя');
	echo $form->field($model,'email')->textInput(['value'=>$model->email])->label('E-mail');
	echo $form->field($model,'password')->passwordInput(['value'=>''])->label('Пароль пользователя');
	echo Html::label('Повторить пароль');
	echo Html::input('password','repassword','',['class'=>'form-control']);
	echo Html::tag('br');
	echo Html::submitButton('Сохранить',['class'=>'btn btn-primary']);

$form->end();