<?php

namespace backend\models;

use Yii;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['title', 'timeLimit'], 'required'],
            [['borrowable'], 'boolean'],
            [['timeLimit'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['categoryId' => 'id']);
    }
}