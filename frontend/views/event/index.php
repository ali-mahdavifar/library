<?php
$this->title = 'Events';
?>
<?php foreach($events as $value): ?>
    <div style="margin:15PX;border:3PX solid black;border-radius:5PX;padding:15PX">
        <p><b>Title : </b><?= $value->title ?></p>
        <p><b>Date : </b><?= date('Y-m-d', $value->day) ?></p>
        <p><b>Category : </b><?= \frontend\models\EventCategory::findOne($value->eventCategoryId)->title ?></p>
        <p><b>Speakers : </b><?= $value->speakers ?></p>
        <p><b>Description : </b><?= $value->description ?></p>
        <p><b>Start Time : </b><?= $value->startTime ?> , <b>End Time : </b><?= $value->endTime ?></p>
        <br>
        <?= \yii\bootstrap\Html::a('Reserve', ['event/reserve', 'id' => $value->id] , ['class' => 'btn btn-default']) ?>
    </div>
<?php endforeach; ?>