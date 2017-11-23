<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Category;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'isbn',
            'title',
            'publisher',
            'count',
            [
                'attribute' => 'categoryId',
                'value' => function($model){
                    return Category::findOne($model->categoryId)->title;
                },
                'filter' => ArrayHelper::map(Category::find()->all(), 'id', 'title')
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>