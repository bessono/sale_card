<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if(Yii::$app->user->isGuest){
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'=>[
                ['label'=>'Помощь','url'=>['/site/help']],
                ['label'=>'Вход','url'=>['/site/login']],
            ]
    ]);
    NavBar::end();
    } else {
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items'=>[
                    ['label'=>'Работа с пользователем','items'=>[
                        ['label'=>'Покупка','url'=>['main/main-form']],
                    ]],
                    ['label'=>'Помощь','url'=>['/site/help']],
                	['label'=>'Настройки','items'=>[
                        ['label'=>'Свойства Карты','url'=>['cards/delete-form'], 'visible' => Yii::$app->user->can('manageCards')],
                	['label'=>'Добавить карту','url'=>['cards/add-form'], 'visible'=> Yii::$app->user->can('manageCards')],
                        ['label'=>'Добавить массив карт (файлом)','url'=>['cards/add-file-form'], 'visible'=> Yii::$app->user->can('manageCards')],
                        
                        ['label'=>'-'],
                        ['label'=>'Зарегистрировать покупателя','url'=>['customers/add-form'], 'visible' => Yii::$app->user->can('manageCustomers')],
                        ['label'=>'-'],
                        ['label'=>'Свойства Скидок','url'=>['settings-discount/edit-form'], 'visible' => Yii::$app->user->can('manageDiscount')],
                        ['label'=>'Отзывы','url'=>['/site/contact'], 'visible'=>Yii::$app->user->can('managerDiscount')],
                        ['label'=>'-'],
                        ['label'=>'Добавить продовца','url'=>['managers/add-form'], 'visible'=>Yii::$app->user->can('manageCards')],
                        ['label'=>'Редактровать/Удалить продовца','url'=>['managers/delete-form'], 'visible'=>Yii::$app->user->can('manageCards')],
                	],	
                	]
            
        ],
        
    ]);
                echo '<ul class="navbar-nav navbar-right nav"><li class="active">'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout','style'=>'float:right']
                )
                . Html::endForm()
                . '</li></ul>';
    NavBar::end();
    }

        /*'items' => [
             
                
            Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                
                .'<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'

            )
        ],*/
    
    
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Бессонов Александр Евгеньевич<br><a href="http://bessono.ru" title="Посетить сайт разработчика" target="_blank">besssono.ru</a><br> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
