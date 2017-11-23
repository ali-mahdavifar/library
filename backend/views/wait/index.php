<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use backend\models\Book;

$this->title = 'Waits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wait-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'userId',
                'label' => 'User Email',
                'value' => function($model){
                    return User::findOne($model->userId)->email;
                }
            ],
            [
                'attribute' => 'bookId',
                'label' => 'Book Title',
                'value' => function($model){
                    return Book::findOne($model->bookId)->title;
                }
            ],
            'requestDate:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}'
            ],
        ],
    ]); ?>

</div>