<?php

use yii\helpers\Html;
use yii\grid\GridView;

echo GridView::widget([
	'dataProvider'=>$provider,
	'columns'=>[
		'username','email',
		[
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
    	]
	],

]);