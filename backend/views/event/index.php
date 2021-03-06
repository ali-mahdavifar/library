<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\EventCategory;

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'day:date',
            'startTime',
            'endTime',
            'title',
            [
                'attribute' => 'eventCategoryId',
                'label' => 'Category Title',
                'value' => function($model){
                    return EventCategory::findOne($model->eventCategoryId)->title;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>