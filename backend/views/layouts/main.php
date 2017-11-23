<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php Html::csrfMetaTags(); ?>
    <title><?php echo Html::encode($this -> title); ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>
<div class="container">
    <ul id="menu">
        <li><a href=<?= Yii::$app->homeUrl ?>>Home</a></li>
        <li>
            <a>Books</a>
            <ul>
                <li><a href=<?= Url::to(['/category/index']) ?>>Categories</a></li>
                <li><a href=<?= Url::to(['/book/index']) ?>>Books Management</a></li>
                <li>
                    <a>Book Requests</a>
                    <ul>
                        <li><a href=<?= Url::to(['/borrow/index']) ?>>All Requests</a></li>
                        <li><a href=<?= Url::to(['/borrow/show-not-transfer']) ?>>Not Transfer</a></li>
                    </ul>
                </li>
                <li><a href=<?= Url::to(['/wait/index']) ?>>Books Queue</a></li>
                <li><a href=<?= Url::to(['/order/index']) ?>>Books Order</a></li>
                <li><a href=<?= Url::to(['/suggest/index']) ?>>Books Suggestion</a></li>
            </ul>
        </li>
        <li>
            <a>Events</a>
            <ul>
                <li><a href=<?= Url::to(['/event-category/index']) ?>>Categories</a></li>
                <li><a href=<?= Url::to(['/event/index']) ?>>Events Management</a></li>
                <li><a href=<?= Url::to(['/reserve/index']) ?>>Reservation</a></li>
            </ul>
        </li>
        <li><a href=<?= Url::to(['/site/create-admin']) ?>>Create Admin</a></li>
        <?php if (Yii::$app->user->isGuest): ?>
            <li><a href=<?= \yii\helpers\Url::to(['site/signup']) ?>>Signup</a></li>
            <li><a href=<?= \yii\helpers\Url::to(['site/login']) ?>>Login</a></li>
        <?php endif; ?>
        <?php if (!Yii::$app->user->isGuest): ?>
            <li><?= \yii\bootstrap\Html::a('Logout (' . Yii::$app->user->identity->username . ')' , \yii\helpers\Url::to(['site/logout']) , ['data-method' => 'post']) ?></li>
        <?php endif; ?>
    </ul>
    <div style="margin:20PX">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>