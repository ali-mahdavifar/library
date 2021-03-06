<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\EventCategory;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Events', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'day:date',
            'startTime',
            'endTime',
            'speakers:ntext',
            [
                'attribute' => 'eventCategoryId',
                'label' => 'Category Title',
                'value' => EventCategory::findOne($model->eventCategoryId)->title
            ],
            'description:ntext',
        ],
    ]) ?>

</div>