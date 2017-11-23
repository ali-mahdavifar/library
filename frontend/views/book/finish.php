<?php
if(!is_array($waited)){
    $wait = array($waited);
}else{
    $wait = $waited;
}
?>

<?php if($wait == null): ?>
    <div class="panel panel-success">
        <div class="panel-heading">
            Thank You For Choosing Us
        </div>
        <div class="panel-body">
            <p style="margin:30PX">Your Request Was Registered . For Receiving Your Books Please Refer To Our Shop</p>
        </div>
    </div>
<?php endif; ?>
<?php if($wait != null): ?>
    <div class="panel panel-warning">
        <div class="panel-heading">
            Please Wait
        </div>
        <div class="panel-body">
            <p style="margin:30PX">We Do Not Have These Books Now But We Put You In The Queue Immediately We Have Theme We Call You</p>
            <?php foreach($wait as $value): ?>
                <p style="margin:30PX"><?= \frontend\models\Book::findOne($value)->title ?></p>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if($reserved != null): ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                Thank You For Choosing Us
            </div>
            <div class="panel-body">
                <p style="margin:30PX">Available Requested Books Were Registered . For Receiving Your Books Please Refer To Our Shop</p>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
    <br>
<?= \yii\bootstrap\Html::a('Home', ['/site/index'] , ['class' => 'btn btn-primary btn-lg']) ?>