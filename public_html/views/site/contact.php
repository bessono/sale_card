<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Отзыв';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Если у Вас возникли пожелания по поводу данного програмного обеспечения, вы можете отослать письмо 
            разработчику через эту фрму.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Если у Вас возникли пожелания по поводу данного програмного обеспечения, вы можете отослать письмо 
            разработчику через эту фрму.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Ф.И.О.'); ?>

                    <?= $form->field($model, 'email')->label('e-Mail'); ?>

                    <?= $form->field($model, 'subject')->label('Тема письма (жалобы, просьбы)'); ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6])->label('Содержание'); ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ])->label('Код подтверждения'); ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
