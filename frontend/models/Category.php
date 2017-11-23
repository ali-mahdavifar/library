<?php

namespace frontend\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category';
    }

    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['categoryId' => 'id']);
    }
}