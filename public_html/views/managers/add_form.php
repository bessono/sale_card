<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = new ActiveForm;
$form::begin();
	?>
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-5'>
	<?php
	echo $form->field($model,'email')->label("Електронная почта");
	echo $form->field($model,'username')->label("Логин");
	echo $form->field($model,'password')->passwordInput()->Label("Пароль");
	echo Html::label('Повторить пароль');
	echo Html::passwordInput('re-password','',['class'=>'form-control']);//->Label("Пароль");
	echo Html::tag('br');
	echo Html::submitButton('Добавить',['class'=>'btn btn-primary']);
?>
			</div>
			<div class='col-md-5'>
				<h3>Помощь</h3>
				<p>В этом интерфейсе вы можете добавить продовца. Продовец не имеет право настраивать программу добавлять и менять свойства карт.</p>
				<p>В данной версии программы предусмотрен только один администратор с логином "Admin". Все остальные добавляеммые пользователи являются продовцами. Если вы жедаете отредактирровать пароль учётной записи "Admin" перейдите в раздел <b>Настройки->Редактировать/Удалить продовца.</b> В этом оазделе вы также сможете просматривать и редактировать других пользователей</p>
			</div>
		</div>
	</div>
<?php
$form::end();
