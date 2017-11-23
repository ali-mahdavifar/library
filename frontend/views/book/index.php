<?php

use yii\bootstrap\Html;
use kartik\select2\Select2;
use frontend\models\Category;
use yii\helpers\ArrayHelper;

?>

<?php $this->title = 'Categories' ?>

<?= Html::beginForm(['book/show'], 'post') ?>
<?php
$data = Category::find()->all();
$data = ArrayHelper::map($data, 'id', 'title');
echo '<label class="control-label">Categories</label>';
echo Select2::widget([
    'name' => 'category',
    'data' => $data,
    'options' => [
        'placeholder' => 'Select Book Category',
        'multiple' => false
    ],
]);
?>
<br>
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
<?= Html::endForm() ?>