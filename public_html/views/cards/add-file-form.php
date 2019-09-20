<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = new ActiveForm();
$form->begin();
	?>
	<div class="container">
		<div class="row">
			<div class='col-md-6'>
	<?php
	echo Html::label('Вставте (впишите) номера карточек');
	echo Html::textArea('nombers','',['name'=>'nombers','class'=>'form-control','rows'=>'10','cols'=>'20']);
	echo Html::label('Срок действия карт');
	echo Html::tag('br');
	echo Html::textInput('valid_to',date('2030-'.'m-d'),['class'=>'form-control','type'=>'date','min'=>date('Y-m-d')]);
	echo Html::tag('br');
	echo Html::label('Номер партии');
	echo Html::textInput('circulation','',['class'=>'form-control']);
	echo Html::tag('hr');
	echo Html::submitButton('Сохранить карты в базе',['class'=>'btn btn-warning']);
	?>
			</div>
			<div class='col-md-6'>
				<h3>Помощь</h3>
				<p>Данный интерфейс служит для внесения карточек в базу данных.</p>
				<p>Как правило издатели карточек передают номера карт 
				файлом, Ваша задача заключается в том чтобы скопировать номера этих карточек из файла в поле <b>"Вставте (впишите) номера карточек"</b> так чтобы каждый номер наинался с новой строки, как это показанно в примере:<br>
					<p>
					ПервыйНомерКарты<br>
					ВторойНомерКарты<br>
					ТретийНомерКарты<br>
					и т.д.
					<p>
				<p>Номера естествено должны быть числом (как правило со штих кода)</p>
				</p>
			</div>	
		</div>
	</div>
	<?php

$form->end();