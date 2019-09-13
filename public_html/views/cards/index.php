<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = new ActiveForm();
$form->begin();
echo Html::tag('h1','Свойства карты');
$form->field($model,'nomber')->label('Укажите номер карты (можно воспользоваться сканером)');
echo Html::tag('br');
echo Html::input('text','card_id','',['class'=>'form-control']);
echo Html::tag('br');
echo Html::submitButton('Проверить карту',['class'=>'btn btn-primary']);
$form->end();