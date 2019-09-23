<?php

use yii\widgets\Pjax;
use yii\helpers\Html;

$pjax = new Pjax();
$pjax->begin();
	echo Html::beginForm();
	echo Html::textInput('nomber','',['class'=>'form-control']);
	echo Html::tag('br');
	echo Html::submitButton('Проверить карту',['class'=>'btn btn-primary']);
	echo Html::endForm();
	
	if($time !== ""){
		?>
		<div>
			Время = <?php echo $time; ?>
		</div>
		<?php
	}
$pjax->end();
