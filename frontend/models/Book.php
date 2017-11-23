<?php

namespace frontend\models;

use Yii;

class Book extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'book';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryId']);
    }

    public function getBorrows()
    {
        return $this->hasMany(Borrow::className(), ['bookId' => 'id']);
    }

    public function getStudies()
    {
        return $this->hasMany(Study::className(), ['bookId' => 'id']);
    }
}