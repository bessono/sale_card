<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = new ActiveForm();

$form->begin();
?>
<div class='container-fluid'>
	<div class='row'>
		<div class='col-md-6'>
<?php
echo $form->field($model,'customer_name')->textInput()->label("Имя Фамилия покупателя");
echo $form->field($model,'customer_phone')->textInput()->label("Телефон");
echo $form->field($model,'card_id')->textInput()->label("Крта (Штрих код)");
echo Html::submitButton('Зарегистрировать',['class'=>'btn btn-primary']);
?>
		</div>
		<div class='col-md-6'>
			<h3>Помощь</h3>
			<p>В этом интерфейсе регистрируется пользователь и привязывается к нему карточка.</p>
			<p>Заполните данные пользоватея и укажите штрих код карточки (или воспользуйтесь сканером и штрих кодок ракты)</p>
		</div>
	</div>
</div>
<?php
$form->end();
