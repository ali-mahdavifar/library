<?php

use yii\bootstrap\Html;

$this->registerCss(".imageAndTitle {float: left;}");
$this->registerCss(".title {float: left;}");
$this->registerCss(".downloadButton {text-align: right;float: right !important;}");

?>

<?php foreach($books as $book): ?>
<div class="row">
    <div class = "title" style="padding:20PX">
        <b><p>Title : <?= $book->title ?></p></b>
    </div>
    <div class = "downloadButton" style="padding-top:10PX">
        <?= Html::a('Reserve', ['reserve', 'id' => $book->id], ['class'=>'btn btn-success']) ?>
    </div>
</div>
<div style="margin:20PX">
<p>Publisher : <?= $book->publisher ?></p>
<p>ISBN : <?= $book->isbn ?></p>
</div>
<hr style="height:1px;border:none;background-color:rgb(212,212,212)" />
<?php endforeach; ?>