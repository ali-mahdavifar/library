<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use backend\models\Book;

$this->title = 'Borrows And Not Transfer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="borrow-index">

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
            [
                'attribute' => 'beginDate',
                'value' => function($model){
                    return date('Y-m-d', $model->beginDate);
                }
            ],
            [
                'attribute' => 'endDate',
                'value' => function($model){
                    return date('Y-m-d', $model->endDate);
                }
            ],
            [
                'attribute' => 'transferDate',
                'value' => function($model){
                    return $model->transferDate ? date('Y-m-d', $model->transferDate) : null;
                }
            ],
            'penalty',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete} {check}',
                'buttons' => [
                    'check' => function($url, $model, $key)
                    {
                        return Html::a(
                            '<span class="glyphicon glyphicon-check"></span>',
                            $url,
                            [
                                'title' => 'Receive The Book',
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>

</div>
