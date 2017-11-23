<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Event Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>