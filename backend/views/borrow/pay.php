<div class="panel panel-danger">
    <div class="panel-heading">
        Pay Money
    </div>
    <div class="panel-body">
        <p style="margin:30PX">The Customer Must Pay : <?= $penalty ?> Dollar</p>
    </div>
</div>
<br>
<?= \yii\bootstrap\Html::a('Books Request', ['/borrow/index'] , ['class' => 'btn btn-primary btn-lg']) ?>