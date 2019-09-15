<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Sale&Cards';


?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Программа Sale&Cards</h1>
        <p class="lead">Вы открыли программу разрешающую вопросы по работе со скидочными картами.</p>
    </div>
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Карт в базе</h2>

                <p><h2><?php echo $all_cards?></h2></p>
            </div>
            <div class="col-lg-4">
                <h2>Покупателей в базе</h2>

                <p><h2><?php echo $all_customers; ?><h2></p>
            </div>
            <div class="col-lg-4">
                <h2>Покупок по карте</h2>

                <p>Число использования карт</p>
                                
            </div>
        </div>

    </div>
    <div style="text-align:center;">
    <p>Если вы первый раз пытаетесь пользоаться данной программой прошу вас обратиться в раздел <a href="<?php echo Url::to(['site/help'])?>">Помощи</a>.</p>
    <div>
</div>

