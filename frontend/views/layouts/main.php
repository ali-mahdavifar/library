<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php Html::csrfMetaTags(); ?>
    <title><?php echo Html::encode($this -> title); ?></title>
    <?php $this->head(); ?>
</head>

<body>
<?php $this->beginBody(); ?>
<div class="container">
    <div class="masthead">
        <nav>
            <ul class="nav nav-justified">
                <li><a href=<?= \yii\helpers\Url::to(['site/index']) ?>>Home</a></li>
                <li><a href=<?= \yii\helpers\Url::to(['book/index']) ?>>Books</a></li>
                <li><a href=<?= \yii\helpers\Url::to(['event/index']) ?>>Events</a></li>
                <li><a href=<?= \yii\helpers\Url::to(['order/create']) ?>>Order</a></li>
                <li><a href=<?= \yii\helpers\Url::to(['suggest/create']) ?>>Suggest Books</a></li>
                <li><a href=<?= \yii\helpers\Url::to(['site/about']) ?>>About</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                <li><a href=<?= \yii\helpers\Url::to(['site/signup']) ?>>Signup</a></li>
                <li><a href=<?= \yii\helpers\Url::to(['site/login']) ?>>Login</a></li>
                <?php endif; ?>
                <?php if (!Yii::$app->user->isGuest): ?>
                <li><?= \yii\bootstrap\Html::a('Logout (' . Yii::$app->user->identity->username . ')' , \yii\helpers\Url::to(['site/logout']) , ['data-method' => 'post']) ?></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div style="margin:20PX">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>