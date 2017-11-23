<?php

namespace frontend\models;

use Yii;
use common\models\User;

class Borrow extends \yii\db\ActiveRecord
{
    public $category;
    public $publisher;

    public static function tableName()
    {
        return 'borrow';
    }

    public function rules()
    {
        return [
            [['bookId', 'userId'], 'required'],
            [['bookId', 'userId'], 'integer']
        ];
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