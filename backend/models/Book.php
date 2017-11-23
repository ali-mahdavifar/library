<?php

namespace backend\models;

use Yii;

class Book extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'book';
    }

    public function rules()
    {
        return [
            [['isbn', 'title', 'publisher', 'count'], 'required'],
            ['categoryId', 'required', 'message' => 'Category Title cannot be blank'],
            [['count', 'categoryId'], 'integer'],
            [['isbn'], 'string', 'max' => 10],
            [['title', 'publisher'], 'string', 'max' => 255]
        ];
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

    public function getWaits()
    {
        return $this->hasMany(Wait::className(), ['bookId' => 'id']);
    }
}