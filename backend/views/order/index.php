<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'publisher',
            'count',
            [
                'attribute' => 'userId',
                'label' => 'User Email',
                'value' => function($model){
                    return User::findOne($model->userId)->email;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
            ],
        ],
    ]); ?>

</div>