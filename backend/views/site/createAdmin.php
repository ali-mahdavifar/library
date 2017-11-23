<?php

use yii\bootstrap\Html;
use kartik\select2\Select2;
use common\models\User;
use yii\helpers\ArrayHelper;

?>

<?php $this->title = 'Create Admin' ?>

<?= Html::beginForm(['site/init'], 'post') ?>
<?php
$data = User::find()->all();
$data = ArrayHelper::map($data, 'id', 'email');
echo '<label class="control-label">Books</label>';
echo Select2::widget([
    'name' => 'user',
    'data' => $data,
    'options' => [
        'placeholder' => 'Select User Email',
        'multiple' => false
    ],
]);
?>
<br>
<?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>
<?= Html::endForm() ?>