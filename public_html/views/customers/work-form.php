<?php

use yii\widgets\Pjax;
use yii\helpers\Html;

//$pjax = new Pjax();
//$pjax->begin();
	echo Html::beginForm();
	echo Html::label('Введите карту покупателя');
	echo Html::textInput('nomber','',['class'=>'form-control']);
	echo Html::tag('br');
	echo Html::submitButton('Проверить карту',['class'=>'btn btn-primary']);
	echo Html::endForm();


	if($card != null){
		$error = false;
		echo Html::beginTag('div',['class'=>'container text-center']);

				
		if($card->used != 1){
			$error = 'Карта не приавязана к пользователю';
		}
		if($card->valid == 0 || intval($card->valid_to) < intval(strtotime(date('d-m-Y')))){
			$error = 'Карта не валидная, либо закончился её срок действия '.$card->valid_to.' < '.strtotime(date('d-m-Y'));
		}
		if($card->customer == null){
			$error = 'Карта не привязана к покупателю, зарегистрируйте покупателя на эту карту';
		}
		if($summ == null){
			$error = 'Система не смогла вернуть сумму покупок пользователя';
		}

		$sum = $summ[0]->summ ? $summ[0]->summ : '0';
		if($error == false)
		{
			echo 'Номер карты - '.Html::encode($card->nomber);
			echo Html::tag('br');
			echo 'Действительна до - '.date('d-m-Y',$card->valid_to);
			echo Html::tag('br');
			echo 'Покупатель - '.Html::beginTag('b',['class'=>'text-danger']).Html::encode($card->customer->customer_name).Html::endTag('b');
			echo Html::tag('br');
			echo 'ID пользователя - '.Html::encode($card->customer->id);
			echo Html::tag('br');
			echo 'Сумма покупок = '.Html::encode($sum);
			echo Html::tag('hr');
			echo Html::BeginTag('h3');
			echo 'Процент скидок = '.Html::BeginTag('b',['class'=>'text-danger']).Html::encode($card->discount_percent).Html::EndTag('b')."%";
			echo Html::tag('br');
			echo 'Бонусы = '.Html::BeginTag('b',['class'=>'text-danger']).Html::encode($card->discount_bonus).Html::EndTag('b');
			echo Html::endTag('h3');
			echo Html::tag('hr');
			// text fields
				echo Html::label('Сумма покупки');
				echo Html::textInput('summ','0',['id'=>'summ','class'=>'form-control','onkeyup'=>'getCalcSumm(this.value,'.$card->discount_percent.','.$card->discount_bonus.','.$card->customer->id.');']);
				echo Html::BeginTag('div',['class'=>'bg-secondary']);
				echo Html::label('Сумма от покупателя (не обязательно)');
				echo Html::textInput('customer_cash','0',['id'=>'customer_cash','class'=>'form-control bg-secondary']);
				echo Html::EndTag('div');
			//--------------
			echo Html::tag('br');
			echo Html::beginTag('div',['id'=>'button_container']);
			echo Html::endTag('div');
		} else {
			Yii::$app->session->setFlash('error',$error);
		}
		echo Html::endTag('div');
	}
//$pjax->end();
?>
	