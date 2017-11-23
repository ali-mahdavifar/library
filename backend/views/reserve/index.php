<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Event;
use common\models\User;

$this->title = 'Reserves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserve-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'eventId',
                'label' => 'Event Title',
                'value' => function($model){
                    return Event::findOne($model->eventCategoryId)->title;
                }
            ],
            [
                'attribute' => 'userId',
                'label' => 'User Email',
                'value' => function($model){
                    return User::findOne($model->userId)->email;
                }
            ],
            'count',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>

</div>