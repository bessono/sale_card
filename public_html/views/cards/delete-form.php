<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = new ActiveForm();
$form->begin();
?>
<div class='flex-container'>
	<div class='row'>
		<div class='col-md-7'>
<?php
echo $form->field($model,'nomber')->textInput()->label('Номер карты для поиска');
echo Html::submitButton('Поиск в базе',['class'=>'btn btn-primary']);
echo Html::tag('hr');
if((isset($data->id)) && $data != null){
	echo 'Номер карты = '.$data->nomber;
	echo Html::tag('br');
	$valid = $data->valid == 1 ? "Да" : "Нет";
	echo 'Действительна = '. $valid;
	echo Html::tag('br');
	echo 'Действительна до = <b class="text-danger">'. date('d-m-Y',$data->valid_to).'</b>';
	$used = $data->used == 0 ? "Нет" : $data->customer->customer_name.', '.$data->customer->customer_phone;
	echo Html::tag('br');
	echo 'Используется покупателем = <b>'.$used.'</b>';
	echo Html::tag('hr');
	echo 'Процент скидки = '.$data->discount_percent;
	echo Html::tag('br');
	echo 'Накопительные бонусы = '.$data->discount_bonus;
	echo Html::tag('hr');
	echo Html::a('Удалить карту',['cards/delete','id'=>$data->id],['class'=>'btn btn-danger']);
}
?>
		</div>
		<div class='col-md-4'>
			<h3>Свойства карты</h3>
			<p>Вы сможете просмотреть свойства карты и к какому покупателю она привязана, для этого укадите её номер или воспользуйтесь сканером</p>
			<h3>Удаление карты</h3>
			<p>Для удаления карты воспользуйтесь кнопкой удаления <b>Удалить карту</b>. </p>
			
		</div>
	</div>
</div>
<?php
$form->end();