<?php

namespace backend\models;

use Yii;
use common\models\User;

class Wait extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'wait';
    }

    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'bookId']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}