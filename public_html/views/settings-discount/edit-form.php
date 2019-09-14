<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = new ActiveForm();
$form->begin();
?>
<div class='countainer-fluid'>
	<div class='row'>
		<div class='col-md-6'>
			
			<div class='row'>
			<div class='col-md-6'>
			<?php
				echo $form->field($model,'first_step')->textInput()->label('Первый порог');
			?>
			</div>
			<div class='col-md-6'>
			<?php
				echo $form->field($model,'first_discount_percent')->textInput()->label('Процент скидки до первого порога');
			?>
			</div>
			</div>
			<hr>

			<div class='row'>
			<div class='col-md-6'>
			<?php
				echo $form->field($model,'second_step')->textInput()->label('Второй порог');
			?>
			</div>
			<div class='col-md-6'>
			<?php
				echo $form->field($model,'second_discount_percent')->textInput()->label('Процент скидки до Второго порога');
			?>
			</div>
			</div>
			<hr>

			<div class='row'>
			<div class='col-md-6'>
			<?php
				echo $form->field($model,'third_step')->textInput()->label('Третий порог');
			?>
			</div>
			<div class='col-md-6'>
			<?php
				echo $form->field($model,'third_discount_percent')->textInput()->label('Процент скидки до трктьего порога');
			?>
			</div>
			</div>
			<hr>
			<?php
				echo $form->field($model,'bonus_discount_percent')->textInput()->label('Отчисления в бонусы с покупки (в виде процента)');
				echo Html::submitButton('Сохранить настройки',['class'=>'btn btn-primary'])
			?>

		</div>
		<div class='col-md-6'>
			<h3>Помощь</h3>
			<p>В этом интерфейсе вы можете настроить пороги и уровни начисления процента</p>
		</div>
	</div>	
</div>
<?php
$form->end();