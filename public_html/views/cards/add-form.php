<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
$form = new ActiveForm();
$form->begin([
	'options'=>['class'=>'middle-form'],
]);
?>
<div class="container-fluid">
<div class='row'>
<div class='col-md-6'>
<?php
echo $form->field($model,'nomber')->textInput()->label('Номер карты');
echo $form->field($model,'valid')->checkBox(['checked'=>'true']);
echo $form->field($model,'valid_to')->textInput(['type'=>'date','value'=>date('Y-m-d')]);
echo Html::label('Дата окончания работы карты');
echo $form->field($model,'circulation')->textInput()->label('Номер партии');
echo Html::tag('br');
echo Html::submitButton('Добавить',['class'=>'btn btn-primary']);
?>
</div>
<div class='col-md-6'>
	<h3>Помощь</h3>
	<p>Данный интерфейс даёт возможность, добавить одну карту.</p>
	<p>Если вы имеете файл с номерами новых карт для добавления в базу, вам лучше
		воспользоваться <b>Настройки->ДобавитьКарты</b></p>
		<p>Необхадимо вставить параметры:
			<ul>
				<li>Номер карты - номер со штрих кода</li>
				<li>Действительна - будит ли карта действительна для работы</li>
				<li>Дата окончания работы карты</li>
				<li>Номер партии - номер партии печати карт.</li>
			</ul>
		</p>
</div>

</div>
</div>
<?php
$form->end();
?>
