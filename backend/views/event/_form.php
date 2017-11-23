<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\EventCategory;

?>

<div class="event-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startTime')->textInput() ?>

    <?= $form->field($model, 'endTime')->textInput() ?>

    <?php
        echo '<label class="control-label">Event Date</label>';
        echo DatePicker::widget([
            'name' => 'day',
            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
            'value' => $model->day ? date('d-m-Y', $model->day) : null,
            'options' => ['placeholder' => 'Enter Event Date'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-mm-yyyy'
            ]
        ]);
    ?>

    <br>

    <?= $form->field($model, 'speakers')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'eventCategoryId')->dropDownList(ArrayHelper::map(EventCategory::find()->all(), 'id', 'title'), ['prompt' => 'Select Category Title'])->label('Category Title') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
